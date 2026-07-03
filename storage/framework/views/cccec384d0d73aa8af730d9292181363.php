<div class="max-w-2xl">
    <a href="<?php echo e(route('empleados.index')); ?>" wire:navigate class="inline-flex items-center gap-1.5 text-[13px] text-[#6B6862] hover:text-[#1C1B19] mb-5">
        <svg viewBox="0 0 24 24" class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Volver a empleados
    </a>

    <div class="bg-white border border-[#EDEAE2] rounded-xl p-6">
        <h2 class="text-[16px] font-semibold text-[#1C1B19] mb-1">Nuevo empleado</h2>
        <p class="text-[13.5px] text-[#6B6862] mb-6">Registra los datos del personal municipal.</p>

        <div class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">DNI</label>
                    <input type="text" wire:model="dni" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['dni'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Fecha de ingreso</label>
                    <input type="date" wire:model="fechaIngreso" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Nombres</label>
                    <input type="text" wire:model="nombres" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['nombres'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Apellidos</label>
                    <input type="text" wire:model="apellidos" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['apellidos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Cargo</label>
                    <input type="text" wire:model="cargo" placeholder="Ej: Asistente administrativo" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['cargo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Área</label>
                    <input type="text" wire:model="area" placeholder="Ej: Rentas, Obras, Mesa de Partes…" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Régimen laboral</label>
                    <select wire:model="regimen" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] bg-white">
                        <option value="cas">CAS</option>
                        <option value="727">D.L. 728</option>
                        <option value="locacion">Locación de servicios</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Sueldo base (S/)</label>
                    <input type="number" step="0.01" wire:model="sueldoBase" class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['sueldoBase'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-6 pt-5 border-t border-[#EDEAE2]">
            <a href="<?php echo e(route('empleados.index')); ?>" wire:navigate class="px-4 py-2.5 rounded-lg text-[13.5px] font-medium text-[#6B6862] hover:bg-[#F2EFE8] transition">Cancelar</a>
            <button wire:click="guardar" wire:loading.attr="disabled"
                    class="px-5 py-2.5 rounded-lg bg-[#7A1F2B] hover:bg-[#671A24] disabled:opacity-60 text-white text-[13.5px] font-medium transition">
                Registrar empleado
            </button>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\municipalidad-sistema V2\resources\views/livewire/rrhh/empleado-create.blade.php ENDPATH**/ ?>