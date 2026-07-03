<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layouts.app')]
class MiPerfil extends Component
{
    use WithFileUploads;

    public string $name = '';

    public string $email = '';

    public string $passwordActual = '';

    public string $passwordNuevo = '';

    public string $passwordConfirmar = '';

    public $foto = null;

    public function mount(): void
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function actualizarPerfil(): void
    {
        $user = auth()->user();

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ["required", "email", "unique:users,email,{$user->id}"],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        $datos = ['name' => $this->name, 'email' => $this->email];

        if ($this->foto) {
            if ($user->foto_perfil) {
                Storage::disk('public')->delete($user->foto_perfil);
            }
            $datos['foto_perfil'] = $this->foto->store('fotos-perfil', 'public');
            $this->foto = null;
        }

        $user->update($datos);
        session()->flash('status_perfil', 'Perfil actualizado correctamente.');
    }

    public function cambiarPassword(): void
    {
        $this->validate([
            'passwordActual' => ['required'],
            'passwordNuevo' => ['required', 'min:8'],
            'passwordConfirmar' => ['required', 'same:passwordNuevo'],
        ], [
            'passwordConfirmar.same' => 'Las contraseñas no coinciden.',
        ]);

        $user = auth()->user();

        if (! Hash::check($this->passwordActual, $user->password)) {
            $this->addError('passwordActual', 'La contraseña actual no es correcta.');

            return;
        }

        $user->update(['password' => Hash::make($this->passwordNuevo)]);
        $this->reset(['passwordActual', 'passwordNuevo', 'passwordConfirmar']);
        session()->flash('status_password', 'Contraseña actualizada correctamente.');
    }

    public function render()
    {
        return view('livewire.admin.mi-perfil');
    }
}
