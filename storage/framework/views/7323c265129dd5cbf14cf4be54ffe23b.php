<?php if (isset($component)) { $__componentOriginala7856345da085b918b418afa7c1e4f75 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala7856345da085b918b418afa7c1e4f75 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.pdf.layout','data' => ['codigoDocumento' => $expediente->numero_expediente]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pdf.layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['codigo-documento' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($expediente->numero_expediente)]); ?>
    <div style="text-align: center; margin: 10px 0 28px;">
        <div style="font-size: 15px; font-weight: bold; letter-spacing: 0.5px;">
            CONSTANCIA
        </div>
        <div style="font-size: 11px; color: #6B6862; margin-top: 3px;">
            <?php echo e($expediente->tipoTramite->nombre); ?>

        </div>
    </div>

    <p style="font-size: 11px; line-height: 1.8; text-align: justify; margin-bottom: 18px;">
        La Municipalidad, a través de la oficina de <strong><?php echo e($expediente->tipoTramite->area_responsable); ?></strong>,
        deja constancia que el(la) contribuyente
        <strong><?php echo e($expediente->contribuyente->nombre_completo); ?></strong>,
        identificado(a) con <?php echo e($expediente->contribuyente->tipo_documento); ?>

        N° <strong><?php echo e($expediente->contribuyente->numero_documento); ?></strong>,
        ha tramitado ante esta entidad el procedimiento de
        <strong><?php echo e($expediente->tipoTramite->nombre); ?></strong>,
        registrado bajo el expediente N° <strong><?php echo e($expediente->numero_expediente); ?></strong>,
        referido al asunto: "<?php echo e($expediente->asunto); ?>".
    </p>

    <p style="font-size: 11px; line-height: 1.8; text-align: justify; margin-bottom: 18px;">
        Se expide la presente constancia para los fines que el(la) interesado(a) estime conveniente,
        con estado actual <strong><?php echo e(str($expediente->estado)->replace('_', ' ')->upper()); ?></strong>.
    </p>

    <table class="datos" style="margin-top: 20px;">
        <tr>
            <td class="etiqueta">Expediente N°</td>
            <td class="valor"><?php echo e($expediente->numero_expediente); ?></td>
        </tr>
        <tr>
            <td class="etiqueta">Fecha de emisión</td>
            <td class="valor"><?php echo e(now()->format('d/m/Y')); ?></td>
        </tr>
    </table>

    <div style="margin-top: 60px; text-align: center;">
        <div style="display: inline-block; width: 240px; border-top: 1px solid #1C1B19; padding-top: 6px; font-size: 9.5px; color: #6B6862;">
            Firma y sello de la autoridad competente
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala7856345da085b918b418afa7c1e4f75)): ?>
<?php $attributes = $__attributesOriginala7856345da085b918b418afa7c1e4f75; ?>
<?php unset($__attributesOriginala7856345da085b918b418afa7c1e4f75); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala7856345da085b918b418afa7c1e4f75)): ?>
<?php $component = $__componentOriginala7856345da085b918b418afa7c1e4f75; ?>
<?php unset($__componentOriginala7856345da085b918b418afa7c1e4f75); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\municipalidad-sistema V2\resources\views/pdf/constancia.blade.php ENDPATH**/ ?>