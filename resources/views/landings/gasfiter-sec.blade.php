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

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap">

    <!-- Production Compiled Tailwind CSS Stylesheet (Critical Layout - Zero CLS) -->
    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}">

    <!-- Animations Stylesheet (Non-Render-Blocking) -->
    <link rel="preload" href="{{ asset('css/animations.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('css/animations.css') }}"></noscript>

    <!-- Local Alpine.js & Lucide Icons -->
    <script defer src="{{ asset('js/alpine.min.js') }}"></script>
    <script defer src="{{ asset('js/lucide.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.requestIdleCallback) {
                requestIdleCallback(function() { if (window.lucide) lucide.createIcons(); });
            } else {
                setTimeout(function() { if (window.lucide) lucide.createIcons(); }, 1);
            }
        });
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

    <!-- Schema.org JSON-LD Plumber -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Plumber",
      "name": "Domingo Isain Plaza Caamaño - Gasfiter Certificado Autorizado SEC Clase 3",
      "image": "{{ asset('images/domingo-isain.jpg') }}",
      "@@id": "https://sellafugas.cl/gasfiter-sec",
      "url": "https://sellafugas.cl/gasfiter-sec",
      "telephone": "+56949877316",
      "priceRange": "$$",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "Estado 215 / Av. Libertador Bernardo O'Higgins 1302",
        "addressLocality": "Santiago",
        "addressRegion": "Región Metropolitana",
        "postalCode": "8320000",
        "addressCountry": "CL"
      },
      "areaServed": ["Santiago", "Las Condes", "Vitacura", "Providencia", "Lo Barnechea", "La Reina", "Ñuñoa", "Peñalolén", "La Florida", "Chicureo", "Valparaíso", "Rancagua"],
      "founder": {
        "@@type": "Person",
        "name": "Domingo Isain Plaza Caamaño",
        "jobTitle": "Gasfiter Certificado Autorizado SEC Clase 3",
        "taxID": "12.738.961-6"
      }
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
          "name": "¿Cómo verificar que un gasfíter está realmente autorizado y vigente en la SEC?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Se puede verificar ingresando el RUT del instalador en el Registro Nacional de Instaladores de Gas de la SEC. Domingo Isain Plaza Caamaño cuenta con RUT 12.738.961-6 y licencia SEC Clase 3 activa desde 2009, verificable además mediante el código QR impreso en cada certificado de servicio."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué tipo de trabajos puede certificar un Gasfiter SEC Clase 3?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Un instalador Clase 3 está autorizado por la SEC para ejecutar, reparar, modificar y certificar instalaciones interiores de gas en baja presión para uso residencial y comercial hasta 60 kW de potencia térmica nominal, incluyendo sellado de fugas, pruebas de hermeticidad DS66 y memorias de cálculo."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué incluye el Certificado Oficial de Servicio emitido por Domingo Isain?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Incluye los datos del cliente y predio, detalle del procedimiento técnico bajo norma DS66, medición manométrica digital a 368 mmca por 5 minutos, evidencia fotográfica, firma autorizada SEC y código QR para verificación digital inmediata ante entidades certificadoras."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuánto demora la atención a domicilio en Santiago y comunas aledañas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Atendemos urgencias el mismo día en comunas como Las Condes, Vitacura, Providencia, Lo Barnechea, La Reina, Ñuñoa, Santiago Centro, La Florida, Peñalolén y Chicureo, coordinando horarios flexibles de lunes a domingo."
          }
        },
        {
          "@@type": "Question",
          "name": "¿El gasfiter SEC repara fugas de gas sin tener que romper pisos ni paredes?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Como especialista certificado, Domingo Isain aplica la tecnología de inyección de polímero alemán Prodoral R6-1 (normas DIN EN 13090 y NAG-203), sellando cañerías interiores no visibles en menos de 2 horas sin picar cerámicos ni demoler muros."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo se soluciona un corte de suministro de gas o Sello Rojo?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Se inspecciona la red, se corrige la fuga o anomalía detectada en el informe de inspección, se realiza la prueba de hermeticidad manométrica normada y se emite el Certificado Oficial de Servicio para que la empresa distribuidora reabra la llave de paso de gas."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Se entrega garantía por los trabajos de gasfitería y sellado de gas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Todos los trabajos de sellado de fugas cuentan con 3 años de garantía por escrito, y las reparaciones de artefactos e instalaciones cuentan con respaldo técnico directo."
          }
        },
        {
          "@@type": "Question",
          "name": "¿En qué consiste la política 'Usted Paga Después de Solucionado'?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "No solicitamos anticipos para el inicio del servicio. El pago se efectúa únicamente cuando el trabajo ha sido ejecutado y se ha comprobado la hermeticidad total con manómetro digital ante el cliente."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Se realizan revisiones de artefactos a gas como calefones y cocinas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Se verifica la correcta combustión, ducto de evacuación de gases quemados, llaves de paso, flexibles normados y uniones roscadas de calefones, calderas y cocinas a gas."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuáles son los medios de pago aceptados?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Aceptamos transferencia electrónica bancaria, tarjetas de débito/crédito y efectivo, emitiendo boleta o factura exenta/afecta según requerimiento del cliente o comunidad de edificio."
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
          servicio: 'Sellado de Fuga de Gas Prodoral',
          openFaq: null,
          submitForm() {
              if(!this.nombre || !this.telefono) {
                  alert('Por favor ingrese su Nombre y Teléfono');
                  return;
              }
              const text = `Hola Domingo Isain (Gasfiter SEC), solicito atención técnica:\n\n👤 *Nombre:* ${this.nombre}\n📱 *Teléfono:* ${this.telefono}\n📍 *Comuna:* ${this.comuna}\n🛠️ *Servicio:* ${this.servicio}`;
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
                
                <div class="lg:col-span-5">
                    <div class="glass-card p-8 rounded-3xl border border-slate-700 space-y-6 text-center shadow-2xl">
                        <img src="{{ asset('images/domingo-isain.jpg') }}" alt="Domingo Isain Plaza Caamaño Gasfiter SEC Clase 3" 
                             class="w-44 h-44 rounded-3xl object-cover border-4 border-emerald-400 mx-auto shadow-2xl">
                        
                        <div>
                            <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest block mb-1">Registro Nacional SEC</span>
                            <h2 class="text-2xl font-black text-white">Domingo Isain Plaza Caamaño</h2>
                            <p class="text-sm font-semibold text-slate-300">Gasfíter Instalador de Gas Clase 3</p>
                            <span class="inline-block mt-2 text-xs font-mono font-bold text-sky-400 bg-slate-900 px-3 py-1 rounded-lg border border-slate-800">
                                RUT: 12.738.961-6 · Vigente
                            </span>
                        </div>

                        <div class="p-4 rounded-2xl bg-slate-900/90 border border-slate-800 text-left text-xs space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400">Emisión Certificados:</span>
                                <span class="text-emerald-400 font-bold">Inmediata en Terreno</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400">Validación Online:</span>
                                <span class="text-sky-400 font-bold">Código QR Plataforma SEC</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400">Cobertura:</span>
                                <span class="text-white font-semibold">Toda la Región Metropolitana</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-center gap-4 pt-2">
                            <img src="{{ asset('images/logotipo-sec.png') }}" alt="SEC Logo" class="h-10 w-auto">
                            <img src="{{ asset('images/qr-sec.png') }}" alt="QR Validación SEC" class="h-16 w-auto p-1 bg-white rounded-lg shadow">
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-500/10 border border-sky-500/30 text-sky-300 text-xs font-bold uppercase tracking-wider">
                        <span>Acreditación Oficial Superintendencia SEC</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl font-black text-white tracking-tight leading-tight">
                        Gasfíter Certificado Autorizado SEC <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-emerald-400">a Domicilio</span>
                    </h1>

                    <p class="text-base text-slate-300 leading-relaxed">
                        Atención técnica directa por <strong>Domingo Isain Plaza Caamaño</strong>, gasfíter autorizado por la SEC Clase 3 con más de 15 años de trayectoria ininterrumpida. Servicios especializados en sellado de fugas con Prodoral R6-1, levantamiento de sellos rojos, pruebas de hermeticidad con manómetro digital normado y emisión de certificados oficiales.
                    </p>

                    <!-- Fast Contact Card -->
                    <div class="glass-card p-6 rounded-2xl border border-slate-700 space-y-4">
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Solicitar Atención Técnica o Certificado SEC:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <input type="text" placeholder="Su Nombre *" x-model="nombre"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                            <input type="tel" placeholder="Teléfono WhatsApp *" x-model="telefono"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <input type="text" placeholder="Comuna (Ej: Las Condes, Ñuñoa)" x-model="comuna"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                            <select x-model="servicio" class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                                <option value="Sellado de Fuga de Gas Prodoral">Sellado de Fuga de Gas Prodoral</option>
                                <option value="Prueba de Hermeticidad DS66">Prueba de Hermeticidad DS66</option>
                                <option value="Levantamiento de Sello Rojo">Levantamiento de Sello Rojo</option>
                                <option value="Emisión Certificado Oficial SEC">Emisión Certificado Oficial SEC</option>
                                <option value="Inspección / Urgencia Fuga">Inspección / Urgencia Fuga</option>
                            </select>
                        </div>

                        <button type="button" @click="submitForm()"
                                class="w-full py-3.5 bg-gradient-to-r from-emerald-500 to-sky-500 hover:from-emerald-400 hover:to-sky-400 text-slate-950 font-black text-sm rounded-xl shadow-lg shadow-emerald-500/25 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                            <span>Enviar Solicitud a Domingo por WhatsApp</span>
                        </button>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
                        <div class="p-3 rounded-xl bg-slate-900 border border-slate-800 text-center">
                            <span class="text-xs font-bold text-white block">Usted Paga Después</span>
                            <span class="text-[11px] text-slate-400">Al terminar el trabajo</span>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-900 border border-slate-800 text-center">
                            <span class="text-xs font-bold text-white block">3 Años Garantía</span>
                            <span class="text-[11px] text-slate-400">Garantía por escrito</span>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-900 border border-slate-800 text-center">
                            <span class="text-xs font-bold text-white block">Validez SEC</span>
                            <span class="text-[11px] text-slate-400">Con código QR oficial</span>
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
                <span class="text-xs font-bold text-sky-400 uppercase tracking-widest block mb-2">Acreditación y Servicios</span>
                <h2 class="text-3xl font-black text-white">10 Preguntas Frecuentes sobre Gasfíter Certificado SEC</h2>
                <p class="text-xs text-slate-400 mt-1">Conoce los alcances técnicos y legales de contratar a un instalador autorizado SEC Clase 3</p>
            </div>

            <!-- FAQ 1 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 1 ? null : 1)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>1. ¿Cómo verificar que un gasfíter está realmente autorizado y vigente en la SEC?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 1" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Se puede verificar ingresando el RUT del instalador en el Registro Nacional de Instaladores de Gas de la SEC. Domingo Isain Plaza Caamaño cuenta con RUT 12.738.961-6 y licencia SEC Clase 3 activa desde 2009, verificable además mediante el código QR impreso en cada certificado de servicio.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 2 ? null : 2)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>2. ¿Qué tipo de trabajos puede certificar un Gasfiter SEC Clase 3?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 2" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Un instalador Clase 3 está autorizado por la SEC para ejecutar, reparar, modificar y certificar instalaciones interiores de gas en baja presión para uso residencial y comercial hasta 60 kW de potencia térmica nominal, incluyendo sellado de fugas, pruebas de hermeticidad DS66 y memorias de cálculo.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 3 ? null : 3)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>3. ¿Qué incluye el Certificado Oficial de Servicio emitido por Domingo Isain?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 3" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Incluye los datos del cliente y predio, detalle del procedimiento técnico bajo norma DS66, medición manométrica digital a 368 mmca por 5 minutos, evidencia fotográfica, firma autorizada SEC y código QR para verificación digital inmediata ante entidades certificadoras.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 4 ? null : 4)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>4. ¿Cuánto demora la atención a domicilio en Santiago y comunas aledañas?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 4" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Atendemos urgencias el mismo día en comunas como Las Condes, Vitacura, Providencia, Lo Barnechea, La Reina, Ñuñoa, Santiago Centro, La Florida, Peñalolén y Chicureo, coordinando horarios flexibles de lunes a domingo.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 5 ? null : 5)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>5. ¿El gasfiter SEC repara fugas de gas sin tener que romper pisos ni paredes?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 5 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 5" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Como especialista certificado, Domingo Isain aplica la tecnología de inyección de polímero alemán Prodoral R6-1 (normas DIN EN 13090 y NAG-203), sellando cañerías interiores no visibles en menos de 2 horas sin picar cerámicos ni demoler muros.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 6 ? null : 6)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>6. ¿Cómo se soluciona un corte de suministro de gas o Sello Rojo?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 6 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 6" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Se inspecciona la red, se corrige la fuga o anomalía detectada en el informe de inspección, se realiza la prueba de hermeticidad manométrica normada y se emite el Certificado Oficial de Servicio para que la empresa distribuidora reabra la llave de paso de gas.
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 7 ? null : 7)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>7. ¿Se entrega garantía por los trabajos de gasfitería y sellado de gas?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 7 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 7" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Todos los trabajos de sellado de fugas cuentan con 3 años de garantía por escrito, y las reparaciones de artefactos e instalaciones cuentan con respaldo técnico directo.
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 8 ? null : 8)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>8. ¿En qué consiste la política 'Usted Paga Después de Solucionado'?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 8 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 8" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    No solicitamos anticipos para el inicio del servicio. El pago se efectúa únicamente cuando el trabajo ha sido ejecutado y se ha comprobado la hermeticidad total con manómetro digital ante el cliente.
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 9 ? null : 9)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>9. ¿Se realizan revisiones de artefactos a gas como calefones y cocinas?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 9 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 9" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Se verifica la correcta combustión, ducto de evacuación de gases quemados, llaves de paso, flexibles normados y uniones roscadas de calefones, calderas y cocinas a gas.
                </div>
            </div>

            <!-- FAQ 10 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 10 ? null : 10)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>10. ¿Cuáles son los medios de pago aceptados?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 10 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 10" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Aceptamos transferencia electrónica bancaria, tarjetas de débito/crédito y efectivo, emitiendo boleta o factura exenta/afecta según requerimiento del cliente o comunidad de edificio.
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
