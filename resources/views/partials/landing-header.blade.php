<!-- Animations Stylesheet Preset -->
<link rel="stylesheet" href="{{ asset('css/animations.css') }}">

<!-- Top Emergency Ribbon -->
<div class="bg-gradient-to-r from-emerald-950 via-slate-900 to-sky-950 border-b border-emerald-500/20 text-xs sm:text-sm py-2.5 px-4 sticky top-0 z-50 backdrop-blur-md">
    <div class="max-w-7xl mx-auto flex items-center justify-between flex-wrap gap-2">
        <div class="flex items-center gap-2.5">
            <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
            </span>
            <span class="text-emerald-300 font-bold uppercase tracking-wider text-xs sm:text-sm">Servicio Urgente Fugas & Sellado Prodoral R6-1</span>
            <span class="hidden sm:inline text-slate-500">|</span>
            <span class="hidden sm:inline text-slate-200 font-medium">Gasfíter SEC Domingo Isain · <strong>RUT 12.738.961-6</strong></span>
        </div>
        <div class="flex items-center gap-4 text-xs sm:text-sm font-semibold">
            <a href="https://wlhttp.sec.cl/rnii/public/licencia/qr?o=285eb263edf5cb049f3f4cc7fa0d2182" target="_blank" class="text-sky-400 hover:text-sky-300 underline flex items-center gap-1.5 font-bold">
                <i data-lucide="shield-check" class="w-4 h-4 text-emerald-400"></i>
                <span>Verificar SEC Online</span>
            </a>
            <a href="tel:949877316" class="text-slate-950 bg-emerald-400 hover:bg-emerald-300 px-4 py-1.5 rounded-full text-xs sm:text-sm font-black transition-all shadow-md shadow-emerald-400/30 flex items-center gap-2">
                <i data-lucide="phone-call" class="w-4 h-4"></i>
                <span>949 877 316</span>
            </a>
        </div>
    </div>
</div>

