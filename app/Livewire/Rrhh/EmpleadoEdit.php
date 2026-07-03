<?php

namespace App\Livewire\Rrhh;

use App\Models\Empleado;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class EmpleadoEdit extends Component
{
    public Empleado $empleado;
    public string $nombres = '';
    public string $apellidos = '';
    public string $cargo = '';
    public string $area = '';
    public string $regimen = 'cas';
    public float $sueldoBase = 0;
    public bool $activo = true;

    public function mount(Empleado $empleado): void
    {
        $this->empleado    = $empleado;
        $this->nombres     = $empleado->nombres;
        $this->apellidos   = $empleado->apellidos;
        $this->cargo       = $empleado->cargo;
        $this->area        = $empleado->area;
        $this->regimen     = $empleado->regimen;
        $this->sueldoBase  = $empleado->sueldo_base;
        $this->activo      = $empleado->activo;
    }

    public function guardar(): void
    {
        $this->validate([
            'nombres'    => ['required','string','max:255'],
            'apellidos'  => ['required','string','max:255'],
            'cargo'      => ['required','string','max:255'],
            'area'       => ['required','string','max:255'],
            'regimen'    => ['required','in:727,cas,locacion'],
            'sueldoBase' => ['required','numeric','min:0'],
        ]);

        $this->empleado->update([
            'nombres'     => $this->nombres,
            'apellidos'   => $this->apellidos,
            'cargo'       => $this->cargo,
            'area'        => $this->area,
            'regimen'     => $this->regimen,
            'sueldo_base' => $this->sueldoBase,
            'activo'      => $this->activo,
        ]);

        session()->flash('status', 'Empleado actualizado correctamente.');
        $this->redirect(route('empleados.show', $this->empleado), navigate: true);
    }

    public function render()
    {
        return view('livewire.rrhh.empleado-edit');
    }
}
