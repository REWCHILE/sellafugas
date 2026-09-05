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

    <!-- Inline Critical Core Stylesheet (Zero Render-Blocking Requests, Instant Paint) -->
    @include('partials.inline-css')

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

    <!-- Schema.org JSON-LD AboutPage & Organization -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "AboutPage",
      "mainEntity": {
        "@@type": "Organization",
        "name": "SellafuGas® Chile",
        "founder": {
          "@@type": "Person",
          "name": "Domingo Isain Plaza Caamaño",
          "jobTitle": "Gasfíter Instalador Autorizado SEC Clase 3",
          "taxID": "12.738.961-6"
        },
        "telephone": "+56949877316",
        "url": "https://sellafugas.cl/nosotros"
      }
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
          "name": "¿Quién es Domingo Isain Plaza Caamaño y cuál es su acreditación?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Domingo Isain Plaza Caamaño (RUT 12.738.961-6) es Instalador y Gasfiter Autorizado por la Superintendencia de Electricidad y Combustibles (SEC) con Licencia Clase 3 vigente, con más de 15 años de trayectoria especializada en ingeniería de gas y sellado no destructivo."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué es SellafuGas® y cuál es su misión?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "SellafuGas® es la empresa líder en Chile especializada en la detección y sellado de fugas de gas y agua sin demolición, implementando tecnologías europeas como Prodoral R6-1, gas trazador e hidrófonos acústicos."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Por qué SellafuGas® aplica la política 'Usted Paga Después de Solucionado'?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Porque confiamos 100% en la precisión de nuestros equipos de diagnóstico y en la eficacia del sellado polimérico alemán. El cliente solo cancela el trabajo una vez verificada la total hermeticidad de la red con manómetro digital."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué garantía formal entregan en cada trabajo?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Entregamos un Certificado Oficial firmado y timbrado con 3 años de garantía por escrito en sellados Prodoral R6-1 y respaldo técnico bajo normativa DS66."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué tipo de equipamiento técnico utiliza SellafuGas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Utilizamos manómetros digitales diferenciales de alta sensibilidad, detectores electroacústicos Sewerin, equipos de gas trazador de Formiergas (N2/H2), cámaras termográficas Fluke e hidrófonos subacuáticos."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Los certificados emitidos son válidos para Metrogas, Lipigas, Abastible y Gasco?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Todos los certificados emitidos por Domingo Isain cuentan con código QR de verificación oficial ante la SEC y son aceptados por todas las distribuidoras de gas e inspectores de Sello Verde."
          }
        },
        {
          "@@type": "Question",
          "name": "¿En qué comunas y regiones tienen cobertura?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Cubrimos la totalidad de la Región Metropolitana (Las Condes, Vitacura, Providencia, Lo Barnechea, Chicureo, Santiago Centro, Ñuñoa, Maipú, La Florida, etc.), así como la V Región de Valparaíso y VI Región de O'Higgins."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Atienden emergencias de gas fuera de horario laboral?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Contamos con turnos de atención técnica de urgencia de lunes a domingo para solucionar cortes de medidor, fugas activas y sellos rojos críticos."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué medios de pago aceptan?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Aceptamos transferencia electrónica, tarjetas de débito (Redcompra) y tarjetas de crédito con opción de cuotas. Emitimos boleta o factura exenta/afecta según requerimiento del cliente."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo puedo verificar la licencia SEC de Domingo Isain?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Puede escanear el código QR presente en nuestra web o en su credencial de instalador, el cual enlaza directamente al Registro Público de Instaladores Autorizados de la Superintendencia de Electricidad y Combustibles (SEC)."
          }
        }
      ]
    }
    </script>
