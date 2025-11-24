<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use App\Models\User;

#[Layout('components.layouts.main')]
#[Title('Login')]
class Login extends Component
{
    #[Rule('required|email')]
    public $email = '';

    #[Rule('required')]
    public $password = '';

    public function mount()
    {
        auth()->check() && redirect()->to('/help');

        if (User::where('email', 'user@test.com')->exists()) {
            $this->email = 'user@test.com';
            $this->password = 'user@test.com';
        }
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->to('/help');
        }

        $this->addError('email', trans('auth.failed'));
    }

    public function render()
    {
        return view('livewire.login');
    }
}
