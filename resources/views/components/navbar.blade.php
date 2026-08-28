@php
    $isDarkNav = $isDarkNav ?? request()->routeIs('home') || request()->routeIs('landing.oilandgas');

    $navLinks = [
        ['label' => 'Portfólio', 'pattern' => 'work.*', 'name' => 'work.index', 'url' => route('work.index')],
        [
            'label' => 'Serviços',
            'pattern' => 'services.*',
            'name' => 'services.index',
            'url' => route('services.index'),
        ],
        ['label' => 'Clientes', 'pattern' => 'clients.*', 'name' => 'clients.index', 'url' => route('clients.index')],
        ['label' => 'Equipa', 'pattern' => 'team.*', 'name' => 'team.index', 'url' => route('team.index')],
        ['label' => 'Sobre Nós', 'pattern' => 'about', 'name' => 'about', 'url' => route('about')],
        [
            'label' => 'Insights',
            'pattern' => 'insights.*',
            'name' => 'insights.index',
            'url' => route('insights.index'),
        ],
    ];

    $mobileNavLinks = [
        ['label' => 'Início', 'pattern' => 'home', 'name' => 'home', 'url' => route('home')],
        ['label' => 'Portfólio', 'pattern' => 'work.*', 'name' => 'work.index', 'url' => route('work.index')],
        [
            'label' => 'Serviços',
            'pattern' => 'services.*',
            'name' => 'services.index',
            'url' => route('services.index'),
        ],
        ['label' => 'Clientes', 'pattern' => 'clients.*', 'name' => 'clients.index', 'url' => route('clients.index')],
        ['label' => 'Equipa', 'pattern' => 'team.*', 'name' => 'team.index', 'url' => route('team.index')],
        ['label' => 'Sobre Nós', 'pattern' => 'about', 'name' => 'about', 'url' => route('about')],
        [
            'label' => 'Insights',
            'pattern' => 'insights.*',
            'name' => 'insights.index',
            'url' => route('insights.index'),
        ],
    ];
@endphp

