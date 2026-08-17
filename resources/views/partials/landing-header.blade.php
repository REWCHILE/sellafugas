<!-- Top Emergency Ribbon -->
<div class="bg-gradient-to-r from-emerald-950 via-slate-900 to-sky-950 border-b border-emerald-500/20 text-xs py-2 px-4 sticky top-0 z-50 backdrop-blur-md">
    <div class="max-w-7xl mx-auto flex items-center justify-between flex-wrap gap-2">
        <div class="flex items-center gap-2">
            <span class="relative flex h-2.5 w-2.5">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
            </span>
            <span class="text-emerald-300 font-bold uppercase tracking-wider text-[11px]">Servicio Urgente Fugas & Sellado Prodoral R6-1</span>
            <span class="hidden sm:inline text-slate-500">|</span>
            <span class="hidden sm:inline text-slate-300">Gasfiter SEC Domingo Isain · <strong>RUT 12.738.961-6</strong></span>
        </div>
        <div class="flex items-center gap-4 text-xs font-semibold">
            <a href="https://wlhttp.sec.cl/rnii/public/licencia/qr?o=285eb263edf5cb049f3f4cc7fa0d2182" target="_blank" class="text-sky-400 hover:text-sky-300 underline flex items-center gap-1">
                <i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-400"></i>
                <span>Verificar SEC Online</span>
            </a>
            <a href="tel:949877316" class="text-white bg-emerald-600 hover:bg-emerald-500 px-3 py-1 rounded-full text-xs font-bold transition-all shadow-md shadow-emerald-600/30 flex items-center gap-1.5">
                <i data-lucide="phone-call" class="w-3.5 h-3.5"></i>
                <span>949 877 316</span>
            </a>
        </div>
    </div>
</div>

