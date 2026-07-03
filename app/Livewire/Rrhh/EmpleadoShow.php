<?php

namespace App\Livewire\Rrhh;

use App\Models\Empleado;
use App\Models\Planilla;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class EmpleadoShow extends Component
{
    public Empleado $empleado;

    public int $mes;

    public int $anio;

    public float $descuentos = 0;

    public function mount(Empleado $empleado): void
    {
        $this->empleado = $empleado;
        $this->mes = now()->month;
        $this->anio = now()->year;
        $this->descuentos = round($empleado->sueldo_base * 0.13, 2); // Referencial: aporte ONP/AFP 13%
    }

    public function getSueldoNetoProperty(): float
    {
        return max($this->empleado->sueldo_base - $this->descuentos, 0);
    }

    public function generarPlanilla(): void
    {
        $this->validate([
            'mes' => ['required', 'integer', 'min:1', 'max:12'],
            'anio' => ['required', 'integer', 'min:2000', 'max:2100'],
            'descuentos' => ['required', 'numeric', 'min:0'],
        ]);

        $existe = $this->empleado->planillas()->where('mes', $this->mes)->where('anio', $this->anio)->exists();

        if ($existe) {
            $this->addError('mes', 'Ya existe una planilla generada para este mes y año.');

            return;
        }

        $this->empleado->planillas()->create([
            'mes' => $this->mes,
            'anio' => $this->anio,
            'sueldo_bruto' => $this->empleado->sueldo_base,
            'descuentos' => $this->descuentos,
            'sueldo_neto' => $this->sueldoNeto,
            'estado' => 'pendiente',
        ]);

        $this->empleado->refresh();

        session()->flash('status', 'Planilla generada correctamente.');
    }

    public function marcarPagado(int $planillaId): void
    {
        $planilla = Planilla::findOrFail($planillaId);

        if ($planilla->empleado_id !== $this->empleado->id) {
            abort(403);
        }

        $planilla->update([
            'estado' => 'pagado',
            'fecha_pago' => now(),
        ]);

        $this->empleado->refresh();
    }

    public function render()
    {
        return view('livewire.rrhh.empleado-show', [
            'planillas' => $this->empleado->planillas,
        ]);
    }
}
