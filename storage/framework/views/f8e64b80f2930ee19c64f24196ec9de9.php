<div class="max-w-5xl">
    <a href="<?php echo e(route('empleados.index')); ?>" wire:navigate class="inline-flex items-center gap-1.5 text-[13px] text-[#6B6862] hover:text-[#1C1B19] mb-5">
        <svg viewBox="0 0 24 24" class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Volver a empleados
    </a>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
        <div class="mb-5 rounded-lg bg-emerald-50 border border-emerald-200 px-4 py-3 text-[13.5px] text-emerald-700"><?php echo e(session('status')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="mb-6">
        <h2 class="text-[20px] font-semibold text-[#1C1B19] tracking-tight"><?php echo e($empleado->nombres); ?> <?php echo e($empleado->apellidos); ?></h2>
        <p class="text-[13.5px] text-[#6B6862] mt-1"><?php echo e($empleado->cargo); ?> · <?php echo e($empleado->area); ?> · DNI <?php echo e($empleado->dni); ?></p>
    </div>

    <div class="flex justify-end mb-4"><a href="<?php echo e(route('empleados.edit', $empleado)); ?>" wire:navigate class="flex items-center gap-2 px-4 py-2 rounded-xl bg-[#1C1B19] text-white text-[13px] font-medium hover:bg-[#33312D] transition"><svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>Editar empleado</a></div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white border border-[#EDEAE2] rounded-xl overflow-hidden">
            <div class="px-5 py-4 border-b border-[#EDEAE2]">
                <h3 class="text-[13.5px] font-medium text-[#1C1B19]">Histórico de planillas</h3>
            </div>
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-[#EDEAE2] bg-[#FAFAF8]">
                        <th class="px-5 py-2.5 text-[11.5px] uppercase tracking-wide text-[#A8A498] font-medium">Periodo</th>
                        <th class="px-5 py-2.5 text-[11.5px] uppercase tracking-wide text-[#A8A498] font-medium">Bruto</th>
                        <th class="px-5 py-2.5 text-[11.5px] uppercase tracking-wide text-[#A8A498] font-medium">Descuentos</th>
                        <th class="px-5 py-2.5 text-[11.5px] uppercase tracking-wide text-[#A8A498] font-medium">Neto</th>
                        <th class="px-5 py-2.5 text-[11.5px] uppercase tracking-wide text-[#A8A498] font-medium">Estado</th>
                        <th class="px-5 py-2.5"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#F2EFE8]">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $planillas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="px-5 py-3 text-[13.5px] font-medium text-[#1C1B19]"><?php echo e(str_pad($p->mes, 2, '0', STR_PAD_LEFT)); ?>/<?php echo e($p->anio); ?></td>
                            <td class="px-5 py-3 text-[13.5px] text-[#6B6862]">S/ <?php echo e(number_format($p->sueldo_bruto, 2)); ?></td>
                            <td class="px-5 py-3 text-[13.5px] text-[#6B6862]">S/ <?php echo e(number_format($p->descuentos, 2)); ?></td>
                            <td class="px-5 py-3 text-[13.5px] font-medium text-[#1C1B19]">S/ <?php echo e(number_format($p->sueldo_neto, 2)); ?></td>
                            <td class="px-5 py-3">
                                <span class="text-[11.5px] px-2 py-1 rounded-md font-medium <?php echo e($p->estado === 'pagado' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'); ?>">
                                    <?php echo e(str($p->estado)->ucfirst()); ?>

                                </span>
                            </td>
                            <td class="px-5 py-3 text-right whitespace-nowrap">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p->estado === 'pendiente'): ?>
                                    <button wire:click="marcarPagado(<?php echo e($p->id); ?>)" class="text-[12.5px] text-[#7A1F2B] hover:underline mr-3">Marcar pagado</button>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <a href="<?php echo e(route('planillas.boleta', $p)); ?>" target="_blank" class="text-[12.5px] text-[#7A1F2B] hover:underline">Boleta PDF</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="6" class="px-5 py-8 text-center text-[13.5px] text-[#A8A498]">Aún no hay planillas generadas.</td></tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>

        <div>
            <div class="bg-white border border-[#EDEAE2] rounded-xl p-5 sticky top-0">
                <h3 class="text-[13.5px] font-medium text-[#1C1B19] mb-4">Generar planilla del periodo</h3>
                <div class="space-y-3.5">
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Mes</label>
                            <select wire:model="mes" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px] bg-white">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = range(1, 12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($m); ?>"><?php echo e(str_pad($m, 2, '0', STR_PAD_LEFT)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Año</label>
                            <input type="number" wire:model="anio" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px]" />
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['mes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div>
                        <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1">Descuentos (S/)</label>
                        <input type="number" step="0.01" wire:model.live="descuentos" class="w-full rounded-lg border border-[#E3E0D9] px-3 py-2 text-[13.5px]" />
                        <p class="text-[11.5px] text-[#A8A498] mt-1">Por defecto se sugiere 13% referencial de aporte.</p>
                    </div>

                    <div class="bg-[#FAFAF8] border border-[#EDEAE2] rounded-lg p-3.5">
                        <div class="flex items-center justify-between text-[12.5px] text-[#6B6862] mb-1">
                            <span>Sueldo bruto</span>
                            <span class="font-medium text-[#1C1B19]">S/ <?php echo e(number_format($empleado->sueldo_base, 2)); ?></span>
                        </div>
                        <div class="flex items-center justify-between text-[13px] pt-2 border-t border-[#EDEAE2]">
                            <span class="text-[#6B6862]">Sueldo neto</span>
                            <span class="font-semibold text-[#7A1F2B]">S/ <?php echo e(number_format($this->sueldoNeto, 2)); ?></span>
                        </div>
                    </div>

                    <button wire:click="generarPlanilla" wire:loading.attr="disabled"
                            class="w-full px-4 py-2.5 rounded-lg bg-[#7A1F2B] hover:bg-[#671A24] disabled:opacity-60 text-white text-[13.5px] font-medium transition">
                        Generar planilla
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\municipalidad-sistema V2\resources\views/livewire/rrhh/empleado-show.blade.php ENDPATH**/ ?>