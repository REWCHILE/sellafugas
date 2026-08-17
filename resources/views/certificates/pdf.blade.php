<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado_Servicio_{{ $certificate->certificate_number }}</title>
    <style>
        @page {
            margin: 12px 20px;
            size: A4 portrait;
        }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 9.5px;
            color: #1e293b;
            line-height: 1.25;
            margin: 0;
            padding: 0;
        }
        * {
            box-sizing: border-box;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        .uppercase { text-transform: uppercase; }

        /* Header Table */
        .header-table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            margin-bottom: 6px;
        }
        .header-table td {
            vertical-align: middle;
        }

        .title-box {
            font-size: 15px;
            font-weight: bold;
            text-align: center;
            text-decoration: underline;
            letter-spacing: 0.5px;
            color: #0f172a;
        }

        /* Section Titles */
        .section-header {
            font-size: 10px;
            font-weight: bold;
            color: #0f172a;
            margin-bottom: 3px;
            text-transform: uppercase;
        }

        /* Client Info Key-Value Table */
        .client-box {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
            background-color: #f8fafc;
            margin-bottom: 6px;
        }
        .client-box td {
            padding: 3px 6px;
            vertical-align: top;
            font-size: 9px;
        }
        .client-box td.lbl {
            font-weight: bold;
            color: #0f172a;
            width: 16%;
        }
        .client-box td.val {
            color: #334155;
            width: 34%;
            word-wrap: break-word;
        }

        /* Items Table */
        .items-table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            margin-bottom: 6px;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
            overflow: hidden;
        }
        .items-table th {
            background-color: #f1f5f9;
            border-bottom: 2px solid #0f172a;
            padding: 4px 6px;
            text-align: left;
            font-size: 10px;
            font-weight: bold;
            color: #0f172a;
        }
        .items-table td {
            padding: 4px 6px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 9px;
            word-wrap: break-word;
        }

        /* Details Box */
        .details-container {
            background-color: #f8fafc;
            border-radius: 5px;
            padding: 5px 8px;
            margin-bottom: 6px;
            border: 1px solid #cbd5e1;
        }
        .details-title {
            font-size: 10px;
            font-weight: bold;
            margin-bottom: 2px;
            color: #0f172a;
            text-transform: uppercase;
        }
        .details-content {
            font-size: 9px;
            line-height: 1.25;
            white-space: pre-line;
            color: #334155;
            word-wrap: break-word;
        }

        /* Photographs Evidence Grid */
        .photos-table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            margin-bottom: 6px;
        }
        .photos-table td {
            text-align: center;
            vertical-align: middle;
            padding: 2px;
        }
        .photo-card {
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            padding: 3px;
            background-color: #f8fafc;
        }
        .photo-img {
            max-width: 100%;
            height: 90px;
            object-fit: cover;
            border-radius: 4px;
        }
        .qr-img {
            max-width: 100%;
            height: 85px;
            object-fit: contain;
        }

        /* Total Bar */
        .total-bar {
            width: 100%;
            border-top: 2px solid #0f172a;
            border-bottom: 2px solid #0f172a;
            padding: 4px 0;
            margin-bottom: 6px;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            background-color: #f8fafc;
        }

        /* Footer Table */
        .footer-table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }
        .footer-table td {
            vertical-align: bottom;
            font-size: 8.5px;
            color: #334155;
        }
    </style>
