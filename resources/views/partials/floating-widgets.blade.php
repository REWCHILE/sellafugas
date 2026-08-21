<!-- DYNAMIC MOUSE FOLLOW SPOTLIGHT GLOW EFFECT (Desktop & Tablet) -->
<div id="mouseGlowSpotlight" 
     class="fixed pointer-events-none z-30 w-[450px] h-[450px] rounded-full bg-radial from-sky-500/20 via-emerald-500/10 to-transparent blur-3xl opacity-0 transition-opacity duration-300 ease-out hidden md:block"
     style="top: 0; left: 0; transform: translate3d(-50%, -50%, 0); will-change: transform;"></div>

<!-- REAL-TIME SOCIAL PROOF NOTIFICATION TOAST (FOMO SYSTEM) -->
<div id="fomoToast" class="fixed bottom-4 left-3 sm:bottom-6 sm:left-6 z-50 transition-all duration-500 transform translate-y-24 opacity-0 pointer-events-none sm:pointer-events-auto">
    <div class="glass-dark border border-emerald-500/40 p-2.5 sm:p-4 rounded-xl sm:rounded-2xl shadow-2xl flex items-center gap-2.5 sm:gap-3.5 max-w-[240px] xs:max-w-[270px] sm:max-w-sm">
        <div class="relative p-2 sm:p-2.5 rounded-lg sm:rounded-xl bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 shrink-0">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-emerald-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
            </svg>
            <span class="absolute -top-1 -right-1 w-2 h-2 sm:w-2.5 sm:h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
        </div>
        <div class="space-y-0.5 overflow-hidden">
            <p id="fomoText" class="text-[11px] sm:text-xs font-bold text-white leading-tight truncate">
                Una visita agendada en Las Condes
            </p>
            <p id="fomoTime" class="text-[10px] sm:text-[11px] text-emerald-400 font-semibold flex items-center gap-1">
                <svg class="w-3 h-3 text-emerald-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                </svg>
                <span>Hace 2 minutos</span>
            </p>
        </div>
    </div>
</div>

<!-- FLOATING WHATSAPP, PHONE & BACK-TO-TOP ACTION BUTTONS -->
<div class="fixed bottom-4 right-3 sm:bottom-6 sm:right-6 z-50 flex flex-col items-end gap-2.5 sm:gap-3">
    
    <!-- Dynamic Back to Top Anchor Button (Appears only near page bottom) -->
    <button id="backToTopBtn" type="button" onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
            title="Volver al inicio arriba"
            class="p-2.5 sm:p-3 bg-slate-900/95 hover:bg-sky-500 text-sky-400 hover:text-slate-950 rounded-full border border-sky-400/40 shadow-2xl flex items-center justify-center transition-all duration-300 opacity-0 pointer-events-none translate-y-8 group hover:scale-110 cursor-pointer">
        <svg class="w-4 h-4 sm:w-5 sm:h-5 transform group-hover:-translate-y-1 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

    <!-- Direct Phone Call Button -->
    <a href="tel:949877316" title="Llamar a Domingo Isain"
       class="p-3 sm:p-3.5 bg-slate-900/95 hover:bg-slate-800 text-white rounded-full border border-slate-700 shadow-xl flex items-center justify-center group transition-all hover:scale-110">
        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-sky-400 group-hover:animate-bounce" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
        </svg>
    </a>

    <!-- Floating Pulsing WhatsApp Button with Official WhatsApp Icon -->
    <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo%20Isain%2C%20necesito%20cotizar%20sellado%20de%20gas%20SellafuGas" target="_blank"
       title="Contactar a Domingo Isain por WhatsApp"
       class="relative p-3.5 sm:p-4 bg-emerald-500 hover:bg-emerald-400 text-white rounded-full shadow-2xl shadow-emerald-500/50 flex items-center justify-center transition-all transform hover:scale-110 group">
        <span class="absolute inset-0 rounded-full bg-emerald-400 animate-pulse-ring pointer-events-none"></span>
        <svg class="w-6 h-6 sm:w-7 sm:h-7 relative z-10 fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>

</div>

