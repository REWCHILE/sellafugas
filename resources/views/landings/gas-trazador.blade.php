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
    <meta property="og:image" content="{{ asset('images/gas-trazador-deteccion.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
<body class="bg-slate-950 text-slate-100 antialiased selection:bg-brand-500 selection:text-white"
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

    <!-- Navigation Header -->
    <header class="sticky top-0 z-40 glass-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logotipo-sellafugas.cl.webp') }}" alt="SellafuGas Logo" class="h-11 w-auto rounded-lg shadow-md group-hover:scale-105 transition-transform">
                <div>
                    <span class="font-black text-xl text-white tracking-wide block leading-tight">SELLA<span class="text-sky-400">FU</span><span class="text-emerald-400">GAS</span>®</span>
                    <span class="text-[11px] text-cyan-400 font-semibold tracking-wider uppercase">Gas Trazador · Ultrasonido</span>
                </div>
            </a>

            <!-- Full Navigation Menu -->
            <nav class="hidden xl:flex items-center gap-4 text-xs font-semibold text-slate-300">
                <a href="{{ route('landing.fugas-gas') }}" class="hover:text-sky-400 transition-colors">Fugas de Gas</a>
                <a href="{{ route('landing.gasfiter-sec') }}" class="hover:text-sky-400 transition-colors">Gasfíter SEC</a>
                <a href="{{ route('landing.sello-rojo') }}" class="hover:text-sky-400 transition-colors">Sello Rojo</a>
                <a href="{{ route('landing.gas-trazador') }}" class="text-cyan-400 font-bold border-b-2 border-cyan-400 pb-1">Gas Trazador</a>
                <a href="{{ route('landing.fugas-agua') }}" class="hover:text-sky-400 transition-colors">Fugas de Agua</a>
                <a href="{{ route('landing.fugas-piscinas') }}" class="hover:text-sky-400 transition-colors">Piscinas</a>
                <a href="{{ route('landing.reparacion-calefont') }}" class="hover:text-sky-400 transition-colors">Calefont SEC</a>
                <a href="{{ route('landing.certificados-sec') }}" class="hover:text-sky-400 transition-colors">Certificados DS66</a>
                <a href="{{ route('login') }}" class="text-xs text-slate-400 hover:text-white border border-slate-700 px-2.5 py-1 rounded-lg">
                    Acceso Admin
                </a>
            </nav>

            <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo,%20necesito%20deteccion%20de%20fuga%20con%20Gas%20Trazador" target="_blank"
               class="px-4 py-2.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-sm rounded-xl shadow-lg shadow-emerald-500/25 transition-all flex items-center gap-2">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                <span>Cotizar Gas Trazador</span>
            </a>
        </div>
    </header>

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

    <!-- Footer -->
    <footer class="bg-slate-950 border-t border-slate-800 text-slate-400 text-xs py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-3">
                <span class="text-base font-black text-white block">SellafuGas® Gas Trazador</span>
                <p>Especialistas en detección de fugas ocultas con gas trazador, geófono digital y cámaras térmicas.</p>
                <p class="text-slate-300">Domingo Isain · SEC Clase 3</p>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Páginas de Servicio</span>
                <ul class="space-y-2">
                    <li><a href="{{ route('landing.fugas-gas') }}" class="hover:text-white">Sellado Fugas de Gas</a></li>
                    <li><a href="{{ route('landing.gasfiter-sec') }}" class="hover:text-white">Gasfíter Certificado SEC</a></li>
                    <li><a href="{{ route('landing.sello-rojo') }}" class="hover:text-white">Sello Rojo</a></li>
                    <li><a href="{{ route('landing.gas-trazador') }}" class="text-cyan-400 font-bold">Gas Trazador</a></li>
                    <li><a href="{{ route('landing.fugas-agua') }}" class="hover:text-white">Fugas de Agua</a></li>
                    <li><a href="{{ route('landing.fugas-piscinas') }}" class="hover:text-white">Fugas en Piscinas</a></li>
                </ul>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Contacto</span>
                <ul class="space-y-2">
                    <li>Teléfono: <a href="tel:+56949877316" class="text-white font-bold">+56 9 4987 7316</a></li>
                    <li>WhatsApp: <a href="https://wa.me/56949877316" target="_blank" class="text-emerald-400 font-bold">949 877 316</a></li>
                </ul>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Garantía</span>
                <p class="text-xs text-slate-300">Detección sin roturas destructivas en toda la Región Metropolitana y V/VI Región.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if(window.lucide) lucide.createIcons();
        });
    </script>
</body>
</html>
