<nav x-data="{
        scrolled: false,
        mobileOpen: false,
        isDarkNav: true,
        init() {
            this.scrolled = window.scrollY > 40;
            window.addEventListener('scroll', () => { this.scrolled = window.scrollY > 40; });
        }
    }"
    x-effect="document.body.style.overflow = mobileOpen ? 'hidden' : ''"
    :class="mobileOpen
        ? 'fixed inset-0 w-full h-full min-h-screen bg-[#111215] z-[999999] overflow-y-auto'
        : 'absolute top-0 left-0 right-0 bg-transparent z-[999999]'">

    {{-- Header Bar --}}
    <div class="container-myriad" x-show="!mobileOpen">
        <div class="flex items-center justify-between h-[88px]">

            {{-- Logo → volta ao topo da landing (mesmo logo do footer, em ambos os estados) --}}
            <a href="#top" class="flex items-center shrink-0 group">
                <img src="{{ asset('logo_new_version.svg') }}" alt="Xamariz Energy"
                    class="h-14 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
            </a>

            {{-- CTA + Language Switcher + Mobile Toggle --}}
            <div class="flex items-center gap-3">
                <x-language-switcher />

                <a href="#aog"
                    class="hidden md:inline-flex items-center gap-2 px-5 py-2.5 bg-[#ff5e14] hover:bg-[#e04e0b] text-white text-xs font-bold uppercase tracking-wider transition-all duration-300 font-barlow">
                    <span>{{ __('oilandgas.nav.cta') }}</span>
                </a>

                <button @click="mobileOpen = true" class="md:hidden p-2 text-white transition-colors focus:outline-none"
                    aria-label="Abrir Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Fullscreen Mobile Menu --}}
    <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="w-full min-h-screen bg-[#111215] text-white flex flex-col justify-between p-6 sm:p-8 font-barlow" x-cloak>
        <div>
            {{-- Top: Logo & Close --}}
            <div class="flex items-center justify-between pb-6 border-b border-white/10">
                <a href="#top" @click="mobileOpen = false">
                    <img src="{{ asset('logo_new_version.svg') }}" alt="Xamariz Energy" class="h-16 w-auto object-contain">
                </a>
                <button @click="mobileOpen = false"
                    class="p-2 text-white/80 hover:text-[#ff5e14] transition-colors focus:outline-none" aria-label="Fechar Menu">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Language Switcher Mobile --}}
            <div class="pt-6">
                <p class="text-[11px] font-bold uppercase tracking-wider text-white/40 mb-2 px-1">
                    {{ __('common.language') }}
                </p>
                <x-language-switcher :mobile="true" />
            </div>

            {{-- CTA --}}
            <div class="pt-6">
                <a href="#aog" @click="mobileOpen = false"
                    class="w-full inline-flex items-center justify-center gap-2 py-4 bg-[#ff5e14] hover:bg-[#e04e0b] text-white text-base font-bold uppercase tracking-wider text-center transition-all duration-300 active:scale-95">
                    <span>{{ __('oilandgas.nav.cta') }}</span>
                </a>
            </div>
        </div>

        {{-- Bottom: back to main site --}}
        <div class="pt-8 pb-4 border-t border-white/10 mt-8">
            <a href="{{ route('home') }}" class="text-xs uppercase tracking-widest text-white/50 hover:text-white transition-colors">
                &larr; {{ __('oilandgas.footer.back_to_site') }}
            </a>
        </div>
    </div>
</nav>
