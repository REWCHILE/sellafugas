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

    <!-- Critical Compiled Tailwind CSS Stylesheet (Inlined for Instant 0ms Render Blocking on Mobile) -->
    <style>
        {!! \Illuminate\Support\Facades\File::exists(public_path('css/tailwind.min.css')) ? \Illuminate\Support\Facades\File::get(public_path('css/tailwind.min.css')) : '' !!}
    </style>

    <!-- Google Fonts (Non-Render-Blocking, Zero CLS Font Loading) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=optional" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=optional"></noscript>

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

    <!-- Schema.org JSON-LD HVACBusiness -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "HVACBusiness",
      "name": "Reparación y Mantenimiento de Calefont Gasfíter SEC Domingo Isain",
      "serviceType": "Water Heater and Boiler Repair SEC",
      "provider": {
        "@@type": "Plumber",
        "name": "Domingo Isain Plaza Caamaño",
        "telephone": "+56949877316",
        "url": "https://sellafugas.cl/reparacion-calefont-sec"
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
          "name": "¿Qué marcas y tipos de calefont atienden?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Atendemos todas las marcas líderes del mercado chileno: Splendid, Junkers, Mademsa, Neckar, Trotter, Rheem, Bosch y Albin Trotter, en versiones de tiro natural, tiro forzado de cámara abierta y cámara estanca ionizados."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Por qué mi calefont se apaga solo al mezclar con agua fría?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Suele deberse a pérdida de caudal de agua, membrana o diafragma gastado, serpentín calcificado con sarro o falla en el sensor de ionización o termostato de sobrecalentamiento."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Es peligroso sentir olor a gas cerca del calefont?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí, es una situación crítica. Debe cerrar la llave de paso de gas inmediatamente, ventilar el recinto y solicitar una inspección técnica con manómetro digital de un gasfíter autorizado SEC."
          }
        },
        {
          "@@type": "Question",
          "name": "¿El servicio incluye mantención preventiva completa del calefont?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Incluye limpieza profunda de quemadores e inyectores, descalcificación de serpentín, cambio de membrana y orings, revisión de ducto de evacuación de gases y prueba de hermeticidad de gas."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Domingo Isain entrega certificado SEC por la instalación de calefont?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Como Gasfiter Instalador Autorizado SEC Clase 3 (RUT 12.738.961-6), emite el Certificado Oficial de Instalación y Hermeticidad bajo norma DS66."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Realizan conversión de gas natural a gas licuado (o viceversa) en calefones?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Realizamos el cambio de inyectores calibrados y ajuste de presión de quemador según las especificaciones técnicas del fabricante."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuánto demora una reparación o instalación de calefont a domicilio?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Una mantención o reparación dura entre 45 y 90 minutos en terreno, con repuestos originales."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué garantía tienen las reparaciones de calefont?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Entregamos garantía técnica por escrito sobre repuestos instalados y mano de obra profesional."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Atienden urgencias de calefont sin agua caliente en el día?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Contamos con atención prioritaria el mismo día para solucionar urgencias de agua caliente en toda la Región Metropolitana."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo agendar una visita técnica para mi calefont?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Escríbanos directamente al WhatsApp +56 9 4987 7316 indicando la marca y los litros de su calefont para agendar de inmediato."
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
          marcaCalefont: 'Splendid / Junkers',
          openFaq: null,
          submitCalefont() {
              if(!this.nombre || !this.telefono) {
                  alert('Por favor ingrese su Nombre y Teléfono');
                  return;
              }
              const text = `Hola Domingo Isain (Gasfiter SEC), necesito servicio para mi CALEFONT:\n\n👤 *Nombre:* ${this.nombre}\n📱 *Teléfono:* ${this.telefono}\n📍 *Comuna:* ${this.comuna}\n🔥 *Marca / Modelo:* ${this.marcaCalefont}`;
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
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/30 text-amber-300 text-xs font-bold uppercase tracking-wider">
                        <span>Servicio Técnico Autorizado SEC Clase 3</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        Reparación y Mantención de <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-orange-300 to-emerald-400">Calefont SEC a Domicilio</span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                        Servicio profesional en terreno por <strong>Domingo Isain Plaza Caamaño (RUT 12.738.961-6)</strong>. Reparación, descalcificación de serpentín, cambio de membranas, instalación normada de tiro forzado y certificación SEC de calefones a gas en Santiago.
                    </p>

                    <!-- Feature Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-amber-400 shrink-0"></i>
                            <span><strong>Todas las marcas:</strong> Splendid, Junkers, Trotter</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-amber-400 shrink-0"></i>
                            <span><strong>Prueba de Gas:</strong> Hermeticidad manométrica</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-amber-400 shrink-0"></i>
                            <span><strong>Repuestos Originales:</strong> Con garantía escrita</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-amber-400 shrink-0"></i>
                            <span><strong>Certificado SEC:</strong> Validez legal DS66</span>
                        </div>
                    </div>

                    <!-- Fast Contact Card -->
                    <div class="glass-card p-6 rounded-3xl border border-slate-700 space-y-4 pt-4">
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Solicitar Atención Técnica para Calefont:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <input type="text" placeholder="Su Nombre *" x-model="nombre"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-amber-500">
                            <input type="tel" placeholder="Teléfono *" x-model="telefono"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-amber-500">
                            <input type="text" placeholder="Comuna *" x-model="comuna"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-amber-500">
                        </div>

                        <button type="button" @click="submitCalefont()"
                                class="w-full py-4 bg-gradient-to-r from-amber-500 via-orange-500 to-sky-500 hover:from-amber-400 hover:to-sky-400 text-slate-950 font-black text-base rounded-xl shadow-xl shadow-amber-500/25 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="wrench" class="w-5 h-5"></i>
                            <span>Agendar Reparación de Calefont por WhatsApp</span>
                        </button>
                    </div>

                </div>

                <div class="lg:col-span-5 space-y-6">
                    <div class="glass-card p-4 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/reparacion-calefont-sec.png') }}" alt="Mantenimiento Calefont SEC" class="w-full h-80 object-cover rounded-2xl">
                        <div class="p-4 space-y-2">
                            <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block">Técnico Autorizado SEC</span>
                            <h3 class="text-lg font-bold text-white">Seguridad y Eficiencia Térmica</h3>
                            <p class="text-xs text-slate-300">Aseguramos la correcta combustión y evacuación de monóxido de carbono para proteger a tu familia.</p>
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
                <span class="text-xs font-bold text-amber-400 uppercase tracking-widest block mb-2">Preguntas Frecuentes</span>
                <h2 class="text-3xl font-black text-white">10 Preguntas Frecuentes sobre Calefones a Gas SEC</h2>
                <p class="text-xs text-slate-400 mt-1">Soluciones rápidas a fallas comunes de encendido, presión y temperatura</p>
            </div>

            <!-- FAQ 1 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 1 ? null : 1)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>1. ¿Qué marcas y tipos de calefont atienden?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 1" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Atendemos todas las marcas líderes del mercado chileno: Splendid, Junkers, Mademsa, Neckar, Trotter, Rheem, Bosch y Albin Trotter, en versiones de tiro natural, tiro forzado de cámara abierta y cámara estanca ionizados.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 2 ? null : 2)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>2. ¿Por qué mi calefont se apaga solo al mezclar con agua fría?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 2" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Suele deberse a pérdida de caudal de agua, membrana o diafragma gastado, serpentín calcificado con sarro o falla en el sensor de ionización o termostato de sobrecalentamiento.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 3 ? null : 3)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>3. ¿Es peligroso sentir olor a gas cerca del calefont?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 3" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí, es una situación crítica. Debe cerrar la llave de paso de gas inmediatamente, ventilar el recinto y solicitar una inspección técnica con manómetro digital de un gasfíter autorizado SEC.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 4 ? null : 4)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>4. ¿El servicio incluye mantención preventiva completa del calefont?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 4" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Incluye limpieza profunda de quemadores e inyectores, descalcificación de serpentín, cambio de membrana y orings, revisión de ducto de evacuación de gases y prueba de hermeticidad de gas.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 5 ? null : 5)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>5. ¿Domingo Isain entrega certificado SEC por la instalación de calefont?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 5 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 5" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Como Gasfiter Instalador Autorizado SEC Clase 3 (RUT 12.738.961-6), emite el Certificado Oficial de Instalación y Hermeticidad bajo norma DS66.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 6 ? null : 6)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>6. ¿Realizan conversión de gas natural a gas licuado (o viceversa) en calefones?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 6 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 6" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Realizamos el cambio de inyectores calibrados y ajuste de presión de quemador según las especificaciones técnicas del fabricante.
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 7 ? null : 7)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>7. ¿Cuánto demora una reparación o instalación de calefont a domicilio?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 7 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 7" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Una mantención o reparación dura entre 45 y 90 minutos en terreno, con repuestos originales.
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 8 ? null : 8)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>8. ¿Qué garantía tienen las reparaciones de calefont?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 8 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 8" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Entregamos garantía técnica por escrito sobre repuestos instalados y mano de obra profesional.
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 9 ? null : 9)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>9. ¿Atienden urgencias de calefont sin agua caliente en el día?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 9 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 9" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Contamos con atención prioritaria el mismo día para solucionar urgencias de agua caliente en toda la Región Metropolitana.
                </div>
            </div>

            <!-- FAQ 10 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 10 ? null : 10)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>10. ¿Cómo agendar una visita técnica para mi calefont?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 10 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 10" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Escríbanos directamente al WhatsApp +56 9 4987 7316 indicando la marca y los litros de su calefont para agendar de inmediato.
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
