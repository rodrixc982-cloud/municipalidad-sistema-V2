<?php

namespace App\Livewire\MesaPartes;

use App\Models\Expediente;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
class ExpedienteIndex extends Component
{
    use WithPagination;

    public string $busqueda = '';
    public string $filtroEstado = '';
    public bool $modalEliminar = false;
    public ?int $eliminarId = null;

    public function updatingBusqueda(): void { $this->resetPage(); }
    public function updatingFiltroEstado(): void { $this->resetPage(); }

    public function confirmarEliminar(int $id): void
    {
        $this->eliminarId = $id;
        $this->modalEliminar = true;
    }

    public function eliminar(): void
    {
        Expediente::findOrFail($this->eliminarId)->delete();
        $this->modalEliminar = false;
        session()->flash('status', 'Expediente eliminado.');
    }

    public function render()
    {
        return view('livewire.mesa-partes.expediente-index', [
            'expedientes' => Expediente::with(['contribuyente', 'tipoTramite'])
                ->when($this->busqueda, fn($q) => $q->where(function($q2) {
                    $q2->where('numero_expediente','like',"%{$this->busqueda}%")
                       ->orWhere('asunto','like',"%{$this->busqueda}%")
                       ->orWhereHas('contribuyente', fn($q3) =>
                           $q3->where('numero_documento','like',"%{$this->busqueda}%")
                              ->orWhere('nombres','like',"%{$this->busqueda}%")
                              ->orWhere('apellido_paterno','like',"%{$this->busqueda}%")
                              ->orWhere('razon_social','like',"%{$this->busqueda}%"));
                }))
                ->when($this->filtroEstado, fn($q) => $q->where('estado', $this->filtroEstado))
                ->latest()->paginate(10),
        ]);
    }
}
