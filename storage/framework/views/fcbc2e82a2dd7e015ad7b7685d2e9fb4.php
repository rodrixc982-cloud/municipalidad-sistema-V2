<?php if (isset($component)) { $__componentOriginala7856345da085b918b418afa7c1e4f75 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala7856345da085b918b418afa7c1e4f75 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.pdf.layout','data' => ['codigoDocumento' => $numeroResolucion]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pdf.layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['codigo-documento' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($numeroResolucion)]); ?>
    <div style="text-align: center; margin: 10px 0 26px;">
        <div style="font-size: 14px; font-weight: bold; letter-spacing: 0.5px;">
            RESOLUCIÓN DE <?php echo e(str($expediente->estado)->upper()); ?>

        </div>
        <div style="font-size: 13px; color: #7A1F2B; font-weight: bold; margin-top: 4px;">
            N° <?php echo e($numeroResolucion); ?>

        </div>
    </div>

    <p style="font-size: 10.5px; line-height: 1.8; text-align: justify; margin-bottom: 14px;">
        <strong>VISTO:</strong> el expediente N° <?php echo e($expediente->numero_expediente); ?>, sobre
        <?php echo e($expediente->tipoTramite->nombre); ?>, presentado por
        <?php echo e($expediente->contribuyente->nombre_completo); ?>,
        identificado(a) con <?php echo e($expediente->contribuyente->tipo_documento); ?> N°
        <?php echo e($expediente->contribuyente->numero_documento); ?>; y,
    </p>

    <p style="font-size: 10.5px; line-height: 1.8; text-align: justify; margin-bottom: 14px;">
        <strong>CONSIDERANDO:</strong> que conforme al Texto Único de Procedimientos Administrativos (TUPA)
        de la Municipalidad, el procedimiento <?php echo e($expediente->tipoTramite->codigo); ?> -
        <?php echo e($expediente->tipoTramite->nombre); ?>, fue evaluado por la oficina de
        <?php echo e($expediente->tipoTramite->area_responsable); ?>, concluyendo dicha evaluación
        con fecha <?php echo e(now()->format('d/m/Y')); ?>;
    </p>

    <p style="font-size: 10.5px; line-height: 1.8; text-align: justify; margin-bottom: 20px;">
        Que, estando a lo expuesto y en uso de las facultades conferidas;
    </p>

    <div style="font-size: 11px; font-weight: bold; margin-bottom: 8px;">SE RESUELVE:</div>

    <p style="font-size: 10.5px; line-height: 1.8; text-align: justify; margin-bottom: 14px;">
        <strong>ARTÍCULO PRIMERO.-</strong>
        <?php echo e($expediente->estado === 'aprobado' ? 'APROBAR' : 'RESOLVER'); ?> el procedimiento
        administrativo correspondiente al expediente N° <?php echo e($expediente->numero_expediente); ?>,
        referido a "<?php echo e($expediente->asunto); ?>", a favor de
        <?php echo e($expediente->contribuyente->nombre_completo); ?>.
    </p>

    <p style="font-size: 10.5px; line-height: 1.8; text-align: justify; margin-bottom: 14px;">
        <strong>ARTÍCULO SEGUNDO.-</strong> ENCARGAR a la oficina de
        <?php echo e($expediente->tipoTramite->area_responsable); ?> el cumplimiento de la presente resolución
        y su debida notificación al(a la) administrado(a).
    </p>

    <p style="font-size: 10.5px; line-height: 1.8; text-align: justify; margin-bottom: 30px;">
        Regístrese, comuníquese y archívese.
    </p>

    <div style="text-align: center; margin-top: 40px;">
        <div style="display: inline-block; width: 260px; border-top: 1px solid #1C1B19; padding-top: 6px; font-size: 9.5px; color: #6B6862;">
            Firma y sello de Alcaldía / Gerencia Municipal
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
<?php /**PATH C:\laragon\www\municipalidad-sistema V2\resources\views/pdf/resolucion.blade.php ENDPATH**/ ?>