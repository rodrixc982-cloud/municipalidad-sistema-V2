<?php

namespace App\Livewire\Caja;

use App\Models\Pago;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
class PagoIndex extends Component
{
    use WithPagination;

    public string $busqueda = '';

    public function updatingBusqueda(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $pagos = Pago::with(['contribuyente', 'cajero'])
            ->when($this->busqueda, function ($query) {
                $query->where(function ($q) {
                    $q->where('numero_comprobante', 'like', "%{$this->busqueda}%")
                        ->orWhere('concepto', 'like', "%{$this->busqueda}%")
                        ->orWhereHas('contribuyente', function ($q2) {
                            $q2->where('numero_documento', 'like', "%{$this->busqueda}%")
                                ->orWhere('nombres', 'like', "%{$this->busqueda}%")
                                ->orWhere('apellido_paterno', 'like', "%{$this->busqueda}%")
                                ->orWhere('razon_social', 'like', "%{$this->busqueda}%");
                        });
                });
            })
            ->latest()
            ->paginate(12);

        return view('livewire.caja.pago-index', [
            'pagos' => $pagos,
        ]);
    }
}
