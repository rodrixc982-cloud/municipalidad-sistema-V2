<div class="min-h-screen flex">
    
    <div class="hidden lg:flex lg:w-[42%] relative bg-[#7A1F2B] flex-col justify-between p-12 overflow-hidden">
        <div class="absolute inset-0 opacity-[0.06]"
             style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 28px 28px;">
        </div>

        <div class="relative z-10 flex items-center gap-3">
            <div class="w-11 h-11 rounded-lg bg-white/10 border border-white/20 flex items-center justify-center">
                <svg viewBox="0 0 24 24" class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="1.6">
                    <path d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <span class="text-white font-medium tracking-tight text-[15px]">Sistema Municipal</span>
        </div>

        <div class="relative z-10">
            <p class="text-[13px] uppercase tracking-[0.18em] text-white/50 font-medium mb-4">Gestión Municipal Integrada</p>
            <h1 class="text-[2.75rem] leading-[1.08] font-semibold text-white tracking-tight">
                Trámites, predios<br/>y rentas en un<br/>solo lugar.
            </h1>
            <p class="mt-6 text-white/65 text-[15px] leading-relaxed max-w-md">
                Mesa de partes, catastro, recaudación y planillas conectados,
                para que cada expediente tenga trazabilidad completa.
            </p>
        </div>

        <div class="relative z-10 flex items-center gap-6 text-white/40 text-[13px]">
            <span>© <?php echo e(date('Y')); ?> Municipalidad</span>
            <span class="w-1 h-1 rounded-full bg-white/30"></span>
            <span>Plataforma interna</span>
        </div>
    </div>

    
    <div class="flex-1 flex items-center justify-center bg-[#FAFAF8] px-6 py-12">
        <div class="w-full max-w-[400px]">
            <div class="lg:hidden flex items-center gap-3 mb-10 justify-center">
                <div class="w-10 h-10 rounded-lg bg-[#7A1F2B] flex items-center justify-center">
                    <svg viewBox="0 0 24 24" class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="font-medium text-[15px] text-[#1C1B19]">Sistema Municipal</span>
            </div>

            <h2 class="text-[1.6rem] font-semibold text-[#1C1B19] tracking-tight">Inicia sesión</h2>
            <p class="mt-1.5 text-[#6B6862] text-[14.5px]">Ingresa con tu cuenta institucional para continuar.</p>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status')): ?>
                <div class="mt-6 rounded-lg bg-emerald-50 border border-emerald-200 px-4 py-3 text-[13.5px] text-emerald-700">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <form wire:submit="login" class="mt-8 space-y-5">
                <div>
                    <label for="email" class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Correo electrónico</label>
                    <input
                        wire:model="email"
                        type="email"
                        id="email"
                        autofocus
                        autocomplete="username"
                        placeholder="usuario@municipalidad.gob.pe"
                        class="w-full rounded-lg border border-[#E3E0D9] bg-white px-3.5 py-2.5 text-[14.5px] text-[#1C1B19] placeholder:text-[#A8A498] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B] transition"
                    />
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1.5 text-[13px] text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-[13px] font-medium text-[#3D3B36]">Contraseña</label>
                    </div>
                    <input
                        wire:model="password"
                        type="password"
                        id="password"
                        autocomplete="current-password"
                        placeholder="••••••••"
                        class="w-full rounded-lg border border-[#E3E0D9] bg-white px-3.5 py-2.5 text-[14.5px] text-[#1C1B19] placeholder:text-[#A8A498] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B] transition"
                    />
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1.5 text-[13px] text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <label class="flex items-center gap-2 cursor-pointer select-none">
                    <input wire:model="remember" type="checkbox" class="rounded border-[#D5D1C7] text-[#7A1F2B] focus:ring-[#7A1F2B]/30" />
                    <span class="text-[13.5px] text-[#6B6862]">Mantener sesión iniciada</span>
                </label>

                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    wire:target="login"
                    class="w-full rounded-lg bg-[#7A1F2B] hover:bg-[#671A24] disabled:opacity-60 text-white text-[14.5px] font-medium py-2.5 transition flex items-center justify-center gap-2"
                >
                    <span wire:loading.remove wire:target="login">Ingresar al sistema</span>
                    <span wire:loading wire:target="login">Verificando…</span>
                </button>
            </form>

            <p class="mt-8 text-center text-[12.5px] text-[#A8A498]">
                Acceso restringido a personal autorizado de la municipalidad.
            </p>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\municipalidad-sistema V2\resources\views/livewire/auth/login.blade.php ENDPATH**/ ?>