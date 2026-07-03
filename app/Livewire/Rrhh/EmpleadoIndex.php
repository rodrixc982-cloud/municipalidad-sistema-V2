<?php

namespace App\Livewire\Rrhh;

use App\Models\Empleado;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
class EmpleadoIndex extends Component
{
    use WithPagination;

    public string $busqueda = '';

    public function updatingBusqueda(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $empleados = Empleado::query()
            ->when($this->busqueda, function ($query) {
                $query->where(function ($q) {
                    $q->where('dni', 'like', "%{$this->busqueda}%")
                        ->orWhere('nombres', 'like', "%{$this->busqueda}%")
                        ->orWhere('apellidos', 'like', "%{$this->busqueda}%");
                });
            })
            ->orderBy('apellidos')
            ->paginate(10);

        return view('livewire.rrhh.empleado-index', [
            'empleados' => $empleados,
        ]);
    }
}
