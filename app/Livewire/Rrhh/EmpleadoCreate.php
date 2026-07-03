<?php

namespace App\Livewire\Rrhh;

use App\Models\Empleado;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class EmpleadoCreate extends Component
{
    public string $dni = '';

    public string $nombres = '';

    public string $apellidos = '';

    public string $cargo = '';

    public string $area = '';

    public string $regimen = 'cas';

    public float $sueldoBase = 0;

    public string $fechaIngreso = '';

    public function mount(): void
    {
        $this->fechaIngreso = now()->format('Y-m-d');
    }

    public function guardar(): void
    {
        $this->validate([
            'dni' => ['required', 'string', 'max:15', 'unique:empleados,dni'],
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'cargo' => ['required', 'string', 'max:255'],
            'area' => ['required', 'string', 'max:255'],
            'regimen' => ['required', 'in:727,cas,locacion'],
            'sueldoBase' => ['required', 'numeric', 'min:0'],
            'fechaIngreso' => ['required', 'date'],
        ], [
            'dni.unique' => 'Ya existe un empleado registrado con ese DNI.',
        ]);

        $empleado = Empleado::create([
            'dni' => $this->dni,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'cargo' => $this->cargo,
            'area' => $this->area,
            'regimen' => $this->regimen,
            'sueldo_base' => $this->sueldoBase,
            'fecha_ingreso' => $this->fechaIngreso,
        ]);

        session()->flash('status', "Empleado {$empleado->nombres} {$empleado->apellidos} registrado correctamente.");

        $this->redirect(route('empleados.show', $empleado), navigate: true);
    }

    public function render()
    {
        return view('livewire.rrhh.empleado-create');
    }
}
