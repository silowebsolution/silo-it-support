<?php

namespace App\Livewire;

use App\Models\MobileApp;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class DemoPage extends Component
{
    public bool $isDemoAvailable;
    public ?string $qrCode = null;

    public function mount()
    {
        $this->isDemoAvailable = MobileApp::where('hidden', false)
            ->latest('created_at')
            ->exists();

        $this->generateQrCode();
    }

    public function render()
    {
        return view('livewire.demo-page');
    }

    public function generateQrCode()
    {
        $downloadUrl = url('/download-app');

        try {
            $builder = new Builder(
                writer: new PngWriter(),
                writerOptions: [],
                validateResult: false,
                data: $downloadUrl,
                encoding: new Encoding('UTF-8'),
                errorCorrectionLevel: ErrorCorrectionLevel::High,
                size: 300,
                margin: 10,
                roundBlockSizeMode: RoundBlockSizeMode::Margin,
            );

            $result = $builder->build();

            $this->qrCode = $result->getDataUri();

        } catch (\Exception $e) {
            $this->qrCode = null;
            Log::error($e->getMessage());
        }
    }
}
