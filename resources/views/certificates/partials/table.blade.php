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
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-sky-400 text-base">N° {{ $cert->certificate_number }}</span>
                        </div>
                        <span class="block text-xs text-slate-400 mt-0.5">{{ \Carbon\Carbon::parse($cert->date)->format('d/m/Y') }}</span>
                        
                        <!-- Document Type Badge -->
                        @if($cert->document_type === 'cotizacion')
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[10px] font-black bg-sky-500/20 text-sky-300 border border-sky-500/40 mt-1.5 uppercase tracking-wide">
                                📄 Cotización
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[10px] font-black bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 mt-1.5 uppercase tracking-wide">
                                📜 Certificado SEC
                            </span>
                        @endif
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
                    <td class="py-4 px-5 whitespace-nowrap">
                        <span class="text-xs font-semibold text-slate-200 block">{{ $cert->gasfiter_name }}</span>
                        <span class="text-[11px] text-slate-400 block mt-0.5 whitespace-nowrap">RUT: {{ $cert->gasfiter_rut }}</span>
                    </td>

                    <!-- Actions -->
                    <td class="py-4 px-5 text-right whitespace-nowrap">
                        <div class="flex flex-col lg:flex-row items-end lg:items-center justify-end gap-1.5">
                            
                            <!-- Row 1 on mobile/tablet: 3 buttons (Ver, PDF, WhatsApp) -->
                            <div class="flex items-center gap-1.5">
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
                                    $pdfUrl = route('certificates.pdf', $cert->id);
                                    $docName = $cert->document_type === 'cotizacion' ? 'la Cotización' : 'el Certificado';
                                    $waText = rawurlencode("Hola {$cert->client_name}, le compartimos {$docName} de Servicio N° {$cert->certificate_number} de Instalgaschile SPA por un total de {$cert->formatted_total}.\n\nEnlace directo para descargar el documento PDF:\n{$pdfUrl}");
                                    $waPhone = preg_replace('/[^0-9]/', '', $cert->client_phone);
                                @endphp
                                <a href="https://wa.me/{{ $waPhone }}?text={{ $waText }}" target="_blank"
                                   title="Enviar por WhatsApp"
                                   class="p-2 bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-400 border border-emerald-500/30 rounded-lg transition-colors">
                                    <i data-lucide="send" class="w-4 h-4"></i>
                                </a>
                            </div>

                            <!-- Row 2 on mobile/tablet: 2 buttons (Editar, Eliminar) -->
                            <div class="flex items-center gap-1.5">
                                <!-- Edit -->
                                <a href="{{ route('certificates.edit', $cert->id) }}" 
                                   title="Editar Certificado"
                                   class="p-2 bg-slate-800 hover:bg-slate-700 text-amber-400 rounded-lg transition-colors">
                                    <i data-lucide="edit" class="w-4 h-4"></i>
                                </a>

                                <!-- Delete (Admin Only) -->
                                @if(Auth::user() && Auth::user()->isAdmin())
                                    <form action="{{ route('certificates.destroy', $cert->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Está seguro de eliminar el certificado N° {{ $cert->certificate_number }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Eliminar Certificado" class="p-2 bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 border border-rose-500/20 rounded-lg transition-colors">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>

                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="6" class="py-12 text-center text-slate-400">
                        <div class="flex flex-col items-center justify-center">
                            <i data-lucide="file-x" class="w-12 h-12 text-slate-600 mb-3"></i>
                            <p class="text-base font-semibold text-slate-300">No se encontraron certificados que coincidan con la búsqueda</p>
                            <p class="text-xs text-slate-500 mt-1">Pruebe ingresando otro nombre de calle, número, cliente o folio.</p>
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
        {{ $certificates->links('vendor.pagination.custom') }}
    </div>
@endif
