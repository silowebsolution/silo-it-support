<?php

namespace App\Services;

use App\Models\Priority;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GptService
{
    protected string $apiKey;
    protected string $apiUrl = 'https://api.openai.com/v1/chat/completions';

    public function __construct()
    {
        $this->apiKey = config('services.openai.api_key');
    }

    /**
     * Analyze IT help request and return AI recommendation and priority
     *
     * @param string $requestMessage
     * @return array{ai_recommendation: string, priority_id: int|null}
     */
    public function analyzeRequest(string $requestMessage): array
    {
        if (empty($this->apiKey)) {
            Log::warning('OpenAI API key not configured');
            return [
                'ai_recommendation' => 'AI analysis unavailable. Please contact IT support directly.',
                'priority_id' => $this->getDefaultPriority(),
            ];
        }

        try {
            $priorities = Priority::all();
            $priorityList = $priorities->map(function ($priority) {
                $name = is_array($priority->name) ? ($priority->name['en'] ?? $priority->name) : $priority->name;
                return "ID {$priority->id}: {$name}";
            })->implode(', ');

            $prompt = "You are an IT support specialist analyzing a help request. Analyze the following request and provide:

1. A detailed recommendation for solving the problem (ai_recommendation) - be specific and actionable
2. A priority level based on the Priority table: {$priorityList}

The user's request is: {$requestMessage}

Respond ONLY with a valid JSON object in this exact format:
{
    \"ai_recommendation\": \"Your detailed recommendation here\",
    \"priority_id\": <number from the priority list above>
}

Priority guidelines:
- Low (1): Minor issues, non-urgent requests, general questions
- Medium (2): Standard issues that need attention but aren't critical
- High (3): Urgent issues affecting productivity or important systems

Return only the JSON, no additional text.";

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->timeout(30)->post($this->apiUrl, [
                'model' => 'gpt-4o-mini',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a helpful IT support specialist. Always respond with valid JSON only.',
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
                'temperature' => 0.7,
                'max_tokens' => 500,
            ]);

            if (!$response->successful()) {
                Log::error('OpenAI API error', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return [
                    'ai_recommendation' => 'Unable to analyze request. Please contact IT support directly.',
                    'priority_id' => $this->getDefaultPriority(),
                ];
            }

            $content = $response->json('choices.0.message.content', '');

            $content = preg_replace('/```json\s*/', '', $content);
            $content = preg_replace('/```\s*/', '', $content);
            $content = trim($content);

            $result = json_decode($content, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error('Failed to parse GPT response', [
                    'content' => $content,
                    'error' => json_last_error_msg(),
                ]);
                return [
                    'ai_recommendation' => 'Unable to parse AI analysis. Please contact IT support directly.',
                    'priority_id' => $this->getDefaultPriority(),
                ];
            }

            $priorityId = $result['priority_id'] ?? null;
            if ($priorityId && !Priority::find($priorityId)) {
                Log::warning('Invalid priority_id from GPT', ['priority_id' => $priorityId]);
                $priorityId = $this->getDefaultPriority();
            }

            return [
                'ai_recommendation' => $result['ai_recommendation'] ?? 'No recommendation provided.',
                'priority_id' => $priorityId ?? $this->getDefaultPriority(),
            ];

        } catch (\Exception $e) {
            Log::error('Exception in GPT service', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return [
                'ai_recommendation' => 'Error analyzing request. Please contact IT support directly.',
                'priority_id' => $this->getDefaultPriority(),
            ];
        }
    }

    protected function getDefaultPriority(): int
    {
        $mediumPriority = Priority::where('id', 2)->first();
        return $mediumPriority ? $mediumPriority->id : Priority::first()?->id ?? 1;
    }
}

