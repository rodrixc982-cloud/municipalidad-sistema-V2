<div class="max-w-2xl">
    <a href="{{ route('predios.show', $predio) }}" wire:navigate class="inline-flex items-center gap-1.5 text-[13px] text-[#6B6862] hover:text-[#1C1B19] mb-5">
        <svg viewBox="0 0 24 24" class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6" stroke-linecap="round"/></svg>
        Volver al predio {{ $predio->codigo_catastral }}
    </a>
    <div class="bg-white border border-[#EDEAE2] rounded-2xl p-6 shadow-sm">
        <h2 class="text-[16px] font-semibold text-[#1C1B19] mb-5">Editar predio {{ $predio->codigo_catastral }}</h2>
        <div class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Dirección</label>
                    <input type="text" wire:model="direccion" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B] focus:outline-none"/>
                    @error('direccion') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Distrito</label>
                    <input type="text" wire:model="distrito" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B] focus:outline-none"/>
                    @error('distrito') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Área terreno (m²)</label>
                    <input type="number" step="0.01" wire:model="areaTerreno" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B] focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Área construida (m²)</label>
                    <input type="number" step="0.01" wire:model="areaConstruida" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B] focus:outline-none"/>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Uso</label>
                    <select wire:model="uso" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] bg-white">
                        <option value="vivienda">Vivienda</option><option value="comercio">Comercio</option>
                        <option value="industria">Industria</option><option value="terreno_sin_construir">Terreno sin construir</option><option value="otro">Otro</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Condición</label>
                    <select wire:model="condicion" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] bg-white">
                        <option value="urbano">Urbano</option><option value="rustico">Rústico</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex justify-end gap-3 mt-6 pt-5 border-t border-[#EDEAE2]">
            <a href="{{ route('predios.show', $predio) }}" wire:navigate class="px-4 py-2.5 rounded-xl text-[13.5px] font-medium text-[#6B6862] hover:bg-[#F2EFE8] transition">Cancelar</a>
            <button wire:click="guardar" class="px-5 py-2.5 rounded-xl bg-[#7A1F2B] hover:bg-[#671A24] text-white text-[13.5px] font-medium transition">Guardar cambios</button>
        </div>
    </div>
</div>
