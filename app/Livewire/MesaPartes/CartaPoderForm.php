<?php

namespace App\Livewire\MesaPartes;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class CartaPoderForm extends Component
{
    public string $poderdante = '';

    public string $poderdanteDocumento = '';

    public string $apoderado = '';

    public string $apoderadoDocumento = '';

    public string $motivo = '';

    public function render()
    {
        return view('livewire.mesa-partes.carta-poder-form');
    }
}
