@extends('layouts.app')

@section('title', 'Editar Certificado N° ' . $certificate->certificate_number)

@section('content')
<div class="max-w-5xl mx-auto space-y-6" 
     x-data="{ 
         documentType: '{{ old('document_type', $certificate->document_type ?: 'certificado') }}',
         items: {{ json_encode($certificate->items_list) }},
         taxType: '{{ $certificate->tax_type }}',
         addItem() {
             this.items.push({ description: '', quantity: 1, unit_price: 0 });
             this.$nextTick(() => { if (window.lucide) lucide.createIcons(); });
         },
         removeItem(index) {
             if (this.items.length > 1) {
                 this.items.splice(index, 1);
             }
         },
         get subtotal() { 
             return this.items.reduce((sum, item) => sum + ((item.quantity || 0) * (item.unit_price || 0)), 0); 
         },
         get total() { return this.subtotal; },
         formatMoney(val) { return '$' + new Intl.NumberFormat('es-CL').format(val || 0); },
         activeTemplate: null,
         metrosLineales: 30,
         presionMmca: 368,
         updateSelladoText() {
             this.activeTemplate = 'sellado';
             const area = document.getElementById('work_details');
             if (!area) return;
             const m = this.metrosLineales || 30;
             const p = this.presionMmca || 368;
             
             area.value = `Se realizó sellado de fuga de gas en red de ${m} metros lineales aproximadamente\n\n` +
                 `Se asegura hermeticidad de acuerdo al Decreto Supremo 66 Artículo 44.2.3 SEC no importa si es una o más fugas. Se utilizará prodoral r6-1 sellante alemán para Fugas de Gas aceptado por SEC ds66 artículo 7: DIN EN 13090 Y NAG-203.\n\n` +
                 `En procedimiento necesitamos desconectar artefactos y medidor para realizar la inyección, necesitamos provisión de electricidad y acceso libre a su domicilio y medidor mientras dure el procedimiento.\n\n` +
                 `Prueba de hermeticidad final a ${p}mmca estanco por 5 minutos, sin fugas.\n\n` +
                 `Tiempo de ejecución 2 horas aproximadamente, se entrega certificado de servicio realizado, garantía 3 años por efectos de sellado.\n` +
                 `Se solicita pago contado una vez realizado el trabajo.\n\n` +
                 `Responsable Domingo Isain Plaza Caamaño Rut 12738961-6\n` +
                 `Gasfiter Certificado Autorizado SEC Clase 3`;
         },
         applyTemplate(type) {
             const area = document.getElementById('work_details');
             if (this.activeTemplate === type) {
                 this.activeTemplate = null;
                 if (area) area.value = '';
             } else {
                 this.activeTemplate = type;
                 if (type === 'sellado') {
                     this.updateSelladoText();
                 } else if (type === 'hermeticidad') {
                     if (area) area.value = `Prueba de hermeticidad en instalación de gas según normativa SEC DS66.\n\nSe realiza presurización a 368 mmca manteniéndose estable por 15 minutos sin caídas de presión.\n\nInstalación apta y conforme a normas de seguridad vigentes.`;
                 } else if (type === 'calefon') {
                     if (area) area.value = `Servicio técnico y mantenimiento preventivo/correctivo de artefacto a gas (Calefón/Caldera).\n\nVerificación de ducto de evacuación de gases de combustión, limpieza de inyectores, prueba de encendido y sellado de conexiones. Proceso verificado bajo norma SEC.`;
                 }
             }
         }
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

        <!-- 1. Tipo de Documento, Folio & Fecha Block -->
        <div class="glass-panel p-6 rounded-2xl border border-slate-800 space-y-4">
            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                    Tipo de Documento <span class="text-rose-400">*</span>
                </label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <label class="cursor-pointer">
                        <input type="radio" name="document_type" value="certificado" x-model="documentType" class="sr-only">
                        <div :class="documentType === 'certificado' ? 'bg-emerald-950/80 border-emerald-500 text-emerald-300 font-bold shadow-lg shadow-emerald-950/50' : 'bg-slate-900 border-slate-800 text-slate-400 hover:border-slate-700'"
                             class="p-3.5 rounded-xl border flex items-center justify-between transition-all">
                            <div class="flex items-center gap-2.5">
                                <span class="text-lg">📜</span>
                                <div>
                                    <div class="text-xs font-bold uppercase tracking-wider">Certificado de Servicio SEC</div>
                                    <div class="text-[10px] text-slate-400 font-normal">Documento oficial con respaldo normativo SEC</div>
                                </div>
                            </div>
                            <div x-show="documentType === 'certificado'" class="w-2.5 h-2.5 rounded-full bg-emerald-400"></div>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="document_type" value="cotizacion" x-model="documentType" class="sr-only">
                        <div :class="documentType === 'cotizacion' ? 'bg-sky-950/80 border-sky-500 text-sky-300 font-bold shadow-lg shadow-sky-950/50' : 'bg-slate-900 border-slate-800 text-slate-400 hover:border-slate-700'"
                             class="p-3.5 rounded-xl border flex items-center justify-between transition-all">
                            <div class="flex items-center gap-2.5">
                                <span class="text-lg">📄</span>
                                <div>
                                    <div class="text-xs font-bold uppercase tracking-wider">Cotización de Servicio</div>
                                    <div class="text-[10px] text-slate-400 font-normal">Propuesta comercial previa a realizar el trabajo</div>
                                </div>
                            </div>
                            <div x-show="documentType === 'cotizacion'" class="w-2.5 h-2.5 rounded-full bg-sky-400"></div>
                        </div>
                    </label>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-3 border-t border-slate-800/80">
                <div>
                    <label for="certificate_number" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                        N° Folio <span class="text-rose-400">*</span>
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

        <!-- 3. Servicio & Cálculo de Precios con Ítems Dinámicos -->
        <div class="glass-panel p-6 rounded-2xl border border-slate-800 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                <h2 class="text-lg font-semibold text-white flex items-center gap-2">
                    <i data-lucide="calculator" class="w-5 h-5 text-emerald-400"></i>
                    <span>Descripción de Servicios e Ítems</span>
                </h2>
                
                <button type="button" @click="addItem()" class="px-3.5 py-2 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white text-xs font-bold rounded-xl shadow-lg shadow-emerald-500/20 transition-all flex items-center gap-1.5 cursor-pointer">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i>
                    <span>+ Añadir Servicio</span>
                </button>
            </div>

            <!-- Items Dynamic Responsive Table / Cards -->
            <div class="rounded-xl border border-slate-800 bg-slate-900/60 p-3 sm:p-0">
                <table class="w-full text-left text-sm text-slate-200 border-collapse">
                    <thead class="hidden sm:table-header-group bg-slate-900/90 text-xs uppercase tracking-wider text-slate-400 border-b border-slate-800">
                        <tr>
                            <th class="px-4 py-3 min-w-[260px]">Descripción del Servicio</th>
                            <th class="px-4 py-3 w-48 min-w-[170px]">Precio Unit. NETO ($)</th>
                            <th class="px-4 py-3 w-28 min-w-[100px]">Cantidad</th>
                            <th class="px-4 py-3 w-36 min-w-[120px] text-right">Total</th>
                            <th class="px-3 py-3 w-12 text-center"></th>
                        </tr>
                    </thead>
                    <tbody class="block sm:table-row-group divide-y-0 sm:divide-y divide-slate-800 space-y-4 sm:space-y-0">
                        <template x-for="(item, index) in items" :key="index">
                            <tr class="block sm:table-row bg-slate-900/90 sm:bg-transparent border border-slate-800/80 sm:border-0 p-4 sm:p-0 rounded-2xl sm:rounded-none hover:bg-slate-800/40 transition-all space-y-3 sm:space-y-0 shadow-lg sm:shadow-none">
                                
                                <!-- Mobile Header Row (Item # and Trash button) -->
                                <td class="block sm:hidden p-0 pb-2 border-b border-slate-800/60">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-bold text-sky-400 uppercase tracking-wider flex items-center gap-1.5">
                                            <i data-lucide="wrench" class="w-3.5 h-3.5"></i>
                                            <span x-text="'Ítem Servicio #' + (index + 1)"></span>
                                        </span>
                                        <button type="button" @click="removeItem(index)" x-show="items.length > 1"
                                                class="px-2.5 py-1 bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 text-xs font-bold rounded-lg border border-rose-500/20 transition-all flex items-center gap-1.5 cursor-pointer">
                                            <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                            <span>Eliminar</span>
                                        </button>
                                    </div>
                                </td>

                                <!-- Descripción del Servicio -->
                                <td class="block sm:table-cell p-0 sm:p-3">
                                    <label class="block sm:hidden text-[11px] font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                                        Descripción del Servicio
                                    </label>
                                    <input type="text" :name="'items[' + index + '][description]'" x-model="item.description" required
                                           placeholder="Ej: Sellado de fugas / Mantención calefón / Reparación de red"
                                           class="w-full px-3.5 py-2.5 sm:py-2 bg-slate-950 sm:bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                                </td>

                                <!-- Container for Price & Quantity on Mobile -->
                                <div class="grid grid-cols-2 gap-3 sm:contents">
                                    <!-- Precio Unitario NETO -->
                                    <td class="block sm:table-cell p-0 sm:p-3">
                                        <label class="block sm:hidden text-[11px] font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                                            Precio Unit. NETO ($)
                                        </label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-emerald-400 font-bold text-sm select-none">$</span>
                                            <input type="number" :name="'items[' + index + '][unit_price]'" min="0" x-model.number="item.unit_price" required
                                                   class="w-full pl-7 pr-3 py-2.5 sm:py-2 bg-slate-950 sm:bg-slate-900 border border-slate-800 rounded-xl text-emerald-400 font-bold text-sm sm:text-base focus:outline-none focus:border-sky-500">
                                        </div>
                                    </td>

                                    <!-- Cantidad -->
                                    <td class="block sm:table-cell p-0 sm:p-3">
                                        <label class="block sm:hidden text-[11px] font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                                            Cantidad
                                        </label>
                                        <input type="number" :name="'items[' + index + '][quantity]'" min="1" x-model.number="item.quantity" required
                                               class="w-full px-3.5 py-2.5 sm:py-2 bg-slate-950 sm:bg-slate-900 border border-slate-800 rounded-xl text-white font-semibold text-sm sm:text-base focus:outline-none focus:border-sky-500">
                                    </td>
                                </div>

                                <!-- Subtotal / Total -->
                                <td class="block sm:table-cell p-0 sm:p-3 text-left sm:text-right pt-2 sm:pt-3 border-t sm:border-t-0 border-slate-800/60">
                                    <div class="flex sm:block items-center justify-between">
                                        <span class="sm:hidden text-xs font-semibold text-slate-400 uppercase tracking-wider">Subtotal Ítem:</span>
                                        <span class="font-black text-emerald-400 text-base sm:text-lg tracking-tight" x-text="formatMoney((item.quantity || 0) * (item.unit_price || 0))"></span>
                                    </div>
                                </td>

                                <!-- Desktop Delete Button -->
                                <td class="hidden sm:table-cell p-3 text-center">
                                    <button type="button" @click="removeItem(index)" x-show="items.length > 1"
                                            class="p-2 text-slate-500 hover:text-rose-400 hover:bg-rose-500/10 rounded-xl transition-colors cursor-pointer" title="Eliminar este servicio">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <!-- Hidden tax_type input defaulting to neto -->
            <input type="hidden" name="tax_type" value="neto">

            <!-- Dynamic Live Calculation Summary Card -->
            <div class="p-5 rounded-xl bg-gradient-to-r from-slate-900 via-slate-900/90 to-sky-950/40 border border-sky-500/20 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="space-y-1">
                    <p class="text-xs text-slate-400 uppercase tracking-wider">Desglose de Pago:</p>
                    <span class="text-sm text-slate-300 font-medium">Valores expresados exclusivamente en <strong>Neto Directo</strong></span>
                </div>
                <div class="text-right">
                    <span class="text-xs text-sky-400 font-semibold uppercase tracking-wider block">Total Neto a Pagar</span>
                    <span class="text-3xl font-black text-emerald-400 tracking-tight" x-text="formatMoney(total)"></span>
                </div>
            </div>
        </div>

        <!-- 4. Detalle Técnico del Trabajo SEC -->
        <div class="glass-panel p-6 rounded-2xl border border-slate-800 space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-slate-800 pb-3">
                <h2 class="text-lg font-semibold text-white flex items-center gap-2">
                    <i data-lucide="wrench" class="w-5 h-5 text-amber-400"></i>
                    <span>Detalle Técnico del Trabajo SEC</span>
                </h2>

                <!-- Quick Preset Buttons -->
                <div class="flex items-center gap-2 flex-wrap">
                    <span class="text-xs text-slate-400 font-medium">Plantillas rápidas:</span>
                    <button type="button" @click="applyTemplate('sellado')" 
                            :class="activeTemplate === 'sellado' ? 'bg-sky-500 text-white font-bold ring-2 ring-sky-400/40 shadow-lg shadow-sky-500/20' : 'bg-slate-800 text-sky-300 hover:bg-slate-700'"
                            class="px-3 py-1.5 text-xs rounded-xl border border-sky-500/30 transition-all cursor-pointer flex items-center gap-1.5">
                        <span>🛡️ Sellado Fuga DS66</span>
                    </button>
                    <button type="button" @click="applyTemplate('hermeticidad')" 
                            :class="activeTemplate === 'hermeticidad' ? 'bg-emerald-500 text-white font-bold ring-2 ring-emerald-400/40 shadow-lg shadow-emerald-500/20' : 'bg-slate-800 text-emerald-300 hover:bg-slate-700'"
                            class="px-3 py-1.5 text-xs rounded-xl border border-emerald-500/30 transition-all cursor-pointer flex items-center gap-1.5">
                        <span>🧪 Prueba Hermeticidad</span>
                    </button>
                    <button type="button" @click="applyTemplate('calefon')" 
                            :class="activeTemplate === 'calefon' ? 'bg-amber-500 text-white font-bold ring-2 ring-amber-400/40 shadow-lg shadow-amber-500/20' : 'bg-slate-800 text-amber-300 hover:bg-slate-700'"
                            class="px-3 py-1.5 text-xs rounded-xl border border-amber-500/30 transition-all cursor-pointer flex items-center gap-1.5">
                        <span>🔥 Calefón / Caldera</span>
                    </button>
                </div>
            </div>

            <!-- Dynamic Input Box for Fuga de Gas Template -->
            <template x-if="activeTemplate === 'sellado'">
                <div class="p-4 bg-sky-950/40 border border-sky-500/30 rounded-xl space-y-3">
                    <div class="flex items-center justify-between flex-wrap gap-2">
                        <span class="text-xs font-bold text-sky-400 uppercase tracking-wider flex items-center gap-1.5">
                            <i data-lucide="sliders" class="w-4 h-4"></i>
                            <span>Ajustes Dinámicos: Plantilla Sellado Fugas de Gas</span>
                        </span>
                        <span class="text-[11px] text-slate-400">Modifica los campos para actualizar la frase en tiempo real</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">
                                📏 Metros Lineales de Red:
                            </label>
                            <div class="flex items-center gap-2">
                                <input type="number" 
                                       x-model.number="metrosLineales" 
                                       @input="updateSelladoText()" 
                                       min="1" max="1000" 
                                       placeholder="30"
                                       class="w-full px-3 py-2 bg-slate-900 border border-slate-700 rounded-xl text-white text-sm font-bold focus:outline-none focus:border-sky-500">
                                <span class="text-xs text-slate-400 font-medium shrink-0">metros</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">
                                ⏱️ Presión de Hermeticidad (mmca):
                            </label>
                            <div class="flex items-center gap-2">
                                <input type="number" 
                                       x-model.number="presionMmca" 
                                       @input="updateSelladoText()" 
                                       min="1" max="5000" 
                                       placeholder="368"
                                       class="w-full px-3 py-2 bg-slate-900 border border-slate-700 rounded-xl text-white text-sm font-bold focus:outline-none focus:border-sky-500">
                                <span class="text-xs text-slate-400 font-medium shrink-0">mmca</span>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="work_details" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">
                        Detalle del Trabajo, Normativas SEC, Garantía y Mediciones
                    </label>
                    <span class="text-[11px] text-slate-400 italic">Haga clic en una plantilla arriba para insertar texto predefinido</span>
                </div>
                <textarea id="work_details" name="work_details" rows="7" placeholder="Seleccione una plantilla rápida de arriba o escriba libremente..."
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

        <!-- 5. Evidencia Fotográfica y Captura desde Celular -->
        <div class="glass-panel p-6 rounded-2xl border border-slate-800 space-y-6"
             x-data="{
                 extraPhotos: [],
                 addExtraPhoto() {
                     this.extraPhotos.push({ id: Date.now(), fileName: '', previewUrl: null });
                 },
                 removeExtraPhoto(index) {
                     this.extraPhotos.splice(index, 1);
                 }
             }">
            <div class="flex items-center justify-between border-b border-slate-800 pb-3 flex-wrap gap-2">
                <div>
                    <h2 class="text-lg font-semibold text-white flex items-center gap-2">
                        <i data-lucide="image" class="w-5 h-5 text-purple-400"></i>
                        <span>Evidencia Fotográfica / Documentos del Servicio</span>
                    </h2>
                    <p class="text-xs text-slate-400 mt-0.5">Seleccione fotografías o archivos desde su galería/dispositivo o capture con la cámara</p>
                </div>

                <button type="button" @click="addExtraPhoto()" class="px-3.5 py-2 bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 text-xs font-bold rounded-xl border border-purple-500/30 transition-all flex items-center gap-1.5 cursor-pointer">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i>
                    <span>+ Añadir Archivo/Foto Extra (Foto 4+)</span>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Photo 1 -->
                <div x-data="{ 
                        fileName: '', 
                        previewUrl: null,
                        handleFile(e) {
                            const file = e.target.files[0];
                            if (file) {
                                this.fileName = file.name;
                                this.previewUrl = URL.createObjectURL(file);
                            }
                        }
                    }"
                     class="bg-slate-900/90 p-4 rounded-xl border border-slate-800 space-y-3 flex flex-col justify-between">
                    <div>
                        <label class="block text-xs font-semibold text-sky-400 uppercase tracking-wider mb-2">Imagen 1: Trabajo / Fuga</label>
                        <input type="file" id="edit_photo_1_input" name="photo_1" @change="handleFile($event)" class="hidden">
                        
                        <button type="button" onclick="document.getElementById('edit_photo_1_input').click()" 
                                class="w-full py-2.5 px-3 bg-sky-500/20 hover:bg-sky-500/30 text-sky-300 text-xs font-bold rounded-xl border border-sky-500/30 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="upload" class="w-4 h-4"></i>
                            <span>📁 Subir Archivo / Foto</span>
                        </button>
                    </div>

                    <div class="space-y-2">
                        <template x-if="fileName">
                            <div class="flex items-center gap-1.5 text-xs text-emerald-400 font-medium">
                                <i data-lucide="check-circle" class="w-4 h-4 shrink-0"></i>
                                <span class="truncate max-w-[180px]" x-text="fileName"></span>
                            </div>
                        </template>
                        <template x-if="!fileName">
                            <span class="text-slate-500 text-[11px] italic block text-center">Conservar imagen actual</span>
                        </template>

                        <template x-if="previewUrl">
                            <div class="mt-2 text-center">
                                <img :src="previewUrl" class="h-28 w-full object-cover rounded-lg border border-slate-700 shadow-md">
                            </div>
                        </template>
                        <template x-if="!previewUrl && '{{ $certificate->photo_1 }}'">
                            <div class="mt-2 text-center">
                                <img src="{{ asset('storage/' . $certificate->photo_1) }}" class="h-28 w-full object-cover rounded-lg border border-slate-700">
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Photo 2 (Default SEC QR) -->
                <div x-data="{ 
                        fileName: '', 
                        previewUrl: null,
                        handleFile(e) {
                            const file = e.target.files[0];
                            if (file) {
                                this.fileName = file.name;
                                this.previewUrl = URL.createObjectURL(file);
                            }
                        }
                    }"
                     class="bg-slate-900/90 p-4 rounded-xl border border-slate-800 space-y-3 flex flex-col justify-between">
                    <div>
                        <label class="block text-xs font-semibold text-emerald-400 uppercase tracking-wider mb-2">Imagen 2: Credencial / QR SEC</label>
                        <input type="file" id="edit_photo_2_input" name="photo_2" @change="handleFile($event)" class="hidden">
                        
                        <button type="button" onclick="document.getElementById('edit_photo_2_input').click()" 
                                class="w-full py-2.5 px-3 bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 text-xs font-bold rounded-xl border border-emerald-500/30 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="upload" class="w-4 h-4"></i>
                            <span>📁 Subir Archivo / Foto</span>
                        </button>
                    </div>

                    <div class="space-y-2">
                        <template x-if="fileName">
                            <div class="flex items-center gap-1.5 text-xs text-emerald-400 font-medium">
                                <i data-lucide="check-circle" class="w-4 h-4 shrink-0"></i>
                                <span class="truncate max-w-[180px]" x-text="fileName"></span>
                            </div>
                        </template>
                        <template x-if="!fileName">
                            <span class="text-slate-500 text-[11px] italic block text-center">Conservar imagen actual</span>
                        </template>

                        <template x-if="previewUrl">
                            <div class="mt-2 text-center">
                                <img :src="previewUrl" class="h-28 w-full object-cover rounded-lg border border-slate-700 shadow-md">
                            </div>
                        </template>
                        <template x-if="!previewUrl">
                            <div class="mt-2 text-center">
                                @if($certificate->photo_2)
                                    <img src="{{ asset('storage/' . $certificate->photo_2) }}" class="h-28 w-full object-cover rounded-lg border border-slate-700">
                                @else
                                    <img src="{{ asset('images/domingo-isain-gasfiter-sec-qr.png') }}" class="h-28 w-full object-contain bg-white p-1 rounded-lg border border-slate-700">
                                @endif
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Photo 3 -->
                <div x-data="{ 
                        fileName: '', 
                        previewUrl: null,
                        handleFile(e) {
                            const file = e.target.files[0];
                            if (file) {
                                this.fileName = file.name;
                                this.previewUrl = URL.createObjectURL(file);
                            }
                        }
                    }"
                     class="bg-slate-900/90 p-4 rounded-xl border border-slate-800 space-y-3 flex flex-col justify-between">
                    <div>
                        <label class="block text-xs font-semibold text-amber-400 uppercase tracking-wider mb-2">Imagen 3: Medición / Manómetro</label>
                        <input type="file" id="edit_photo_3_input" name="photo_3" @change="handleFile($event)" class="hidden">
                        
                        <button type="button" onclick="document.getElementById('edit_photo_3_input').click()" 
                                class="w-full py-2.5 px-3 bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 text-xs font-bold rounded-xl border border-amber-500/30 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="upload" class="w-4 h-4"></i>
                            <span>📁 Subir Archivo / Foto</span>
                        </button>
                    </div>

                    <div class="space-y-2">
                        <template x-if="fileName">
                            <div class="flex items-center gap-1.5 text-xs text-emerald-400 font-medium">
                                <i data-lucide="check-circle" class="w-4 h-4 shrink-0"></i>
                                <span class="truncate max-w-[180px]" x-text="fileName"></span>
                            </div>
                        </template>
                        <template x-if="!fileName">
                            <span class="text-slate-500 text-[11px] italic block text-center">Conservar imagen actual</span>
                        </template>

                        <template x-if="previewUrl">
                            <div class="mt-2 text-center">
                                <img :src="previewUrl" class="h-28 w-full object-cover rounded-lg border border-slate-700 shadow-md">
                            </div>
                        </template>
                        <template x-if="!previewUrl && '{{ $certificate->photo_3 }}'">
                            <div class="mt-2 text-center">
                                <img src="{{ asset('storage/' . $certificate->photo_3) }}" class="h-28 w-full object-cover rounded-lg border border-slate-700">
                            </div>
                        </template>
                    </div>
                </div>

            </div>

            <!-- Existing Extra Photos Display & New Extra Photos Upload Container -->
            @if(!empty($certificate->extra_photos) && is_array($certificate->extra_photos))
                <div class="pt-4 border-t border-slate-800 space-y-3">
                    <h3 class="text-xs font-semibold text-purple-400 uppercase tracking-wider">Fotos Extra de Evidencia Almacenadas</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        @foreach($certificate->extra_photos as $idx => $exPath)
                            <div class="bg-slate-900 p-2 rounded-xl border border-slate-800 text-center space-y-1">
                                <img src="{{ asset('storage/' . $exPath) }}" class="h-24 w-full object-cover rounded-lg">
                                <span class="text-[10px] text-slate-400 font-mono">Foto Adicional {{ $idx + 4 }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <template x-if="extraPhotos.length > 0">
                <div class="pt-4 border-t border-slate-800 space-y-4">
                    <h3 class="text-xs font-semibold text-purple-400 uppercase tracking-wider">Añadir Nuevas Fotos Adicionales (Foto 4+)</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <template x-for="(ex, index) in extraPhotos" :key="ex.id">
                            <div class="bg-slate-900/90 p-4 rounded-xl border border-slate-800 space-y-3 flex flex-col justify-between relative">
                                <div class="flex items-center justify-between mb-2">
                                    <label class="block text-xs font-semibold text-purple-300 uppercase tracking-wider" x-text="'Nueva Foto Extra ' + (index + 1)"></label>
                                    <button type="button" @click="removeExtraPhoto(index)" class="text-rose-400 hover:bg-rose-500/10 p-1 rounded-lg transition-colors" title="Eliminar foto extra">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </div>

                                <input type="file" :id="'edit_extra_photo_' + index" name="extra_photos[]"
                                       @change="const file = $event.target.files[0]; if(file) { ex.fileName = file.name; ex.previewUrl = URL.createObjectURL(file); }"
                                       class="hidden">

                                <button type="button" @click="document.getElementById('edit_extra_photo_' + index).click()"
                                        class="w-full py-2.5 px-3 bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 text-xs font-bold rounded-xl border border-purple-500/30 transition-all flex items-center justify-center gap-2 cursor-pointer">
                                    <i data-lucide="upload" class="w-4 h-4"></i>
                                    <span>📁 Subir Archivo / Foto</span>
                                </button>

                                <div class="space-y-2">
                                    <template x-if="ex.fileName">
                                        <div class="flex items-center gap-1.5 text-xs text-emerald-400 font-medium">
                                            <i data-lucide="check-circle" class="w-4 h-4 shrink-0"></i>
                                            <span class="truncate max-w-[180px]" x-text="ex.fileName"></span>
                                        </div>
                                    </template>
                                    <template x-if="!ex.fileName">
                                        <span class="text-slate-500 text-[11px] italic block text-center">Sin archivo seleccionado</span>
                                    </template>

                                    <template x-if="ex.previewUrl">
                                        <div class="mt-2 text-center">
                                            <img :src="ex.previewUrl" class="h-28 w-full object-cover rounded-lg border border-slate-700 shadow-md">
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </template>
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