</head>
<body class="bg-slate-950 text-slate-100 antialiased selection:bg-brand-500 selection:text-white overflow-x-hidden"
      x-data="{
          mobileNav: false,
          megaMenuNav: false,
          openFaq: null
      }">

    <!-- Top Header Partial -->
    @include('partials.landing-header')

    <main id="main-content" class="overflow-x-hidden">

    <!-- Hero Section Nosotros -->
    <section class="py-16 bg-radial from-slate-900 to-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-7 space-y-6">
                    <div data-animate="fade-down" data-delay="100" class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-500/10 border border-sky-500/30 text-sky-300 text-xs font-bold uppercase tracking-wider">
                        <span>Ingeniería y Seguridad en Gas desde 2009</span>
                    </div>

                    <h1 data-animate="fade-up" data-delay="150" class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        Líderes en Sellado y Detección <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-emerald-400 to-teal-300">Sin Demolición</span>
                    </h1>

                    <p data-animate="fade-up" data-delay="200" class="text-base sm:text-lg text-slate-300 leading-relaxed">
                        En <strong>SellafuGas®</strong> combinamos más de 15 años de experiencia en gasfitería especializada con tecnología de vanguardia europea. Liderados por <strong>Domingo Isain Plaza Caamaño (Gasfiter Autorizado SEC Clase 3 · RUT 12.738.961-6)</strong>, nos dedicamos a resolver fugas invisibles de gas y agua protegiendo el patrimonio de familias, condominios y empresas.
                    </p>

                    <!-- Core Values Grid -->
                    <div data-animate="fade-up" data-delay="250" data-stagger class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        <div class="glass-card p-4 rounded-2xl border border-slate-800 space-y-1.5 hover-lift">
                            <div class="flex items-center gap-2 text-emerald-400 font-bold text-sm">
                                <i data-lucide="award" class="w-5 h-5 shrink-0"></i>
                                <span>Paga Después de Solucionado</span>
                            </div>
                            <p class="text-xs text-slate-300">Solo cancela una vez verificada la total hermeticidad con manómetro digital.</p>
                        </div>

                        <div class="glass-card p-4 rounded-2xl border border-slate-800 space-y-1.5 hover-lift">
                            <div class="flex items-center gap-2 text-sky-400 font-bold text-sm">
                                <i data-lucide="shield-check" class="w-5 h-5 shrink-0"></i>
                                <span>3 Años de Garantía Escrita</span>
                            </div>
                            <p class="text-xs text-slate-300">Certificado oficial timbrado con validez legal SEC ante distribuidoras.</p>
                        </div>

                        <div class="glass-card p-4 rounded-2xl border border-slate-800 space-y-1.5 hover-lift">
                            <div class="flex items-center gap-2 text-amber-400 font-bold text-sm">
                                <i data-lucide="cpu" class="w-5 h-5 shrink-0"></i>
                                <span>Tecnología No Invasiva</span>
                            </div>
                            <p class="text-xs text-slate-300">Polímero alemán Prodoral R6-1, gas trazador N2/H2 y geófonos sónicos.</p>
                        </div>

                        <div class="glass-card p-4 rounded-2xl border border-slate-800 space-y-1.5 hover-lift">
                            <div class="flex items-center gap-2 text-teal-400 font-bold text-sm">
                                <i data-lucide="check-circle-2" class="w-5 h-5 shrink-0"></i>
                                <span>Decreto Supremo DS66</span>
                            </div>
                            <p class="text-xs text-slate-300">Cumplimiento estricto de normas de la Superintendencia SEC.</p>
                        </div>
                    </div>

                    <div data-animate="fade-up" data-delay="300" class="pt-4 flex flex-wrap gap-4">
                        <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo,%20necesito%20atencion%20tecnica%20de%20SellafuGas" target="_blank"
                           class="px-6 py-3.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-sm rounded-xl shadow-lg shadow-emerald-500/25 transition-all flex items-center gap-2 hover:scale-[1.02] hover:shadow-neon-emerald">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                            <span>Hablar con Domingo Isain por WhatsApp</span>
                        </a>
                        <a href="tel:+56949877316"
                           class="px-6 py-3.5 bg-slate-800 hover:bg-slate-700 text-white font-bold text-sm rounded-xl border border-slate-700 transition-all flex items-center gap-2 hover-lift">
                            <i data-lucide="phone-call" class="w-4 h-4 text-sky-400"></i>
                            <span>Llamar al 949 877 316</span>
                        </a>
                    </div>

                </div>

                <div class="lg:col-span-5 space-y-6" data-animate="fade-left" data-delay="200">
                    <div class="glass-card p-5 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl space-y-4 hover-lift">
                        <img src="{{ asset('images/domingo-isain-caamano-gasfiter-sec.webp') }}" alt="Domingo Isain Plaza Caamaño" class="w-full h-80 object-cover rounded-2xl">
                        <div class="p-2 space-y-2">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-bold text-white">Domingo Isain Plaza Caamaño</h3>
                                    <span class="text-xs font-semibold text-emerald-400">Gasfíter Instalador Autorizado SEC Clase 3</span>
                                </div>
                                <span class="text-xs px-2.5 py-1 rounded-lg bg-emerald-500/20 text-emerald-300 font-bold">RUT 12.738.961-6</span>
                            </div>
                            <p class="text-xs text-slate-300">Especialista certificado en normativa DS66, pruebas manométricas a 368 mmca y aplicación homologada de sellante Prodoral R6-1 en Chile.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Official Certificates & Documents Section -->
    @include('partials.certificates-section')

    <!-- 10 Visible FAQs Section -->
    <section id="faq" class="py-16 bg-slate-900/60 border-t border-slate-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            <div class="text-center mb-8">
                <span class="text-xs font-bold text-sky-400 uppercase tracking-widest block mb-2">Preguntas Frecuentes</span>
                <h2 class="text-3xl font-black text-white">10 Preguntas Frecuentes sobre SellafuGas® y Respaldo SEC</h2>
                <p class="text-xs text-slate-400 mt-1">Conoce más sobre nuestra trayectoria, estándares y acreditaciones</p>
            </div>

            <!-- FAQ 1 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 1 ? null : 1)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>1. ¿Quién es Domingo Isain Plaza Caamaño y cuál es su acreditación?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 1" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Domingo Isain Plaza Caamaño (RUT 12.738.961-6) es Instalador y Gasfiter Autorizado por la Superintendencia de Electricidad y Combustibles (SEC) con Licencia Clase 3 vigente, con más de 15 años de trayectoria especializada en ingeniería de gas y sellado no destructivo.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 2 ? null : 2)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>2. ¿Qué es SellafuGas® y cuál es su misión?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 2" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    SellafuGas® es la empresa líder en Chile especializada en la detección y sellado de fugas de gas y agua sin demolición, implementando tecnologías europeas como Prodoral R6-1, gas trazador e hidrófonos acústicos.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 3 ? null : 3)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>3. ¿Por qué SellafuGas® aplica la política 'Usted Paga Después de Solucionado'?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 3" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Porque confiamos 100% en la precisión de nuestros equipos de diagnóstico y en la eficacia del sellado polimérico alemán. El cliente solo cancela el trabajo una vez verificada la total hermeticidad de la red con manómetro digital.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 4 ? null : 4)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>4. ¿Qué garantía formal entregan en cada trabajo?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 4" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Entregamos un Certificado Oficial firmado y timbrado con 3 años de garantía por escrito en sellados Prodoral R6-1 y respaldo técnico bajo normativa DS66.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 5 ? null : 5)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>5. ¿Qué tipo de equipamiento técnico utiliza SellafuGas?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 5 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 5" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Utilizamos manómetros digitales diferenciales de alta sensibilidad, detectores electroacústicos Sewerin, equipos de gas trazador de Formiergas (N2/H2), cámaras termográficas Fluke e hidrófonos subacuáticos.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 6 ? null : 6)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>6. ¿Los certificados emitidos son válidos para Metrogas, Lipigas, Abastible y Gasco?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 6 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 6" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Todos los certificados emitidos por Domingo Isain cuentan con código QR de verificación oficial ante la SEC y son aceptados por todas las distribuidoras de gas e inspectores de Sello Verde.
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 7 ? null : 7)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>7. ¿En qué comunas y regiones tienen cobertura?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 7 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 7" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Cubrimos la totalidad de la Región Metropolitana (Las Condes, Vitacura, Providencia, Lo Barnechea, Chicureo, Santiago Centro, Ñuñoa, Maipú, La Florida, etc.), así como la V Región de Valparaíso y VI Región de O'Higgins.
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 8 ? null : 8)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>8. ¿Atienden emergencias de gas fuera de horario laboral?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 8 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 8" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Contamos con turnos de atención técnica de urgencia de lunes a domingo para solucionar cortes de medidor, fugas activas y sellos rojos críticos.
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 9 ? null : 9)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>9. ¿Qué medios de pago aceptan?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 9 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 9" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Aceptamos transferencia electrónica, tarjetas de débito (Redcompra) y tarjetas de crédito con opción de cuotas. Emitimos boleta o factura exenta/afecta según requerimiento del cliente.
                </div>
            </div>

            <!-- FAQ 10 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 10 ? null : 10)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>10. ¿Cómo puedo verificar la licencia SEC de Domingo Isain?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 10 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 10" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Puede escanear el código QR presente en nuestra web o en su credencial de instalador, el cual enlaza directamente al Registro Público de Instaladores Autorizados de la Superintendencia de Electricidad y Combustibles (SEC).
                </div>
            </div>

        </div>
    </section>

    </main>

    <!-- Footer Partial -->
    @include('partials.landing-footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.requestIdleCallback) {
                requestIdleCallback(function() { if (window.lucide) lucide.createIcons(); });
            } else {
                setTimeout(function() { if (window.lucide) lucide.createIcons(); }, 1);
            }
        });
    </script>

    <!-- Floating Widgets & FOMO System -->
    @include('partials.floating-widgets')
</body>
</html>