<!-- Real-Time Social Proof Toast Cycle & Scroll Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // 1. Back to Top Scroll Detection (Appears only when near page bottom)
        const backBtn = document.getElementById('backToTopBtn');
        if (backBtn) {
            window.addEventListener('scroll', () => {
                const scrollPos = window.innerHeight + window.scrollY;
                const threshold = document.documentElement.scrollHeight - 550;
                if (scrollPos >= threshold && window.scrollY > 400) {
                    backBtn.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-8');
                    backBtn.classList.add('opacity-100', 'pointer-events-auto', 'translate-y-0');
                } else {
                    backBtn.classList.remove('opacity-100', 'pointer-events-auto', 'translate-y-0');
                    backBtn.classList.add('opacity-0', 'pointer-events-none', 'translate-y-8');
                }
            }, { passive: true });
        }

        // 2. Real-Time Social Proof Toast Cycle
        const fomoEvents = [
            { text: "Una visita de Sellado agendada en Las Condes", time: "Hace 2 minutos" },
            { text: "Cotización de Sellado Prodoral (18m) en Providencia", time: "Hace 5 minutos" },
            { text: "Certificado Oficial SEC emitido en Chicureo", time: "Hace 11 minutos" },
            { text: "Sellado exitoso sin romper completado en Vitacura", time: "Hace 19 minutos" },
            { text: "Prueba de hermeticidad DS66 solicitada en La Reina", time: "Hace 27 minutos" },
            { text: "Urgencia por fuga de gas atendida en Ñuñoa", time: "Hace 34 minutos" },
            { text: "Visita de sellado en cañería agendada en Rancagua", time: "Hace 46 minutos" },
            { text: "Certificado SEC entregado en Viña del Mar", time: "Hace 58 minutos" },
            { text: "Sellado Prodoral R6-1 finalizado en Lo Barnechea", time: "Hace 1 hora" },
            { text: "Cotización de sellado realizada en Peñalolén", time: "Hace 1 hora" },
            { text: "Inspección y sellado de gas agendado en Maipú", time: "Hace 1 hora" },
            { text: "Certificado de servicio emitido en La Florida", time: "Hace 2 horas" }
        ];

        let toastIndex = 0;
        const toastEl = document.getElementById('fomoToast');
        const textEl = document.getElementById('fomoText');
        const timeEl = document.getElementById('fomoTime');

        if (!toastEl || !textEl || !timeEl) return;

        function showNextToast() {
            const ev = fomoEvents[toastIndex % fomoEvents.length];
            textEl.innerText = ev.text;
            timeEl.innerHTML = `<svg class="w-3 h-3 text-emerald-400 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> <span>${ev.time}</span>`;
            
            toastEl.classList.remove('translate-y-24', 'opacity-0');
            toastEl.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                toastEl.classList.remove('translate-y-0', 'opacity-100');
                toastEl.classList.add('translate-y-24', 'opacity-0');
            }, 4500);

            toastIndex++;
        }

        setTimeout(() => {
            showNextToast();
            setInterval(showNextToast, 9500);
        }, 3500);

        // 3. Mouse Follower Neon Spotlight Engine (Desktop & Laptop)
        const spotlight = document.getElementById('mouseGlowSpotlight');
        if (spotlight && window.innerWidth >= 768) {
            let mouseX = window.innerWidth / 2;
            let mouseY = window.innerHeight / 2;
            let currentX = mouseX;
            let currentY = mouseY;
            let isMoving = false;

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
                if (!isMoving) {
                    isMoving = true;
                    spotlight.style.opacity = '1';
                    requestAnimationFrame(animateSpotlight);
                }
            }, { passive: true });

            function animateSpotlight() {
                // Physics interpolation for smooth liquid trailing
                currentX += (mouseX - currentX) * 0.12;
                currentY += (mouseY - currentY) * 0.12;

                spotlight.style.transform = `translate3d(${currentX}px, ${currentY}px, 0) translate(-50%, -50%)`;

                if (Math.abs(mouseX - currentX) > 0.1 || Math.abs(mouseY - currentY) > 0.1) {
                    requestAnimationFrame(animateSpotlight);
                } else {
                    isMoving = false;
                }
            }

            document.addEventListener('mouseleave', () => {
                spotlight.style.opacity = '0';
            });
        }
    });
</script>
