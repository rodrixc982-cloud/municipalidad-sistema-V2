<?php

namespace App\Livewire\Documentos;

use App\Models\Expediente;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class EditorDocumentos extends Component
{
    // Tipo de documento
    public string $tipoDocumento = 'constancia';

    // Campos comunes
    public string $municipioNombre = 'MUNICIPALIDAD DISTRITAL';
    public string $areaEmisora = 'Área de Rentas';
    public string $fechaDocumento = '';

    // Para documentos ligados a expediente
    public ?int $expedienteId = null;
    public ?Expediente $expediente = null;

    // Campos editables de constancia
    public string $constanciaTitulo = 'CONSTANCIA';
    public string $constanciaCuerpo = '';
    public string $constanciaFirmante = 'EL ALCALDE';

    // Campos editables de resolución
    public string $resolucionNumero = '';
    public string $resolucionVisto = '';
    public string $resolucionConsiderando = '';
    public string $resolucionResuelve = '';

    // Campos de carta libre
    public string $cartaDestinatario = '';
    public string $cartaAsunto = '';
    public string $cartaCuerpo = '';
    public string $cartaRemitente = '';
    public string $cartaCargoRemitente = '';

    // Carta poder
    public string $poderPoderdante = '';
    public string $poderDocumentoPoderdante = '';
    public string $poderApoderado = '';
    public string $poderDocumentoApoderado = '';
    public string $poderMotivo = '';

    public function mount(): void
    {
        $this->fechaDocumento = now()->translatedFormat('d \d\e F \d\e Y');
    }

    public function updatedTipoDocumento(): void
    {
        $this->reset(['expedienteId', 'expediente']);
        $this->cargarPlantilla();
    }

    public function cargarExpediente(): void
    {
        if ($this->expedienteId) {
            $this->expediente = Expediente::with(['contribuyente', 'tipoTramite'])->find($this->expedienteId);
            if ($this->expediente) {
                $this->prellenarDesdeExpediente();
            }
        }
    }

    private function prellenarDesdeExpediente(): void
    {
        $exp = $this->expediente;
        $contrib = $exp->contribuyente;

        if ($this->tipoDocumento === 'constancia') {
            $this->constanciaTitulo = 'CONSTANCIA — '.\Str::upper($exp->tipoTramite->nombre);
            $this->constanciaCuerpo = "La {$this->municipioNombre}, a través de la {$this->areaEmisora}, deja constancia que {$contrib->nombre_completo}, identificado(a) con {$contrib->tipo_documento} N° {$contrib->numero_documento}, ha tramitado el procedimiento de {$exp->tipoTramite->nombre} (Expediente N° {$exp->numero_expediente}), referido a: \"{$exp->asunto}\". Se expide la presente constancia con estado {$exp->estado}.";
        }

        if ($this->tipoDocumento === 'resolucion') {
            $n = str_pad((string) $exp->id, 4, '0', STR_PAD_LEFT);
            $this->resolucionNumero = "R-{$n}-".now()->year."-MDU";
            $this->resolucionVisto = "El expediente N° {$exp->numero_expediente} sobre {$exp->tipoTramite->nombre}, presentado por {$contrib->nombre_completo}, {$contrib->tipo_documento} N° {$contrib->numero_documento}.";
            $this->resolucionConsiderando = "Que conforme al TUPA de la Municipalidad, el procedimiento {$exp->tipoTramite->codigo} fue evaluado por la oficina de {$exp->tipoTramite->area_responsable}, concluyendo dicha evaluación con fecha ".now()->format('d/m/Y').".";
            $this->resolucionResuelve = "ARTÍCULO PRIMERO.- ".strtoupper($exp->estado === 'aprobado' ? 'APROBAR' : 'RESOLVER')." el procedimiento administrativo del expediente N° {$exp->numero_expediente}, referido a \"{$exp->asunto}\", a favor de {$contrib->nombre_completo}.\n\nARTÍCULO SEGUNDO.- ENCARGAR a la oficina de {$exp->tipoTramite->area_responsable} el cumplimiento de la presente resolución.";
        }
    }

    private function cargarPlantilla(): void
    {
        if ($this->tipoDocumento === 'carta') {
            $this->cartaCuerpo = "Tengo el agrado de dirigirme a usted con la finalidad de comunicarle que...\n\n[Complete el cuerpo de la carta aquí]";
            $this->cartaRemitente = 'EL ALCALDE';
        }

        if ($this->tipoDocumento === 'constancia') {
            $this->constanciaCuerpo = "[Ingrese el cuerpo de la constancia aquí o seleccione un expediente para autocompletar]";
        }
    }

    public function render()
    {
        return view('livewire.documentos.editor-documentos', [
            'expedientes' => Expediente::with('contribuyente')->whereIn('estado', ['aprobado', 'finalizado'])->latest()->limit(50)->get(),
        ]);
    }
}
