<x-pdf.layout :codigo-documento="$licencia->numero_licencia">
    <div style="text-align: center; margin: 10px 0 28px;">
        <div style="font-size: 15px; font-weight: bold; letter-spacing: 0.5px;">LICENCIA DE FUNCIONAMIENTO</div>
        <div style="font-size: 13px; color: #7A1F2B; font-weight: bold; margin-top: 4px;">N° {{ $licencia->numero_licencia }}</div>
    </div>

    <p style="font-size: 11px; line-height: 1.8; text-align: justify; margin-bottom: 18px;">
        La Municipalidad autoriza el funcionamiento del establecimiento comercial detallado a continuación,
        de conformidad con las normas vigentes en materia de licencias municipales.
    </p>

    <table class="datos">
        <tr>
            <td class="etiqueta">Nombre comercial</td>
            <td class="valor">{{ $licencia->nombre_comercial }}</td>
        </tr>
        <tr>
            <td class="etiqueta">Titular</td>
            <td class="valor">{{ $licencia->contribuyente->nombre_completo }}</td>
        </tr>
        <tr>
            <td class="etiqueta">Documento del titular</td>
            <td class="valor">{{ $licencia->contribuyente->tipo_documento }} {{ $licencia->contribuyente->numero_documento }}</td>
        </tr>
        <tr>
            <td class="etiqueta">Giro de negocio</td>
            <td class="valor">{{ $licencia->giro_negocio }}</td>
        </tr>
        <tr>
            <td class="etiqueta">Dirección del local</td>
            <td class="valor">{{ $licencia->direccion_local }}</td>
        </tr>
        <tr>
            <td class="etiqueta">Fecha de emisión</td>
            <td class="valor">{{ $licencia->fecha_emision->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td class="etiqueta">Fecha de vencimiento</td>
            <td class="valor">{{ $licencia->fecha_vencimiento?->format('d/m/Y') ?? 'Indefinida' }}</td>
        </tr>
        <tr>
            <td class="etiqueta">Estado</td>
            <td class="valor">{{ str($licencia->estado)->upper() }}</td>
        </tr>
    </table>

    <p style="font-size: 9.5px; color: #6B6862; line-height: 1.6; margin-top: 20px;">
        Esta licencia es válida únicamente para el giro y dirección señalados. Cualquier cambio de
        titularidad, giro o domicilio del local requiere la actualización del presente documento ante
        la oficina de Licencias de la Municipalidad.
    </p>

    <div style="margin-top: 50px; text-align: center;">
        <div style="display: inline-block; width: 240px; border-top: 1px solid #1C1B19; padding-top: 6px; font-size: 9.5px; color: #6B6862;">
            Firma y sello — Oficina de Licencias
        </div>
    </div>
</x-pdf.layout>
