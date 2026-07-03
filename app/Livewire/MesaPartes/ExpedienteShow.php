<?php

namespace App\Livewire\MesaPartes;

use App\Models\Expediente;
use App\Models\ExpedienteMovimiento;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class ExpedienteShow extends Component
{
    public Expediente $expediente;

    public string $accion = 'Derivado';

    public string $areaDestino = '';

    public string $comentario = '';

    public string $nuevoEstado = '';

    public function mount(Expediente $expediente): void
    {
        $this->expediente = $expediente;
        $this->areaDestino = $expediente->area_actual;
        $this->nuevoEstado = $expediente->estado;
    }

    public function registrarMovimiento(): void
    {
        $this->validate([
            'accion' => ['required', 'string'],
            'areaDestino' => ['required', 'string'],
            'comentario' => ['nullable', 'string', 'max:1000'],
            'nuevoEstado' => ['required', 'in:registrado,en_proceso,observado,aprobado,rechazado,finalizado'],
        ]);

        ExpedienteMovimiento::create([
            'expediente_id' => $this->expediente->id,
            'area_origen' => $this->expediente->area_actual,
            'area_destino' => $this->areaDestino,
            'accion' => $this->accion,
            'comentario' => $this->comentario,
            'usuario_id' => auth()->id(),
        ]);

        $this->expediente->update([
            'area_actual' => $this->areaDestino,
            'estado' => $this->nuevoEstado,
        ]);

        $this->comentario = '';
        $this->expediente->refresh();

        session()->flash('status', 'Movimiento registrado correctamente.');
    }

    public function render()
    {
        return view('livewire.mesa-partes.expediente-show', [
            'movimientos' => $this->expediente->movimientos()->with('usuario')->get(),
        ]);
    }
}
