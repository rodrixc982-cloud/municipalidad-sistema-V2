<div class="max-w-2xl">
    <a href="{{ route('empleados.show', $empleado) }}" wire:navigate class="inline-flex items-center gap-1.5 text-[13px] text-[#6B6862] hover:text-[#1C1B19] mb-5">
        <svg viewBox="0 0 24 24" class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6" stroke-linecap="round"/></svg>
        Volver a {{ $empleado->nombres }} {{ $empleado->apellidos }}
    </a>
    <div class="bg-white border border-[#EDEAE2] rounded-2xl p-6 shadow-sm">
        <h2 class="text-[16px] font-semibold text-[#1C1B19] mb-5">Editar empleado</h2>
        <div class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Nombres</label>
                    <input type="text" wire:model="nombres" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B] focus:outline-none"/>
                    @error('nombres') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Apellidos</label>
                    <input type="text" wire:model="apellidos" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B] focus:outline-none"/>
                    @error('apellidos') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Cargo</label>
                    <input type="text" wire:model="cargo" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B] focus:outline-none"/>
                    @error('cargo') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Área</label>
                    <input type="text" wire:model="area" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B] focus:outline-none"/>
                    @error('area') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Régimen</label>
                    <select wire:model="regimen" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] bg-white">
                        <option value="cas">CAS</option><option value="727">D.L. 728</option><option value="locacion">Locación</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Sueldo base (S/)</label>
                    <input type="number" step="0.01" wire:model="sueldoBase" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B] focus:outline-none"/>
                    @error('sueldoBase') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <label class="flex items-center gap-2.5 cursor-pointer select-none">
                <input type="checkbox" wire:model="activo" class="rounded border-[#D5D1C7] text-[#7A1F2B] focus:ring-[#7A1F2B]/30"/>
                <span class="text-[13.5px] text-[#3D3B36]">Empleado activo</span>
            </label>
        </div>
        <div class="flex justify-end gap-3 mt-6 pt-5 border-t border-[#EDEAE2]">
            <a href="{{ route('empleados.show', $empleado) }}" wire:navigate class="px-4 py-2.5 rounded-xl text-[13.5px] font-medium text-[#6B6862] hover:bg-[#F2EFE8] transition">Cancelar</a>
            <button wire:click="guardar" class="px-5 py-2.5 rounded-xl bg-[#7A1F2B] hover:bg-[#671A24] text-white text-[13.5px] font-medium transition">Guardar cambios</button>
        </div>
    </div>
</div>
