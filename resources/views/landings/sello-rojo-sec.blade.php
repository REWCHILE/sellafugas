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
    <meta property="og:image" content="{{ asset('images/sello-rojo-gas-sec.png') }}">

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
<body class="bg-slate-950 text-slate-100 antialiased selection:bg-brand-500 selection:text-white"
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

    <!-- Top Urgent Ribbon -->
    <div class="bg-rose-700 text-white text-xs py-2 px-4 text-center font-bold tracking-wide flex items-center justify-center gap-3">
        <span class="inline-flex items-center gap-1.5 animate-pulse bg-white/20 px-2 py-0.5 rounded-full">
            <i data-lucide="alert-triangle" class="w-3.5 h-3.5 text-amber-300"></i>
            <span>URGENCIA SELLO ROJO & CORTE DE GAS</span>
        </span>
        <span class="hidden sm:inline">Evita el corte de suministro. Regularizamos tu instalación hoy mismo con Certificado Oficial SEC.</span>
        <a href="tel:+56949877316" class="underline font-black text-amber-200 hover:text-white flex items-center gap-1">
            <i data-lucide="phone" class="w-3.5 h-3.5"></i> 949 877 316
        </a>
    </div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-40 glass-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logotipo-sellafugas.cl.webp') }}" alt="SellafuGas Logo" class="h-11 w-auto rounded-lg shadow-md group-hover:scale-105 transition-transform">
                <div>
                    <span class="font-black text-xl text-white tracking-wide block leading-tight">SELLA<span class="text-sky-400">FU</span><span class="text-emerald-400">GAS</span>®</span>
                    <span class="text-[11px] text-rose-400 font-semibold tracking-wider uppercase">Sello Rojo SEC · Regularización</span>
                </div>
            </a>

            <!-- Full Navigation Menu -->
            <nav class="hidden xl:flex items-center gap-4 text-xs font-semibold text-slate-300">
                <a href="{{ route('landing.fugas-gas') }}" class="hover:text-sky-400 transition-colors">Fugas de Gas</a>
                <a href="{{ route('landing.gasfiter-sec') }}" class="hover:text-sky-400 transition-colors">Gasfíter SEC</a>
                <a href="{{ route('landing.sello-rojo') }}" class="text-rose-400 font-bold border-b-2 border-rose-400 pb-1">Sello Rojo</a>
                <a href="{{ route('landing.gas-trazador') }}" class="hover:text-sky-400 transition-colors">Gas Trazador</a>
                <a href="{{ route('landing.fugas-agua') }}" class="hover:text-sky-400 transition-colors">Fugas de Agua</a>
                <a href="{{ route('landing.fugas-piscinas') }}" class="hover:text-sky-400 transition-colors">Piscinas</a>
                <a href="{{ route('landing.reparacion-calefont') }}" class="hover:text-sky-400 transition-colors">Calefont SEC</a>
                <a href="{{ route('landing.certificados-sec') }}" class="hover:text-sky-400 transition-colors">Certificados DS66</a>
                <a href="{{ route('login') }}" class="text-xs text-slate-400 hover:text-white border border-slate-700 px-2.5 py-1 rounded-lg">
                    Acceso Admin
                </a>
            </nav>

            <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo,%20tengo%20un%20Sello%20Rojo%20de%20gas%20y%20necesito%20regularizacion%20urgente" target="_blank"
               class="px-4 py-2.5 bg-rose-600 hover:bg-rose-500 text-white font-black text-sm rounded-xl shadow-lg shadow-rose-600/25 transition-all flex items-center gap-2">
                <i data-lucide="alert-octagon" class="w-4 h-4"></i>
                <span>Levantar Sello Rojo</span>
            </a>
        </div>
    </header>

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

    <!-- Footer -->
    <footer class="bg-slate-950 border-t border-slate-800 text-slate-400 text-xs py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-3">
                <span class="text-base font-black text-white block">SellafuGas® Sello Rojo SEC</span>
                <p>Especialistas en levantamiento de no conformidades, sellado de fugas de gas y obtención de Sello Verde.</p>
                <p class="text-slate-300">Domingo Isain · SEC Clase 3</p>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Páginas de Servicio</span>
                <ul class="space-y-2">
                    <li><a href="{{ route('landing.fugas-gas') }}" class="hover:text-white">Sellado Fugas de Gas</a></li>
                    <li><a href="{{ route('landing.gasfiter-sec') }}" class="hover:text-white">Gasfíter Certificado SEC</a></li>
                    <li><a href="{{ route('landing.sello-rojo') }}" class="text-rose-400 font-bold">Levantamiento Sello Rojo</a></li>
                    <li><a href="{{ route('landing.gas-trazador') }}" class="hover:text-white">Gas Trazador</a></li>
                    <li><a href="{{ route('landing.fugas-agua') }}" class="hover:text-white">Fugas de Agua</a></li>
                    <li><a href="{{ route('landing.fugas-piscinas') }}" class="hover:text-white">Fugas en Piscinas</a></li>
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
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Certificación SEC</span>
                <p class="text-xs text-slate-300">Superintendencia de Electricidad y Combustibles (SEC) · DS66</p>
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
