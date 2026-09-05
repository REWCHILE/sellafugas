<!DOCTYPE html>
<html lang="es" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('partials.meta-tags', [
        'metaTitle' => $metaTitle,
        'metaDescription' => $metaDescription,
        'canonicalUrl' => $canonicalUrl
    ])

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Local High-Performance Fonts Preload (0ms 3rd-party latency, zero FOUT/CLS) -->
    <link rel="preload" href="{{ asset('fonts/plus-jakarta-sans.woff2') }}" as="font" type="font/woff2" crossorigin>

    <!-- Core Local Stylesheet (Tailwind CSS + Embedded Self-Hosted Fonts) -->
    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}">

    <!-- Animations Stylesheet (Non-Render-Blocking) -->
    <link rel="preload" href="{{ asset('css/animations.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('css/animations.css') }}"></noscript>

    <!-- Local High-Performance Lucide Icons & Alpine.js -->
    <script defer src="{{ asset('js/alpine.min.js') }}"></script>
    <script defer src="{{ asset('js/lucide.min.js') }}"></script>
    <script>
        window.addEventListener('load', function() {
            if (window.requestIdleCallback) {
                requestIdleCallback(function() { if (window.lucide) lucide.createIcons(); });
            } else {
                setTimeout(function() { if (window.lucide) lucide.createIcons(); }, 30);
            }
        }, { once: true });
    </script>

    <style>
        [x-cloak] { display: none !important; }
        .glass-header {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>

    <!-- Schema.org JSON-LD Service -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Service",
      "name": "Detección de Fugas con Gas Trazador (Nitrógeno/Hidrógeno)",
      "serviceType": "Tracer Gas Leak Detection",
      "provider": {
        "@@type": "HVACBusiness",
        "name": "SellafuGas® Domingo Isain",
        "telephone": "+56949877316",
        "url": "https://sellafugas.cl/gas-trazador"
      },
      "areaServed": ["Santiago", "Las Condes", "Vitacura", "Providencia", "Lo Barnechea", "La Reina", "Ñuñoa", "Peñalolén", "Chicureo", "Valparaíso", "Rancagua"]
    }
    </script>

    <!-- Schema.org FAQPage (10 FAQs Reales) -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "FAQPage",
      "mainEntity": [
        {
          "@@type": "Question",
          "name": "¿Qué es el Gas Trazador y cómo funciona para detectar fugas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "El gas trazador es una mezcla certificada no inflamable ni tóxica compuesta por un 95% de Nitrógeno (N2) y un 5% de Hidrógeno (H2) llamada Formiergas. Se inyecta en la cañería aislada; debido a que las moléculas de hidrógeno son las más pequeñas de la naturaleza, escapan rápidamente por el poro de la fuga y ascienden verticalmente a través del hormigón, radier, asfalto o tierra, donde son detectadas por sensores electrónicos de alta sensibilidad en partes por millón (PPM)."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Es seguro el gas trazador para la salud y las instalaciones?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Completamente seguro. No es tóxico, no es inflamable ni corrosivo y no altera la potabilidad del agua ni deja residuos en las cañerías."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué tipos de redes se pueden inspeccionar con gas trazador?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Se utiliza con éxito en redes de gas licuado y natural, cañerías de agua potable fría y caliente, circuitos de calefacción por radiadores o losa radiante, y redes contra incendios."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué profundidad de enterramiento puede atravesar el gas trazador?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Puede atravesar radieres de hormigón armado, baldosas, porcelanatos, capas de asfalto y terrenos con profundidades de hasta 2 a 3 metros sin necesidad de romper antes de marcar el punto."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué precisión tiene la localización de la fuga?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "La precisión es milimétrica, marcando exactamente sobre la superficie la zona de mayor concentración en PPM para realizar una intervención puntual de mínima invasión."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuánto tiempo dura una inspección con gas trazador?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "En una vivienda particular o departamento, la prueba dura entre 1 y 2 horas, entregando el diagnóstico exacto al momento."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué diferencia hay entre el gas trazador y el geófono?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "El geófono capta el sonido de escape de agua a alta presión, lo cual puede ser difícil con fugas pequeñas o cañerías plásticas silenciosas. El gas trazador no depende del sonido, sino del paso químico del hidrógeno, detectando microporosidades microscópicas donde el geófono no escucha."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Se entrega informe técnico tras la detección?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Entregamos un informe técnico detallado con fotografías, mediciones en PPM y la ubicación exacta de la fuga, válido para seguros y empresas sanitarias."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Ustedes mismos reparan la fuga una vez detectada?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Si es red de gas, la sellamos con Prodoral R6-1 sin romper; y si es agua potable, ejecutamos la reparación puntual con garantía directa."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo solicitar una inspección con gas trazador?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Puede contactarnos directamente al teléfono / WhatsApp +56 9 4987 7316 para coordinar una visita técnica inmediata en toda la Región Metropolitana y regiones."
          }
        }
      ]
    }
    </script>