<!-- Main Navigation Component Wrapper -->
<div x-data="{ mobileNav: false, megaMenuNav: false }">
    <!-- Main Navigation Header -->
    <header class="glass-dark border-b border-slate-800/80 sticky top-[41px] z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        
        <!-- Logo & Brand Title -->
        <a href="{{ route('home') }}" class="flex items-center gap-3.5 group">
            <img src="{{ asset('images/logotipo-sellafugas.cl.webp') }}" alt="SellafuGas Logo Oficial" width="120" height="120" class="h-12 sm:h-14 w-auto rounded-xl shadow-lg shadow-sky-500/20 group-hover:scale-105 transition-all">
            <div>
                <span class="font-display font-black text-2xl sm:text-3xl text-white tracking-tight leading-none block">
                    SELLA<span class="text-sky-400">FU</span><span class="text-emerald-400">GAS</span>®
                </span>
                <span class="text-xs text-slate-300 font-bold tracking-wider block mt-1 uppercase">
                    Prodoral R6-1 · SEC Clase 3
                </span>
            </div>
        </a>

        <!-- Navigation Links Desktop -->
        <nav class="hidden lg:flex items-center gap-6 text-sm font-bold text-slate-200">
            <a href="{{ route('home') }}" class="hover:text-sky-400 transition-colors {{ request()->routeIs('home') ? 'text-sky-400 font-extrabold' : '' }}">Inicio</a>
            
            <!-- Services Dropdown Mega Menu -->
            <div class="relative" @mouseenter="megaMenuNav = true" @mouseleave="megaMenuNav = false">
                <button type="button" class="flex items-center gap-1.5 hover:text-sky-400 transition-colors py-2 text-slate-200 {{ str_starts_with(request()->route()->getName() ?? '', 'landing.') ? 'text-amber-400 font-extrabold' : '' }}">
                    <span>Servicios Especializados</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 transition-transform" :class="megaMenuNav ? 'rotate-180 text-sky-400' : ''"></i>
                </button>

                <div x-show="megaMenuNav" x-cloak
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 translate-y-2"
                     class="absolute left-1/2 -translate-x-1/2 mt-1 w-[600px] bg-slate-900/95 backdrop-blur-2xl border border-slate-700/80 rounded-2xl shadow-2xl p-4 grid grid-cols-2 gap-2.5 z-50">
                    
                    <a href="{{ route('landing.prodoral') }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-800/80 transition-all border border-amber-500/30 bg-amber-500/5">
                        <span class="text-xl">🇩🇪</span>
                        <div>
                            <span class="font-bold text-amber-400 text-xs block">Prodoral R6-1 Alemán</span>
                            <span class="text-[11px] text-slate-400">Sellado interno definitivo sin picar</span>
                        </div>
                    </a>

                    <a href="{{ route('landing.fugas-gas') }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-800/70 transition-all">
                        <span class="text-xl">🔥</span>
                        <div>
                            <span class="font-bold text-white text-xs block">Fugas de Gas</span>
                            <span class="text-[11px] text-slate-400">Sellado y reparación no destructiva</span>
                        </div>
                    </a>

                    <a href="{{ route('landing.gasfiter-sec') }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-800/70 transition-all">
                        <span class="text-xl">🛡️</span>
                        <div>
                            <span class="font-bold text-white text-xs block">Gasfíter Certificado SEC</span>
                            <span class="text-[11px] text-slate-400">Domingo Isain Clase 3</span>
                        </div>
                    </a>

                    <a href="{{ route('landing.sello-rojo') }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-800/70 transition-all">
                        <span class="text-xl">🚨</span>
                        <div>
                            <span class="font-bold text-white text-xs block">Sello Rojo de Gas</span>
                            <span class="text-[11px] text-slate-400">Levantamiento y regularización</span>
                        </div>
                    </a>

                    <a href="{{ route('landing.gas-trazador') }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-800/70 transition-all">
                        <span class="text-xl">💨</span>
                        <div>
                            <span class="font-bold text-white text-xs block">Gas Trazador</span>
                            <span class="text-[11px] text-slate-400">Detección molecular N2/H2</span>
                        </div>
                    </a>

                    <a href="{{ route('landing.fugas-agua') }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-800/70 transition-all">
                        <span class="text-xl">💧</span>
                        <div>
                            <span class="font-bold text-white text-xs block">Fugas de Agua</span>
                            <span class="text-[11px] text-slate-400">Geófono digital sónico</span>
                        </div>
                    </a>

                    <a href="{{ route('landing.fugas-piscinas') }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-800/70 transition-all">
                        <span class="text-xl">🏊</span>
                        <div>
                            <span class="font-bold text-white text-xs block">Fugas en Piscinas</span>
                            <span class="text-[11px] text-slate-400">Detección sin vaciar agua</span>
                        </div>
                    </a>

                    <a href="{{ route('landing.deteccion-sin-romper') }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-800/70 transition-all">
                        <span class="text-xl">🔍</span>
                        <div>
                            <span class="font-bold text-white text-xs block">Detección Sin Romper</span>
                            <span class="text-[11px] text-slate-400">Inspección no destructiva</span>
                        </div>
                    </a>

                    <a href="{{ route('landing.reparacion-calefont') }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-800/70 transition-all">
                        <span class="text-xl">🔧</span>
                        <div>
                            <span class="font-bold text-white text-xs block">Calefont SEC</span>
                            <span class="text-[11px] text-slate-400">Reparación y mantención</span>
                        </div>
                    </a>

                    <a href="{{ route('landing.certificados-sec') }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-800/70 transition-all">
                        <span class="text-xl">📋</span>
                        <div>
                            <span class="font-bold text-white text-xs block">Certificados DS66</span>
                            <span class="text-[11px] text-slate-400">Pruebas oficiales con QR</span>
                        </div>
                    </a>

                </div>
            </div>

            <a href="{{ route('nosotros') }}" class="hover:text-sky-400 transition-colors {{ request()->routeIs('nosotros') ? 'text-sky-400 font-bold' : '' }}">Nosotros</a>
            <a href="{{ route('contacto') }}" class="hover:text-sky-400 transition-colors {{ request()->routeIs('contacto') ? 'text-sky-400 font-bold' : '' }}">Contacto</a>

            @auth
            <!-- Standout Dynamic Admin Portal Button (Only when Authenticated) -->
            <a href="{{ route('certificates.index') }}" 
               class="relative inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-gradient-to-r from-emerald-400 via-teal-400 to-emerald-500 text-slate-950 font-black text-xs shadow-lg shadow-emerald-500/30 ring-2 ring-emerald-400/50 hover:ring-emerald-300 transform transition-all duration-300 hover:scale-105 hover:-translate-y-0.5 hover:shadow-neon-emerald hover:brightness-110 active:scale-95 group">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-slate-950 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-slate-950"></span>
                </span>
                <i data-lucide="layout-dashboard" class="w-3.5 h-3.5 text-slate-950 group-hover:rotate-12 transition-transform duration-300"></i>
                <span>Mi Portal</span>
            </a>
            @endauth
        </nav>

        <!-- CTA Header Buttons & Mobile Hamburger -->
        <div class="flex items-center gap-3">
            <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo%20Isain%2C%20necesito%20atenci%C3%B3n%20por%20fuga%20de%20gas%20SellafuGas" target="_blank"
               class="hidden sm:flex px-4 py-2 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-xs rounded-xl shadow-lg shadow-emerald-500/25 transition-all items-center gap-2">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                <span>WhatsApp Directo</span>
            </a>

            <!-- Mobile Hamburger Button -->
            <button type="button" @click.stop="mobileNav = true" 
                    aria-label="Abrir Menú"
                    class="lg:hidden p-2.5 rounded-xl bg-slate-800/90 text-slate-200 hover:text-white border border-slate-700 hover:bg-slate-700 transition-all flex items-center justify-center cursor-pointer pointer-events-auto">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>

    </div>
