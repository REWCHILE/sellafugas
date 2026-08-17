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
    <meta property="og:image" content="{{ asset('images/certificados-sec-gas.png') }}">

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
      "name": "Emisión de Certificados Oficiales de Gas SEC DS66",
      "serviceType": "SEC Gas Installation Official Certification",
      "provider": {
        "@@type": "HVACBusiness",
        "name": "SellafuGas® Domingo Isain",
        "telephone": "+56949877316",
        "url": "https://sellafugas.cl/certificados-sec-gas"
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
          "name": "¿Qué es el Certificado Oficial de Gas SEC bajo Decreto Supremo DS66?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Es el documento legal emitido por un instalador de gas autorizado por la SEC (como Domingo Isain Clase 3) que acredita formalmente que una instalación de gas interior o una reparación cumple con todos los estándares de seguridad, trazado, ventilación y hermeticidad estipulados en el DS66."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Para qué trámites me exigen un Certificado Oficial SEC?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Se exige para la reposición o conexión de medidor de gas con Metrogas, Lipigas, Abastible o Gasco, levantamiento de sellos rojos, recepción final municipal de obras, venta o arriendo de propiedades y trámites de seguros."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo se valida la autenticidad del certificado emitido por Domingo Isain?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Cada certificado emitido incluye un código QR dinámico que enlaza directamente a la base de datos oficial de la SEC y al sistema de trazabilidad de SellafuGas, certificando la vigencia de la licencia SEC Clase 3 (RUT 12.738.961-6)."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué pruebas técnicas se realizan antes de emitir el certificado?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Se ejecuta una prueba manométrica digital de hermeticidad a 368 mmca por un lapso mínimo de 5 minutos estanco sin variación, inspección visual de trazado y verificación de llaves de paso y ventilaciones."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cuánto demora la entrega del certificado tras la prueba en terreno?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "La entrega es inmediata al finalizar la inspección técnica en formato digital PDF oficial firmado y copia impresa si el cliente lo requiere."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Sirve para regularizar sellos amarillos y rojos de la inspección periódica?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Tras realizar las reparaciones o el sellado con Prodoral R6-1, este certificado permite solicitar la reinspección para obtener el Sello Verde."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Certifican instalaciones de gas natural y gas licuado (cilindros / tanque)?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Sí. Certificamos redes de gas natural por cañería de red y sistemas de gas licuado en cilindros o tanques a granel."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué vigencia legal tiene el certificado de servicio?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "El certificado acredita el estado de hermeticidad al momento de la intervención y respalda la garantía de 3 años por los trabajos de sellado ejecutados."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Qué cobertura tienen para emisión de certificados en terreno?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Emitimos certificados en toda la Región Metropolitana (Santiago Oriente, Centro, Norte, Sur y Poniente), V Región de Valparaíso y VI Región de O'Higgins."
          }
        },
        {
          "@@type": "Question",
          "name": "¿Cómo solicitar la emisión de un certificado oficial SEC?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Escríbanos directamente al WhatsApp +56 9 4987 7316 indicando su comuna y requerimiento para coordinar la visita técnica."
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
          tipoTramite: 'Certificado de Hermeticidad Fuga de Gas',
          openFaq: null,
          submitCert() {
              if(!this.nombre || !this.telefono) {
                  alert('Por favor ingrese su Nombre y Teléfono');
                  return;
              }
              const text = `Hola Domingo Isain (Gasfiter SEC), solicito emisión de CERTIFICADO OFICIAL SEC DS66:\n\n👤 *Nombre:* ${this.nombre}\n📱 *Teléfono:* ${this.telefono}\n📍 *Comuna:* ${this.comuna}\n📋 *Trámite / Motivo:* ${this.tipoTramite}`;
              window.open(`https://api.whatsapp.com/send?phone=56949877316&text=${encodeURIComponent(text)}`, '_blank');
          }
      }">

    <!-- Top Header Partial -->
    @include('partials.landing-header')

    <!-- Hero Section -->
    <section class="py-16 bg-radial from-slate-900 to-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-500/10 border border-sky-500/30 text-sky-300 text-xs font-bold uppercase tracking-wider">
                        <span>Acreditación Oficial SEC Clase 3 Vigente</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        Certificados Oficiales de Gas <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-teal-300 to-emerald-400">SEC DS66</span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                        Emisión inmediata de <strong>Certificados Oficiales de Hermeticidad e Instalaciones de Gas</strong> emitidos por <strong>Domingo Isain Plaza Caamaño (RUT 12.738.961-6)</strong>. Acreditación válida para Metrogas, Lipigas, Abastible, Gasco, entidades certificadoras y municipalidades.
                    </p>

                    <!-- Feature Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-sky-400 shrink-0"></i>
                            <span><strong>Prueba DS66:</strong> 368 mmca por 5 minutos</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-sky-400 shrink-0"></i>
                            <span><strong>Código QR Digital:</strong> Validación en línea</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-sky-400 shrink-0"></i>
                            <span><strong>Entrega Inmediata:</strong> En formato digital PDF</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-sky-400 shrink-0"></i>
                            <span><strong>3 Años Garantía:</strong> En sellado Prodoral</span>
                        </div>
                    </div>

                    <!-- Fast Contact Card -->
                    <div class="glass-card p-6 rounded-3xl border border-slate-700 space-y-4 pt-4">
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Solicitar Certificación Oficial SEC:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <input type="text" placeholder="Su Nombre *" x-model="nombre"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                            <input type="tel" placeholder="Teléfono *" x-model="telefono"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                            <input type="text" placeholder="Comuna *" x-model="comuna"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-sky-500">
                        </div>

                        <button type="button" @click="submitCert()"
                                class="w-full py-4 bg-gradient-to-r from-sky-500 via-teal-500 to-emerald-500 hover:from-sky-400 hover:to-emerald-400 text-slate-950 font-black text-base rounded-xl shadow-xl shadow-sky-500/25 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="file-check-2" class="w-5 h-5"></i>
                            <span>Coordinar Prueba y Certificado SEC por WhatsApp</span>
                        </button>
                    </div>

                </div>

                <div class="lg:col-span-5 space-y-6">
                    <div class="glass-card p-4 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/certificados-sec-gas.png') }}" alt="Certificado Oficial SEC DS66" class="w-full h-80 object-cover rounded-2xl">
                        <div class="p-4 space-y-2">
                            <span class="text-xs font-bold text-sky-400 uppercase tracking-wider block">Documento Técnico Legal</span>
                            <h3 class="text-lg font-bold text-white">Certificación y Validación Digital</h3>
                            <p class="text-xs text-slate-300">Cada certificado emitido incluye firma de instalador autorizado SEC Clase 3 y código QR para verificación inmediata en la plataforma SEC.</p>
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
                <span class="text-xs font-bold text-sky-400 uppercase tracking-widest block mb-2">Normativa y Requisitos</span>
                <h2 class="text-3xl font-black text-white">10 Preguntas Frecuentes sobre Certificados SEC de Gas</h2>
                <p class="text-xs text-slate-400 mt-1">Conoce los aspectos técnicos y legales del Decreto Supremo DS66</p>
            </div>

            <!-- FAQ 1 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 1 ? null : 1)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>1. ¿Qué es el Certificado Oficial de Gas SEC bajo Decreto Supremo DS66?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 1" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Es el documento legal emitido por un instalador de gas autorizado por la SEC (como Domingo Isain Clase 3) que acredita formalmente que una instalación de gas interior o una reparación cumple con todos los estándares de seguridad, trazado, ventilación y hermeticidad estipulados en el DS66.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 2 ? null : 2)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>2. ¿Para qué trámites me exigen un Certificado Oficial SEC?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 2" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Se exige para la reposición o conexión de medidor de gas con Metrogas, Lipigas, Abastible o Gasco, levantamiento de sellos rojos, recepción final municipal de obras, venta o arriendo de propiedades y trámites de seguros.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 3 ? null : 3)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>3. ¿Cómo se valida la autenticidad del certificado emitido por Domingo Isain?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 3" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Cada certificado emitido incluye un código QR dinámico que enlaza directamente a la base de datos oficial de la SEC y al sistema de trazabilidad de SellafuGas, certificando la vigencia de la licencia SEC Clase 3 (RUT 12.738.961-6).
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 4 ? null : 4)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>4. ¿Qué pruebas técnicas se realizan antes de emitir el certificado?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 4" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Se ejecuta una prueba manométrica digital de hermeticidad a 368 mmca por un lapso mínimo de 5 minutos estanco sin variación, inspección visual de trazado y verificación de llaves de paso y ventilaciones.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 5 ? null : 5)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>5. ¿Cuánto demora la entrega del certificado tras la prueba en terreno?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 5 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 5" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    La entrega es inmediata al finalizar la inspección técnica en formato digital PDF oficial firmado y copia impresa si el cliente lo requiere.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 6 ? null : 6)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>6. ¿Sirve para regularizar sellos amarillos y rojos de la inspección periódica?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 6 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 6" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Tras realizar las reparaciones o el sellado con Prodoral R6-1, este certificado permite solicitar la reinspección para obtener el Sello Verde.
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 7 ? null : 7)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>7. ¿Certifican instalaciones de gas natural y gas licuado (cilindros / tanque)?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 7 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 7" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Sí. Certificamos redes de gas natural por cañería de red y sistemas de gas licuado en cilindros o tanques a granel.
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 8 ? null : 8)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>8. ¿Qué vigencia legal tiene el certificado de servicio?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 8 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 8" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    El certificado acredita el estado de hermeticidad al momento de la intervención y respalda la garantía de 3 años por los trabajos de sellado ejecutados.
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 9 ? null : 9)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>9. ¿Qué cobertura tienen para emisión de certificados en terreno?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 9 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 9" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Emitimos certificados en toda la Región Metropolitana (Santiago Oriente, Centro, Norte, Sur y Poniente), V Región de Valparaíso y VI Región de O'Higgins.
                </div>
            </div>

            <!-- FAQ 10 -->
            <div class="glass-card rounded-2xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === 10 ? null : 10)"
                        class="w-full p-5 text-left font-bold text-white flex items-center justify-between gap-4">
                    <span>10. ¿Cómo solicitar la emisión de un certificado oficial SEC?</span>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-sky-400 transition-transform" :class="openFaq === 10 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="openFaq === 10" class="px-5 pb-5 text-sm text-slate-300 leading-relaxed border-t border-slate-800/80 pt-4">
                    Escríbanos directamente al WhatsApp +56 9 4987 7316 indicando su comuna y requerimiento para coordinar la visita técnica.
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
