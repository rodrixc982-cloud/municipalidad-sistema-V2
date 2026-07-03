<x-pdf.layout :codigo-documento="$expediente->numero_expediente">
    <div style="text-align: center; margin: 10px 0 28px;">
        <div style="font-size: 15px; font-weight: bold; letter-spacing: 0.5px;">
            CONSTANCIA
        </div>
        <div style="font-size: 11px; color: #6B6862; margin-top: 3px;">
            {{ $expediente->tipoTramite->nombre }}
        </div>
    </div>

    <p style="font-size: 11px; line-height: 1.8; text-align: justify; margin-bottom: 18px;">
        La Municipalidad, a través de la oficina de <strong>{{ $expediente->tipoTramite->area_responsable }}</strong>,
        deja constancia que el(la) contribuyente
        <strong>{{ $expediente->contribuyente->nombre_completo }}</strong>,
        identificado(a) con {{ $expediente->contribuyente->tipo_documento }}
        N° <strong>{{ $expediente->contribuyente->numero_documento }}</strong>,
        ha tramitado ante esta entidad el procedimiento de
        <strong>{{ $expediente->tipoTramite->nombre }}</strong>,
        registrado bajo el expediente N° <strong>{{ $expediente->numero_expediente }}</strong>,
        referido al asunto: "{{ $expediente->asunto }}".
    </p>

    <p style="font-size: 11px; line-height: 1.8; text-align: justify; margin-bottom: 18px;">
        Se expide la presente constancia para los fines que el(la) interesado(a) estime conveniente,
        con estado actual <strong>{{ str($expediente->estado)->replace('_', ' ')->upper() }}</strong>.
    </p>

    <table class="datos" style="margin-top: 20px;">
        <tr>
            <td class="etiqueta">Expediente N°</td>
            <td class="valor">{{ $expediente->numero_expediente }}</td>
        </tr>
        <tr>
            <td class="etiqueta">Fecha de emisión</td>
            <td class="valor">{{ now()->format('d/m/Y') }}</td>
        </tr>
    </table>

    <div style="margin-top: 60px; text-align: center;">
        <div style="display: inline-block; width: 240px; border-top: 1px solid #1C1B19; padding-top: 6px; font-size: 9.5px; color: #6B6862;">
            Firma y sello de la autoridad competente
        </div>
    </div>
</x-pdf.layout>