</header>

    <!-- Mobile Off-Canvas Slide-Over Drawer (Right to Left) -->
    <div x-show="mobileNav" x-cloak 
         class="fixed inset-0 z-[9999] lg:hidden" 
         role="dialog" 
         aria-modal="true">
        
        <!-- Backdrop with Smooth Fade -->
        <div x-show="mobileNav"
             x-transition:enter="transition-opacity ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-950/90 backdrop-blur-md"
             @click="mobileNav = false"></div>

        <!-- Slide-Over Panel -->
        <div x-show="mobileNav"
             x-transition:enter="transform transition ease-out duration-300"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transform transition ease-in duration-200"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="fixed inset-y-0 right-0 w-full max-w-xs sm:max-w-sm bg-slate-950 border-l border-slate-800 shadow-2xl flex flex-col h-full z-10 overflow-hidden text-white">
            
            <!-- Drawer Top Bar -->
            <div class="p-5 border-b border-slate-800 flex items-center justify-between bg-slate-900/80">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5" @click="mobileNav = false">
                    <img src="{{ asset('images/logotipo-sellafugas.cl.webp') }}" alt="SellafuGas Logo" width="120" height="120" class="h-9 w-auto rounded-lg">
                    <div>
                        <span class="font-display font-black text-lg text-white leading-tight block">SELLA<span class="text-sky-400">FU</span><span class="text-emerald-400">GAS</span>®</span>
                        <span class="text-[10px] text-slate-300 font-semibold uppercase">Domingo Isain SEC</span>
                    </div>
                </a>

                <!-- Close Button (X) -->
                <button type="button" @click="mobileNav = false" aria-label="Cerrar Menú"
                        class="p-2 rounded-xl bg-slate-800 text-slate-300 hover:text-white hover:bg-slate-700 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Emergency Contact Quick Banner -->
            <div class="px-5 py-3 bg-emerald-500/15 border-b border-emerald-500/30 flex items-center justify-between text-xs">
                <span class="text-emerald-300 font-bold flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <span>Urgencias 24/7:</span>
                </span>
                <a href="tel:949877316" class="font-black text-white hover:text-emerald-300 underline">
                    949 877 316
                </a>
            </div>

            <!-- Drawer Scrollable Content -->
            <div class="flex-1 overflow-y-auto p-5 space-y-6 bg-slate-950">
                
                <!-- Section 1: Navigation -->
                <div class="space-y-1">
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block px-3 mb-1.5">Navegación Principal</span>
                    <a href="{{ route('home') }}" @click="mobileNav = false" 
                       class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-sm font-bold transition-colors {{ request()->routeIs('home') ? 'bg-sky-500/20 text-sky-300 ring-1 ring-sky-500/40' : 'text-slate-100 hover:bg-slate-800 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Inicio</span>
                    </a>
                    <a href="{{ route('home') }}#cotizador" @click="mobileNav = false" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-sm font-bold text-emerald-300 bg-emerald-500/15 border border-emerald-500/30 hover:bg-emerald-500/25 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        <span>Cotizador de Sellado</span>
                    </a>
                    <a href="{{ route('home') }}#certificaciones" @click="mobileNav = false" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-sm font-bold text-slate-100 hover:bg-slate-800 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                        <span>Documentos & Certificados</span>
                    </a>
                    <a href="{{ route('nosotros') }}" @click="mobileNav = false" 
                       class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-sm font-bold transition-colors {{ request()->routeIs('nosotros') ? 'bg-sky-500/20 text-sky-300 ring-1 ring-sky-500/40' : 'text-slate-100 hover:bg-slate-800 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>Sobre Nosotros (Domingo SEC)</span>
                    </a>
                    <a href="{{ route('contacto') }}" @click="mobileNav = false" 
                       class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-sm font-bold transition-colors {{ request()->routeIs('contacto') ? 'bg-emerald-500/20 text-emerald-300 ring-1 ring-emerald-500/40' : 'text-slate-100 hover:bg-slate-800 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Contacto y Central</span>
                    </a>
                </div>

                <!-- Section 2: Technical Services -->
                <div class="space-y-1.5 pt-3 border-t border-slate-800">
                    <span class="text-[10px] font-bold text-amber-400 uppercase tracking-wider block px-3 mb-1.5">Servicios Especializados</span>
                    
                    <a href="{{ route('landing.prodoral') }}" @click="mobileNav = false" 
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('landing.prodoral') ? 'bg-amber-500/30 text-amber-200 border-2 border-amber-400' : 'text-amber-300 bg-amber-500/15 border border-amber-500/30 hover:bg-amber-500/25' }}">
                        <span class="flex items-center gap-2">
                            <span class="text-sm">🇩🇪</span>
                            <span>Prodoral R6-1 Sellado Alemán</span>
                        </span>
                        <span class="text-[9px] uppercase px-1.5 py-0.5 rounded bg-amber-400/20 text-amber-300 font-black">Sin Romper</span>
                    </a>

                    <a href="{{ route('landing.fugas-gas') }}" @click="mobileNav = false" 
                       class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('landing.fugas-gas') ? 'bg-emerald-500/20 text-emerald-300 font-bold ring-1 ring-emerald-500/40' : 'text-slate-200 hover:bg-slate-800 hover:text-white' }}">
                        <span>🔥</span>
                        <span>Sellado Fugas de Gas</span>
                    </a>

                    <a href="{{ route('landing.gasfiter-sec') }}" @click="mobileNav = false" 
                       class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('landing.gasfiter-sec') ? 'bg-emerald-500/20 text-emerald-300 font-bold ring-1 ring-emerald-500/40' : 'text-slate-200 hover:bg-slate-800 hover:text-white' }}">
                        <span>🛡️</span>
                        <span>Gasfíter Certificado SEC</span>
                    </a>

                    <a href="{{ route('landing.sello-rojo') }}" @click="mobileNav = false" 
                       class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('landing.sello-rojo') ? 'bg-emerald-500/20 text-emerald-300 font-bold ring-1 ring-emerald-500/40' : 'text-slate-200 hover:bg-slate-800 hover:text-white' }}">
                        <span>🚨</span>
                        <span>Levantamiento Sello Rojo</span>
                    </a>

                    <a href="{{ route('landing.gas-trazador') }}" @click="mobileNav = false" 
                       class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('landing.gas-trazador') ? 'bg-emerald-500/20 text-emerald-300 font-bold ring-1 ring-emerald-500/40' : 'text-slate-200 hover:bg-slate-800 hover:text-white' }}">
                        <span>💨</span>
                        <span>Detección Gas Trazador</span>
                    </a>

                    <a href="{{ route('landing.fugas-agua') }}" @click="mobileNav = false" 
                       class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('landing.fugas-agua') ? 'bg-emerald-500/20 text-emerald-300 font-bold ring-1 ring-emerald-500/40' : 'text-slate-200 hover:bg-slate-800 hover:text-white' }}">
                        <span>💧</span>
                        <span>Detección Fugas de Agua</span>
                    </a>

                    <a href="{{ route('landing.fugas-piscinas') }}" @click="mobileNav = false" 
                       class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('landing.fugas-piscinas') ? 'bg-emerald-500/20 text-emerald-300 font-bold ring-1 ring-emerald-500/40' : 'text-slate-200 hover:bg-slate-800 hover:text-white' }}">
                        <span>🏊</span>
                        <span>Fugas en Piscinas sin Vaciar</span>
                    </a>

                    <a href="{{ route('landing.deteccion-sin-romper') }}" @click="mobileNav = false" 
                       class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('landing.deteccion-sin-romper') ? 'bg-emerald-500/20 text-emerald-300 font-bold ring-1 ring-emerald-500/40' : 'text-slate-200 hover:bg-slate-800 hover:text-white' }}">
                        <span>🔍</span>
                        <span>Detección Sin Romper Muros</span>
                    </a>

                    <a href="{{ route('landing.reparacion-calefont') }}" @click="mobileNav = false" 
                       class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('landing.reparacion-calefont') ? 'bg-emerald-500/20 text-emerald-300 font-bold ring-1 ring-emerald-500/40' : 'text-slate-200 hover:bg-slate-800 hover:text-white' }}">
                        <span>🔧</span>
                        <span>Calefont SEC Reparación</span>
                    </a>

                    <a href="{{ route('landing.certificados-sec') }}" @click="mobileNav = false" 
                       class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('landing.certificados-sec') ? 'bg-emerald-500/20 text-emerald-300 font-bold ring-1 ring-emerald-500/40' : 'text-slate-200 hover:bg-slate-800 hover:text-white' }}">
                        <span>📋</span>
                        <span>Certificados Oficiales DS66</span>
                    </a>

                </div>

            </div>

            <!-- Drawer Footer & Auth -->
            <div class="p-5 border-t border-slate-800 bg-slate-900/90 space-y-3">
                <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo,%20necesito%20atencion%20tecnica%20SellafuGas" target="_blank"
                   class="w-full py-3.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-xs flex items-center justify-center gap-2 shadow-lg shadow-emerald-500/25 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span>Contactar por WhatsApp</span>
                </a>

                @auth
                <!-- Standout Dynamic Admin Portal Drawer Button -->
                <a href="{{ route('certificates.index') }}" 
                   class="w-full py-3.5 text-center text-xs font-black text-slate-950 bg-gradient-to-r from-emerald-400 via-teal-400 to-emerald-500 rounded-xl shadow-lg shadow-emerald-500/30 ring-2 ring-emerald-400/50 flex items-center justify-center gap-2 transform transition-all duration-300 hover:scale-[1.02] active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span>Mi Portal Administrador</span>
                </a>
                @endauth
            </div>

        </div>
    </div>
</div>
