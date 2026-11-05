<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Locked;
use Livewire\Component;

class LandingPage extends Component
{
    #[Locked]
    public string $mode = 'login';

    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function setMode(string $mode): void
    {
        if (! in_array($mode, ['login', 'register'], true)) {
            throw ValidationException::withMessages([
                'mode' => 'Modo de acesso inválido.',
            ]);
        }

        $this->mode = $mode;
        $this->resetValidation();
    }

    public function login(): void
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $key = strtolower($this->email).'|'.request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            $this->addError('email', "Muitas tentativas. Tente novamente em {$seconds} segundos.");

            return;
        }

        if (! Auth::attempt($credentials)) {
            RateLimiter::hit($key, 60);
            $this->addError('email', 'E-mail ou senha inválidos.');

            return;
        }

        RateLimiter::clear($key);
        session()->regenerate();

        $this->redirectRoute('admin');
    }

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', Password::min(8), 'confirmed'],
        ]);

        $user = User::create($validated);

        Auth::login($user);
        session()->regenerate();

        $this->redirectRoute('admin');
    }

    public function render()
    {
        return view('livewire.landing-page');
    }
}
