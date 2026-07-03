<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\LicenciaFuncionamiento;
use App\Models\Pago;
use App\Models\Planilla;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DocumentoPdfController extends Controller
{
    public function comprobantePago(Pago $pago)
    {
        $pago->load(['contribuyente', 'cajero', 'expediente.tipoTramite', 'predio']);
        return Pdf::loadView('pdf.comprobante-pago', compact('pago'))
            ->setPaper('a4')->stream("{$pago->numero_comprobante}.pdf");
    }

    public function constanciaExpediente(Expediente $expediente)
    {
        $expediente->load(['contribuyente', 'tipoTramite']);
        return Pdf::loadView('pdf.constancia', compact('expediente'))
            ->setPaper('a4')->stream("Constancia-{$expediente->numero_expediente}.pdf");
    }

    public function resolucionExpediente(Expediente $expediente)
    {
        $expediente->load(['contribuyente', 'tipoTramite']);
        $numeroResolucion = 'R-'.str_pad((string) $expediente->id, 4, '0', STR_PAD_LEFT).'-'.now()->year.'-MDU';
        return Pdf::loadView('pdf.resolucion', compact('expediente', 'numeroResolucion'))
            ->setPaper('a4')->stream("Resolucion-{$expediente->numero_expediente}.pdf");
    }

    public function cartaPoder(Request $request)
    {
        $datos = $request->validate([
            'poderdante'           => ['required', 'string', 'max:255'],
            'poderdante_documento' => ['required', 'string', 'max:20'],
            'apoderado'            => ['required', 'string', 'max:255'],
            'apoderado_documento'  => ['required', 'string', 'max:20'],
            'motivo'               => ['required', 'string', 'max:1000'],
        ]);
        return Pdf::loadView('pdf.carta-poder', $datos)->setPaper('a4')->stream('Carta-Poder.pdf');
    }

    public function licencia(LicenciaFuncionamiento $licencia)
    {
        $licencia->load('contribuyente');
        return Pdf::loadView('pdf.licencia', compact('licencia'))
            ->setPaper('a4')->stream("{$licencia->numero_licencia}.pdf");
    }

    public function boletaPlanilla(Planilla $planilla)
    {
        $planilla->load('empleado');
        return Pdf::loadView('pdf.boleta-planilla', compact('planilla'))
            ->setPaper('a4')->stream("Boleta-{$planilla->empleado->dni}-{$planilla->mes}-{$planilla->anio}.pdf");
    }

    public function editorPdf(Request $request)
    {
        $tipo = $request->input('tipo', 'constancia');
        $datos = $request->all();
        $view = match($tipo) {
            'resolucion'  => 'pdf.editor-resolucion',
            'carta'       => 'pdf.editor-carta',
            'carta-poder' => 'pdf.editor-carta-poder',
            default       => 'pdf.editor-constancia',
        };
        return Pdf::loadView($view, $datos)->setPaper('a4')->stream("Documento-{$tipo}.pdf");
    }
}
