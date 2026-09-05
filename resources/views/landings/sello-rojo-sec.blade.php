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
        .glow-red {
            box-shadow: 0 0 40px -10px rgba(225, 29, 72, 0.35);
        }
    </style>

    <!-- Schema.org JSON-LD Service -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Service",
      "name": "Levantamiento y Regularización de Sello Rojo de Gas SEC",
      "serviceType": "Gas Safety Seal Red Removal and SEC Certification",
      "provider": {
        "@@type": "HVACBusiness",
        "name": "SellafuGas® Domingo Isain",
        "telephone": "+56949877316",
        "url": "https://sellafugas.cl/sello-rojo-sec"
      },
      "areaServed": ["Santiago", "Las Condes", "Vitacura", "Providencia", "Lo Barnechea", "La Reina", "Ñuñoa", "Peñalolén", "La Florida", "Chicureo", "Valparaíso", "Rancagua"]
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
          "name": "¿Por qué colocan un Sello Rojo en una instalación de gas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "El Sello Rojo es colocado por una entidad de certificación autorizada por la SEC o por la empresa distribuidora (Metrogas, Lipigas, Abastible, Gasco) cuando se detecta una no conformidad crítica, principalmente fugas de gas en cañerías interiores, fallas de ventilación, deficiencias en ductos de evacuación de gases o artefactos defectuosos."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué consecuencias tiene tener un Sello Rojo en mi hogar o comunidad?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Implica un riesgo inminente de corte de suministro de gas o la suspensión inmediata del servicio por parte de la empresa distribuidora, además de posibles multas y la imposibilidad de certificar el edificio ante la SEC."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo ayuda SellafuGas y Domingo Isain a levantar el Sello Rojo?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Domingo Isain (Gasfiter Autorizado SEC Clase 3) inspecciona el informe de no conformidades, subsana las fallas mediante sellado de cañerías con Prodoral R6-1 sin romper muros o adecuación de artefactos, ejecuta la prueba de hermeticidad a 368 mmca bajo DS66 y emite el Certificado Oficial SEC para la reinspección y obtención del Sello Verde."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuánto tiempo toma levantar un Sello Rojo por fuga de gas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "El sellado de la fuga de gas con Prodoral R6-1 y la prueba de hermeticidad toman menos de 2 horas. Al finalizar la visita técnica, se entrega de inmediato el Certificado Oficial de Servicio para tramitar la reposición del gas."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Se debe picar pisos o muros para reparar la fuga que causó el Sello Rojo?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "No. Gracias a la tecnología alemana Prodoral R6-1 aceptada por la SEC, inyectamos el sellante por el interior de la cañería sin realizar ninguna rotura de cerámica, radier ni tabiques."
          }
        },
        {
          "@@type": "Question",
          "name": "¿El certificado de Domingo Isain es aceptado por las entidades certificadoras y distribuidoras?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí, 100%. Cuenta con el respaldo legal de la licencia SEC Clase 3 de Domingo Isain (RUT 12.738.961-6) y código QR verificable en la plataforma digital de la SEC."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué garantía tiene la reparación para asegurar que no vuelva a salir Sello Rojo?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Entregamos 3 años de garantía por escrito por el sellado de la red de gas, asegurando hermeticidad total en las sucesivas inspecciones periódicas de la SEC."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Atienden sellos rojos en departamentos y edificios completos?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Atendemos casas particulares, departamentos individuales y comunidades de copropietarios en edificios habitacionales y comerciales en toda la Región Metropolitana, V y VI Región."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuál es el valor del servicio para solucionar el Sello Rojo?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "El valor base en la RM para sellado de red de gas hasta 10 metros es de $300.000 neto con condición 'Usted Paga Después de Solucionado'. Para adecuación de ventilaciones o artefactos se entrega presupuesto exacto sin costo."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo agendar una atención de urgencia por Sello Rojo?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Escríbanos directamente al WhatsApp +56 9 4987 7316 indicando su comuna y una foto del informe o etiqueta de Sello Rojo para coordinar la visita técnica prioritaria en el día."
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
          distribuidora: 'Metrogas',
          openFaq: null,
          submitSello() {
              if(!this.nombre || !this.telefono) {
                  alert('Por favor ingrese su Nombre y Teléfono');
                  return;
              }
              const text = `Hola Domingo Isain (SellafuGas), tengo *SELLO ROJO* de gas y necesito regularización urgente:\n\n👤 *Nombre:* ${this.nombre}\n📱 *Teléfono:* ${this.telefono}\n📍 *Comuna:* ${this.comuna}\n🏢 *Distribuidora / Entidad:* ${this.distribuidora}`;
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
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs font-bold uppercase tracking-wider">
                        <span>Solución Urgente ante Inspecciones SEC</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        Levantamiento y Regularización de <span class="text-transparent bg-clip-text bg-gradient-to-r from-rose-400 via-amber-300 to-emerald-400">Sello Rojo de Gas</span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                        ¿Inspeccionaron tu casa o departamento y te dejaron Sello Rojo por fuga de gas o no conformidades? Corregimos las observaciones sin romper pisos con <strong>Prodoral R6-1</strong>, ejecutamos la prueba de hermeticidad normada a 368 mmca y emitimos el <strong>Certificado Oficial SEC</strong> para restablecer tu suministro de inmediato.
                    </p>

                    <!-- Feature Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span><strong>Sin picar muros:</strong> Sellado Prodoral R6-1</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span><strong>Prueba DS66:</strong> Manómetro digital estanco</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span><strong>Certificado SEC:</strong> Con QR verificable</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span><strong>3 Años Garantía:</strong> Respaldo total</span>
                        </div>
                    </div>

                    <!-- Fast Contact Card -->
                    <div class="glass-card p-6 rounded-3xl border border-slate-700 space-y-4 pt-4">
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Solicitar Asistencia Inmediata por Sello Rojo:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <input type="text" placeholder="Su Nombre *" x-model="nombre"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-rose-500">
                            <input type="tel" placeholder="Teléfono *" x-model="telefono"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-rose-500">
                            <input type="text" placeholder="Comuna *" x-model="comuna"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-rose-500">
                        </div>

                        <button type="button" @click="submitSello()"
                                class="w-full py-4 bg-gradient-to-r from-rose-600 via-rose-500 to-amber-500 hover:from-rose-500 hover:to-amber-400 text-white font-black text-base rounded-xl shadow-xl shadow-rose-600/25 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="shield-alert" class="w-5 h-5"></i>
                            <span>Enviar Foto de Sello Rojo a Domingo por WhatsApp</span>
                        </button>
                    </div>

                </div>

                <div class="lg:col-span-5 space-y-6">
                    <div class="glass-card p-4 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl glow-red">
                        <img src="{{ asset('images/sello-rojo-gas-sec.png') }}" alt="Inspección Sello Rojo SEC" class="w-full h-80 object-cover rounded-2xl">
                        <div class="p-4 space-y-2">
                            <span class="text-xs font-bold text-rose-400 uppercase tracking-wider block">Regularización Normativa DS66</span>
                            <h3 class="text-lg font-bold text-white">De Sello Rojo a Sello Verde</h3>
                            <p class="text-xs text-slate-300">Solucionamos fugas en cañerías interiores y acondicionamos artefactos para que tu hogar obtenga la certificación verde sin demoras.</p>
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
                <span class="text-xs font-bold text-rose-400 uppercase tracking-widest block mb-2">Preguntas y Soluciones</span>
                <h2 class="text-3xl font-black text-white">10 Preguntas Frecuentes sobre Sello Rojo de Gas SEC</h2>
                <p class="text-xs text-slate-400 mt-1">Aprende cómo regularizar tu instalación y evitar cortes de suministro de forma rápida</p>
            </div>

            <!-- FAQ 1 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 1 ? null : 1)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>1. ¿Por qué colocan un Sello Rojo en una instalación de gas?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-rose-400 transition-transform" :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 1" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    El Sello Rojo es colocado por una entidad de certificación autorizada por la SEC o por la empresa distribuidora (Metrogas, Lipigas, Abastible, Gasco) cuando se detecta una no conformidad crítica, principalmente fugas de gas en cañerías interiores, fallas de ventilación, deficiencias en ductos de evacuación de gases o artefactos defectuosos.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 2 ? null : 2)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>2. ¿Qué consecuencias tiene tener un Sello Rojo en mi hogar o comunidad?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-rose-400 transition-transform" :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 2" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Implica un riesgo inminente de corte de suministro de gas o la suspensión inmediata del servicio por parte de la empresa distribuidora, además de posibles multas y la imposibilidad de certificar el edificio ante la SEC.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 3 ? null : 3)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>3. ¿Cómo ayuda SellafuGas y Domingo Isain a levantar el Sello Rojo?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-rose-400 transition-transform" :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 3" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Domingo Isain (Gasfiter Autorizado SEC Clase 3) inspecciona el informe de no conformidades, subsana las fallas mediante sellado de cañerías con Prodoral R6-1 sin romper muros o adecuación de artefactos, ejecuta la prueba de hermeticidad a 368 mmca bajo DS66 y emite el Certificado Oficial SEC para la reinspección y obtención del Sello Verde.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 4 ? null : 4)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>4. ¿Cuánto tiempo toma levantar un Sello Rojo por fuga de gas?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-rose-400 transition-transform" :class="openFaq === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 4" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    El sellado de la fuga de gas con Prodoral R6-1 y la prueba de hermeticidad toman menos de 2 horas. Al finalizar la visita técnica, se entrega de inmediato el Certificado Oficial de Servicio para tramitar la reposición del gas.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 5 ? null : 5)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>5. ¿Se debe picar pisos o muros para reparar la fuga que causó el Sello Rojo?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-rose-400 transition-transform" :class="openFaq === 5 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 5" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    No. Gracias a la tecnología alemana Prodoral R6-1 aceptada por la SEC, inyectamos el sellante por el interior de la cañería sin realizar ninguna rotura de cerámica, radier ni tabiques.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 6 ? null : 6)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>6. ¿El certificado de Domingo Isain es aceptado por las entidades certificadoras y distribuidoras?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-rose-400 transition-transform" :class="openFaq === 6 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 6" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí, 100%. Cuenta con el respaldo legal de la licencia SEC Clase 3 de Domingo Isain (RUT 12.738.961-6) y código QR verificable en la plataforma digital de la SEC.
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 7 ? null : 7)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>7. ¿Qué garantía tiene la reparación para asegurar que no vuelva a salir Sello Rojo?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-rose-400 transition-transform" :class="openFaq === 7 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 7" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Entregamos 3 años de garantía por escrito por el sellado de la red de gas, asegurando hermeticidad total en las sucesivas inspecciones periódicas de la SEC.
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 8 ? null : 8)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>8. ¿Atienden sellos rojos en departamentos y edificios completos?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-rose-400 transition-transform" :class="openFaq === 8 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 8" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Atendemos casas particulares, departamentos individuales y comunidades de copropietarios en edificios habitacionales y comerciales en toda la Región Metropolitana, V y VI Región.
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 9 ? null : 9)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>9. ¿Cuál es el valor del servicio para solucionar el Sello Rojo?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-rose-400 transition-transform" :class="openFaq === 9 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 9" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    El valor base en la RM para sellado de red de gas hasta 10 metros es de $300.000 neto con condición 'Usted Paga Después de Solucionado'. Para adecuación de ventilaciones o artefactos se entrega presupuesto exacto sin costo.
                </div>
            </div>

            <!-- FAQ 10 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 10 ? null : 10)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>10. ¿Cómo agendar una atención de urgencia por Sello Rojo?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-rose-400 transition-transform" :class="openFaq === 10 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 10" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Escríbanos directamente al WhatsApp +56 9 4987 7316 indicando su comuna y una foto del informe o etiqueta de Sello Rojo para coordinar la visita técnica prioritaria en el día.
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
