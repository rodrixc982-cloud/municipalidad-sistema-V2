<div>
    <div class="flex items-center justify-between mb-6">
        <div class="relative flex-1 max-w-md">
            <svg viewBox="0 0 24 24" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-[#A8A498]" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35" stroke-linecap="round"/>
            </svg>
            <input type="text" wire:model.live.debounce.350ms="busqueda" placeholder="Buscar por DNI, nombres o apellidos…"
                   class="w-full pl-9 pr-3.5 py-2.5 rounded-lg border border-[#E3E0D9] bg-white text-[13.5px] placeholder:text-[#A8A498] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B] transition" />
        </div>
        <a href="{{ route('empleados.create') }}" wire:navigate
           class="ml-4 flex items-center gap-2 bg-[#7A1F2B] hover:bg-[#671A24] text-white text-[13.5px] font-medium px-4 py-2.5 rounded-lg transition whitespace-nowrap">
            <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg>
            Nuevo empleado
        </a>
    </div>

    <div class="bg-white border border-[#EDEAE2] rounded-xl overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-[#EDEAE2] bg-[#FAFAF8]">
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">DNI</th>
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Nombre completo</th>
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Cargo</th>
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Área</th>
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Régimen</th>
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Sueldo base</th>
                    <th class="px-5 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#F2EFE8]">
                @forelse ($empleados as $emp)
                    <tr class="hover:bg-[#FAFAF8] transition">
                        <td class="px-5 py-3.5 text-[13.5px] font-medium text-[#1C1B19]">{{ $emp->dni }}</td>
                        <td class="px-5 py-3.5 text-[13.5px] text-[#3D3B36]">{{ $emp->nombres }} {{ $emp->apellidos }}</td>
                        <td class="px-5 py-3.5 text-[13px] text-[#6B6862]">{{ $emp->cargo }}</td>
                        <td class="px-5 py-3.5 text-[13px] text-[#6B6862]">{{ $emp->area }}</td>
                        <td class="px-5 py-3.5">
                            <span class="text-[11.5px] px-2 py-1 rounded-md bg-[#F2EFE8] text-[#3D3B36] font-medium uppercase">{{ $emp->regimen }}</span>
                        </td>
                        <td class="px-5 py-3.5 text-[13.5px] text-[#1C1B19]">S/ {{ number_format($emp->sueldo_base, 2) }}</td>
                        <td class="px-5 py-3.5 text-right">
                            <a href="{{ route('empleados.show', $emp) }}" wire:navigate class="text-[13px] text-[#7A1F2B] hover:underline">Ver planillas</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-5 py-12 text-center text-[13.5px] text-[#A8A498]">No se han registrado empleados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $empleados->links() }}</div>
</div>
