<?php

namespace App\Livewire\Predios;

use App\Models\Predio;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
class PredioIndex extends Component
{
    use WithPagination;

    public string $busqueda = '';

    public function updatingBusqueda(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $predios = Predio::query()
            ->with(['contribuyente', 'declaracionVigente'])
            ->when($this->busqueda, function ($query) {
                $query->where(function ($q) {
                    $q->where('codigo_catastral', 'like', "%{$this->busqueda}%")
                        ->orWhere('direccion', 'like', "%{$this->busqueda}%")
                        ->orWhereHas('contribuyente', function ($q2) {
                            $q2->where('numero_documento', 'like', "%{$this->busqueda}%")
                                ->orWhere('nombres', 'like', "%{$this->busqueda}%")
                                ->orWhere('apellido_paterno', 'like', "%{$this->busqueda}%")
                                ->orWhere('razon_social', 'like', "%{$this->busqueda}%");
                        });
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.predios.predio-index', [
            'predios' => $predios,
        ]);
    }
}
