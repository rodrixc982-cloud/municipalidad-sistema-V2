<div class="max-w-2xl space-y-6">
    
    <div class="bg-white border border-[#EDEAE2] rounded-2xl p-6">
        <h2 class="text-[15px] font-semibold text-[#1C1B19] mb-5">Información personal</h2>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status_perfil')): ?>
            <div class="mb-4 rounded-xl bg-emerald-50 border border-emerald-200 px-4 py-3 text-[13.5px] text-emerald-700">
                <?php echo e(session('status_perfil')); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="flex items-center gap-5 mb-6 pb-6 border-b border-[#F2EFE8]">
            <div class="relative">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($foto): ?>
                    <img src="<?php echo e($foto->temporaryUrl()); ?>" class="w-20 h-20 rounded-full object-cover ring-4 ring-[#EDEAE2]"/>
                <?php elseif(auth()->user()->foto_perfil): ?>
                    <img src="<?php echo e(auth()->user()->foto_url); ?>" class="w-20 h-20 rounded-full object-cover ring-4 ring-[#EDEAE2]"/>
                <?php else: ?>
                    <div class="w-20 h-20 rounded-full bg-gradient-to-br from-[#7A1F2B] to-[#9B2635] flex items-center justify-center text-white text-2xl font-bold ring-4 ring-[#EDEAE2]">
                        <?php echo e(auth()->user()->iniciales); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div>
                <p class="text-[14px] font-semibold text-[#1C1B19]"><?php echo e(auth()->user()->name); ?></p>
                <p class="text-[13px] text-[#6B6862] mb-3"><?php echo e(auth()->user()->area ?? 'Sin área asignada'); ?></p>
                <label class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-xl border border-[#E3E0D9] text-[13px] font-medium text-[#3D3B36] hover:bg-[#F2EFE8] transition w-fit">
                    <svg viewBox="0 0 24 24" class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                    Cambiar foto
                    <input type="file" wire:model="foto" accept="image/*" class="hidden"/>
                </label>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1.5">Nombre completo</label>
                <input type="text" wire:model="name" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]"/>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div>
                <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1.5">Correo electrónico</label>
                <input type="email" wire:model="email" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]"/>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div class="flex justify-end pt-2">
                <button wire:click="actualizarPerfil" class="px-5 py-2.5 rounded-xl bg-[#7A1F2B] hover:bg-[#671A24] text-white text-[13.5px] font-medium transition">
                    Guardar cambios
                </button>
            </div>
        </div>
    </div>

    
    <div class="bg-white border border-[#EDEAE2] rounded-2xl p-6">
        <h2 class="text-[15px] font-semibold text-[#1C1B19] mb-5">Cambiar contraseña</h2>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status_password')): ?>
            <div class="mb-4 rounded-xl bg-emerald-50 border border-emerald-200 px-4 py-3 text-[13.5px] text-emerald-700">
                <?php echo e(session('status_password')); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="space-y-4">
            <div>
                <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1.5">Contraseña actual</label>
                <input type="password" wire:model="passwordActual" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]"/>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['passwordActual'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1.5">Nueva contraseña</label>
                    <input type="password" wire:model="passwordNuevo" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]"/>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['passwordNuevo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div>
                    <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1.5">Confirmar contraseña</label>
                    <input type="password" wire:model="passwordConfirmar" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]"/>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['passwordConfirmar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-[12px] text-red-600 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <div class="flex justify-end pt-2">
                <button wire:click="cambiarPassword" class="px-5 py-2.5 rounded-xl bg-[#1C1B19] hover:bg-[#33312D] text-white text-[13.5px] font-medium transition">
                    Actualizar contraseña
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\municipalidad-sistema V2\resources\views/livewire/admin/mi-perfil.blade.php ENDPATH**/ ?>