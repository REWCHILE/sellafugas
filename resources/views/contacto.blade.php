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
    <meta property="og:image" content="{{ asset('images/logotipo-sellafugas.cl.webp') }}">

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

    <!-- Schema.org JSON-LD ContactPage -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "ContactPage",
      "mainEntity": {
        "@@type": "EmergencyService",
        "name": "SellafuGas® Central de Emergencias y Contacto",
        "telephone": "+56949877316",
        "url": "https://sellafugas.cl/contacto",
        "areaServed": ["Santiago", "Las Condes", "Vitacura", "Providencia", "Lo Barnechea", "La Reina", "Ñuñoa", "Peñalolén", "Chicureo", "Valparaíso", "Rancagua"]
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
          "name": "¿Cuál es el tiempo de respuesta ante una urgencia de gas?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Atendemos llamadas y mensajes de WhatsApp de forma inmediata. Para visitas técnicas de urgencia en la Región Metropolitana, coordinamos el arribo en 30 a 60 minutos según el sector."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué debo hacer inmediatamente si sospecho de una fuga de gas en mi casa?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "1) Cierre de inmediato la llave de paso general de gas (en el medidor o cilindros). 2) Abra puertas y ventanas para ventilar. 3) No encienda interruptores eléctricos, fósforos ni artefactos. 4) Llame a nuestra línea técnica 949 877 316 o escríbanos por WhatsApp."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuál es el costo de la visita técnica de diagnóstico?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "La cotización y asesoría inicial por WhatsApp o teléfono es 100% gratuita. Si se requiere inspección manométrica en terreno, se informa el valor antes de la visita y se descuenta del trabajo final si se realiza la reparación o sellado."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué medios de pago están disponibles?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Aceptamos transferencia electrónica bancaria directa, tarjetas de débito (Redcompra) y tarjetas de crédito (Transbank con cuotas). Entregamos boleta o factura electrónica."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Atienden fines de semana y días festivos?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Disponemos de servicio técnico de guardia los sábados, domingos y feriados para emergencias de gas y agua."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Entregan presupuesto formal antes de realizar cualquier trabajo?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Emitimos un presupuesto formal por escrito detallando los alcances, tiempos de ejecución, garantía y valor total cerrado, sin costos ocultos."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Puedo enviar fotos o videos de mi instalación por WhatsApp para una evaluación previa?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Totalmente. Enviar fotos del medidor, calefont, artefactos o informe de inspección periódica (Sello Rojo) nos permite entregar un pre-diagnóstico y valor exacto de forma instantánea."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Atienden a empresas, colegios, restaurantes y condominios?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Prestamos servicios a administraciones de edificios, restaurantes, locales comerciales e instituciones con emisión de factura y certificados SEC oficiales."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué comunas cuentan con atención el mismo día?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Todas las comunas del Gran Santiago: sector oriente (Las Condes, Vitacura, Providencia, Lo Barnechea, La Reina, Ñuñoa, Peñalolén), sector norte (Chicureo, Colina, Huechuraba), centro, sur y poniente."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo coordinar una visita técnica con Domingo Isain?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Puede llamar al +56 9 4987 7316, escribir por WhatsApp o rellenar el formulario de contacto de esta página."
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
          servicio: 'Sellado de Fuga de Gas (Prodoral R6-1)',
          mensaje: '',
          openFaq: null,
          submitContacto() {
              if(!this.nombre || !this.telefono) {
                  alert('Por favor ingrese su Nombre y Teléfono');
                  return;
              }
              let text = `Hola Domingo Isain (SellafuGas), necesito atención técnica:\n\n👤 *Nombre:* ${this.nombre}\n📱 *Teléfono:* ${this.telefono}\n📍 *Comuna:* ${this.comuna}\n🛠️ *Servicio:* ${this.servicio}`;
              if(this.mensaje) {
                  text += `\n📝 *Detalle:* ${this.mensaje}`;
              }
              window.open(`https://api.whatsapp.com/send?phone=56949877316&text=${encodeURIComponent(text)}`, '_blank');
          }
      }">

    <!-- Top Header Partial -->
    @include('partials.landing-header')

    <!-- Hero Section Contacto -->
    <section class="py-16 bg-radial from-slate-900 to-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <!-- Left: Channels & Info -->
                <div class="lg:col-span-6 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs font-bold uppercase tracking-wider">
                        <span>Central Telefónica y WhatsApp 24/7</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl font-black text-white tracking-tight leading-tight">
                        Contacto y Atención de <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-sky-400">Emergencias SEC</span>
                    </h1>

                    <p class="text-base text-slate-300 leading-relaxed">
                        Estamos a su disposición las 24 horas del día para atender fugas de gas, sellos rojos, emergencias de agua potable y certificación SEC. Respuesta técnica directa con <strong>Domingo Isain Plaza Caamaño</strong>.
                    </p>

                    <!-- Contact Channels Grid -->
                    <div class="space-y-4 pt-2">
                        <div class="glass-card p-5 rounded-2xl border border-slate-800 flex items-center gap-4 hover:border-emerald-500/50 transition-all">
                            <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                                <i data-lucide="phone-call" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <span class="text-xs text-slate-400 font-semibold block">Línea Telefónica Directa:</span>
                                <a href="tel:+56949877316" class="text-xl font-black text-white hover:text-emerald-400 transition-colors">+56 9 4987 7316</a>
                            </div>
                        </div>

                        <div class="glass-card p-5 rounded-2xl border border-slate-800 flex items-center gap-4 hover:border-emerald-500/50 transition-all">
                            <div class="w-12 h-12 rounded-xl bg-teal-500/20 text-teal-400 flex items-center justify-center shrink-0">
                                <i data-lucide="message-circle" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <span class="text-xs text-slate-400 font-semibold block">WhatsApp Urgencias 24/7:</span>
                                <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo,%20necesito%20asistencia%20tecnica" target="_blank" class="text-xl font-black text-emerald-400 hover:text-emerald-300 transition-colors">949 877 316</a>
                            </div>
                        </div>

                        <div class="glass-card p-5 rounded-2xl border border-slate-800 flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-sky-500/20 text-sky-400 flex items-center justify-center shrink-0">
                                <i data-lucide="map-pin" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <span class="text-xs text-slate-400 font-semibold block">Zona de Cobertura:</span>
                                <p class="text-sm font-bold text-white">Región Metropolitana, Chicureo, V Región (Valparaíso/Viña) y VI Región (Rancagua/Machalí)</p>
                            </div>
                        </div>
                    </div>

                    <!-- SEC Badge -->
                    <div class="glass-card p-5 rounded-2xl border border-emerald-500/30 bg-emerald-950/20 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0 font-black text-xs">
                            SEC
                        </div>
                        <div>
                            <span class="text-xs font-bold text-emerald-400 block">Instalador Autorizado SEC Clase 3</span>
                            <p class="text-xs text-slate-300">Domingo Isain Plaza Caamaño · RUT: 12.738.961-6 · Decreto Supremo DS66</p>
                        </div>
                    </div>

                </div>

                <!-- Right: Interactive Form -->
                <div class="lg:col-span-6">
                    <div class="glass-card p-8 rounded-3xl border border-slate-700 space-y-5 shadow-2xl">
                        <div>
                            <span class="text-xs font-bold text-emerald-400 uppercase tracking-wider block">Atención Rápida</span>
                            <h2 class="text-2xl font-black text-white mt-1">Envíanos tu Requerimiento</h2>
                            <p class="text-xs text-slate-300 mt-1">Coordinación técnica inmediata por WhatsApp o llamada telefónica.</p>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Nombre Completo *</label>
                                <input type="text" placeholder="Ej: Andrea Silva" x-model="nombre"
                                       class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-emerald-500">
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Teléfono / WhatsApp *</label>
                                    <input type="tel" placeholder="Ej: +56 9 8765 4321" x-model="telefono"
                                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-emerald-500">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Comuna *</label>
                                    <input type="text" placeholder="Ej: Las Condes, Chicureo" x-model="comuna"
                                           class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-emerald-500">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Servicio Requerido</label>
                                <select x-model="servicio" class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-emerald-500">
                                    <option value="Sellado de Fuga de Gas (Prodoral R6-1)">Sellado de Fuga de Gas (Prodoral R6-1)</option>
                                    <option value="Levantamiento Sello Rojo SEC">Levantamiento Sello Rojo SEC</option>
                                    <option value="Gasfíter Autorizado SEC a Domicilio">Gasfíter Autorizado SEC a Domicilio</option>
                                    <option value="Detección con Gas Trazador">Detección con Gas Trazador</option>
                                    <option value="Detección Fuga de Agua con Geófono">Detección Fuga de Agua con Geófono</option>
                                    <option value="Detección Fuga en Piscina Sin Vaciar">Detección Fuga en Piscina Sin Vaciar</option>
                                    <option value="Reparación o Mantención de Calefont SEC">Reparación o Mantención de Calefont SEC</option>
                                    <option value="Emisión de Certificado Oficial SEC DS66">Emisión de Certificado Oficial SEC DS66</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Detalle del Requerimiento / Dirección</label>
                                <textarea rows="3" placeholder="Describa brevemente la situación (olor a gas, corte de medidor, cuenta de agua alta, etc.)..." x-model="mensaje"
                                          class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-emerald-500"></textarea>
                            </div>

                            <button type="button" @click="submitContacto()"
                                    class="w-full py-4 bg-gradient-to-r from-emerald-500 via-teal-500 to-sky-500 hover:from-emerald-400 hover:to-sky-400 text-slate-950 font-black text-base rounded-xl shadow-xl shadow-emerald-500/25 transition-all flex items-center justify-center gap-2 cursor-pointer">
                                <i data-lucide="send" class="w-5 h-5"></i>
                                <span>Enviar Solicitud a WhatsApp Directo</span>
                            </button>
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
                <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest block mb-2">Preguntas Frecuentes</span>
                <h2 class="text-3xl font-black text-white">10 Preguntas sobre Contacto y Atención de Emergencias</h2>
                <p class="text-xs text-slate-400 mt-1">Conoce nuestros tiempos de respuesta y protocolos de atención</p>
            </div>

            <!-- FAQ 1 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 1 ? null : 1)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>1. ¿Cuál es el tiempo de respuesta ante una urgencia de gas?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 1" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Atendemos llamadas y mensajes de WhatsApp de forma inmediata. Para visitas técnicas de urgencia en la Región Metropolitana, coordinamos el arribo en 30 a 60 minutos según el sector.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 2 ? null : 2)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>2. ¿Qué debo hacer inmediatamente si sospecho de una fuga de gas en mi casa?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 2" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    1) Cierre de inmediato la llave de paso general de gas (en el medidor o cilindros). 2) Abra puertas y ventanas para ventilar. 3) No encienda interruptores eléctricos, fósforos ni artefactos. 4) Llame a nuestra línea técnica 949 877 316 o escríbanos por WhatsApp.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 3 ? null : 3)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>3. ¿Cuál es el costo de la visita técnica de diagnóstico?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 3" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    La cotización y asesoría inicial por WhatsApp o teléfono es 100% gratuita. Si se requiere inspección manométrica en terreno, se informa el valor antes de la visita y se descuenta del trabajo final si se realiza la reparación o sellado.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 4 ? null : 4)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>4. ¿Qué medios de pago están disponibles?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 4" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Aceptamos transferencia electrónica bancaria directa, tarjetas de débito (Redcompra) y tarjetas de crédito (Transbank con cuotas). Entregamos boleta o factura electrónica.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 5 ? null : 5)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>5. ¿Atienden fines de semana y días festivos?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 5 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 5" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Disponemos de servicio técnico de guardia los sábados, domingos y feriados para emergencias de gas y agua.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 6 ? null : 6)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>6. ¿Entregan presupuesto formal antes de realizar cualquier trabajo?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 6 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 6" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Emitimos un presupuesto formal por escrito detallando los alcances, tiempos de ejecución, garantía y valor total cerrado, sin costos ocultos.
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 7 ? null : 7)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>7. ¿Puedo enviar fotos o videos de mi instalación por WhatsApp para una evaluación previa?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 7 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 7" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Totalmente. Enviar fotos del medidor, calefont, artefactos o informe de inspección periódica (Sello Rojo) nos permite entregar un pre-diagnóstico y valor exacto de forma instantánea.
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 8 ? null : 8)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>8. ¿Atienden a empresas, colegios, restaurantes y condominios?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 8 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 8" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Prestamos servicios a administraciones de edificios, restaurantes, locales comerciales e instituciones con emisión de factura y certificados SEC oficiales.
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 9 ? null : 9)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>9. ¿Qué comunas cuentan con atención el mismo día?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 9 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 9" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Todas las comunas del Gran Santiago: sector oriente (Las Condes, Vitacura, Providencia, Lo Barnechea, La Reina, Ñuñoa, Peñalolén), sector norte (Chicureo, Colina, Huechuraba), centro, sur y poniente.
                </div>
            </div>

            <!-- FAQ 10 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 10 ? null : 10)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>10. ¿Cómo coordinar una visita técnica con Domingo Isain?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-emerald-400 transition-transform" :class="openFaq === 10 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 10" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Puede llamar al +56 9 4987 7316, escribir por WhatsApp o rellenar el formulario de contacto de esta página.
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
