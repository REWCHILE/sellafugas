<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <link rel="canonical" href="{{ $canonicalUrl }}" />

    <!-- Open Graph / Social Preview -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:image" content="{{ asset('images/hero-sellafugas.png') }}">

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
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            400: '#38bdf8',
                            500: '#0284c7',
                            600: '#0369a1',
                            700: '#075985',
                            800: '#0c4a6e',
                            900: '#082f49',
                            950: '#031726',
                        },
                        amber: {
                            400: '#fbbf24',
                            500: '#f59e0b',
                        },
                        emerald: {
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669',
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
        .glow-emerald {
            box-shadow: 0 0 40px -10px rgba(16, 185, 129, 0.35);
        }
        .glow-sky {
            box-shadow: 0 0 40px -10px rgba(2, 132, 199, 0.35);
        }
    </style>

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Service",
      "name": "Sellado y Reparación de Fugas de Gas Sin Romper",
      "serviceType": "Gas Leak Repair and Sealing",
      "provider": {
        "@@type": "HVACBusiness",
        "name": "SellafuGas® Domingo Isain",
        "telephone": "+56949877316",
        "url": "https://sellafugas.cl"
      },
      "areaServed": ["Santiago", "Región Metropolitana", "Valparaíso", "Rancagua"],
      "hasOfferCatalog": {
        "@@type": "OfferCatalog",
        "name": "Servicios de Fugas de Gas",
        "itemListElement": [
          {
            "@@type": "Offer",
            "itemOffered": {
              "@@type": "Service",
              "name": "Sellado de Fuga de Gas con Prodoral R6-1 en Red Interior"
            },
            "priceSpecification": {
              "@@type": "PriceSpecification",
              "price": "300000",
              "priceCurrency": "CLP"
            }
          }
        ]
      }
    }
    </script>

    <!-- Schema.org FAQ -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "FAQPage",
      "mainEntity": [
        {
          "@@type": "Question",
          "name": "¿Cómo reparar una fuga de gas en cañería interna sin picar pisos ni muros?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Con el sistema alemán Prodoral R6-1, se inyecta un polímero sellante líquido a presión controlada dentro de la cañería. El producto sella todas las uniones roscadas y microporosidades desde el interior, logrando hermeticidad total en menos de 2 horas sin obras destructivas."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué garantía tiene el sellado de fugas de gas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Entregamos 3 años de garantía por escrito y emitimos el Certificado Oficial de Hermeticidad SEC tras verificar la prueba a 368 mmca bajo Decreto Supremo DS66."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuál es el valor del sellado de fugas de gas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "En la Región Metropolitana el valor base es de $300.000 neto hasta 10 metros lineales de cañería, y $25.000 neto por metro adicional. Aplica la condición Usted Paga Después de Solucionado."
          }
        }
      ]
    }
    </script>
