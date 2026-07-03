<div>
    <div class="flex items-center justify-between mb-6">
        <div class="relative flex-1 max-w-md">
            <svg viewBox="0 0 24 24" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-[#A8A498]" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35" stroke-linecap="round"/>
            </svg>
            <input type="text" wire:model.live.debounce.350ms="busqueda" placeholder="Buscar por comprobante, concepto o contribuyente…"
                   class="w-full pl-9 pr-3.5 py-2.5 rounded-lg border border-[#E3E0D9] bg-white text-[13.5px] placeholder:text-[#A8A498] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B] transition" />
        </div>
        <a href="{{ route('caja.index') }}" wire:navigate
           class="ml-4 flex items-center gap-2 bg-[#7A1F2B] hover:bg-[#671A24] text-white text-[13.5px] font-medium px-4 py-2.5 rounded-lg transition whitespace-nowrap">
            <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg>
            Nuevo cobro
        </a>
    </div>

    <div class="bg-white border border-[#EDEAE2] rounded-xl overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-[#EDEAE2] bg-[#FAFAF8]">
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Comprobante</th>
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Contribuyente</th>
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Concepto</th>
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Monto</th>
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Fecha</th>
                    <th class="px-5 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#F2EFE8]">
                @forelse ($pagos as $pago)
                    <tr class="hover:bg-[#FAFAF8] transition">
                        <td class="px-5 py-3.5 text-[13.5px] font-medium text-[#1C1B19]">{{ $pago->numero_comprobante }}</td>
                        <td class="px-5 py-3.5 text-[13.5px] text-[#3D3B36]">{{ $pago->contribuyente?->nombre_completo }}</td>
                        <td class="px-5 py-3.5 text-[13px] text-[#6B6862] max-w-xs truncate">{{ $pago->concepto }}</td>
                        <td class="px-5 py-3.5 text-[13.5px] font-medium text-[#1C1B19]">S/ {{ number_format($pago->monto, 2) }}</td>
                        <td class="px-5 py-3.5 text-[13px] text-[#6B6862]">{{ $pago->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-5 py-3.5 text-right">
                            <a href="{{ route('pagos.comprobante', $pago) }}" target="_blank" class="text-[13px] text-[#7A1F2B] hover:underline">Ver PDF</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-5 py-12 text-center text-[13.5px] text-[#A8A498]">No se han registrado pagos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $pagos->links() }}</div>
</div>
