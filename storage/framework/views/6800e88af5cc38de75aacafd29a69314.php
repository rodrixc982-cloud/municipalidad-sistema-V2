<div class="max-w-5xl">
    <a href="<?php echo e(route('expedientes.index')); ?>" wire:navigate class="inline-flex items-center gap-1.5 text-[13px] text-[#6B6862] hover:text-[#1C1B19] mb-5">
        <svg viewBox="0 0 24 24" class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Volver a expedientes
    </a>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
        <div class="mb-5 rounded-lg bg-emerald-50 border border-emerald-200 px-4 py-3 text-[13.5px] text-emerald-700">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="flex items-start justify-between mb-6">
        <div>
            <div class="flex items-center gap-3">
                <h2 class="text-[20px] font-semibold text-[#1C1B19] tracking-tight"><?php echo e($expediente->numero_expediente); ?></h2>
                <span class="text-[11.5px] px-2 py-1 rounded-md font-medium <?php echo e($expediente->colorEstado()); ?>">
                    <?php echo e(str($expediente->estado)->replace('_', ' ')->ucfirst()); ?>

                </span>
            </div>
            <p class="text-[13.5px] text-[#6B6862] mt-1"><?php echo e($expediente->asunto); ?></p>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($expediente->estado, ['aprobado', 'finalizado'])): ?>
            <div class="flex gap-2">
                <a href="<?php echo e(route('expedientes.constancia', $expediente)); ?>" target="_blank"
                   class="flex items-center gap-2 px-3.5 py-2 rounded-lg border border-[#E3E0D9] bg-white text-[13px] font-medium text-[#3D3B36] hover:bg-[#F2EFE8] transition">
                    <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" stroke-linejoin="round"/><path d="M14 2v6h6" stroke-linecap="round"/></svg>
                    Constancia PDF
                </a>
                <a href="<?php echo e(route('expedientes.resolucion', $expediente)); ?>" target="_blank"
                   class="flex items-center gap-2 px-3.5 py-2 rounded-lg bg-[#1C1B19] text-white text-[13px] font-medium hover:bg-[#33312D] transition">
                    <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" stroke-linejoin="round"/><path d="M14 2v6h6" stroke-linecap="round"/></svg>
                    Resolución PDF
                </a>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white border border-[#EDEAE2] rounded-xl p-5">
                <h3 class="text-[13.5px] font-medium text-[#1C1B19] mb-4">Información del trámite</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-[12px] text-[#A8A498] mb-0.5">Contribuyente</p>
                        <p class="text-[13.5px] text-[#1C1B19]"><?php echo e($expediente->contribuyente->nombre_completo); ?></p>
                    </div>
                    <div>
                        <p class="text-[12px] text-[#A8A498] mb-0.5">Documento</p>
                        <p class="text-[13.5px] text-[#1C1B19]"><?php echo e($expediente->contribuyente->tipo_documento); ?> <?php echo e($expediente->contribuyente->numero_documento); ?></p>
                    </div>
                    <div>
                        <p class="text-[12px] text-[#A8A498] mb-0.5">Tipo de trámite</p>
                        <p class="text-[13.5px] text-[#1C1B19]"><?php echo e($expediente->tipoTramite->nombre); ?></p>
                    </div>
                    <div>
                        <p class="text-[12px] text-[#A8A498] mb-0.5">Costo del trámite</p>
                        <p class="text-[13.5px] text-[#1C1B19]">S/ <?php echo e(number_format($expediente->tipoTramite->costo, 2)); ?></p>
                    </div>
                    <div>
                        <p class="text-[12px] text-[#A8A498] mb-0.5">Área actual</p>
                        <p class="text-[13.5px] text-[#1C1B19]"><?php echo e($expediente->area_actual); ?></p>
                    </div>
                    <div>
                        <p class="text-[12px] text-[#A8A498] mb-0.5">Fecha límite</p>
                        <p class="text-[13.5px] <?php echo e($expediente->fecha_limite?->isPast() ? 'text-red-600 font-medium' : 'text-[#1C1B19]'); ?>">
                            <?php echo e($expediente->fecha_limite?->format('d/m/Y') ?? '—'); ?>

                        </p>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($expediente->descripcion): ?>
                    <div class="mt-4 pt-4 border-t border-[#F2EFE8]">
                        <p class="text-[12px] text-[#A8A498] mb-1">Descripción</p>
                        <p class="text-[13.5px] text-[#3D3B36] leading-relaxed"><?php echo e($expediente->descripcion); ?></p>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div class="bg-white border border-[#EDEAE2] rounded-xl p-5">
                <h3 class="text-[13.5px] font-medium text-[#1C1B19] mb-4">Trazabilidad del expediente</h3>
                <div class="space-y-0">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $movimientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $mov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex gap-3.5 pb-5 <?php echo e(!$loop->last ? 'relative' : ''); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$loop->last): ?>
                                <div class="absolute left-[7px] top-5 bottom-0 w-px bg-[#EDEAE2]"></div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="w-3.5 h-3.5 rounded-full bg-[#7A1F2B] mt-1 flex-shrink-0 relative z-10"></div>
                            <div class="flex-1 -mt-0.5">
                                <p class="text-[13.5px] font-medium text-[#1C1B19]"><?php echo e($mov->accion); ?>

                                    <span class="text-[#6B6862] font-normal">→ <?php echo e($mov->area_destino); ?></span>
                                </p>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($mov->comentario): ?>
                                    <p class="text-[13px] text-[#6B6862] mt-0.5"><?php echo e($mov->comentario); ?></p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <p class="text-[12px] text-[#A8A498] mt-1"><?php echo e($mov->usuario->name); ?> · <?php echo e($mov->created_at->format('d/m/Y H:i')); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>

        
        <div>
            <div class="bg-white border border-[#EDEAE2] rounded-xl p-5 sticky top-0">
                <h3 class="text-[13.5px] font-medium text-[#1C1B19] mb-4">Actualizar expediente</h3>

                <div class="space-y-3.5">
                    <div>
                        <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Acción</label>
                        <select wire:model="accion" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px] bg-white">
                            <option value="Derivado">Derivado a otra área</option>
                            <option value="Observado">Observado</option>
                            <option value="Aprobado">Aprobado</option>
                            <option value="Rechazado">Rechazado</option>
                            <option value="Finalizado">Finalizado</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Área destino</label>
                        <input type="text" wire:model="areaDestino" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px]" />
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['areaDestino'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div>
                        <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Nuevo estado</label>
                        <select wire:model="nuevoEstado" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px] bg-white">
                            <option value="registrado">Registrado</option>
                            <option value="en_proceso">En proceso</option>
                            <option value="observado">Observado</option>
                            <option value="aprobado">Aprobado</option>
                            <option value="rechazado">Rechazado</option>
                            <option value="finalizado">Finalizado</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Comentario</label>
                        <textarea wire:model="comentario" rows="3" placeholder="Detalle del movimiento…"
                                  class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px]"></textarea>
                    </div>

                    <button wire:click="registrarMovimiento" wire:loading.attr="disabled"
                            class="w-full px-4 py-2.5 rounded-lg bg-[#7A1F2B] hover:bg-[#671A24] disabled:opacity-60 text-white text-[13.5px] font-medium transition">
                        Registrar movimiento
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\municipalidad-sistema V2\resources\views/livewire/mesa-partes/expediente-show.blade.php ENDPATH**/ ?>