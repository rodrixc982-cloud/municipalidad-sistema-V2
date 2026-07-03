<?php

namespace App\Livewire\Licencias;

use App\Models\Contribuyente;
use App\Models\LicenciaFuncionamiento;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class LicenciaCreate extends Component
{
    public string $documentoBusqueda = '';

    public ?int $contribuyenteId = null;

    public ?Contribuyente $contribuyenteEncontrado = null;

    public string $nombreComercial = '';

    public string $giroNegocio = '';

    public string $direccionLocal = '';

    public string $fechaEmision = '';

    public string $fechaVencimiento = '';

    public function mount(): void
    {
        $this->fechaEmision = now()->format('Y-m-d');
        $this->fechaVencimiento = now()->addYear()->format('Y-m-d');
    }

    public function buscarContribuyente(): void
    {
        $this->contribuyenteEncontrado = Contribuyente::where('numero_documento', $this->documentoBusqueda)->first();
        $this->contribuyenteId = $this->contribuyenteEncontrado?->id;
    }

    public function guardar(): void
    {
        $this->validate([
            'contribuyenteId' => ['required', 'exists:contribuyentes,id'],
            'nombreComercial' => ['required', 'string', 'max:255'],
            'giroNegocio' => ['required', 'string', 'max:255'],
            'direccionLocal' => ['required', 'string', 'max:255'],
            'fechaEmision' => ['required', 'date'],
            'fechaVencimiento' => ['required', 'date', 'after:fechaEmision'],
        ], [
            'contribuyenteId.required' => 'Busca y selecciona un titular válido.',
            'fechaVencimiento.after' => 'La fecha de vencimiento debe ser posterior a la de emisión.',
        ]);

        $licencia = LicenciaFuncionamiento::create([
            'numero_licencia' => 'LIC-'.now()->year.'-'.str_pad((string) (LicenciaFuncionamiento::count() + 1), 5, '0', STR_PAD_LEFT),
            'contribuyente_id' => $this->contribuyenteId,
            'nombre_comercial' => $this->nombreComercial,
            'giro_negocio' => $this->giroNegocio,
            'direccion_local' => $this->direccionLocal,
            'fecha_emision' => $this->fechaEmision,
            'fecha_vencimiento' => $this->fechaVencimiento,
            'estado' => 'vigente',
        ]);

        session()->flash('status', "Licencia {$licencia->numero_licencia} registrada correctamente.");

        $this->redirect(route('licencias.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.licencias.licencia-create');
    }
}
