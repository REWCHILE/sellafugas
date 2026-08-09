@extends('layouts.app')

@section('title', 'Certificado N° ' . $certificate->certificate_number)

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-900/80 p-5 rounded-2xl border border-slate-800 shadow-xl">
        <div>
            <span class="text-xs text-sky-400 font-bold uppercase tracking-wider block">Certificado Oficial SEC</span>
            <h1 class="text-2xl font-black text-white">Certificado de Servicio N° {{ $certificate->certificate_number }}</h1>
            <p class="text-xs text-slate-400 mt-0.5">Emitido el {{ \Carbon\Carbon::parse($certificate->date)->format('d/m/Y') }} por {{ $certificate->gasfiter_name }}</p>
        </div>

        <div class="flex items-center gap-2 flex-wrap">
            
            <!-- Download PDF Button -->
            <a href="{{ route('certificates.pdf', $certificate->id) }}" target="_blank" 
               class="px-5 py-2.5 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-400 hover:to-blue-500 text-white font-bold text-sm rounded-xl shadow-lg shadow-sky-500/25 transition-all flex items-center gap-2">
                <i data-lucide="file-down" class="w-4 h-4"></i>
                <span>Descargar / Imprimir PDF</span>
            </a>

            <!-- WhatsApp Share Button -->
            @php
                $waText = rawurlencode("Hola {$certificate->client_name}, le compartimos el Certificado de Servicio N° {$certificate->certificate_number} de Instalgaschile Spa por un total de {$certificate->formatted_total}.");
                $waPhone = preg_replace('/[^0-9]/', '', $certificate->client_phone);
            @endphp
            <a href="https://wa.me/{{ $waPhone }}?text={{ $waText }}" target="_blank"
               class="px-4 py-2.5 bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-400 border border-emerald-500/30 font-semibold text-sm rounded-xl transition-colors flex items-center gap-2">
                <i data-lucide="send" class="w-4 h-4"></i>
                <span>Enviar WhatsApp</span>
            </a>

            <!-- Edit Button -->
            <a href="{{ route('certificates.edit', $certificate->id) }}" 
               class="px-4 py-2.5 bg-slate-800 hover:bg-slate-700 text-amber-400 font-semibold text-sm rounded-xl border border-slate-700 transition-colors flex items-center gap-2">
                <i data-lucide="edit" class="w-4 h-4"></i>
                <span>Editar</span>
            </a>

            <!-- Back Button -->
            <a href="{{ route('certificates.index') }}" 
               class="px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-slate-400 hover:text-white text-sm font-medium rounded-xl border border-slate-800 transition-colors flex items-center gap-1.5">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                <span>Volver</span>
            </a>

        </div>
    </div>

    <!-- On-screen Official Certificate Preview (A4 Paper Style) -->
    <div class="bg-white text-slate-900 rounded-2xl p-8 md:p-12 shadow-2xl border border-slate-200 font-sans max-w-4xl mx-auto space-y-8">
        
        <!-- 1. Header: Logo, Title & SEC Badge -->
        <div class="flex items-center justify-between border-b-2 border-slate-900 pb-6">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/instalgaschile-logitpo.png') }}" alt="Instalgaschile Logo" class="h-12 w-auto">
            </div>

            <div class="text-center">
                <h2 class="text-2xl font-black uppercase tracking-wider text-slate-900 underline underline-offset-4">
                    CERTIFICADO DE SERVICIO
                </h2>
            </div>

            <div class="text-right space-y-1">
                <p class="text-sm font-bold">N°: <span class="text-sky-600 text-lg">{{ $certificate->certificate_number }}</span></p>
                <p class="text-xs font-semibold text-slate-600">FECHA: {{ \Carbon\Carbon::parse($certificate->date)->format('d/m/Y') }}</p>
                <img src="{{ asset('images/logotipo-sec.png') }}" alt="Certificados SEC" class="h-10 w-auto ml-auto mt-1">
            </div>
        </div>

        <!-- 2. Client Data Box -->
        <div class="grid grid-cols-2 gap-6 bg-slate-50 p-5 rounded-xl border border-slate-200 text-sm">
            <div>
                <p class="font-bold text-slate-900 mb-2 uppercase tracking-wide text-xs">Datos Cliente:</p>
                <p><strong class="w-24 inline-block">Nombre:</strong> {{ $certificate->client_name }}</p>
                <p><strong class="w-24 inline-block">Provincia:</strong> {{ $certificate->client_provincia ?: 'Santiago' }}</p>
                <p><strong class="w-24 inline-block">Comuna:</strong> {{ $certificate->client_comuna ?: 'La Florida' }}</p>
            </div>
            <div>
                <p class="font-bold text-slate-900 mb-2 uppercase tracking-wide text-xs opacity-0">Contacto:</p>
                <p><strong class="w-24 inline-block">Teléfono:</strong> {{ $certificate->client_phone ?: 'X' }}</p>
                <p><strong class="w-24 inline-block">Dirección:</strong> {{ $certificate->client_address }}</p>
            </div>
        </div>

        <!-- 3. Items Table -->
        <div class="overflow-hidden border border-slate-300 rounded-lg">
            <table class="w-full text-left text-sm border-collapse">
                <thead>
                    <tr class="bg-slate-100 text-slate-900 font-bold border-b border-slate-300">
                        <th class="py-3 px-4">Descripción</th>
                        <th class="py-3 px-4 text-center">Precio Unit.</th>
                        <th class="py-3 px-4 text-center">Cantidad</th>
                        <th class="py-3 px-4 text-right">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <tr>
                        <td class="py-3 px-4 font-semibold text-slate-800">{{ $certificate->description }}</td>
                        <td class="py-3 px-4 text-center">${{ number_format($certificate->unit_price, 0, ',', '.') }}</td>
                        <td class="py-3 px-4 text-center">{{ $certificate->quantity }}</td>
                        <td class="py-3 px-4 text-right font-bold">${{ number_format($certificate->subtotal_neto, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- 4. Technical Detail Box -->
        <div class="bg-slate-50 p-6 rounded-xl border border-slate-200 text-sm space-y-3">
            <h3 class="font-bold text-slate-900 uppercase tracking-wide text-xs border-b border-slate-200 pb-2">
                Detalle Trabajo:
            </h3>
            <div class="text-slate-800 whitespace-pre-line leading-relaxed font-sans">
                {{ $certificate->work_details }}
            </div>
        </div>

        <!-- 5. 3 Images & Evidence Section -->
        <div class="grid grid-cols-3 gap-4 text-center">
            
            <!-- Photo 1 -->
            <div class="border border-slate-200 rounded-xl p-2 bg-slate-50">
                @if($certificate->photo_1)
                    <img src="{{ asset('storage/' . $certificate->photo_1) }}" alt="Evidencia 1" class="h-44 w-full object-cover rounded-lg">
                @else
                    <img src="{{ asset('images/logotipo-holding.png') }}" alt="Evidencia 1" class="h-44 w-full object-contain p-4 rounded-lg bg-white">
                @endif
                <span class="text-[11px] font-semibold text-slate-600 block mt-2">Evidencia de Instalación / Fuga</span>
            </div>

            <!-- Photo 2: SEC QR -->
            <div class="border border-slate-200 rounded-xl p-2 bg-slate-50 flex flex-col items-center justify-between">
                <div class="text-[11px] font-bold text-sky-800 uppercase tracking-tight">
                    Gasfiter Certificado Autorizado SEC<br>Domingo Isain
                </div>
                @if($certificate->photo_2)
                    <img src="{{ asset('storage/' . $certificate->photo_2) }}" alt="QR SEC" class="h-32 w-auto object-contain my-1">
                @else
                    <img src="{{ asset('images/domingo-isain-gasfiter-sec-qr.png') }}" alt="QR SEC" class="h-32 w-auto object-contain my-1">
                @endif
                <span class="text-[10px] font-semibold text-slate-500">Escanear para Verificación SEC</span>
            </div>

            <!-- Photo 3 -->
            <div class="border border-slate-200 rounded-xl p-2 bg-slate-50">
                @if($certificate->photo_3)
                    <img src="{{ asset('storage/' . $certificate->photo_3) }}" alt="Evidencia 3" class="h-44 w-full object-cover rounded-lg">
                @else
                    <img src="{{ asset('images/logotipo-sec.png') }}" alt="Evidencia 3" class="h-44 w-full object-contain p-4 rounded-lg bg-white">
                @endif
                <span class="text-[11px] font-semibold text-slate-600 block mt-2">Prueba de Hermeticidad / Manómetro</span>
            </div>

        </div>

        <!-- 6. Total Amount Bar -->
        <div class="border-t-2 border-b-2 border-slate-900 py-3 flex items-center justify-between">
            <span class="text-base font-bold text-slate-900 uppercase">Total Neto a Pagar</span>
            <span class="text-2xl font-black text-slate-900">${{ number_format($certificate->total_price, 0, ',', '.') }}</span>
        </div>

        <!-- 7. Footer Branding, QR Verification and Domingo's Digital Signature -->
        <div class="pt-4 grid grid-cols-12 gap-4 items-end text-xs text-slate-700">
            
            <!-- Company Info Left -->
            <div class="col-span-4 space-y-1">
                <p class="font-bold text-slate-900 text-sm">Instalgaschile SPA</p>
                <p>76.776.528-2</p>
                <p>Av. Lib. Bernardo O'Higgins 1302</p>
                <p>Santiago, Santiago</p>
                <p>Servicio de Técnico Autorizado SEC</p>
                <p>949877316 | domi@instalgaschile.cl</p>
            </div>

            <!-- Sub-brand Logos Center -->
            <div class="col-span-4 flex items-center justify-center gap-2">
                <img src="{{ asset('images/logotipo-holding.png') }}" alt="Holding" class="h-10 w-auto">
            </div>

            <!-- Digital Signature Right -->
            <div class="col-span-4 text-center space-y-1 border-t border-slate-300 pt-2">
                <img src="{{ asset('images/firma-domingo.png') }}" alt="Firma Domingo Isain" class="h-12 w-auto mx-auto mb-1">
                <p class="font-bold text-slate-900 text-xs">Instalgaschile®</p>
                <p class="text-[10px] text-slate-600 font-medium">Domingo Isain Plaza Caamaño<br>RUT: 12.738.961-6</p>
            </div>

        </div>

    </div>

</div>
@endsection
