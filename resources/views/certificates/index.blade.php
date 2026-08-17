@extends('layouts.app')

@section('title', 'Certificados de Servicio')

@section('content')
<div class="space-y-6"
     x-data="{
        search: '{{ request('search') }}',
        status: '{{ request('status') }}',
        document_type: '{{ request('document_type') }}',
        loading: false,

        async fetchResults() {
            this.loading = true;
            try {
                const params = new URLSearchParams({
                    search: this.search,
                    status: this.status,
                    document_type: this.document_type,
                    ajax: '1'
                });
                const res = await fetch(`{{ route('certificates.index') }}?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                const data = await res.json();
                
                const tableContainer = document.getElementById('table-container');
                if (tableContainer) {
                    tableContainer.innerHTML = data.tableHtml;
                }
                
                if (document.getElementById('metric-total')) {
                    document.getElementById('metric-total').innerText = data.totalCertificates;
                }
                if (document.getElementById('metric-neto')) {
                    document.getElementById('metric-neto').innerText = data.formattedNeto;
                }
                if (document.getElementById('metric-sindoc')) {
                    document.getElementById('metric-sindoc').innerText = data.totalSinDocCount;
                }
                if (document.getElementById('metric-facturas')) {
                    document.getElementById('metric-facturas').innerText = data.totalFacturasCount;
                }

                if (window.lucide) { lucide.createIcons(); }
            } catch (err) {
                console.error(err);
            } finally {
                this.loading = false;
            }
        },

        clearFilters() {
            this.search = '';
            this.status = '';
            this.document_type = '';
            this.fetchResults();
        }
     }">

    <!-- Top Header Bar -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight flex items-center gap-2.5">
                <i data-lucide="file-text" class="w-7 h-7 text-sky-400"></i>
                <span>Gestión de Certificados de Servicio</span>
            </h1>
            <p class="text-xs text-slate-400 mt-1">
                SellafuGas® Domingo Isain — Servicio Técnico Certificado SEC Clase 3
            </p>
        </div>
        <div class="flex items-center gap-3">
            @if(auth()->user()->isAdmin())
                <a href="{{ route('certificates.import.form') }}" 
                   class="inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-amber-400 font-semibold text-sm border border-slate-800 transition-all">
                    <i data-lucide="database" class="w-4 h-4"></i>
                    <span>Importar BD Antigua</span>
                </a>
            @endif
            <a href="{{ route('certificates.create') }}" 
               class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-400 hover:to-blue-500 text-white font-semibold text-sm shadow-lg shadow-sky-500/25 transition-all">
                <i data-lucide="plus" class="w-5 h-5"></i>
                <span>Emitir Nuevo Certificado</span>
            </a>
        </div>
    </div>

    <!-- Metrics Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <div class="glass-card p-5 rounded-2xl border border-slate-800 flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Total Certificados</p>
                <h3 id="metric-total" class="text-2xl font-extrabold text-white mt-1">{{ number_format($totalCertificates) }}</h3>
                <p class="text-xs text-sky-400 mt-1 font-medium">{{ $thisMonthCount }} este mes</p>
            </div>
            <div class="p-3 rounded-xl bg-sky-500/10 text-sky-400 border border-sky-500/20">
                <i data-lucide="files" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="glass-card p-5 rounded-2xl border border-slate-800 flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Monto Neto Total</p>
                <h3 id="metric-neto" class="text-2xl font-extrabold text-emerald-400 mt-1">${{ number_format($totalNetoAmount, 0, ',', '.') }}</h3>
                <p class="text-xs text-emerald-300 mt-1 font-medium">Neto acumulado</p>
            </div>
            <div class="p-3 rounded-xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                <i data-lucide="dollar-sign" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="glass-card p-5 rounded-2xl border border-slate-800 flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Sin Doc Tributario</p>
                <h3 id="metric-sindoc" class="text-2xl font-extrabold text-amber-400 mt-1">{{ number_format($totalSinDocCount) }}</h3>
                <p class="text-xs text-amber-300 mt-1 font-medium">Neto directo cliente</p>
            </div>
            <div class="p-3 rounded-xl bg-amber-500/10 text-amber-400 border border-amber-500/20">
                <i data-lucide="file-minus" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="glass-card p-5 rounded-2xl border border-slate-800 flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Con Factura (+19%)</p>
                <h3 id="metric-facturas" class="text-2xl font-extrabold text-purple-400 mt-1">{{ number_format($totalFacturasCount) }}</h3>
                <p class="text-xs text-purple-300 mt-1 font-medium">Inmobiliarias/Contratistas</p>
            </div>
            <div class="p-3 rounded-xl bg-purple-500/10 text-purple-400 border border-purple-500/20">
                <i data-lucide="receipt" class="w-6 h-6"></i>
            </div>
        </div>

    </div>

    <!-- Search & Filter Form (AJAX Dynamic) -->
    <div class="glass-panel p-4 rounded-2xl border border-slate-800 relative">
        <form @submit.prevent="fetchResults()" class="flex flex-col md:flex-row gap-3">
            
            <!-- Real-time Live Search Input -->
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                    <template x-if="!loading">
                        <i data-lucide="search" class="w-4 h-4"></i>
                    </template>
                    <template x-if="loading">
                        <svg class="animate-spin h-4 w-4 text-sky-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </template>
                </div>

                <input type="text" name="search" x-model="search" @input.debounce.250ms="fetchResults()"
                       placeholder="⚡ Filtro en tiempo real: escriba calle, número, comuna, folio o cliente..." 
                       class="w-full pl-10 pr-10 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white placeholder-slate-400 text-sm focus:outline-none focus:border-sky-500 transition-all">
                
                <template x-if="search">
                    <button type="button" @click="search = ''; fetchResults()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-white">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </template>
            </div>

            <!-- Document Type Dropdown Filter -->
            <div class="w-full md:w-52">
                <select name="document_type" x-model="document_type" @change="fetchResults()" class="w-full px-3 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                    <option value="">Todos los Documentos</option>
                    <option value="certificado">📜 Certificados SEC</option>
                    <option value="cotizacion">📄 Cotizaciones</option>
                </select>
            </div>

            <!-- Status Dropdown Filter -->
            <div class="w-full md:w-44">
                <select name="status" x-model="status" @change="fetchResults()" class="w-full px-3 py-2.5 bg-slate-900 border border-slate-800 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                    <option value="">Todos los Estados</option>
                    <option value="emitido">Emitido</option>
                    <option value="completado">Completado</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="anulado">Anulado</option>
                </select>
            </div>

            <button type="submit" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white font-medium text-sm rounded-xl transition-colors flex items-center justify-center gap-2">
                <i data-lucide="filter" class="w-4 h-4"></i>
                <span>Buscar</span>
            </button>
            
            <button type="button" @click="clearFilters()" x-show="search || status || document_type" class="px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-slate-400 hover:text-white font-medium text-sm rounded-xl transition-colors flex items-center justify-center">
                Limpiar
            </button>
        </form>
    </div>

    <!-- Certificates Table Container (Updated dynamically via AJAX) -->
    <div id="table-container" class="glass-panel rounded-2xl border border-slate-800 overflow-hidden shadow-xl transition-opacity duration-200" :class="{ 'opacity-60': loading }">
        @include('certificates.partials.table', ['certificates' => $certificates])
    </div>

</div>

<script>
    // AJAX Pagination click handler
    document.addEventListener('click', function(e) {
        const link = e.target.closest('#table-container nav a');
        if (link) {
            e.preventDefault();
            const url = new URL(link.href);
            const searchInput = document.querySelector('[name=search]');
            const statusSelect = document.querySelector('[name=status]');
            if (searchInput) url.searchParams.set('search', searchInput.value);
            if (statusSelect) url.searchParams.set('status', statusSelect.value);
            url.searchParams.set('ajax', '1');

            const tableContainer = document.getElementById('table-container');
            if (tableContainer) tableContainer.classList.add('opacity-60');

            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(res => res.json())
                .then(data => {
                    if (tableContainer) {
                        tableContainer.innerHTML = data.tableHtml;
                        tableContainer.classList.remove('opacity-60');
                    }
                    if (window.lucide) { lucide.createIcons(); }
                })
                .catch(err => console.error(err));
        }
    });
</script>
@endsection
