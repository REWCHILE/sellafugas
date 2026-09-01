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
        .glow-sky {
            box-shadow: 0 0 40px -10px rgba(2, 132, 199, 0.35);
        }
    </style>

    <!-- Schema.org JSON-LD Service & LocalBusiness -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "HVACBusiness",
      "name": "SellafuGas® Domingo Isain - Sellado de Fugas de Gas Prodoral R6-1",
      "image": "{{ asset('images/logotipo-sellafugas.cl.webp') }}",
      "@@id": "https://sellafugas.cl/fugas-de-gas",
      "url": "https://sellafugas.cl/fugas-de-gas",
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
      "founder": {
        "@@type": "Person",
        "name": "Domingo Isain Plaza Caamaño",
        "jobTitle": "Gasfiter Certificado Autorizado SEC Clase 3",
        "taxID": "12.738.961-6"
      },
      "areaServed": ["Santiago", "Las Condes", "Vitacura", "Providencia", "Lo Barnechea", "La Reina", "Ñuñoa", "Peñalolén", "La Florida", "Chicureo", "Colina", "Maipú", "San Miguel", "Rancagua", "Valparaíso", "Viña del Mar"]
    }
    </script>

    <!-- Schema.org JSON-LD FAQPage (10 FAQs Reales) -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "FAQPage",
      "mainEntity": [
        {
          "@@type": "Question",
          "name": "¿Cómo se realiza el sellado de cañerías de gas con Prodoral R6-1 sin picar muros ni pisos?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Prodoral R6-1 es una dispersión polimérica alemana certificada DIN EN 13090 y NAG-203. Se inyecta neumáticamente a presión controlada dentro de la cañería tras aislar los artefactos. Recorre todo el interior, polimerizando y sellando todas las uniones roscadas y microporos de forma hermética y elástica sin romper muros ni pisos."
          }
        },
        {
          "@@type": "Question",
          "name": "¿El certificado emitido es válido ante la SEC y compañías de gas como Metrogas, Lipigas, Abastible y Gasco?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí, absolutamente. Domingo Isain Plaza Caamaño es Gasfíter Instalador de Gas Autorizado SEC Clase 3 (RUT 12.738.961-6). Al terminar la prueba de hermeticidad a 368 mmca bajo Decreto Supremo DS66 Artículo 44.2.3, se entrega el Certificado Oficial de Servicio con código QR verificable en la plataforma oficial de la SEC."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuánto tiempo demora el procedimiento de sellado en una casa o departamento?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "El procedimiento completo toma menos de 2 horas. Incluye la prueba de diagnóstico inicial, desconexión de artefactos, inyección neumática del sellante alemán Prodoral, purga, secado neumático y prueba final de hermeticidad estanco por 5 minutos a 368 mmca."
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
            "text": "Prodoral R6-1 cumple rigurosamente con las normativas internacionales DIN EN 13090 y NAG-203, y está expresamente aceptado por la Superintendencia de Electricidad y Combustibles (SEC) bajo el Decreto Supremo 66 Artículo 7."
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
        },
        {
          "@@type": "Question",
          "name": "¿Es compatible con gas natural y gas licuado de petróleo (GLP)?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Prodoral R6-1 es 100% compatible y químicamente resistente tanto a gas licuado (GLP en cilindros o granel) como a gas natural por cañería de red, garantizando una vida útil de décadas en la instalación."
          }
        }
      ]
    }
    </script>
