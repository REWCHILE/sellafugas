<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <link rel="canonical" href="{{ $canonicalUrl }}" />

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:image" content="{{ asset('images/hero-prodoral.webp') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            400: '#38bdf8',
                            500: '#0284c7',
                            600: '#0369a1',
                            700: '#075985',
                            900: '#0c4a6e',
                            950: '#031726',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

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
      "name": "Sellado de Fugas de Gas con Prodoral R6-1 Sin Romper",
      "serviceType": "Polymer Gas Pipe In-Situ Sealing",
      "provider": {
        "@@type": "Plumber",
        "name": "SellafuGas® Domingo Isain",
        "telephone": "+56949877316",
        "url": "https://sellafugas.cl/prodoral"
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
          "name": "¿Qué es Prodoral R6-1 y cuál es su origen?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Prodoral R6-1 es una dispersión polimérica líquida alemana desarrollada para el sellado y reacondicionamiento interno de cañerías de gas empotradas con uniones roscadas, sin necesidad de demoler muros ni levantar pisos."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Está Prodoral R6-1 aprobado por la SEC y la normativa chilena DS66?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. El Decreto Supremo DS66 en su Artículo 7 y Artículo 44.2.3 reconoce y valida métodos no destructivos de sellado interno que cumplan estándares internacionales como la norma europea DIN EN 13090 y NAG-203."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo funciona el procedimiento de sellado paso a paso?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "1) Desconexión y limpieza/soplado de cañería con aire a presión. 2) Llenado e inyección a presión constante del polímero Prodoral R6-1. 3) Extracción del excedente con tapones neumáticos calibrados. 4) Secado forzado con aire y prueba manométrica final de hermeticidad a 368 mmca."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuánto tiempo dura el sellado y qué garantía ofrece SellafuGas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "El polímero fraguado tiene una vida útil superior a 25 años. SellafuGas entrega un Certificado de Garantía por escrito de 3 años respaldado por Domingo Isain (SEC Clase 3)."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuánto dinero ahorro en comparación con el cambio tradicional de cañerías?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Ahorra entre un 60% y un 70% en costos globales, ya que no incurre en gastos de albañilería, reposición de cerámicas, pintura ni demolición de radier."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuánto tiempo toma el trabajo en un departamento o casa?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "El procedimiento completo toma entre 4 y 6 horas. El servicio queda completamente operativo y probado el mismo día."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Sirve para regularizar sellos rojos de Metrogas, Lipigas, Abastible o Gasco?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Al finalizar el sellado se emite el Certificado Oficial de Hermeticidad SEC para presentar a la empresa de gas o entidad inspectora y obtener el Sello Verde."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Es compatible con cañerías de acero galvanizado y cobre?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Está específicamente formulado para redes con uniones roscadas (acero galvanizado, hierro maleable y fittings de cobre/bronce) que sufren resecamiento de cáñamo o microporosidades."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué presión soporta el sellado Prodoral R6-1?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Soporta presiones de trabajo muy superiores a las de las redes residenciales (hasta 100 mbar), siendo probado en terreno a 368 mmca (36,8 mbar) conforme al DS66."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo coordinar la visita y cotizar el sellado Prodoral?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Contáctenos directamente al WhatsApp +56 9 4987 7316 indicando los artefactos conectados y su comuna para recibir un presupuesto formal en minutos."
          }
        }
      ]
    }
    </script>
