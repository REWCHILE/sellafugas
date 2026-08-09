<!DOCTYPE html>
<html lang="es" class="h-full bg-slate-950 text-slate-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Gestión') - Instalgaschile Spa</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            400: '#38bdf8',
                            500: '#0284c7',
                            600: '#0369a1',
                            700: '#075985',
                            900: '#0c4a6e',
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
        .glass-panel {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.06);
        }
        .gradient-brand {
            background: linear-gradient(135deg, #0284c7 0%, #0369a1 50%, #0f172a 100%);
        }
    </style>
    @stack('styles')
</head>
<body class="h-full font-sans antialiased bg-slate-950 text-slate-100 selection:bg-brand-500 selection:text-white">

    <div x-data="{ sidebarOpen: false }" class="min-h-screen flex flex-col md:flex-row">
        
        <!-- Sidebar Navigation -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
               class="fixed inset-y-0 left-0 z-50 w-72 glass-panel flex flex-col transition-transform duration-300 ease-in-out md:static md:translate-x-0 md:z-auto border-r border-slate-800">
            
            <!-- Brand Header -->
            <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800/80 bg-slate-900/40">
                <a href="{{ route('certificates.index') }}" class="flex items-center gap-3 group">
                    <div class="p-2 rounded-xl bg-gradient-to-tr from-brand-600 to-sky-400 shadow-lg shadow-sky-500/20 group-hover:scale-105 transition-transform">
                        <img src="{{ asset('images/instalgaschile-logitpo.png') }}" alt="Logo" class="h-7 w-auto bg-white rounded p-0.5">
                    </div>
                    <div>
                        <span class="font-bold text-lg text-white tracking-wide block leading-tight">Instalgaschile</span>
                        <span class="text-xs text-sky-400 font-medium">Servicio Técnico SEC</span>
                    </div>
                </a>
                <button @click="sidebarOpen = false" class="md:hidden text-slate-400 hover:text-white">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>

            <!-- User Info Badge -->
            <div class="p-4 mx-4 my-4 rounded-xl bg-slate-900/60 border border-slate-800 flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-sky-500 to-brand-600 flex items-center justify-center font-bold text-white shadow-md">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="overflow-hidden">
                    <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-sky-400 flex items-center gap-1 font-medium">
                        @if(Auth::user()->isAdmin())
                            <span class="inline-block w-2 h-2 rounded-full bg-amber-400"></span> Administrador (Domingo)
                        @else
                            <span class="inline-block w-2 h-2 rounded-full bg-emerald-400"></span> Técnico Certificado
                        @endif
                    </p>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-4 space-y-1.5 overflow-y-auto">
                <div class="px-3 pb-2 pt-1 text-[11px] font-semibold text-slate-400 uppercase tracking-wider">
                    Certificados y Órdenes
                </div>

                <a href="{{ route('certificates.index') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('certificates.index') ? 'bg-sky-500/10 text-sky-400 border border-sky-500/30' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white' }}">
                    <i data-lucide="file-text" class="w-5 h-5 text-sky-400"></i>
                    <span>Listado de Certificados</span>
                </a>

                <a href="{{ route('certificates.create') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('certificates.create') ? 'bg-sky-500/10 text-sky-400 border border-sky-500/30' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white' }}">
                    <i data-lucide="plus-circle" class="w-5 h-5 text-emerald-400"></i>
                    <span>Emitir Certificado</span>
                </a>

                @if(Auth::user()->isAdmin())
                    <div class="px-3 pb-2 pt-6 text-[11px] font-semibold text-slate-400 uppercase tracking-wider">
                        Administración
                    </div>

                    <a href="{{ route('users.index') }}" 
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('users.*') ? 'bg-sky-500/10 text-sky-400 border border-sky-500/30' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white' }}">
                        <i data-lucide="users" class="w-5 h-5 text-amber-400"></i>
                        <span>Gestión de Técnicos</span>
                    </a>
                @endif
            </nav>

            <!-- Logout Footer -->
            <div class="p-4 border-t border-slate-800/80 bg-slate-900/40">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:text-rose-400 hover:bg-rose-500/10 transition-colors">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                        <span>Cerrar Sesión</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0">
            
            <!-- Mobile Header Bar -->
            <header class="md:hidden h-16 glass-panel flex items-center justify-between px-4 border-b border-slate-800 sticky top-0 z-30">
                <button @click="sidebarOpen = true" class="p-2 text-slate-300 hover:text-white rounded-lg bg-slate-900">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <div class="flex items-center gap-2">
                    <span class="font-bold text-white">Instalgaschile</span>
                    <span class="text-xs bg-sky-500/20 text-sky-400 px-2 py-0.5 rounded-full border border-sky-500/30">SEC</span>
                </div>
            </header>

            <!-- Main Body -->
            <main class="flex-1 p-4 md:p-8 overflow-y-auto">
                
                <!-- Flash Alerts -->
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 flex items-center gap-3">
                        <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error') || $errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-300 space-y-1">
                        <div class="flex items-center gap-3">
                            <i data-lucide="alert-triangle" class="w-5 h-5 text-rose-400 shrink-0"></i>
                            <span class="text-sm font-semibold">Por favor revise los errores señalados:</span>
                        </div>
                        @if($errors->any())
                            <ul class="list-disc list-inside text-xs pl-8 space-y-1 text-rose-200">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-xs pl-8 text-rose-200">{{ session('error') }}</p>
                        @endif
                    </div>
                @endif

                @yield('content')
            </main>
        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>
</html>
