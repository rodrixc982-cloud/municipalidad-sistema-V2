<?php

namespace App\Livewire\Licencias;

use App\Models\LicenciaFuncionamiento;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
class LicenciaIndex extends Component
{
    use WithPagination;

    public string $busqueda = '';

    public function updatingBusqueda(): void
    {
        $this->resetPage();
    }

    public function mount(): void
    {
        // Marca como vencidas las licencias cuya fecha ya pasó.
        LicenciaFuncionamiento::where('estado', 'vigente')
            ->whereNotNull('fecha_vencimiento')
            ->whereDate('fecha_vencimiento', '<', now())
            ->update(['estado' => 'vencida']);
    }

    public function render()
    {
        $licencias = LicenciaFuncionamiento::with('contribuyente')
            ->when($this->busqueda, function ($query) {
                $query->where(function ($q) {
                    $q->where('numero_licencia', 'like', "%{$this->busqueda}%")
                        ->orWhere('nombre_comercial', 'like', "%{$this->busqueda}%")
                        ->orWhereHas('contribuyente', function ($q2) {
                            $q2->where('numero_documento', 'like', "%{$this->busqueda}%");
                        });
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.licencias.licencia-index', [
            'licencias' => $licencias,
        ]);
    }
}
