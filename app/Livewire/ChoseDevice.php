<?php

namespace App\Livewire;

use App\Models\MobileApp;
use Livewire\Component;

class ChoseDevice extends Component
{
    public ?MobileApp $mobileApp;
    public ?string $sessionMessage;

    public function mount()
    {
        $this->mobileApp = MobileApp::where('hidden', false)
            ->latest('created_at')
            ->first();

        $this->sessionMessage = session('message');
    }
    public function render()
    {
        return view('livewire.chose-device');
    }
}
