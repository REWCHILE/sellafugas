@extends('layouts.app')

@section('title', 'Emitir Nuevo Certificado')

@section('content')
<div class="max-w-5xl mx-auto space-y-6" 
     x-data="{ 
         documentType: '{{ old('document_type', 'certificado') }}',
         items: [
             { description: 'Sellado de fugas de gas en red', quantity: 1, unit_price: 800000 }
         ],
         taxType: 'neto',
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
         activeTemplate: '{{ old('document_type', 'certificado') }}',
         metrosLineales: 30,
         presionMmca: 267,
         getProdoralCotizacionText() {
             const m = this.metrosLineales || 50;
             return `Se oferta sellado de fuga de gas en red de ${m} metros lineales aproximadamente.\n\n` +
                 `Se asegura hermeticidad de acuerdo al Decreto Supremo 66 Artículo 44.2.3 SEC no importa si es una o más fugas. Se utilizará prodoral r6-1 sellante alemán para Fugas de Gas aceptado por SEC ds66 artículo 7: DIN EN 13090 Y NAG-203.\n\n` +
                 `En procedimiento necesitamos desconectar artefactos y medidor para realizar la inyección, necesitamos provisión de electricidad y acceso libre a su domicilio y medidor (o regulador ) mientras dure el procedimiento.\n\n` +
                 `Tiempo de ejecución 2 horas aproximadamente, se entrega certificado de servicio realizado, garantía 3 años por efectos de sellado.\n` +
                 `Se solicita pago contado una vez realizado el trabajo.\n\n` +
                 `Responsable Domingo Isain Plaza Caamaño Rut 12738961-6\n` +
                 `Gasfiter Certificado Autorizado SEC Clase 3`;
         },
         getProdoralCertificadoText() {
             const m = this.metrosLineales || 30;
             const p = this.presionMmca || 267;
             return `Se realizó sellado de fuga de gas en red de ${m} metros lineales aproximadamente.\n\n` +
                 `Se asegura hermeticidad de acuerdo al Decreto Supremo 66 Artículo 44.2.3 SEC. Se utilizó prodoral r6-1 sellante alemán para Fugas de Gas aceptado por SEC ds66 artículo 7: DIN EN 13090 Y NAG-203.\n\n` +
                 `Solucionado, garantía 3 años por efectos de sellado.\n\n` +
                 `Prueba de hermeticidad final a ${p}mmca estanco por 5 minutos, sin fugas.\n\n` +
                 `Responsable Domingo Isain Plaza Caamaño Rut 12738961-6\n` +
                 `Gasfiter Certificado Autorizado SEC Clase 3`;
         },
         updateTextarea() {
             const area = document.getElementById('work_details');
             if (!area) return;
             if (this.activeTemplate === 'cotizacion') {
                 area.value = this.getProdoralCotizacionText();
             } else if (this.activeTemplate === 'certificado') {
                 area.value = this.getProdoralCertificadoText();
             }
         },
         applyTemplate(type) {
             this.activeTemplate = type;
             this.updateTextarea();
         }
     }">

    <!-- Page Title Header -->
    <div class="flex items-center justify-between border-b border-slate-800 pb-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight flex items-center gap-2.5">
                <i data-lucide="file-plus" class="w-7 h-7 text-emerald-400"></i>
                <span>Emitir Certificado de Servicio N° {{ $nextNumber }}</span>
            </h1>
            <p class="text-xs text-slate-400 mt-1">Complete los datos requeridos para emitir el certificado oficial SEC de Instalgaschile Spa</p>
        </div>
        <a href="{{ route('certificates.index') }}" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-slate-300 text-sm font-medium rounded-xl border border-slate-800 transition-colors flex items-center gap-2">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            <span>Volver al Listado</span>
        </a>
    </div>

    <!-- Main Form -->
    <form action="{{ route('certificates.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- 1. Tipo de Documento, Folio & Fecha Block -->
        <div class="glass-panel p-6 rounded-2xl border border-slate-800 space-y-4">
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-3 flex items-center gap-2">
                    <i data-lucide="layers" class="w-4 h-4 text-sky-400"></i>
                    <span>Seleccione Tipo de Documento a Emitir</span>
                    <span class="text-rose-400">*</span>
                </label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Option 1: Certificado SEC (Domingo / Admin only) -->
                    @if(auth()->user()->isAdmin())
                        <label class="cursor-pointer group">
                            <input type="radio" name="document_type" value="certificado" x-model="documentType" class="sr-only">
                            <div :class="documentType === 'certificado' ? 'bg-emerald-950/90 border-2 border-emerald-400 text-emerald-200 ring-4 ring-emerald-500/20 shadow-xl shadow-emerald-950/60' : 'bg-slate-900/90 border border-slate-800 text-slate-400 hover:border-slate-700 hover:bg-slate-800/60'"
                                 class="p-4 rounded-2xl flex items-center justify-between transition-all duration-200">
                                <div class="flex items-center gap-3">
                                    <div :class="documentType === 'certificado' ? 'bg-emerald-500/20 text-emerald-300 border-emerald-500/40' : 'bg-slate-800 text-slate-400 border-slate-700'"
                                         class="p-2.5 rounded-xl border transition-colors">
                                        <i data-lucide="award" class="w-6 h-6"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-extrabold uppercase tracking-wide">Certificado Oficial SEC</div>
                                        <div class="text-xs text-emerald-400 font-medium mt-0.5">Autorizado · Domingo Isain SEC Clase 3</div>
                                    </div>
                                </div>
                                <div :class="documentType === 'certificado' ? 'border-emerald-400 bg-emerald-400' : 'border-slate-600'"
                                     class="w-5 h-5 rounded-full border-2 flex items-center justify-center transition-all shrink-0">
                                    <div x-show="documentType === 'certificado'" class="w-2 h-2 rounded-full bg-slate-950"></div>
                                </div>
                            </div>
                        </label>
                    @else
                        <div class="p-4 rounded-2xl bg-slate-900/40 border border-slate-800/60 text-slate-500 flex items-center justify-between opacity-60 cursor-not-allowed">
                            <div class="flex items-center gap-3">
                                <div class="p-2.5 rounded-xl bg-slate-800 border border-slate-700 text-slate-500">
                                    <i data-lucide="lock" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <div class="text-sm font-bold uppercase tracking-wide">Certificado Oficial SEC</div>
                                    <div class="text-xs text-amber-400/80 font-medium mt-0.5">Reservado exclusivamente para Domingo Isain (SEC)</div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Option 2: Cotización de Servicio -->
                    <label class="cursor-pointer group">
                        <input type="radio" name="document_type" value="cotizacion" x-model="documentType" class="sr-only">
                        <div :class="documentType === 'cotizacion' ? 'bg-sky-950/90 border-2 border-sky-400 text-sky-200 ring-4 ring-sky-500/20 shadow-xl shadow-sky-950/60' : 'bg-slate-900/90 border border-slate-800 text-slate-400 hover:border-slate-700 hover:bg-slate-800/60'"
                             class="p-4 rounded-2xl flex items-center justify-between transition-all duration-200">
                            <div class="flex items-center gap-3">
                                <div :class="documentType === 'cotizacion' ? 'bg-sky-500/20 text-sky-300 border-sky-500/40' : 'bg-slate-800 text-slate-400 border-slate-700'"
                                     class="p-2.5 rounded-xl border transition-colors">
                                    <i data-lucide="file-text" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <div class="text-sm font-extrabold uppercase tracking-wide">Cotización de Servicio</div>
                                    <div class="text-xs text-slate-400 font-medium mt-0.5">Propuesta comercial previa para el cliente</div>
                                </div>
                            </div>
                            <div :class="documentType === 'cotizacion' ? 'border-sky-400 bg-sky-400' : 'border-slate-600'"
                                 class="w-5 h-5 rounded-full border-2 flex items-center justify-center transition-all shrink-0">
                                <div x-show="documentType === 'cotizacion'" class="w-2 h-2 rounded-full bg-slate-950"></div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-3 border-t border-slate-800/80">
                <div>
                    <label for="certificate_number" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                        N° Folio <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="certificate_number" name="certificate_number" value="{{ old('certificate_number', $nextNumber) }}" required
                           class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-sky-400 font-bold text-lg focus:outline-none focus:border-sky-500">
                </div>

                <div>
                    <label for="date" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                        Fecha de Emisión <span class="text-rose-400">*</span>
                    </label>
                    <input type="date" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required
                           class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white font-medium focus:outline-none focus:border-sky-500">
                </div>

                <div>
                    <label for="status" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                        Estado del Documento <span class="text-rose-400">*</span>
                    </label>
                    <select id="status" name="status" class="w-full px-4 py-3 bg-slate-900 border border-slate-800 rounded-xl text-white font-medium focus:outline-none focus:border-sky-500">
                        <option value="emitido" selected>Emitido / Vigente</option>
                        <option value="completado">Completado</option>
                        <option value="pendiente">Pendiente de Trabajo</option>
                        <option value="anulado">Anulado</option>
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
                    <input type="text" id="client_name" name="client_name" value="{{ old('client_name') }}" required placeholder="Ej: Don Juan / Inmobiliaria XYZ"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                </div>

                <div>
                    <label for="client_phone" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Teléfono de Contacto</label>
                    <input type="text" id="client_phone" name="client_phone" value="{{ old('client_phone') }}" placeholder="Ej: +56 9 8888 7777"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                </div>

                <div class="md:col-span-2">
                    <label for="client_address" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Dirección Completa</label>
                    <input type="text" id="client_address" name="client_address" value="{{ old('client_address') }}" placeholder="Ej: Nuestra Señora de Fatima 9530"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                </div>

                <div>
                    <label for="client_comuna" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Comuna</label>
                    <input type="text" id="client_comuna" name="client_comuna" value="{{ old('client_comuna', 'La Florida') }}" placeholder="Ej: La Florida"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                </div>

                <div>
                    <label for="client_provincia" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Provincia / Región</label>
                    <input type="text" id="client_provincia" name="client_provincia" value="{{ old('client_provincia', 'Santiago') }}" placeholder="Ej: Santiago"
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
                    <span>Detalle Técnico del Trabajo SEC · Plantilla Prodoral</span>
                </h2>
                
                <!-- Quick Preset Buttons -->
                <div class="flex items-center gap-2 flex-wrap">
                    <span class="text-xs text-slate-400 font-medium">Plantillas oficiales:</span>
                    <button type="button" @click="applyTemplate('cotizacion')" 
                            :class="activeTemplate === 'cotizacion' ? 'bg-sky-500 text-white font-bold ring-2 ring-sky-400/40 shadow-lg shadow-sky-500/20' : 'bg-slate-800 text-sky-300 hover:bg-slate-700'"
                            class="px-3.5 py-1.5 text-xs rounded-xl border border-sky-500/30 transition-all cursor-pointer flex items-center gap-1.5">
                        <i data-lucide="file-text" class="w-3.5 h-3.5"></i>
                        <span>📄 Plantilla Prodoral Cotización</span>
                    </button>
                    <button type="button" @click="applyTemplate('certificado')" 
                            :class="activeTemplate === 'certificado' ? 'bg-emerald-500 text-white font-bold ring-2 ring-emerald-400/40 shadow-lg shadow-emerald-500/20' : 'bg-slate-800 text-emerald-300 hover:bg-slate-700'"
                            class="px-3.5 py-1.5 text-xs rounded-xl border border-emerald-500/30 transition-all cursor-pointer flex items-center gap-1.5">
                        <i data-lucide="award" class="w-3.5 h-3.5"></i>
                        <span>📜 Plantilla Prodoral Certificado</span>
                    </button>
                </div>
            </div>

            <!-- Dynamic Input Box for Prodoral Template -->
            <div class="p-4 bg-slate-900/90 border border-slate-700/80 rounded-2xl space-y-3">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="text-xs font-bold text-sky-400 uppercase tracking-wider flex items-center gap-1.5">
                        <i data-lucide="sliders" class="w-4 h-4 text-emerald-400"></i>
                        <span>Campos Dinámicos Prodoral R6-1</span>
                    </span>
                    <span class="text-[11px] text-slate-400">Modifica los metros o presión para rellenar el texto automáticamente</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">
                            📏 Metros Lineales de Red:
                        </label>
                        <div class="flex items-center gap-2">
                            <input type="number" 
                                   x-model.number="metrosLineales" 
                                   @input="updateTextarea()" 
                                   min="1" max="1000" 
                                   placeholder="30"
                                   class="w-full px-3 py-2 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm font-bold focus:outline-none focus:border-sky-500">
                            <span class="text-xs text-slate-400 font-medium shrink-0">metros</span>
                        </div>
                    </div>

                    <div x-show="activeTemplate === 'certificado'">
                        <label class="block text-xs font-semibold text-slate-300 mb-1">
                            ⏱️ Prueba de Hermeticidad (mmca):
                        </label>
                        <div class="flex items-center gap-2">
                            <input type="number" 
                                   x-model.number="presionMmca" 
                                   @input="updateTextarea()" 
                                   min="1" max="5000" 
                                   placeholder="267"
                                   class="w-full px-3 py-2 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm font-bold focus:outline-none focus:border-sky-500">
                            <span class="text-xs text-slate-400 font-medium shrink-0">mmca</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="work_details" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">
                        Detalle del Trabajo, Normativas SEC, Garantía y Mediciones
                    </label>
                    <span class="text-[11px] text-slate-400 italic">Haga clic en una plantilla arriba para insertar texto predefinido</span>
                </div>
                <textarea id="work_details" name="work_details" rows="7" placeholder="Seleccione una plantilla rápida de arriba o escriba libremente..."
                          class="w-full p-4 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm font-mono focus:outline-none focus:border-sky-500 leading-relaxed">{{ old('work_details', $defaultDetails) }}</textarea>
            </div>

            <!-- Gasfiter Responsible details -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2">
                <div>
                    <label for="gasfiter_name" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Responsable Técnico</label>
                    <input type="text" id="gasfiter_name" name="gasfiter_name" value="{{ old('gasfiter_name', 'Domingo Isain Plaza Caamaño') }}" required
                           class="w-full px-3 py-2 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none">
                </div>
                <div>
                    <label for="gasfiter_rut" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">RUT Gasfiter SEC</label>
                    <input type="text" id="gasfiter_rut" name="gasfiter_rut" value="{{ old('gasfiter_rut', '12738961-6') }}" required
                           class="w-full px-3 py-2 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none">
                </div>
                <div>
                    <label for="gasfiter_sec_class" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Acreditación SEC</label>
                    <input type="text" id="gasfiter_sec_class" name="gasfiter_sec_class" value="{{ old('gasfiter_sec_class', 'Gasfiter Certificado Autorizado SEC Clase 3') }}" required
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
                        <label class="block text-xs font-semibold text-sky-400 uppercase tracking-wider mb-2">Imagen 1: Trabajo / Fuga / Evidencia</label>
                        <input type="file" id="photo_1_input" name="photo_1" @change="handleFile($event)" class="hidden">
                        
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="document.getElementById('photo_1_input').click()" 
                                    class="w-full py-2.5 px-3 bg-sky-500/20 hover:bg-sky-500/30 text-sky-300 text-xs font-bold rounded-xl border border-sky-500/30 transition-all flex items-center justify-center gap-2 cursor-pointer">
                                <i data-lucide="upload" class="w-4 h-4"></i>
                                <span>📁 Subir Archivo / Foto</span>
                            </button>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <template x-if="fileName">
                            <div class="flex items-center gap-1.5 text-xs text-emerald-400 font-medium">
                                <i data-lucide="check-circle" class="w-4 h-4 shrink-0"></i>
                                <span class="truncate max-w-[180px]" x-text="fileName"></span>
                            </div>
                        </template>
                        <template x-if="!fileName">
                            <span class="text-slate-500 text-[11px] italic block text-center">Sin archivo seleccionado</span>
                        </template>

                        <template x-if="previewUrl">
                            <div class="mt-2 text-center">
                                <img :src="previewUrl" class="h-28 w-full object-cover rounded-lg border border-slate-700 shadow-md">
                            </div>
                        </template>

                        <p class="text-[11px] text-slate-500 pt-1 border-t border-slate-800/80">Fotografía de la red, equipo o fuga inspeccionada.</p>
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
                        <input type="file" id="photo_2_input" name="photo_2" @change="handleFile($event)" class="hidden">
                        
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="document.getElementById('photo_2_input').click()" 
                                    class="w-full py-2.5 px-3 bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 text-xs font-bold rounded-xl border border-emerald-500/30 transition-all flex items-center justify-center gap-2 cursor-pointer">
                                <i data-lucide="upload" class="w-4 h-4"></i>
                                <span>📁 Subir Archivo / Foto</span>
                            </button>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <template x-if="fileName">
                            <div class="flex items-center gap-1.5 text-xs text-emerald-400 font-medium">
                                <i data-lucide="check-circle" class="w-4 h-4 shrink-0"></i>
                                <span class="truncate max-w-[180px]" x-text="fileName"></span>
                            </div>
                        </template>
                        <template x-if="!fileName">
                            <span class="text-slate-500 text-[11px] italic block text-center">Sin archivo seleccionado (Usará QR Oficial SEC)</span>
                        </template>

                        <template x-if="previewUrl">
                            <div class="mt-2 text-center">
                                <img :src="previewUrl" class="h-28 w-full object-cover rounded-lg border border-slate-700 shadow-md">
                            </div>
                        </template>

                        <p class="text-[11px] text-slate-500 pt-1 border-t border-slate-800/80">Si se deja vacío, utilizará la credencial QR SEC Domingo Isain.</p>
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
                        <input type="file" id="photo_3_input" name="photo_3" @change="handleFile($event)" class="hidden">
                        
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="document.getElementById('photo_3_input').click()" 
                                    class="w-full py-2.5 px-3 bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 text-xs font-bold rounded-xl border border-amber-500/30 transition-all flex items-center justify-center gap-2 cursor-pointer">
                                <i data-lucide="upload" class="w-4 h-4"></i>
                                <span>📁 Subir Archivo / Foto</span>
                            </button>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <template x-if="fileName">
                            <div class="flex items-center gap-1.5 text-xs text-emerald-400 font-medium">
                                <i data-lucide="check-circle" class="w-4 h-4 shrink-0"></i>
                                <span class="truncate max-w-[180px]" x-text="fileName"></span>
                            </div>
                        </template>
                        <template x-if="!fileName">
                            <span class="text-slate-500 text-[11px] italic block text-center">Sin archivo seleccionado</span>
                        </template>

                        <template x-if="previewUrl">
                            <div class="mt-2 text-center">
                                <img :src="previewUrl" class="h-28 w-full object-cover rounded-lg border border-slate-700 shadow-md">
                            </div>
                        </template>

                        <p class="text-[11px] text-slate-500 pt-1 border-t border-slate-800/80">Prueba de hermeticidad o instrumento de medición.</p>
                    </div>
                </div>

            </div>

            <!-- Dynamic Extra Photos Container (Foto 4, 5...) -->
            <template x-if="extraPhotos.length > 0">
                <div class="pt-4 border-t border-slate-800 space-y-4">
                    <h3 class="text-xs font-semibold text-purple-400 uppercase tracking-wider">Fotos Adicionales de Evidencia (Foto 4+)</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <template x-for="(ex, index) in extraPhotos" :key="ex.id">
                            <div class="bg-slate-900/90 p-4 rounded-xl border border-slate-800 space-y-3 flex flex-col justify-between relative">
                                <div class="flex items-center justify-between mb-2">
                                    <label class="block text-xs font-semibold text-purple-300 uppercase tracking-wider" x-text="'Foto Adicional ' + (index + 4)"></label>
                                    <button type="button" @click="removeExtraPhoto(index)" class="text-rose-400 hover:bg-rose-500/10 p-1 rounded-lg transition-colors" title="Eliminar foto extra">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </div>

                                <input type="file" :id="'extra_photo_' + index" name="extra_photos[]"
                                       @change="const file = $event.target.files[0]; if(file) { ex.fileName = file.name; ex.previewUrl = URL.createObjectURL(file); }"
                                       class="hidden">

                                <button type="button" @click="document.getElementById('extra_photo_' + index).click()"
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
            <a href="{{ route('certificates.index') }}" class="px-6 py-3 bg-slate-900 hover:bg-slate-800 text-slate-300 font-semibold text-sm rounded-xl border border-slate-800 transition-colors">
                Cancelar
            </a>
            <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white font-bold text-sm rounded-xl shadow-lg shadow-emerald-500/25 transition-all flex items-center gap-2">
                <i data-lucide="check-circle" class="w-5 h-5"></i>
                <span>Emitir Certificado N° {{ $nextNumber }}</span>
            </button>
        </div>

    </form>

</div>
@endsection