</head>
<body class="bg-slate-950 text-slate-100 antialiased selection:bg-brand-500 selection:text-white overflow-x-hidden"
      x-data="{
          metros: 12,
          zone: 'rm',
          taxType: 'neto',
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
          openFaq: null,
          async submitQuote() {
              if(!this.clientName || !this.clientPhone) {
                  alert('Por favor ingrese su Nombre y Teléfono');
                  return;
              }
              this.loading = true;
              try {
                  const res = await fetch('{{ route('quote.public.store') }}', {
                      method: 'POST',
                      headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                      body: JSON.stringify({
                          nombre: this.clientName,
                          telefono: this.clientPhone,
                          comuna: this.clientComuna,
                          metros: this.metros,
                          zone: this.zone,
                          tax_type: this.taxType,
                          detalles: 'Cotización desde Landing Fugas de Gas Prodoral'
                      })
                  });
                  const data = await res.json();
                  if(data.success && data.whatsapp_url) {
                      window.open(data.whatsapp_url, '_blank');
                  }
              } catch(e) { console.error(e); }
              finally { this.loading = false; }
          }
      }">

    <!-- Top Header Partial -->
    @include('partials.landing-header')

    <main id="main-content" class="overflow-x-hidden">

    <!-- Hero Section -->
    <section class="relative pt-12 pb-20 overflow-hidden bg-radial from-slate-900 to-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs font-bold uppercase tracking-wider">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        <span>Tecnología Alemana Certificada · DS66 SEC Art. 7</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-[1.1]">
                        Sellado de Fugas de Gas <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-teal-300 to-emerald-400">Sin Picar Muros ni Pisos</span>
                    </h1>

                    <p class="text-lg text-slate-300 leading-relaxed">
                        Solución definitiva e inmediata para fugas de gas no visibles en cañerías interiores de casas, departamentos y edificios con <strong>Prodoral R6-1</strong>. Procedimiento en menos de 2 horas con prueba de hermeticidad manométrica digital y <strong>Certificado Oficial SEC</strong> emitido por <strong>Domingo Isain Plaza Caamaño</strong>.
                    </p>

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

    <!-- Technical Workflow: 4 Steps -->
    <section class="py-16 bg-slate-900/80 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-xs font-bold text-sky-400 uppercase tracking-widest block mb-2">Procedimiento Certificado en 4 Fases</span>
                <h2 class="text-3xl font-black text-white">¿Cómo realizamos el sellado de cañerías en menos de 2 horas?</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="glass-card p-6 rounded-2xl border border-slate-800 space-y-3">
                    <span class="w-10 h-10 rounded-xl bg-sky-500/20 text-sky-400 flex items-center justify-center font-black text-lg">1</span>
                    <h3 class="text-base font-bold text-white">Diagnóstico y Aislamiento</h3>
                    <p class="text-xs text-slate-300">Desconexión cuidadosa de artefactos y medidor. Prueba de estanqueidad inicial con manómetro digital de precisión.</p>
                </div>
                <div class="glass-card p-6 rounded-2xl border border-slate-800 space-y-3">
                    <span class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-black text-lg">2</span>
                    <h3 class="text-base font-bold text-white">Inyección Neumática Prodoral</h3>
                    <p class="text-xs text-slate-300">Inyección a presión controlada del polímero alemán Prodoral R6-1 para recorrer todas las uniones roscadas y microporos de la red.</p>
                </div>
                <div class="glass-card p-6 rounded-2xl border border-slate-800 space-y-3">
                    <span class="w-10 h-10 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center font-black text-lg">3</span>
                    <h3 class="text-base font-bold text-white">Purga y Secado con Aire</h3>
                    <p class="text-xs text-slate-300">Extracción del excedente de producto y secado forzado con turbina neumática para acelerar la polimerización interna del sello.</p>
                </div>
                <div class="glass-card p-6 rounded-2xl border border-slate-800 space-y-3">
                    <span class="w-10 h-10 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center font-black text-lg">4</span>
                    <h3 class="text-base font-bold text-white">Prueba DS66 y Certificado</h3>
                    <p class="text-xs text-slate-300">Prueba de hermeticidad a 368 mmca estanco por 5 minutos y entrega del Certificado Oficial SEC con QR y 3 años de garantía.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Price Calculator Section -->
    <section id="cotizador" class="py-16 bg-slate-950 border-y border-slate-800">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-xs font-bold text-sky-400 uppercase tracking-widest block mb-2">Cotizador Transparente en Tiempo Real</span>
                <h2 class="text-3xl font-black text-white">Calcula el Costo de Sellado de tu Red de Gas</h2>
                <p class="text-sm text-slate-400 mt-2">Valores oficiales SellafuGas®. Sin costos ocultos. Usted paga después de solucionado.</p>
            </div>

            <div class="glass-card p-8 rounded-3xl border border-slate-700 space-y-8">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                            1. Seleccione su Región:
                        </label>
                        <select x-model="zone" class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white font-semibold focus:outline-none focus:border-sky-500">
                            <option value="rm">Santiago (Región Metropolitana) - Base $300.000 (hasta 10m)</option>
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

    <!-- SECTION: DOMINGO ISAIN CERTIFICATIONS & CREDENTIALS -->
    @include('partials.certificates-section')

    <!-- 10 Visible FAQs Section -->
    <section id="faq" class="py-16 bg-slate-900/60 border-t border-slate-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            <div class="text-center mb-8">
                <span class="text-xs font-bold text-sky-400 uppercase tracking-widest block mb-2">Resolución de Dudas Frecuentes</span>
                <h2 class="text-3xl font-black text-white">10 Preguntas Frecuentes sobre Sellado de Fugas de Gas</h2>
                <p class="text-xs text-slate-400 mt-1">Todo lo que necesitas saber antes de contratar el servicio con SellafuGas® y Domingo Isain</p>
            </div>

            <!-- FAQ 1 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 1 ? null : 1)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>1. ¿Cómo se realiza el sellado de cañerías de gas con Prodoral R6-1 sin picar muros ni pisos?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 1" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Prodoral R6-1 es una dispersión polimérica alemana certificada DIN EN 13090 y NAG-203. Se inyecta neumáticamente a presión controlada dentro de la cañería tras aislar los artefactos. Recorre todo el interior, polimerizando y sellando todas las uniones roscadas y microporos de forma hermética y elástica sin romper muros ni pisos.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 2 ? null : 2)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>2. ¿El certificado emitido es válido ante la SEC y compañías de gas como Metrogas, Lipigas, Abastible y Gasco?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 2" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí, absolutamente. Domingo Isain Plaza Caamaño es Gasfíter Instalador de Gas Autorizado SEC Clase 3 (RUT 12.738.961-6). Al terminar la prueba de hermeticidad a 368 mmca bajo Decreto Supremo DS66 Artículo 44.2.3, se entrega el Certificado Oficial de Servicio con código QR verificable en la plataforma oficial de la SEC.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 3 ? null : 3)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>3. ¿Cuánto tiempo demora el procedimiento de sellado en una casa o departamento?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 3" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    El procedimiento completo toma menos de 2 horas. Incluye la prueba de diagnóstico inicial, desconexión de artefactos, inyección neumática del sellante alemán Prodoral, purga, secado neumático y prueba final de hermeticidad estanco por 5 minutos a 368 mmca.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 4 ? null : 4)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>4. ¿Qué garantía tiene el sellado de cañerías de gas?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 4" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Otorgamos 3 años de garantía por escrito por efectos de sellado de fugas de gas en la red interior tratada.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 5 ? null : 5)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>5. ¿En qué consiste la condición 'Usted Paga Después de Solucionado'?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 5 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 5" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Nuestra política de máxima confianza y seguridad garantiza que el cliente solo realiza el pago una vez que el procedimiento ha concluido con éxito y se ha demostrado la total hermeticidad de la instalación mediante manómetro digital sin caídas de presión.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 6 ? null : 6)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>6. ¿Qué normas técnicas cumple el producto Prodoral R6-1 en Chile?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 6 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 6" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Prodoral R6-1 cumple rigurosamente con las normativas internacionales DIN EN 13090 y NAG-203, y está expresamente aceptado por la Superintendencia de Electricidad y Combustibles (SEC) bajo el Decreto Supremo 66 Artículo 7.
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 7 ? null : 7)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>7. ¿Se deben desconectar artefactos a gas durante el sellado?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 7 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 7" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Nuestro servicio incluye la desconexión cuidadosa y posterior reconexión de todos los artefactos a gas (calefón, cocina, estufas, calderas) para aislar la red durante la inyección y asegurar una hermeticidad total.
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 8 ? null : 8)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>8. ¿Qué cobertura tienen en Santiago y regiones?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 8 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 8" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Atendemos de forma inmediata en toda la Región Metropolitana (Las Condes, Vitacura, Providencia, Lo Barnechea, Chicureo, La Reina, Ñuñoa, La Florida, Maipú, Santiago Centro, etc.), Quinta Región (Valparaíso, Viña del Mar, Quilpué, etc.) y Sexta Región (Rancagua, Machalí, etc.).
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 9 ? null : 9)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>9. ¿Cómo solicito atención inmediata si tengo gas cortado por sello rojo o emergencia?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 9 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 9" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Puede comunicarse directamente al teléfono / WhatsApp +56 9 4987 7316 (949 877 316) o completar el cotizador en línea. Atendemos emergencias y urgencias el mismo día para reestablecer el suministro de gas a la brevedad.
                </div>
            </div>

            <!-- FAQ 10 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 10 ? null : 10)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>10. ¿Es compatible con gas natural y gas licuado de petróleo (GLP)?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 10 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 10" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Prodoral R6-1 es 100% compatible y químicamente resistente tanto a gas licuado (GLP en cilindros o granel) como a gas natural por cañería de red, garantizando una vida útil de décadas en la instalación.
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