</head>
<body class="bg-slate-950 text-slate-100 antialiased selection:bg-brand-500 selection:text-white"
      x-data="{
          mobileMenu: false,
          servicesDropdown: false,
          nombre: '',
          telefono: '',
          comuna: 'Las Condes',
          artefactos: '2 artefactos (Cocina + Calefont)',
          openFaq: null,
          submitProdoral() {
              if(!this.nombre || !this.telefono) {
                  alert('Por favor ingrese su Nombre y Teléfono');
                  return;
              }
              const text = `Hola Domingo Isain (SellafuGas), solicito cotización para Sellado Alemán PRODORAL R6-1:\n\n👤 *Nombre:* ${this.nombre}\n📱 *Teléfono:* ${this.telefono}\n📍 *Comuna:* ${this.comuna}\n🔥 *Artefactos:* ${this.artefactos}`;
              window.open(`https://api.whatsapp.com/send?phone=56949877316&text=${encodeURIComponent(text)}`, '_blank');
          }
      }">

    <!-- Top Header Partial -->
    @include('partials.landing-header')

    <!-- Hero Section Prodoral -->
    <section class="py-16 bg-radial from-slate-900 via-slate-950 to-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-7 space-y-6">
                    <div data-animate="fade-down" data-delay="100" class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/30 text-amber-300 text-xs font-bold uppercase tracking-wider">
                        <span>🇩🇪 Tecnología Alemana Certificada · Norma DIN EN 13090 / NAG-203</span>
                    </div>

                    <h1 data-animate="fade-up" data-delay="150" class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        Sellado de Cañerías con <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-orange-300 to-yellow-400">Prodoral R6-1</span> Sin Romper
                    </h1>

                    <p data-animate="fade-up" data-delay="200" class="text-base sm:text-lg text-slate-300 leading-relaxed">
                        La solución alemana definitiva para reparar fugas de gas embutidas bajo radieres y dentro de muros. El polímero líquido <strong>Prodoral R6-1</strong> sella microporos y uniones roscadas desde el interior de la cañería, evitando demoler cerámicas y ahorrando hasta un <strong>70% en costos</strong>. Ejecutado y certificado por <strong>Domingo Isain (Gasfiter SEC Clase 3)</strong>.
                    </p>

                    <!-- Trust Bullets -->
                    <div data-animate="fade-up" data-delay="250" data-stagger class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="shield-check" class="w-5 h-5 text-amber-400 shrink-0"></i>
                            <span><strong>3 Años de Garantía:</strong> Certificada por escrito</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="hammer" class="w-5 h-5 text-amber-400 shrink-0"></i>
                            <span><strong>0% Demolición:</strong> Pisos y muros intactos</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="clock" class="w-5 h-5 text-amber-400 shrink-0"></i>
                            <span><strong>Listo en 4 a 6 Horas:</strong> En el mismo día</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="file-check-2" class="w-5 h-5 text-amber-400 shrink-0"></i>
                            <span><strong>DS66 Art. 44.2.3:</strong> Prueba a 368 mmca</span>
                        </div>
                    </div>

                    <!-- Fast Contact Card -->
                    <div data-animate="fade-scale" data-delay="300" class="glass-card p-6 rounded-3xl border border-slate-700 space-y-4 pt-4 hover-lift">
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Cotizar Sellado Prodoral R6-1 en Línea:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <input type="text" placeholder="Su Nombre *" x-model="nombre"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-amber-500">
                            <input type="tel" placeholder="Teléfono *" x-model="telefono"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-amber-500">
                            <input type="text" placeholder="Comuna *" x-model="comuna"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-amber-500">
                        </div>

                        <button type="button" @click="submitProdoral()"
                                class="w-full py-4 bg-gradient-to-r from-amber-500 via-orange-500 to-yellow-500 hover:from-amber-400 hover:to-yellow-400 text-slate-950 font-black text-base rounded-xl shadow-xl shadow-amber-500/25 transition-all flex items-center justify-center gap-2 cursor-pointer hover:scale-[1.02] hover:shadow-neon-amber">
                            <i data-lucide="sparkles" class="w-5 h-5"></i>
                            <span>Solicitar Presupuesto Formal con Domingo Isain</span>
                        </button>
                    </div>

                </div>

                <div class="lg:col-span-5 space-y-6" data-animate="fade-left" data-delay="200">
                    <div class="glass-card p-4 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl hover-lift">
                        <img src="{{ asset('images/hero-prodoral.webp') }}" alt="Inyección Prodoral R6-1" class="w-full h-80 object-cover rounded-2xl">
                        <div class="p-4 space-y-2">
                            <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block">Polímero Autonivelante Alemán</span>
                            <h3 class="text-lg font-bold text-white">Sellado Interno Permanente</h3>
                            <p class="text-xs text-slate-300">Penetra en uniones roscadas y porosidades microscópicas formando una película elástica resistente a la presión y al gas por más de 25 años.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Comparison Section: Prodoral vs Demolición Tradicional -->
    <section class="py-16 bg-slate-900/60 border-t border-slate-800">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <div class="text-center">
                <span class="text-xs font-bold text-amber-400 uppercase tracking-widest block mb-2">Ventajas y Ahorro</span>
                <h2 class="text-3xl font-black text-white">¿Por Qué Elegir Prodoral R6-1 Frente a Picar Muros?</h2>
                <p class="text-xs text-slate-400 mt-1">Comparativa directa entre el método no invasivo alemán y la obra tradicional</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm rounded-2xl overflow-hidden glass-card border border-slate-700">
                    <thead class="bg-slate-950 text-slate-200 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="p-4">Aspecto Técnico</th>
                            <th class="p-4 bg-emerald-500/20 text-emerald-400 font-bold">✨ Sellado Prodoral R6-1</th>
                            <th class="p-4 bg-rose-500/10 text-rose-300">🔨 Obra Tradicional (Picar)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        <tr>
                            <td class="p-4 font-bold text-white">Daño a Revestimientos</td>
                            <td class="p-4 text-emerald-400 font-bold bg-emerald-500/5">0% Daño (Pisos y muros intactos)</td>
                            <td class="p-4 text-rose-400">Destrucción de cerámicos y baldosas</td>
                        </tr>
                        <tr>
                            <td class="p-4 font-bold text-white">Tiempo de Ejecución</td>
                            <td class="p-4 text-emerald-400 font-bold bg-emerald-500/5">4 a 6 Horas (Mismo día)</td>
                            <td class="p-4 text-rose-400">5 a 12 Días hábiles con escombros</td>
                        </tr>
                        <tr>
                            <td class="p-4 font-bold text-white">Costo Total</td>
                            <td class="p-4 text-emerald-400 font-bold bg-emerald-500/5">Hasta 70% más económico</td>
                            <td class="p-4 text-rose-400">Muy elevado (Albañilería + Pintura)</td>
                        </tr>
                        <tr>
                            <td class="p-4 font-bold text-white">Garantía por Escrito</td>
                            <td class="p-4 text-emerald-400 font-bold bg-emerald-500/5">3 Años Certificados SEC</td>
                            <td class="p-4 text-slate-400">Variable según maestro</td>
                        </tr>
                        <tr>
                            <td class="p-4 font-bold text-white">Aprobación Sello Verde SEC</td>
                            <td class="p-4 text-emerald-400 font-bold bg-emerald-500/5">100% Cumple Decreto Supremo DS66</td>
                            <td class="p-4 text-slate-400">Requiere trámites adicionales</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Step by Step Procedure -->
    <section class="py-16 bg-slate-950 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto">
                <span class="text-xs font-bold text-amber-400 uppercase tracking-widest block mb-2">Protocolo DS66</span>
                <h2 class="text-3xl font-black text-white">Procedimiento Técnico en 4 Fases</h2>
                <p class="text-xs text-slate-400 mt-1">Supervisado y ejecutado directamente por Domingo Isain Plaza Caamaño</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="glass-card p-6 rounded-2xl border border-slate-800 space-y-3">
                    <span class="w-10 h-10 rounded-xl bg-amber-500/20 text-amber-400 font-black flex items-center justify-center text-lg">1</span>
                    <h3 class="text-base font-bold text-white">Purga y Soplado</h3>
                    <p class="text-xs text-slate-300">Desconexión de artefactos y barrido con aire comprimido para remover óxido y residuos internos.</p>
                </div>

                <div class="glass-card p-6 rounded-2xl border border-slate-800 space-y-3">
                    <span class="w-10 h-10 rounded-xl bg-amber-500/20 text-amber-400 font-black flex items-center justify-center text-lg">2</span>
                    <h3 class="text-base font-bold text-white">Inyección Prodoral</h3>
                    <p class="text-xs text-slate-300">Bombeo a presión del polímero líquido Prodoral R6-1 inundando cada poro y unión roscada.</p>
                </div>

                <div class="glass-card p-6 rounded-2xl border border-slate-800 space-y-3">
                    <span class="w-10 h-10 rounded-xl bg-amber-500/20 text-amber-400 font-black flex items-center justify-center text-lg">3</span>
                    <h3 class="text-base font-bold text-white">Extracción y Secado</h3>
                    <p class="text-xs text-slate-300">Retiro del excedente mediante tapón neumático calibrado y secado con flujo de aire tibio.</p>
                </div>

                <div class="glass-card p-6 rounded-2xl border border-slate-800 space-y-3">
                    <span class="w-10 h-10 rounded-xl bg-amber-500/20 text-amber-400 font-black flex items-center justify-center text-lg">4</span>
                    <h3 class="text-base font-bold text-white">Prueba DS66 y Certificado</h3>
                    <p class="text-xs text-slate-300">Prueba manométrica a 368 mmca por 5 minutos y emisión de certificado oficial SEC con QR.</p>
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
                <span class="text-xs font-bold text-amber-400 uppercase tracking-widest block mb-2">Preguntas Frecuentes</span>
                <h2 class="text-3xl font-black text-white">10 Preguntas Frecuentes sobre Sellado Prodoral R6-1</h2>
                <p class="text-xs text-slate-400 mt-1">Todo lo que necesitas saber antes de contratar el servicio de sellado de gas</p>
            </div>

            <!-- FAQ 1 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 1 ? null : 1)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>1. ¿Qué es Prodoral R6-1 y cuál es su origen?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 1" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Prodoral R6-1 es una dispersión polimérica líquida alemana desarrollada para el sellado y reacondicionamiento interno de cañerías de gas empotradas con uniones roscadas, sin necesidad de demoler muros ni levantar pisos.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 2 ? null : 2)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>2. ¿Está Prodoral R6-1 aprobado por la SEC y la normativa chilena DS66?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 2" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. El Decreto Supremo DS66 en su Artículo 7 y Artículo 44.2.3 reconoce y valida métodos no destructivos de sellado interno que cumplan estándares internacionales como la norma europea DIN EN 13090 y NAG-203.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 3 ? null : 3)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>3. ¿Cómo funciona el procedimiento de sellado paso a paso?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 3" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    1) Desconexión y limpieza/soplado de cañería con aire a presión. 2) Llenado e inyección a presión constante del polímero Prodoral R6-1. 3) Extracción del excedente con tapones neumáticos calibrados. 4) Secado forzado con aire y prueba manométrica final de hermeticidad a 368 mmca.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 4 ? null : 4)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>4. ¿Cuánto tiempo dura el sellado y qué garantía ofrece SellafuGas?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 4" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    El polímero fraguado tiene una vida útil superior a 25 años. SellafuGas entrega un Certificado de Garantía por escrito de 3 años respaldado por Domingo Isain (SEC Clase 3).
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 5 ? null : 5)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>5. ¿Cuánto dinero ahorro en comparación con el cambio tradicional de cañerías?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 5 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 5" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Ahorra entre un 60% y un 70% en costos globales, ya que no incurre en gastos de albañilería, reposición de cerámicas, pintura ni demolición de radier.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 6 ? null : 6)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>6. ¿Cuánto tiempo toma el trabajo en un departamento o casa?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 6 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 6" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    El procedimiento completo toma entre 4 y 6 horas. El servicio queda completamente operativo y probado el mismo día.
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 7 ? null : 7)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>7. ¿Sirve para regularizar sellos rojos de Metrogas, Lipigas, Abastible o Gasco?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 7 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 7" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Al finalizar el sellado se emite el Certificado Oficial de Hermeticidad SEC para presentar a la empresa de gas o entidad inspectora y obtener el Sello Verde.
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 8 ? null : 8)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>8. ¿Es compatible con cañerías de acero galvanizado y cobre?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 8 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 8" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Está específicamente formulado para redes con uniones roscadas (acero galvanizado, hierro maleable y fittings de cobre/bronce) que sufren resecamiento de cáñamo o microporosidades.
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 9 ? null : 9)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>9. ¿Qué presión soporta el sellado Prodoral R6-1?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 9 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 9" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Soporta presiones de trabajo muy superiores a las de las redes residenciales (hasta 100 mbar), siendo probado en terreno a 368 mmca (36,8 mbar) conforme al DS66.
                </div>
            </div>

            <!-- FAQ 10 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 10 ? null : 10)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>10. ¿Cómo coordinar la visita y cotizar el sellado Prodoral?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-amber-400 transition-transform" :class="openFaq === 10 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 10" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Contáctenos directamente al WhatsApp +56 9 4987 7316 indicando los artefactos conectados y su comuna para recibir un presupuesto formal en minutos.
                </div>
            </div>

        </div>
    </section>

    <!-- Footer Partial -->
    @include('partials.landing-footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if(window.lucide) lucide.createIcons();
        });
    </script>
</body>
</html>
