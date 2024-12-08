<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;


class Login extends Component
{

    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';
    public function mount()
    {
        // It is logged in
        if (auth()->user()) {
            return redirect('/');
        }
    }

    public function login()
    {
        $credentials = $this->validate();

        if (auth()->attempt($credentials)) {
            request()->session()->regenerate();

            return redirect()->intended('/');
        }

        $this->addError('email', 'The provided credentials do not match our records.');
    }
}
