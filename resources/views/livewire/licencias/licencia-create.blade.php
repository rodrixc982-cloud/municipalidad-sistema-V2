<div class="max-w-2xl">
    <a href="{{ route('licencias.index') }}" wire:navigate class="inline-flex items-center gap-1.5 text-[13px] text-[#6B6862] hover:text-[#1C1B19] mb-5">
        <svg viewBox="0 0 24 24" class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Volver a licencias
    </a>

    <div class="bg-white border border-[#EDEAE2] rounded-xl p-6">
        <h2 class="text-[16px] font-semibold text-[#1C1B19] mb-1">Nueva licencia de funcionamiento</h2>
        <p class="text-[13.5px] text-[#6B6862] mb-6">Registra la licencia asociada a un contribuyente ya existente.</p>

        <div class="mb-6">
            <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">DNI / RUC del titular</label>
            <div class="flex gap-2">
                <input type="text" wire:model="documentoBusqueda" placeholder="Ingresa el número de documento"
                       class="flex-1 rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]" />
                <button type="button" wire:click="buscarContribuyente"
                        class="px-4 py-2.5 rounded-lg bg-[#1C1B19] text-white text-[13.5px] font-medium hover:bg-[#33312D] transition">Buscar</button>
            </div>
            @if ($contribuyenteEncontrado)
                <div class="mt-3 flex items-center gap-3 bg-emerald-50 border border-emerald-200 rounded-lg px-4 py-3">
                    <svg viewBox="0 0 24 24" class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <p class="text-[13.5px] font-medium text-emerald-800">{{ $contribuyenteEncontrado->nombre_completo }}</p>
                </div>
            @elseif ($documentoBusqueda && !$contribuyenteEncontrado)
                <div class="mt-3 bg-orange-50 border border-orange-200 rounded-lg px-4 py-3">
                    <p class="text-[13px] text-orange-700">No se encontró ese documento. Regístralo primero desde Mesa de Partes.</p>
                </div>
            @endif
            @error('contribuyenteId') <p class="text-[12px] text-red-600 mt-1.5">{{ $message }}</p> @enderror
        </div>

        <div class="border-t border-[#EDEAE2] pt-5 space-y-4">
            <div>
                <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Nombre comercial</label>
                <input type="text" wire:model="nombreComercial" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                @error('nombreComercial') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Giro de negocio</label>
                <input type="text" wire:model="giroNegocio" placeholder="Ej: Bodega, restaurante, ferretería…" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                @error('giroNegocio') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Dirección del local</label>
                <input type="text" wire:model="direccionLocal" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                @error('direccionLocal') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Fecha de emisión</label>
                    <input type="date" wire:model="fechaEmision" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                </div>
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Fecha de vencimiento</label>
                    <input type="date" wire:model="fechaVencimiento" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                    @error('fechaVencimiento') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-6 pt-5 border-t border-[#EDEAE2]">
            <a href="{{ route('licencias.index') }}" wire:navigate class="px-4 py-2.5 rounded-lg text-[13.5px] font-medium text-[#6B6862] hover:bg-[#F2EFE8] transition">Cancelar</a>
            <button wire:click="guardar" wire:loading.attr="disabled"
                    class="px-5 py-2.5 rounded-lg bg-[#7A1F2B] hover:bg-[#671A24] disabled:opacity-60 text-white text-[13.5px] font-medium transition">
                Registrar licencia
            </button>
        </div>
    </div>
</div>