</head>
<body class="bg-slate-950 text-slate-100 antialiased selection:bg-brand-500 selection:text-white overflow-x-hidden"
      x-data="{
          nombre: '',
          telefono: '',
          comuna: 'Las Condes',
          tipoRed: 'Red de Agua Potable Subterránea',
          openFaq: null,
          submitTracer() {
              if(!this.nombre || !this.telefono) {
                  alert('Por favor ingrese su Nombre y Teléfono');
                  return;
              }
              const text = `Hola Domingo Isain (SellafuGas), solicito cotización para Detección con Gas Trazador:\n\n👤 *Nombre:* ${this.nombre}\n📱 *Teléfono:* ${this.telefono}\n📍 *Comuna:* ${this.comuna}\n🔍 *Tipo de Red:* ${this.tipoRed}`;
              window.open(`https://api.whatsapp.com/send?phone=56949877316&text=${encodeURIComponent(text)}`, '_blank');
          }
      }">

    <!-- Top Header Partial -->
    @include('partials.landing-header')

    <main id="main-content" class="overflow-x-hidden">

    <!-- Hero Section -->
    <section class="py-16 bg-radial from-slate-900 to-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-300 text-xs font-bold uppercase tracking-wider">
                        <span>Precisión Milimétrica No Invasiva</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        Detección de Fugas con <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-sky-300 to-emerald-400">Gas Trazador</span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                        El método más avanzado y preciso del mundo para ubicar fugas ocultas bajo radier, losas de hormigón, jardines o muros. Inyectamos una mezcla inocua y no inflamable de <strong>Nitrógeno (95%) e Hidrógeno (5%) Formiergas</strong> que atraviesa cualquier superficie para ser detectada en la superficie exacta con sensores electrónicos en PPM.
                    </p>

                    <!-- Technical Highlights -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-cyan-400 shrink-0"></i>
                            <span><strong>No es tóxico</strong> ni inflamable (Formiergas)</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-cyan-400 shrink-0"></i>
                            <span><strong>Atraviesa radier</strong>, cerámicas y tierra</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-cyan-400 shrink-0"></i>
                            <span><strong>Punto exacto</strong> para no picar a ciegas</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-cyan-400 shrink-0"></i>
                            <span><strong>Para redes de gas</strong>, agua y calefacción</span>
                        </div>
                    </div>

                    <!-- Fast Contact Card -->
                    <div class="glass-card p-6 rounded-3xl border border-slate-700 space-y-4 pt-4">
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Cotizar Servicio de Detección con Gas Trazador:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <input type="text" placeholder="Su Nombre *" x-model="nombre"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-cyan-500">
                            <input type="tel" placeholder="Teléfono *" x-model="telefono"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-cyan-500">
                            <input type="text" placeholder="Comuna *" x-model="comuna"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-cyan-500">
                        </div>

                        <button type="button" @click="submitTracer()"
                                class="w-full py-4 bg-gradient-to-r from-cyan-500 via-sky-500 to-emerald-500 hover:from-cyan-400 hover:to-emerald-400 text-slate-950 font-black text-base rounded-xl shadow-xl shadow-cyan-500/25 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="send" class="w-5 h-5"></i>
                            <span>Agendar Detección con Domingo Isain por WhatsApp</span>
                        </button>
                    </div>

                </div>

                <div class="lg:col-span-5 space-y-6">
                    <div class="glass-card p-4 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/gas-trazador-deteccion.png') }}" alt="Equipo Detector de Gas Trazador" class="w-full h-80 object-cover rounded-2xl">
                        <div class="p-4 space-y-2">
                            <span class="text-xs font-bold text-cyan-400 uppercase tracking-wider block">Equipamiento Electroacústico y Sensorial</span>
                            <h3 class="text-lg font-bold text-white">Sensor Digital de Hidrógeno (PPM)</h3>
                            <p class="text-xs text-slate-300">Localiza la fuga más minúscula sin importar la profundidad ni el material de la tubería (cobre, PEX, acero, PVC o polietileno).</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION: DOMINGO ISAIN CERTIFICATIONS & CREDENTIALS -->
    @include('partials.certificates-section')

    <!-- 10 Visible FAQs Section -->
    <section id="faq" class="py-16 bg-slate-900/60 border-t border-slate-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            <div class="text-center mb-8">
                <span class="text-xs font-bold text-cyan-400 uppercase tracking-widest block mb-2">Tecnología y Diagnóstico</span>
                <h2 class="text-3xl font-black text-white">10 Preguntas Frecuentes sobre Gas Trazador</h2>
                <p class="text-xs text-slate-400 mt-1">Conoce cómo localizamos filtraciones ocultas sin destruir pisos ni muros</p>
            </div>

            <!-- FAQ 1 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 1 ? null : 1)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>1. ¿Qué es el Gas Trazador y cómo funciona para detectar fugas?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-cyan-400 transition-transform" :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 1" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    El gas trazador es una mezcla certificada no inflamable ni tóxica compuesta por un 95% de Nitrógeno (N2) y un 5% de Hidrógeno (H2) llamada Formiergas. Se inyecta en la cañería aislada; debido a que las moléculas de hidrógeno son las más pequeñas de la naturaleza, escapan rápidamente por el poro de la fuga y ascienden verticalmente a través del hormigón, radier, asfalto o tierra, donde son detectadas por sensores electrónicos de alta sensibilidad en partes por millón (PPM).
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 2 ? null : 2)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>2. ¿Es seguro el gas trazador para la salud y las instalaciones?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-cyan-400 transition-transform" :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 2" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Completamente seguro. No es tóxico, no es inflamable ni corrosivo y no altera la potabilidad del agua ni deja residuos en las cañerías.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 3 ? null : 3)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>3. ¿Qué tipos de redes se pueden inspeccionar con gas trazador?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-cyan-400 transition-transform" :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 3" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Se utiliza con éxito en redes de gas licuado y natural, cañerías de agua potable fría y caliente, circuitos de calefacción por radiadores o losa radiante, y redes contra incendios.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 4 ? null : 4)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>4. ¿Qué profundidad de enterramiento puede atravesar el gas trazador?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-cyan-400 transition-transform" :class="openFaq === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 4" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Puede atravesar radieres de hormigón armado, baldosas, porcelanatos, capas de asfalto y terrenos con profundidades de hasta 2 a 3 metros sin necesidad de romper antes de marcar el punto.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 5 ? null : 5)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>5. ¿Qué precisión tiene la localización de la fuga?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-cyan-400 transition-transform" :class="openFaq === 5 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 5" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    La precisión es milimétrica, marcando exactamente sobre la superficie la zona de mayor concentración en PPM para realizar una intervención puntual de mínima invasión.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 6 ? null : 6)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>6. ¿Cuánto tiempo dura una inspección con gas trazador?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-cyan-400 transition-transform" :class="openFaq === 6 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 6" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    En una vivienda particular o departamento, la prueba dura entre 1 y 2 horas, entregando el diagnóstico exacto al momento.
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 7 ? null : 7)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>7. ¿Qué diferencia hay entre el gas trazador y el geófono?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-cyan-400 transition-transform" :class="openFaq === 7 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 7" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    El geófono capta el sonido de escape de agua a alta presión, lo cual puede ser difícil con fugas pequeñas o cañerías plásticas silenciosas. El gas trazador no depende del sonido, sino del paso químico del hidrógeno, detectando microporosidades microscópicas donde el geófono no escucha.
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 8 ? null : 8)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>8. ¿Se entrega informe técnico tras la detección?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-cyan-400 transition-transform" :class="openFaq === 8 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 8" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Entregamos un informe técnico detallado con fotografías, mediciones en PPM y la ubicación exacta de la fuga, válido para seguros y empresas sanitarias.
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 9 ? null : 9)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>9. ¿Ustedes mismos reparan la fuga una vez detectada?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-cyan-400 transition-transform" :class="openFaq === 9 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 9" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Si es red de gas, la sellamos con Prodoral R6-1 sin romper; y si es agua potable, ejecutamos la reparación puntual con garantía directa.
                </div>
            </div>

            <!-- FAQ 10 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 10 ? null : 10)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>10. ¿Cómo solicitar una inspección con gas trazador?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-cyan-400 transition-transform" :class="openFaq === 10 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 10" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Puede contactarnos directamente al teléfono / WhatsApp +56 9 4987 7316 para coordinar una visita técnica inmediata en toda la Región Metropolitana y regiones.
                </div>
            </div>

        </div>
    </section>

    </main>

    <!-- Footer Partial -->
    @include('partials.landing-footer')

    <!-- Floating Widgets & FOMO System -->
    @include('partials.floating-widgets')
</body>
</html>
