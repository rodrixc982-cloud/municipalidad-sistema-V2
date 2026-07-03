<div class="max-w-3xl">
    @if (session('status'))
        <div class="mb-5 flex items-center justify-between rounded-lg bg-emerald-50 border border-emerald-200 px-4 py-3 text-[13.5px] text-emerald-700">
            <span>{{ session('status') }}</span>
            @if ($ultimoPagoId)
                <a href="{{ route('pagos.comprobante', $ultimoPagoId) }}" target="_blank"
                   class="text-emerald-800 font-medium hover:underline whitespace-nowrap ml-4">Ver comprobante PDF →</a>
            @endif
        </div>
    @endif

    <div class="bg-white border border-[#EDEAE2] rounded-xl p-6 mb-6">
        <h2 class="text-[16px] font-semibold text-[#1C1B19] mb-1">Caja / Recaudación</h2>
        <p class="text-[13.5px] text-[#6B6862] mb-5">Busca al contribuyente para cobrar un trámite o el impuesto predial.</p>

        <div class="flex gap-2">
            <input type="text" wire:model="documentoBusqueda" wire:keydown.enter="buscarContribuyente"
                   placeholder="DNI / RUC del contribuyente"
                   class="flex-1 rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]" />
            <button type="button" wire:click="buscarContribuyente"
                    class="px-4 py-2.5 rounded-lg bg-[#1C1B19] text-white text-[13.5px] font-medium hover:bg-[#33312D] transition">
                Buscar
            </button>
        </div>
        @error('documentoBusqueda') <p class="text-[12px] text-red-600 mt-1.5">{{ $message }}</p> @enderror

        @if ($buscado && ! $contribuyente)
            <div class="mt-3 bg-orange-50 border border-orange-200 rounded-lg px-4 py-3">
                <p class="text-[13px] text-orange-700">No se encontró ningún contribuyente con ese documento.</p>
            </div>
        @endif

        @if ($contribuyente)
            <div class="mt-3 flex items-center gap-3 bg-emerald-50 border border-emerald-200 rounded-lg px-4 py-3">
                <svg viewBox="0 0 24 24" class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <p class="text-[13.5px] font-medium text-emerald-800">{{ $contribuyente->nombre_completo }}</p>
            </div>
        @endif
    </div>

    @if ($contribuyente)
        <div class="bg-white border border-[#EDEAE2] rounded-xl p-6">
            <div class="flex gap-2 mb-5">
                <button type="button" wire:click="$set('tipoConcepto', 'expediente')"
                        class="px-4 py-2 rounded-lg text-[13px] font-medium transition {{ $tipoConcepto === 'expediente' ? 'bg-[#7A1F2B] text-white' : 'bg-[#F2EFE8] text-[#6B6862]' }}">
                    Trámite (TUPA)
                </button>
                <button type="button" wire:click="$set('tipoConcepto', 'predio')"
                        class="px-4 py-2 rounded-lg text-[13px] font-medium transition {{ $tipoConcepto === 'predio' ? 'bg-[#7A1F2B] text-white' : 'bg-[#F2EFE8] text-[#6B6862]' }}">
                    Impuesto Predial
                </button>
            </div>

            @if ($tipoConcepto === 'expediente')
                <div class="mb-4">
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Expediente pendiente de pago</label>
                    <select wire:model.live="expedienteId" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] bg-white">
                        <option value="">Selecciona un expediente…</option>
                        @foreach ($this->expedientesPendientes as $exp)
                            <option value="{{ $exp->id }}">{{ $exp->numero_expediente }} — {{ $exp->tipoTramite->nombre }} (S/ {{ number_format($exp->tipoTramite->costo, 2) }})</option>
                        @endforeach
                    </select>
                    @if ($this->expedientesPendientes->isEmpty())
                        <p class="text-[12.5px] text-[#A8A498] mt-1.5">Este contribuyente no tiene expedientes con saldo pendiente.</p>
                    @endif
                    @error('expedienteId') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            @else
                <div class="mb-4">
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Declaración de autovalúo</label>
                    <select wire:model.live="declaracionId" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] bg-white">
                        <option value="">Selecciona una declaración…</option>
                        @foreach ($this->declaracionesPendientes as $dec)
                            <option value="{{ $dec->id }}">{{ $dec->predio->codigo_catastral }} — Año {{ $dec->anio }} (S/ {{ number_format($dec->impuesto_anual, 2) }})</option>
                        @endforeach
                    </select>
                    @if ($this->declaracionesPendientes->isEmpty())
                        <p class="text-[12.5px] text-[#A8A498] mt-1.5">Este contribuyente no tiene predios con declaración de autovalúo.</p>
                    @endif
                    @error('declaracionId') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            @endif

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Tipo de comprobante</label>
                    <select wire:model="tipoComprobante" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] bg-white">
                        <option value="recibo">Recibo</option>
                        <option value="boleta">Boleta</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Método de pago</label>
                    <select wire:model="metodoPago" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] bg-white">
                        <option value="efectivo">Efectivo</option>
                        <option value="tarjeta">Tarjeta</option>
                        <option value="transferencia">Transferencia</option>
                    </select>
                </div>
            </div>

            <div class="bg-[#FAFAF8] border border-[#EDEAE2] rounded-lg p-4 mb-5 flex items-center justify-between">
                <span class="text-[13.5px] text-[#6B6862]">Monto a cobrar</span>
                <span class="text-[1.4rem] font-semibold text-[#7A1F2B]">S/ {{ number_format($this->montoCalculado, 2) }}</span>
            </div>

            <button wire:click="registrarPago" wire:loading.attr="disabled"
                    class="w-full px-4 py-3 rounded-lg bg-[#7A1F2B] hover:bg-[#671A24] disabled:opacity-60 text-white text-[14px] font-medium transition">
                Registrar pago y emitir comprobante
            </button>
        </div>
    @endif
</div>
