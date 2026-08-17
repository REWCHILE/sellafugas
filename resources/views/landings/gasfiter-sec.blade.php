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
    <meta property="og:image" content="{{ asset('images/domingo-isain.jpg') }}">

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
                        },
                        sec: {
                            500: '#dc2626',
                            600: '#b91c1c',
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

    <!-- Schema.org JSON-LD -->
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
</head>
<body class="bg-slate-950 text-slate-100 antialiased selection:bg-brand-500 selection:text-white"
      x-data="{
          nombre: '',
          telefono: '',
          comuna: 'Las Condes',
          servicio: 'Certificado SEC / Sello Rojo',
          loading: false,
          sent: false,
          async submitForm() {
              if(!this.nombre || !this.telefono) {
                  alert('Por favor ingrese su Nombre y Teléfono');
                  return;
              }
              this.loading = true;
              const text = `Hola Domingo Isain (Gasfiter SEC), solicito atención técnica:\n\n👤 *Nombre:* ${this.nombre}\n📱 *Teléfono:* ${this.telefono}\n📍 *Comuna:* ${this.comuna}\n🛠️ *Servicio Requerido:* ${this.servicio}`;
              window.open(`https://api.whatsapp.com/send?phone=56949877316&text=${encodeURIComponent(text)}`, '_blank');
              this.sent = true;
              this.loading = false;
          }
      }">

    <!-- Top Urgent Bar -->
    <div class="bg-emerald-600 text-slate-950 text-xs py-2 px-4 text-center font-bold tracking-wide flex items-center justify-center gap-3">
        <span class="inline-flex items-center gap-1.5 bg-slate-950 text-emerald-400 px-2 py-0.5 rounded-full">
            <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
            <span>SEC CLASE 3 OFICIAL</span>
        </span>
        <span>¿Necesitas regularizar Sello Rojo, Certificado TC6 o Pruebas de Hermeticidad DS66?</span>
        <a href="tel:+56949877316" class="underline font-black text-slate-950 hover:text-white flex items-center gap-1">
            <i data-lucide="phone" class="w-3.5 h-3.5"></i> +56 9 4987 7316
        </a>
    </div>

    <!-- Header Navigation -->
    <header class="sticky top-0 z-40 glass-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logotipo-sellafugas.cl.webp') }}" alt="SellafuGas Logo" class="h-11 w-auto rounded-lg shadow-md group-hover:scale-105 transition-transform">
                <div>
                    <span class="font-black text-xl text-white tracking-wide block leading-tight">DOMINGO <span class="text-sky-400">ISAIN</span></span>
                    <span class="text-[11px] text-emerald-400 font-bold tracking-wider uppercase">Gasfíter Autorizado SEC Clase 3</span>
                </div>
            </a>

            <!-- Services Menu Desktop -->
            <nav class="hidden lg:flex items-center gap-6 text-sm font-semibold text-slate-300">
                <a href="{{ route('landing.fugas-gas') }}" class="hover:text-sky-400 transition-colors">Fugas de Gas</a>
                <a href="{{ route('landing.gasfiter-sec') }}" class="text-sky-400 font-bold border-b-2 border-sky-400 pb-1">Gasfíter SEC</a>
                <a href="{{ route('landing.gas-trazador') }}" class="hover:text-sky-400 transition-colors">Gas Trazador</a>
                <a href="{{ route('landing.fugas-agua') }}" class="hover:text-sky-400 transition-colors">Fugas de Agua</a>
                <a href="{{ route('landing.fugas-piscinas') }}" class="hover:text-sky-400 transition-colors">Fugas en Piscinas</a>
                <a href="{{ route('login') }}" class="text-xs text-slate-400 hover:text-white border border-slate-700 px-3 py-1.5 rounded-xl transition-colors">
                    Acceso Administrador
                </a>
            </nav>

            <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo,%20necesito%20un%20Gasfiter%20Certificado%20SEC%20a%20domicilio" target="_blank"
               class="px-4 py-2.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-sm rounded-xl shadow-lg shadow-emerald-500/25 transition-all flex items-center gap-2">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                <span>Contactar a Domingo</span>
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-16 bg-radial from-slate-900 to-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left: Domingo Picture and Badge -->
                <div class="lg:col-span-5">
                    <div class="glass-card p-8 rounded-3xl border border-slate-700 space-y-6 text-center">
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

                <!-- Right: Content & Fast Request Form -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-500/10 border border-sky-500/30 text-sky-300 text-xs font-bold uppercase tracking-wider">
                        <span>Acreditación Oficial Superintendencia SEC</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl font-black text-white tracking-tight leading-tight">
                        Gasfíter Certificado Autorizado SEC <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-emerald-400">a Domicilio</span>
                    </h1>

                    <p class="text-base text-slate-300 leading-relaxed">
                        Atención directa por <strong>Domingo Isain Plaza Caamaño</strong>, instalador de gas certificado por la SEC desde 2009. Especialista en sellado de fugas sin romper, levantamiento de sellos rojos, pruebas de hermeticidad con manómetro digital normado y emisión de certificados oficiales.
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

                        <button type="button" @click="submitForm()" :disabled="loading"
                                class="w-full py-3.5 bg-gradient-to-r from-emerald-500 to-sky-500 hover:from-emerald-400 hover:to-sky-400 text-slate-950 font-black text-sm rounded-xl shadow-lg shadow-emerald-500/25 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                            <span>Enviar Solicitud a Domingo por WhatsApp</span>
                        </button>
                    </div>

                    <!-- Guarantee Pills -->
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

    <!-- Services Grid -->
    <section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-bold text-sky-400 uppercase tracking-widest block mb-2">Servicios Técnicos Acreditados</span>
            <h2 class="text-3xl font-black text-white">Especialidades del Instalador SEC Domingo Isain</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="glass-card p-6 rounded-2xl border border-slate-800 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-sky-500/20 text-sky-400 flex items-center justify-center font-bold text-xl">
                    <i data-lucide="shield" class="w-6 h-6"></i>
                </div>
                <h3 class="text-lg font-bold text-white">Sellado de Fugas sin Romper</h3>
                <p class="text-sm text-slate-300">Inyección de polímero alemán Prodoral R6-1 directamente al interior de las cañerías. Sella microporos y uniones roscadas en 2 horas.</p>
            </div>

            <div class="glass-card p-6 rounded-2xl border border-slate-800 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold text-xl">
                    <i data-lucide="gauge" class="w-6 h-6"></i>
                </div>
                <h3 class="text-lg font-bold text-white">Pruebas de Hermeticidad DS66</h3>
                <p class="text-sm text-slate-300">Medición a 368 mmca con manómetro digital de alta precisión bajo norma SEC DS66 Art. 44.2.3 para verificar estanqueidad total.</p>
            </div>

            <div class="glass-card p-6 rounded-2xl border border-slate-800 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center font-bold text-xl">
                    <i data-lucide="file-check-2" class="w-6 h-6"></i>
                </div>
                <h3 class="text-lg font-bold text-white">Levantamiento de Sellos Rojos</h3>
                <p class="text-sm text-slate-300">Regularización de observaciones e informes de sellos rojos para restablecimiento urgente del suministro de gas por Metrogas, Lipigas o Gasco.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-950 border-t border-slate-800 text-slate-400 text-xs py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-3">
                <span class="text-base font-black text-white block">Domingo Isain Plaza Caamaño</span>
                <p>Gasfíter Certificado Autorizado SEC Clase 3. Especialista en sellado de fugas y certificados oficiales de servicio.</p>
                <p class="text-slate-300">RUT: 12.738.961-6 · Santiago, Chile</p>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Servicios</span>
                <ul class="space-y-2">
                    <li><a href="{{ route('landing.fugas-gas') }}" class="hover:text-white">Sellado Fugas de Gas</a></li>
                    <li><a href="{{ route('landing.gasfiter-sec') }}" class="text-sky-400 font-bold">Gasfíter SEC Domingo</a></li>
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
                    <li>Email: <a href="mailto:domi@sellafugas.cl" class="hover:text-white">domi@sellafugas.cl</a></li>
                </ul>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Registro SEC</span>
                <img src="{{ asset('images/logotipo-sec.png') }}" alt="SEC Logo" class="h-12 w-auto mb-2">
                <p class="text-[11px] text-slate-400">Verificable con código QR oficial en la plataforma SEC.</p>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo,%20necesito%20un%20Gasfiter%20Certificado%20SEC" target="_blank"
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
