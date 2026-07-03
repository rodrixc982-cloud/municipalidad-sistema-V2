<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

#[Layout('components.layouts.app')]
class UsuarioIndex extends Component
{
    use WithFileUploads, WithPagination;

    public string $busqueda = '';

    // Modal crear/editar
    public bool $modalAbierto = false;

    public bool $esEdicion = false;

    public ?int $usuarioId = null;

    // Campos del formulario
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $area = '';

    public string $rol = 'mesa_partes';

    public bool $activo = true;

    public $foto = null;

    // Modal confirmar eliminación
    public bool $modalEliminar = false;

    public ?int $eliminarId = null;

    public function updatingBusqueda(): void
    {
        $this->resetPage();
    }

    public function abrirCrear(): void
    {
        $this->resetForm();
        $this->esEdicion = false;
        $this->modalAbierto = true;
    }

    public function abrirEditar(int $id): void
    {
        $usuario = User::findOrFail($id);
        $this->usuarioId = $id;
        $this->name = $usuario->name;
        $this->email = $usuario->email;
        $this->area = $usuario->area ?? '';
        $this->activo = $usuario->activo;
        $this->rol = $usuario->roles->first()?->name ?? 'mesa_partes';
        $this->password = '';
        $this->foto = null;
        $this->esEdicion = true;
        $this->modalAbierto = true;
    }

    public function guardar(): void
    {
        $emailRule = $this->esEdicion
            ? "required|email|unique:users,email,{$this->usuarioId}"
            : 'required|email|unique:users,email';

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [$emailRule],
            'password' => $this->esEdicion ? ['nullable', 'min:8'] : ['required', 'min:8'],
            'area' => ['required', 'string'],
            'rol' => ['required', 'exists:roles,name'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ], [
            'password.required' => 'La contraseña es obligatoria para usuarios nuevos.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'foto.max' => 'La foto no debe superar 2 MB.',
        ]);

        $datos = [
            'name' => $this->name,
            'email' => $this->email,
            'area' => $this->area,
            'activo' => $this->activo,
        ];

        if ($this->password) {
            $datos['password'] = Hash::make($this->password);
        }

        if ($this->foto) {
            $rutaFoto = $this->foto->store('fotos-perfil', 'public');
            $datos['foto_perfil'] = $rutaFoto;
        }

        if ($this->esEdicion) {
            $usuario = User::findOrFail($this->usuarioId);

            // Si se sube nueva foto, borrar la anterior
            if ($this->foto && $usuario->foto_perfil) {
                Storage::disk('public')->delete($usuario->foto_perfil);
            }

            $usuario->update($datos);
            $usuario->syncRoles([$this->rol]);
        } else {
            $usuario = User::create($datos);
            $usuario->assignRole($this->rol);
        }

        $this->modalAbierto = false;
        $this->resetForm();
        session()->flash('status', $this->esEdicion ? 'Usuario actualizado correctamente.' : 'Usuario creado correctamente.');
    }

    public function confirmarEliminar(int $id): void
    {
        $this->eliminarId = $id;
        $this->modalEliminar = true;
    }

    public function eliminar(): void
    {
        $usuario = User::findOrFail($this->eliminarId);

        if ($usuario->foto_perfil) {
            Storage::disk('public')->delete($usuario->foto_perfil);
        }

        $usuario->delete();
        $this->modalEliminar = false;
        $this->eliminarId = null;

        session()->flash('status', 'Usuario eliminado.');
    }

    private function resetForm(): void
    {
        $this->reset(['name', 'email', 'password', 'area', 'foto', 'usuarioId']);
        $this->rol = 'mesa_partes';
        $this->activo = true;
    }

    public function render()
    {
        return view('livewire.admin.usuario-index', [
            'usuarios' => User::with('roles')
                ->when($this->busqueda, fn ($q) => $q->where('name', 'like', "%{$this->busqueda}%")
                    ->orWhere('email', 'like', "%{$this->busqueda}%"))
                ->latest()
                ->paginate(10),
            'roles' => Role::all(),
            'areas' => ['Mesa de Partes', 'Rentas', 'Caja', 'Licencias', 'RRHH', 'Obras', 'Desarrollo Urbano', 'Administración'],
        ]);
    }
}
