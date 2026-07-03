<?php

namespace App\Livewire\Predios;

use App\Models\Predio;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class PredioEdit extends Component
{
    public Predio $predio;
    public string $direccion = '';
    public string $distrito = '';
    public float $areaTerreno = 0;
    public float $areaConstruida = 0;
    public string $uso = 'vivienda';
    public string $condicion = 'urbano';

    public function mount(Predio $predio): void
    {
        $this->predio       = $predio;
        $this->direccion    = $predio->direccion;
        $this->distrito     = $predio->distrito;
        $this->areaTerreno  = $predio->area_terreno;
        $this->areaConstruida = $predio->area_construida;
        $this->uso          = $predio->uso;
        $this->condicion    = $predio->condicion;
    }

    public function guardar(): void
    {
        $this->validate([
            'direccion'      => ['required','string','max:255'],
            'distrito'       => ['required','string','max:255'],
            'areaTerreno'    => ['required','numeric','min:0'],
            'areaConstruida' => ['required','numeric','min:0'],
            'uso'            => ['required','in:vivienda,comercio,industria,terreno_sin_construir,otro'],
            'condicion'      => ['required','in:urbano,rustico'],
        ]);

        $this->predio->update([
            'direccion'       => $this->direccion,
            'distrito'        => $this->distrito,
            'area_terreno'    => $this->areaTerreno,
            'area_construida' => $this->areaConstruida,
            'uso'             => $this->uso,
            'condicion'       => $this->condicion,
        ]);

        session()->flash('status', 'Predio actualizado correctamente.');
        $this->redirect(route('predios.show', $this->predio), navigate: true);
    }

    public function render()
    {
        return view('livewire.predios.predio-edit');
    }
}
