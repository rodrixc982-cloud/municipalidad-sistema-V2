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
.titulo { text-align:center; font-size:15px; font-weight:bold; letter-spacing:1px; margin-bottom:24px; }
p { line-height:1.9; text-align:justify; margin-bottom:14px; }
.motivo-box { background:#FAFAF8; border:1px solid #EDEAE2; border-radius:6px; padding:14px; margin-bottom:30px; white-space:pre-line; }
.firmas { display:table; width:100%; margin-top:50px; }
.firma-celda { display:table-cell; text-align:center; }
.firma-linea { display:inline-block; border-top:1px solid #1C1B19; padding-top:6px; font-size:9px; color:#6B6862; width:180px; }
.pie { margin-top:30px; padding-top:8px; border-top:1px solid #EDEAE2; font-size:8px; color:#A8A498; text-align:center; }
</style>
</head>
<body>
<div class="header">
  <div class="header-l">
    <span class="escudo">M</span>
    <span style="display:inline-block;vertical-align:middle;margin-left:10px;">
      <div style="font-size:13px;font-weight:bold;">{{ $municipio_nombre ?? 'MUNICIPALIDAD DISTRITAL' }}</div>
      <div style="font-size:9px;color:#6B6862;">Gestión Municipal Integrada</div>
    </span>
  </div>
  <div class="header-r">{{ $fecha_documento ?? now()->format('d/m/Y') }}</div>
</div>
<div class="titulo">CARTA PODER SIMPLE</div>
<p>Yo, <strong>{{ $poder_poderdante ?? '[Nombre del poderdante]' }}</strong>, identificado(a) con documento N° <strong>{{ $poder_documento_poderdante ?? '[Documento]' }}</strong>, por medio del presente documento otorgo poder a:</p>
<p><strong>{{ $poder_apoderado ?? '[Nombre del apoderado]' }}</strong>, identificado(a) con documento N° <strong>{{ $poder_documento_apoderado ?? '[Documento]' }}</strong>, para realizar el siguiente trámite:</p>
<div class="motivo-box">{{ $poder_motivo ?? '[Motivo del poder]' }}</div>
<div class="firmas">
  <div class="firma-celda"><div class="firma-linea">Firma del poderdante<br>{{ $poder_documento_poderdante ?? '' }}</div></div>
  <div class="firma-celda"><div class="firma-linea">Firma del apoderado<br>{{ $poder_documento_apoderado ?? '' }}</div></div>
</div>
<div class="pie">Documento generado por el Sistema de Gestión Municipal · {{ now()->format('d/m/Y H:i') }}</div>
</body>
</html>
