<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado_Servicio_{{ $certificate->certificate_number }}</title>
    <style>
        @page {
            margin: 25px 30px;
            size: A4 portrait;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 11px;
            color: #1e293b;
            line-height: 1.35;
            margin: 0;
            padding: 0;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        .uppercase { text-transform: uppercase; }

        /* Header Table */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }
        .header-table td {
            vertical-align: middle;
        }

        .title-box {
            font-size: 18px;
            font-weight: 800;
            text-align: center;
            text-decoration: underline;
            letter-spacing: 0.5px;
            color: #0f172a;
        }

        /* Client Info Box */
        .client-box {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 14px;
        }
        .client-box td {
            vertical-align: top;
            padding: 2px 0;
        }

        /* Items Table */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 14px;
        }
        .items-table th {
            border-top: 2px solid #0f172a;
            border-bottom: 2px solid #0f172a;
            padding: 6px 8px;
            text-align: left;
            font-size: 12px;
            font-weight: bold;
        }
        .items-table td {
            padding: 8px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 11px;
        }

        /* Details Box */
        .details-container {
            background-color: #f8fafc;
            border-radius: 6px;
            padding: 10px 14px;
            margin-bottom: 14px;
            border: 1px solid #e2e8f0;
        }
        .details-title {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 6px;
            color: #0f172a;
        }
        .details-content {
            font-size: 10.5px;
            line-height: 1.4;
            white-space: pre-line;
            color: #334155;
        }

        /* 3 Images Grid Table */
        .photos-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }
        .photos-table td {
            width: 33.33%;
            text-align: center;
            vertical-align: middle;
            padding: 4px;
        }
        .photo-img {
            max-width: 100%;
            height: 130px;
            object-fit: cover;
            border-radius: 4px;
        }
        .qr-img {
            max-width: 100%;
            height: 115px;
            object-fit: contain;
        }

        /* Total Bar */
        .total-bar {
            width: 100%;
            border-top: 2px solid #0f172a;
            border-bottom: 2px solid #0f172a;
            padding: 6px 0;
            margin-bottom: 14px;
            font-size: 14px;
            font-weight: bold;
        }

        /* Footer Table */
        .footer-table {
            width: 100%;
            border-collapse: collapse;
        }
        .footer-table td {
            vertical-align: bottom;
            font-size: 9.5px;
            color: #334155;
        }
    </style>
