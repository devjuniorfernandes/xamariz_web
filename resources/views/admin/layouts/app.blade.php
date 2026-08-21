<!DOCTYPE html>
<html lang="pt" class="h-full bg-[#141414]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Painel CMS | Xamariz')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: var(--font-sans, 'Inter', sans-serif); }
        /* Retirar border radius de elementos estruturais e formulários */
        .admin-card, .admin-box, input[type="text"], input[type="email"], input[type="password"], input[type="number"], input[type="url"], select, textarea {
            border-radius: 0 !important;
        }
        /* Garantir botões 100% arredondados estilo Myriad DS */
        .admin-btn, button, .rounded-full {
            border-radius: 9999px !important;
        }
    </style>
</head>
<body class="h-full bg-[#141414] text-gray-100 font-sans antialiased" x-data="{ sidebarOpen: false }">

    <div class="min-h-screen flex flex-col lg:flex-row">
        
        {{-- Sidebar Mobile Overlay --}}
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-black/80 lg:hidden"></div>

        {{-- Sidebar --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'" class="fixed inset-y-0 left-0 z-50 w-72 bg-[#1f2022] border-r border-[#2c2d30] transition-transform duration-300 ease-in-out flex flex-col justify-between">
            <div>
                {{-- Logo Bar --}}
                <div class="h-20 flex items-center justify-between px-6 border-b border-[#2c2d30]">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                        <img src="{{ asset('logo_xamariz_white.svg') }}" alt="Xamariz CMS" class="h-7 w-auto">
                        <span class="text-[10px] uppercase tracking-widest font-bold px-2.5 py-1 rounded-full bg-[var(--color-brand-accent)] text-white">CMS</span>
                    </a>
                    <button @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                {{-- Navigation Links --}}
                <nav class="px-4 py-6 space-y-1.5 overflow-y-auto max-h-[calc(100vh-140px)]">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold uppercase tracking-wider rounded-full transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[var(--color-brand-accent)] text-white' : 'text-gray-400 hover:text-white hover:bg-[#2c2d30]' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        <span>Dashboard</span>
                    </a>

                    <div class="pt-4 pb-1 px-4 text-[10px] font-extrabold uppercase tracking-widest text-gray-500">CONTEÚDO PRINCIPAL</div>

                    <a href="{{ route('admin.works.index') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold uppercase tracking-wider rounded-full transition-all {{ request()->routeIs('admin.works.*') ? 'bg-[var(--color-brand-accent)] text-white' : 'text-gray-400 hover:text-white hover:bg-[#2c2d30]' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <span>Projetos / Portfólio</span>
                    </a>

                    <a href="{{ route('admin.clients.index') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold uppercase tracking-wider rounded-full transition-all {{ request()->routeIs('admin.clients.*') ? 'bg-[var(--color-brand-accent)] text-white' : 'text-gray-400 hover:text-white hover:bg-[#2c2d30]' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span>Clientes & Marcas</span>
                    </a>

                    <a href="{{ route('admin.work-categories.index') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold uppercase tracking-wider rounded-full transition-all {{ request()->routeIs('admin.work-categories.*') ? 'bg-[var(--color-brand-accent)] text-white' : 'text-gray-400 hover:text-white hover:bg-[#2c2d30]' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2zM3 16a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2z"></path></svg>
                        <span>Filtros do Portfólio</span>
                    </a>

                    <a href="{{ route('admin.team-members.index') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold uppercase tracking-wider rounded-full transition-all {{ request()->routeIs('admin.team-members.*') ? 'bg-[var(--color-brand-accent)] text-white' : 'text-gray-400 hover:text-white hover:bg-[#2c2d30]' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span>Equipa & Liderança</span>
                    </a>

                    <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold uppercase tracking-wider rounded-full transition-all {{ request()->routeIs('admin.services.*') ? 'bg-[var(--color-brand-accent)] text-white' : 'text-gray-400 hover:text-white hover:bg-[#2c2d30]' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <span>Serviços 360°</span>
                    </a>

                    <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold uppercase tracking-wider rounded-full transition-all {{ request()->routeIs('admin.posts.*') ? 'bg-[var(--color-brand-accent)] text-white' : 'text-gray-400 hover:text-white hover:bg-[#2c2d30]' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        <span>Insights / Blog</span>
                    </a>

                    <div class="pt-4 pb-1 px-4 text-[10px] font-extrabold uppercase tracking-widest text-gray-500">GESTÃO & CONFIGURAÇÕES</div>

                    <a href="{{ route('admin.contact-leads.index') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold uppercase tracking-wider rounded-full transition-all {{ request()->routeIs('admin.contact-leads.*') ? 'bg-[var(--color-brand-accent)] text-white' : 'text-gray-400 hover:text-white hover:bg-[#2c2d30]' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>Contactos & Leads</span>
                    </a>

                    <a href="{{ route('admin.hero-slides.index') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold uppercase tracking-wider rounded-full transition-all {{ request()->routeIs('admin.hero-slides.*') ? 'bg-[var(--color-brand-accent)] text-white' : 'text-gray-400 hover:text-white hover:bg-[#2c2d30]' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        <span>Vídeos do Hero</span>
                    </a>

                    <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-4 py-3 text-xs font-bold uppercase tracking-wider rounded-full transition-all {{ request()->routeIs('admin.settings.*') ? 'bg-[var(--color-brand-accent)] text-white' : 'text-gray-400 hover:text-white hover:bg-[#2c2d30]' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                        <span>Definições do Site</span>
                    </a>
                </nav>
            </div>

            {{-- User Bottom Section --}}
            <div class="p-4 border-t border-[#2c2d30]">
                <div class="flex items-center justify-between p-3 bg-[#141414]">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-[var(--color-brand-accent)] text-white flex items-center justify-center font-bold text-xs">
                            {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-xs font-bold text-gray-100 truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                            <p class="text-[10px] text-gray-400 truncate">{{ auth()->user()->email ?? 'admin@xamariz.ao' }}</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="p-2 text-gray-400 hover:text-red-400 transition-colors" title="Sair do CMS">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        {{-- Main Content Container --}}
        <div class="flex-1 lg:pl-72 flex flex-col min-h-screen">
            
            {{-- Top Navbar --}}
            <header class="h-20 bg-[#1f2022] border-b border-[#2c2d30] sticky top-0 z-30 px-6 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="lg:hidden text-gray-400 hover:text-white p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>

                    {{-- Admin Breadcrumb (Image 1 Style) --}}
                    <div class="flex items-center gap-3 text-xs uppercase font-sans tracking-widest">
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-white transition-colors">CMS ADMIN</a>
                        <span class="text-gray-600">/</span>
                        <span class="text-gray-200 font-bold truncate">@yield('header_title', 'Painel de Controlo')</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-transparent border border-white/30 text-white hover:bg-white/10 text-xs font-bold uppercase tracking-wider transition-all">
                        <span>Ver Site Público</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </a>
                </div>
            </header>

            {{-- Flash Alert Messages --}}
            @if(session('success'))
                <div class="mx-6 mt-6 p-4 bg-emerald-950/40 border border-emerald-500/40 text-emerald-300 text-xs font-bold uppercase tracking-wider flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="mx-6 mt-6 p-4 bg-rose-950/40 border border-rose-500/40 text-rose-300 text-xs font-bold uppercase tracking-wider">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Main Page Content --}}
            <main class="flex-1 p-6 lg:p-10">
                @yield('content')
            </main>

            {{-- Footer --}}
            <footer class="p-6 border-t border-[#2c2d30] text-center text-xs text-gray-500 font-sans uppercase tracking-wider">
                &copy; {{ date('Y') }} Xamariz - Agência de Publicidade & Marketing 360°. Todos os direitos reservados.
            </footer>
        </div>
    </div>

</body>
</html>
