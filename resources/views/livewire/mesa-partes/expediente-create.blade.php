<div class="max-w-3xl">
    <a href="{{ route('expedientes.index') }}" wire:navigate class="inline-flex items-center gap-1.5 text-[13px] text-[#6B6862] hover:text-[#1C1B19] mb-5">
        <svg viewBox="0 0 24 24" class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Volver a expedientes
    </a>

    <div class="bg-white border border-[#EDEAE2] rounded-xl p-6">
        <h2 class="text-[16px] font-semibold text-[#1C1B19] mb-1">Nuevo expediente</h2>
        <p class="text-[13.5px] text-[#6B6862] mb-6">Registra un trámite en mesa de partes asociado a un contribuyente.</p>

        {{-- Paso 1: contribuyente --}}
        <div class="mb-6">
            <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">DNI / RUC del contribuyente</label>
            <div class="flex gap-2">
                <input
                    type="text"
                    wire:model="documentoBusqueda"
                    placeholder="Ingresa el número de documento"
                    class="flex-1 rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]"
                />
                <button type="button" wire:click="buscarContribuyente"
                        class="px-4 py-2.5 rounded-lg bg-[#1C1B19] text-white text-[13.5px] font-medium hover:bg-[#33312D] transition">
                    Buscar
                </button>
            </div>

            @if ($contribuyenteEncontrado)
                <div class="mt-3 flex items-center gap-3 bg-emerald-50 border border-emerald-200 rounded-lg px-4 py-3">
                    <svg viewBox="0 0 24 24" class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <div>
                        <p class="text-[13.5px] font-medium text-emerald-800">{{ $contribuyenteEncontrado->nombre_completo }}</p>
                        <p class="text-[12.5px] text-emerald-600">{{ $contribuyenteEncontrado->tipo_documento }}: {{ $contribuyenteEncontrado->numero_documento }}</p>
                    </div>
                </div>
            @endif

            @if ($mostrarFormularioContribuyente)
                <div class="mt-3 border border-[#E3E0D9] rounded-lg p-4 bg-[#FAFAF8]">
                    <p class="text-[13px] text-[#6B6862] mb-3">No se encontró un contribuyente con este documento. Completa los datos para registrarlo:</p>

                    <div class="grid grid-cols-2 gap-3 mb-3">
                        <div>
                            <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Tipo de persona</label>
                            <select wire:model="nuevoTipoPersona" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px] bg-white">
                                <option value="natural">Persona natural</option>
                                <option value="juridica">Persona jurídica</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Tipo de documento</label>
                            <select wire:model="nuevoTipoDocumento" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px] bg-white">
                                <option value="DNI">DNI</option>
                                <option value="RUC">RUC</option>
                                <option value="CE">Carné de extranjería</option>
                            </select>
                        </div>
                    </div>

                    @if ($nuevoTipoPersona === 'juridica')
                        <div class="mb-3">
                            <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Razón social</label>
                            <input type="text" wire:model="nuevaRazonSocial" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px]" />
                            @error('nuevaRazonSocial') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    @else
                        <div class="grid grid-cols-3 gap-3 mb-3">
                            <div>
                                <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Nombres</label>
                                <input type="text" wire:model="nuevoNombres" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px]" />
                                @error('nuevoNombres') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Apellido paterno</label>
                                <input type="text" wire:model="nuevoApellidoPaterno" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px]" />
                                @error('nuevoApellidoPaterno') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Apellido materno</label>
                                <input type="text" wire:model="nuevoApellidoMaterno" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px]" />
                            </div>
                        </div>
                    @endif

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Dirección</label>
                            <input type="text" wire:model="nuevaDireccion" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px]" />
                        </div>
                        <div>
                            <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Teléfono</label>
                            <input type="text" wire:model="nuevoTelefono" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px]" />
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="border-t border-[#EDEAE2] pt-5 space-y-4">
            <div>
                <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Tipo de trámite (TUPA)</label>
                <select wire:model="tipoTramiteId" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] bg-white focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]">
                    <option value="">Selecciona un trámite…</option>
                    @foreach ($tiposTramite as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->codigo }} — {{ $tipo->nombre }} (S/ {{ number_format($tipo->costo, 2) }}, {{ $tipo->plazo_dias }} días)</option>
                    @endforeach
                </select>
                @error('tipoTramiteId') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Asunto</label>
                <input type="text" wire:model="asunto" placeholder="Ej: Solicitud de constancia de posesión"
                       class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]" />
                @error('asunto') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Descripción (opcional)</label>
                <textarea wire:model="descripcion" rows="3" placeholder="Detalles adicionales del trámite…"
                          class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]"></textarea>
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-6 pt-5 border-t border-[#EDEAE2]">
            <a href="{{ route('expedientes.index') }}" wire:navigate class="px-4 py-2.5 rounded-lg text-[13.5px] font-medium text-[#6B6862] hover:bg-[#F2EFE8] transition">Cancelar</a>
            <button wire:click="guardar" wire:loading.attr="disabled"
                    class="px-5 py-2.5 rounded-lg bg-[#7A1F2B] hover:bg-[#671A24] disabled:opacity-60 text-white text-[13.5px] font-medium transition">
                Registrar expediente
            </button>
        </div>
    </div>
</div>
