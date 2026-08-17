<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SellafuGas® | Reparación de Fugas de Gas Sin Romper · Prodoral R6-1 · Gasfiter Certificado SEC Domingo Isain</title>
    
    <!-- Meta SEO Tags -->
    <meta name="description" content="Sellado de fugas de gas no visibles en cañerías sin romper muros ni pisos. Aplicación oficial de Prodoral R6-1 alemán por Domingo Isain, Gasfiter Certificado SEC Clase 3. Procedimiento < 2 horas, garantía 3 años, usted paga después de solucionado. RM, V y VI Región. Llame al 949 877 316.">
    <meta name="keywords" content="sellafugas, fuga de gas, fugas de gas, gasfiter certificado, gasfiter certificados sec, prodoral, prodoral r6-1, reparacion de fugas de gas sin romper, sellar fuga de gas, detectar fuga de gas, sellado de cañerias de gas, gasfiter certificado a domicilio, gasfiter sec santiago, gasfiter sec la florida, gasfiter las condes, gasfiter providencia, gasfiter chicureo, prueba de hermeticidad gas, ds66 sec">
    <meta name="author" content="Domingo Isain Plaza Caamaño - SellafuGas®">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://sellafugas.cl">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://sellafugas.cl/">
    <meta property="og:title" content="SellafuGas® · Reparación de Fugas de Gas Sin Romper con Prodoral R6-1 · Gasfiter SEC">
    <meta property="og:description" content="Especialistas en sellado de fugas de gas no visibles. Solución en menos de 2 horas con tecnología alemana Prodoral R6-1. Garantía 3 años por escrito. Certificado SEC oficial.">
    <meta property="og:image" content="{{ asset('images/logotipo-sellafugas.cl.webp') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/webp" href="{{ asset('images/logotipo-sellafugas.cl.webp') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Animations Stylesheet Preset -->
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            400: '#38bdf8',
                            500: '#0284c7',
                            600: '#0369a1',
                            700: '#075985',
                            900: '#0c4a6e',
                            950: '#082f49',
                        },
                        gas: {
                            emerald: '#10b981',
                            cyan: '#06b6d4',
                            amber: '#f59e0b',
                            rose: '#ef4444',
                        }
                    },
                    boxShadow: {
                        'neon-emerald': '0 0 25px -5px rgba(16, 185, 129, 0.4)',
                        'neon-sky': '0 0 25px -5px rgba(56, 189, 248, 0.4)',
                        'glow-lg': '0 10px 40px -10px rgba(2, 132, 199, 0.35)',
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
        
        .bg-grid-pattern {
            background-size: 40px 40px;
            background-image: 
                linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        }
        
        .glass-dark {
            background: rgba(15, 23, 42, 0.78);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-card-hover {
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.07);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-card-hover:hover {
            transform: translateY(-4px);
            border-color: rgba(56, 189, 248, 0.4);
            box-shadow: 0 20px 30px -10px rgba(2, 132, 199, 0.25);
        }

        @keyframes pulse-ring {
            0% { transform: scale(0.95); opacity: 0.8; }
            50% { transform: scale(1.15); opacity: 0.3; }
            100% { transform: scale(0.95); opacity: 0.8; }
        }
        .animate-pulse-ring {
            animation: pulse-ring 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes float-slow {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .animate-float {
            animation: float-slow 4s ease-in-out infinite;
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

    <!-- HERO SECTION -->
    <section id="hero" class="relative pt-12 pb-20 lg:pt-20 lg:pb-28 overflow-hidden">
        <!-- Glowing Ambient Lighting Backdrops -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[350px] bg-gradient-to-tr from-sky-600/20 via-emerald-500/20 to-transparent blur-[120px] pointer-events-none -z-10"></div>
        <div class="absolute top-10 right-10 w-72 h-72 bg-emerald-500/10 blur-[100px] pointer-events-none -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Hero Left Column: Main Headlines & Value Props -->
                <div class="lg:col-span-7 space-y-7">
                    
                    <!-- Trust Badges Pill -->
                    <div data-animate="fade-down" data-delay="100" class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-slate-900/90 border border-emerald-500/30 text-xs font-semibold text-emerald-300 shadow-lg shadow-emerald-950/40">
                        <span class="p-1 rounded-full bg-emerald-500 text-slate-950">
                            <i data-lucide="check" class="w-3 h-3 stroke-[3]"></i>
                        </span>
                        <span>Tecnología Alemana Prodoral R6-1 · Especialistas Desde 2009</span>
                    </div>

                    <!-- Main H1 Title -->
                    <h1 data-animate="fade-up" data-delay="150" class="font-display text-3xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-[1.1]">
                        Reparación de Fugas de Gas <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-cyan-300 to-emerald-400">Sin Romper Muros</span> ni Pisos
                    </h1>

                    <!-- Hero Subtitle & Domingo Isain Credential -->
                    <p data-animate="fade-up" data-delay="200" class="text-base sm:text-lg text-slate-300 leading-relaxed font-normal">
                        Servicio técnico especializado en sellado de cañerías no visibles con <strong>Prodoral R6-1</strong>. Procedimiento limpio en <strong class="text-emerald-400">menos de 2 horas</strong>, prueba de hermeticidad certificada y entrega de <strong class="text-sky-400">Certificado Oficial SEC</strong> para seguros y empresas de inspección.
                    </p>

                    <!-- Key Selling Point Cards -->
                    <div data-animate="fade-up" data-delay="250" data-stagger class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-2">
                        <div class="glass-dark p-3.5 rounded-2xl border border-slate-800 hover-lift">
                            <div class="flex items-center gap-2 text-emerald-400 mb-1">
                                <i data-lucide="shield-check" class="w-5 h-5"></i>
                                <span class="font-bold text-sm">Garantía 3 Años</span>
                            </div>
                            <p class="text-xs text-slate-400">Por escrito ante cualquier efecto de sellado</p>
                        </div>
                        <div class="glass-dark p-3.5 rounded-2xl border border-slate-800 hover-lift">
                            <div class="flex items-center gap-2 text-sky-400 mb-1">
                                <i data-lucide="clock" class="w-5 h-5"></i>
                                <span class="font-bold text-sm">Menos de 2 Horas</span>
                            </div>
                            <p class="text-xs text-slate-400">Procedimiento rápido sin escombros</p>
                        </div>
                        <div class="glass-dark p-3.5 rounded-2xl border border-slate-800 col-span-2 sm:col-span-1 hover-lift">
                            <div class="flex items-center gap-2 text-amber-400 mb-1">
                                <i data-lucide="handshake" class="w-5 h-5"></i>
                                <span class="font-bold text-sm">Paga Solucionado</span>
                            </div>
                            <p class="text-xs text-slate-400">Comprobada la hermeticidad a 368 mmca</p>
                        </div>
                    </div>

                    <!-- CTA Action Buttons -->
                    <div data-animate="fade-up" data-delay="300" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-2">
                        <a href="#cotizador" class="px-8 py-4 bg-gradient-to-r from-emerald-600 via-teal-600 to-sky-600 hover:from-emerald-500 hover:to-sky-500 text-white font-black text-base rounded-2xl shadow-xl shadow-emerald-600/30 transition-all flex items-center justify-center gap-3 transform hover:-translate-y-1 hover:scale-[1.02] hover:shadow-neon-emerald">
                            <i data-lucide="calculator" class="w-5 h-5"></i>
                            <span>Calcular Cotización Online</span>
                        </a>
                        <a href="tel:949877316" class="px-6 py-4 bg-slate-900/90 hover:bg-slate-800 text-white font-bold text-base rounded-2xl border border-slate-700 transition-all flex items-center justify-center gap-3 shadow-lg hover-lift">
                            <div class="p-1.5 rounded-lg bg-emerald-500/20 text-emerald-400">
                                <i data-lucide="phone" class="w-5 h-5"></i>
                            </div>
                            <div class="text-left">
                                <span class="block text-[11px] text-slate-400 uppercase tracking-wider leading-none">Llamar Ahora</span>
                                <span class="text-lg font-black text-white leading-none">949 877 316</span>
                            </div>
                        </a>
                    </div>

                    <!-- Direct Verification Badge -->
                    <div data-animate="fade-up" data-delay="350" class="flex items-center gap-3 pt-2 text-xs text-slate-400 border-t border-slate-800/80">
                        <img src="{{ asset('images/logotipo-sec.png') }}" alt="SEC" class="h-6 w-auto opacity-90">
                        <span>Gasfiter Certificado Autorizado SEC Clase 3 · <strong>Domingo Isain Plaza Caamaño</strong> (RUT 12.738.961-6)</span>
                    </div>

                </div>

                <!-- Hero Right Column: Domingo Profile & Technology Card -->
                <div class="lg:col-span-5" data-animate="fade-left" data-delay="200">
                    <div class="relative">
                        
                        <!-- Glowing card frame -->
                        <div class="glass-dark p-6 rounded-3xl border border-slate-700/80 shadow-2xl space-y-6 relative overflow-hidden hover-lift">
                            
                            <!-- Technician Header -->
                            <div class="flex items-center gap-4 pb-5 border-b border-slate-800">
                                <div class="relative">
                                    <img src="{{ asset('images/domingo-isain.jpg') }}" alt="Domingo Isain - Gasfiter Certificado SEC" class="w-20 h-20 rounded-2xl object-cover border-2 border-emerald-400 shadow-lg">
                                    <span class="absolute -bottom-1 -right-1 bg-emerald-500 text-slate-950 p-1 rounded-full" title="Técnico Certificado SEC">
                                        <i data-lucide="check-circle" class="w-3.5 h-3.5 stroke-[3]"></i>
                                    </span>
                                </div>
                                <div>
                                    <div class="inline-block px-2 py-0.5 rounded bg-sky-500/10 text-sky-400 text-[11px] font-bold uppercase tracking-wider mb-1">
                                        Especialista Responsable
                                    </div>
                                    <h3 class="text-lg font-black text-white leading-tight">Domingo Isain Plaza C.</h3>
                                    <p class="text-xs text-emerald-400 font-semibold mt-0.5">Gasfíter Certificado Autorizado SEC</p>
                                    <p class="text-xs text-slate-400">RUT: 12.738.961-6 · Clase 3</p>
                                </div>
                            </div>

                            <!-- Live SEC QR Verification Interactive Card -->
                            <div class="bg-slate-900/90 p-4 rounded-2xl border border-slate-800 flex items-center justify-between gap-4">
                                <div class="space-y-1">
                                    <div class="text-xs font-bold text-white flex items-center gap-1.5">
                                        <i data-lucide="qr-code" class="w-4 h-4 text-emerald-400"></i>
                                        <span>Credencial Oficial SEC</span>
                                    </div>
                                    <p class="text-[11px] text-slate-400">Escanee o presione para verificar registro en el portal oficial de la SEC Chile.</p>
                                    <a href="https://wlhttp.sec.cl/rnii/public/licencia/qr?o=285eb263edf5cb049f3f4cc7fa0d2182" target="_blank" class="inline-flex items-center gap-1 text-xs text-sky-400 hover:text-sky-300 font-bold underline mt-1">
                                        <span>Validar en wlhttp.sec.cl</span>
                                        <i data-lucide="external-link" class="w-3 h-3"></i>
                                    </a>
                                </div>
                                <a href="https://wlhttp.sec.cl/rnii/public/licencia/qr?o=285eb263edf5cb049f3f4cc7fa0d2182" target="_blank" class="shrink-0 p-1.5 bg-white rounded-xl shadow-md hover:scale-105 transition-transform">
                                    <img src="{{ asset('images/qr-sec.png') }}" alt="QR SEC Domingo Isain" class="w-16 h-16 object-contain">
                                </a>
                            </div>

                            <!-- Fast Pricing Snapshot Banner -->
                            <div class="p-4 rounded-2xl bg-gradient-to-br from-emerald-950/80 to-slate-900 border border-emerald-500/30 space-y-2">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="text-slate-300 font-semibold">Precio Base RM (Hasta 10m):</span>
                                    <span class="font-black text-emerald-400 text-base">$300.000 <span class="text-xs font-normal text-slate-400">neto</span></span>
                                </div>
                                <div class="flex items-center justify-between text-xs border-t border-slate-800 pt-2">
                                    <span class="text-slate-400">Metro adicional cañería:</span>
                                    <span class="font-bold text-white">$25.000 <span class="text-[11px] text-slate-400">neto</span></span>
                                </div>
                                <div class="text-[11px] text-slate-400 pt-1 flex items-center gap-1 text-emerald-300">
                                    <i data-lucide="check" class="w-3.5 h-3.5"></i>
                                    <span>Incluye desconexión, inyección, pruebas y Certificado SEC</span>
                                </div>
                            </div>

                            <!-- Emergency Floating Action -->
                            <a href="#cotizador" class="w-full py-3 bg-sky-500/20 hover:bg-sky-500/30 text-sky-300 border border-sky-500/40 rounded-xl font-bold text-sm text-center flex items-center justify-center gap-2 transition-all hover:scale-[1.02]">
                                <i data-lucide="arrow-down-circle" class="w-4 h-4 text-sky-400"></i>
                                <span>Ir al Cotizador por Metros Lineales</span>
                            </a>

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
                                    :class="zone === 'rm' ? 'bg-emerald-950/90 border-2 border-emerald-400 text-emerald-200 ring-2 ring-emerald-500/20 shadow-lg' : 'bg-slate-900 border border-slate-800 text-slate-400 hover:border-slate-700'"
                                    class="p-3.5 rounded-xl text-left transition-all">
                                <div class="font-bold text-xs uppercase tracking-wide">Santiago (RM)</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Base $300k · +$25k/m</div>
                            </button>

                            <button type="button" x-on:click="zone = 'v_vi'; provincia = 'Valparaíso / Rancagua'"
                                    :class="zone === 'v_vi' ? 'bg-sky-950/90 border-2 border-sky-400 text-sky-200 ring-2 ring-sky-500/20 shadow-lg' : 'bg-slate-900 border border-slate-800 text-slate-400 hover:border-slate-700'"
                                    class="p-3.5 rounded-xl text-left transition-all">
                                <div class="font-bold text-xs uppercase tracking-wide">V y VI Región</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Base $350k · +$30k/m</div>
                            </button>

                            <button type="button" x-on:click="zone = 'otras'; provincia = 'Otras Regiones'"
                                    :class="zone === 'otras' ? 'bg-amber-950/90 border-2 border-amber-400 text-amber-200 ring-2 ring-amber-500/20 shadow-lg' : 'bg-slate-900 border border-slate-800 text-slate-400 hover:border-slate-700'"
                                    class="p-3.5 rounded-xl text-left transition-all">
                                <div class="font-bold text-xs uppercase tracking-wide">Otras Regiones</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Base $400k · +$35k/m</div>
                            </button>
                        </div>
                    </div>

                    <!-- 2. Metros Lineales Slider & Number Input -->
                    <div class="space-y-3 p-4 rounded-2xl bg-slate-900/80 border border-slate-800">
                        <div class="flex items-center justify-between">
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider">
                                2. Metros Lineales Estimados a Sellar:
                            </label>
                            <div class="flex items-center gap-2">
                                <span class="text-2xl font-black text-emerald-400 font-display" x-text="metros"></span>
                                <span class="text-xs text-slate-400 uppercase font-bold">Metros</span>
                            </div>
                        </div>
                        <input type="range" min="1" max="100" step="1" x-model="metros"
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
                        Hemos registrado su cotización en el sistema de SellafuGas. Haga clic a continuación para enviar los detalles directamente al WhatsApp de Domingo Isain y coordinar su visita.
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
    @include('partials.landing-footer')

    <!-- REAL-TIME SOCIAL PROOF NOTIFICATION TOAST (FOMO SYSTEM) -->
    <div id="fomoToast" class="fixed bottom-6 left-6 z-50 transition-all duration-500 transform translate-y-24 opacity-0 pointer-events-none sm:pointer-events-auto">
        <div class="glass-dark border border-emerald-500/40 p-4 rounded-2xl shadow-2xl flex items-center gap-3.5 max-w-sm">
            <div class="relative p-2.5 rounded-xl bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 shrink-0">
                <i data-lucide="zap" class="w-5 h-5"></i>
                <span class="absolute -top-1 -right-1 w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
            </div>
            <div class="space-y-0.5">
                <p id="fomoText" class="text-xs font-bold text-white leading-tight">
                    Una visita agendada en la comuna de Las Condes
                </p>
                <p id="fomoTime" class="text-[11px] text-emerald-400 font-semibold flex items-center gap-1">
                    <i data-lucide="clock" class="w-3 h-3"></i>
                    <span>Hace 2 minutos</span>
                </p>
            </div>
        </div>
    </div>

    <!-- FLOATING WHATSAPP & PHONE ACTION BUTTONS -->
    <div class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-3">
        
        <!-- Direct Phone Call Button -->
        <a href="tel:949877316" title="Llamar a Domingo Isain"
           class="p-3.5 bg-slate-900/90 hover:bg-slate-800 text-white rounded-full border border-slate-700 shadow-xl flex items-center justify-center group transition-all hover:scale-110">
            <i data-lucide="phone-call" class="w-5 h-5 text-sky-400 group-hover:animate-bounce"></i>
        </a>

        <!-- Floating Pulsing WhatsApp Button -->
        <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo%20Isain%2C%20necesito%20cotizar%20sellado%20de%20gas%20SellafuGas" target="_blank"
           title="Contactar a Domingo Isain por WhatsApp"
           class="relative p-4 bg-emerald-500 hover:bg-emerald-400 text-white rounded-full shadow-2xl shadow-emerald-500/50 flex items-center justify-center transition-all transform hover:scale-110 group">
            <span class="absolute inset-0 rounded-full bg-emerald-400 animate-pulse-ring pointer-events-none"></span>
            <i data-lucide="message-circle" class="w-7 h-7 relative z-10 fill-current"></i>
        </a>

    </div>

    <!-- Scripts: Lucide Icons & Dynamic Real-Time Toast Cycle -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) {
                lucide.createIcons();
            }

            // Real-Time Social Proof Toast Cycle (FOMO)
            const fomoEvents = [
                { text: "Una visita de Sellado agendada en la comuna de Las Condes", time: "Hace 2 minutos" },
                { text: "Cotización de Sellado Prodoral (18m) en Providencia", time: "Hace 5 minutos" },
                { text: "Certificado Oficial SEC emitido en Chicureo / Colina", time: "Hace 11 minutos" },
                { text: "Sellado exitoso sin romper completado en Vitacura", time: "Hace 19 minutos" },
                { text: "Prueba de hermeticidad DS66 solicitada en La Reina", time: "Hace 27 minutos" },
                { text: "Urgencia por fuga de gas atendida en Ñuñoa", time: "Hace 34 minutos" },
                { text: "Visita de sellado en cañería agendada en Rancagua", time: "Hace 46 minutos" },
                { text: "Certificado SEC entregado en Viña del Mar", time: "Hace 58 minutos" },
                { text: "Sellado Prodoral R6-1 finalizado en Lo Barnechea", time: "Hace 1 hora" },
                { text: "Cotización de sellado realizada en Peñalolén", time: "Hace 1 hora" },
                { text: "Inspección y sellado de gas agendado en Maipú", time: "Hace 1 hora" },
                { text: "Certificado de servicio emitido en La Florida", time: "Hace 2 horas" }
            ];

            let toastIndex = 0;
            const toastEl = document.getElementById('fomoToast');
            const textEl = document.getElementById('fomoText');
            const timeEl = document.getElementById('fomoTime');

            function showNextToast() {
                const ev = fomoEvents[toastIndex % fomoEvents.length];
                textEl.innerText = ev.text;
                timeEl.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> <span>${ev.time}</span>`;
                
                // Show
                toastEl.classList.remove('translate-y-24', 'opacity-0');
                toastEl.classList.add('translate-y-0', 'opacity-100');

                // Hide after 5 seconds
                setTimeout(() => {
                    toastEl.classList.remove('translate-y-0', 'opacity-100');
                    toastEl.classList.add('translate-y-24', 'opacity-0');
                }, 5000);

                toastIndex++;
            }

            // Start after 3 seconds, repeat every 9 seconds
            setTimeout(() => {
                showNextToast();
                setInterval(showNextToast, 9000);
            }, 3000);
        });
    </script>

</body>
</html>
