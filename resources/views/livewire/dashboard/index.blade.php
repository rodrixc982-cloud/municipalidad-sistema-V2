<div x-data x-init="initCharts()" class="space-y-6">

    {{-- Fila 1: Tarjetas KPI --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white border border-[#EDEAE2] rounded-2xl p-5 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <span class="text-[12.5px] text-[#6B6862] font-medium">Expedientes totales</span>
                <div class="w-9 h-9 rounded-xl bg-[#7A1F2B]/10 flex items-center justify-center">
                    <svg viewBox="0 0 24 24" class="w-4.5 h-4.5 text-[#7A1F2B]" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 13h6M9 17h4" stroke-linecap="round"/></svg>
                </div>
            </div>
            <p class="text-[2rem] font-bold text-[#1C1B19] tracking-tight">{{ number_format($totalExpedientes) }}</p>
            @if ($expedientesVencidos > 0)
                <p class="text-[12px] text-red-500 mt-1 flex items-center gap-1">
                    <svg viewBox="0 0 24 24" class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v4M12 17h.01"/><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/></svg>
                    {{ $expedientesVencidos }} vencidos
                </p>
            @else
                <p class="text-[12px] text-emerald-600 mt-1">✓ Sin vencidos</p>
            @endif
        </div>

        <div class="bg-white border border-[#EDEAE2] rounded-2xl p-5 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <span class="text-[12.5px] text-[#6B6862] font-medium">En proceso</span>
                <div class="w-9 h-9 rounded-xl bg-amber-100 flex items-center justify-center">
                    <svg viewBox="0 0 24 24" class="w-4.5 h-4.5 text-amber-600" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3" stroke-linecap="round"/></svg>
                </div>
            </div>
            <p class="text-[2rem] font-bold text-[#1C1B19] tracking-tight">{{ number_format($expedientesPendientes) }}</p>
            <p class="text-[12px] text-[#A8A498] mt-1">Requieren atención</p>
        </div>

        <div class="bg-white border border-[#EDEAE2] rounded-2xl p-5 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <span class="text-[12.5px] text-[#6B6862] font-medium">Recaudación mes</span>
                <div class="w-9 h-9 rounded-xl bg-emerald-100 flex items-center justify-center">
                    <svg viewBox="0 0 24 24" class="w-4.5 h-4.5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" stroke-linecap="round"/></svg>
                </div>
            </div>
            <p class="text-[2rem] font-bold text-[#1C1B19] tracking-tight">S/&nbsp;{{ number_format($recaudacionMes, 0) }}</p>
            <p class="text-[12px] text-[#A8A498] mt-1">Total año: S/ {{ number_format($recaudacionAnio, 0) }}</p>
        </div>

        <div class="bg-white border border-[#EDEAE2] rounded-2xl p-5 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <span class="text-[12.5px] text-[#6B6862] font-medium">Licencias vigentes</span>
                <div class="w-9 h-9 rounded-xl bg-blue-100 flex items-center justify-center">
                    <svg viewBox="0 0 24 24" class="w-4.5 h-4.5 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" stroke-linecap="round"/></svg>
                </div>
            </div>
            <p class="text-[2rem] font-bold text-[#1C1B19] tracking-tight">{{ number_format($licenciasVigentes) }}</p>
            @if ($licenciasVencidas > 0)
                <p class="text-[12px] text-red-500 mt-1">{{ $licenciasVencidas }} vencidas</p>
            @else
                <p class="text-[12px] text-[#A8A498] mt-1">{{ $totalPredios }} predios · {{ $totalEmpleados }} empleados</p>
            @endif
        </div>
    </div>

    {{-- Fila 2: Gráfico de recaudación (grande) + Donut de estados --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white border border-[#EDEAE2] rounded-2xl p-6 shadow-sm">
            <h3 class="text-[14px] font-semibold text-[#1C1B19] mb-1">Recaudación mensual</h3>
            <p class="text-[12.5px] text-[#A8A498] mb-4">Últimos 6 meses</p>
            <div id="chart-recaudacion" style="min-height:220px"></div>
        </div>

        <div class="bg-white border border-[#EDEAE2] rounded-2xl p-6 shadow-sm">
            <h3 class="text-[14px] font-semibold text-[#1C1B19] mb-1">Expedientes por estado</h3>
            <p class="text-[12.5px] text-[#A8A498] mb-4">Distribución actual</p>
            <div id="chart-estados" style="min-height:220px"></div>
        </div>
    </div>

    {{-- Fila 3: Barras de expedientes + top trámites --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white border border-[#EDEAE2] rounded-2xl p-6 shadow-sm">
            <h3 class="text-[14px] font-semibold text-[#1C1B19] mb-1">Expedientes registrados</h3>
            <p class="text-[12.5px] text-[#A8A498] mb-4">Por mes, últimos 6 meses</p>
            <div id="chart-expedientes-mes" style="min-height:220px"></div>
        </div>

        <div class="bg-white border border-[#EDEAE2] rounded-2xl p-6 shadow-sm">
            <h3 class="text-[14px] font-semibold text-[#1C1B19] mb-1">Trámites más solicitados</h3>
            <p class="text-[12.5px] text-[#A8A498] mb-4">Top 5 por volumen</p>
            <div id="chart-tramites" style="min-height:220px"></div>
        </div>
    </div>

    {{-- Fila 4: Actividad reciente + accesos rápidos --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white border border-[#EDEAE2] rounded-2xl shadow-sm">
            <div class="flex items-center justify-between px-6 py-4 border-b border-[#EDEAE2]">
                <h3 class="text-[14px] font-semibold text-[#1C1B19]">Actividad reciente</h3>
                <a href="{{ route('expedientes.index') }}" wire:navigate class="text-[12.5px] text-[#7A1F2B] hover:underline">Ver todos →</a>
            </div>
            <div class="divide-y divide-[#F2EFE8]">
                @forelse ($actividadReciente as $exp)
                    <div class="flex items-center gap-4 px-6 py-3.5">
                        <div class="w-8 h-8 rounded-xl bg-[#7A1F2B]/10 flex items-center justify-center flex-shrink-0">
                            <svg viewBox="0 0 24 24" class="w-4 h-4 text-[#7A1F2B]" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6" stroke-linecap="round"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-[13.5px] font-medium text-[#1C1B19] truncate">{{ $exp->numero_expediente }}</p>
                            <p class="text-[12px] text-[#A8A498] truncate">{{ $exp->contribuyente?->nombre_completo }} · {{ $exp->tipoTramite?->nombre }}</p>
                        </div>
                        <span class="text-[11px] px-2 py-1 rounded-full font-medium whitespace-nowrap {{ $exp->colorEstado() }}">
                            {{ str($exp->estado)->replace('_', ' ')->ucfirst() }}
                        </span>
                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-[13.5px] text-[#A8A498]">Sin expedientes aún.</div>
                @endforelse
            </div>
        </div>

        {{-- Accesos rápidos --}}
        <div class="space-y-3">
            <h3 class="text-[13.5px] font-semibold text-[#1C1B19] px-1">Accesos rápidos</h3>
            <a href="{{ route('expedientes.create') }}" wire:navigate class="flex items-center gap-3 p-4 bg-white border border-[#EDEAE2] rounded-2xl hover:border-[#7A1F2B]/30 hover:bg-[#FEF9F9] transition shadow-sm group">
                <div class="w-10 h-10 rounded-xl bg-[#7A1F2B] flex items-center justify-center flex-shrink-0">
                    <svg viewBox="0 0 24 24" class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg>
                </div>
                <div>
                    <p class="text-[13.5px] font-semibold text-[#1C1B19]">Nuevo expediente</p>
                    <p class="text-[12px] text-[#A8A498]">Mesa de partes</p>
                </div>
            </a>
            <a href="{{ route('caja.index') }}" wire:navigate class="flex items-center gap-3 p-4 bg-white border border-[#EDEAE2] rounded-2xl hover:border-emerald-300 hover:bg-emerald-50/40 transition shadow-sm">
                <div class="w-10 h-10 rounded-xl bg-emerald-600 flex items-center justify-center flex-shrink-0">
                    <svg viewBox="0 0 24 24" class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" stroke-linecap="round"/></svg>
                </div>
                <div>
                    <p class="text-[13.5px] font-semibold text-[#1C1B19]">Registrar cobro</p>
                    <p class="text-[12px] text-[#A8A498]">Caja / recaudación</p>
                </div>
            </a>
            <a href="{{ route('predios.create') }}" wire:navigate class="flex items-center gap-3 p-4 bg-white border border-[#EDEAE2] rounded-2xl hover:border-blue-300 hover:bg-blue-50/40 transition shadow-sm">
                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center flex-shrink-0">
                    <svg viewBox="0 0 24 24" class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 9.5 12 3l9 6.5V20a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z" stroke-linejoin="round"/></svg>
                </div>
                <div>
                    <p class="text-[13.5px] font-semibold text-[#1C1B19]">Registrar predio</p>
                    <p class="text-[12px] text-[#A8A498]">Catastro</p>
                </div>
            </a>
            <a href="{{ route('carta-poder.form') }}" wire:navigate class="flex items-center gap-3 p-4 bg-white border border-[#EDEAE2] rounded-2xl hover:border-purple-300 hover:bg-purple-50/40 transition shadow-sm">
                <div class="w-10 h-10 rounded-xl bg-purple-600 flex items-center justify-center flex-shrink-0">
                    <svg viewBox="0 0 24 24" class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 13h6M9 17h4" stroke-linecap="round"/></svg>
                </div>
                <div>
                    <p class="text-[13.5px] font-semibold text-[#1C1B19]">Carta poder PDF</p>
                    <p class="text-[12px] text-[#A8A498]">Documento instantáneo</p>
                </div>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
function initCharts() {
    const colorPrimario = '#7A1F2B';
    const colorGrid = '#F2EFE8';
    const fontFamily = "'Inter', ui-sans-serif, sans-serif";

    const optsBase = {
        chart: { fontFamily, toolbar: { show: false }, zoom: { enabled: false } },
        grid: { borderColor: colorGrid, strokeDashArray: 4 },
        tooltip: { theme: 'light' },
        xaxis: { axisBorder: { show: false }, axisTicks: { show: false }, labels: { style: { fontSize: '12px', colors: '#A8A498' } } },
        yaxis: { labels: { style: { fontSize: '12px', colors: '#A8A498' } } },
    };

    // Gráfico 1: Recaudación mensual — área con gradiente
    const datosRecaudacion = @json($recaudacionMensual);
    new ApexCharts(document.getElementById('chart-recaudacion'), {
        ...optsBase,
        chart: { ...optsBase.chart, type: 'area', height: 220 },
        series: [{ name: 'Recaudado (S/)', data: datosRecaudacion.map(d => d.monto) }],
        xaxis: { ...optsBase.xaxis, categories: datosRecaudacion.map(d => d.mes) },
        yaxis: { labels: { style: { fontSize: '12px', colors: '#A8A498' }, formatter: v => 'S/ ' + v.toLocaleString() } },
        colors: [colorPrimario],
        fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.35, opacityTo: 0.02, stops: [0, 100] } },
        stroke: { curve: 'smooth', width: 2.5 },
        dataLabels: { enabled: false },
    }).render();

    // Gráfico 2: Donut de estados
    const estados = @json($expedientesPorEstado);
    const estadoLabels = Object.keys(estados).map(e => e.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase()));
    const estadoValores = Object.values(estados);
    new ApexCharts(document.getElementById('chart-estados'), {
        chart: { fontFamily, type: 'donut', height: 220 },
        series: estadoValores,
        labels: estadoLabels,
        colors: [colorPrimario, '#C0392B', '#E67E22', '#27AE60', '#2980B9', '#8E44AD'],
        legend: { position: 'bottom', fontSize: '12px', labels: { colors: '#6B6862' } },
        dataLabels: { enabled: false },
        plotOptions: { pie: { donut: { size: '60%' } } },
        tooltip: { theme: 'light' },
    }).render();

    // Gráfico 3: Barras expedientes mensuales
    const datosExpedientes = @json($expedientesMensuales);
    new ApexCharts(document.getElementById('chart-expedientes-mes'), {
        ...optsBase,
        chart: { ...optsBase.chart, type: 'bar', height: 220 },
        series: [{ name: 'Expedientes', data: datosExpedientes.map(d => d.total) }],
        xaxis: { ...optsBase.xaxis, categories: datosExpedientes.map(d => d.mes) },
        colors: [colorPrimario],
        plotOptions: { bar: { borderRadius: 6, columnWidth: '50%' } },
        dataLabels: { enabled: false },
    }).render();

    // Gráfico 4: Barras horizontales top trámites
    const tramites = @json($tramitesTop);
    new ApexCharts(document.getElementById('chart-tramites'), {
        ...optsBase,
        chart: { ...optsBase.chart, type: 'bar', height: 220 },
        series: [{ name: 'Expedientes', data: tramites.map(t => t.total) }],
        xaxis: { ...optsBase.xaxis, categories: tramites.map(t => t.nombre.length > 22 ? t.nombre.substring(0, 22) + '…' : t.nombre) },
        colors: ['#C0392B'],
        plotOptions: { bar: { horizontal: true, borderRadius: 5, barHeight: '60%' } },
        dataLabels: { enabled: true, style: { fontSize: '11px', colors: ['#fff'] } },
        yaxis: { labels: { style: { fontSize: '11px', colors: '#6B6862' } } },
    }).render();
}
</script>
