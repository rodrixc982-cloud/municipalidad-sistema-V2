<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<style>
body { font-family:'DejaVu Sans',sans-serif; font-size:11px; color:#1C1B19; margin:0; padding:40px 50px; }
.header { display:table; width:100%; border-bottom:3px solid #7A1F2B; padding-bottom:12px; margin-bottom:24px; }
.header-l { display:table-cell; vertical-align:middle; }
.header-r { display:table-cell; vertical-align:middle; text-align:right; font-size:9px; color:#A8A498; }
.escudo { display:inline-block; width:36px; height:36px; background:#7A1F2B; border-radius:6px; text-align:center; line-height:36px; color:white; font-size:16px; font-weight:bold; vertical-align:middle; }
.nombre { display:inline-block; vertical-align:middle; margin-left:10px; }
.titulo { text-align:center; font-size:14px; font-weight:bold; letter-spacing:1px; margin-bottom:4px; }
.numero { text-align:center; font-size:13px; color:#7A1F2B; font-weight:bold; margin-bottom:24px; }
p { line-height:1.8; text-align:justify; margin-bottom:14px; }
.pie { margin-top:40px; padding-top:8px; border-top:1px solid #EDEAE2; font-size:8px; color:#A8A498; text-align:center; }
.firma { margin-top:50px; text-align:center; }
.firma-linea { display:inline-block; border-top:1px solid #1C1B19; padding-top:6px; font-size:9px; color:#6B6862; width:240px; }
</style>
</head>
<body>
<div class="header">
  <div class="header-l">
    <span class="escudo">M</span>
    <span class="nombre" style="display:inline-block;vertical-align:middle;margin-left:10px;">
      <div style="font-size:13px;font-weight:bold;">{{ $municipio_nombre ?? 'MUNICIPALIDAD DISTRITAL' }}</div>
      <div style="font-size:9px;color:#6B6862;">Gestión Municipal Integrada</div>
    </span>
  </div>
  <div class="header-r">{{ $fecha_documento ?? now()->format('d/m/Y') }}</div>
</div>
<div class="titulo">RESOLUCIÓN MUNICIPAL</div>
@if(!empty($resolucion_numero))
<div class="numero">N° {{ $resolucion_numero }}</div>
@endif
@if(!empty($resolucion_visto))
<p><strong>VISTO:</strong> {{ $resolucion_visto }}</p>
@endif
@if(!empty($resolucion_considerando))
<p><strong>CONSIDERANDO:</strong> {{ $resolucion_considerando }}</p>
<p>Que, estando a lo expuesto y en uso de las facultades conferidas;</p>
@endif
@if(!empty($resolucion_resuelve))
<p style="font-weight:bold;">SE RESUELVE:</p>
<p style="white-space:pre-line;">{{ $resolucion_resuelve }}</p>
@endif
<p>Regístrese, comuníquese y archívese.</p>
<div class="firma"><div class="firma-linea">Firma y sello — Alcaldía</div></div>
<div class="pie">Documento generado por el Sistema de Gestión Municipal · {{ now()->format('d/m/Y H:i') }}</div>
</body>
</html>
