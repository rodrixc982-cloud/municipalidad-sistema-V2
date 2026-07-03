<?php if (isset($component)) { $__componentOriginala7856345da085b918b418afa7c1e4f75 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala7856345da085b918b418afa7c1e4f75 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.pdf.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pdf.layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div style="text-align: center; margin: 10px 0 24px;">
        <div style="font-size: 15px; font-weight: bold; letter-spacing: 0.5px;">BOLETA DE PAGO</div>
        <div style="font-size: 11px; color: #6B6862; margin-top: 3px;">
            Periodo: <?php echo e(str_pad($planilla->mes, 2, '0', STR_PAD_LEFT)); ?>/<?php echo e($planilla->anio); ?>

        </div>
    </div>

    <table class="datos">
        <tr>
            <td class="etiqueta">Trabajador</td>
            <td class="valor"><?php echo e($planilla->empleado->nombres); ?> <?php echo e($planilla->empleado->apellidos); ?></td>
        </tr>
        <tr>
            <td class="etiqueta">DNI</td>
            <td class="valor"><?php echo e($planilla->empleado->dni); ?></td>
        </tr>
        <tr>
            <td class="etiqueta">Cargo</td>
            <td class="valor"><?php echo e($planilla->empleado->cargo); ?></td>
        </tr>
        <tr>
            <td class="etiqueta">Área</td>
            <td class="valor"><?php echo e($planilla->empleado->area); ?></td>
        </tr>
        <tr>
            <td class="etiqueta">Régimen laboral</td>
            <td class="valor"><?php echo e(str($planilla->empleado->regimen)->upper()); ?></td>
        </tr>
    </table>

    <table style="width: 100%; border-collapse: collapse; margin-top: 16px;">
        <thead>
            <tr style="background: #FAFAF8;">
                <th style="text-align: left; padding: 8px 10px; font-size: 10px; color: #6B6862; border-bottom: 1px solid #EDEAE2;">CONCEPTO</th>
                <th style="text-align: right; padding: 8px 10px; font-size: 10px; color: #6B6862; border-bottom: 1px solid #EDEAE2;">MONTO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 8px 10px; font-size: 10.5px; border-bottom: 1px solid #F2EFE8;">Remuneración bruta</td>
                <td style="padding: 8px 10px; font-size: 10.5px; text-align: right; border-bottom: 1px solid #F2EFE8;">S/ <?php echo e(number_format($planilla->sueldo_bruto, 2)); ?></td>
            </tr>
            <tr>
                <td style="padding: 8px 10px; font-size: 10.5px; border-bottom: 1px solid #F2EFE8; color: #B23B3B;">Descuentos (aportes/retenciones)</td>
                <td style="padding: 8px 10px; font-size: 10.5px; text-align: right; border-bottom: 1px solid #F2EFE8; color: #B23B3B;">- S/ <?php echo e(number_format($planilla->descuentos, 2)); ?></td>
            </tr>
        </tbody>
    </table>

    <div style="margin-top: 16px; padding: 16px 20px; background: #FAFAF8; border: 1px solid #EDEAE2; border-radius: 6px; text-align: right;">
        <div style="font-size: 10px; color: #6B6862;">NETO A PAGAR</div>
        <div style="font-size: 22px; font-weight: bold; color: #7A1F2B;">S/ <?php echo e(number_format($planilla->sueldo_neto, 2)); ?></div>
    </div>

    <table class="datos" style="margin-top: 16px;">
        <tr>
            <td class="etiqueta">Estado</td>
            <td class="valor"><?php echo e(str($planilla->estado)->ucfirst()); ?></td>
        </tr>
        <tr>
            <td class="etiqueta">Fecha de pago</td>
            <td class="valor"><?php echo e($planilla->fecha_pago?->format('d/m/Y') ?? 'Pendiente'); ?></td>
        </tr>
    </table>

    <div style="margin-top: 45px; text-align: center;">
        <div style="display: inline-block; width: 220px; border-top: 1px solid #1C1B19; padding-top: 6px; font-size: 9.5px; color: #6B6862;">
            Firma del trabajador
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
<?php /**PATH C:\laragon\www\municipalidad-sistema V2\resources\views/pdf/boleta-planilla.blade.php ENDPATH**/ ?>