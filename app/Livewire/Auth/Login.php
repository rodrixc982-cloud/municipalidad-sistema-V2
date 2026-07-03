<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Login extends Component
{
    public string $email = '';

    public string $password = '';

    public bool $remember = false;

    public function login(): void
    {
        $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Ingresa tu correo electrónico.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'password.required' => 'Ingresa tu contraseña.',
        ]);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (! Auth::attempt($credentials, $this->remember)) {
            throw ValidationException::withMessages([
                'email' => 'Las credenciales no coinciden con ningún registro.',
            ]);
        }

        $user = Auth::user();

        if (! $user->activo) {
            Auth::logout();

            throw ValidationException::withMessages([
                'email' => 'Tu cuenta está inactiva. Contacta al administrador del sistema.',
            ]);
        }

        request()->session()->regenerate();

        $this->redirect(route('dashboard'), navigate: true);
    }
}
