<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    
    <div class="space-y-4">
        <div class="bg-white border border-[#EDEAE2] rounded-2xl p-5 shadow-sm">
            <h2 class="text-[15px] font-semibold text-[#1C1B19] mb-4">Editor de documentos</h2>

            
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 mb-5">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['constancia' => 'Constancia', 'resolucion' => 'Resolución', 'carta' => 'Carta oficial', 'carta-poder' => 'Carta poder']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button wire:click="$set('tipoDocumento', '<?php echo e($tipo); ?>')"
                            class="px-3 py-2 rounded-xl text-[12.5px] font-medium transition <?php echo e($tipoDocumento === $tipo ? 'bg-[#7A1F2B] text-white shadow-sm' : 'bg-[#F2EFE8] text-[#6B6862] hover:bg-[#EDEAE2]'); ?>">
                        <?php echo e($label); ?>

                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div class="grid grid-cols-2 gap-3 mb-4">
                <div>
                    <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Municipio</label>
                    <input type="text" wire:model.live="municipioNombre" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px]"/>
                </div>
                <div>
                    <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Fecha</label>
                    <input type="text" wire:model.live="fechaDocumento" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px]"/>
                </div>
            </div>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($tipoDocumento, ['constancia', 'resolucion'])): ?>
                <div class="mb-4">
                    <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Autocompletar desde expediente (opcional)</label>
                    <div class="flex gap-2">
                        <select wire:model="expedienteId" class="flex-1 rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px] bg-white">
                            <option value="">Selecciona un expediente aprobado…</option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $expedientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($exp->id); ?>"><?php echo e($exp->numero_expediente); ?> — <?php echo e($exp->contribuyente?->nombre_completo); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </select>
                        <button wire:click="cargarExpediente" class="px-3 py-2 rounded-xl bg-[#1C1B19] text-white text-[12.5px] font-medium hover:bg-[#33312D] transition">
                            Cargar
                        </button>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tipoDocumento === 'constancia'): ?>
                <div class="space-y-3">
                    <div>
                        <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Título del documento</label>
                        <input type="text" wire:model.live="constanciaTitulo" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px]"/>
                    </div>
                    <div>
                        <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Área emisora</label>
                        <input type="text" wire:model.live="areaEmisora" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px]"/>
                    </div>
                    <div>
                        <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Cuerpo del documento</label>
                        <textarea wire:model.live="constanciaCuerpo" rows="6" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px] resize-y"></textarea>
                    </div>
                    <div>
                        <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Firmante</label>
                        <input type="text" wire:model.live="constanciaFirmante" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px]"/>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tipoDocumento === 'resolucion'): ?>
                <div class="space-y-3">
                    <div>
                        <label class="block text-[12px] font-medium text-[#6B6862] mb-1">N° de Resolución</label>
                        <input type="text" wire:model.live="resolucionNumero" placeholder="R-0001-2026-MDU" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px]"/>
                    </div>
                    <div>
                        <label class="block text-[12px] font-medium text-[#6B6862] mb-1">VISTO</label>
                        <textarea wire:model.live="resolucionVisto" rows="2" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px] resize-y"></textarea>
                    </div>
                    <div>
                        <label class="block text-[12px] font-medium text-[#6B6862] mb-1">CONSIDERANDO</label>
                        <textarea wire:model.live="resolucionConsiderando" rows="3" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px] resize-y"></textarea>
                    </div>
                    <div>
                        <label class="block text-[12px] font-medium text-[#6B6862] mb-1">SE RESUELVE</label>
                        <textarea wire:model.live="resolucionResuelve" rows="4" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px] resize-y"></textarea>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tipoDocumento === 'carta'): ?>
                <div class="space-y-3">
                    <div>
                        <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Destinatario</label>
                        <input type="text" wire:model.live="cartaDestinatario" placeholder="Señor(a) Nombre del destinatario" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px]"/>
                    </div>
                    <div>
                        <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Asunto</label>
                        <input type="text" wire:model.live="cartaAsunto" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px]"/>
                    </div>
                    <div>
                        <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Cuerpo de la carta</label>
                        <textarea wire:model.live="cartaCuerpo" rows="6" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px] resize-y"></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Remitente</label>
                            <input type="text" wire:model.live="cartaRemitente" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px]"/>
                        </div>
                        <div>
                            <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Cargo</label>
                            <input type="text" wire:model.live="cartaCargoRemitente" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px]"/>
                        </div>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tipoDocumento === 'carta-poder'): ?>
                <div class="space-y-3">
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Nombre del poderdante</label>
                            <input type="text" wire:model.live="poderPoderdante" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px]"/>
                        </div>
                        <div>
                            <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Documento</label>
                            <input type="text" wire:model.live="poderDocumentoPoderdante" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px]"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Nombre del apoderado</label>
                            <input type="text" wire:model.live="poderApoderado" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px]"/>
                        </div>
                        <div>
                            <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Documento</label>
                            <input type="text" wire:model.live="poderDocumentoApoderado" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px]"/>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[12px] font-medium text-[#6B6862] mb-1">Motivo del poder</label>
                        <textarea wire:model.live="poderMotivo" rows="4" class="w-full rounded-xl border border-[#E3E0D9] px-3 py-2 text-[13px] resize-y"></textarea>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <div class="mt-5 pt-4 border-t border-[#F2EFE8]">
                <form action="<?php echo e(route('documentos.editor-pdf')); ?>" method="POST" target="_blank">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="tipo" value="<?php echo e($tipoDocumento); ?>">
                    <input type="hidden" name="municipio_nombre" value="<?php echo e($municipioNombre); ?>">
                    <input type="hidden" name="fecha_documento" value="<?php echo e($fechaDocumento); ?>">
                    <input type="hidden" name="area_emisora" value="<?php echo e($areaEmisora); ?>">
                    <input type="hidden" name="constancia_titulo" value="<?php echo e($constanciaTitulo); ?>">
                    <input type="hidden" name="constancia_cuerpo" value="<?php echo e($constanciaCuerpo); ?>">
                    <input type="hidden" name="constancia_firmante" value="<?php echo e($constanciaFirmante); ?>">
                    <input type="hidden" name="resolucion_numero" value="<?php echo e($resolucionNumero); ?>">
                    <input type="hidden" name="resolucion_visto" value="<?php echo e($resolucionVisto); ?>">
                    <input type="hidden" name="resolucion_considerando" value="<?php echo e($resolucionConsiderando); ?>">
                    <input type="hidden" name="resolucion_resuelve" value="<?php echo e($resolucionResuelve); ?>">
                    <input type="hidden" name="carta_destinatario" value="<?php echo e($cartaDestinatario); ?>">
                    <input type="hidden" name="carta_asunto" value="<?php echo e($cartaAsunto); ?>">
                    <input type="hidden" name="carta_cuerpo" value="<?php echo e($cartaCuerpo); ?>">
                    <input type="hidden" name="carta_remitente" value="<?php echo e($cartaRemitente); ?>">
                    <input type="hidden" name="carta_cargo_remitente" value="<?php echo e($cartaCargoRemitente); ?>">
                    <input type="hidden" name="poder_poderdante" value="<?php echo e($poderPoderdante); ?>">
                    <input type="hidden" name="poder_documento_poderdante" value="<?php echo e($poderDocumentoPoderdante); ?>">
                    <input type="hidden" name="poder_apoderado" value="<?php echo e($poderApoderado); ?>">
                    <input type="hidden" name="poder_documento_apoderado" value="<?php echo e($poderDocumentoApoderado); ?>">
                    <input type="hidden" name="poder_motivo" value="<?php echo e($poderMotivo); ?>">
                    <button type="submit"
                            class="w-full flex items-center justify-center gap-2 py-3 rounded-xl bg-[#7A1F2B] hover:bg-[#671A24] text-white text-[13.5px] font-medium transition">
                        <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 10v6M9 13l3 3 3-3M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Generar PDF con este contenido
                    </button>
                </form>
            </div>
        </div>
    </div>

    
    <div class="sticky top-6">
        <div class="bg-white border border-[#EDEAE2] rounded-2xl shadow-sm overflow-hidden">
            <div class="px-5 py-3.5 border-b border-[#EDEAE2] flex items-center gap-2 bg-[#FAFAF8]">
                <div class="w-3 h-3 rounded-full bg-red-400"></div>
                <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                <span class="text-[12px] text-[#A8A498] ml-2">Vista previa del documento</span>
            </div>

            <div class="p-6" style="font-family: 'DejaVu Sans', Georgia, serif; font-size: 11px; color: #1C1B19; min-height: 500px;">
                
                <div style="display:flex; justify-content:space-between; align-items:center; padding-bottom:12px; border-bottom:3px solid #7A1F2B; margin-bottom:22px;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <div style="width:36px;height:36px;background:#7A1F2B;border-radius:8px;display:flex;align-items:center;justify-content:center;color:white;font-size:16px;font-weight:bold;">M</div>
                        <div>
                            <div style="font-size:12px;font-weight:bold;"><?php echo e($municipioNombre); ?></div>
                            <div style="font-size:9px;color:#6B6862;">Gestión Municipal Integrada</div>
                        </div>
                    </div>
                    <div style="text-align:right;font-size:9px;color:#A8A498;"><?php echo e($fechaDocumento); ?></div>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tipoDocumento === 'constancia'): ?>
                    <div style="text-align:center; margin-bottom:20px;">
                        <div style="font-size:14px;font-weight:bold;letter-spacing:1px;"><?php echo e($constanciaTitulo ?: 'CONSTANCIA'); ?></div>
                        <div style="font-size:9px;color:#6B6862;margin-top:3px;"><?php echo e($areaEmisora); ?></div>
                    </div>
                    <p style="line-height:1.8;text-align:justify;color:#3D3B36;"><?php echo e($constanciaCuerpo); ?></p>
                    <div style="margin-top:50px;text-align:center;">
                        <div style="display:inline-block;border-top:1px solid #1C1B19;padding-top:6px;font-size:9px;color:#6B6862;width:200px;"><?php echo e($constanciaFirmante); ?></div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tipoDocumento === 'resolucion'): ?>
                    <div style="text-align:center;margin-bottom:20px;">
                        <div style="font-size:14px;font-weight:bold;">RESOLUCIÓN MUNICIPAL</div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($resolucionNumero): ?>
                            <div style="font-size:12px;color:#7A1F2B;font-weight:bold;margin-top:3px;">N° <?php echo e($resolucionNumero); ?></div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($resolucionVisto): ?>
                        <p style="margin-bottom:10px;line-height:1.7;text-align:justify;"><strong>VISTO:</strong> <?php echo e($resolucionVisto); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($resolucionConsiderando): ?>
                        <p style="margin-bottom:10px;line-height:1.7;text-align:justify;"><strong>CONSIDERANDO:</strong> <?php echo e($resolucionConsiderando); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($resolucionResuelve): ?>
                        <p style="font-weight:bold;margin-bottom:8px;">SE RESUELVE:</p>
                        <p style="line-height:1.7;text-align:justify;white-space:pre-line;"><?php echo e($resolucionResuelve); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div style="margin-top:50px;text-align:center;">
                        <div style="display:inline-block;border-top:1px solid #1C1B19;padding-top:6px;font-size:9px;color:#6B6862;width:220px;">Firma y sello — Alcaldía</div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tipoDocumento === 'carta'): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cartaDestinatario): ?>
                        <p style="margin-bottom:12px;"><strong>Señor(a):</strong><br><?php echo e($cartaDestinatario); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cartaAsunto): ?>
                        <p style="margin-bottom:14px;"><strong>Asunto:</strong> <?php echo e($cartaAsunto); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <p style="line-height:1.9;text-align:justify;white-space:pre-line;margin-bottom:40px;"><?php echo e($cartaCuerpo); ?></p>
                    <div style="text-align:center;">
                        <div style="display:inline-block;border-top:1px solid #1C1B19;padding-top:6px;font-size:9px;color:#6B6862;width:200px;">
                            <?php echo e($cartaRemitente); ?><br><?php echo e($cartaCargoRemitente); ?>

                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tipoDocumento === 'carta-poder'): ?>
                    <div style="text-align:center;margin-bottom:20px;font-size:14px;font-weight:bold;">CARTA PODER SIMPLE</div>
                    <p style="line-height:1.9;text-align:justify;margin-bottom:12px;">
                        Yo, <strong><?php echo e($poderPoderdante ?: '[Nombre del poderdante]'); ?></strong>, identificado(a) con N° <strong><?php echo e($poderDocumentoPoderdante ?: '[Documento]'); ?></strong>, otorgo poder a:
                    </p>
                    <p style="line-height:1.9;text-align:justify;margin-bottom:12px;">
                        <strong><?php echo e($poderApoderado ?: '[Nombre del apoderado]'); ?></strong>, N° <strong><?php echo e($poderDocumentoApoderado ?: '[Documento]'); ?></strong>, para:
                    </p>
                    <div style="background:#FAFAF8;border:1px solid #EDEAE2;border-radius:6px;padding:12px;margin-bottom:40px;">
                        <p style="line-height:1.7;white-space:pre-line;"><?php echo e($poderMotivo ?: '[Describa el motivo del poder]'); ?></p>
                    </div>
                    <div style="display:flex;justify-content:space-around;margin-top:40px;">
                        <div style="text-align:center;border-top:1px solid #1C1B19;padding-top:6px;font-size:9px;color:#6B6862;width:160px;">Firma del poderdante</div>
                        <div style="text-align:center;border-top:1px solid #1C1B19;padding-top:6px;font-size:9px;color:#6B6862;width:160px;">Firma del apoderado</div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div style="margin-top:30px;padding-top:8px;border-top:1px solid #EDEAE2;font-size:8px;color:#A8A498;text-align:center;">
                    Documento generado por el Sistema de Gestión Municipal · <?php echo e(now()->format('d/m/Y')); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\municipalidad-sistema V2\resources\views/livewire/documentos/editor-documentos.blade.php ENDPATH**/ ?>