</head>
<body>

    <!-- 1. Header Section -->
    <table class="header-table">
        <tr>
            <!-- Left Logo -->
            <td style="width: 25%;">
                @if($logoBase64)
                    <img src="{{ $logoBase64 }}" style="height: 38px; width: auto;" alt="Instalgaschile Logo">
                @else
                    <span style="font-size: 16px; font-weight: bold; color: #0284c7;">Instalgaschile®</span>
                @endif
            </td>

            <!-- Center Title -->
            <td style="width: 45%; text-align: center;">
                <div class="title-box">CERTIFICADO DE SERVICIO</div>
            </td>

            <!-- Right SEC Badge & Number -->
            <td style="width: 30%; text-align: right;">
                <div style="font-size: 13px; font-weight: bold; color: #0f172a; margin-bottom: 2px;">
                    N°: {{ $certificate->certificate_number }}
                </div>
                <div style="font-size: 11px; font-weight: bold; color: #475569; margin-bottom: 4px;">
                    FECHA: {{ \Carbon\Carbon::parse($certificate->date)->format('d/m/Y') }}
                </div>
                @if($secLogoBase64)
                    <img src="{{ $secLogoBase64 }}" style="height: 32px; width: auto;" alt="SEC Badge">
                @endif
            </td>
        </tr>
    </table>

    <!-- 2. Client Data Section -->
    <div style="margin-bottom: 8px; font-weight: bold; font-size: 11.5px;">Datos Cliente:</div>
    <table class="client-box">
        <tr>
            <td style="width: 50%;">
                <strong>Nombre :</strong> {{ $certificate->client_name }}<br>
                <strong>Provincia :</strong> {{ $certificate->client_provincia ?: 'Santiago' }}<br>
                <strong>Comuna :</strong> {{ $certificate->client_comuna ?: 'La Florida' }}
            </td>
            <td style="width: 50%;">
                <strong>Teléfono :</strong> {{ $certificate->client_phone ?: 'X' }}<br>
                <strong>Dirección :</strong> {{ $certificate->client_address }}
            </td>
        </tr>
    </table>

    <!-- 3. Items Table -->
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 50%;">Descripción</th>
                <th style="width: 20%; text-align: center;">Precio</th>
                <th style="width: 10%; text-align: center;">Cantidad</th>
                <th style="width: 20%; text-align: right;">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $certificate->description }}</td>
                <td style="text-align: center;">${{ number_format($certificate->unit_price, 0, ',', '.') }}</td>
                <td style="text-align: center;">{{ $certificate->quantity }}</td>
                <td style="text-align: right;" class="font-bold">${{ number_format($certificate->subtotal_neto, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <!-- 4. Work Detail Text Container -->
    <div class="details-container">
        <div class="details-title">Detalle Trabajo:</div>
        <div class="details-content">{{ $certificate->work_details }}</div>
    </div>

    <!-- 5. 3 Photographs Evidence Row -->
    <table class="photos-table">
        <tr>
            <!-- Photo 1 -->
            <td>
                @if($photo1Base64)
                    <img src="{{ $photo1Base64 }}" class="photo-img" alt="Evidencia 1">
                @elseif($holdingLogoBase64)
                    <img src="{{ $holdingLogoBase64 }}" style="max-height: 80px; width: auto;" alt="Holding">
                @endif
            </td>

            <!-- Photo 2: SEC QR -->
            <td>
                <div style="font-size: 9px; font-weight: bold; color: #0369a1; margin-bottom: 2px;">
                    Gasfiter Certificado Autorizado SEC<br>Domingo Isain
                </div>
                @if($secQrBase64)
                    <img src="{{ $secQrBase64 }}" class="qr-img" alt="QR SEC">
                @endif
            </td>

            <!-- Photo 3 -->
            <td>
                @if($photo3Base64)
                    <img src="{{ $photo3Base64 }}" class="photo-img" alt="Evidencia 3">
                @elseif($secLogoBase64)
                    <img src="{{ $secLogoBase64 }}" style="max-height: 80px; width: auto;" alt="SEC Logo">
                @endif
            </td>
        </tr>
    </table>

    <!-- 6. Total Net Bar -->
    <div class="total-bar text-center">
        Total Neto a Pagar ${{ number_format($certificate->total_price, 0, ',', '.') }}
    </div>

    <!-- 7. Footer Branding & Digital Signature -->
    <table class="footer-table">
        <tr>
            <!-- Company Info Left -->
            <td style="width: 40%;">
                <strong style="font-size: 10.5px; color: #0f172a;">Instalgaschile SPA</strong><br>
                76.776.528-2<br>
                Av. Lib. Bernardo O'Higgins 1302<br>
                Santiago, Santiago<br>
                Servicio de Técnico Autorizado SEC<br>
                949877316 domi@instalgaschile.cl
            </td>

            <!-- Sub Brand Badges Center -->
            <td style="width: 30%; text-align: center;">
                @if($holdingLogoBase64)
                    <img src="{{ $holdingLogoBase64 }}" style="height: 38px; width: auto;" alt="Logos Holding">
                @endif
            </td>

            <!-- Digital Signature Right -->
            <td style="width: 30%; text-align: center;">
                @if($firmaBase64)
                    <img src="{{ $firmaBase64 }}" style="height: 44px; width: auto; margin-bottom: 2px;" alt="Firma Domingo">
                @endif
                <div style="font-weight: bold; font-size: 10px; color: #0f172a;">Instalgaschile®</div>
                <div style="font-size: 8.5px; color: #475569;">
                    Domingo Isain Plaza Caamaño<br>
                    RUT: 12.738.961-6
                </div>
            </td>
        </tr>
    </table>

</body>
</html>
