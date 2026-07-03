<?php

namespace App\Livewire\Predios;

use App\Models\Contribuyente;
use App\Models\Predio;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class PredioCreate extends Component
{
    public string $documentoBusqueda = '';

    public ?int $contribuyenteId = null;

    public ?Contribuyente $contribuyenteEncontrado = null;

    public string $direccion = '';

    public string $distrito = '';

    public float $areaTerreno = 0;

    public float $areaConstruida = 0;

    public string $uso = 'vivienda';

    public string $condicion = 'urbano';

    public function buscarContribuyente(): void
    {
        $this->contribuyenteEncontrado = Contribuyente::where('numero_documento', $this->documentoBusqueda)->first();
        $this->contribuyenteId = $this->contribuyenteEncontrado?->id;
    }

    public function guardar(): void
    {
        $this->validate([
            'contribuyenteId' => ['required', 'exists:contribuyentes,id'],
            'direccion' => ['required', 'string', 'max:255'],
            'distrito' => ['required', 'string', 'max:255'],
            'areaTerreno' => ['required', 'numeric', 'min:0'],
            'areaConstruida' => ['required', 'numeric', 'min:0'],
            'uso' => ['required', 'in:vivienda,comercio,industria,terreno_sin_construir,otro'],
            'condicion' => ['required', 'in:urbano,rustico'],
        ], [
            'contribuyenteId.required' => 'Busca y selecciona un contribuyente propietario válido.',
            'direccion.required' => 'Ingresa la dirección del predio.',
            'distrito.required' => 'Ingresa el distrito.',
        ]);

        $predio = Predio::create([
            'codigo_catastral' => Predio::generarCodigoCatastral(),
            'contribuyente_id' => $this->contribuyenteId,
            'direccion' => $this->direccion,
            'distrito' => $this->distrito,
            'area_terreno' => $this->areaTerreno,
            'area_construida' => $this->areaConstruida,
            'uso' => $this->uso,
            'condicion' => $this->condicion,
        ]);

        session()->flash('status', "Predio {$predio->codigo_catastral} registrado correctamente.");

        $this->redirect(route('predios.show', $predio), navigate: true);
    }

    public function render()
    {
        return view('livewire.predios.predio-create');
    }
}
