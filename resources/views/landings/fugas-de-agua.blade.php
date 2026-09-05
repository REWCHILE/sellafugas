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

    <!-- Schema.org JSON-LD PlumbingService -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "PlumbingService",
      "name": "Detección y Reparación de Fugas de Agua Potable Sin Romper",
      "serviceType": "Water Leak Detection and Repair",
      "provider": {
        "@@type": "Plumber",
        "name": "SellafuGas® Domingo Isain",
        "telephone": "+56949877316",
        "url": "https://sellafugas.cl/fugas-de-agua"
      },
      "areaServed": ["Santiago", "Las Condes", "Vitacura", "Providencia", "Lo Barnechea", "La Reina", "Ñuñoa", "La Florida", "Chicureo", "Valparaíso", "Rancagua"]
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
          "name": "¿Cómo saber si tengo una fuga de agua oculta en mi casa o departamento?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Los principales indicios son: aumento repentino e injustificado en la cuenta del agua, el medidor gira cuando todas las llaves están cerradas, presencia de manchas de humedad o eflorescencias de salitre en muros y zoclos, y baja de presión en duchas."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué tecnología se utiliza para detectar fugas de agua sin romper?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Utilizamos Geófonos Electroacústicos de Suelo con amplificación sónica digital de alta ganancia, Gas Trazador (Formiergas N2/H2 95/5) para microporosidades y Cámaras Termográficas Infrarrojas para tuberías de agua caliente y losa radiante."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Es necesario romper pisos para encontrar la fuga?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "No. La detección es 100% no destructiva. Escuchamos y rastreamos desde la superficie del radier, cerámica, piso flotante o pasto, marcando el punto exacto para que la eventual reparación sea minúscula."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuánto tiempo toma una inspección de fuga de agua?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Una inspección residencial promedio toma entre 1 y 2 horas, entregando al cliente el diagnóstico inmediato en terreno."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Entregan informe técnico para rebaja de cuenta en Aguas Andinas o cobro de seguros?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Emitimos un Informe Técnico Oficial de Detección y Reparación de Fuga No Visible con respaldo fotográfico, mediciones y firma profesional, válido para tramitar solicitudes de refacturación por sobreconsumo ante empresas sanitarias y aseguradoras."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Detectan fugas en redes de agua caliente y calefacción?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Inspeccionamos circuitos de agua fría, agua caliente sanitaria (cobre y PEX), y sistemas de calefacción central (radiadores y losa radiante)."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Realizan la reparación una vez ubicada la fuga de agua?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Contamos con gasfíteres profesionales para realizar la apertura milimétrica, reparación de la tubería, prueba de estanqueidad y reposición prolija."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué cobertura tienen en la Región Metropolitana y otras zonas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Cubrimos todas las comunas del Gran Santiago (Sector Oriente, Poniente, Norte y Sur), Chicureo, Colina, además de Valparaíso, Viña del Mar y Rancagua."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué garantía tienen los trabajos de detección y reparación?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Garantizamos la exactitud de la detección y entregamos garantía por escrito en todas las reparaciones ejecutadas."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo agendar una visita de emergencia por filtración de agua?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Comuníquese al WhatsApp +56 9 4987 7316 indicando su comuna y síntomas para coordinar una visita técnica en el día."
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
          tipoInmueble: 'Casa Particular',
          openFaq: null,
          submitAgua() {
              if(!this.nombre || !this.telefono) {
                  alert('Por favor ingrese su Nombre y Teléfono');
                  return;
              }
              const text = `Hola Domingo Isain (SellafuGas), tengo una fuga de agua potable y necesito detección con Geófono / Reparación:\n\n👤 *Nombre:* ${this.nombre}\n📱 *Teléfono:* ${this.telefono}\n📍 *Comuna:* ${this.comuna}\n🏠 *Tipo de Inmueble:* ${this.tipoInmueble}`;
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
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/30 text-blue-300 text-xs font-bold uppercase tracking-wider">
                        <span>Tecnología Acústica Geófono & Ultrasonido</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        Detección de Fugas de Agua <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-sky-300 to-teal-300">Sin Romper el Piso</span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                        ¿Tu cuenta de agua subió misteriosamente, el medidor gira solo o tienes humedad en muros? Localizamos la filtración invisible exacta bajo radier, baldosas o pasto mediante <strong>Geófonos Electroacústicos de Alta Sensibilidad y Termografía Digital</strong>.
                    </p>

                    <!-- Feature Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-sky-400 shrink-0"></i>
                            <span><strong>Geófono Digital</strong> con amplificación sónica</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-sky-400 shrink-0"></i>
                            <span><strong>Cámaras Termográficas</strong> infrarrojas</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-sky-400 shrink-0"></i>
                            <span><strong>Reparación puntual</strong> sin destrozos</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-sky-400 shrink-0"></i>
                            <span><strong>Informe técnico</strong> para Aguas Andinas / Seguros</span>
                        </div>
                    </div>

                    <!-- Fast Contact Card -->
                    <div class="glass-card p-6 rounded-3xl border border-slate-700 space-y-4 pt-4">
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Agendar Detección de Fuga de Agua:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <input type="text" placeholder="Su Nombre *" x-model="nombre"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                            <input type="tel" placeholder="Teléfono *" x-model="telefono"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                            <input type="text" placeholder="Comuna *" x-model="comuna"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                        </div>

                        <button type="button" @click="submitAgua()"
                                class="w-full py-4 bg-gradient-to-r from-blue-500 via-sky-500 to-emerald-500 hover:from-blue-400 hover:to-emerald-400 text-slate-950 font-black text-base rounded-xl shadow-xl shadow-blue-500/25 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="search" class="w-5 h-5"></i>
                            <span>Solicitar Detección con Geófono por WhatsApp</span>
                        </button>
                    </div>

                </div>

                <div class="lg:col-span-5 space-y-6">
                    <div class="glass-card p-4 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/geofono-deteccion-agua.png') }}" alt="Geófono para detección de fugas de agua" class="w-full h-80 object-cover rounded-2xl">
                        <div class="p-4 space-y-2">
                            <span class="text-xs font-bold text-sky-400 uppercase tracking-wider block">Inspección Acústica Profesional</span>
                            <h3 class="text-lg font-bold text-white">Geófono de Suelo Electroacústico</h3>
                            <p class="text-xs text-slate-300">Detecta la frecuencia sonora que genera el escape de agua a presión bajo radier, baldosas o tierra con exactitud.</p>
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
                <span class="text-xs font-bold text-blue-400 uppercase tracking-widest block mb-2">Preguntas y Respuestas</span>
                <h2 class="text-3xl font-black text-white">10 Preguntas Frecuentes sobre Fugas de Agua Potable</h2>
                <p class="text-xs text-slate-400 mt-1">Conoce cómo evitar daños estructurales y sobreconsumos en tu cuenta de agua</p>
            </div>

            <!-- FAQ 1 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 1 ? null : 1)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>1. ¿Cómo saber si tengo una fuga de agua oculta en mi casa o departamento?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-blue-400 transition-transform" :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 1" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Los principales indicios son: aumento repentino e injustificado en la cuenta del agua, el medidor gira cuando todas las llaves están cerradas, presencia de manchas de humedad o eflorescencias de salitre en muros y zoclos, y baja de presión en duchas.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 2 ? null : 2)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>2. ¿Qué tecnología se utiliza para detectar fugas de agua sin romper?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-blue-400 transition-transform" :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 2" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Utilizamos Geófonos Electroacústicos de Suelo con amplificación sónica digital de alta ganancia, Gas Trazador (Formiergas N2/H2 95/5) para microporosidades y Cámaras Termográficas Infrarrojas para tuberías de agua caliente y losa radiante.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 3 ? null : 3)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>3. ¿Es necesario romper pisos para encontrar la fuga?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-blue-400 transition-transform" :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 3" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    No. La detección es 100% no destructiva. Escuchamos y rastreamos desde la superficie del radier, cerámica, piso flotante o pasto, marcando el punto exacto para que la eventual reparación sea minúscula.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 4 ? null : 4)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>4. ¿Cuánto tiempo toma una inspección de fuga de agua?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-blue-400 transition-transform" :class="openFaq === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 4" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Una inspección residencial promedio toma entre 1 y 2 horas, entregando al cliente el diagnóstico inmediato en terreno.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 5 ? null : 5)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>5. ¿Entregan informe técnico para rebaja de cuenta en Aguas Andinas o cobro de seguros?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-blue-400 transition-transform" :class="openFaq === 5 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 5" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Emitimos un Informe Técnico Oficial de Detección y Reparación de Fuga No Visible con respaldo fotográfico, mediciones y firma profesional, válido para tramitar solicitudes de refacturación por sobreconsumo ante empresas sanitarias y aseguradoras.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 6 ? null : 6)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>6. ¿Detectan fugas en redes de agua caliente y calefacción?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-blue-400 transition-transform" :class="openFaq === 6 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 6" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Inspeccionamos circuitos de agua fría, agua caliente sanitaria (cobre y PEX), y sistemas de calefacción central (radiadores y losa radiante).
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 7 ? null : 7)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>7. ¿Realizan la reparación una vez ubicada la fuga de agua?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-blue-400 transition-transform" :class="openFaq === 7 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 7" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Contamos con gasfíteres profesionales para realizar la apertura milimétrica, reparación de la tubería, prueba de estanqueidad y reposición prolija.
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 8 ? null : 8)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>8. ¿Qué cobertura tienen en la Región Metropolitana y otras zonas?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-blue-400 transition-transform" :class="openFaq === 8 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 8" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Cubrimos todas las comunas del Gran Santiago (Sector Oriente, Poniente, Norte y Sur), Chicureo, Colina, además de Valparaíso, Viña del Mar y Rancagua.
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 9 ? null : 9)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>9. ¿Qué garantía tienen los trabajos de detección y reparación?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-blue-400 transition-transform" :class="openFaq === 9 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 9" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Garantizamos la exactitud de la detección y entregamos garantía por escrito en todas las reparaciones ejecutadas.
                </div>
            </div>

            <!-- FAQ 10 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 10 ? null : 10)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>10. ¿Cómo agendar una visita de emergencia por filtración de agua?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-blue-400 transition-transform" :class="openFaq === 10 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 10" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Comuníquese al WhatsApp +56 9 4987 7316 indicando su comuna y síntomas para coordinar una visita técnica en el día.
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
