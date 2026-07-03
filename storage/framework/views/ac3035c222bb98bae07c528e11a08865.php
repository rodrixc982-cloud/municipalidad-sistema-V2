<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <style>
        @page { margin: 0; }
        * { box-sizing: border-box; }
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #1C1B19;
            font-size: 11px;
            margin: 0;
            padding: 0;
        }
        .pagina { padding: 35px 50px; }

        .membrete {
            display: table;
            width: 100%;
            border-bottom: 3px solid #7A1F2B;
            padding-bottom: 14px;
            margin-bottom: 26px;
        }
        .membrete-izq { display: table-cell; vertical-align: middle; width: 70%; }
        .membrete-der { display: table-cell; vertical-align: middle; width: 30%; text-align: right; }
        .escudo {
            display: inline-block;
            width: 38px; height: 38px;
            background: #7A1F2B;
            border-radius: 6px;
            text-align: center;
            line-height: 38px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            vertical-align: middle;
        }
        .nombre-municipio {
            display: inline-block;
            vertical-align: middle;
            margin-left: 10px;
        }
        .nombre-municipio .titulo { font-size: 13px; font-weight: bold; color: #1C1B19; }
        .nombre-municipio .subtitulo { font-size: 9px; color: #6B6862; margin-top: 1px; }
        .membrete-der .codigo { font-size: 9px; color: #A8A498; }

        .pie-pagina {
            position: fixed;
            bottom: 20px;
            left: 50px;
            right: 50px;
            font-size: 8.5px;
            color: #A8A498;
            text-align: center;
            border-top: 1px solid #EDEAE2;
            padding-top: 8px;
        }

        table.datos { width: 100%; border-collapse: collapse; margin-bottom: 14px; }
        table.datos td { padding: 5px 0; vertical-align: top; font-size: 10.5px; }
        table.datos td.etiqueta { color: #6B6862; width: 38%; }
        table.datos td.valor { color: #1C1B19; font-weight: bold; }
    </style>
</head>
<body>
    <div class="pagina">
        <div class="membrete">
            <div class="membrete-izq">
                <span class="escudo">M</span>
                <span class="nombre-municipio">
                    <div class="titulo">MUNICIPALIDAD DISTRITAL</div>
                    <div class="subtitulo">Gestión Municipal Integrada</div>
                </span>
            </div>
            <div class="membrete-der">
                <div class="codigo"><?php echo e($codigoDocumento ?? ''); ?></div>
                <div class="codigo"><?php echo e(now()->format('d/m/Y')); ?></div>
            </div>
        </div>

        <?php echo e($slot); ?>

    </div>

    <div class="pie-pagina">
        Documento generado por el Sistema de Gestión Municipal · <?php echo e(now()->format('d/m/Y H:i')); ?>

    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\municipalidad-sistema V2\resources\views/components/pdf/layout.blade.php ENDPATH**/ ?>