</head>
<body>

    <!-- 1. Header Section -->
    <table class="header-table">
        <tr>
            <!-- Left Logo -->
            <td style="width: 44%; text-align: left; vertical-align: middle;">
                @if($logoBase64)
                    <img src="{{ $logoBase64 }}" style="height: 62px; max-width: 95%; width: auto;" alt="SellafuGas Logo">
                @else
                    <span style="font-size: 18px; font-weight: bold; color: #0284c7;">SellafuGas®</span>
                @endif
            </td>

            <!-- Center Title -->
            <td style="width: 32%; text-align: center; vertical-align: middle;">
                <div class="title-box">{{ $certificate->document_type === 'cotizacion' ? 'COTIZACIÓN DE SERVICIO' : 'CERTIFICADO DE SERVICIO' }}</div>
            </td>

            <!-- Right SEC Badge & Number -->
            <td style="width: 24%; text-align: right; vertical-align: middle;">
                <div style="font-size: 12.5px; font-weight: bold; color: #0f172a; margin-bottom: 2px;">
                    N°: {{ $certificate->certificate_number }}
                </div>
                <div style="font-size: 10px; font-weight: bold; color: #475569; margin-bottom: 3px;">
                    FECHA: {{ \Carbon\Carbon::parse($certificate->date)->format('d/m/Y') }}
                </div>
                @if($secLogoBase64)
                    <img src="{{ $secLogoBase64 }}" style="height: 72px; width: auto;" alt="SEC Badge">
                @endif
            </td>
        </tr>
    </table>

    <!-- 2. Client Data Key-Value Table -->
    <div class="section-header">DATOS CLIENTE:</div>
    <table class="client-box">
        <tr>
            <td class="lbl">Nombre:</td>
            <td class="val">{{ $certificate->client_name }}</td>
            <td class="lbl">Teléfono:</td>
            <td class="val">{{ $certificate->client_phone ?: '-' }}</td>
        </tr>
        <tr>
            <td class="lbl">Provincia:</td>
            <td class="val">{{ $certificate->client_provincia ?: 'Santiago' }}</td>
            <td class="lbl">Dirección:</td>
            <td class="val">{{ $certificate->client_address ?: '-' }}</td>
        </tr>
        <tr>
            <td class="lbl">Comuna:</td>
            <td class="val">{{ $certificate->client_comuna }}</td>
            <td class="lbl">Email:</td>
            <td class="val">{{ $certificate->client_email ?: '-' }}</td>
        </tr>
        <tr>
            <td class="lbl">Región:</td>
            <td class="val">{{ $certificate->client_region ?: 'Región Metropolitana' }}</td>
            <td class="lbl">Modalidad:</td>
            <td class="val" style="text-transform: uppercase;">{{ $certificate->tax_type === 'factura' ? 'Factura con IVA' : 'Neto Directo' }}</td>
        </tr>
    </table>

    <!-- 3. Items Table -->
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 60%;">DESCRIPCIÓN DEL SERVICIO REALIZADO</th>
                <th style="width: 12%; text-align: center;">CANT</th>
                <th style="width: 14%; text-align: right;">UNITARIO</th>
                <th style="width: 14%; text-align: right;">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($certificate->items) && is_array($certificate->items))
                @foreach($certificate->items as $item)
                    <tr>
                        <td>{{ $item['description'] ?? 'Servicio de sellado de gas' }}</td>
                        <td class="text-center">{{ $item['quantity'] ?? 1 }}</td>
                        <td class="text-right">${{ number_format($item['unit_price'] ?? 0, 0, ',', '.') }}</td>
                        <td class="text-right font-bold">${{ number_format(($item['quantity'] ?? 1) * ($item['unit_price'] ?? 0), 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>{{ $certificate->description ?: 'Sellado de fugas de gas con Prodoral R6-1' }}</td>
                    <td class="text-center">{{ $certificate->quantity ?: 1 }}</td>
                    <td class="text-right">${{ number_format($certificate->unit_price ?: $certificate->subtotal_neto, 0, ',', '.') }}</td>
                    <td class="text-right font-bold">${{ number_format($certificate->subtotal_neto ?: $certificate->total_price, 0, ',', '.') }}</td>
                </tr>
            @endif
        </tbody>
    </table>

    <!-- 4. Technical Details -->
    <div class="details-container">
        <div class="details-title">DETALLE TÉCNICO Y PROCEDIMIENTO REALIZADO:</div>
        <div class="details-content">{{ $certificate->work_details }}</div>
    </div>

    <!-- 5. Photographs Evidence Grid -->
    @if($photo1Base64 || $secQrBase64 || $photo3Base64)
        <table class="photos-table">
            <tr>
                <!-- Photo 1 -->
                <td style="width: 33.33%;">
                    <div class="photo-card">
                        @if($photo1Base64)
                            <img src="{{ $photo1Base64 }}" class="photo-img" alt="Evidencia 1">
                        @elseif($holdingLogoBase64)
                            <img src="{{ $holdingLogoBase64 }}" style="max-height: 75px; width: auto; padding: 4px;" alt="Holding">
                        @endif
                        <div style="font-size: 8px; font-weight: bold; color: #475569; margin-top: 3px;">Evidencia de Instalación / Fuga</div>
                    </div>
                </td>

                <!-- Photo 2: SEC QR -->
                <td style="width: 33.33%;">
                    <div class="photo-card">
                        <div style="font-size: 8.5px; font-weight: bold; color: #0369a1; margin-bottom: 2px;">
                            Gasfiter Certificado Autorizado SEC<br>Domingo Isain
                        </div>
                        @if($secQrBase64)
                            <img src="{{ $secQrBase64 }}" class="qr-img" alt="QR SEC">
                        @endif
                        <div style="font-size: 8px; font-weight: bold; color: #475569; margin-top: 3px;">Escanear para Verificación SEC</div>
                    </div>
                </td>

                <!-- Photo 3 -->
                <td style="width: 33.33%;">
                    <div class="photo-card">
                        @if($photo3Base64)
                            <img src="{{ $photo3Base64 }}" class="photo-img" alt="Evidencia 3">
                        @elseif($secLogoBase64)
                            <img src="{{ $secLogoBase64 }}" style="max-height: 75px; width: auto; padding: 4px;" alt="SEC Logo">
                        @endif
                        <div style="font-size: 8px; font-weight: bold; color: #475569; margin-top: 3px;">Prueba de Hermeticidad / Manómetro</div>
                    </div>
                </td>
            </tr>
        </table>
    @endif

    @if(!empty($extraPhotosBase64))
        <div class="section-header" style="margin-top: 6px;">FOTOGRAFÍAS ADICIONALES DE EVIDENCIA:</div>
        <table class="photos-table">
            <tr>
                @foreach($extraPhotosBase64 as $idx => $exB64)
                    <td style="width: 33.33%;">
                        <div class="photo-card">
                            <img src="{{ $exB64 }}" class="photo-img" alt="Evidencia Extra {{ $idx + 4 }}">
                            <div style="font-size: 8px; font-weight: bold; color: #475569; margin-top: 3px;">Foto Extra {{ $idx + 4 }}</div>
                        </div>
                    </td>
                    @if(($idx + 1) % 3 === 0 && !$loop->last)
                        </tr><tr>
                    @endif
                @endforeach
            </tr>
        </table>
    @endif

    <!-- 6. Total Bar -->
    <div class="total-bar">
        {{ $certificate->document_type === 'cotizacion' ? 'Total Cotizado Neto' : 'Total Neto' }} a Pagar: ${{ number_format($certificate->total_price, 0, ',', '.') }}
    </div>

    <!-- 7. Footer Branding, Registro QR & Digital Signature -->
    <table class="footer-table">
        <tr>
            <!-- Company Info Left -->
            <td style="width: 28%;">
                <strong style="font-size: 10px; color: #0f172a;">SellafuGas Domingo Isain®</strong><br>
                Instalgaschile SpA · RUT: 76.776.528-2<br>
                Dirección: Estado 215, Santiago<br>
                Av. Lib. Bernardo O'Higgins 1302, Santiago<br>
                Especialista en Fugas de Gas & Prodoral R6-1<br>
                Tel / WhatsApp: +56 9 4987 7316<br>
                domi@sellafugas.cl · sellafugas.cl
            </td>

            <!-- Sub Brand Badges Center-Left -->
            <td style="width: 31%; text-align: center;">
                @if($holdingLogoBase64)
                    <img src="{{ $holdingLogoBase64 }}" style="height: 105px; width: auto;" alt="Logos Holding">
                @endif
            </td>

            <!-- Registro SEC QR Code Center-Right -->
            <td style="width: 16%; text-align: center;">
                @if($registroQrBase64)
                    <img src="{{ $registroQrBase64 }}" style="height: 75px; width: auto;" alt="QR Registro">
                    <div style="font-size: 8px; font-weight: bold; color: #334155; margin-top: 2px;">Verificación SEC</div>
                @endif
            </td>

            <!-- Digital Signature Right -->
            <td style="width: 25%; text-align: center;">
                @if($firmaBase64)
                    <img src="{{ $firmaBase64 }}" style="height: 155px; width: auto; margin-bottom: 2px;" alt="Firma Domingo">
                @endif
                <div style="font-weight: bold; font-size: 9.5px; color: #0f172a;">SellafuGas® / SEC</div>
                <div style="font-size: 8px; color: #475569;">
                    {{ $certificate->gasfiter_name ?: 'Domingo Isain Plaza Caamaño' }}<br>
                    RUT: {{ $certificate->gasfiter_rut ?: '12.738.961-6' }}<br>
                    Gasfiter Certificado Autorizado SEC
                </div>
            </td>
        </tr>
    </table>

</body>
</html>
