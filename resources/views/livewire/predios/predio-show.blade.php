<div class="max-w-5xl">
    <a href="{{ route('predios.index') }}" wire:navigate class="inline-flex items-center gap-1.5 text-[13px] text-[#6B6862] hover:text-[#1C1B19] mb-5">
        <svg viewBox="0 0 24 24" class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Volver a predios
    </a>

    @if (session('status'))
        <div class="mb-5 rounded-lg bg-emerald-50 border border-emerald-200 px-4 py-3 text-[13.5px] text-emerald-700">
            {{ session('status') }}
        </div>
    @endif

    <div class="mb-6">
        <h2 class="text-[20px] font-semibold text-[#1C1B19] tracking-tight">{{ $predio->codigo_catastral }}</h2>
        <p class="text-[13.5px] text-[#6B6862] mt-1">{{ $predio->direccion }}, {{ $predio->distrito }}</p>
    </div>

    <div class="flex justify-end mb-4"><a href="{{ route('predios.edit', $predio) }}" wire:navigate class="flex items-center gap-2 px-4 py-2 rounded-xl bg-[#1C1B19] text-white text-[13px] font-medium hover:bg-[#33312D] transition"><svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>Editar predio</a></div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white border border-[#EDEAE2] rounded-xl p-5">
                <h3 class="text-[13.5px] font-medium text-[#1C1B19] mb-4">Ficha catastral</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-[12px] text-[#A8A498] mb-0.5">Propietario</p>
                        <p class="text-[13.5px] text-[#1C1B19]">{{ $predio->contribuyente->nombre_completo }}</p>
                    </div>
                    <div>
                        <p class="text-[12px] text-[#A8A498] mb-0.5">Documento</p>
                        <p class="text-[13.5px] text-[#1C1B19]">{{ $predio->contribuyente->tipo_documento }} {{ $predio->contribuyente->numero_documento }}</p>
                    </div>
                    <div>
                        <p class="text-[12px] text-[#A8A498] mb-0.5">Área de terreno</p>
                        <p class="text-[13.5px] text-[#1C1B19]">{{ number_format($predio->area_terreno, 2) }} m²</p>
                    </div>
                    <div>
                        <p class="text-[12px] text-[#A8A498] mb-0.5">Área construida</p>
                        <p class="text-[13.5px] text-[#1C1B19]">{{ number_format($predio->area_construida, 2) }} m²</p>
                    </div>
                    <div>
                        <p class="text-[12px] text-[#A8A498] mb-0.5">Uso</p>
                        <p class="text-[13.5px] text-[#1C1B19]">{{ str($predio->uso)->replace('_', ' ')->ucfirst() }}</p>
                    </div>
                    <div>
                        <p class="text-[12px] text-[#A8A498] mb-0.5">Condición</p>
                        <p class="text-[13.5px] text-[#1C1B19]">{{ str($predio->condicion)->ucfirst() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-[#EDEAE2] rounded-xl overflow-hidden">
                <div class="px-5 py-4 border-b border-[#EDEAE2]">
                    <h3 class="text-[13.5px] font-medium text-[#1C1B19]">Histórico de declaraciones de autovalúo</h3>
                </div>
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-[#EDEAE2] bg-[#FAFAF8]">
                            <th class="px-5 py-2.5 text-[11.5px] uppercase tracking-wide text-[#A8A498] font-medium">Año</th>
                            <th class="px-5 py-2.5 text-[11.5px] uppercase tracking-wide text-[#A8A498] font-medium">Valor terreno</th>
                            <th class="px-5 py-2.5 text-[11.5px] uppercase tracking-wide text-[#A8A498] font-medium">Valor construcción</th>
                            <th class="px-5 py-2.5 text-[11.5px] uppercase tracking-wide text-[#A8A498] font-medium">Autovalúo</th>
                            <th class="px-5 py-2.5 text-[11.5px] uppercase tracking-wide text-[#A8A498] font-medium">Impuesto anual</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#F2EFE8]">
                        @forelse ($declaraciones as $dec)
                            <tr>
                                <td class="px-5 py-3 text-[13.5px] font-medium text-[#1C1B19]">{{ $dec->anio }}</td>
                                <td class="px-5 py-3 text-[13.5px] text-[#6B6862]">S/ {{ number_format($dec->valor_terreno, 2) }}</td>
                                <td class="px-5 py-3 text-[13.5px] text-[#6B6862]">S/ {{ number_format($dec->valor_construccion, 2) }}</td>
                                <td class="px-5 py-3 text-[13.5px] text-[#1C1B19] font-medium">S/ {{ number_format($dec->valor_autovaluo, 2) }}</td>
                                <td class="px-5 py-3 text-[13.5px] text-[#7A1F2B] font-medium">S/ {{ number_format($dec->impuesto_anual, 2) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-8 text-center text-[13.5px] text-[#A8A498]">
                                    Aún no hay declaraciones de autovalúo registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Nueva declaración --}}
        <div>
            <div class="bg-white border border-[#EDEAE2] rounded-xl p-5 sticky top-0">
                <h3 class="text-[13.5px] font-medium text-[#1C1B19] mb-1">Nueva declaración</h3>
                <p class="text-[12.5px] text-[#6B6862] mb-4">El impuesto se calcula automáticamente según la escala progresiva vigente.</p>

                <div class="space-y-3.5">
                    <div>
                        <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Año</label>
                        <input type="number" wire:model="anio" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px]" />
                        @error('anio') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Valor de terreno (S/)</label>
                        <input type="number" step="0.01" wire:model.live="valorTerreno" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px]" />
                    </div>

                    <div>
                        <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Valor de construcción (S/)</label>
                        <input type="number" step="0.01" wire:model.live="valorConstruccion" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px]" />
                    </div>

                    <div class="bg-[#FAFAF8] border border-[#EDEAE2] rounded-lg p-3.5">
                        <div class="flex items-center justify-between text-[12.5px] text-[#6B6862] mb-1">
                            <span>Autovalúo total</span>
                            <span class="font-medium text-[#1C1B19]">S/ {{ number_format($valorTerreno + $valorConstruccion, 2) }}</span>
                        </div>
                        <div class="flex items-center justify-between text-[13px] pt-2 border-t border-[#EDEAE2]">
                            <span class="text-[#6B6862]">Impuesto anual estimado</span>
                            <span class="font-semibold text-[#7A1F2B]">S/ {{ number_format($this->impuestoCalculado, 2) }}</span>
                        </div>
                    </div>

                    <button wire:click="registrarDeclaracion" wire:loading.attr="disabled"
                            class="w-full px-4 py-2.5 rounded-lg bg-[#7A1F2B] hover:bg-[#671A24] disabled:opacity-60 text-white text-[13.5px] font-medium transition">
                        Registrar declaración
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
