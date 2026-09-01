<!-- SECTION: DOMINGO ISAIN CERTIFICATIONS & OFFICIAL DOCUMENTS -->
<section id="certificaciones" class="py-16 lg:py-24 bg-slate-900/50 border-t border-slate-800/80 relative"
         x-data="{
             certModalOpen: false,
             modalCertTitle: '',
             modalCertImage: '',
             modalCertSubtitle: '',
             modalCertNorma: '',
             modalCertBadge: '',
             openCertModal(title, image, subtitle, norma, badge) {
                 this.modalCertTitle = title;
                 this.modalCertImage = image;
                 this.modalCertSubtitle = subtitle;
                 this.modalCertNorma = norma;
                 this.modalCertBadge = badge;
                 this.certModalOpen = true;
             }
         }">
    
    <!-- Background Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-[500px] h-[300px] bg-emerald-500/5 blur-[100px] pointer-events-none -z-10 overflow-hidden"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <div data-animate="fade-up" class="text-center max-w-3xl mx-auto space-y-4">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-bold uppercase tracking-wider">
                <i data-lucide="award" class="w-4 h-4"></i>
                <span>Documentos & Certificaciones Oficiales</span>
            </div>
            <h2 class="font-display text-3xl sm:text-5xl font-black text-white tracking-tight">
                Documentos y Certificados de Domingo Isain Plaza Caamaño
            </h2>
            <p class="text-slate-300 text-sm sm:text-base">
                Transparencia y respaldo total. Verifique las certificaciones técnicas y autorizaciones oficiales de Domingo Isain Plaza Caamaño (RUT 12.738.961-6) ante la Superintendencia de Electricidad y Combustibles (SEC) y normas internacionales.
            </p>
        </div>

        <!-- 4 Official Interactive Document Cards -->
        <div data-animate="fade-up" data-delay="150" data-stagger class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Card 1: Licencia Oficial SEC Clase 3 -->
            <div class="glass-dark rounded-2xl border-2 border-emerald-500/40 p-5 flex flex-col justify-between space-y-4 shadow-xl shadow-emerald-950/20 group hover:border-emerald-400 transition-all hover-lift">
                <div class="space-y-3">
                    <!-- Thumbnail Preview -->
                    <div class="relative rounded-xl overflow-hidden bg-white border border-slate-700/80 aspect-[4/3] flex items-center justify-center p-2 cursor-pointer group-hover:shadow-lg transition-all"
                         @click="openCertModal('Licencia Oficial Gasfíter Instalador SEC Clase 3', '{{ asset('images/certificados-sec-gas.webp') }}', 'Domingo Isain Plaza Caamaño · RUT 12.738.961-6', 'DS66 SEC · Superintendencia de Electricidad y Combustibles', 'Oficial SEC')">
                        <img src="{{ asset('images/certificados-sec-gas.webp') }}" alt="Licencia SEC Domingo Isain" width="460" height="424" loading="lazy" decoding="async" class="w-full h-full object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-slate-950/20 group-hover:bg-transparent transition-all flex items-center justify-center pointer-events-none">
                            <span class="p-2 rounded-full bg-emerald-500/90 text-slate-950 shadow-lg group-hover:scale-110 transition-transform">
                                <i data-lucide="eye" class="w-4 h-4 stroke-[2.5]"></i>
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="px-2 py-0.5 rounded bg-emerald-500/10 text-emerald-400 text-[10px] font-black uppercase border border-emerald-500/30">
                            Oficial SEC Clase 3
                        </span>
                        <span class="text-[10px] text-slate-400 font-semibold">RUT 12.738.961-6</span>
                    </div>

                    <h3 class="text-base font-black text-white group-hover:text-emerald-400 transition-colors">
                        Licencia Oficial Gasfíter SEC
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Licencia vigente SEC Clase 3 para instalaciones interiores de gas en baja y media presión. Verificable en la base nacional SEC.
                    </p>
                </div>

                <div class="space-y-2 pt-2 border-t border-slate-800">
                    <button type="button" 
                            @click="openCertModal('Licencia Oficial Gasfíter Instalador SEC Clase 3', '{{ asset('images/certificados-sec-gas.webp') }}', 'Domingo Isain Plaza Caamaño · RUT 12.738.961-6', 'DS66 SEC · Superintendencia de Electricidad y Combustibles', 'Oficial SEC')"
                            class="w-full py-2.5 bg-emerald-600 hover:bg-emerald-500 text-slate-950 font-black rounded-xl text-xs flex items-center justify-center gap-1.5 transition-all shadow-md shadow-emerald-600/30">
                        <i data-lucide="eye" class="w-3.5 h-3.5"></i>
                        <span>Ver Licencia SEC Oficial</span>
                    </button>
                    
                    <a href="https://wlhttp.sec.cl/rnii/public/licencia/qr?o=285eb263edf5cb049f3f4cc7fa0d2182" target="_blank"
                       class="w-full py-1.5 text-center text-[11px] font-semibold text-sky-400 hover:text-sky-300 flex items-center justify-center gap-1 transition-colors">
                        <i data-lucide="external-link" class="w-3 h-3"></i>
                        <span>Validar QR en Portal SEC</span>
                    </a>
                </div>
            </div>

            <!-- Card 2: Certificado Fuga de Gas -->
            <div class="glass-dark rounded-2xl border border-slate-800 p-5 flex flex-col justify-between space-y-4 shadow-xl group hover:border-sky-500/60 transition-all hover-lift">
                <div class="space-y-3">
                    <!-- Thumbnail Preview -->
                    <div class="relative rounded-xl overflow-hidden bg-slate-950 border border-slate-700/80 aspect-[4/3] flex items-center justify-center p-2 cursor-pointer group-hover:shadow-lg transition-all"
                         @click="openCertModal('Certificado Técnico de Fugas de Gas', '{{ asset('images/certificates/certificado-fugade-gas.webp') }}', 'Sellado interno de matrices y cañerías sin romper', 'Norma NCh 2235 & DS66 SEC', 'Certificación Técnica')">
                        <img src="{{ asset('images/certificates/certificado-fugade-gas.webp') }}" alt="Certificado Fuga de Gas Domingo Isain" width="340" height="440" loading="lazy" decoding="async" class="w-full h-full object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-slate-950/20 group-hover:bg-transparent transition-all flex items-center justify-center pointer-events-none">
                            <span class="p-2 rounded-full bg-sky-500/90 text-slate-950 shadow-lg group-hover:scale-110 transition-transform">
                                <i data-lucide="eye" class="w-4 h-4 stroke-[2.5]"></i>
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="px-2 py-0.5 rounded bg-sky-500/10 text-sky-400 text-[10px] font-black uppercase border border-sky-500/30">
                            Sellado & Fugas
                        </span>
                        <span class="text-[10px] text-slate-400 font-semibold">NCh 2235</span>
                    </div>

                    <h3 class="text-base font-black text-white group-hover:text-sky-400 transition-colors">
                        Certificado Fuga de Gas
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Acreditación técnica en detección no destructiva, sellado interior de cañerías ocultas y protocolos de seguridad en redes de gas.
                    </p>
                </div>

                <div class="pt-2 border-t border-slate-800">
                    <button type="button" 
                            @click="openCertModal('Certificado Técnico de Fugas de Gas', '{{ asset('images/certificates/certificado-fugade-gas.webp') }}', 'Sellado interno de matrices y cañerías sin romper', 'Norma NCh 2235 & DS66 SEC', 'Certificación Técnica')"
                            class="w-full py-2.5 bg-slate-800 hover:bg-sky-600 hover:text-white text-slate-200 font-bold rounded-xl text-xs flex items-center justify-center gap-1.5 transition-all border border-slate-700 hover:border-sky-500">
                        <i data-lucide="eye" class="w-3.5 h-3.5 text-sky-400"></i>
                        <span>Ver Certificado Fuga de Gas</span>
                    </button>
                </div>
            </div>

            <!-- Card 3: Certificado Prodoral R6-1 -->
            <div class="glass-dark rounded-2xl border border-slate-800 p-5 flex flex-col justify-between space-y-4 shadow-xl group hover:border-amber-500/60 transition-all hover-lift">
                <div class="space-y-3">
                    <!-- Thumbnail Preview -->
                    <div class="relative rounded-xl overflow-hidden bg-slate-950 border border-slate-700/80 aspect-[4/3] flex items-center justify-center p-2 cursor-pointer group-hover:shadow-lg transition-all"
                         @click="openCertModal('Certificado Oficial Aplicador Prodoral R6-1', '{{ asset('images/certificates/certificado-prodoral.webp') }}', 'Tecnología alemana de sellado polimérico por inyección', 'DIN EN 13090 · NAG-203 · DS66 Art. 7', 'Norma Alemana')">
                        <img src="{{ asset('images/certificates/certificado-prodoral.webp') }}" alt="Certificado Prodoral R6-1 Domingo Isain" width="560" height="413" loading="lazy" decoding="async" class="w-full h-full object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-slate-950/20 group-hover:bg-transparent transition-all flex items-center justify-center pointer-events-none">
                            <span class="p-2 rounded-full bg-amber-500/90 text-slate-950 shadow-lg group-hover:scale-110 transition-transform">
                                <i data-lucide="eye" class="w-4 h-4 stroke-[2.5]"></i>
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="px-2 py-0.5 rounded bg-amber-500/10 text-amber-400 text-[10px] font-black uppercase border border-amber-500/30">
                            🇩🇪 Prodoral R6-1
                        </span>
                        <span class="text-[10px] text-slate-400 font-semibold">DIN EN 13090</span>
                    </div>

                    <h3 class="text-base font-black text-white group-hover:text-amber-400 transition-colors">
                        Certificado Prodoral R6-1
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Certificación oficial de aplicación del sellante polímero alemán Prodoral R6-1 bajo normas DIN EN 13090 y DS66 Art. 7.
                    </p>
                </div>

                <div class="pt-2 border-t border-slate-800">
                    <button type="button" 
                            @click="openCertModal('Certificado Oficial Aplicador Prodoral R6-1', '{{ asset('images/certificates/certificado-prodoral.webp') }}', 'Tecnología alemana de sellado polimérico por inyección', 'DIN EN 13090 · NAG-203 · DS66 Art. 7', 'Norma Alemana')"
                            class="w-full py-2.5 bg-slate-800 hover:bg-amber-600 hover:text-white text-slate-200 font-bold rounded-xl text-xs flex items-center justify-center gap-1.5 transition-all border border-slate-700 hover:border-amber-500">
                        <i data-lucide="eye" class="w-3.5 h-3.5 text-amber-400"></i>
                        <span>Ver Certificado Prodoral</span>
                    </button>
                </div>
            </div>

            <!-- Card 4: Certificado Prueba de Hermeticidad -->
            <div class="glass-dark rounded-2xl border border-slate-800 p-5 flex flex-col justify-between space-y-4 shadow-xl group hover:border-cyan-500/60 transition-all hover-lift">
                <div class="space-y-3">
                    <!-- Thumbnail Preview -->
                    <div class="relative rounded-xl overflow-hidden bg-slate-950 border border-slate-700/80 aspect-[4/3] flex items-center justify-center p-2 cursor-pointer group-hover:shadow-lg transition-all"
                         @click="openCertModal('Certificado de Prueba de Hermeticidad Manométrica', '{{ asset('images/certificates/certificado-prueba-hermeticidad.webp') }}', 'Prueba estanco a 368 mmca / 267 mmca sin caída de presión', 'DS66 Art. 44.2.3 · SellafuGas® Marca Registrada', 'Protocolo DS66')">
                        <img src="{{ asset('images/certificates/certificado-prueba-hermeticidad.webp') }}" alt="Certificado Hermeticidad Domingo Isain" width="550" height="414" loading="lazy" decoding="async" class="w-full h-full object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-slate-950/20 group-hover:bg-transparent transition-all flex items-center justify-center pointer-events-none">
                            <span class="p-2 rounded-full bg-cyan-500/90 text-slate-950 shadow-lg group-hover:scale-110 transition-transform">
                                <i data-lucide="eye" class="w-4 h-4 stroke-[2.5]"></i>
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="px-2 py-0.5 rounded bg-cyan-500/10 text-cyan-400 text-[10px] font-black uppercase border border-cyan-500/30">
                            Hermeticidad DS66
                        </span>
                        <span class="text-[10px] text-slate-400 font-semibold">368 mmca</span>
                    </div>

                    <h3 class="text-base font-black text-white group-hover:text-cyan-400 transition-colors">
                        Pruebas de Hermeticidad
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Certificado oficial de prueba manométrica de hermeticidad según Art. 44.2.3 del DS66 para reposición de suministro con gaseras.
                    </p>
                </div>

                <div class="pt-2 border-t border-slate-800">
                    <button type="button" 
                            @click="openCertModal('Certificado de Prueba de Hermeticidad Manométrica', '{{ asset('images/certificates/certificado-prueba-hermeticidad.webp') }}', 'Prueba estanco a 368 mmca / 267 mmca sin caída de presión', 'DS66 Art. 44.2.3 · SellafuGas® Marca Registrada', 'Protocolo DS66')"
                            class="w-full py-2.5 bg-slate-800 hover:bg-cyan-600 hover:text-white text-slate-200 font-bold rounded-xl text-xs flex items-center justify-center gap-1.5 transition-all border border-slate-700 hover:border-cyan-500">
                        <i data-lucide="eye" class="w-3.5 h-3.5 text-cyan-400"></i>
                        <span>Ver Certificado Hermeticidad</span>
                    </button>
                </div>
            </div>

        </div>

    </div>

    <!-- HIGH-QUALITY DOCUMENT LIGHTBOX / MODAL VIEWER -->
    <div x-show="certModalOpen" x-cloak 
         @keydown.escape.window="certModalOpen = false"
         class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 sm:p-6 lg:p-8"
         role="dialog" aria-modal="true">
        
        <!-- Modal Backdrop -->
        <div x-show="certModalOpen"
             x-transition:enter="transition-opacity ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-950/90 backdrop-blur-md"
             @click="certModalOpen = false"></div>

        <!-- Modal Dialog Box -->
        <div x-show="certModalOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative bg-slate-900 border border-slate-700/80 rounded-3xl max-w-3xl w-full p-6 sm:p-8 shadow-2xl overflow-hidden space-y-6 z-10 my-8"
             @click.away="certModalOpen = false">
            
            <!-- Modal Header -->
            <div class="flex items-start justify-between gap-4 pb-4 border-b border-slate-800">
                <div class="space-y-1">
                    <div class="flex items-center gap-2">
                        <span class="px-2.5 py-0.5 rounded-full bg-emerald-500/10 text-emerald-400 text-[10px] font-black uppercase border border-emerald-500/30" x-text="modalCertBadge"></span>
                        <span class="text-xs text-slate-400 font-semibold" x-text="modalCertNorma"></span>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-black text-white font-display" x-text="modalCertTitle"></h3>
                    <p class="text-xs text-slate-300" x-text="modalCertSubtitle"></p>
                </div>

                <!-- Close Button -->
                <button type="button" @click="certModalOpen = false"
                        class="p-2.5 rounded-xl bg-slate-800 text-slate-400 hover:text-white hover:bg-slate-700 transition-colors shrink-0">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <!-- Modal Image Preview Area -->
            <div class="relative bg-slate-950 rounded-2xl border border-slate-800 p-2 sm:p-4 flex items-center justify-center max-h-[60vh] overflow-auto">
                <img :src="modalCertImage" :alt="modalCertTitle" class="max-h-[55vh] w-auto object-contain rounded-xl shadow-2xl">
            </div>

            <!-- Modal Footer with Actions -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2 border-t border-slate-800">
                <div class="flex items-center gap-2 text-xs text-slate-400">
                    <i data-lucide="shield-check" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                    <span>Documento auténtico y respaldado por Domingo Isain Plaza Caamaño (SEC Clase 3)</span>
                </div>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <a :href="modalCertImage" target="_blank"
                       class="flex-1 sm:flex-none px-4 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-slate-950 font-bold text-xs rounded-xl flex items-center justify-center gap-2 shadow-lg transition-all">
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                        <span>Abrir en Pantalla Completa</span>
                    </a>
                    <button type="button" @click="certModalOpen = false"
                            class="px-4 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white font-bold text-xs rounded-xl transition-all">
                        Cerrar
                    </button>
                </div>
            </div>

        </div>
    </div>

</section>
