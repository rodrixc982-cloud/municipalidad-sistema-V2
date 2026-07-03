<x-pdf.layout>
    <div style="text-align: center; margin: 10px 0 28px;">
        <div style="font-size: 15px; font-weight: bold; letter-spacing: 0.5px;">CARTA PODER SIMPLE</div>
    </div>

    <p style="font-size: 11px; line-height: 1.9; text-align: justify; margin-bottom: 16px;">
        Yo, <strong>{{ $poderdante }}</strong>, identificado(a) con documento de identidad
        N° <strong>{{ $poderdante_documento }}</strong>, por medio del presente documento otorgo
        poder amplio y suficiente a:
    </p>

    <p style="font-size: 11px; line-height: 1.9; text-align: justify; margin-bottom: 16px;">
        <strong>{{ $apoderado }}</strong>, identificado(a) con documento de identidad
        N° <strong>{{ $apoderado_documento }}</strong>,
    </p>

    <p style="font-size: 11px; line-height: 1.9; text-align: justify; margin-bottom: 16px;">
        para que en mi nombre y representación realice el siguiente trámite ante la Municipalidad:
    </p>

    <div style="background: #FAFAF8; border: 1px solid #EDEAE2; border-radius: 6px; padding: 14px 16px; margin-bottom: 20px;">
        <p style="font-size: 10.5px; line-height: 1.7; margin: 0; text-align: justify;">{{ $motivo }}</p>
    </div>

    <p style="font-size: 11px; line-height: 1.9; text-align: justify; margin-bottom: 30px;">
        En fe de lo cual firmo el presente documento en señal de conformidad, en la fecha que se indica a continuación.
    </p>

    <table style="width: 100%; margin-top: 50px;">
        <tr>
            <td style="width: 50%; text-align: center;">
                <div style="border-top: 1px solid #1C1B19; padding-top: 6px; font-size: 9.5px; color: #6B6862; width: 200px; margin: 0 auto;">
                    Firma del poderdante<br>{{ $poderdante_documento }}
                </div>
            </td>
            <td style="width: 50%; text-align: center;">
                <div style="border-top: 1px solid #1C1B19; padding-top: 6px; font-size: 9.5px; color: #6B6862; width: 200px; margin: 0 auto;">
                    Firma del apoderado<br>{{ $apoderado_documento }}
                </div>
            </td>
        </tr>
    </table>

    <p style="font-size: 9.5px; color: #A8A498; margin-top: 30px; text-align: center;">
        {{ now()->translatedFormat('d \d\e F \d\e Y') }}
    </p>
</x-pdf.layout>
