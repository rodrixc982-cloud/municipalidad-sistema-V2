<x-pdf.layout :codigo-documento="$numeroResolucion">
    <div style="text-align: center; margin: 10px 0 26px;">
        <div style="font-size: 14px; font-weight: bold; letter-spacing: 0.5px;">
            RESOLUCIÓN DE {{ str($expediente->estado)->upper() }}
        </div>
        <div style="font-size: 13px; color: #7A1F2B; font-weight: bold; margin-top: 4px;">
            N° {{ $numeroResolucion }}
        </div>
    </div>

    <p style="font-size: 10.5px; line-height: 1.8; text-align: justify; margin-bottom: 14px;">
        <strong>VISTO:</strong> el expediente N° {{ $expediente->numero_expediente }}, sobre
        {{ $expediente->tipoTramite->nombre }}, presentado por
        {{ $expediente->contribuyente->nombre_completo }},
        identificado(a) con {{ $expediente->contribuyente->tipo_documento }} N°
        {{ $expediente->contribuyente->numero_documento }}; y,
    </p>

    <p style="font-size: 10.5px; line-height: 1.8; text-align: justify; margin-bottom: 14px;">
        <strong>CONSIDERANDO:</strong> que conforme al Texto Único de Procedimientos Administrativos (TUPA)
        de la Municipalidad, el procedimiento {{ $expediente->tipoTramite->codigo }} -
        {{ $expediente->tipoTramite->nombre }}, fue evaluado por la oficina de
        {{ $expediente->tipoTramite->area_responsable }}, concluyendo dicha evaluación
        con fecha {{ now()->format('d/m/Y') }};
    </p>

    <p style="font-size: 10.5px; line-height: 1.8; text-align: justify; margin-bottom: 20px;">
        Que, estando a lo expuesto y en uso de las facultades conferidas;
    </p>

    <div style="font-size: 11px; font-weight: bold; margin-bottom: 8px;">SE RESUELVE:</div>

    <p style="font-size: 10.5px; line-height: 1.8; text-align: justify; margin-bottom: 14px;">
        <strong>ARTÍCULO PRIMERO.-</strong>
        {{ $expediente->estado === 'aprobado' ? 'APROBAR' : 'RESOLVER' }} el procedimiento
        administrativo correspondiente al expediente N° {{ $expediente->numero_expediente }},
        referido a "{{ $expediente->asunto }}", a favor de
        {{ $expediente->contribuyente->nombre_completo }}.
    </p>

    <p style="font-size: 10.5px; line-height: 1.8; text-align: justify; margin-bottom: 14px;">
        <strong>ARTÍCULO SEGUNDO.-</strong> ENCARGAR a la oficina de
        {{ $expediente->tipoTramite->area_responsable }} el cumplimiento de la presente resolución
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
</x-pdf.layout>
