<?php

namespace App\Livewire\Predios;

use App\Models\DeclaracionPredio;
use App\Models\Predio;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class PredioShow extends Component
{
    public Predio $predio;

    public int $anio;

    public float $valorTerreno = 0;

    public float $valorConstruccion = 0;

    public function mount(Predio $predio): void
    {
        $this->predio = $predio;
        $this->anio = now()->year;
    }

    public function getImpuestoCalculadoProperty(): float
    {
        $autovaluo = $this->valorTerreno + $this->valorConstruccion;

        return DeclaracionPredio::calcularImpuesto($autovaluo);
    }

    public function registrarDeclaracion(): void
    {
        $this->validate([
            'anio' => ['required', 'integer', 'min:2000', 'max:2100'],
            'valorTerreno' => ['required', 'numeric', 'min:0'],
            'valorConstruccion' => ['required', 'numeric', 'min:0'],
        ], [
            'anio.required' => 'Indica el año de la declaración.',
        ]);

        $existe = $this->predio->declaraciones()->where('anio', $this->anio)->exists();

        if ($existe) {
            $this->addError('anio', 'Ya existe una declaración registrada para este año.');

            return;
        }

        $autovaluo = $this->valorTerreno + $this->valorConstruccion;
        $impuesto = DeclaracionPredio::calcularImpuesto($autovaluo);

        $this->predio->declaraciones()->create([
            'anio' => $this->anio,
            'valor_terreno' => $this->valorTerreno,
            'valor_construccion' => $this->valorConstruccion,
            'valor_autovaluo' => $autovaluo,
            'impuesto_anual' => $impuesto,
            'registrado_por' => auth()->id(),
        ]);

        $this->valorTerreno = 0;
        $this->valorConstruccion = 0;
        $this->predio->refresh();

        session()->flash('status', "Declaración de autovalúo {$this->anio} registrada. Impuesto anual: S/ ".number_format($impuesto, 2));
    }

    public function render()
    {
        return view('livewire.predios.predio-show', [
            'declaraciones' => $this->predio->declaraciones,
        ]);
    }
}
