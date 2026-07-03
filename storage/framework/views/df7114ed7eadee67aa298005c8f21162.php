<?php if (isset($component)) { $__componentOriginala7856345da085b918b418afa7c1e4f75 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala7856345da085b918b418afa7c1e4f75 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.pdf.layout','data' => ['codigoDocumento' => $pago->numero_comprobante]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pdf.layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['codigo-documento' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pago->numero_comprobante)]); ?>
    <div style="text-align: center; margin-bottom: 22px;">
        <div style="font-size: 15px; font-weight: bold; letter-spacing: 0.5px;">
            <?php echo e($pago->tipo_comprobante === 'boleta' ? 'BOLETA DE PAGO' : 'RECIBO DE PAGO'); ?>

        </div>
        <div style="font-size: 13px; color: #7A1F2B; font-weight: bold; margin-top: 4px;">
            N° <?php echo e($pago->numero_comprobante); ?>

        </div>
    </div>

    <table class="datos">
        <tr>
            <td class="etiqueta">Contribuyente</td>
            <td class="valor"><?php echo e($pago->contribuyente->nombre_completo); ?></td>
        </tr>
        <tr>
            <td class="etiqueta">Documento</td>
            <td class="valor"><?php echo e($pago->contribuyente->tipo_documento); ?> <?php echo e($pago->contribuyente->numero_documento); ?></td>
        </tr>
        <tr>
            <td class="etiqueta">Concepto</td>
            <td class="valor"><?php echo e($pago->concepto); ?></td>
        </tr>
        <tr>
            <td class="etiqueta">Método de pago</td>
            <td class="valor"><?php echo e(str($pago->metodo_pago)->ucfirst()); ?></td>
        </tr>
        <tr>
            <td class="etiqueta">Fecha de pago</td>
            <td class="valor"><?php echo e($pago->created_at->format('d/m/Y H:i')); ?></td>
        </tr>
        <tr>
            <td class="etiqueta">Cajero</td>
            <td class="valor"><?php echo e($pago->cajero->name); ?></td>
        </tr>
    </table>

    <div style="margin-top: 20px; padding: 16px 20px; background: #FAFAF8; border: 1px solid #EDEAE2; border-radius: 6px; text-align: right;">
        <div style="font-size: 10px; color: #6B6862;">MONTO TOTAL</div>
        <div style="font-size: 22px; font-weight: bold; color: #7A1F2B;">S/ <?php echo e(number_format($pago->monto, 2)); ?></div>
    </div>

    <div style="margin-top: 50px; text-align: center;">
        <div style="display: inline-block; width: 220px; border-top: 1px solid #1C1B19; padding-top: 6px; font-size: 9.5px; color: #6B6862;">
            Firma y sello del cajero
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
<?php /**PATH C:\laragon\www\municipalidad-sistema V2\resources\views/pdf/comprobante-pago.blade.php ENDPATH**/ ?>