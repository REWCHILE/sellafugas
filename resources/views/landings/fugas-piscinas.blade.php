<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <link rel="canonical" href="{{ $canonicalUrl }}" />

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
    </style>

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Service",
      "name": "Detección y Reparación de Fugas en Piscinas Sin Vaciar",
      "serviceType": "Swimming Pool Leak Detection and Repair",
      "provider": {
        "@@type": "Plumber",
        "name": "SellafuGas® Domingo Isain",
        "telephone": "+56949877316",
        "url": "https://sellafugas.cl/fugas-piscinas"
      },
      "areaServed": ["Santiago", "Chicureo", "Las Condes", "Vitacura", "Lo Barnechea", "Colina", "La Reina", "Peñalolén", "Machalí", "Valparaíso", "Viña del Mar"]
    }
    </script>
</head>
<body class="bg-slate-950 text-slate-100 antialiased selection:bg-brand-500 selection:text-white"
      x-data="{
          nombre: '',
          telefono: '',
          comuna: 'Chicureo',
          tipoPiscina: 'Hormigón / Pintura o Cerámica',
          submitPiscina() {
              if(!this.nombre || !this.telefono) {
                  alert('Por favor ingrese su Nombre y Teléfono');
                  return;
              }
              const text = `Hola Domingo Isain (SellafuGas), mi piscina pierde nivel de agua y necesito detección de fuga sin vaciar:\n\n👤 *Nombre:* ${this.nombre}\n📱 *Teléfono:* ${this.telefono}\n📍 *Comuna:* ${this.comuna}\n🏊 *Tipo de Piscina:* ${this.tipoPiscina}`;
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
                    <span class="text-[11px] text-teal-400 font-semibold tracking-wider uppercase">Fugas en Piscinas · Sin Vaciar</span>
                </div>
            </a>

            <!-- Services Menu Desktop -->
            <nav class="hidden lg:flex items-center gap-6 text-sm font-semibold text-slate-300">
                <a href="{{ route('landing.fugas-gas') }}" class="hover:text-sky-400 transition-colors">Fugas de Gas</a>
                <a href="{{ route('landing.gasfiter-sec') }}" class="hover:text-sky-400 transition-colors">Gasfíter SEC</a>
                <a href="{{ route('landing.gas-trazador') }}" class="hover:text-sky-400 transition-colors">Gas Trazador</a>
                <a href="{{ route('landing.fugas-agua') }}" class="hover:text-sky-400 transition-colors">Fugas de Agua</a>
                <a href="{{ route('landing.fugas-piscinas') }}" class="text-teal-400 font-bold border-b-2 border-teal-400 pb-1">Fugas en Piscinas</a>
                <a href="{{ route('login') }}" class="text-xs text-slate-400 hover:text-white border border-slate-700 px-3 py-1.5 rounded-xl transition-colors">
                    Acceso Administrador
                </a>
            </nav>

            <a href="https://api.whatsapp.com/send?phone=56949877316&text=Hola%20Domingo,%20mi%20piscina%20pierde%20agua%20y%20necesito%20inspeccion" target="_blank"
               class="px-4 py-2.5 bg-teal-500 hover:bg-teal-400 text-slate-950 font-black text-sm rounded-xl shadow-lg shadow-teal-500/25 transition-all flex items-center gap-2">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                <span>WhatsApp Piscinas</span>
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-16 bg-radial from-slate-900 to-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-teal-500/10 border border-teal-500/30 text-teal-300 text-xs font-bold uppercase tracking-wider">
                        <span>Ahorra Miles de Litros · Sin Vaciar la Piscina</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        Detección de Fugas en Piscinas <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-300 via-cyan-400 to-sky-400">Sin Vaciar el Agua</span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                        ¿Tu piscina baja centímetros cada día? Detectamos y reparamos filtraciones en <strong>skimmers, retornos, fondo, focos y cañerías subterráneas</strong> sin necesidad de botar el agua. Utilizamos hidrófonos sumergibles de alta frecuencia, cámaras subacuáticas y tintes trazadores de fluoresceína.
                    </p>

                    <!-- Feature Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-teal-400 shrink-0"></i>
                            <span><strong>Piscina Llena:</strong> No pierdes tu agua</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-teal-400 shrink-0"></i>
                            <span><strong>Hidrófono Acústico:</strong> Escucha el punto de fuga</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-teal-400 shrink-0"></i>
                            <span><strong>Pruebas de Presión:</strong> En circuitos de filtrado</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-sm text-slate-200">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-teal-400 shrink-0"></i>
                            <span><strong>Sellado Subacuático:</strong> Reparación in-situ</span>
                        </div>
                    </div>

                    <!-- Fast Contact Card -->
                    <div class="glass-card p-6 rounded-3xl border border-slate-700 space-y-4 pt-4">
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Solicitar Inspección de Fuga en Piscina:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <input type="text" placeholder="Su Nombre *" x-model="nombre"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-teal-500">
                            <input type="tel" placeholder="Teléfono *" x-model="telefono"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-teal-500">
                            <input type="text" placeholder="Comuna (Ej: Chicureo, Lo Barnechea)" x-model="comuna"
                                   class="w-full px-4 py-3 bg-slate-950 border border-slate-700 rounded-xl text-white text-sm focus:outline-none focus:border-teal-500">
                        </div>

                        <button type="button" @click="submitPiscina()"
                                class="w-full py-4 bg-gradient-to-r from-teal-500 via-cyan-500 to-sky-500 hover:from-teal-400 hover:to-sky-400 text-slate-950 font-black text-base rounded-xl shadow-xl shadow-teal-500/25 transition-all flex items-center justify-center gap-2 cursor-pointer">
                            <i data-lucide="waves" class="w-5 h-5"></i>
                            <span>Coordinar Visita Técnica con Domingo por WhatsApp</span>
                        </button>
                    </div>

                </div>

                <div class="lg:col-span-5 space-y-6">
                    <div class="glass-card p-4 rounded-3xl border border-slate-700 overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/fugas-piscina-deteccion.png') }}" alt="Detección de fugas en piscinas" class="w-full h-80 object-cover rounded-2xl">
                        <div class="p-4 space-y-2">
                            <span class="text-xs font-bold text-teal-400 uppercase tracking-wider block">Tecnología Hidroacústica Subacuática</span>
                            <h3 class="text-lg font-bold text-white">Inspección con Hidrófono y Fluoresceína</h3>
                            <p class="text-xs text-slate-300">Localiza microporosidades y roturas en skimmers, focos LED y boquillas de retorno en piscinas de hormigón y fibra de vidrio.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-950 border-t border-slate-800 text-slate-400 text-xs py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-3">
                <span class="text-base font-black text-white block">SellafuGas® Piscinas</span>
                <p>Especialistas en detección y sellado subacuático de filtraciones en piscinas residenciales y comerciales.</p>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Servicios</span>
                <ul class="space-y-2">
                    <li><a href="{{ route('landing.fugas-gas') }}" class="hover:text-white">Sellado Fugas de Gas</a></li>
                    <li><a href="{{ route('landing.gasfiter-sec') }}" class="hover:text-white">Gasfíter Certificado SEC</a></li>
                    <li><a href="{{ route('landing.gas-trazador') }}" class="hover:text-white">Gas Trazador</a></li>
                    <li><a href="{{ route('landing.fugas-agua') }}" class="hover:text-white">Fugas de Agua</a></li>
                    <li><a href="{{ route('landing.fugas-piscinas') }}" class="text-teal-400 font-bold">Fugas en Piscinas</a></li>
                </ul>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Contacto</span>
                <ul class="space-y-2">
                    <li>Teléfono: <a href="tel:+56949877316" class="text-white font-bold">+56 9 4987 7316</a></li>
                    <li>WhatsApp: <a href="https://wa.me/56949877316" target="_blank" class="text-teal-400 font-bold">949 877 316</a></li>
                </ul>
            </div>
            <div>
                <span class="text-xs font-bold text-white uppercase tracking-wider block mb-3">Cobertura</span>
                <p class="text-xs text-slate-300">Santiago, Chicureo, Colina, Las Condes, Lo Barnechea, Valparaíso y Rancagua.</p>
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
