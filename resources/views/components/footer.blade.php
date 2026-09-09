<footer   class=" text-white relative bg-gradient-to-br from-[#09297a] via-[#132058] to-[#281b45]">
    {{-- Main footer content --}}
    
    <div class="container-myriad pt-20 pb-12">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8">

            {{-- Brand --}}
            <div class="lg:col-span-3">
                <a href="{{ route('home') }}" class="inline-block mb-4 group">
                    <img src="{{ asset('logo_new_version.svg') }}" alt="Xamariz" class="h-16 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                </a>
                <p class="text-white text-sm leading-relaxed max-w-xs">
                    {{ __('common.agency_description') }}
                </p>
            </div>

            {{-- Company links --}}
            <div class="lg:col-span-3">
                <h4 class="font-sans text-xs font-semibold uppercase tracking-widest text-white mb-5">
                    {{ __('common.quick_links') }}</h4>
                <ul class="space-y-3">
                    @foreach ([
                        ['Marketing de Diferenciação', 'services.index'],
                        ['Marketing de Conteúdo', 'services.index'],
                        ['Marketing Digital', 'services.index'],
                        ['SEO', 'services.index'],
                    ] as [$label, $route])
                        <li>
                            <a href="{{ route($route) }}"
                                class="text-white hover:text-white text-sm transition-colors duration-200">
                                {{ $label }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Services links --}}
            <div class="lg:col-span-3">
                <h4 class="font-sans text-xs font-semibold uppercase tracking-widest text-white mb-5">
                    {{ __('nav.services') }}</h4>
                <ul class="space-y-3">
                    @foreach ([['Estratégia & Marketing 360°', 'services.index'], ['Publicidade & Branding', 'services.index'], ['Desenvolvimento Web & SEO', 'services.index'], ['Fotografia & Audiovisual', 'services.index'], ['Marketing de Performance', 'services.index']] as [$label, $route])
                        <li>
                            <a href="{{ route($route) }}"
                                class="text-white hover:text-white text-sm transition-colors duration-200">
                                {{ $label }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact Information Column --}}
            <div class="lg:col-span-3 space-y-4">
                <h4 class="font-sans text-xs font-semibold uppercase tracking-widest text-white mb-5">
                    {{ __('nav.contacts') }}
                </h4>
                
                @php
                    $footerAddress = \App\Models\SiteSetting::get('address', 'Rua Francisco Sotto Mayor 18, Bairro Azul, Luanda, Angola');
                    $footerPhone   = \App\Models\SiteSetting::get('phone', '+244 941 561 422');
                    $footerEmail   = \App\Models\SiteSetting::get('email', 'info@xamarizmarketing.com');
                @endphp

                {{-- Address --}}
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] mb-1">{{ __('common.address') }}</p>
                    <p class="text-white text-sm leading-relaxed">
                        {{ $footerAddress }}
                    </p>
                </div>

                {{-- Phone --}}
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] mb-1">{{ __('contact.phone_label') }}</p>
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $footerPhone) }}" class="text-white hover:text-[var(--color-brand-accent)] text-sm font-medium transition-colors duration-200">
                        {{ $footerPhone }}
                    </a>
                </div>

                {{-- Email --}}
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] mb-1">{{ __('contact.email_label') }}</p>
                    <a href="mailto:{{ $footerEmail }}" class="text-white hover:text-[var(--color-brand-accent)] text-sm font-medium transition-colors duration-200">
                        {{ $footerEmail }}
                    </a>
                </div>
            </div>

        </div>

        {{-- Social Media Row --}}
        <div class="flex items-center justify-center gap-8 sm:gap-12 mt-16 pt-12 border-t border-white/10 text-white">
            {{-- 1. Facebook --}}
            <a href="https://www.facebook.com/xamarizmarketing?mibextid=ZbWKwL" target="_blank" rel="noopener noreferrer"
                class="text-white hover:text-[var(--color-brand-accent)] transition-all duration-300 transform hover:scale-110"
                aria-label="Facebook">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg>
            </a>

            {{-- 2. Instagram --}}
            <a href="https://instagram.com/xamarizmarketing?igshid=ZDdkNTZiNTM=" target="_blank" rel="noopener noreferrer"
                class="text-white hover:text-[var(--color-brand-accent)] transition-all duration-300 transform hover:scale-110"
                aria-label="Instagram">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
            </a>

            {{-- 3. LinkedIn --}}
            <a href="https://www.linkedin.com/company/xamariz/" target="_blank" rel="noopener noreferrer"
                class="text-white hover:text-[var(--color-brand-accent)] transition-all duration-300 transform hover:scale-110"
                aria-label="LinkedIn">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                </svg>
            </a>

            {{-- 4. TikTok --}}
            <a href="https://www.tiktok.com/@xamarizmarketing" target="_blank" rel="noopener noreferrer"
                class="text-white hover:text-[var(--color-brand-accent)] transition-all duration-300 transform hover:scale-110"
                aria-label="TikTok">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-1.01-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.83.57-1.31 1.56-1.3 2.56.02 1.04.59 2.01 1.49 2.53.94.55 2.15.58 3.11.08.97-.5 1.57-1.53 1.57-2.63.01-5.69.01-11.39.01-17.09z" />
                </svg>
            </a>

            {{-- 5. YouTube --}}
            <a href="https://www.youtube.com/channel/UC7D322m8PQBtP4nyRqJFFeg" target="_blank" rel="noopener noreferrer"
                class="text-white hover:text-[var(--color-brand-accent)] transition-all duration-300 transform hover:scale-110"
                aria-label="YouTube">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                    <path
                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                </svg>
            </a>
        </div>

        {{-- Bottom bar --}}
        <div class="mt-8 pt-8 border-t border-white/10 text-center">
            <p class="text-xs text-white">
                &copy; {{ date('Y') }} Xamariz (Visualclick, Lda). {{ __('common.all_rights_reserved') }}
            </p>
        </div>
    </div>
</footer>
