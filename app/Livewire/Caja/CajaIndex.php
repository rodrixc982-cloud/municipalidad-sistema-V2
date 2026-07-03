<?php

namespace App\Livewire\Caja;

use App\Models\Contribuyente;
use App\Models\DeclaracionPredio;
use App\Models\Expediente;
use App\Models\Pago;
use App\Models\Predio;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class CajaIndex extends Component
{
    // Búsqueda de contribuyente
    public string $documentoBusqueda = '';

    public ?Contribuyente $contribuyente = null;

    public bool $buscado = false;

    // Selección de concepto a cobrar
    public string $tipoConcepto = 'expediente'; // expediente | predio

    public ?int $expedienteId = null;

    public ?int $predioId = null;

    public ?int $declaracionId = null;

    // Datos del pago
    public string $tipoComprobante = 'recibo';

    public string $metodoPago = 'efectivo';

    public ?int $ultimoPagoId = null;

    public function buscarContribuyente(): void
    {
        $this->buscado = true;
        $this->contribuyente = Contribuyente::where('numero_documento', $this->documentoBusqueda)->first();
        $this->reset(['expedienteId', 'predioId', 'declaracionId', 'ultimoPagoId']);
    }

    public function getExpedientesPendientesProperty()
    {
        if (! $this->contribuyente) {
            return collect();
        }

        return Expediente::with('tipoTramite')
            ->where('contribuyente_id', $this->contribuyente->id)
            ->whereDoesntHave('pagos')
            ->whereHas('tipoTramite', fn ($q) => $q->where('costo', '>', 0))
            ->get();
    }

    public function getDeclaracionesPendientesProperty()
    {
        if (! $this->contribuyente) {
            return collect();
        }

        return DeclaracionPredio::with('predio')
            ->whereHas('predio', fn ($q) => $q->where('contribuyente_id', $this->contribuyente->id))
            ->get();
    }

    public function getMontoCalculadoProperty(): float
    {
        if ($this->tipoConcepto === 'expediente' && $this->expedienteId) {
            $expediente = Expediente::with('tipoTramite')->find($this->expedienteId);

            return (float) ($expediente?->tipoTramite->costo ?? 0);
        }

        if ($this->tipoConcepto === 'predio' && $this->declaracionId) {
            $declaracion = DeclaracionPredio::find($this->declaracionId);

            return (float) ($declaracion?->impuesto_anual ?? 0);
        }

        return 0;
    }

    public function registrarPago(): void
    {
        $this->validate([
            'metodoPago' => ['required', 'in:efectivo,tarjeta,transferencia'],
            'tipoComprobante' => ['required', 'in:boleta,recibo'],
        ]);

        if (! $this->contribuyente) {
            $this->addError('documentoBusqueda', 'Busca primero al contribuyente.');

            return;
        }

        $datos = [
            'numero_comprobante' => Pago::generarNumeroComprobante($this->tipoComprobante),
            'tipo_comprobante' => $this->tipoComprobante,
            'contribuyente_id' => $this->contribuyente->id,
            'metodo_pago' => $this->metodoPago,
            'cajero_id' => auth()->id(),
            'monto' => $this->montoCalculado,
        ];

        if ($this->tipoConcepto === 'expediente') {
            if (! $this->expedienteId) {
                $this->addError('expedienteId', 'Selecciona el expediente a cobrar.');

                return;
            }

            $expediente = Expediente::with('tipoTramite')->findOrFail($this->expedienteId);
            $datos['expediente_id'] = $expediente->id;
            $datos['concepto'] = "Tasa TUPA: {$expediente->tipoTramite->nombre} ({$expediente->numero_expediente})";
        } else {
            if (! $this->declaracionId) {
                $this->addError('declaracionId', 'Selecciona la declaración de predio a cobrar.');

                return;
            }

            $declaracion = DeclaracionPredio::with('predio')->findOrFail($this->declaracionId);
            $datos['predio_id'] = $declaracion->predio_id;
            $datos['concepto'] = "Impuesto Predial {$declaracion->anio} - {$declaracion->predio->codigo_catastral}";
        }

        $pago = Pago::create($datos);

        $this->ultimoPagoId = $pago->id;
        $this->reset(['expedienteId', 'predioId', 'declaracionId']);

        session()->flash('status', "Pago {$pago->numero_comprobante} registrado correctamente.");
    }

    public function render()
    {
        return view('livewire.caja.caja-index');
    }
}
