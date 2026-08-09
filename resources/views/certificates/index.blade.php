@extends('layouts.app')

@section('title', 'Certificados de Servicio')

@section('content')
<div class="space-y-6">

    <!-- Top Header Bar -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight flex items-center gap-2.5">
                <i data-lucide="file-text" class="w-7 h-7 text-sky-400"></i>
                <span>Gestión de Certificados de Servicio</span>
            </h1>
            <p class="text-xs text-slate-400 mt-1">
                Servicio Técnico Certificado SEC — Instalgaschile Spa
            </p>
        </div>
        <a href="{{ route('certificates.create') }}" 
           class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-400 hover:to-blue-500 text-white font-semibold text-sm shadow-lg shadow-sky-500/25 transition-all">
            <i data-lucide="plus" class="w-5 h-5"></i>
            <span>Emitir Nuevo Certificado</span>
        </a>
    </div>

    <!-- Metrics Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <div class="glass-card p-5 rounded-2xl border border-slate-800 flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Total Certificados</p>
                <h3 class="text-2xl font-extrabold text-white mt-1">{{ number_format($totalCertificates) }}</h3>
                <p class="text-xs text-sky-400 mt-1 font-medium">{{ $thisMonthCount }} este mes</p>
            </div>
            <div class="p-3 rounded-xl bg-sky-500/10 text-sky-400 border border-sky-500/20">
                <i data-lucide="files" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="glass-card p-5 rounded-2xl border border-slate-800 flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Monto Neto Total</p>
                <h3 class="text-2xl font-extrabold text-emerald-400 mt-1">${{ number_format($totalNetoAmount, 0, ',', '.') }}</h3>
                <p class="text-xs text-emerald-300 mt-1 font-medium">Neto acumulado</p>
            </div>
            <div class="p-3 rounded-xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                <i data-lucide="dollar-sign" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="glass-card p-5 rounded-2xl border border-slate-800 flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Sin Doc Tributario</p>
                <h3 class="text-2xl font-extrabold text-amber-400 mt-1">{{ number_format($totalSinDocCount) }}</h3>
                <p class="text-xs text-amber-300 mt-1 font-medium">Neto directo cliente</p>
            </div>
            <div class="p-3 rounded-xl bg-amber-500/10 text-amber-400 border border-amber-500/20">
                <i data-lucide="file-minus" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="glass-card p-5 rounded-2xl border border-slate-800 flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Con Factura (+19%)</p>
                <h3 class="text-2xl font-extrabold text-purple-400 mt-1">{{ number_format($totalFacturasCount) }}</h3>
                <p class="text-xs text-purple-300 mt-1 font-medium">Inmobiliarias/Contratistas</p>
            </div>
            <div class="p-3 rounded-xl bg-purple-500/10 text-purple-400 border border-purple-500/20">
                <i data-lucide="receipt" class="w-6 h-6"></i>
            </div>
        </div>

    </div>

    <!-- Search & Filter Form -->
    <div class="glass-panel p-4 rounded-2xl border border-slate-800">
        <form action="{{ route('certificates.index') }}" method="GET" class="flex flex-col md:flex-row gap-3">
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                    <i data-lucide="search" class="w-4 h-4"></i>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Buscar por Folio, Cliente, Teléfono o Dirección..." 
                       class="w-full pl-10 pr-4 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-sky-500">
            </div>

            <div class="w-full md:w-48">
                <select name="status" class="w-full px-3 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                    <option value="">Todos los Estados</option>
                    <option value="emitido" {{ request('status') === 'emitido' ? 'selected' : '' }}>Emitido</option>
                    <option value="completado" {{ request('status') === 'completado' ? 'selected' : '' }}>Completado</option>
                    <option value="pendiente" {{ request('status') === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="anulado" {{ request('status') === 'anulado' ? 'selected' : '' }}>Anulado</option>
                </select>
            </div>

            <button type="submit" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white font-medium text-sm rounded-xl transition-colors flex items-center justify-center gap-2">
                <i data-lucide="filter" class="w-4 h-4"></i>
                <span>Filtrar</span>
            </button>
            
            @if(request()->hasAny(['search', 'status']))
                <a href="{{ route('certificates.index') }}" class="px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-slate-400 hover:text-white font-medium text-sm rounded-xl transition-colors flex items-center justify-center">
                    Limpiar
                </a>
            @endif
        </form>
    </div>

    <!-- Certificates Table -->
    <div class="glass-panel rounded-2xl border border-slate-800 overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/80 text-xs font-semibold text-slate-400 uppercase tracking-wider border-b border-slate-800">
                        <th class="py-4 px-5">Folio / Fecha</th>
                        <th class="py-4 px-5">Cliente & Contacto</th>
                        <th class="py-4 px-5">Descripción Servicio</th>
                        <th class="py-4 px-5">Tributación / Total</th>
                        <th class="py-4 px-5">Emisor / Técnico</th>
                        <th class="py-4 px-5 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60 text-sm">
                    @forelse($certificates as $cert)
                        <tr class="hover:bg-slate-900/40 transition-colors">
                            
                            <!-- Folio & Date -->
                            <td class="py-4 px-5">
                                <span class="font-bold text-sky-400 text-base">N° {{ $cert->certificate_number }}</span>
                                <span class="block text-xs text-slate-400 mt-0.5">{{ \Carbon\Carbon::parse($cert->date)->format('d/m/Y') }}</span>
                            </td>

                            <!-- Client Info -->
                            <td class="py-4 px-5">
                                <span class="font-semibold text-white block">{{ $cert->client_name }}</span>
                                <span class="text-xs text-slate-400 block mt-0.5">
                                    {{ $cert->client_address ? $cert->client_address . ', ' : '' }}{{ $cert->client_comuna }}
                                </span>
                                @if($cert->client_phone)
                                    <span class="text-xs text-sky-400/90 flex items-center gap-1 mt-0.5">
                                        <i data-lucide="phone" class="w-3 h-3"></i> {{ $cert->client_phone }}
                                    </span>
                                @endif
                            </td>

                            <!-- Description -->
                            <td class="py-4 px-5">
                                <p class="text-slate-300 font-medium line-clamp-2 max-w-xs">{{ $cert->description }}</p>
                            </td>

                            <!-- Financial & Tax -->
                            <td class="py-4 px-5">
                                <div class="font-extrabold text-white text-base">
                                    ${{ number_format($cert->total_price, 0, ',', '.') }}
                                </div>
                                @if($cert->tax_type === 'factura')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-purple-500/20 text-purple-300 border border-purple-500/30 mt-1">
                                        Factura (+19% IVA)
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/20 text-amber-300 border border-amber-500/30 mt-1">
                                        Neto (Sin Doc Tributario)
                                    </span>
                                @endif
                            </td>

                            <!-- Issuer / Tech -->
                            <td class="py-4 px-5">
                                <span class="text-xs font-semibold text-slate-200 block">{{ $cert->gasfiter_name }}</span>
                                <span class="text-[11px] text-slate-400 block mt-0.5">RUT: {{ $cert->gasfiter_rut }}</span>
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    
                                    <!-- Ver / Show -->
                                    <a href="{{ route('certificates.show', $cert->id) }}" 
                                       title="Ver Detalle"
                                       class="p-2 bg-slate-800 hover:bg-slate-700 text-sky-400 rounded-lg transition-colors">
                                        <i data-lucide="eye" class="w-4 h-4"></i>
                                    </a>

                                    <!-- Download PDF -->
                                    <a href="{{ route('certificates.pdf', $cert->id) }}" target="_blank"
                                       title="Descargar PDF Certificado"
                                       class="p-2 bg-sky-500/20 hover:bg-sky-500/30 text-sky-300 border border-sky-500/30 rounded-lg transition-colors">
                                        <i data-lucide="file-down" class="w-4 h-4"></i>
                                    </a>

                                    <!-- WhatsApp Share -->
                                    @php
                                        $waText = rawurlencode("Hola {$cert->client_name}, le enviamos su Certificado de Servicio N° {$cert->certificate_number} de Instalgaschile Spa por un total de {$cert->formatted_total}. Puede consultarlo o descargarlo en línea.");
                                        $waPhone = preg_replace('/[^0-9]/', '', $cert->client_phone);
                                    @endphp
                                    <a href="https://wa.me/{{ $waPhone }}?text={{ $waText }}" target="_blank"
                                       title="Enviar por WhatsApp"
                                       class="p-2 bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-400 border border-emerald-500/30 rounded-lg transition-colors">
                                        <i data-lucide="send" class="w-4 h-4"></i>
                                    </a>

                                    <!-- Edit -->
                                    <a href="{{ route('certificates.edit', $cert->id) }}" 
                                       title="Editar Certificado"
                                       class="p-2 bg-slate-800 hover:bg-slate-700 text-amber-400 rounded-lg transition-colors">
                                        <i data-lucide="edit" class="w-4 h-4"></i>
                                    </a>

                                    <!-- Delete (Admin Only) -->
                                    @if(Auth::user()->isAdmin())
                                        <form action="{{ route('certificates.destroy', $cert->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Está seguro de eliminar el certificado N° {{ $cert->certificate_number }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Eliminar Certificado" class="p-2 bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 border border-rose-500/20 rounded-lg transition-colors">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    @endif

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                <div class="flex flex-col items-center justify-center">
                                    <i data-lucide="file-x" class="w-12 h-12 text-slate-600 mb-3"></i>
                                    <p class="text-base font-semibold text-slate-300">No se encontraron certificados</p>
                                    <p class="text-xs text-slate-500 mt-1">Comience emitiendo un nuevo certificado con el botón superior.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($certificates->hasPages())
            <div class="p-4 border-t border-slate-800 bg-slate-900/60">
                {{ $certificates->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
