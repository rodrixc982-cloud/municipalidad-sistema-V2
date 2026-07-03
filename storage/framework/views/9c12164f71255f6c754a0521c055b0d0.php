<div class="max-w-3xl">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
        <div class="mb-5 flex items-center justify-between rounded-lg bg-emerald-50 border border-emerald-200 px-4 py-3 text-[13.5px] text-emerald-700">
            <span><?php echo e(session('status')); ?></span>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ultimoPagoId): ?>
                <a href="<?php echo e(route('pagos.comprobante', $ultimoPagoId)); ?>" target="_blank"
                   class="text-emerald-800 font-medium hover:underline whitespace-nowrap ml-4">Ver comprobante PDF →</a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

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
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['documentoBusqueda'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($buscado && ! $contribuyente): ?>
            <div class="mt-3 bg-orange-50 border border-orange-200 rounded-lg px-4 py-3">
                <p class="text-[13px] text-orange-700">No se encontró ningún contribuyente con ese documento.</p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($contribuyente): ?>
            <div class="mt-3 flex items-center gap-3 bg-emerald-50 border border-emerald-200 rounded-lg px-4 py-3">
                <svg viewBox="0 0 24 24" class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <p class="text-[13.5px] font-medium text-emerald-800"><?php echo e($contribuyente->nombre_completo); ?></p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($contribuyente): ?>
        <div class="bg-white border border-[#EDEAE2] rounded-xl p-6">
            <div class="flex gap-2 mb-5">
                <button type="button" wire:click="$set('tipoConcepto', 'expediente')"
                        class="px-4 py-2 rounded-lg text-[13px] font-medium transition <?php echo e($tipoConcepto === 'expediente' ? 'bg-[#7A1F2B] text-white' : 'bg-[#F2EFE8] text-[#6B6862]'); ?>">
                    Trámite (TUPA)
                </button>
                <button type="button" wire:click="$set('tipoConcepto', 'predio')"
                        class="px-4 py-2 rounded-lg text-[13px] font-medium transition <?php echo e($tipoConcepto === 'predio' ? 'bg-[#7A1F2B] text-white' : 'bg-[#F2EFE8] text-[#6B6862]'); ?>">
                    Impuesto Predial
                </button>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tipoConcepto === 'expediente'): ?>
                <div class="mb-4">
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Expediente pendiente de pago</label>
                    <select wire:model.live="expedienteId" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] bg-white">
                        <option value="">Selecciona un expediente…</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $this->expedientesPendientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($exp->id); ?>"><?php echo e($exp->numero_expediente); ?> — <?php echo e($exp->tipoTramite->nombre); ?> (S/ <?php echo e(number_format($exp->tipoTramite->costo, 2)); ?>)</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </select>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($this->expedientesPendientes->isEmpty()): ?>
                        <p class="text-[12.5px] text-[#A8A498] mt-1.5">Este contribuyente no tiene expedientes con saldo pendiente.</p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['expedienteId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php else: ?>
                <div class="mb-4">
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Declaración de autovalúo</label>
                    <select wire:model.live="declaracionId" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] bg-white">
                        <option value="">Selecciona una declaración…</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $this->declaracionesPendientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($dec->id); ?>"><?php echo e($dec->predio->codigo_catastral); ?> — Año <?php echo e($dec->anio); ?> (S/ <?php echo e(number_format($dec->impuesto_anual, 2)); ?>)</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </select>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($this->declaracionesPendientes->isEmpty()): ?>
                        <p class="text-[12.5px] text-[#A8A498] mt-1.5">Este contribuyente no tiene predios con declaración de autovalúo.</p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['declaracionId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

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
                <span class="text-[1.4rem] font-semibold text-[#7A1F2B]">S/ <?php echo e(number_format($this->montoCalculado, 2)); ?></span>
            </div>

            <button wire:click="registrarPago" wire:loading.attr="disabled"
                    class="w-full px-4 py-3 rounded-lg bg-[#7A1F2B] hover:bg-[#671A24] disabled:opacity-60 text-white text-[14px] font-medium transition">
                Registrar pago y emitir comprobante
            </button>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\municipalidad-sistema V2\resources\views/livewire/caja/caja-index.blade.php ENDPATH**/ ?>