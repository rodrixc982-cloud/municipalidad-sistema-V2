<div>
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3 flex-1 max-w-2xl">
            <div class="relative flex-1">
                <svg viewBox="0 0 24 24" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-[#A8A498]" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35" stroke-linecap="round"/>
                </svg>
                <input
                    type="text"
                    wire:model.live.debounce.350ms="busqueda"
                    placeholder="Buscar por N° expediente, DNI/RUC o asunto…"
                    class="w-full pl-9 pr-3.5 py-2.5 rounded-lg border border-[#E3E0D9] bg-white text-[13.5px] placeholder:text-[#A8A498] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B] transition"
                />
            </div>
            <select wire:model.live="filtroEstado" class="px-3 py-2.5 rounded-lg border border-[#E3E0D9] bg-white text-[13.5px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]">
                <option value="">Todos los estados</option>
                <option value="registrado">Registrado</option>
                <option value="en_proceso">En proceso</option>
                <option value="observado">Observado</option>
                <option value="aprobado">Aprobado</option>
                <option value="rechazado">Rechazado</option>
                <option value="finalizado">Finalizado</option>
            </select>
        </div>
        <a href="<?php echo e(route('expedientes.create')); ?>" wire:navigate
           class="ml-4 flex items-center gap-2 bg-[#7A1F2B] hover:bg-[#671A24] text-white text-[13.5px] font-medium px-4 py-2.5 rounded-lg transition whitespace-nowrap">
            <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg>
            Nuevo expediente
        </a>
    </div>

    <div class="bg-white border border-[#EDEAE2] rounded-xl overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-[#EDEAE2] bg-[#FAFAF8]">
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">N° Expediente</th>
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Contribuyente</th>
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Trámite</th>
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Área actual</th>
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Estado</th>
                    <th class="px-5 py-3 text-[12px] uppercase tracking-wide text-[#A8A498] font-medium">Fecha límite</th>
                    <th class="px-5 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#F2EFE8]">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $expedientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expediente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-[#FAFAF8] transition">
                        <td class="px-5 py-3.5 text-[13.5px] font-medium text-[#1C1B19]"><?php echo e($expediente->numero_expediente); ?></td>
                        <td class="px-5 py-3.5 text-[13.5px] text-[#3D3B36]"><?php echo e($expediente->contribuyente?->nombre_completo); ?></td>
                        <td class="px-5 py-3.5 text-[13.5px] text-[#6B6862]"><?php echo e($expediente->tipoTramite?->nombre); ?></td>
                        <td class="px-5 py-3.5 text-[13.5px] text-[#6B6862]"><?php echo e($expediente->area_actual); ?></td>
                        <td class="px-5 py-3.5">
                            <span class="text-[11.5px] px-2 py-1 rounded-md font-medium <?php echo e($expediente->colorEstado()); ?>">
                                <?php echo e(str($expediente->estado)->replace('_', ' ')->ucfirst()); ?>

                            </span>
                        </td>
                        <td class="px-5 py-3.5 text-[13px] <?php echo e($expediente->fecha_limite && $expediente->fecha_limite->isPast() && !in_array($expediente->estado, ['aprobado', 'rechazado', 'finalizado']) ? 'text-red-600 font-medium' : 'text-[#6B6862]'); ?>">
                            <?php echo e($expediente->fecha_limite?->format('d/m/Y') ?? '—'); ?>

                        </td>
                        <td class="px-5 py-3.5 text-right">
                            <a href="<?php echo e(route('expedientes.show', $expediente)); ?>" wire:navigate class="text-[13px] text-[#7A1F2B] hover:underline">Ver</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="px-5 py-12 text-center text-[13.5px] text-[#A8A498]">
                            No se encontraron expedientes con los filtros aplicados.
                        </td>
                    </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <?php echo e($expedientes->links()); ?>

    </div>
</div>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($modalEliminar): ?>
<div class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" wire:click="$set('modalEliminar',false)"></div>
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-sm p-6 text-center">
        <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-4">
            <svg viewBox="0 0 24 24" class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6M10 11v6M14 11v6M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <h3 class="text-[15px] font-semibold mb-2">¿Eliminar expediente?</h3>
        <p class="text-[13px] text-[#6B6862] mb-6">Esta acción no se puede deshacer.</p>
        <div class="flex gap-3">
            <button wire:click="$set('modalEliminar',false)" class="flex-1 px-4 py-2.5 rounded-xl border border-[#E3E0D9] text-[13.5px] font-medium text-[#6B6862] hover:bg-[#F2EFE8] transition">Cancelar</button>
            <button wire:click="eliminar" class="flex-1 px-4 py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white text-[13.5px] font-medium transition">Eliminar</button>
        </div>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\laragon\www\municipalidad-sistema V2\resources\views/livewire/mesa-partes/expediente-index.blade.php ENDPATH**/ ?>