</head>
<body class="bg-slate-950 text-slate-100 antialiased selection:bg-brand-500 selection:text-white"
      x-data="{
          metros: 12,
          zone: 'rm',
          taxType: 'neto',
          basePrice: 300000,
          extraPerMeter: 25000,
          get subtotalNeto() {
              const baseMeters = 10;
              const extraMeters = Math.max(0, this.metros - baseMeters);
              let base = (this.zone === 'rm') ? 300000 : (this.zone === 'v_vi' ? 350000 : 400000);
              let extraRate = (this.zone === 'rm') ? 25000 : (this.zone === 'v_vi' ? 30000 : 35000);
              return base + (extraMeters * extraRate);
          },
          get totalCalculated() {
              return this.taxType === 'factura' ? Math.round(this.subtotalNeto * 1.19) : this.subtotalNeto;
          },
          format(val) {
              return '$' + new Intl.NumberFormat('es-CL').format(val);
          },
          clientName: '',
          clientPhone: '',
          clientComuna: 'Las Condes',
          loading: false,
          submitted: false,
          folio: null,
          async submitQuote() {
              if(!this.clientName || !this.clientPhone) {
                  alert('Por favor ingrese su Nombre y Teléfono');
                  return;
              }
              this.loading = true;
              try {
                  const res = await fetch('{{ route('quote.public.store') }}', {
                      method: 'POST',
                      headers: {
                          'Content-Type': 'application/json',
                          'Accept': 'application/json'
                      },
                      body: JSON.stringify({
                          nombre: this.clientName,
                          telefono: this.clientPhone,
                          comuna: this.clientComuna,
                          metros: this.metros,
                          zone: this.zone,
                          tax_type: this.taxType,
                          detalles: 'Solicitud desde landing Fugas de Gas (Prodoral R6-1)'
                      })
                  });
                  const data = await res.json();
                  if(data.success) {
                      this.submitted = true;
                      this.folio = data.folio;
                      if(data.whatsapp_url) {
                          window.open(data.whatsapp_url, '_blank');
                      }
                  }
              } catch(e) {
                  console.error(e);
              } finally {
                  this.loading = false;
              }
          }
      }">

    <!-- Top Emergency Bar -->
    <div class="bg-gradient-to-r from-rose-700 via-rose-600 to-amber-600 text-white text-xs py-2 px-4 text-center font-bold tracking-wide flex items-center justify-center gap-3">
        <span class="inline-flex items-center gap-1.5 animate-pulse bg-white/20 px-2 py-0.5 rounded-full">
            <i data-lucide="flame" class="w-3.5 h-3.5 text-amber-200"></i>
            <span>URGENCIAS FUGAS DE GAS 24/7</span>
        </span>
        <span class="hidden sm:inline">¿Sello Rojo o Corte de Suministro? Atendemos emergencias de gas hoy mismo en toda la RM y Regiones.</span>
        <a href="tel:+56949877316" class="underline font-black text-amber-200 hover:text-white flex items-center gap-1">
            <i data-lucide="phone-call" class="w-3.5 h-3.5"></i> 949 877 316
        </a>
    </div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-40 glass-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logotipo-sellafugas.cl.webp') }}" alt="SellafuGas Logo" class="h-11 w-auto rounded-lg shadow-md group-hover:scale-105 transition-transform">
                <div>
                    <span class="font-black text-xl text-white tracking-wide block leading-tight">SELLA<span class="text-sky-400">FU</span><span class="text-emerald-400">GAS</span>®</span>
                    <span class="text-[11px] text-slate-400 font-semibold tracking-wider uppercase">Prodoral R6-1 · SEC</span>
                </div>
            </a>

            <!-- Services Menu Desktop -->
            <nav class="hidden lg:flex items-center gap-6 text-sm font-semibold text-slate-300">
                <a href="{{ route('landing.fugas-gas') }}" class="text-sky-400 font-bold border-b-2 border-sky-400 pb-1">Fugas de Gas</a>
                <a href="{{ route('landing.gasfiter-sec') }}" class="hover:text-sky-400 transition-colors">Gasfíter SEC</a>
                <a href="{{ route('landing.gas-trazador') }}" class="hover:text-sky-400 transition-colors">Gas Trazador</a>
                <a href="{{ route('landing.fugas-agua') }}" class="hover:text-sky-400 transition-colors">Fugas de Agua</a>
                <a href="{{ route('landing.fugas-piscinas') }}" class="hover:text-sky-400 transition-colors">Fugas en Piscinas</a>
                <a href="{{ route('login') }}" class="text-xs text-slate-400 hover:text-white border border-slate-700 px-3 py-1.5 rounded-xl transition-colors">
                    Acceso Administrador
                </a>
            </nav>

            <!-- Direct Call CTA -->
            <div class="flex items-center gap-3">
                <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo,%20tengo%20una%20fuga%20de%20gas%20y%20necesito%20sellado%20con%20Prodoral%20R6-1" target="_blank"
                   class="px-4 py-2.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-sm rounded-xl shadow-lg shadow-emerald-500/25 transition-all flex items-center gap-2">
                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                    <span class="hidden sm:inline">WhatsApp Urgente</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative pt-12 pb-20 overflow-hidden bg-radial from-slate-900 to-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left Content -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs font-bold uppercase tracking-wider">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        <span>Tecnología Alemana Certificada · DS66 SEC Art. 7</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-[1.1]">
                        Sellado de Fugas de Gas <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-teal-300 to-emerald-400">Sin Picar Muros ni Pisos</span>
                    </h1>

                    <p class="text-lg text-slate-300 leading-relaxed">
                        Solución definitiva e inmediata para fugas de gas no visibles en cañerías interiores de casas, departamentos y edificios con <strong>Prodoral R6-1</strong>. Procedimiento en menos de 2 horas con prueba de hermeticidad manométrica digital y <strong>Certificado Oficial SEC</strong>.
                    </p>

                    <!-- Trust Checklist -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span><strong>Usted Paga Después</strong> de solucionado</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span><strong>3 Años de Garantía</strong> por escrito</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span><strong>Domingo Isain</strong> Gasfiter SEC Clase 3</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span><strong>Normas DIN EN 13090</strong> & NAG-203</span>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-4">
                        <a href="#cotizador" class="px-6 py-4 bg-gradient-to-r from-sky-500 to-emerald-500 hover:from-sky-400 hover:to-emerald-400 text-slate-950 font-black text-base rounded-2xl shadow-xl shadow-sky-500/20 text-center transition-all flex items-center justify-center gap-2">
                            <i data-lucide="calculator" class="w-5 h-5"></i>
                            <span>Calcular Precio Online</span>
                        </a>
                        <a href="tel:+56949877316" class="px-6 py-4 bg-slate-900 hover:bg-slate-800 text-white font-bold text-base rounded-2xl border border-slate-700 text-center transition-all flex items-center justify-center gap-2">
                            <i data-lucide="phone-call" class="w-5 h-5 text-emerald-400"></i>
                            <span>Llamar: +56 9 4987 7316</span>
                        </a>
                    </div>
                </div>

                <!-- Right Card: Domingo SEC Profile -->
                <div class="lg:col-span-5">
                    <div class="glass-card p-6 rounded-3xl border border-slate-700/80 glow-sky space-y-6">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('images/domingo-isain.jpg') }}" alt="Domingo Isain Plaza Caamaño Gasfiter SEC" class="w-20 h-20 rounded-2xl object-cover border-2 border-emerald-400 shadow-xl">
                            <div>
                                <span class="text-xs font-bold text-emerald-400 uppercase tracking-wider block">Responsable Técnico Oficial</span>
                                <h3 class="text-lg font-black text-white">Domingo Isain Plaza C.</h3>
                                <p class="text-xs text-slate-300 font-medium">Gasfíter Autorizado SEC Clase 3</p>
                                <span class="inline-block mt-1 text-[11px] font-bold text-slate-400 bg-slate-800 px-2 py-0.5 rounded-md">RUT: 12.738.961-6</span>
                            </div>
                        </div>

                        <div class="p-4 rounded-2xl bg-slate-900/90 border border-slate-800 space-y-2">
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-slate-400">Registro Oficial SEC:</span>
                                <span class="text-emerald-400 font-bold">Verificado y Vigente</span>
                            </div>
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-slate-400">Experiencia en Gas:</span>
                                <span class="text-white font-semibold">+15 Años (Desde 2009)</span>
                            </div>
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-slate-400">Pruebas de Hermeticidad:</span>
                                <span class="text-white font-semibold">DS66 Art. 44.2.3 (368 mmca)</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-4 pt-2">
                            <img src="{{ asset('images/logotipo-sec.png') }}" alt="SEC Logo" class="h-12 w-auto">
                            <img src="{{ asset('images/qr-sec.png') }}" alt="QR Validación SEC" class="h-16 w-auto p-1 bg-white rounded-lg shadow-md">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Interactive Price Calculator Section -->
    <section id="cotizador" class="py-16 bg-slate-900/60 border-y border-slate-800">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-xs font-bold text-sky-400 uppercase tracking-widest block mb-2">Cotizador Transparente en Tiempo Real</span>
                <h2 class="text-3xl font-black text-white">Calcula el Costo de Sellado de tu Red de Gas</h2>
                <p class="text-sm text-slate-400 mt-2">Valores oficiales SellafuGas®. Sin costos ocultos. Usted paga después de solucionado.</p>
            </div>

            <div class="glass-card p-8 rounded-3xl border border-slate-700 space-y-8">
                
                <!-- Sliders & Selectors -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                            1. Seleccione su Región:
                        </label>
                        <select x-model="zone" class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white font-semibold focus:outline-none focus:border-sky-500">
                            <option value="rm">Santiago (Región Metropolitana) - Base $300.000</option>
                            <option value="v_vi">Quinta y Sexta Región (Valparaíso / Rancagua) - Base $350.000</option>
                            <option value="otras">Otras Regiones Cercanas - Base $400.000</option>
                        </select>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="text-xs font-bold text-slate-300 uppercase tracking-wider">
                                2. Metros Lineales de Cañería (Aprox):
                            </label>
                            <span class="text-base font-black text-sky-400" x-text="metros + ' metros'"></span>
                        </div>
                        <input type="range" min="5" max="60" step="1" x-model.number="metros"
                               class="w-full h-2 bg-slate-800 rounded-lg appearance-none cursor-pointer accent-sky-400">
                        <div class="flex justify-between text-[11px] text-slate-400 mt-1">
                            <span>Hasta 10m (Base)</span>
                            <span>30m</span>
                            <span>60m (Máx)</span>
                        </div>
                    </div>
                </div>

                <!-- Price Box Breakdown -->
                <div class="p-6 rounded-2xl bg-slate-950/80 border border-emerald-500/30 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div>
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block">Total Estimado del Servicio:</span>
                        <div class="text-4xl font-black text-emerald-400 tracking-tight mt-1" x-text="format(totalCalculated)"></div>
                        <span class="text-xs text-slate-400">Incluye Sellado Prodoral + Pruebas Hermeticidad + Certificado SEC + 3 Años Garantía.</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" value="neto" x-model="taxType" class="sr-only">
                            <span :class="taxType === 'neto' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-800 text-slate-300'" class="px-3 py-1.5 text-xs rounded-lg transition-colors">Neto Directo</span>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" value="factura" x-model="taxType" class="sr-only">
                            <span :class="taxType === 'factura' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-800 text-slate-300'" class="px-3 py-1.5 text-xs rounded-lg transition-colors">Con Factura (+IVA)</span>
                        </label>
                    </div>
                </div>

                <!-- Quick Booking Form -->
                <div class="space-y-4 pt-2">
                    <h3 class="text-sm font-bold text-white uppercase tracking-wider">Complete sus datos para agendar o recibir cotización por WhatsApp:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <input type="text" placeholder="Su Nombre *" x-model="clientName" required
                               class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                        <input type="tel" placeholder="Teléfono WhatsApp (+56 9...) *" x-model="clientPhone" required
                               class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                        <input type="text" placeholder="Comuna (Ej: Las Condes, Ñuñoa)" x-model="clientComuna"
                               class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                    </div>

                    <button type="button" @click="submitQuote()" :disabled="loading"
                            class="w-full py-4 bg-gradient-to-r from-emerald-500 via-teal-500 to-sky-500 hover:from-emerald-400 hover:to-sky-400 text-slate-950 font-black text-base rounded-xl shadow-lg shadow-emerald-500/25 transition-all flex items-center justify-center gap-2 cursor-pointer">
                        <i data-lucide="send" class="w-5 h-5"></i>
                        <span x-text="loading ? 'Registrando cotización...' : 'Solicitar Visita / Enviar Cotización a Domingo por WhatsApp'"></span>
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!-- Why Prodoral Section (Table) -->
    <section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest block mb-2">Tecnología de Vanguardia</span>
            <h2 class="text-3xl font-black text-white">¿Por qué reparar con Prodoral R6-1 en vez de picar muros?</h2>
        </div>

        <div class="overflow-x-auto rounded-2xl border border-slate-800 bg-slate-900/60">
            <table class="w-full text-left text-sm text-slate-300">
                <thead class="bg-slate-900 text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-800">
                    <tr>
                        <th class="py-4 px-6">Característica</th>
                        <th class="py-4 px-6 text-emerald-400 font-black">SellafuGas® Prodoral R6-1</th>
                        <th class="py-4 px-6 text-rose-400 font-black">Gasfitería Tradicional (Picar)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    <tr>
                        <td class="py-4 px-6 font-semibold text-white">Daño Estructural</td>
                        <td class="py-4 px-6 text-emerald-300 font-bold">Cero rotura de muros, pisos ni cerámicas</td>
                        <td class="py-4 px-6 text-slate-400">Demolición invasiva, polvo y escombros</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6 font-semibold text-white">Tiempo de Ejecución</td>
                        <td class="py-4 px-6 text-emerald-300 font-bold">Menos de 2 horas</td>
                        <td class="py-4 px-6 text-slate-400">De 4 a 10 días de obras</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6 font-semibold text-white">Garantía Escrita</td>
                        <td class="py-4 px-6 text-emerald-300 font-bold">3 Años de Garantía</td>
                        <td class="py-4 px-6 text-slate-400">6 meses a 1 año</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6 font-semibold text-white">Certificado SEC</td>
                        <td class="py-4 px-6 text-emerald-300 font-bold">Certificado Oficial Inmediato</td>
                        <td class="py-4 px-6 text-slate-400">Requiere inspecciones adicionales</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- FAQ Accordion -->
    <section class="py-16 bg-slate-900/40 border-t border-slate-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4" x-data="{ openFaq: null }">
            <div class="text-center mb-8">
                <span class="text-xs font-bold text-sky-400 uppercase tracking-widest block mb-2">Dudas y Respuestas</span>
                <h2 class="text-3xl font-black text-white">Preguntas Frecuentes sobre Fugas de Gas</h2>
            </div>

            <!-- FAQ Item 1 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 1 ? null : 1)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>¿Cómo funciona el sellado de cañerías de gas con Prodoral R6-1?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 1" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Prodoral R6-1 es una emulsión polimérica viscosa de fabricación alemana que se inyecta neumáticamente a través de las cañerías de gas existentes tras desconectar los artefactos. Recorre todas las roscas y microporos, polimerizando y formando un sello elástico permanente que resiste vibraciones y no se degrada con el gas licuado o natural.
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 2 ? null : 2)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>¿El certificado emitido es válido ante la SEC y compañías de gas (Metrogas, Lipigas, Abastible, Gasco)?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 2" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí, 100%. Domingo Isain Plaza Caamaño es Gasfíter Instalador de Gas Autorizado SEC Clase 3 (RUT 12.738.961-6). El certificado cuenta con código QR verificable en la plataforma oficial de la SEC y cumple con la normativa DS66 Artículo 44.2.3.
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 3 ? null : 3)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>¿Qué ocurre si tengo gas cortado por sello rojo de la entidad inspectora?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 3" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Realizamos el sellado y la prueba de hermeticidad el mismo día. Al finalizar, te entregamos el Certificado de Servicio sellado y firmado para que la entidad certificadora o empresa distribuidora reestablezca el suministro de gas sin demoras.
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-950 border-t border-slate-800 text-slate-400 text-xs py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-3">
                <span class="text-base font-black text-white block">SellafuGas® Domingo Isain</span>
                <p>Especialistas en detección y sellado de fugas de gas sin romper muros con Prodoral R6-1. Gasfíter Autorizado SEC Clase 3.</p>
                <p class="text-slate-300">RUT Empresa: 76.776.528-2 · Estado 215, Santiago</p>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Servicios Especializados</span>
                <ul class="space-y-2">
                    <li><a href="{{ route('landing.fugas-gas') }}" class="text-sky-400 font-bold">Sellado Fugas de Gas</a></li>
                    <li><a href="{{ route('landing.gasfiter-sec') }}" class="hover:text-white transition-colors">Gasfíter Certificado SEC</a></li>
                    <li><a href="{{ route('landing.gas-trazador') }}" class="hover:text-white transition-colors">Detección con Gas Trazador</a></li>
                    <li><a href="{{ route('landing.fugas-agua') }}" class="hover:text-white transition-colors">Detección Fugas de Agua</a></li>
                    <li><a href="{{ route('landing.fugas-piscinas') }}" class="hover:text-white transition-colors">Fugas en Piscinas</a></li>
                </ul>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Contacto Directo</span>
                <ul class="space-y-2">
                    <li>Teléfono: <a href="tel:+56949877316" class="text-white font-bold">+56 9 4987 7316</a></li>
                    <li>WhatsApp: <a href="https://wa.me/56949877316" target="_blank" class="text-emerald-400 font-bold">949 877 316</a></li>
                    <li>Email: <a href="mailto:domi@sellafugas.cl" class="hover:text-white">domi@sellafugas.cl</a></li>
                    <li>Atención: 24/7 Urgencias en RM y Regiones</li>
                </ul>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Acreditación SEC</span>
                <img src="{{ asset('images/logotipo-sec.png') }}" alt="SEC Logo" class="h-12 w-auto mb-2">
                <p class="text-[11px] text-slate-400">Superintendencia de Electricidad y Combustibles (SEC) · Clase 3 RUT 12.738.961-6</p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 mt-8 pt-6 border-t border-slate-900 text-center text-[11px] text-slate-400">
            © {{ date('Y') }} SellafuGas.cl · Todos los derechos reservados.
        </div>
    </footer>

    <!-- Floating Buttons -->
    <div class="fixed bottom-6 right-6 z-50 flex flex-col gap-3">
        <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo,%20tengo%20una%20fuga%20de%20gas%20y%20necesito%20sellado%20con%20Prodoral%20R6-1" target="_blank"
           class="w-14 h-14 bg-emerald-500 hover:bg-emerald-400 text-slate-950 rounded-full shadow-2xl flex items-center justify-center transition-transform hover:scale-110">
            <i data-lucide="message-circle" class="w-7 h-7"></i>
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if(window.lucide) lucide.createIcons();
        });
    </script>
</body>
</html>
