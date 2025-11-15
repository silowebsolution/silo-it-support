<?php

namespace App\Livewire\UserTickets;

use Livewire\Component;
use App\Models\UserTicket;
use App\Models\UserTicketMessage;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Form;
use Carbon\Carbon;

class ChatModal extends Component implements HasForms
{
    use InteractsWithForms;

    public UserTicket $record;
    public ?string $message = '';

    public function mount(UserTicket $record): void
    {
        $this->record = $record;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('messages')
                    ->label('Chat History')
                    ->schema([
                        Placeholder::make('message_content')
                            ->content(fn (array $state): string => $state['message'])
                            ->extraAttributes(function (array $state) {
                                $isCurrentUser = $state['user_id'] == Auth::id();
                                return [
                                    'class' => 'p-2 rounded-lg ' . ($isCurrentUser ? 'bg-blue-500 text-white self-end' : 'bg-gray-200 text-gray-800 self-start'),
                                    'style' => 'max-width: 80%;' . ($isCurrentUser ? 'margin-left: auto;' : 'margin-right: auto;'),
                                ];
                            })
                            ->columnSpanFull(),
                        Placeholder::make('message_info')
                            ->content(fn (array $state): string =>
                                ($state['user_name'] ?? 'Unknown') . ' - ' . Carbon::parse($state['created_at'])->diffForHumans()
                            )
                            ->extraAttributes(function (array $state) {
                                $isCurrentUser = $state['user_id'] == Auth::id();
                                return [
                                    'class' => 'text-xs text-gray-500 ' . ($isCurrentUser ? 'text-right' : 'text-left'),
                                    'style' => 'width: 100%;' . ($isCurrentUser ? 'margin-left: auto;' : 'margin-right: auto;'),
                                ];
                            })
                            ->columnSpanFull(),
                    ])
                    ->default(function () {
                        return $this->record->messages->map(function ($message) {
                            return [
                                'message' => $message->message,
                                'user_id' => $message->user_id,
                                'user_name' => $message->user->name ?? 'Unknown',
                                'created_at' => $message->created_at,
                            ];
                        })->toArray();
                    })
                    ->disableItemCreation()
                    ->disableItemDeletion()
                    ->disableItemMovement()
                    ->columns(1)
                    ->columnSpanFull()
                    ->extraAttributes(['class' => 'flex flex-col space-y-2 overflow-y-auto h-64 p-4 bg-gray-50 rounded-lg']),

                TextInput::make('message')
                    ->label('Your Message')
                    ->placeholder('Type your message here...')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $state) {
                        $this->message = $state;
                    })
                    ->columnSpanFull(),
            ]);
    }

    public function sendMessage(): void
    {
        if (!trim($this->message)) {
            return;
        }

        UserTicketMessage::create([
            'user_ticket_id' => $this->record->id,
            'user_id'        => Auth::id(),
            'message'        => $this->message,
        ]);

        $this->message = '';
        $this->dispatch('messageSent'); // Dispatch event to refresh messages
    }

    public function render()
    {
        return view('livewire.user-tickets.chat-modal');
    }
}
