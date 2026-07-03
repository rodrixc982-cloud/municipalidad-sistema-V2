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
.nombre .t { font-size:13px; font-weight:bold; }
.nombre .s { font-size:9px; color:#6B6862; }
.titulo { text-align:center; font-size:15px; font-weight:bold; letter-spacing:1px; margin-bottom:6px; }
.subtitulo { text-align:center; font-size:9px; color:#6B6862; margin-bottom:24px; }
.cuerpo { line-height:1.9; text-align:justify; white-space:pre-line; color:#3D3B36; }
.firma { margin-top:60px; text-align:center; }
.firma-linea { display:inline-block; border-top:1px solid #1C1B19; padding-top:6px; font-size:9px; color:#6B6862; width:220px; }
.pie { margin-top:30px; padding-top:8px; border-top:1px solid #EDEAE2; font-size:8px; color:#A8A498; text-align:center; }
</style>
</head>
<body>
<div class="header">
  <div class="header-l">
    <span class="escudo">M</span>
    <span class="nombre"><div class="t">{{ $municipio_nombre ?? 'MUNICIPALIDAD DISTRITAL' }}</div><div class="s">Gestión Municipal Integrada</div></span>
  </div>
  <div class="header-r">{{ $fecha_documento ?? now()->format('d/m/Y') }}</div>
</div>
<div class="titulo">{{ $constancia_titulo ?? 'CONSTANCIA' }}</div>
<div class="subtitulo">{{ $area_emisora ?? '' }}</div>
<div class="cuerpo">{{ $constancia_cuerpo ?? '' }}</div>
<div class="firma"><div class="firma-linea">{{ $constancia_firmante ?? 'EL ALCALDE' }}</div></div>
<div class="pie">Documento generado por el Sistema de Gestión Municipal · {{ now()->format('d/m/Y H:i') }}</div>
</body>
</html>
