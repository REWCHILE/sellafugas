<!-- FOOTER COMPONENT -->
<footer class="bg-slate-950 border-t border-slate-800/80 py-12 text-xs text-slate-400">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            <!-- Col 1: Brand Info -->
            <div class="space-y-3 md:col-span-2">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logotipo-sellafugas.cl.webp') }}" alt="SellafuGas Logo" width="120" height="120" class="h-12 w-auto">
                    <div>
                        <span class="font-display font-black text-xl text-white">SELLA<span class="text-sky-400">FU</span><span class="text-emerald-400">GAS</span>®</span>
                        <span class="text-[11px] text-slate-300 block font-semibold">Domingo Isain Plaza Caamaño · Gasfiter Certificado SEC Clase 3</span>
                    </div>
                </div>
                <p class="text-xs text-slate-300 leading-relaxed max-w-md">
                    Servicio técnico especializado en sellado de fugas de gas no visibles en cañerías con tecnología alemana Prodoral R6-1 sin demoler muros ni levantar pisos. Garantía escrita de 3 años, usted paga después de solucionado.
                </p>
                <div class="text-[11px] text-slate-400">
                    Dirección: Estado 215 / Av. Libertador Bernardo O'Higgins 1302, Santiago, Chile 🇨🇱
                </div>
            </div>

            <!-- Col 2: Specialized Landing Services -->
            <div class="space-y-2">
                <h2 class="text-sm font-bold text-white uppercase tracking-wider">Especialidades Técnicas</h2>
                <ul class="space-y-1 text-xs">
                    <li><a href="{{ route('landing.prodoral') }}" class="inline-block py-0.5 hover:text-amber-400 text-amber-300 font-bold">🇩🇪 Prodoral R6-1 Sellado Alemán</a></li>
                    <li><a href="{{ route('landing.fugas-gas') }}" class="inline-block py-0.5 hover:text-sky-400 text-slate-300">Sellado Fugas de Gas Sin Romper</a></li>
                    <li><a href="{{ route('landing.gasfiter-sec') }}" class="inline-block py-0.5 hover:text-sky-400 text-slate-300">Gasfiter Certificado SEC Domingo</a></li>
                    <li><a href="{{ route('landing.sello-rojo') }}" class="inline-block py-0.5 hover:text-sky-400 text-slate-300">Levantamiento Sello Rojo SEC</a></li>
                    <li><a href="{{ route('landing.gas-trazador') }}" class="inline-block py-0.5 hover:text-sky-400 text-slate-300">Detección con Gas Trazador</a></li>
                    <li><a href="{{ route('landing.fugas-agua') }}" class="inline-block py-0.5 hover:text-sky-400 text-slate-300">Detección Fugas de Agua (Geófono)</a></li>
                    <li><a href="{{ route('landing.fugas-piscinas') }}" class="inline-block py-0.5 hover:text-sky-400 text-slate-300">Fugas en Piscinas sin Vaciar</a></li>
                    <li><a href="{{ route('landing.deteccion-sin-romper') }}" class="inline-block py-0.5 hover:text-sky-400 text-slate-300">Detección Sin Romper Muros</a></li>
                    <li><a href="{{ route('landing.reparacion-calefont') }}" class="inline-block py-0.5 hover:text-sky-400 text-slate-300">Calefont SEC Mantención</a></li>
                    <li><a href="{{ route('landing.certificados-sec') }}" class="inline-block py-0.5 hover:text-sky-400 text-slate-300">Certificados Oficiales SEC DS66</a></li>
                </ul>
            </div>

            <!-- Col 3: Fast Links -->
            <div class="space-y-2">
                <h2 class="text-sm font-bold text-white uppercase tracking-wider">SellafuGas®</h2>
                <ul class="space-y-1.5 text-xs">
                    <li><a href="{{ route('nosotros') }}" class="inline-block py-0.5 hover:text-sky-400 text-slate-300">Sobre Nosotros</a></li>
                    <li><a href="{{ route('contacto') }}" class="inline-block py-0.5 hover:text-sky-400 text-slate-300">Contacto y Central de Urgencias</a></li>
                    <li><a href="{{ route('home') }}#cotizador" class="inline-block py-0.5 hover:text-emerald-400 transition-colors text-slate-300">Cotizador de Sellado</a></li>
                    <li><a href="{{ route('landing.prodoral') }}" class="inline-block py-0.5 hover:text-amber-400 transition-colors text-amber-300">Tecnología Prodoral R6-1</a></li>
                    <li><a href="{{ route('landing.certificados-sec') }}" class="inline-block py-0.5 hover:text-sky-400 transition-colors text-slate-300">Certificados Oficiales SEC</a></li>
                    @auth
                    <li><a href="{{ route('certificates.index') }}" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 font-bold hover:bg-emerald-500/30 transition-all"><i data-lucide="layout-dashboard" class="w-3.5 h-3.5"></i><span>Mi Portal Administrador</span></a></li>
                    @endauth
                </ul>
            </div>

            <!-- Col 4: Contact & Emergency -->
            <div class="space-y-2">
                <h3 class="text-sm font-bold text-white uppercase tracking-wider">Atención y Urgencias</h3>
                <p class="text-xs text-slate-300 font-bold">Teléfono / WhatsApp:</p>
                <a href="tel:949877316" class="text-base font-black text-emerald-400 block hover:underline py-1">
                    +56 9 4987 7316
                </a>
                <p class="text-[11px] text-slate-300">Atención de Lunes a Domingo en Región Metropolitana, V y VI Región.</p>
                <div class="pt-2">
                    <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo%2C%20necesito%20atencion%20urgente" target="_blank"
                       class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 hover:bg-emerald-500/30 font-bold text-xs">
                        <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                        <span>WhatsApp 24 Horas</span>
                    </a>
                </div>
            </div>

        </div>

        <div class="border-t border-slate-800/80 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-slate-400">
            <p>© {{ date('Y') }} SellafuGas®. Domingo Isain Plaza Caamaño (RUT 12.738.961-6) - Gasfiter Certificado SEC Clase 3.</p>
            <p>Todos los derechos reservados · Normativa SEC DS66 / DIN EN 13090 / NAG-203.</p>
        </div>
    </div>
</footer>

<!-- Animations Observer Engine -->
<script defer src="{{ asset('js/animations.js') }}"></script>

