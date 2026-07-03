<?php

namespace App\Livewire\MesaPartes;

use App\Models\Contribuyente;
use App\Models\Expediente;
use App\Models\ExpedienteMovimiento;
use App\Models\TipoTramite;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class ExpedienteCreate extends Component
{
    // Búsqueda de contribuyente
    public string $documentoBusqueda = '';

    public ?int $contribuyenteId = null;

    public ?Contribuyente $contribuyenteEncontrado = null;

    public bool $mostrarFormularioContribuyente = false;

    // Datos del nuevo contribuyente (si no existe)
    public string $nuevoTipoDocumento = 'DNI';

    public string $nuevoNumeroDocumento = '';

    public string $nuevoNombres = '';

    public string $nuevoApellidoPaterno = '';

    public string $nuevoApellidoMaterno = '';

    public string $nuevaRazonSocial = '';

    public string $nuevoTipoPersona = 'natural';

    public string $nuevaDireccion = '';

    public string $nuevoTelefono = '';

    // Datos del expediente
    public ?int $tipoTramiteId = null;

    public string $asunto = '';

    public string $descripcion = '';

    public function buscarContribuyente(): void
    {
        $this->contribuyenteEncontrado = Contribuyente::where('numero_documento', $this->documentoBusqueda)->first();

        if ($this->contribuyenteEncontrado) {
            $this->contribuyenteId = $this->contribuyenteEncontrado->id;
            $this->mostrarFormularioContribuyente = false;
        } else {
            $this->contribuyenteId = null;
            $this->mostrarFormularioContribuyente = true;
            $this->nuevoNumeroDocumento = $this->documentoBusqueda;
        }
    }

    public function guardar(): void
    {
        $reglas = [
            'tipoTramiteId' => ['required', 'exists:tipos_tramite,id'],
            'asunto' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string', 'max:2000'],
        ];

        if (! $this->contribuyenteId) {
            $reglas = array_merge($reglas, [
                'nuevoTipoPersona' => ['required', 'in:natural,juridica'],
                'nuevoTipoDocumento' => ['required', 'in:DNI,RUC,CE'],
                'nuevoNumeroDocumento' => ['required', 'string', 'max:20', 'unique:contribuyentes,numero_documento'],
                'nuevaDireccion' => ['nullable', 'string', 'max:255'],
                'nuevoTelefono' => ['nullable', 'string', 'max:20'],
            ]);

            if ($this->nuevoTipoPersona === 'juridica') {
                $reglas['nuevaRazonSocial'] = ['required', 'string', 'max:255'];
            } else {
                $reglas['nuevoNombres'] = ['required', 'string', 'max:255'];
                $reglas['nuevoApellidoPaterno'] = ['required', 'string', 'max:255'];
            }
        }

        $this->validate($reglas, [
            'tipoTramiteId.required' => 'Selecciona el tipo de trámite.',
            'asunto.required' => 'Describe brevemente el asunto del expediente.',
            'nuevoNumeroDocumento.unique' => 'Ya existe un contribuyente con este número de documento.',
            'nuevaRazonSocial.required' => 'Ingresa la razón social.',
            'nuevoNombres.required' => 'Ingresa los nombres del contribuyente.',
            'nuevoApellidoPaterno.required' => 'Ingresa el apellido paterno.',
        ]);

        if (! $this->contribuyenteId) {
            $contribuyente = Contribuyente::create([
                'tipo_persona' => $this->nuevoTipoPersona,
                'tipo_documento' => $this->nuevoTipoDocumento,
                'numero_documento' => $this->nuevoNumeroDocumento,
                'nombres' => $this->nuevoTipoPersona === 'natural' ? $this->nuevoNombres : null,
                'apellido_paterno' => $this->nuevoTipoPersona === 'natural' ? $this->nuevoApellidoPaterno : null,
                'apellido_materno' => $this->nuevoTipoPersona === 'natural' ? $this->nuevoApellidoMaterno : null,
                'razon_social' => $this->nuevoTipoPersona === 'juridica' ? $this->nuevaRazonSocial : null,
                'direccion' => $this->nuevaDireccion,
                'telefono' => $this->nuevoTelefono,
            ]);

            $this->contribuyenteId = $contribuyente->id;
        }

        $tipoTramite = TipoTramite::findOrFail($this->tipoTramiteId);

        $expediente = Expediente::create([
            'numero_expediente' => Expediente::generarNumero(),
            'contribuyente_id' => $this->contribuyenteId,
            'tipo_tramite_id' => $tipoTramite->id,
            'asunto' => $this->asunto,
            'descripcion' => $this->descripcion,
            'estado' => 'registrado',
            'area_actual' => $tipoTramite->area_responsable,
            'registrado_por' => auth()->id(),
            'fecha_limite' => now()->addDays($tipoTramite->plazo_dias),
        ]);

        ExpedienteMovimiento::create([
            'expediente_id' => $expediente->id,
            'area_origen' => null,
            'area_destino' => $tipoTramite->area_responsable,
            'accion' => 'Registrado',
            'comentario' => 'Expediente registrado en mesa de partes.',
            'usuario_id' => auth()->id(),
        ]);

        session()->flash('status', "Expediente {$expediente->numero_expediente} registrado correctamente.");

        $this->redirect(route('expedientes.show', $expediente), navigate: true);
    }

    public function render()
    {
        return view('livewire.mesa-partes.expediente-create', [
            'tiposTramite' => TipoTramite::where('activo', true)->orderBy('nombre')->get(),
        ]);
    }
}
