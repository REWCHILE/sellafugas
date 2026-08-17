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
    <meta property="og:image" content="{{ asset('images/geofono-deteccion-agua.png') }}">

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
      "name": "Detección No Invasiva de Fugas y Filtraciones Sin Romper",
      "serviceType": "Non-destructive Leak Detection",
      "provider": {
        "@@type": "HVACBusiness",
        "name": "SellafuGas® Domingo Isain",
        "telephone": "+56949877316",
        "url": "https://sellafugas.cl/deteccion-fugas-sin-romper"
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
          "name": "¿Por qué es mejor detectar una fuga sin romper antes de hacer obras?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Detectar de forma no invasiva evita destruir cerámicos descatalogados, picar radier a ciegas, generar polvo y escombros, y reduce los costos de reparación en hasta un 70%."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué tecnologías no invasivas combinan en una inspección?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Combinamos 4 tecnologías: Geófono acústico digital, Gas Trazador (Nitrógeno/Hidrógeno 95/5), Cámara Termográfica infrarroja Fluke y Manometría digital de alta precisión."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Pueden localizar fugas en cañerías embutidas dentro de muros de hormigón o tabiques?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Mediante termografía y gas trazador detectamos fugas empotradas en cualquier tipo de muro sin causar daños superficiales."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué precisión tiene la marcación del punto de fuga?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Marcamos un perímetro exacto de pocos centímetros sobre el piso o pared, permitiendo una apertura mínima y limpia."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuánto demora el servicio de detección no invasiva?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "El diagnóstico completo toma generalmente entre 60 y 90 minutos."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Sirve tanto para redes de gas como de agua potable?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Inspeccionamos cañerías de gas licuado/natural, redes de agua fría, agua caliente sanitaria y circuitos de calefacción central."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Entregan certificado e informe técnico al finalizar?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Emitimos un informe técnico profesional con respaldo fotográfico, mediciones y validez para aseguradoras y empresas de servicios básicos."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué garantía ofrecen por la localización de la fuga?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Garantizamos la precisión del diagnóstico bajo nuestra política 'Usted Paga Después de Solucionado'."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Atienden urgencias en departamentos y condominios?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Contamos con equipamiento portátil silencioso ideal para edificios residenciales sin causar molestias a los vecinos."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo agendar una detección no invasiva?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Escríbanos al WhatsApp +56 9 4987 7316 o llámenos al 949 877 316 para atención técnica inmediata."
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
          tipoFuga: 'Fuga de Gas Oculta',
          openFaq: null,
          submitDeteccion() {
              if(!this.nombre || !this.telefono) {
                  alert('Por favor ingrese su Nombre y Teléfono');
                  return;
              }
              const text = `Hola Domingo Isain (SellafuGas), necesito Detección No Invasiva Sin Romper:\n\n👤 *Nombre:* ${this.nombre}\n📱 *Teléfono:* ${this.telefono}\n📍 *Comuna:* ${this.comuna}\n🔍 *Tipo de Fuga:* ${this.tipoFuga}`;
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
                    <span class="text-[11px] text-emerald-400 font-semibold tracking-wider uppercase">Detección Sin Romper · SEC</span>
                </div>
            </a>

            <!-- Full Navigation Menu -->
            <nav class="hidden xl:flex items-center gap-4 text-xs font-semibold text-slate-300">
                <a href="{{ route('landing.fugas-gas') }}" class="hover:text-sky-400 transition-colors">Fugas de Gas</a>
                <a href="{{ route('landing.gasfiter-sec') }}" class="hover:text-sky-400 transition-colors">Gasfíter SEC</a>
                <a href="{{ route('landing.sello-rojo') }}" class="hover:text-sky-400 transition-colors">Sello Rojo</a>
                <a href="{{ route('landing.gas-trazador') }}" class="hover:text-sky-400 transition-colors">Gas Trazador</a>
                <a href="{{ route('landing.fugas-agua') }}" class="hover:text-sky-400 transition-colors">Fugas de Agua</a>
                <a href="{{ route('landing.fugas-piscinas') }}" class="hover:text-sky-400 transition-colors">Piscinas</a>
                <a href="{{ route('landing.deteccion-sin-romper') }}" class="text-emerald-400 font-bold border-b-2 border-emerald-400 pb-1">Sin Romper</a>
                <a href="{{ route('landing.reparacion-calefont') }}" class="hover:text-sky-400 transition-colors">Calefont SEC</a>
                <a href="{{ route('landing.certificados-sec') }}" class="hover:text-sky-400 transition-colors">Certificados DS66</a>
                <a href="{{ route('login') }}" class="text-xs text-slate-400 hover:text-white border border-slate-700 px-2.5 py-1 rounded-lg">
                    Acceso Admin
                </a>
            </nav>

            <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo,%20necesito%20deteccion%20de%20fuga%20sin%20romper" target="_blank"
               class="px-4 py-2.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-sm rounded-xl shadow-lg shadow-emerald-500/25 transition-all flex items-center gap-2">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                <span>Solicitar Detección</span>
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-16 bg-radial from-slate-900 to-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs font-bold uppercase tracking-wider">
                        <span>Tecnología No Destructiva de Precisión</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        Detección de Fugas <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-sky-400">Sin Romper Muros ni Pisos</span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                        Evita picar cerámicas y radieres a ciegas. Localizamos el punto exacto de la filtración oculta en redes de gas y agua potable utilizando <strong>Geófonos Electroacústicos, Gas Trazador N2/H2 y Cámaras Termográficas</strong> con respaldo de <strong>Domingo Isain (Gasfiter SEC Clase 3)</strong>.
                    </p>

                    <!-- Feature Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span><strong>Cero demolición:</strong> Diagnóstico no invasivo</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span><strong>Ahorro del 70%:</strong> En costos de reparación</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span><strong>Informe Técnico:</strong> Válido para aseguradoras</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span><strong>Usted Paga Después:</strong> De solucionado</span>
                        </div>
                    </div>

                    <!-- Fast Contact Card -->
                    <div class="glass-card p-6 rounded-3xl border border-slate-700 space-y-4 pt-4">
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Agendar Detección No Invasiva:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <input type="text" placeholder="Su Nombre *" x-model="nombre"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-emerald-500">
                            <input type="tel" placeholder="Teléfono *" x-model="telefono"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-emerald-500">
                            <input type="text" placeholder="Comuna *" x-model="comuna"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-emerald-500">
                        </div>

                        <button type="button" @click="submitDeteccion()"
                                class="w-full py-4 bg-gradient-to-r from-emerald-500 via-teal-500 to-sky-500 hover:from-emerald-400 hover:to-sky-400 text-slate-950 font-black text-base rounded-xl shadow-xl shadow-emerald-500/25 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="scan" class="w-5 h-5"></i>
                            <span>Coordinar Detección con Domingo por WhatsApp</span>
                        </button>
                    </div>

                </div>

                <div class="lg:col-span-5 space-y-6">
                    <div class="glass-card p-4 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/geofono-deteccion-agua.png') }}" alt="Equipos de detección no destructiva" class="w-full h-80 object-cover rounded-2xl">
                        <div class="p-4 space-y-2">
                            <span class="text-xs font-bold text-emerald-400 uppercase tracking-wider block">Diagnóstico Avanzado en Terreno</span>
                            <h3 class="text-lg font-bold text-white">Inspección Acústica y Sensorial</h3>
                            <p class="text-xs text-slate-300">Localizamos la fuga invisible con exactitud milimétrica para intervenir únicamente el centímetro necesario.</p>
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
                <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest block mb-2">Preguntas Frecuentes</span>
                <h2 class="text-3xl font-black text-white">10 Preguntas sobre Detección Sin Romper</h2>
                <p class="text-xs text-slate-400 mt-1">Descubre cómo protegemos la estructura de tu hogar con tecnología no destructiva</p>
            </div>

            <!-- FAQ 1 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 1 ? null : 1)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>1. ¿Por qué es mejor detectar una fuga sin romper antes de hacer obras?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 1" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Detectar de forma no invasiva evita destruir cerámicos descatalogados, picar radier a ciegas, generar polvo y escombros, y reduce los costos de reparación en hasta un 70%.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 2 ? null : 2)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>2. ¿Qué tecnologías no invasivas combinan en una inspección?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 2" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Combinamos 4 tecnologías: Geófono acústico digital, Gas Trazador (Nitrógeno/Hidrógeno 95/5), Cámara Termográfica infrarroja Fluke y Manometría digital de alta precisión.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 3 ? null : 3)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>3. ¿Pueden localizar fugas en cañerías embutidas dentro de muros de hormigón o tabiques?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 3" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Mediante termografía y gas trazador detectamos fugas empotradas en cualquier tipo de muro sin causar daños superficiales.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 4 ? null : 4)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>4. ¿Qué precisión tiene la marcación del punto de fuga?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 4" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Marcamos un perímetro exacto de pocos centímetros sobre el piso o pared, permitiendo una apertura mínima y limpia.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 5 ? null : 5)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>5. ¿Cuánto demora el servicio de detección no invasiva?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 5 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 5" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    El diagnóstico completo toma generalmente entre 60 y 90 minutos.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 6 ? null : 6)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>6. ¿Sirve tanto para redes de gas como de agua potable?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 6 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 6" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Inspeccionamos cañerías de gas licuado/natural, redes de agua fría, agua caliente sanitaria y circuitos de calefacción central.
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 7 ? null : 7)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>7. ¿Entregan certificado e informe técnico al finalizar?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 7 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 7" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Emitimos un informe técnico profesional con respaldo fotográfico, mediciones y validez para aseguradoras y empresas de servicios básicos.
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 8 ? null : 8)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>8. ¿Qué garantía ofrecen por la localización de la fuga?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 8 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 8" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Garantizamos la precisión del diagnóstico bajo nuestra política 'Usted Paga Después de Solucionado'.
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 9 ? null : 9)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>9. ¿Atienden urgencias en departamentos y condominios?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 9 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 9" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Contamos con equipamiento portátil silencioso ideal para edificios residenciales sin causar molestias a los vecinos.
                </div>
            </div>

            <!-- FAQ 10 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 10 ? null : 10)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>10. ¿Cómo agendar una detección no invasiva?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 10 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 10" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Escríbanos al WhatsApp +56 9 4987 7316 o llámenos al 949 877 316 para atención técnica inmediata.
                </div>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-950 border-t border-slate-800 text-slate-400 text-xs py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-3">
                <span class="text-base font-black text-white block">SellafuGas® Detección Sin Romper</span>
                <p>Especialistas en detección no destructiva de fugas de gas y agua con tecnología de vanguardia.</p>
                <p class="text-slate-300">Domingo Isain · SEC Clase 3</p>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Servicios</span>
                <ul class="space-y-2">
                    <li><a href="{{ route('landing.fugas-gas') }}" class="hover:text-white">Sellado Fugas de Gas</a></li>
                    <li><a href="{{ route('landing.gasfiter-sec') }}" class="hover:text-white">Gasfíter Certificado SEC</a></li>
                    <li><a href="{{ route('landing.sello-rojo') }}" class="hover:text-white">Sello Rojo</a></li>
                    <li><a href="{{ route('landing.gas-trazador') }}" class="hover:text-white">Gas Trazador</a></li>
                    <li><a href="{{ route('landing.fugas-agua') }}" class="hover:text-white">Fugas de Agua</a></li>
                    <li><a href="{{ route('landing.deteccion-sin-romper') }}" class="text-emerald-400 font-bold">Detección Sin Romper</a></li>
                </ul>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Contacto Directo</span>
                <ul class="space-y-2">
                    <li>Teléfono: <a href="tel:+56949877316" class="text-white font-bold">+56 9 4987 7316</a></li>
                    <li>WhatsApp: <a href="https://wa.me/56949877316" target="_blank" class="text-emerald-400 font-bold">949 877 316</a></li>
                </ul>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Garantía SEC</span>
                <p class="text-xs text-slate-300">Usted Paga Después de Solucionado · Atención en toda la RM y Regiones.</p>
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
