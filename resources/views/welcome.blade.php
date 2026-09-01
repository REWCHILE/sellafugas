<!DOCTYPE html>
<html lang="es" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('partials.meta-tags', [
        'metaTitle' => 'SellafuGas® | Reparación de Fugas de Gas Sin Romper · Prodoral R6-1 · Gasfiter SEC',
        'metaDescription' => 'Sellado de fugas de gas no visibles en cañerías sin romper muros ni pisos. Aplicación oficial de Prodoral R6-1 por Domingo Isain (Gasfiter SEC Clase 3). Garantía 3 años. Llame al 949 877 316.',
        'canonicalUrl' => 'https://sellafugas.cl',
        'metaImage' => asset('images/og-share-whatsapp.jpg')
    ])

    <!-- Favicon -->
    <link rel="icon" type="image/webp" href="{{ asset('images/logotipo-sellafugas.cl.webp') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- LCP Hero Image Preload -->
    <link rel="preload" as="image" href="{{ asset('images/hero-home-main.webp') }}" fetchpriority="high">

    <!-- Production Compiled Tailwind CSS Stylesheet (Non-Render-Blocking) -->
    <link rel="preload" href="{{ asset('css/tailwind.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}"></noscript>

    <!-- Animations Stylesheet (Non-Render-Blocking) -->
    <link rel="preload" href="{{ asset('css/animations.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('css/animations.css') }}"></noscript>

    <!-- Google Fonts (Preloaded & Non-Render-Blocking) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;700;800&family=Plus+Jakarta+Sans:wght@700;800&family=Space+Grotesk:wght@700&display=swap" as="style">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;700;800&family=Plus+Jakarta+Sans:wght@700;800&family=Space+Grotesk:wght@700&display=swap" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;700;800&family=Plus+Jakarta+Sans:wght@700;800&family=Space+Grotesk:wght@700&display=swap"></noscript>

    <!-- Local High-Performance Lucide Icons & Alpine.js -->
    <script defer src="{{ asset('js/lucide.min.js') }}"></script>
    <script defer src="{{ asset('js/alpine.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.requestIdleCallback) {
                requestIdleCallback(function() { if (window.lucide) lucide.createIcons(); });
            } else {
                setTimeout(function() { if (window.lucide) lucide.createIcons(); }, 1);
            }
        });
    </script>

    <style>
        [x-cloak] { display: none !important; }
        
        body {
            font-feature-settings: "cv02", "cv03", "cv04", "cv11";
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .bg-grid-pattern {
            background-size: 48px 48px;
            background-image: 
                linear-gradient(to right, rgba(255, 255, 255, 0.025) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.025) 1px, transparent 1px);
        }
        
        .glass-dark {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.85) 0%, rgba(10, 15, 30, 0.92) 100%);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 4px 24px -1px rgba(0, 0, 0, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.05);
        }

        .glass-card-hover {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.7) 0%, rgba(11, 19, 38, 0.8) 100%);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.07);
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.35), inset 0 1px 0 rgba(255, 255, 255, 0.04);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-card-hover:hover {
            transform: translateY(-4px);
            border-color: rgba(56, 189, 248, 0.35);
            box-shadow: 0 20px 35px -10px rgba(2, 132, 199, 0.25), inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .icon-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 1rem;
            position: relative;
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.15), 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .badge-copper {
            background: linear-gradient(135deg, rgba(234, 88, 12, 0.15) 0%, rgba(194, 65, 12, 0.05) 100%);
            border: 1px solid rgba(251, 146, 60, 0.3);
            color: #fdba74;
        }

        .badge-sec {
            background: linear-gradient(135deg, rgba(5, 150, 105, 0.18) 0%, rgba(2, 132, 199, 0.12) 100%);
            border: 1px solid rgba(16, 185, 129, 0.35);
            color: #6ee7b7;
        }

        .font-tech-num {
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: -0.03em;
        }

        @keyframes pulse-ring {
            0% { transform: scale3d(0.95, 0.95, 1); opacity: 0.8; }
            50% { transform: scale3d(1.15, 1.15, 1); opacity: 0.3; }
            100% { transform: scale3d(0.95, 0.95, 1); opacity: 0.8; }
        }
        .animate-pulse-ring {
            animation: pulse-ring 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            will-change: transform, opacity;
            backface-visibility: hidden;
            transform: translateZ(0);
        }

        @keyframes float-slow {
            0%, 100% { transform: translate3d(0, 0px, 0); }
            50% { transform: translate3d(0, -8px, 0); }
        }
        .animate-float {
            animation: float-slow 4s ease-in-out infinite;
            will-change: transform;
            backface-visibility: hidden;
            transform: translateZ(0);
        }

        .animate-ping, .animate-pulse, .animate-spin {
            will-change: transform, opacity;
            backface-visibility: hidden;
            transform: translateZ(0);
        }
    </style>

    <!-- JSON-LD Schema: LocalBusiness / EmergencyService -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "HVACBusiness",
      "name": "SellafuGas® Domingo Isain - Prodoral R6-1",
      "image": "{{ asset('images/logotipo-sellafugas.cl.webp') }}",
      "@@id": "https://sellafugas.cl",
      "url": "https://sellafugas.cl",
      "telephone": "+56949877316",
      "priceRange": "$300.000 - $850.000 CLP",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "Estado 215 / Av. Libertador Bernardo O'Higgins 1302",
        "addressLocality": "Santiago",
        "addressRegion": "Región Metropolitana",
        "postalCode": "8320000",
        "addressCountry": "CL"
      },
      "geo": {
        "@@type": "GeoCoordinates",
        "latitude": -33.4429,
        "longitude": -70.6483
      },
      "openingHoursSpecification": {
        "@@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
        "opens": "00:00",
        "closes": "23:59"
      },
      "aggregateRating": {
        "@@type": "AggregateRating",
        "ratingValue": "4.95",
        "reviewCount": "194",
        "bestRating": "5",
        "worstRating": "1"
      },
      "founder": {
        "@@type": "Person",
        "name": "Domingo Isain Plaza Caamaño",
        "jobTitle": "Gasfiter Certificado Autorizado SEC Clase 3",
        "knowsAbout": ["Sellado de Fugas de Gas", "Prodoral R6-1", "Pruebas de Hermeticidad DS66", "Detección de Fugas con Ultrasonido y Gas Trazador"]
      },
      "areaServed": [
        "Santiago", "Las Condes", "Vitacura", "Providencia", "Lo Barnechea", 
        "La Reina", "Ñuñoa", "Peñalolén", "La Florida", "Chicureo", "Colina",
        "Maipú", "San Miguel", "San Joaquín", "Macul", "Pudahuel", "Quilicura", 
        "Rancagua", "Valparaíso", "Viña del Mar"
      ]
    }
    </script>

    <!-- JSON-LD Schema: FAQPage (10 Preguntas Reales) -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "FAQPage",
      "mainEntity": [
        {
          "@@type": "Question",
          "name": "¿Cómo se calculan los metros lineales para el sellado de fugas de gas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "La medición se realiza calculando la distancia estimada en metros lineales de cañería desde el medidor o regulador principal hasta la llave de paso de cada artefacto a gas (calefón, cocina, estufa, caldera). En la Región Metropolitana el valor base es de $300.000 neto hasta 10 metros, y cada metro adicional tiene un valor de $25.000 neto."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Por qué el método SellafuGas Prodoral R6-1 no requiere romper muros ni pisos?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Prodoral R6-1 es un producto alemán líquido de alta tecnología que se introduce directamente al interior de la red de cañerías mediante inyección neumática a presión controlada. El producto recorre toda la cañería interior no visible, polimerizando y sellando todas las uniones roscadas y microporosidades de forma hermética y permanente sin necesidad de picar cerámicos ni destruir muros."
          }
        },
        {
          "@@type": "Question",
          "name": "¿El certificado emitido por Domingo Isain es válido ante la SEC y compañías de seguros?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí, absolutamente. Domingo Isain Plaza Caamaño es Gasfíter Certificado Autorizado SEC Clase 3 desde el año 2009 (RUT 12.738.961-6). Al finalizar las pruebas de hermeticidad a 368 mmca bajo Decreto Supremo DS66 Artículo 44.2.3, se entrega el Certificado Oficial de Servicio que cuenta con código QR verificable en la plataforma oficial de la Superintendencia de Electricidad y Combustibles (SEC)."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuánto tiempo demora el procedimiento de sellado en una casa o departamento?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "El procedimiento completo de sellado con Prodoral R6-1 toma menos de 2 horas. Incluye la prueba de diagnóstico inicial, desconexión de artefactos, inyección y purga del sellante alemán, secado neumático y prueba final de hermeticidad estanco a 368 mmca."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué garantía tiene el sellado de cañerías de gas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Otorgamos 3 años de garantía por escrito por efectos de sellado de fugas de gas en la red interior tratada."
          }
        },
        {
          "@@type": "Question",
          "name": "¿En qué consiste la condición 'Usted Paga Después de Solucionado'?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Nuestra política de máxima confianza y seguridad garantiza que el cliente solo realiza el pago una vez que el procedimiento ha concluido con éxito y se ha demostrado la total hermeticidad de la instalación mediante manómetro digital sin caídas de presión."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué normas técnicas cumple el producto Prodoral R6-1 en Chile?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Prodoral R6-1 cumple rigurosamente con las normativas internacionales DIN EN 13090 y NAG-203, y está aceptado por la Superintendencia de Electricidad y Combustibles (SEC) bajo el Decreto Supremo 66 Artículo 7."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Se deben desconectar artefactos a gas durante el sellado?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Nuestro servicio incluye la desconexión cuidadosa y posterior reconexión de todos los artefactos a gas (calefón, cocina, estufas, calderas) para aislar la red durante la inyección y asegurar una hermeticidad total."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué cobertura tienen en Santiago y regiones?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Atendemos de forma inmediata en toda la Región Metropolitana (Las Condes, Vitacura, Providencia, Lo Barnechea, Chicureo, La Reina, Ñuñoa, La Florida, Maipú, Santiago Centro, etc.), Quinta Región (Valparaíso, Viña del Mar, Quilpué, etc.) y Sexta Región (Rancagua, Machalí, etc.)."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo solicito atención inmediata si tengo gas cortado por sello rojo o emergencia?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Puede comunicarse directamente al teléfono / WhatsApp +56 9 4987 7316 (949 877 316) o completar el cotizador en línea. Atendemos emergencias y urgencias el mismo día para reestablecer el suministro de gas a la brevedad."
          }
        }
      ]
    }
    </script>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased selection:bg-brand-500 selection:text-white bg-grid-pattern min-h-screen relative overflow-x-hidden"
      x-data="{
          activeFaq: null,
          metros: 12,
          zone: 'rm',
          comuna: 'Las Condes',
          provincia: 'Santiago',
          direccion: '',
          nombre: '',
          telefono: '',
          email: '',
          detalles: '',
          taxType: 'neto',
          submitting: false,
          quoteSubmitted: false,
          quoteFolio: '',
          quoteTotalFormatted: '',
          quoteSubtotalFormatted: '',
          whatsappRedirectUrl: '',
          
          get basePrice() {
              if (this.zone === 'v_vi') return 350000;
              if (this.zone === 'otras') return 400000;
              return 300000;
          },
          get extraMeterPrice() {
              if (this.zone === 'v_vi') return 30000;
              if (this.zone === 'otras') return 35000;
              return 25000;
          },
          get extraMeters() {
              return Math.max(0, parseInt(this.metros || 10) - 10);
          },
          get subtotalNeto() {
              return this.basePrice + (this.extraMeters * this.extraMeterPrice);
          },
          get taxAmount() {
              return this.taxType === 'factura' ? Math.round(this.subtotalNeto * 0.19) : 0;
          },
          get totalPrice() {
              return this.subtotalNeto + this.taxAmount;
          },
          formatCLP(val) {
              return '$' + new Intl.NumberFormat('es-CL').format(val || 0);
          },
          
          async submitQuote() {
              if (!this.nombre || !this.telefono || !this.comuna) {
                  alert('Por favor complete Nombre, Teléfono y Comuna para generar su cotización.');
                  return;
              }
              this.submitting = true;
              try {
                  const res = await fetch('{{ route('quote.public.store') }}', {
                      method: 'POST',
                      headers: {
                          'Content-Type': 'application/json',
                          'X-CSRF-TOKEN': '{{ csrf_token() }}',
                          'Accept': 'application/json',
                      },
                      body: JSON.stringify({
                          metros: this.metros,
                          zone: this.zone,
                          comuna: this.comuna,
                          provincia: this.provincia,
                          direccion: this.direccion,
                          nombre: this.nombre,
                          telefono: this.telefono,
                          email: this.email,
                          detalles: this.detalles,
                          tax_type: this.taxType,
                      })
                  });
                  const data = await res.json();
                  if (data.success) {
                      this.quoteFolio = data.folio;
                      this.quoteTotalFormatted = data.pricing.formatted_total;
                      this.quoteSubtotalFormatted = data.pricing.formatted_subtotal;
                      this.whatsappRedirectUrl = data.whatsapp_url;
                      this.quoteSubmitted = true;
                  } else {
                      alert('Ocurrió un error al procesar la cotización. Por favor contáctenos directamente al +56 9 4987 7316');
                  }
              } catch (e) {
                  console.error(e);
                  const fallbackMsg = `Hola Domingo Isain (SellafuGas), deseo cotizar sellado de ${this.metros} metros lineales en ${this.comuna}. Total estimado: ${this.formatCLP(this.totalPrice)}. Mi nombre es ${this.nombre} (${this.telefono}).`;
                  window.open(`https://api.whatsapp.com/send?phone=56949877316&text=${encodeURIComponent(fallbackMsg)}`, '_blank');
              } finally {
                  this.submitting = false;
              }
          }
      }">

    <!-- Header Navigation & Mobile Drawer -->
    @include('partials.landing-header')

    <!-- MAIN CONTENT LANDMARK REGION FOR ACCESSIBILITY -->
    <main id="main-content" class="overflow-x-hidden">

    <!-- HERO SECTION WITH DYNAMIC BACKGROUND SLIDER -->
    <section id="hero" class="relative pt-12 pb-20 lg:pt-20 lg:pb-28 overflow-hidden"
             x-data="{ 
                 currentSlide: 0, 
                 slides: [
                     '{{ asset('images/hero-home-main.webp') }}',
                     '{{ asset('images/hero-prodoral.webp') }}',
                     '{{ asset('images/hero-sec.webp') }}',
                     '{{ asset('images/hero-fuga-gas.webp') }}'
                 ],
                 init() {
                     setInterval(() => {
                         this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                     }, 5000);
                 }
             }">
        
        <!-- Dynamic Background Image Slider with Ken Burns & Smooth Fade -->
        <div class="absolute inset-0 -z-20 overflow-hidden pointer-events-none">
            <!-- First slide rendered as native HTML <img> for instantaneous LCP -->
            <img src="{{ asset('images/hero-home-main.webp') }}"
                 alt="SellafuGas Reparación de Fugas de Gas Sin Romper"
                 width="1920" height="1080"
                 fetchpriority="high" decoding="async"
                 class="absolute inset-0 w-full h-full object-cover object-center filter brightness-90 contrast-105 transition-all duration-1000"
                 :class="currentSlide === 0 ? 'opacity-80 scale-100 duration-[6000ms] ease-out' : 'opacity-0 scale-105'">
            
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="index > 0" class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 transform filter brightness-90 contrast-105"
                     :class="currentSlide === index ? 'opacity-80 scale-100 transition-all duration-[6000ms] ease-out' : 'opacity-0 scale-105'"
                     :style="`background-image: url('${slide}');`">
                </div>
            </template>
        </div>

        <!-- Directional Cinematic Gradient Overlays (Focused contrast on text, vibrant image visibility) -->
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/90 via-slate-950/60 to-slate-950/35 -z-10 pointer-events-none"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent -z-10 pointer-events-none"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/70 via-transparent to-transparent -z-10 pointer-events-none"></div>
        <!-- Fixed top pixel position to eliminate 0.129 CLS layout shift -->
        <div class="absolute top-28 sm:top-36 left-1/2 -translate-x-1/2 w-full max-w-[500px] h-[300px] bg-sky-600/15 blur-[100px] pointer-events-none -z-10 overflow-hidden"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Hero Left Column: Main Headlines & Value Props -->
                <div class="lg:col-span-7 space-y-7">
                    
                    <!-- Trust Badges Pill -->
                    <div data-animate="fade-down" data-delay="100" class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-slate-900/95 border border-emerald-500/40 text-xs sm:text-sm font-bold text-emerald-300 shadow-xl shadow-emerald-950/50">
                        <span class="p-1 rounded-full bg-emerald-500 text-slate-950">
                            <i data-lucide="check" class="w-3.5 h-3.5 stroke-[3]"></i>
                        </span>
                        <span>Tecnología Alemana Prodoral R6-1 · Especialistas Desde 2009</span>
                    </div>

                    <!-- Main H1 Title -->
                    <h1 data-animate="fade-up" data-delay="150" class="font-display text-4xl sm:text-6xl lg:text-7xl font-black text-white tracking-tight leading-[1.08]">
                        Reparación de Fugas de Gas <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-cyan-300 to-emerald-400">Sin Romper Muros</span> ni Pisos
                    </h1>

                    <!-- Hero Subtitle & Domingo Isain Credential -->
                    <p data-animate="fade-up" data-delay="200" class="text-base sm:text-xl text-slate-200 leading-relaxed font-normal">
                        Servicio técnico especializado en sellado de cañerías no visibles con <strong>Prodoral R6-1</strong>. Procedimiento limpio en <strong class="text-emerald-400 font-bold">menos de 2 horas</strong>, prueba de hermeticidad certificada y entrega de <strong class="text-sky-400 font-bold">Certificado Oficial SEC</strong> para seguros y empresas de inspección.
                    </p>

                    <!-- Key Selling Point Cards -->
                    <div data-animate="fade-up" data-delay="250" data-stagger class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-2">
                        <div class="glass-dark p-4 rounded-2xl border border-slate-700/80 hover-lift">
                            <div class="flex items-center gap-2 text-emerald-400 mb-1.5">
                                <i data-lucide="shield-check" class="w-6 h-6"></i>
                                <span class="font-display font-black text-base text-white">Garantía 3 Años</span>
                            </div>
                            <p class="text-xs text-slate-300 font-medium">Por escrito ante cualquier efecto de sellado</p>
                        </div>
                        <div class="glass-dark p-4 rounded-2xl border border-slate-700/80 hover-lift">
                            <div class="flex items-center gap-2 text-sky-400 mb-1.5">
                                <i data-lucide="clock" class="w-6 h-6"></i>
                                <span class="font-display font-black text-base text-white">Menos de 2 Horas</span>
                            </div>
                            <p class="text-xs text-slate-300 font-medium">Procedimiento rápido sin escombros</p>
                        </div>
                        <div class="glass-dark p-4 rounded-2xl border border-slate-700/80 col-span-2 sm:col-span-1 hover-lift">
                            <div class="flex items-center gap-2 text-amber-400 mb-1.5">
                                <i data-lucide="handshake" class="w-6 h-6"></i>
                                <span class="font-display font-black text-base text-white">Paga Solucionado</span>
                            </div>
                            <p class="text-xs text-slate-300 font-medium">Comprobada la hermeticidad a 368 mmca</p>
                        </div>
                    </div>

                    <!-- CTA Action Buttons -->
                    <div data-animate="fade-up" data-delay="300" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-3">
                        <a href="#cotizador" class="px-8 py-4 bg-gradient-to-r from-emerald-600 via-teal-600 to-sky-600 hover:from-emerald-500 hover:to-sky-500 text-white font-black text-lg rounded-2xl shadow-xl shadow-emerald-600/30 transition-all flex items-center justify-center gap-3 transform hover:-translate-y-1 hover:scale-[1.02] hover:shadow-neon-emerald">
                            <i data-lucide="calculator" class="w-6 h-6"></i>
                            <span>Calcular Cotización Online</span>
                        </a>
                        <a href="tel:949877316" class="px-7 py-4 bg-slate-900/95 hover:bg-slate-800 text-white font-bold text-base rounded-2xl border border-slate-700 transition-all flex items-center justify-center gap-3.5 shadow-lg hover-lift">
                            <div class="p-2 rounded-xl bg-emerald-500/20 text-emerald-400">
                                <i data-lucide="phone" class="w-5 h-5"></i>
                            </div>
                            <div class="text-left">
                                <span class="block text-xs text-slate-400 uppercase font-bold tracking-wider leading-none mb-1">Llamar Ahora</span>
                                <span class="text-xl font-tech font-black text-white leading-none">949 877 316</span>
                            </div>
                        </a>
                    </div>

                    <!-- Direct Verification Badge -->
                    <div data-animate="fade-up" data-delay="350" class="flex items-center gap-3 pt-3 text-xs sm:text-sm text-slate-300 border-t border-slate-800/80">
                        <img src="{{ asset('images/logotipo-sec.webp') }}" alt="SEC" width="120" height="92" class="h-7 w-auto opacity-95">
                        <span>Gasfiter Certificado Autorizado SEC Clase 3 · <strong>Domingo Isain Plaza Caamaño</strong> (RUT 12.738.961-6)</span>
                    </div>

                </div>

                <!-- Hero Right Column: Domingo Profile & Technology Card -->
                <div class="lg:col-span-5" data-animate="fade-left" data-delay="200">
                    <div class="relative">
                        
                        <!-- Glowing card frame -->
                        <div class="glass-dark p-6 sm:p-7 rounded-3xl border border-slate-700/80 shadow-2xl space-y-6 relative overflow-hidden hover-lift">
                            
                            <!-- Technician Header -->
                            <div class="flex items-center gap-4 pb-5 border-b border-slate-800">
                                <div class="relative">
                                    <img src="{{ asset('images/domingo-isain.webp') }}" alt="Domingo Isain - Gasfiter Certificado SEC" width="160" height="160" class="w-20 h-20 rounded-2xl object-cover border-2 border-emerald-400 shadow-lg">
                                    <span class="absolute -bottom-1 -right-1 bg-emerald-500 text-slate-950 p-1 rounded-full" title="Técnico Certificado SEC">
                                        <i data-lucide="check-circle" class="w-4 h-4 stroke-[3]"></i>
                                    </span>
                                </div>
                                <div>
                                    <div class="inline-block px-2.5 py-0.5 rounded-full bg-sky-500/10 text-sky-400 text-xs font-bold uppercase tracking-wider mb-1">
                                        Especialista Responsable
                                    </div>
                                    <h2 class="text-xl font-black text-white font-display leading-tight">Domingo Isain Plaza Caamaño</h2>
                                    <p class="text-xs sm:text-sm text-emerald-400 font-bold mt-0.5">Gasfíter Certificado Autorizado SEC</p>
                                    <p class="text-xs text-slate-300 font-tech">RUT: 12.738.961-6 · Clase 3</p>
                                </div>
                            </div>

                            <!-- Live SEC QR Verification Interactive Card -->
                            <div class="bg-slate-900/90 p-4 sm:p-5 rounded-2xl border border-slate-800 flex items-center justify-between gap-4">
                                <div class="space-y-1">
                                    <div class="text-sm font-bold text-white flex items-center gap-2">
                                        <i data-lucide="qr-code" class="w-4 h-4 text-emerald-400"></i>
                                        <span>Credencial Oficial SEC</span>
                                    </div>
                                    <p class="text-xs text-slate-300 leading-relaxed">Escanee o presione para verificar registro en el portal oficial de la SEC Chile.</p>
                                    <a href="https://wlhttp.sec.cl/rnii/public/licencia/qr?o=285eb263edf5cb049f3f4cc7fa0d2182" target="_blank" class="inline-flex items-center gap-1.5 text-xs text-sky-400 hover:text-sky-300 font-bold underline mt-1.5">
                                        <span>Validar en wlhttp.sec.cl</span>
                                        <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                                    </a>
                                </div>
                                <a href="https://wlhttp.sec.cl/rnii/public/licencia/qr?o=285eb263edf5cb049f3f4cc7fa0d2182" target="_blank" class="shrink-0 p-2 bg-white rounded-2xl shadow-md hover:scale-105 transition-transform">
                                    <img src="{{ asset('images/qr-sec.webp') }}" alt="QR SEC Domingo Isain" width="100" height="100" class="w-16 h-16 object-contain">
                                </a>
                            </div>

                            <!-- Fast Pricing Snapshot Banner -->
                            <div class="p-4 sm:p-5 rounded-2xl bg-gradient-to-br from-emerald-950/90 to-slate-900 border border-emerald-500/40 space-y-2.5">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-slate-200 font-semibold">Precio Base RM (Hasta 10m):</span>
                                    <span class="font-tech font-black text-emerald-400 text-lg">$300.000 <span class="text-xs font-normal text-slate-400">neto</span></span>
                                </div>
                                <div class="flex items-center justify-between text-sm border-t border-slate-800 pt-2">
                                    <span class="text-slate-300">Metro adicional cañería:</span>
                                    <span class="font-tech font-bold text-white">$25.000 <span class="text-xs text-slate-400">neto</span></span>
                                </div>
                                <div class="text-xs text-emerald-300 pt-1 flex items-center gap-1.5 font-medium">
                                    <i data-lucide="check" class="w-4 h-4"></i>
                                    <span>Incluye desconexión, inyección, pruebas y Certificado SEC</span>
                                </div>
                            </div>

                            <!-- Emergency Floating Action -->
                            <a href="#cotizador" class="w-full py-3.5 bg-sky-500/20 hover:bg-sky-500/30 text-sky-300 border border-sky-500/40 rounded-2xl font-bold text-sm text-center flex items-center justify-center gap-2 transition-all hover:scale-[1.02]">
                                <i data-lucide="arrow-down-circle" class="w-4 h-4 text-sky-400"></i>
                                <span>Ir al Cotizador por Metros Lineales</span>
                            </a>

                        </div>

                    </div>
                </div>

            </div>

            <!-- Slide Indicators / Dots -->
            <div class="flex items-center justify-center gap-1 pt-8">
                <template x-for="(slide, index) in slides" :key="index">
                    <button type="button" 
                            @click="currentSlide = index" 
                            :aria-label="'Diapositiva ' + (index + 1)"
                            class="p-2.5 min-w-[32px] min-h-[32px] flex items-center justify-center focus:outline-none cursor-pointer">
                        <span class="h-2 rounded-full transition-all duration-300"
                              :class="currentSlide === index ? 'w-8 bg-emerald-400 shadow-md shadow-emerald-500/50' : 'w-2 bg-slate-700 hover:bg-slate-500'"></span>
                    </button>
                </template>
            </div>

        </div>
    </section>

    <!-- SECTION: TRUST BAR & ACCREDITATION BADGES (SCALED UP) -->
    <div class="border-y border-slate-800/80 bg-slate-900/60 backdrop-blur-md relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6 text-left">
                
                <!-- Badge 1: SEC -->
                <div class="flex items-center gap-4 p-5 sm:p-6 rounded-2xl sm:rounded-3xl bg-slate-950/60 border border-slate-800/80 hover:border-emerald-500/40 transition-all hover-lift">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-500/20 to-slate-900 border border-emerald-500/40 text-emerald-400 shrink-0 flex items-center justify-center shadow-lg">
                        <i data-lucide="shield-check" class="w-7 h-7"></i>
                    </div>
                    <div class="space-y-0.5">
                        <div class="text-base sm:text-lg font-black text-white font-display">SEC Clase 3 Vigente</div>
                        <div class="text-xs sm:text-sm text-slate-300 font-tech">RUT 12.738.961-6</div>
                    </div>
                </div>

                <!-- Badge 2: Prodoral -->
                <div class="flex items-center gap-4 p-5 sm:p-6 rounded-2xl sm:rounded-3xl bg-slate-950/60 border border-slate-800/80 hover:border-sky-500/40 transition-all hover-lift">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-sky-500/20 to-slate-900 border border-sky-500/40 text-sky-400 shrink-0 flex items-center justify-center shadow-lg">
                        <i data-lucide="award" class="w-7 h-7"></i>
                    </div>
                    <div class="space-y-0.5">
                        <div class="text-base sm:text-lg font-black text-white font-display">Prodoral R6-1 Alemán</div>
                        <div class="text-xs sm:text-sm text-slate-300">DIN EN 13090 · DS66 SEC</div>
                    </div>
                </div>

                <!-- Badge 3: 3 Años Garantía -->
                <div class="flex items-center gap-4 p-5 sm:p-6 rounded-2xl sm:rounded-3xl bg-slate-950/60 border border-slate-800/80 hover:border-amber-500/40 transition-all hover-lift">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500/20 to-slate-900 border border-amber-500/40 text-amber-400 shrink-0 flex items-center justify-center shadow-lg">
                        <i data-lucide="clock" class="w-7 h-7"></i>
                    </div>
                    <div class="space-y-0.5">
                        <div class="text-base sm:text-lg font-black text-white font-display">Garantía 3 Años</div>
                        <div class="text-xs sm:text-sm text-slate-300">Certificado por Escrito</div>
                    </div>
                </div>

                <!-- Badge 4: Paga al Solucionar -->
                <div class="flex items-center gap-4 p-5 sm:p-6 rounded-2xl sm:rounded-3xl bg-slate-950/60 border border-slate-800/80 hover:border-teal-500/40 transition-all hover-lift">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-teal-500/20 to-slate-900 border border-teal-500/40 text-teal-400 shrink-0 flex items-center justify-center shadow-lg">
                        <i data-lucide="handshake" class="w-7 h-7"></i>
                    </div>
                    <div class="space-y-0.5">
                        <div class="text-base sm:text-lg font-black text-white font-display">Paga al Solucionar</div>
                        <div class="text-xs sm:text-sm text-slate-300">Hermeticidad Comprobada</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- SECTION: EMERGENCY SAFETY PROTOCOL (¿HUELE A GAS?) - BALANCED & PROPORTIONAL -->
    <section id="emergencia-gas" class="py-12 sm:py-16 bg-gradient-to-r from-rose-950/40 via-slate-900 to-amber-950/30 border-b border-rose-900/40 relative overflow-hidden">
        
        <!-- Background subtle hazard glow -->
        <div class="absolute -right-20 -top-20 w-96 h-96 bg-rose-500/10 blur-[120px] pointer-events-none"></div>
        <div class="absolute -left-20 -bottom-20 w-96 h-96 bg-amber-500/10 blur-[120px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-dark border-2 border-rose-500/30 rounded-3xl p-6 sm:p-10 lg:p-12 shadow-2xl space-y-8 relative overflow-hidden">

                <!-- Top Header & Action Row -->
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6 pb-8 border-b border-slate-800/80">
                    <div class="space-y-3 max-w-2xl">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-rose-500/20 text-rose-400 border border-rose-500/40 text-xs font-black uppercase tracking-wider animate-pulse">
                            <i data-lucide="alert-triangle" class="w-4 h-4"></i>
                            <span>Protocolo de Seguridad Oficial SEC</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-white font-display tracking-tight leading-tight">
                            ¿Huele a Gas en este Momento?
                        </h2>
                        <p class="text-sm sm:text-base text-slate-300 leading-relaxed font-normal">
                            Siga estos <strong class="text-white font-bold">3 pasos inmediatos</strong> para proteger su hogar. Atendemos emergencias y sellado en el mismo día.
                        </p>
                    </div>

                    <!-- Direct Emergency Buttons in Header -->
                    <div class="flex flex-col sm:flex-row items-stretch gap-3.5 w-full lg:w-auto shrink-0">
                        <a href="tel:949877316" class="py-3.5 px-6 bg-gradient-to-r from-rose-600 to-rose-500 hover:from-rose-500 hover:to-rose-400 text-white font-black text-sm sm:text-base rounded-2xl shadow-xl shadow-rose-600/30 flex items-center justify-center gap-3 transition-all hover:scale-[1.02]">
                            <i data-lucide="phone-call" class="w-5 h-5"></i>
                            <span class="font-display">Llamar: 949 877 316</span>
                        </a>

                        <a href="https://api.whatsapp.com/send?phone=56949877316&text=URGENTE%20Domingo%20Isain%2C%20tengo%20fuga%20de%20gas%20en%20mi%20domicilio%2C%20necesito%20atencion%20urgente" target="_blank"
                           class="py-3.5 px-6 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-sm sm:text-base rounded-2xl shadow-xl shadow-emerald-500/30 flex items-center justify-center gap-3 transition-all hover:scale-[1.02]">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                            <span class="font-display">WhatsApp Urgencias SEC</span>
                        </a>
                    </div>
                </div>

                <!-- 3 Balanced Step Cards Row -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-6">
                    
                    <!-- Step 1 -->
                    <div class="p-6 rounded-2xl bg-slate-950/70 border border-slate-800 hover:border-rose-500/40 transition-all space-y-4 hover-lift">
                        <div class="flex items-center justify-between">
                            <span class="px-3 py-1 rounded-lg bg-rose-500/20 text-rose-400 font-tech font-bold text-xs uppercase tracking-wider border border-rose-500/30">
                                Paso 01
                            </span>
                            <div class="p-2.5 rounded-xl bg-rose-500/10 text-rose-400">
                                <i data-lucide="shield-alert" class="w-6 h-6"></i>
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <h3 class="text-lg font-black text-white font-display">Cerrar Llave de Paso</h3>
                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                                Corte de inmediato la válvula del medidor general o cilindro de gas para suspender el suministro.
                            </p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="p-6 rounded-2xl bg-slate-950/70 border border-slate-800 hover:border-amber-500/40 transition-all space-y-4 hover-lift">
                        <div class="flex items-center justify-between">
                            <span class="px-3 py-1 rounded-lg bg-amber-500/20 text-amber-400 font-tech font-bold text-xs uppercase tracking-wider border border-amber-500/30">
                                Paso 02
                            </span>
                            <div class="p-2.5 rounded-xl bg-amber-500/10 text-amber-400">
                                <i data-lucide="wind" class="w-6 h-6"></i>
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <h3 class="text-lg font-black text-white font-display">Ventilar sin Luces</h3>
                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                                Abra ventanas y puertas. <strong class="text-amber-300">No accione</strong> interruptores, timbres ni fósforos para evitar chispas.
                            </p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="p-6 rounded-2xl bg-slate-950/70 border border-slate-800 hover:border-emerald-500/40 transition-all space-y-4 hover-lift">
                        <div class="flex items-center justify-between">
                            <span class="px-3 py-1 rounded-lg bg-emerald-500/20 text-emerald-400 font-tech font-bold text-xs uppercase tracking-wider border border-emerald-500/30">
                                Paso 03
                            </span>
                            <div class="p-2.5 rounded-xl bg-emerald-500/10 text-emerald-400">
                                <i data-lucide="shield-check" class="w-6 h-6"></i>
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <h3 class="text-lg font-black text-white font-display">Llamar a Urgencias SEC</h3>
                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                                Acudimos para sellar con Prodoral R6-1 en <strong class="text-emerald-400">menos de 2 horas sin picar</strong> y con certificado SEC.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- SECTION: REAL-TIME PRICE CALCULATOR & QUOTE FORM -->
    <section id="cotizador" class="py-16 lg:py-24 bg-slate-900/60 border-y border-slate-800/80 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div data-animate="fade-up" class="text-center max-w-3xl mx-auto space-y-4 mb-12">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-bold uppercase tracking-wider">
                    <i data-lucide="calculator" class="w-4 h-4"></i>
                    <span>Cotizador Interactivo en Tiempo Real</span>
                </div>
                <h2 class="font-display text-3xl sm:text-4xl font-black text-white tracking-tight">
                    Cotiza tu Sellado de Fugas de Gas
                </h2>
                <p class="text-slate-400 text-sm sm:text-base">
                    Calcule el valor exacto según los metros lineales de cañería no visible desde el medidor hasta sus artefactos. Precios transparentes sin costos ocultos.
                </p>
            </div>

            <!-- Main Interactive Card -->
            <div data-animate="fade-scale" data-delay="150" class="glass-dark rounded-3xl border border-slate-800 shadow-2xl overflow-hidden grid grid-cols-1 lg:grid-cols-12 hover-lift">
                
                <!-- Left Form Column -->
                <div class="lg:col-span-7 p-6 sm:p-10 space-y-6">
                    
                    <!-- 1. Region Selector -->
                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2 flex items-center justify-between">
                            <span>1. Seleccione su Región o Zona</span>
                            <span class="text-emerald-400 text-[11px] font-semibold">Tarifas según zona geográfica</span>
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <button type="button" x-on:click="zone = 'rm'; provincia = 'Santiago'"
                                    :class="zone === 'rm' ? 'bg-emerald-950/90 border-emerald-400 text-emerald-200 ring-2 ring-emerald-500/20 shadow-lg' : 'bg-slate-900 border-slate-800 text-slate-400 hover:border-slate-700'"
                                    class="p-3.5 rounded-xl text-left border-2 transition-colors duration-150">
                                <div class="font-bold text-xs uppercase tracking-wide">Santiago (RM)</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Base $300k · +$25k/m</div>
                            </button>

                            <button type="button" x-on:click="zone = 'v_vi'; provincia = 'Valparaíso / Rancagua'"
                                    :class="zone === 'v_vi' ? 'bg-sky-950/90 border-sky-400 text-sky-200 ring-2 ring-sky-500/20 shadow-lg' : 'bg-slate-900 border-slate-800 text-slate-400 hover:border-slate-700'"
                                    class="p-3.5 rounded-xl text-left border-2 transition-colors duration-150">
                                <div class="font-bold text-xs uppercase tracking-wide">V y VI Región</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Base $350k · +$30k/m</div>
                            </button>

                            <button type="button" x-on:click="zone = 'otras'; provincia = 'Otras Regiones'"
                                    :class="zone === 'otras' ? 'bg-amber-950/90 border-amber-400 text-amber-200 ring-2 ring-amber-500/20 shadow-lg' : 'bg-slate-900 border-slate-800 text-slate-400 hover:border-slate-700'"
                                    class="p-3.5 rounded-xl text-left border-2 transition-colors duration-150">
                                <div class="font-bold text-xs uppercase tracking-wide">Otras Regiones</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Base $400k · +$35k/m</div>
                            </button>
                        </div>
                    </div>

                    <!-- 2. Metros Lineales Slider & Number Input -->
                    <div class="space-y-3 p-4 rounded-2xl bg-slate-900/80 border border-slate-800">
                        <div class="flex items-center justify-between">
                            <label for="metros-input" class="block text-xs font-bold text-slate-300 uppercase tracking-wider">
                                2. Metros Lineales Estimados a Sellar:
                            </label>
                            <div class="flex items-center gap-2">
                                <span class="text-2xl font-black text-emerald-400 font-display" x-text="metros"></span>
                                <span class="text-xs text-slate-400 uppercase font-bold">Metros</span>
                            </div>
                        </div>
                        <input id="metros-input" aria-label="Metros Lineales Estimados a Sellar" type="range" min="1" max="100" step="1" x-model="metros"
                               class="w-full h-2 bg-slate-800 rounded-lg appearance-none cursor-pointer accent-emerald-500">
                        <div class="flex items-center justify-between text-[11px] text-slate-500">
                            <span>1 Metro</span>
                            <span>10m (Base mínima)</span>
                            <span>30m</span>
                            <span>50m</span>
                            <span>100m+</span>
                        </div>
                        <p class="text-[11px] text-slate-400">
                            * El metraje se calcula aproximadamente desde el medidor hasta la llave de paso de cada artefacto a gas.
                        </p>
                    </div>

                    <!-- 3. Communes & Address -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                                Comuna <span class="text-rose-400">*</span>
                            </label>
                            <input type="text" x-model="comuna" placeholder="Ej: Las Condes, Providencia, Maipú..."
                                   class="w-full bg-slate-900 border border-slate-800 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-xl px-3.5 py-2.5 text-sm text-white placeholder-slate-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                                Dirección / Calle y N° (Opcional)
                            </label>
                            <input type="text" x-model="direccion" placeholder="Ej: Av. Apoquindo 4500, Depto 301"
                                   class="w-full bg-slate-900 border border-slate-800 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-xl px-3.5 py-2.5 text-sm text-white placeholder-slate-500">
                        </div>
                    </div>

                    <!-- 4. Client Contact Details -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                                Su Nombre <span class="text-rose-400">*</span>
                            </label>
                            <input type="text" x-model="nombre" placeholder="Nombre y Apellido"
                                   class="w-full bg-slate-900 border border-slate-800 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-xl px-3.5 py-2.5 text-sm text-white placeholder-slate-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                                Teléfono / WhatsApp <span class="text-rose-400">*</span>
                            </label>
                            <input type="tel" x-model="telefono" placeholder="+56 9 XXXX XXXX"
                                   class="w-full bg-slate-900 border border-slate-800 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-xl px-3.5 py-2.5 text-sm text-white placeholder-slate-500">
                        </div>
                    </div>

                    <!-- 5. Tax Type Selector -->
                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                            Tipo de Comprobante
                        </label>
                        <div class="flex items-center gap-4 text-xs">
                            <label class="flex items-center gap-2 cursor-pointer text-slate-300">
                                <input type="radio" name="taxType" value="neto" x-model="taxType" class="text-emerald-500 focus:ring-emerald-500">
                                <span>Neto Directo</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer text-slate-300">
                                <input type="radio" name="taxType" value="factura" x-model="taxType" class="text-emerald-500 focus:ring-emerald-500">
                                <span>Factura con IVA (+19%)</span>
                            </label>
                        </div>
                    </div>

                    <!-- 6. Additional Notes -->
                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                            Artefactos o Detalles de la Fuga (Opcional)
                        </label>
                        <textarea x-model="detalles" rows="2" placeholder="Ej: Calefón en logia y cocina a gas. Presenta olor a gas en pasillo."
                                  class="w-full bg-slate-900 border border-slate-800 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-xl px-3.5 py-2 text-sm text-white placeholder-slate-500"></textarea>
                    </div>

                </div>

                <!-- Right Live Computation & Action Column -->
                <div class="lg:col-span-5 bg-gradient-to-b from-slate-900/90 to-slate-950 p-6 sm:p-10 border-t lg:border-t-0 lg:border-l border-slate-800 flex flex-col justify-between space-y-6">
                    
                    <div class="space-y-5">
                        
                        <div class="pb-4 border-b border-slate-800">
                            <span class="text-xs text-sky-400 font-bold uppercase tracking-wider block">Resumen de Cotización</span>
                            <h3 class="text-xl font-black text-white mt-1">Sellado Prodoral R6-1</h3>
                            <p class="text-xs text-slate-400" x-text="zone === 'rm' ? 'Santiago (Región Metropolitana)' : (zone === 'v_vi' ? 'Quinta y Sexta Región' : 'Otras Regiones')"></p>
                        </div>

                        <!-- Price Breakdown List -->
                        <div class="space-y-3 text-xs">
                            <div class="flex items-center justify-between text-slate-300">
                                <span>Base mínima (Hasta 10 metros):</span>
                                <span class="font-bold text-white" x-text="formatCLP(basePrice)"></span>
                            </div>

                            <div class="flex items-center justify-between text-slate-300" x-show="extraMeters > 0">
                                <span>Metros adicionales (<span x-text="extraMeters"></span>m x <span x-text="formatCLP(extraMeterPrice)"></span>):</span>
                                <span class="font-bold text-white" x-text="formatCLP(extraMeters * extraMeterPrice)"></span>
                            </div>

                            <div class="flex items-center justify-between text-slate-300 pt-2 border-t border-slate-800/80">
                                <span>Subtotal Neto:</span>
                                <span class="font-bold text-slate-200" x-text="formatCLP(subtotalNeto)"></span>
                            </div>

                            <div class="flex items-center justify-between text-slate-400" x-show="taxType === 'factura'">
                                <span>IVA (19%):</span>
                                <span class="font-bold text-slate-300" x-text="formatCLP(taxAmount)"></span>
                            </div>
                        </div>

                        <!-- Total Grand Price Card -->
                        <div class="p-5 rounded-2xl bg-gradient-to-br from-emerald-950 to-slate-900 border-2 border-emerald-500/40 shadow-xl space-y-1 text-center">
                            <span class="text-[11px] text-emerald-400 uppercase font-bold tracking-wider block">
                                Total Estimado a Pagar (<span x-text="taxType === 'factura' ? 'Con Factura' : 'Neto'"></span>)
                            </span>
                            <div class="text-3xl sm:text-4xl font-black text-white font-display" x-text="formatCLP(totalPrice)"></div>
                            <span class="text-[11px] text-slate-400 block pt-1">
                                🤝 Usted Paga Después de Solucionado y Verificada la Hermeticidad
                            </span>
                        </div>

                        <!-- Included Checklist -->
                        <div class="space-y-1.5 text-xs text-slate-300 pt-2">
                            <div class="flex items-center gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                                <span>Desconexión y conexión de artefactos a gas</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                                <span>Pruebas de hermeticidad manométrica a 368 mmca</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                                <span>Certificado Oficial de Servicio SEC firmado por Domingo Isain</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                                <span>Garantía de 3 Años por escrito</span>
                            </div>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <button type="button" x-on:click="submitQuote()" :disabled="submitting"
                            class="w-full py-4 bg-gradient-to-r from-emerald-600 to-teal-500 hover:from-emerald-500 hover:to-teal-400 text-white font-black text-base rounded-2xl shadow-xl shadow-emerald-600/30 transition-all flex items-center justify-center gap-2.5 disabled:opacity-50">
                        <template x-if="!submitting">
                            <span class="flex items-center gap-2">
                                <i data-lucide="send" class="w-5 h-5"></i>
                                <span>Solicitar Cotización y Agendar por WhatsApp</span>
                            </span>
                        </template>
                        <template x-if="submitting">
                            <span class="flex items-center gap-2">
                                <i data-lucide="loader-2" class="w-5 h-5 animate-spin"></i>
                                <span>Registrando Cotización...</span>
                            </span>
                        </template>
                    </button>

                </div>

            </div>

        </div>

        <!-- Success Modal with WhatsApp Action -->
        <div x-show="quoteSubmitted" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-md">
            <div class="glass-dark max-w-lg w-full p-6 sm:p-8 rounded-3xl border border-emerald-500/40 shadow-2xl space-y-6 text-center transform transition-all">
                
                <div class="w-16 h-16 rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 flex items-center justify-center mx-auto">
                    <i data-lucide="check-check" class="w-8 h-8"></i>
                </div>

                <div class="space-y-2">
                    <span class="text-xs text-emerald-400 font-bold uppercase tracking-wider block">Cotización Registrada Exitosamente</span>
                    <h3 class="text-2xl font-black text-white font-display">
                        Cotización N° <span x-text="quoteFolio"></span>
                    </h3>
                    <p class="text-sm text-slate-300">
                        Total Estimado: <strong class="text-emerald-400 text-lg" x-text="quoteTotalFormatted"></strong>
                    </p>
                    <p class="text-xs text-slate-400">
                        Hemos registrado su cotización en el sistema de SellafuGas. Haga clic a continuación para enviar los detalles directamente al WhatsApp de Domingo Isain y coordinar su trabajo de sellado.
                    </p>
                </div>

                <div class="space-y-3">
                    <a :href="whatsappRedirectUrl" target="_blank"
                       class="w-full py-4 bg-emerald-600 hover:bg-emerald-500 text-white font-black text-base rounded-2xl shadow-lg shadow-emerald-600/30 flex items-center justify-center gap-3 transition-all">
                        <i data-lucide="message-circle" class="w-5 h-5"></i>
                        <span>Abrir WhatsApp con Domingo Isain</span>
                    </a>
                    
                    <button type="button" x-on:click="quoteSubmitted = false"
                            class="text-xs text-slate-400 hover:text-white underline">
                        Cerrar y volver al sitio
                    </button>
                </div>

            </div>
        </div>

    </section>

    <!-- SECTION: INTERACTIVE SAVINGS CALCULATOR (SELLAFUGAS VS PICAR MUROS) -->
    <section id="calculadora-ahorro" class="py-16 lg:py-24 bg-slate-950/80 relative overflow-hidden"
             x-data="{
                 propertyType: 'casa_1',
                 get traditionalCost() {
                     if (this.propertyType === 'depto') return 1150000;
                     if (this.propertyType === 'casa_1') return 1420000;
                     if (this.propertyType === 'casa_2') return 1850000;
                     return 2400000;
                 },
                 get sellafugasCost() {
                     if (this.propertyType === 'depto') return 300000;
                     if (this.propertyType === 'casa_1') return 350000;
                     if (this.propertyType === 'casa_2') return 450000;
                     return 600000;
                 },
                 get totalSaved() {
                     return this.traditionalCost - this.sellafugasCost;
                 },
                 get percentSaved() {
                     return Math.round((this.totalSaved / this.traditionalCost) * 100);
                 },
                 formatCLP(val) {
                     return '$' + new Intl.NumberFormat('es-CL').format(val || 0);
                 }
             }">
        
        <!-- Ambient light -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-[500px] h-[300px] bg-emerald-500/10 blur-[100px] pointer-events-none -z-10 overflow-hidden"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <div data-animate="fade-up" class="text-center max-w-3xl mx-auto space-y-4">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-bold uppercase tracking-wider">
                    <i data-lucide="trending-down" class="w-4 h-4"></i>
                    <span>Comparador de Ahorro Económico y Tiempo</span>
                </div>
                <h2 class="font-display text-3xl sm:text-4xl font-black text-white tracking-tight">
                    ¿Cuánto Dinero y Tiempo te Ahorras con SellafuGas?
                </h2>
                <p class="text-slate-300 text-sm sm:text-base">
                    Picar muros y pisos para cambiar cañerías multiplica los costos de albañilería, cerámicas y pintura. Compare el gasto tradicional frente a la inyección alemana Prodoral R6-1.
                </p>
            </div>

            <!-- Property Type Selector -->
            <div data-animate="fade-up" data-delay="100" class="max-w-4xl mx-auto">
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider text-center mb-3">
                    Seleccione el tipo de inmueble o extensión aproximada:
                </label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <button type="button" @click="propertyType = 'depto'"
                            :class="propertyType === 'depto' ? 'bg-emerald-950/90 border-emerald-400 text-emerald-200 ring-2 ring-emerald-500/20 shadow-xl' : 'bg-slate-900/80 border-slate-800 text-slate-400 hover:border-slate-700'"
                            class="p-4 rounded-2xl text-center border-2 transition-colors duration-150">
                        <i data-lucide="building" class="w-5 h-5 mx-auto mb-1.5" :class="propertyType === 'depto' ? 'text-emerald-400' : 'text-slate-500'"></i>
                        <div class="font-bold text-xs">Departamento</div>
                        <div class="text-[11px] text-slate-400">~10 a 12 metros</div>
                    </button>

                    <button type="button" @click="propertyType = 'casa_1'"
                            :class="propertyType === 'casa_1' ? 'bg-emerald-950/90 border-emerald-400 text-emerald-200 ring-2 ring-emerald-500/20 shadow-xl' : 'bg-slate-900/80 border-slate-800 text-slate-400 hover:border-slate-700'"
                            class="p-4 rounded-2xl text-center border-2 transition-colors duration-150">
                        <i data-lucide="home" class="w-5 h-5 mx-auto mb-1.5" :class="propertyType === 'casa_1' ? 'text-emerald-400' : 'text-slate-500'"></i>
                        <div class="font-bold text-xs">Casa 1 Piso</div>
                        <div class="text-[11px] text-slate-400">~15 a 20 metros</div>
                    </button>

                    <button type="button" @click="propertyType = 'casa_2'"
                            :class="propertyType === 'casa_2' ? 'bg-emerald-950/90 border-emerald-400 text-emerald-200 ring-2 ring-emerald-500/20 shadow-xl' : 'bg-slate-900/80 border border-slate-800 text-slate-400 hover:border-slate-700'"
                            class="p-4 rounded-2xl text-center border-2 transition-colors duration-150">
                        <i data-lucide="layers" class="w-5 h-5 mx-auto mb-1.5" :class="propertyType === 'casa_2' ? 'text-emerald-400' : 'text-slate-500'"></i>
                        <div class="font-bold text-xs">Casa 2 Pisos</div>
                        <div class="text-[11px] text-slate-400">~25 a 30 metros</div>
                    </button>

                    <button type="button" @click="propertyType = 'condominio'"
                            :class="propertyType === 'condominio' ? 'bg-emerald-950/90 border-emerald-400 text-emerald-200 ring-2 ring-emerald-500/20 shadow-xl' : 'bg-slate-900/80 border-slate-800 text-slate-400 hover:border-slate-700'"
                            class="p-4 rounded-2xl text-center border-2 transition-colors duration-150">
                        <i data-lucide="map-pin" class="w-5 h-5 mx-auto mb-1.5" :class="propertyType === 'condominio' ? 'text-emerald-400' : 'text-slate-500'"></i>
                        <div class="font-bold text-xs">Red Extensa</div>
                        <div class="text-[11px] text-slate-400">~35 a 50+ metros</div>
                    </button>
                </div>
            </div>

            <!-- Comparison Cards & Live Savings Result -->
            <div data-animate="fade-scale" data-delay="200" class="grid grid-cols-1 lg:grid-cols-12 gap-6 max-w-5xl mx-auto items-stretch">
                
                <!-- Left: Traditional Invasive Method -->
                <div class="lg:col-span-4 glass-dark rounded-3xl border border-rose-900/30 p-6 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-500/10 text-rose-400 text-[10px] font-black uppercase border border-rose-500/20">
                            <i data-lucide="x-circle" class="w-3.5 h-3.5"></i>
                            <span>Método Tradicional Invasivo</span>
                        </div>
                        <h3 class="text-lg font-bold text-white">Romper Muros y Pisos</h3>
                        <div class="space-y-2 text-xs text-slate-300">
                            <div class="flex items-center justify-between border-b border-slate-800/80 pb-1.5">
                                <span class="text-slate-400">Picar losas y muros:</span>
                                <span class="font-semibold text-rose-300">$280.000</span>
                            </div>
                            <div class="flex items-center justify-between border-b border-slate-800/80 pb-1.5">
                                <span class="text-slate-400">Cañería nueva + soldaduras:</span>
                                <span class="font-semibold text-rose-300">$450.000</span>
                            </div>
                            <div class="flex items-center justify-between border-b border-slate-800/80 pb-1.5">
                                <span class="text-slate-400">Cerámicos, pintura y albañil:</span>
                                <span class="font-semibold text-rose-300">$490.000</span>
                            </div>
                            <div class="flex items-center justify-between border-b border-slate-800/80 pb-1.5">
                                <span class="text-slate-400">Retiro de escombros y aseo:</span>
                                <span class="font-semibold text-rose-300">$90.000</span>
                            </div>
                            <div class="flex items-center justify-between pt-1 text-rose-400">
                                <span>Tiempo sin gas en su hogar:</span>
                                <span class="font-bold">5 a 10 Días</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-rose-950/30 border border-rose-800/30 text-center">
                        <div class="text-[11px] text-slate-400 uppercase font-semibold">Costo Total Estimado</div>
                        <div class="text-2xl font-black text-rose-400 font-display" x-text="formatCLP(traditionalCost)"></div>
                    </div>
                </div>

                <!-- Center: Real Savings Highlight Metric -->
                <div class="lg:col-span-4 bg-gradient-to-br from-emerald-950 via-slate-900 to-sky-950 rounded-3xl border-2 border-emerald-500/50 p-6 sm:p-8 flex flex-col items-center justify-between text-center space-y-6 shadow-2xl shadow-emerald-950/40">
                    <div class="space-y-2">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-black uppercase tracking-wider border border-emerald-500/40 animate-pulse">
                            <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
                            <span>Ahorro Estimado</span>
                        </div>
                        <div class="text-4xl sm:text-5xl font-black text-white font-display tracking-tight" x-text="formatCLP(totalSaved)"></div>
                        <div class="text-xs font-bold text-emerald-400">
                            Ahorras aproximadamente el <span class="text-base" x-text="percentSaved"></span>% de tu dinero
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-950/60 border border-emerald-500/30 w-full space-y-2 text-xs">
                        <div class="flex items-center justify-between text-slate-300">
                            <span>⏱️ Tiempo de solución:</span>
                            <span class="font-bold text-emerald-400">< 2 Horas</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-300">
                            <span>🛡️ Garantía por escrito:</span>
                            <span class="font-bold text-emerald-400">3 Años</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-300">
                            <span>📜 Certificado Oficial:</span>
                            <span class="font-bold text-emerald-400">SEC Clase 3</span>
                        </div>
                    </div>

                    <a href="#cotizador" class="w-full py-3.5 bg-gradient-to-r from-emerald-500 to-teal-400 hover:from-emerald-400 hover:to-teal-300 text-slate-950 font-black text-sm rounded-xl shadow-lg shadow-emerald-500/30 transition-all flex items-center justify-center gap-2 hover:scale-[1.02]">
                        <i data-lucide="calculator" class="w-4 h-4"></i>
                        <span>Cotizar Mi Sellado Ahora</span>
                    </a>
                </div>

                <!-- Right: SellafuGas Prodoral Method -->
                <div class="lg:col-span-4 glass-dark rounded-3xl border border-emerald-500/30 p-6 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 text-[10px] font-black uppercase border border-emerald-500/20">
                            <i data-lucide="check-circle" class="w-3.5 h-3.5"></i>
                            <span>Tecnología SellafuGas</span>
                        </div>
                        <h3 class="text-lg font-bold text-white">Prodoral R6-1 Alemán</h3>
                        <div class="space-y-2 text-xs text-slate-300">
                            <div class="flex items-center justify-between border-b border-slate-800/80 pb-1.5">
                                <span class="text-slate-400">Rotura de muros y pisos:</span>
                                <span class="font-bold text-emerald-400">$0 (Cero daños)</span>
                            </div>
                            <div class="flex items-center justify-between border-b border-slate-800/80 pb-1.5">
                                <span class="text-slate-400">Inyección sellante Prodoral:</span>
                                <span class="font-semibold text-white">Incluida</span>
                            </div>
                            <div class="flex items-center justify-between border-b border-slate-800/80 pb-1.5">
                                <span class="text-slate-400">Pruebas a 368 mmca:</span>
                                <span class="font-semibold text-white">Incluida</span>
                            </div>
                            <div class="flex items-center justify-between border-b border-slate-800/80 pb-1.5">
                                <span class="text-slate-400">Certificado Oficial SEC:</span>
                                <span class="font-semibold text-white">Incluido</span>
                            </div>
                            <div class="flex items-center justify-between pt-1 text-emerald-400">
                                <span>Tiempo de ejecución:</span>
                                <span class="font-bold">Menos de 2 Horas</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-emerald-950/40 border border-emerald-500/30 text-center">
                        <div class="text-[11px] text-slate-400 uppercase font-semibold">Valor SellafuGas Cerrado</div>
                        <div class="text-2xl font-black text-emerald-400 font-display" x-text="formatCLP(sellafugasCost)"></div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- SECTION: HOW PRODORAL WORKS (REPARAMOS SIN ROMPER) -->
    <section id="como-funciona" class="py-16 lg:py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <div data-animate="fade-up" class="text-center max-w-3xl mx-auto space-y-4">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-sky-500/10 border border-sky-500/30 text-sky-400 text-xs font-bold uppercase tracking-wider">
                    <i data-lucide="cpu" class="w-4 h-4"></i>
                    <span>Tecnología Alemana de Sellado Interior</span>
                </div>
                <h2 class="font-display text-3xl sm:text-5xl font-black text-white tracking-tight">
                    ¿Cómo Funciona Prodoral R6-1?
                </h2>
                <p class="text-slate-300 text-sm sm:text-base">
                    Prodoral R6-1 es un polímero sellante alemán de última generación diseñado específicamente para la reparación de fugas en redes interiores de gas no visibles sin dañar su hogar.
                </p>
            </div>

            <!-- 4 Step Process Grid -->
            <div data-animate="fade-up" data-delay="150" data-stagger class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <div class="glass-card-hover p-6 rounded-2xl space-y-4 hover-lift">
                    <div class="w-12 h-12 rounded-xl bg-sky-500/20 text-sky-400 flex items-center justify-center font-black text-xl font-display border border-sky-500/30">
                        01
                    </div>
                    <h3 class="text-lg font-bold text-white">Prueba Inicial y Diagnóstico</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Desconectamos artefactos y medidor para realizar prueba de estanqueidad inicial determinando la magnitud de la fuga con manómetro digital normado.
                    </p>
                </div>

                <div class="glass-card-hover p-6 rounded-2xl space-y-4 hover-lift">
                    <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-black text-xl font-display border border-emerald-500/30">
                        02
                    </div>
                    <h3 class="text-lg font-bold text-white">Inyección Neumática Prodoral</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Inyectamos Prodoral R6-1 al interior de la matriz de cañerías a presión calculada. El fluido penetra y sella uniones roscadas y porosidades en toda la red.
                    </p>
                </div>

                <div class="glass-card-hover p-6 rounded-2xl space-y-4 hover-lift">
                    <div class="w-12 h-12 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center font-black text-xl font-display border border-cyan-500/30">
                        03
                    </div>
                    <h3 class="text-lg font-bold text-white">Purga y Polimerización</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Se extrae el excedente mediante flujo de aire comprimido filtrado. El sellante forma una película elástica e indestructible resistente a la presión de gas.
                    </p>
                </div>

                <div class="glass-card-hover p-6 rounded-2xl space-y-4 hover-lift">
                    <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center font-black text-xl font-display border border-amber-500/30">
                        04
                    </div>
                    <h3 class="text-lg font-bold text-white">Prueba Hermética & Certificado SEC</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Prueba final estanco a 368 mmca sin caídas de presión por 15 min. Se reconectan artefactos y se entrega el Certificado Oficial SEC con 3 años de garantía.
                    </p>
                </div>

            </div>

            <!-- Comparison Table: SellafuGas vs Método Tradicional -->
            <div data-animate="flip-up" data-delay="200" class="glass-dark rounded-3xl border border-slate-800 p-6 sm:p-10 space-y-6 hover-lift">
                <div class="text-center max-w-2xl mx-auto space-y-2">
                    <h3 class="text-2xl font-black text-white font-display">
                        Comparativa: SellafuGas Prodoral vs Picar Muros Tradicional
                    </h3>
                    <p class="text-xs text-slate-400">Vea por qué más de 1.800 clientes eligen sellar con Prodoral R6-1</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm border-collapse">
                        <thead>
                            <tr class="border-b border-slate-800 text-xs font-bold uppercase tracking-wider text-slate-400">
                                <th class="py-4 px-4">Característica</th>
                                <th class="py-4 px-4 text-emerald-400 bg-emerald-950/30 rounded-t-xl">SellafuGas Prodoral R6-1</th>
                                <th class="py-4 px-4 text-rose-400">Método Tradicional (Romper Muros)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/80 text-xs sm:text-sm">
                            <tr>
                                <td class="py-3.5 px-4 font-semibold text-white">Tiempo de Ejecución</td>
                                <td class="py-3.5 px-4 font-bold text-emerald-400 bg-emerald-950/20">Menos de 2 Horas</td>
                                <td class="py-3.5 px-4 text-slate-400">5 a 10 Días de obras molestas</td>
                            </tr>
                            <tr>
                                <td class="py-3.5 px-4 font-semibold text-white">Daño a la Propiedad</td>
                                <td class="py-3.5 px-4 font-bold text-emerald-400 bg-emerald-950/20">Cero picaduras, Cero escombros</td>
                                <td class="py-3.5 px-4 text-rose-400">Destrucción de cerámicos, muros y pintura</td>
                            </tr>
                            <tr>
                                <td class="py-3.5 px-4 font-semibold text-white">Costo Total Estimado</td>
                                <td class="py-3.5 px-4 font-bold text-emerald-400 bg-emerald-950/20">Hasta 70% Menor (Precio cerrado)</td>
                                <td class="py-3.5 px-4 text-slate-400">Muy alto (gasfíter + albañil + pintor + materiales)</td>
                            </tr>
                            <tr>
                                <td class="py-3.5 px-4 font-semibold text-white">Garantía por Escrito</td>
                                <td class="py-3.5 px-4 font-bold text-emerald-400 bg-emerald-950/20">3 Años de Garantía</td>
                                <td class="py-3.5 px-4 text-slate-400">Generalmente 3 a 6 meses</td>
                            </tr>
                            <tr>
                                <td class="py-3.5 px-4 font-semibold text-white">Certificado SEC Oficial</td>
                                <td class="py-3.5 px-4 font-bold text-emerald-400 bg-emerald-950/20">Entregado al terminar por Domingo Isain (SEC)</td>
                                <td class="py-3.5 px-4 text-slate-400">Requiere tramitación aparte</td>
                            </tr>
                            <tr>
                                <td class="py-3.5 px-4 font-semibold text-white">Condición de Pago</td>
                                <td class="py-3.5 px-4 font-bold text-emerald-400 bg-emerald-950/20">Usted Paga Después de Solucionado</td>
                                <td class="py-3.5 px-4 text-slate-400">Anticipos previos</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

    <!-- SECTION: SPECIALIZED SERVICES GRID (SERVICIOS INTEGRALES DE GASFITERÍA Y GAS) -->
    <section id="servicios" class="py-16 lg:py-24 bg-slate-900/60 border-t border-slate-800/80 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <div data-animate="fade-up" class="text-center max-w-3xl mx-auto space-y-4">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-sky-500/10 border border-sky-500/30 text-sky-400 text-xs font-bold uppercase tracking-wider">
                    <i data-lucide="wrench" class="w-4 h-4"></i>
                    <span>Soluciones Técnicas Especializadas SEC</span>
                </div>
                <h2 class="font-display text-3xl sm:text-5xl font-black text-white tracking-tight">
                    Servicios Integrales en Redes de Gas y Fugas
                </h2>
                <p class="text-slate-300 text-sm sm:text-base">
                    Atención técnica certificada de urgencia y programada. Conozca nuestras soluciones especializadas con cobertura en Santiago, V y VI Región.
                </p>
            </div>

            <!-- 6 Services Grid -->
            <div data-animate="fade-up" data-delay="150" data-stagger class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Service 1: Prodoral R6-1 -->
                <div class="glass-dark p-6 sm:p-8 rounded-3xl border border-slate-800 hover:border-emerald-500/50 transition-all hover-lift flex flex-col justify-between space-y-6 group">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="shield-check" class="w-7 h-7"></i>
                        </div>
                        <div class="space-y-1.5">
                            <span class="text-[11px] font-bold uppercase text-emerald-400 tracking-wider">Tecnología Alemana</span>
                            <h3 class="text-xl font-bold text-white group-hover:text-emerald-400 transition-colors">
                                Sellado de Fugas sin Romper
                            </h3>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                Reparación de fugas no visibles en cañerías interiores con Prodoral R6-1. Procedimiento limpio en <2 horas, 3 años de garantía y Certificado SEC.
                            </p>
                        </div>
                        <div class="pt-2 flex flex-wrap gap-2 text-[11px] text-slate-300">
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">Cero escombros</span>
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">DIN EN 13090</span>
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">DS66 Art. 7</span>
                        </div>
                    </div>
                    <a href="{{ route('landing.prodoral') }}" class="w-full py-3 px-4 rounded-xl bg-slate-900 hover:bg-emerald-600 hover:text-slate-950 text-emerald-400 font-bold text-xs flex items-center justify-between border border-slate-800 transition-all">
                        <span>Ver Detalles y Procedimiento</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- Service 2: Gasfíter SEC -->
                <div class="glass-dark p-6 sm:p-8 rounded-3xl border border-slate-800 hover:border-sky-500/50 transition-all hover-lift flex flex-col justify-between space-y-6 group">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-2xl bg-sky-500/10 text-sky-400 border border-sky-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="user-check" class="w-7 h-7"></i>
                        </div>
                        <div class="space-y-1.5">
                            <span class="text-[11px] font-bold uppercase text-sky-400 tracking-wider">Acreditación Oficial</span>
                            <h3 class="text-xl font-bold text-white group-hover:text-sky-400 transition-colors">
                                Gasfíter Certificado SEC
                            </h3>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                Instalación, modificación y reparación de redes de gas en baja y media presión a cargo de Domingo Isain Plaza Caamaño (SEC Clase 3).
                            </p>
                        </div>
                        <div class="pt-2 flex flex-wrap gap-2 text-[11px] text-slate-300">
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">RUT 12.738.961-6</span>
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">Clase 3 Autorizada</span>
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">A Domicilio</span>
                        </div>
                    </div>
                    <a href="{{ route('landing.gasfiter-sec') }}" class="w-full py-3 px-4 rounded-xl bg-slate-900 hover:bg-sky-600 hover:text-white text-sky-400 font-bold text-xs flex items-center justify-between border border-slate-800 transition-all">
                        <span>Ver Credencial y Servicios SEC</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- Service 3: Gas Trazador -->
                <div class="glass-dark p-6 sm:p-8 rounded-3xl border border-slate-800 hover:border-cyan-500/50 transition-all hover-lift flex flex-col justify-between space-y-6 group">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-2xl bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="crosshair" class="w-7 h-7"></i>
                        </div>
                        <div class="space-y-1.5">
                            <span class="text-[11px] font-bold uppercase text-cyan-400 tracking-wider">Detección Milimétrica</span>
                            <h3 class="text-xl font-bold text-white group-hover:text-cyan-400 transition-colors">
                                Gas Trazador & Geófono
                            </h3>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                Localización no destructiva de fugas subterráneas e interiores mediante mezcla de hidrógeno/nitrógeno y sensores acústicos de alta precisión.
                            </p>
                        </div>
                        <div class="pt-2 flex flex-wrap gap-2 text-[11px] text-slate-300">
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">Formigas H2/N2</span>
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">Geófono digital</span>
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">Sin romper</span>
                        </div>
                    </div>
                    <a href="{{ route('landing.gas-trazador') }}" class="w-full py-3 px-4 rounded-xl bg-slate-900 hover:bg-cyan-600 hover:text-white text-cyan-400 font-bold text-xs flex items-center justify-between border border-slate-800 transition-all">
                        <span>Ver Tecnología de Detección</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- Service 4: Sello Rojo SEC -->
                <div class="glass-dark p-6 sm:p-8 rounded-3xl border border-slate-800 hover:border-rose-500/50 transition-all hover-lift flex flex-col justify-between space-y-6 group">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-2xl bg-rose-500/10 text-rose-400 border border-rose-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="shield-alert" class="w-7 h-7"></i>
                        </div>
                        <div class="space-y-1.5">
                            <span class="text-[11px] font-bold uppercase text-rose-400 tracking-wider">Regularización Inmediata</span>
                            <h3 class="text-xl font-bold text-white group-hover:text-rose-400 transition-colors">
                                Solución Sello Rojo SEC
                            </h3>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                Reparación de no conformidades, corrección de ventilaciones, sellado de cañerías y gestión para recuperación del Sello Verde con Metrogas y distribuidoras.
                            </p>
                        </div>
                        <div class="pt-2 flex flex-wrap gap-2 text-[11px] text-slate-300">
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">Cortes de suministro</span>
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">Sello Verde</span>
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">Inspecciones periódicas</span>
                        </div>
                    </div>
                    <a href="{{ route('landing.sello-rojo') }}" class="w-full py-3 px-4 rounded-xl bg-slate-900 hover:bg-rose-600 hover:text-white text-rose-400 font-bold text-xs flex items-center justify-between border border-slate-800 transition-all">
                        <span>Ver Solución Sello Rojo</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- Service 5: Certificados SEC -->
                <div class="glass-dark p-6 sm:p-8 rounded-3xl border border-slate-800 hover:border-amber-500/50 transition-all hover-lift flex flex-col justify-between space-y-6 group">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-2xl bg-amber-500/10 text-amber-400 border border-amber-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="file-check-2" class="w-7 h-7"></i>
                        </div>
                        <div class="space-y-1.5">
                            <span class="text-[11px] font-bold uppercase text-amber-400 tracking-wider">Normativa DS66</span>
                            <h3 class="text-xl font-bold text-white group-hover:text-amber-400 transition-colors">
                                Certificados SEC & Hermeticidad
                            </h3>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                Emisión de Certificados Oficiales de Prueba de Hermeticidad a 368 mmca con código QR y validez legal ante compañías de gas y aseguradoras.
                            </p>
                        </div>
                        <div class="pt-2 flex flex-wrap gap-2 text-[11px] text-slate-300">
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">DS66 Art. 44.2.3</span>
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">QR Verificable</span>
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">Manómetro digital</span>
                        </div>
                    </div>
                    <a href="{{ route('landing.certificados-sec') }}" class="w-full py-3 px-4 rounded-xl bg-slate-900 hover:bg-amber-600 hover:text-slate-950 text-amber-400 font-bold text-xs flex items-center justify-between border border-slate-800 transition-all">
                        <span>Ver Certificaciones Oficiales</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- Service 6: Calefont SEC -->
                <div class="glass-dark p-6 sm:p-8 rounded-3xl border border-slate-800 hover:border-teal-500/50 transition-all hover-lift flex flex-col justify-between space-y-6 group">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-2xl bg-teal-500/10 text-teal-400 border border-teal-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="flame" class="w-7 h-7"></i>
                        </div>
                        <div class="space-y-1.5">
                            <span class="text-[11px] font-bold uppercase text-teal-400 tracking-wider">Mantención & Seguridad</span>
                            <h3 class="text-xl font-bold text-white group-hover:text-teal-400 transition-colors">
                                Reparación de Calefont SEC
                            </h3>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                Mantención preventiva, cambio de membranas, sensores de monóxido, serpentín y reparación de fugas en calefones ionizados y tiro forzado.
                            </p>
                        </div>
                        <div class="pt-2 flex flex-wrap gap-2 text-[11px] text-slate-300">
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">Junkers · Splendid</span>
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">Mademsa · Neckar</span>
                            <span class="px-2.5 py-1 rounded-lg bg-slate-900 border border-slate-800">Tiro Forzado</span>
                        </div>
                    </div>
                    <a href="{{ route('landing.reparacion-calefont') }}" class="w-full py-3 px-4 rounded-xl bg-slate-900 hover:bg-teal-600 hover:text-slate-950 text-teal-400 font-bold text-xs flex items-center justify-between border border-slate-800 transition-all">
                        <span>Ver Servicio de Calefont</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

            </div>

        </div>
    </section>

    <!-- SECTION: REAL CASE STUDIES & SUCCESS STORIES (CASOS REALES VERIFICADOS) -->
    <section id="casos-de-exito" class="py-16 lg:py-24 bg-slate-950 relative overflow-hidden">
        
        <!-- Background light -->
        <div class="absolute top-1/3 right-10 w-96 h-96 bg-emerald-500/5 blur-[140px] pointer-events-none -z-10"></div>
        <div class="absolute bottom-10 left-10 w-80 h-80 bg-sky-500/5 blur-[120px] pointer-events-none -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <div data-animate="fade-up" class="text-center max-w-3xl mx-auto space-y-4">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-bold uppercase tracking-wider">
                    <i data-lucide="check-circle-2" class="w-4 h-4"></i>
                    <span>Experiencia Comprobada en Terreno</span>
                </div>
                <h2 class="font-display text-3xl sm:text-5xl font-black text-white tracking-tight">
                    Casos de Éxito Reales y Verificados
                </h2>
                <p class="text-slate-300 text-sm sm:text-base">
                    Vea cómo resolvimos fugas de gas complejas en tiempo récord, evitando roturas millonarias de pisos y muros para clientes en toda la Región Metropolitana y regiones.
                </p>
            </div>

            <!-- 4 Case Studies Grid -->
            <div data-animate="fade-up" data-delay="150" data-stagger class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <!-- Case 1: Depto Providencia -->
                <div class="glass-dark rounded-3xl border border-slate-800 p-6 sm:p-8 space-y-6 hover:border-emerald-500/40 transition-all hover-lift">
                    <div class="flex items-start justify-between gap-4">
                        <div class="space-y-1">
                            <span class="px-2.5 py-1 rounded-full bg-rose-500/10 text-rose-400 text-[10px] font-black uppercase border border-rose-500/20">
                                Corte por Sello Rojo Metrogas
                            </span>
                            <h3 class="text-xl font-black text-white font-display pt-1">
                                Departamento en Providencia
                            </h3>
                            <p class="text-xs text-slate-400">Edificio Residencial · Av. Manuel Montt</p>
                        </div>
                        <span class="text-2xl font-black text-emerald-400 font-display">1h 20m</span>
                    </div>

                    <div class="space-y-3 text-xs text-slate-300 bg-slate-900/60 p-4 rounded-2xl border border-slate-800">
                        <p><strong>Problema:</strong> Inspección periódica detectó caída de presión en cañería embutida bajo losa de hormigón. Suministro cortado con sello rojo.</p>
                        <p><strong>Solución SellafuGas:</strong> Desconexión de cocina y calefón, inyección neumática de Prodoral R6-1 en red de 14 metros lineales y prueba a 368 mmca estanco.</p>
                        <p class="text-emerald-400 font-semibold"><strong>Resultado:</strong> Certificado SEC emitido de inmediato y reposición del medidor realizada el mismo día.</p>
                    </div>

                    <div class="grid grid-cols-3 gap-2 text-center text-xs">
                        <div class="p-2.5 rounded-xl bg-slate-950 border border-slate-800">
                            <div class="text-slate-400 text-[11px]">Metraje</div>
                            <div class="font-bold text-white">14 Metros</div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-950 border border-slate-800">
                            <div class="text-slate-400 text-[11px]">Ahorro Obras</div>
                            <div class="font-bold text-emerald-400">$1.100.000</div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-950 border border-slate-800">
                            <div class="text-slate-400 text-[11px]">Garantía</div>
                            <div class="font-bold text-sky-400">3 Años</div>
                        </div>
                    </div>
                </div>

                <!-- Case 2: Casa Las Condes -->
                <div class="glass-dark rounded-3xl border border-slate-800 p-6 sm:p-8 space-y-6 hover:border-emerald-500/40 transition-all hover-lift">
                    <div class="flex items-start justify-between gap-4">
                        <div class="space-y-1">
                            <span class="px-2.5 py-1 rounded-full bg-emerald-500/10 text-emerald-400 text-[10px] font-black uppercase border border-emerald-500/20">
                                Cero Rotura de Pisos Nobles
                            </span>
                            <h3 class="text-xl font-black text-white font-display pt-1">
                                Casa en Las Condes
                            </h3>
                            <p class="text-xs text-slate-400">Sector San Damián · Vivienda Unifamiliar</p>
                        </div>
                        <span class="text-2xl font-black text-emerald-400 font-display">1h 45m</span>
                    </div>

                    <div class="space-y-3 text-xs text-slate-300 bg-slate-900/60 p-4 rounded-2xl border border-slate-800">
                        <p><strong>Problema:</strong> Fuga no visible en cañería de gas que atravesaba living y hall con piso de mármol travertino importado de alto costo.</p>
                        <p><strong>Solución SellafuGas:</strong> Sellado completo con polímero Prodoral R6-1 en 28 metros de cañería sin tocar ni una sola palmeta de mármol.</p>
                        <p class="text-emerald-400 font-semibold"><strong>Resultado:</strong> Hermeticidad total a 368 mmca comprobada ante el cliente. Ahorro millonario en obras civiles.</p>
                    </div>

                    <div class="grid grid-cols-3 gap-2 text-center text-xs">
                        <div class="p-2.5 rounded-xl bg-slate-950 border border-slate-800">
                            <div class="text-slate-400 text-[11px]">Metraje</div>
                            <div class="font-bold text-white">28 Metros</div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-950 border border-slate-800">
                            <div class="text-slate-400 text-[11px]">Ahorro Obras</div>
                            <div class="font-bold text-emerald-400">$3.800.000</div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-950 border border-slate-800">
                            <div class="text-slate-400 text-[11px]">Garantía</div>
                            <div class="font-bold text-sky-400">3 Años</div>
                        </div>
                    </div>
                </div>

                <!-- Case 3: Condominio Chicureo -->
                <div class="glass-dark rounded-3xl border border-slate-800 p-6 sm:p-8 space-y-6 hover:border-emerald-500/40 transition-all hover-lift">
                    <div class="flex items-start justify-between gap-4">
                        <div class="space-y-1">
                            <span class="px-2.5 py-1 rounded-full bg-cyan-500/10 text-cyan-400 text-[10px] font-black uppercase border border-cyan-500/20">
                                Red Extensa Subterránea
                            </span>
                            <h3 class="text-xl font-black text-white font-display pt-1">
                                Condominio en Chicureo / Colina
                            </h3>
                            <p class="text-xs text-slate-400">Sector Chamisero · Matriz Exterior a Caldera</p>
                        </div>
                        <span class="text-2xl font-black text-emerald-400 font-display">2h 10m</span>
                    </div>

                    <div class="space-y-3 text-xs text-slate-300 bg-slate-900/60 p-4 rounded-2xl border border-slate-800">
                        <p><strong>Problema:</strong> Red subterránea de 42 metros con microporosidades por corrosión exterior que impedían habilitar el sistema de calefacción central.</p>
                        <p><strong>Solución SellafuGas:</strong> Prueba manométrica digital, inyección neumática reforzada de Prodoral R6-1 y purga controlada.</p>
                        <p class="text-emerald-400 font-semibold"><strong>Resultado:</strong> Red 100% estanca, certificado SEC entregado para la administración y calefacción funcionando.</p>
                    </div>

                    <div class="grid grid-cols-3 gap-2 text-center text-xs">
                        <div class="p-2.5 rounded-xl bg-slate-950 border border-slate-800">
                            <div class="text-slate-400 text-[11px]">Metraje</div>
                            <div class="font-bold text-white">42 Metros</div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-950 border border-slate-800">
                            <div class="text-slate-400 text-[11px]">Ahorro Obras</div>
                            <div class="font-bold text-emerald-400">$2.500.000</div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-950 border border-slate-800">
                            <div class="text-slate-400 text-[11px]">Garantía</div>
                            <div class="font-bold text-sky-400">3 Años</div>
                        </div>
                    </div>
                </div>

                <!-- Case 4: Casa Viña del Mar -->
                <div class="glass-dark rounded-3xl border border-slate-800 p-6 sm:p-8 space-y-6 hover:border-emerald-500/40 transition-all hover-lift">
                    <div class="flex items-start justify-between gap-4">
                        <div class="space-y-1">
                            <span class="px-2.5 py-1 rounded-full bg-sky-500/10 text-sky-400 text-[10px] font-black uppercase border border-sky-500/20">
                                Cobertura Quinta Región
                            </span>
                            <h3 class="text-xl font-black text-white font-display pt-1">
                                Casa en Viña del Mar
                            </h3>
                            <p class="text-xs text-slate-400">Sector Recreo · Quinta Región</p>
                        </div>
                        <span class="text-2xl font-black text-emerald-400 font-display">1h 35m</span>
                    </div>

                    <div class="space-y-3 text-xs text-slate-300 bg-slate-900/60 p-4 rounded-2xl border border-slate-800">
                        <p><strong>Problema:</strong> Fuga en muro perimetral entre cocina y logia con fuerte olor a gas. Dueño buscaba evitar picar cerámicas descontinuadas.</p>
                        <p><strong>Solución SellafuGas:</strong> Traslado inmediato a la V Región, sellado con tecnología Prodoral y presurización hermética.</p>
                        <p class="text-emerald-400 font-semibold"><strong>Resultado:</strong> Fuga eliminada en menos de 2 horas sin picar cerámicas y entrega de garantía de 3 años.</p>
                    </div>

                    <div class="grid grid-cols-3 gap-2 text-center text-xs">
                        <div class="p-2.5 rounded-xl bg-slate-950 border border-slate-800">
                            <div class="text-slate-400 text-[11px]">Metraje</div>
                            <div class="font-bold text-white">18 Metros</div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-950 border border-slate-800">
                            <div class="text-slate-400 text-[11px]">Ahorro Obras</div>
                            <div class="font-bold text-emerald-400">$1.450.000</div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-950 border border-slate-800">
                            <div class="text-slate-400 text-[11px]">Garantía</div>
                            <div class="font-bold text-sky-400">3 Años</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- SECTION: DOMINGO ISAIN CERTIFICATIONS & CREDENTIALS -->
    @include('partials.certificates-section')

    <!-- SECTION: 10 HIGH-CTR FAQS -->
    <section id="faq" class="py-16 lg:py-24 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <div data-animate="fade-up" class="text-center space-y-4">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-sky-500/10 border border-sky-500/30 text-sky-400 text-xs font-bold uppercase tracking-wider">
                    <i data-lucide="help-circle" class="w-4 h-4"></i>
                    <span>Resolución de Dudas Frecuentes</span>
                </div>
                <h2 class="font-display text-3xl sm:text-4xl font-black text-white tracking-tight">
                    Preguntas Frecuentes sobre Sellado de Gas
                </h2>
                <p class="text-slate-400 text-sm sm:text-base">
                    Todo lo que necesita saber sobre el procedimiento, garantías, precios y certificados oficiales SEC.
                </p>
            </div>

            <!-- Accordion List (10 FAQs) -->
            <div data-animate="fade-up" data-delay="150" data-stagger class="space-y-3.5">
                
                <!-- FAQ 1 -->
                <div class="glass-dark rounded-2xl border border-slate-800 overflow-hidden">
                    <button type="button" x-on:click="activeFaq = (activeFaq === 1 ? null : 1)"
                            class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-white text-sm sm:text-base hover:text-emerald-400 transition-colors">
                        <span>1. ¿Cómo se calculan los metros lineales para el sellado de la red de gas?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 transition-transform text-slate-400 shrink-0" :class="activeFaq === 1 ? 'rotate-180 text-emerald-400' : ''"></i>
                    </button>
                    <div x-show="activeFaq === 1" x-cloak class="px-5 pb-5 text-xs sm:text-sm text-slate-300 border-t border-slate-800/80 pt-3 leading-relaxed">
                        La medición se calcula de forma lineal estimada desde el medidor de gas o regulador central hasta la llave de paso de cada artefacto (cocina, calefón, caldera, estufas). En la Región Metropolitana, el valor base es de $300.000 neto para los primeros 10 metros, y cada metro adicional tiene un valor de $25.000 neto.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="glass-dark rounded-2xl border border-slate-800 overflow-hidden">
                    <button type="button" x-on:click="activeFaq = (activeFaq === 2 ? null : 2)"
                            class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-white text-sm sm:text-base hover:text-emerald-400 transition-colors">
                        <span>2. ¿Por qué el sellado con Prodoral R6-1 no requiere romper muros ni pisos?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 transition-transform text-slate-400 shrink-0" :class="activeFaq === 2 ? 'rotate-180 text-emerald-400' : ''"></i>
                    </button>
                    <div x-show="activeFaq === 2" x-cloak class="px-5 pb-5 text-xs sm:text-sm text-slate-300 border-t border-slate-800/80 pt-3 leading-relaxed">
                        Prodoral R6-1 es una resina química alemana que se inyecta directamente al interior de las cañerías existentes. Al presurizarse, el producto fluye por toda la red sellando microporos y uniones roscadas por dentro. Esto elimina por completo la necesidad de picar cerámicos, romper tabiques o generar escombros.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="glass-dark rounded-2xl border border-slate-800 overflow-hidden">
                    <button type="button" x-on:click="activeFaq = (activeFaq === 3 ? null : 3)"
                            class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-white text-sm sm:text-base hover:text-emerald-400 transition-colors">
                        <span>3. ¿El certificado emitido por Domingo Isain es válido ante la SEC y compañías de seguros?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 transition-transform text-slate-400 shrink-0" :class="activeFaq === 3 ? 'rotate-180 text-emerald-400' : ''"></i>
                    </button>
                    <div x-show="activeFaq === 3" x-cloak class="px-5 pb-5 text-xs sm:text-sm text-slate-300 border-t border-slate-800/80 pt-3 leading-relaxed">
                        Sí. Domingo Isain Plaza Caamaño es Gasfíter Certificado Autorizado SEC Clase 3 (RUT 12.738.961-6). Al término del trabajo se entrega un Certificado Oficial de Servicio con código QR de verificación directa ante la SEC para tramitar la reposición del servicio con Metrogas, Lipigas, Gasco, Abastible o presentar a su compañía de seguros.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="glass-dark rounded-2xl border border-slate-800 overflow-hidden">
                    <button type="button" x-on:click="activeFaq = (activeFaq === 4 ? null : 4)"
                            class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-white text-sm sm:text-base hover:text-emerald-400 transition-colors">
                        <span>4. ¿Cuánto tiempo toma el procedimiento de sellado?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 transition-transform text-slate-400 shrink-0" :class="activeFaq === 4 ? 'rotate-180 text-emerald-400' : ''"></i>
                    </button>
                    <div x-show="activeFaq === 4" x-cloak class="px-5 pb-5 text-xs sm:text-sm text-slate-300 border-t border-slate-800/80 pt-3 leading-relaxed">
                        El procedimiento completo toma menos de 2 horas en una vivienda o departamento estándar. El proceso incluye diagnóstico inicial, desconexión de artefactos, inyección neumática de Prodoral, purga, secado con compresor y prueba final de hermeticidad manométrica.
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="glass-dark rounded-2xl border border-slate-800 overflow-hidden">
                    <button type="button" x-on:click="activeFaq = (activeFaq === 5 ? null : 5)"
                            class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-white text-sm sm:text-base hover:text-emerald-400 transition-colors">
                        <span>5. ¿Qué garantía tiene el sellado de fugas con Prodoral R6-1?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 transition-transform text-slate-400 shrink-0" :class="activeFaq === 5 ? 'rotate-180 text-emerald-400' : ''"></i>
                    </button>
                    <div x-show="activeFaq === 5" x-cloak class="px-5 pb-5 text-xs sm:text-sm text-slate-300 border-t border-slate-800/80 pt-3 leading-relaxed">
                        Otorgamos una garantía por escrito de 3 años por efectos de sellado en la red interior intervenida.
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="glass-dark rounded-2xl border border-slate-800 overflow-hidden">
                    <button type="button" x-on:click="activeFaq = (activeFaq === 6 ? null : 6)"
                            class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-white text-sm sm:text-base hover:text-emerald-400 transition-colors">
                        <span>6. ¿Qué significa 'Usted Paga Después de Solucionado'?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 transition-transform text-slate-400 shrink-0" :class="activeFaq === 6 ? 'rotate-180 text-emerald-400' : ''"></i>
                    </button>
                    <div x-show="activeFaq === 6" x-cloak class="px-5 pb-5 text-xs sm:text-sm text-slate-300 border-t border-slate-800/80 pt-3 leading-relaxed">
                        No cobramos anticipos para iniciar el servicio. El cliente solo paga una vez que el trabajo está 100% finalizado y se ha comprobado la total hermeticidad estanco a 368 mmca en presencia del cliente.
                    </div>
                </div>

                <!-- FAQ 7 -->
                <div class="glass-dark rounded-2xl border border-slate-800 overflow-hidden">
                    <button type="button" x-on:click="activeFaq = (activeFaq === 7 ? null : 7)"
                            class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-white text-sm sm:text-base hover:text-emerald-400 transition-colors">
                        <span>7. ¿Qué normativas técnicas y decretos cumple Prodoral R6-1 en Chile?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 transition-transform text-slate-400 shrink-0" :class="activeFaq === 7 ? 'rotate-180 text-emerald-400' : ''"></i>
                    </button>
                    <div x-show="activeFaq === 7" x-cloak class="px-5 pb-5 text-xs sm:text-sm text-slate-300 border-t border-slate-800/80 pt-3 leading-relaxed">
                        Prodoral R6-1 cumple con las normas DIN EN 13090 (norma europea de sellantes de gas) y NAG-203, y está plenamente aceptado por la SEC bajo el Decreto Supremo DS66 Artículo 7 y Artículo 44.2.3.
                    </div>
                </div>

                <!-- FAQ 8 -->
                <div class="glass-dark rounded-2xl border border-slate-800 overflow-hidden">
                    <button type="button" x-on:click="activeFaq = (activeFaq === 8 ? null : 8)"
                            class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-white text-sm sm:text-base hover:text-emerald-400 transition-colors">
                        <span>8. ¿Se deben desconectar artefactos a gas durante el trabajo?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 transition-transform text-slate-400 shrink-0" :class="activeFaq === 8 ? 'rotate-180 text-emerald-400' : ''"></i>
                    </button>
                    <div x-show="activeFaq === 8" x-cloak class="px-5 pb-5 text-xs sm:text-sm text-slate-300 border-t border-slate-800/80 pt-3 leading-relaxed">
                        Sí. Para realizar la inyección es necesario desconectar el medidor y los artefactos (calefón, cocina, estufas). Nuestro servicio incluye la desconexión y la posterior reconexión y verificación de encendido de todos los artefactos.
                    </div>
                </div>

                <!-- FAQ 9 -->
                <div class="glass-dark rounded-2xl border border-slate-800 overflow-hidden">
                    <button type="button" x-on:click="activeFaq = (activeFaq === 9 ? null : 9)"
                            class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-white text-sm sm:text-base hover:text-emerald-400 transition-colors">
                        <span>9. ¿Qué comunas y regiones cubren para atención en el mismo día?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 transition-transform text-slate-400 shrink-0" :class="activeFaq === 9 ? 'rotate-180 text-emerald-400' : ''"></i>
                    </button>
                    <div x-show="activeFaq === 9" x-cloak class="px-5 pb-5 text-xs sm:text-sm text-slate-300 border-t border-slate-800/80 pt-3 leading-relaxed">
                        Atendemos en todas las comunas de Santiago (Las Condes, Lo Barnechea, Providencia, Vitacura, La Reina, Ñuñoa, Chicureo, Colina, Peñalolén, La Florida, San Miguel, Maipú, etc.) y en la Quinta (Valparaíso, Viña del Mar, Quilpué) y Sexta Región (Rancagua, Machalí, etc.).
                    </div>
                </div>

                <!-- FAQ 10 -->
                <div class="glass-dark rounded-2xl border border-slate-800 overflow-hidden">
                    <button type="button" x-on:click="activeFaq = (activeFaq === 10 ? null : 10)"
                            class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-white text-sm sm:text-base hover:text-emerald-400 transition-colors">
                        <span>10. ¿Cómo procedo ante un corte de gas por inspección o emergencia?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 transition-transform text-slate-400 shrink-0" :class="activeFaq === 10 ? 'rotate-180 text-emerald-400' : ''"></i>
                    </button>
                    <div x-show="activeFaq === 10" x-cloak class="px-5 pb-5 text-xs sm:text-sm text-slate-300 border-t border-slate-800/80 pt-3 leading-relaxed">
                        Contáctenos de inmediato al teléfono o WhatsApp +56 9 4987 7316 (949 877 316). Acudimos el mismo día para diagnosticar, sellar con Prodoral R6-1, emitir el Certificado SEC oficial y dejar la red lista para el reenganche inmediato del suministro.
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Footer Partial -->
    </main>

    @include('partials.landing-footer')

    @include('partials.floating-widgets')
</body>
</html>
