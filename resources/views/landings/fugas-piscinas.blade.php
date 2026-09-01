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

    <!-- Schema.org JSON-LD Service -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Service",
      "name": "Detección y Reparación de Fugas en Piscinas Sin Vaciar",
      "serviceType": "Swimming Pool Leak Detection and Repair",
      "provider": {
        "@@type": "Plumber",
        "name": "SellafuGas® Domingo Isain",
        "telephone": "+56949877316",
        "url": "https://sellafugas.cl/fugas-piscinas"
      },
      "areaServed": ["Santiago", "Chicureo", "Las Condes", "Vitacura", "Lo Barnechea", "Colina", "La Reina", "Peñalolén", "Machalí", "Valparaíso", "Viña del Mar"]
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
          "name": "¿Cómo saber si mi piscina tiene una fuga o es solo evaporación natural?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Una piscina pierde por evaporación entre 3 a 5 mm diarios en verano. Si el nivel desciende más de 1 a 2 centímetros al día, existe una fuga activa en el vaso, skimmers, retornos o cañerías subterráneas."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Es necesario vaciar el agua de la piscina para realizar la detección?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "No. Nuestro método de inspección se realiza con la piscina completamente llena para no desperdiciar agua ni alterar la presión hidrostática del terreno."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué tecnología se emplea para encontrar la fuga bajo el agua?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Utilizamos Hidrófonos Sumergibles de Alta Sensibilidad, Inyección de Tinte Trazador de Fluoresceína inocuo, Pruebas de Presión Manométrica en los circuitos de filtrado y Cámaras Endoscópicas sumergibles."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuáles son los puntos más comunes donde ocurren fugas en piscinas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Los puntos más frecuentes son: unión de skimmers con el muro de hormigón, pasamuros de focos LED, boquillas de retorno, fondo/drenaje principal y rotura por raíces en cañerías subterráneas entre la bomba y la piscina."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Se puede reparar la fuga bajo el agua sin botar el agua?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. En fisuras de estructura, skimmers y focos aplicamos polímeros y masillas epóxicas subacuáticas de curado bajo agua que sellan de inmediato."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué ocurre si la fuga está en la cañería subterránea enterrada en el jardín?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Aislamos los circuitos mediante tapones neumáticos y presurizamos con gas trazador o geófono para marcar el punto exacto bajo el césped o terraza sin romper todo el entorno."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuánto tiempo demora la inspección en una piscina residencial?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "La inspección toma entre 2 y 3 horas, verificando tanto la estructura estática como el sistema dinámico con la bomba en funcionamiento."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Sirve para piscinas de hormigón, fibra de vidrio y liner?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Nuestros equipos y procedimientos son 100% compatibles con piscinas de hormigón pintado, con mosaico/cerámico, piscinas de fibra de vidrio y piscinas con liner de PVC."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué zonas atienden para servicios de piscinas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Atendemos en todo Santiago, especialmente sectores con alta presencia de piscinas como Chicureo, Chamisero, Colina, Lo Barnechea, Las Condes, Vitacura, La Reina, Peñalolén, Pirque, Calera de Tango, además de la V y VI Región."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo coordinar una visita técnica para mi piscina?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Escríbanos directamente al WhatsApp +56 9 4987 7316 indicando su comuna y los centímetros aproximados que pierde al día para una evaluación rápida."
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
          comuna: 'Chicureo',
          tipoPiscina: 'Hormigón / Pintura o Cerámica',
          openFaq: null,
          submitPiscina() {
              if(!this.nombre || !this.telefono) {
                  alert('Por favor ingrese su Nombre y Teléfono');
                  return;
              }
              const text = `Hola Domingo Isain (SellafuGas), mi piscina pierde nivel de agua y necesito detección de fuga sin vaciar:\n\n👤 *Nombre:* ${this.nombre}\n📱 *Teléfono:* ${this.telefono}\n📍 *Comuna:* ${this.comuna}\n🏊 *Tipo de Piscina:* ${this.tipoPiscina}`;
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
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-teal-500/10 border border-teal-500/30 text-teal-300 text-xs font-bold uppercase tracking-wider">
                        <span>Ahorra Miles de Litros · Sin Vaciar la Piscina</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        Detección de Fugas en Piscinas <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-300 via-cyan-400 to-sky-400">Sin Vaciar el Agua</span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                        ¿Tu piscina baja centímetros cada día? Detectamos y reparamos filtraciones en <strong>skimmers, retornos, fondo, focos y cañerías subterráneas</strong> sin necesidad de botar el agua. Utilizamos hidrófonos sumergibles de alta frecuencia, cámaras subacuáticas y tintes trazadores de fluoresceína.
                    </p>

                    <!-- Feature Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-teal-400 shrink-0"></i>
                            <span><strong>Piscina Llena:</strong> No pierdes tu agua</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-teal-400 shrink-0"></i>
                            <span><strong>Hidrófono Acústico:</strong> Escucha el punto de fuga</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-teal-400 shrink-0"></i>
                            <span><strong>Pruebas de Presión:</strong> En circuitos de filtrado</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-teal-400 shrink-0"></i>
                            <span><strong>Sellado Subacuático:</strong> Reparación in-situ</span>
                        </div>
                    </div>

                    <!-- Fast Contact Card -->
                    <div class="glass-card p-6 rounded-3xl border border-slate-700 space-y-4 pt-4">
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Solicitar Inspección de Fuga en Piscina:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <input type="text" placeholder="Su Nombre *" x-model="nombre"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-teal-500">
                            <input type="tel" placeholder="Teléfono *" x-model="telefono"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-teal-500">
                            <input type="text" placeholder="Comuna (Ej: Chicureo, Lo Barnechea)" x-model="comuna"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-teal-500">
                        </div>

                        <button type="button" @click="submitPiscina()"
                                class="w-full py-4 bg-gradient-to-r from-teal-500 via-cyan-500 to-sky-500 hover:from-teal-400 hover:to-sky-400 text-slate-950 font-black text-base rounded-xl shadow-xl shadow-teal-500/25 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="waves" class="w-5 h-5"></i>
                            <span>Coordinar Visita Técnica con Domingo por WhatsApp</span>
                        </button>
                    </div>

                </div>

                <div class="lg:col-span-5 space-y-6">
                    <div class="glass-card p-4 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/fugas-piscina-deteccion.png') }}" alt="Detección de fugas en piscinas" class="w-full h-80 object-cover rounded-2xl">
                        <div class="p-4 space-y-2">
                            <span class="text-xs font-bold text-teal-400 uppercase tracking-wider block">Tecnología Hidroacústica Subacuática</span>
                            <h3 class="text-lg font-bold text-white">Inspección con Hidrófono y Fluoresceína</h3>
                            <p class="text-xs text-slate-300">Localiza microporosidades y roturas en skimmers, focos LED y boquillas de retorno en piscinas de hormigón y fibra de vidrio.</p>
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
                <span class="text-xs font-bold text-teal-400 uppercase tracking-widest block mb-2">Preguntas y Diagnósticos</span>
                <h2 class="text-3xl font-black text-white">10 Preguntas Frecuentes sobre Fugas en Piscinas</h2>
                <p class="text-xs text-slate-400 mt-1">Conoce cómo evitar la pérdida de agua y daño al terreno de tu piscina</p>
            </div>

            <!-- FAQ 1 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 1 ? null : 1)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>1. ¿Cómo saber si mi piscina tiene una fuga o es solo evaporación natural?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-teal-400 transition-transform" :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 1" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Una piscina pierde por evaporación entre 3 a 5 mm diarios en verano. Si el nivel desciende más de 1 a 2 centímetros al día, existe una fuga activa en el vaso, skimmers, retornos o cañerías subterráneas.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 2 ? null : 2)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>2. ¿Es necesario vaciar el agua de la piscina para realizar la detección?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-teal-400 transition-transform" :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 2" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    No. Nuestro método de inspección se realiza con la piscina completamente llena para no desperdiciar agua ni alterar la presión hidrostática del terreno.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 3 ? null : 3)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>3. ¿Qué tecnología se emplea para encontrar la fuga bajo el agua?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-teal-400 transition-transform" :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 3" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Utilizamos Hidrófonos Sumergibles de Alta Sensibilidad, Inyección de Tinte Trazador de Fluoresceína inocuo, Pruebas de Presión Manométrica en los circuitos de filtrado y Cámaras Endoscópicas sumergibles.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 4 ? null : 4)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>4. ¿Cuáles son los puntos más comunes donde ocurren fugas en piscinas?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-teal-400 transition-transform" :class="openFaq === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 4" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Los puntos más frecuentes son: unión de skimmers con el muro de hormigón, pasamuros de focos LED, boquillas de retorno, fondo/drenaje principal y rotura por raíces en cañerías subterráneas entre la bomba y la piscina.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 5 ? null : 5)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>5. ¿Se puede reparar la fuga bajo el agua sin botar el agua?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-teal-400 transition-transform" :class="openFaq === 5 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 5" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. En fisuras de estructura, skimmers y focos aplicamos polímeros y masillas epóxicas subacuáticas de curado bajo agua que sellan de inmediato.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 6 ? null : 6)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>6. ¿Qué ocurre si la fuga está en la cañería subterránea enterrada en el jardín?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-teal-400 transition-transform" :class="openFaq === 6 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 6" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Aislamos los circuitos mediante tapones neumáticos y presurizamos con gas trazador o geófono para marcar el punto exacto bajo el césped o terraza sin romper todo el entorno.
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 7 ? null : 7)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>7. ¿Cuánto tiempo demora la inspección en una piscina residencial?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-teal-400 transition-transform" :class="openFaq === 7 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 7" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    La inspección toma entre 2 y 3 horas, verificando tanto la estructura estática como el sistema dinámico con la bomba en funcionamiento.
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 8 ? null : 8)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>8. ¿Sirve para piscinas de hormigón, fibra de vidrio y liner?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-teal-400 transition-transform" :class="openFaq === 8 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 8" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Nuestros equipos y procedimientos son 100% compatibles con piscinas de hormigón pintado, con mosaico/cerámico, piscinas de fibra de vidrio y piscinas con liner de PVC.
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 9 ? null : 9)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>9. ¿Qué zonas atienden para servicios de piscinas?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-teal-400 transition-transform" :class="openFaq === 9 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 9" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Atendemos en todo Santiago, especialmente sectores con alta presencia de piscinas como Chicureo, Chamisero, Colina, Lo Barnechea, Las Condes, Vitacura, La Reina, Peñalolén, Pirque, Calera de Tango, además de la V y VI Región.
                </div>
            </div>

            <!-- FAQ 10 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 10 ? null : 10)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>10. ¿Cómo coordinar una visita técnica para mi piscina?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-teal-400 transition-transform" :class="openFaq === 10 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 10" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Escríbanos directamente al WhatsApp +56 9 4987 7316 indicando su comuna y los centímetros aproximados que pierde al día para una evaluación rápida.
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
