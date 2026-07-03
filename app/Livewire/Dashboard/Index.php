<?php

namespace App\Livewire\Dashboard;

use App\Models\Empleado;
use App\Models\Expediente;
use App\Models\LicenciaFuncionamiento;
use App\Models\Pago;
use App\Models\Predio;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class Index extends Component
{
    public function render()
    {
        // Métricas de tarjetas
        $totalExpedientes = Expediente::count();
        $expedientesPendientes = Expediente::whereIn('estado', ['registrado', 'en_proceso', 'observado'])->count();
        $expedientesVencidos = Expediente::whereIn('estado', ['registrado', 'en_proceso', 'observado'])
            ->whereNotNull('fecha_limite')->whereDate('fecha_limite', '<', now())->count();
        $totalPredios = Predio::count();
        $licenciasVigentes = LicenciaFuncionamiento::where('estado', 'vigente')->count();
        $licenciasVencidas = LicenciaFuncionamiento::where('estado', 'vencida')->count();
        $totalEmpleados = Empleado::where('activo', true)->count();
        $recaudacionMes = Pago::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('monto');
        $recaudacionAnio = Pago::whereYear('created_at', now()->year)->sum('monto');

        // Gráfico 1: Recaudación mensual últimos 6 meses (línea)
        $recaudacionMensual = collect(range(5, 0))->map(function ($mesesAtras) {
            $fecha = now()->subMonths($mesesAtras);
            return [
                'mes' => $fecha->translatedFormat('M'),
                'monto' => (float) Pago::whereYear('created_at', $fecha->year)
                    ->whereMonth('created_at', $fecha->month)->sum('monto'),
            ];
        });

        // Gráfico 2: Expedientes por estado (donut)
        $expedientesPorEstado = Expediente::selectRaw('estado, count(*) as total')
            ->groupBy('estado')->pluck('total', 'estado');

        // Gráfico 3: Expedientes registrados por mes últimos 6 meses (barras)
        $expedientesMensuales = collect(range(5, 0))->map(function ($mesesAtras) {
            $fecha = now()->subMonths($mesesAtras);
            return [
                'mes' => $fecha->translatedFormat('M'),
                'total' => Expediente::whereYear('created_at', $fecha->year)
                    ->whereMonth('created_at', $fecha->month)->count(),
            ];
        });

        // Gráfico 4: Distribución tipos de trámite top 5 (barras horizontales)
        $tramitesTop = Expediente::join('tipos_tramite', 'expedientes.tipo_tramite_id', '=', 'tipos_tramite.id')
            ->selectRaw('tipos_tramite.nombre, count(*) as total')
            ->groupBy('tipos_tramite.nombre')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        // Actividad reciente
        $actividadReciente = Expediente::with(['contribuyente', 'tipoTramite'])->latest()->limit(5)->get();

        return view('livewire.dashboard.index', compact(
            'totalExpedientes', 'expedientesPendientes', 'expedientesVencidos',
            'totalPredios', 'licenciasVigentes', 'licenciasVencidas',
            'totalEmpleados', 'recaudacionMes', 'recaudacionAnio',
            'recaudacionMensual', 'expedientesPorEstado', 'expedientesMensuales',
            'tramitesTop', 'actividadReciente'
        ));
    }
}