<nav x-data="{
    scrolled: false,
    mobileOpen: false,
    isDarkNav: {{ $isDarkNav ? 'true' : 'false' }},
    init() {
        window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 40;
        });
    }
}" x-effect="document.body.style.overflow = mobileOpen ? 'hidden' : ''"
    :class="mobileOpen ? 'fixed inset-0 w-full h-full min-h-screen bg-white z-[999999] overflow-y-auto' : ((isDarkNav && !
            scrolled) ?
        'fixed top-0 left-0 right-0 bg-transparent border-b border-transparent z-[999999] transition-all duration-300' :
        'fixed top-0 left-0 right-0 bg-white/95 backdrop-blur-md border-b border-gray-200 shadow-sm z-[999999] transition-all duration-300'
        )">
    {{-- Header Bar (shows on desktop & normal mobile when menu is CLOSED) --}}
    <div class="container-myriad" x-show="!mobileOpen">
        <div class="flex items-center justify-between h-[72px]">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center shrink-0 group">
                <template x-if="isDarkNav && !scrolled">
                    <img src="{{ asset('logo_xamariz_white.svg') }}" alt="Xamariz"
                        class="hidden md:block h-8 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                </template>
                <template x-if="!(isDarkNav && !scrolled)">
                    <img src="{{ asset('logo_xamariz.svg') }}" alt="Xamariz"
                        class="hidden md:block h-8 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                </template>
                <img src="{{ asset('logo_xamariz_mobile.svg') }}" alt="Xamariz"
                    class="block md:hidden h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
            </a>

            {{-- Desktop Nav Links with Active Circle Indicator --}}
            <div class="hidden md:flex items-center gap-1.5 h-full">
                @foreach ($navLinks as $link)
                    @php
                        $isActive = request()->routeIs($link['pattern']) || request()->routeIs($link['name']);
                    @endphp
                    <a href="{{ $link['url'] }}"
                        :class="(isDarkNav && !scrolled) ?
                        '{{ $isActive ? 'text-white font-bold' : 'text-white/80 hover:text-white' }}' :
                        '{{ $isActive ? 'text-gray-900 font-bold' : 'text-gray-700 hover:text-gray-900' }}'"
                        class="relative font-sans text-[0.9375rem] font-medium px-3.5 py-6 transition-colors duration-200 flex flex-col items-center justify-center group">
                        <span>{{ $link['label'] }}</span>
                        @if ($isActive)
                            <span
                                class="w-1.5 h-1.5 rounded-full bg-[var(--color-brand-accent)] absolute bottom-3 left-1/2 -translate-x-1/2"></span>
                        @else
                            <span
                                class="w-1.5 h-1.5 rounded-full bg-[var(--color-brand-accent)] absolute bottom-3 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-60 transition-all duration-200"></span>
                        @endif
                    </a>
                @endforeach
            </div>

            {{-- CTA + Mobile Toggle --}}
            <div class="flex items-center gap-3">
                <a href="{{ route('contact') }}"
                    :class="(isDarkNav && !scrolled) ?
                    'border-white/30 text-white hover:bg-white hover:text-[var(--color-brand-dark)]' :
                    'border-[var(--color-brand-dark)] text-[var(--color-brand-dark)] hover:bg-[var(--color-brand-dark)] hover:text-white'"
                    class="hidden sm:inline-flex items-center gap-2 px-6 py-2.5 text-sm font-semibold border rounded-full transition-all duration-200
                           {{ request()->routeIs('contact') ? 'bg-[var(--color-brand-accent)] text-white border-[var(--color-brand-accent)]' : '' }}">
                    AGENDE UMA CONVERSA
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </a>

                <button @click="mobileOpen = true"
                    :class="(isDarkNav && !scrolled) ? 'text-white' : 'text-[var(--color-brand-dark)]'"
                    class="md:hidden p-2 transition-colors focus:outline-none" aria-label="Abrir Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Fullscreen Mobile Menu Overlay (Visible when mobileOpen is TRUE) --}}
    <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="w-full min-h-screen bg-white text-gray-900 flex flex-col justify-between p-6 sm:p-8" x-cloak>
        <div>
            {{-- Top Header inside Overlay: Logo & Close 'X' Button --}}
            <div class="flex items-center justify-between pb-6 border-b border-gray-100">
                <a href="{{ route('home') }}" @click="mobileOpen = false">
                    <img src="{{ asset('logo_xamariz_mobile.svg') }}" alt="Xamariz"
                        class="h-10 w-auto object-contain">
                </a>
                <button @click="mobileOpen = false"
                    class="p-2 text-gray-700 hover:text-[var(--color-brand-accent)] transition-colors focus:outline-none"
                    aria-label="Fechar Menu">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Headline --}}
            <div class="pt-6 pb-6">
                <h2 class="font-sans text-2xl sm:text-3xl font-bold text-gray-900 leading-snug max-w-sm">
                    O parceiro de Marketing 360° que a sua empresa precisa.
                </h2>
            </div>

            {{-- Navigation Links List --}}
            <div class="space-y-1">
                @foreach ($mobileNavLinks as $link)
                    @php
                        $isActive = request()->routeIs($link['pattern']) || request()->routeIs($link['name']);
                    @endphp
                    <a href="{{ $link['url'] }}" @click="mobileOpen = false"
                        class="flex items-center justify-between py-3.5 text-lg sm:text-xl font-medium transition-colors border-b border-gray-100/80 {{ $isActive ? 'text-[var(--color-brand-accent)] font-bold' : 'text-gray-700 hover:text-[var(--color-brand-accent)]' }}">
                        <div class="flex items-center gap-3">
                            @if ($isActive)
                                <span class="w-2 h-2 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                            @endif
                            <span>{{ $link['label'] }}</span>
                        </div>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                            class="{{ $isActive ? 'text-[var(--color-brand-accent)]' : 'text-gray-400' }}">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                @endforeach
            </div>

            {{-- Full Width Pill CTA Button --}}
            <div class="pt-6">
                <a href="{{ route('contact') }}" @click="mobileOpen = false"
                    class="w-full inline-flex items-center justify-center gap-2 py-4 rounded-full bg-[var(--color-brand-accent)] hover:bg-[var(--color-brand-accent-hover)] text-white text-base font-semibold text-center transition-all duration-300 active:scale-95 shadow-none">
                    <span>Fale Connosco</span>
                </a>
            </div>
        </div>

        {{-- Bottom Social Media Circle Buttons --}}
        <div class="pt-8 pb-4 flex items-center justify-between gap-2 border-t border-gray-100 mt-8">
            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer"
                class="w-12 h-12 rounded-full bg-gray-100 hover:bg-[var(--color-brand-accent)] text-gray-600 hover:text-white flex items-center justify-center transition-all duration-200"
                aria-label="Facebook">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg>
            </a>
            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer"
                class="w-12 h-12 rounded-full bg-gray-100 hover:bg-[var(--color-brand-accent)] text-gray-600 hover:text-white flex items-center justify-center transition-all duration-200"
                aria-label="Instagram">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
            </a>
            <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer"
                class="w-12 h-12 rounded-full bg-gray-100 hover:bg-[var(--color-brand-accent)] text-gray-600 hover:text-white flex items-center justify-center transition-all duration-200"
                aria-label="LinkedIn">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                </svg>
            </a>
            <a href="https://x.com" target="_blank" rel="noopener noreferrer"
                class="w-12 h-12 rounded-full bg-gray-100 hover:bg-[var(--color-brand-accent)] text-gray-600 hover:text-white flex items-center justify-center transition-all duration-200"
                aria-label="X (Twitter)">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                </svg>
            </a>
            <a href="https://tiktok.com" target="_blank" rel="noopener noreferrer"
                class="w-12 h-12 rounded-full bg-gray-100 hover:bg-[var(--color-brand-accent)] text-gray-600 hover:text-white flex items-center justify-center transition-all duration-200"
                aria-label="TikTok">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-1.01-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.83.57-1.31 1.56-1.3 2.56.02 1.04.59 2.01 1.49 2.53.94.55 2.15.58 3.11.08.97-.5 1.57-1.53 1.57-2.63.01-5.69.01-11.39.01-17.09z" />
                </svg>
            </a>
        </div>
    </div>
</nav>