<!-- Main Navigation Header -->
<header class="glass-dark border-b border-slate-800/80 sticky top-[37px] z-40" x-data="{ mobileNav: false, megaMenuNav: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        
        <!-- Logo & Brand Title -->
        <a href="{{ route('home') }}" class="flex items-center gap-3.5 group">
            <img src="{{ asset('images/logotipo-sellafugas.cl.webp') }}" alt="SellafuGas Logo Oficial" class="h-11 sm:h-12 w-auto rounded-xl shadow-lg shadow-sky-500/20 group-hover:scale-105 transition-all">
            <div>
                <span class="font-display font-black text-xl sm:text-2xl text-white tracking-tight leading-none block">
                    SELLA<span class="text-sky-400">FU</span><span class="text-emerald-400">GAS</span>®
                </span>
                <span class="text-[10px] sm:text-[11px] text-slate-400 font-semibold tracking-wider block mt-0.5 uppercase">
                    Prodoral R6-1 · SEC Clase 3
                </span>
            </div>
        </a>

        <!-- Navigation Links Desktop -->
        <nav class="hidden lg:flex items-center gap-5 text-xs font-semibold text-slate-300">
            <a href="{{ route('home') }}" class="hover:text-sky-400 transition-colors {{ request()->routeIs('home') ? 'text-sky-400 font-bold' : '' }}">Inicio</a>
            
            <!-- Services Dropdown Mega Menu -->
            <div class="relative" @mouseenter="megaMenuNav = true" @mouseleave="megaMenuNav = false">
                <button type="button" class="flex items-center gap-1 hover:text-sky-400 transition-colors py-2 text-slate-200 {{ str_starts_with(request()->route()->getName() ?? '', 'landing.') ? 'text-amber-400 font-bold' : '' }}">
                    <span>Servicios Especializados</span>
                    <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform" :class="megaMenuNav ? 'rotate-180 text-sky-400' : ''"></i>
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
            <a href="{{ route('certificates.index') }}" class="text-xs font-bold text-emerald-400 bg-emerald-500/10 border border-emerald-500/30 px-3 py-1.5 rounded-xl flex items-center gap-1.5 hover:bg-emerald-500/20 transition-all">
                <i data-lucide="layout-dashboard" class="w-3.5 h-3.5"></i>
                <span>Mi Portal Admin</span>
            </a>
            @else
            <a href="{{ route('login') }}" class="text-xs text-slate-400 hover:text-white border border-slate-700 px-2.5 py-1 rounded-lg">
                Acceso Admin
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
            <button type="button" @click="mobileNav = !mobileNav" class="lg:hidden p-2 rounded-xl bg-slate-800 text-slate-200 hover:text-white">
                <i data-lucide="menu" class="w-6 h-6" x-show="!mobileNav"></i>
                <i data-lucide="x" class="w-6 h-6" x-show="mobileNav" x-cloak></i>
            </button>
        </div>

    </div>

    <!-- Mobile Drawer Menu -->
    <div x-show="mobileNav" x-cloak class="lg:hidden bg-slate-950/95 backdrop-blur-2xl border-t border-slate-800 px-4 py-6 space-y-4 max-h-[85vh] overflow-y-auto">
        <div class="space-y-1">
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block px-3 mb-2">Navegación</span>
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-sm text-slate-200 hover:bg-slate-800">Inicio</a>
            <a href="{{ route('nosotros') }}" class="block px-3 py-2 rounded-lg text-sm text-slate-200 hover:bg-slate-800">Nosotros</a>
            <a href="{{ route('contacto') }}" class="block px-3 py-2 rounded-lg text-sm text-slate-200 hover:bg-slate-800">Contacto</a>
        </div>

        <div class="space-y-1 pt-2 border-t border-slate-800">
            <span class="text-[11px] font-bold text-amber-400 uppercase tracking-wider block px-3 mb-2">Servicios Técnicos</span>
            <a href="{{ route('landing.prodoral') }}" class="block px-3 py-2 rounded-lg text-sm font-bold text-amber-300 bg-amber-500/10">🇩🇪 Prodoral R6-1 Alemán</a>
            <a href="{{ route('landing.fugas-gas') }}" class="block px-3 py-2 rounded-lg text-sm text-slate-200 hover:bg-slate-800">🔥 Fugas de Gas (Sellado)</a>
            <a href="{{ route('landing.gasfiter-sec') }}" class="block px-3 py-2 rounded-lg text-sm text-slate-200 hover:bg-slate-800">🛡️ Gasfíter SEC Domingo</a>
            <a href="{{ route('landing.sello-rojo') }}" class="block px-3 py-2 rounded-lg text-sm text-slate-200 hover:bg-slate-800">🚨 Sello Rojo SEC</a>
            <a href="{{ route('landing.gas-trazador') }}" class="block px-3 py-2 rounded-lg text-sm text-slate-200 hover:bg-slate-800">💨 Gas Trazador</a>
            <a href="{{ route('landing.fugas-agua') }}" class="block px-3 py-2 rounded-lg text-sm text-slate-200 hover:bg-slate-800">💧 Fugas de Agua (Geófono)</a>
            <a href="{{ route('landing.fugas-piscinas') }}" class="block px-3 py-2 rounded-lg text-sm text-slate-200 hover:bg-slate-800">🏊 Piscinas sin Vaciar</a>
            <a href="{{ route('landing.deteccion-sin-romper') }}" class="block px-3 py-2 rounded-lg text-sm text-slate-200 hover:bg-slate-800">🔍 Detección Sin Romper</a>
            <a href="{{ route('landing.reparacion-calefont') }}" class="block px-3 py-2 rounded-lg text-sm text-slate-200 hover:bg-slate-800">🔧 Calefont SEC</a>
            <a href="{{ route('landing.certificados-sec') }}" class="block px-3 py-2 rounded-lg text-sm text-slate-200 hover:bg-slate-800">📋 Certificados DS66</a>
        </div>

        <div class="pt-3 border-t border-slate-800">
            @auth
            <a href="{{ route('certificates.index') }}" class="block w-full py-2.5 text-center text-xs font-bold text-emerald-400 bg-emerald-500/10 border border-emerald-500/30 rounded-xl">
                Mi Portal Admin
            </a>
            @else
            <a href="{{ route('login') }}" class="block w-full py-2.5 text-center text-xs font-bold text-slate-300 border border-slate-700 rounded-xl">
                Acceso Administrador
            </a>
            @endauth
        </div>
    </div>
</header>
