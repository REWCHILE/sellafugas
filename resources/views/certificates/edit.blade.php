@extends('layouts.app')

@section('title', 'Editar Certificado N° ' . $certificate->certificate_number)

@section('content')
<div class="max-w-5xl mx-auto space-y-6" 
     x-data="{ 
         quantity: {{ $certificate->quantity }}, 
         unitPrice: {{ $certificate->unit_price }}, 
         taxType: '{{ $certificate->tax_type }}',
         get subtotal() { return this.quantity * (this.unitPrice || 0); },
         get taxAmount() { return this.taxType === 'factura' ? Math.round(this.subtotal * 0.19) : 0; },
         get total() { return this.subtotal + this.taxAmount; },
         formatMoney(val) { return '$' + new Intl.NumberFormat('es-CL').format(val || 0); }
     }">

    <!-- Page Title Header -->
    <div class="flex items-center justify-between border-b border-slate-800 pb-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight flex items-center gap-2.5">
                <i data-lucide="edit-3" class="w-7 h-7 text-amber-400"></i>
                <span>Editar Certificado N° {{ $certificate->certificate_number }}</span>
            </h1>
            <p class="text-xs text-slate-400 mt-1">Actualice los datos o imágenes del certificado de servicio</p>
        </div>
        <a href="{{ route('certificates.show', $certificate->id) }}" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-slate-300 text-sm font-medium rounded-xl border border-slate-800 transition-colors flex items-center gap-2">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            <span>Volver al Certificado</span>
        </a>
    </div>

    <!-- Main Form -->
    <form action="{{ route('certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- 1. Folio & Fecha Block -->
        <div class="glass-panel p-6 rounded-2xl border border-slate-800 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="certificate_number" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                    N° Folio Certificado <span class="text-rose-400">*</span>
                </label>
                <input type="text" id="certificate_number" name="certificate_number" value="{{ old('certificate_number', $certificate->certificate_number) }}" required
                       class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-sky-400 font-bold text-lg focus:outline-none focus:border-sky-500">
            </div>

            <div>
                <label for="date" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                    Fecha de Emisión <span class="text-rose-400">*</span>
                </label>
                <input type="date" id="date" name="date" value="{{ old('date', \Carbon\Carbon::parse($certificate->date)->format('Y-m-d')) }}" required
                       class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white font-medium focus:outline-none focus:border-sky-500">
            </div>

            <div>
                <label for="status" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                    Estado del Documento <span class="text-rose-400">*</span>
                </label>
                <select id="status" name="status" class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white font-medium focus:outline-none focus:border-sky-500">
                    <option value="emitido" {{ $certificate->status === 'emitido' ? 'selected' : '' }}>Emitido / Vigente</option>
                    <option value="completado" {{ $certificate->status === 'completado' ? 'selected' : '' }}>Completado</option>
                    <option value="pendiente" {{ $certificate->status === 'pendiente' ? 'selected' : '' }}>Pendiente de Trabajo</option>
                    <option value="anulado" {{ $certificate->status === 'anulado' ? 'selected' : '' }}>Anulado</option>
                </select>
            </div>
        </div>

        <!-- 2. Datos del Cliente -->
        <div class="glass-panel p-6 rounded-2xl border border-slate-800 space-y-4">
            <h2 class="text-lg font-semibold text-white flex items-center gap-2 border-b border-slate-800 pb-3">
                <i data-lucide="user" class="w-5 h-5 text-sky-400"></i>
                <span>Datos del Cliente</span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="client_name" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                        Nombre / Razón Social <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="client_name" name="client_name" value="{{ old('client_name', $certificate->client_name) }}" required
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                </div>

                <div>
                    <label for="client_phone" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Teléfono de Contacto</label>
                    <input type="text" id="client_phone" name="client_phone" value="{{ old('client_phone', $certificate->client_phone) }}"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                </div>

                <div class="md:col-span-2">
                    <label for="client_address" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Dirección Completa</label>
                    <input type="text" id="client_address" name="client_address" value="{{ old('client_address', $certificate->client_address) }}"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                </div>

                <div>
                    <label for="client_comuna" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Comuna</label>
                    <input type="text" id="client_comuna" name="client_comuna" value="{{ old('client_comuna', $certificate->client_comuna) }}"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                </div>

                <div>
                    <label for="client_provincia" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Provincia / Región</label>
                    <input type="text" id="client_provincia" name="client_provincia" value="{{ old('client_provincia', $certificate->client_provincia) }}"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                </div>
            </div>
        </div>

        <!-- 3. Servicio & Precios -->
        <div class="glass-panel p-6 rounded-2xl border border-slate-800 space-y-6">
            <h2 class="text-lg font-semibold text-white flex items-center gap-2 border-b border-slate-800 pb-3">
                <i data-lucide="calculator" class="w-5 h-5 text-emerald-400"></i>
                <span>Descripción del Servicio y Tributación</span>
            </h2>

            <div>
                <label for="description" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                    Descripción Principal del Servicio <span class="text-rose-400">*</span>
                </label>
                <input type="text" id="description" name="description" value="{{ old('description', $certificate->description) }}" required
                       class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white font-medium text-sm focus:outline-none focus:border-sky-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-slate-900/60 p-5 rounded-xl border border-slate-800">
                <div>
                    <label for="quantity" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Cantidad</label>
                    <input type="number" id="quantity" name="quantity" min="1" x-model.number="quantity" required
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                </div>

                <div>
                    <label for="unit_price" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Precio Unitario NETO ($)</label>
                    <input type="number" id="unit_price" name="unit_price" min="0" x-model.number="unitPrice" required
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-emerald-400 font-bold text-sm focus:outline-none focus:border-sky-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Modalidad Documento Tributario</label>
                    <div class="grid grid-cols-2 gap-2">
                        <label :class="taxType === 'neto' ? 'bg-amber-500/20 border-amber-500/50 text-amber-300 font-bold' : 'bg-slate-900 border-slate-800 text-slate-400'"
                               class="flex flex-col items-center justify-center p-2.5 rounded-xl border cursor-pointer text-xs text-center transition-all">
                            <input type="radio" name="tax_type" value="neto" x-model="taxType" class="sr-only">
                            <span>Sin Doc Tributario</span>
                            <span class="text-[10px] opacity-75 mt-0.5">Neto Directo</span>
                        </label>

                        <label :class="taxType === 'factura' ? 'bg-purple-500/20 border-purple-500/50 text-purple-300 font-bold' : 'bg-slate-900 border-slate-800 text-slate-400'"
                               class="flex flex-col items-center justify-center p-2.5 rounded-xl border cursor-pointer text-xs text-center transition-all">
                            <input type="radio" name="tax_type" value="factura" x-model="taxType" class="sr-only">
                            <span>Factura</span>
                            <span class="text-[10px] opacity-75 mt-0.5">+19% IVA</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Dynamic Live Calculation Summary Card -->
            <div class="p-5 rounded-xl bg-gradient-to-r from-slate-900 via-slate-900/90 to-sky-950/40 border border-sky-500/20 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="space-y-1">
                    <p class="text-xs text-slate-400 uppercase tracking-wider">Desglose de Pago:</p>
                    <div class="flex items-center gap-4 text-sm">
                        <span class="text-slate-300">Subtotal Neto: <strong class="text-white" x-text="formatMoney(subtotal)"></strong></span>
                        <template x-if="taxType === 'factura'">
                            <span class="text-purple-300">IVA (19%): <strong x-text="formatMoney(taxAmount)"></strong></span>
                        </template>
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-xs text-sky-400 font-semibold uppercase tracking-wider block">Total a Pagar</span>
                    <span class="text-3xl font-black text-emerald-400 tracking-tight" x-text="formatMoney(total)"></span>
                </div>
            </div>
        </div>

        <!-- 4. Detalle Técnico del Trabajo SEC -->
        <div class="glass-panel p-6 rounded-2xl border border-slate-800 space-y-4">
            <h2 class="text-lg font-semibold text-white flex items-center gap-2 border-b border-slate-800 pb-3">
                <i data-lucide="wrench" class="w-5 h-5 text-amber-400"></i>
                <span>Detalle Técnico del Trabajo SEC</span>
            </h2>

            <div>
                <label for="work_details" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                    Detalle del Trabajo, Normativas SEC, Garantía y Mediciones
                </label>
                <textarea id="work_details" name="work_details" rows="6" required
                          class="w-full p-4 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm font-mono focus:outline-none focus:border-sky-500 leading-relaxed">{{ old('work_details', $certificate->work_details) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2">
                <div>
                    <label for="gasfiter_name" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Responsable Técnico</label>
                    <input type="text" id="gasfiter_name" name="gasfiter_name" value="{{ old('gasfiter_name', $certificate->gasfiter_name) }}" required
                           class="w-full px-3 py-2 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none">
                </div>
                <div>
                    <label for="gasfiter_rut" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">RUT Gasfiter SEC</label>
                    <input type="text" id="gasfiter_rut" name="gasfiter_rut" value="{{ old('gasfiter_rut', $certificate->gasfiter_rut) }}" required
                           class="w-full px-3 py-2 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none">
                </div>
                <div>
                    <label for="gasfiter_sec_class" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Acreditación SEC</label>
                    <input type="text" id="gasfiter_sec_class" name="gasfiter_sec_class" value="{{ old('gasfiter_sec_class', $certificate->gasfiter_sec_class) }}" required
                           class="w-full px-3 py-2 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none">
                </div>
            </div>
        </div>

        <!-- 5. Evidencia Fotográfica -->
        <div class="glass-panel p-6 rounded-2xl border border-slate-800 space-y-4">
            <h2 class="text-lg font-semibold text-white flex items-center gap-2 border-b border-slate-800 pb-3">
                <i data-lucide="camera" class="w-5 h-5 text-purple-400"></i>
                <span>Evidencia Fotográfica (Actualizar Fotografías)</span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Photo 1 -->
                <div class="bg-slate-900/80 p-4 rounded-xl border border-slate-800 space-y-3">
                    <label class="block text-xs font-semibold text-sky-400 uppercase tracking-wider">Imagen 1: Trabajo / Fuga</label>
                    @if($certificate->photo_1)
                        <img src="{{ asset('storage/' . $certificate->photo_1) }}" alt="Foto 1" class="w-full h-32 object-cover rounded-lg border border-slate-700">
                    @endif
                    <input type="file" name="photo_1" accept="image/*" class="text-xs text-slate-400 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-sky-500/20 file:text-sky-300">
                </div>

                <!-- Photo 2 -->
                <div class="bg-slate-900/80 p-4 rounded-xl border border-slate-800 space-y-3">
                    <label class="block text-xs font-semibold text-emerald-400 uppercase tracking-wider">Imagen 2: Credencial / QR SEC</label>
                    @if($certificate->photo_2)
                        <img src="{{ asset('storage/' . $certificate->photo_2) }}" alt="Foto 2" class="w-full h-32 object-cover rounded-lg border border-slate-700">
                    @else
                        <img src="{{ asset('images/domingo-isain-gasfiter-sec-qr.png') }}" alt="QR SEC" class="w-full h-32 object-contain bg-white p-1 rounded-lg border border-slate-700">
                    @endif
                    <input type="file" name="photo_2" accept="image/*" class="text-xs text-slate-400 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-500/20 file:text-emerald-300">
                </div>

                <!-- Photo 3 -->
                <div class="bg-slate-900/80 p-4 rounded-xl border border-slate-800 space-y-3">
                    <label class="block text-xs font-semibold text-amber-400 uppercase tracking-wider">Imagen 3: Medición / Manómetro</label>
                    @if($certificate->photo_3)
                        <img src="{{ asset('storage/' . $certificate->photo_3) }}" alt="Foto 3" class="w-full h-32 object-cover rounded-lg border border-slate-700">
                    @endif
                    <input type="file" name="photo_3" accept="image/*" class="text-xs text-slate-400 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500/20 file:text-amber-300">
                </div>
            </div>
        </div>

        <!-- Submit Button Bar -->
        <div class="flex items-center justify-end gap-4 pt-4 border-t border-slate-800">
            <a href="{{ route('certificates.show', $certificate->id) }}" class="px-6 py-3 bg-slate-900 hover:bg-slate-800 text-slate-300 font-semibold text-sm rounded-xl border border-slate-800 transition-colors">
                Cancelar
            </a>
            <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-400 hover:to-orange-500 text-white font-bold text-sm rounded-xl shadow-lg shadow-amber-500/25 transition-all flex items-center gap-2">
                <i data-lucide="save" class="w-5 h-5"></i>
                <span>Guardar Cambios</span>
            </button>
        </div>

    </form>

</div>
@endsection
