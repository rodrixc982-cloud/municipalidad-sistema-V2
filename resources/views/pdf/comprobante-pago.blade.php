<x-pdf.layout :codigo-documento="$pago->numero_comprobante">
    <div style="text-align: center; margin-bottom: 22px;">
        <div style="font-size: 15px; font-weight: bold; letter-spacing: 0.5px;">
            {{ $pago->tipo_comprobante === 'boleta' ? 'BOLETA DE PAGO' : 'RECIBO DE PAGO' }}
        </div>
        <div style="font-size: 13px; color: #7A1F2B; font-weight: bold; margin-top: 4px;">
            N° {{ $pago->numero_comprobante }}
        </div>
    </div>

    <table class="datos">
        <tr>
            <td class="etiqueta">Contribuyente</td>
            <td class="valor">{{ $pago->contribuyente->nombre_completo }}</td>
        </tr>
        <tr>
            <td class="etiqueta">Documento</td>
            <td class="valor">{{ $pago->contribuyente->tipo_documento }} {{ $pago->contribuyente->numero_documento }}</td>
        </tr>
        <tr>
            <td class="etiqueta">Concepto</td>
            <td class="valor">{{ $pago->concepto }}</td>
        </tr>
        <tr>
            <td class="etiqueta">Método de pago</td>
            <td class="valor">{{ str($pago->metodo_pago)->ucfirst() }}</td>
        </tr>
        <tr>
            <td class="etiqueta">Fecha de pago</td>
            <td class="valor">{{ $pago->created_at->format('d/m/Y H:i') }}</td>
        </tr>
        <tr>
            <td class="etiqueta">Cajero</td>
            <td class="valor">{{ $pago->cajero->name }}</td>
        </tr>
    </table>

    <div style="margin-top: 20px; padding: 16px 20px; background: #FAFAF8; border: 1px solid #EDEAE2; border-radius: 6px; text-align: right;">
        <div style="font-size: 10px; color: #6B6862;">MONTO TOTAL</div>
        <div style="font-size: 22px; font-weight: bold; color: #7A1F2B;">S/ {{ number_format($pago->monto, 2) }}</div>
    </div>

    <div style="margin-top: 50px; text-align: center;">
        <div style="display: inline-block; width: 220px; border-top: 1px solid #1C1B19; padding-top: 6px; font-size: 9.5px; color: #6B6862;">
            Firma y sello del cajero
        </div>
    </div>
</x-pdf.layout>
