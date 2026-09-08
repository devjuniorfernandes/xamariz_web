@php
    $footerAreas = [
        __('oilandgas.areas.items.corporate.title'),
        __('oilandgas.areas.items.projects.title'),
        __('oilandgas.areas.items.executive.title'),
        __('oilandgas.areas.items.digital.title'),
        __('oilandgas.areas.items.employer.title'),
        __('oilandgas.areas.items.stakeholder.title'),
    ];
@endphp

<footer class="bg-[#0c0d0f] text-white relative border-t border-white/10 font-barlow">
    <div class="container-myriad pt-20 pb-12">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8">

            {{-- Brand --}}
            <div class="lg:col-span-4">
                <a href="#top" class="inline-block mb-4 group">
                    <img src="{{ asset('logo_new_version.svg') }}" alt="Xamariz Energy"
                        class="h-16 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                </a>
                <p class="text-white/70 text-sm leading-relaxed max-w-xs font-roboto">
                    {{ __('oilandgas.footer.tagline') }}
                </p>
            </div>

            {{-- Areas --}}
            <div class="lg:col-span-4">
                <h4 class="text-xs font-bold uppercase tracking-widest text-white mb-5">
                    {{ __('oilandgas.footer.areas_title') }}
                </h4>
                <ul class="space-y-3 font-roboto">
                    @foreach ($footerAreas as $area)
                        <li>
                            <a href="#areas" class="text-white/70 hover:text-[#ff5e14] text-sm transition-colors duration-200">
                                {{ $area }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact --}}
            <div class="lg:col-span-4 space-y-4">
                <h4 class="text-xs font-bold uppercase tracking-widest text-white mb-5">
                    {{ __('oilandgas.footer.contact_title') }}
                </h4>

                <div>
                    <p class="text-[11px] font-bold uppercase tracking-widest text-[#ff5e14] mb-1">
                        {{ __('oilandgas.footer.energy_team') }}
                    </p>
                    <a href="mailto:aog@xamariz.ao"
                        class="text-white/80 hover:text-[#ff5e14] text-sm font-medium transition-colors duration-200 font-roboto">
                        aog@xamariz.ao
                    </a>
                </div>

                <div>
                    <p class="text-[11px] font-bold uppercase tracking-widest text-[#ff5e14] mb-1">{{ __('contact.phone_label') }}</p>
                    <a href="tel:+244941561422"
                        class="text-white/80 hover:text-[#ff5e14] text-sm font-medium transition-colors duration-200 font-roboto">
                        +244 941 561 422
                    </a>
                </div>

                <div>
                    <p class="text-[11px] font-bold uppercase tracking-widest text-[#ff5e14] mb-1">{{ __('common.address') }}</p>
                    <p class="text-white/80 text-sm leading-relaxed font-roboto">
                        Rua Francisco Sotto Mayor 18, Bairro Azul, Luanda, Angola
                    </p>
                </div>
            </div>

        </div>

        {{-- Social Media Row --}}
        <div class="flex items-center justify-center gap-8 sm:gap-12 mt-16 pt-12 border-t border-white/10">
            <a href="https://www.facebook.com/xamarizmarketing?mibextid=ZbWKwL" target="_blank" rel="noopener noreferrer"
                class="text-white/70 hover:text-[#ff5e14] transition-all duration-300 transform hover:scale-110" aria-label="Facebook">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg>
            </a>
            <a href="https://instagram.com/xamarizmarketing?igshid=ZDdkNTZiNTM=" target="_blank" rel="noopener noreferrer"
                class="text-white/70 hover:text-[#ff5e14] transition-all duration-300 transform hover:scale-110" aria-label="Instagram">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
            </a>
            <a href="https://www.linkedin.com/company/xamariz/" target="_blank" rel="noopener noreferrer"
                class="text-white/70 hover:text-[#ff5e14] transition-all duration-300 transform hover:scale-110" aria-label="LinkedIn">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                </svg>
            </a>
            <a href="https://www.youtube.com/channel/UC7D322m8PQBtP4nyRqJFFeg" target="_blank" rel="noopener noreferrer"
                class="text-white/70 hover:text-[#ff5e14] transition-all duration-300 transform hover:scale-110" aria-label="YouTube">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                </svg>
            </a>
        </div>

        {{-- Bottom bar --}}
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-8 pt-8 border-t border-white/10">
            <p class="text-xs text-white/60 font-roboto">
                &copy; {{ date('Y') }} Xamariz (Visualclick, Lda). {{ __('common.all_rights_reserved') }}
            </p>
            <div class="flex items-center gap-6 font-roboto">
                <a href="{{ route('home') }}" class="text-xs text-white/60 hover:text-[#ff5e14] transition-colors">
                    {{ __('oilandgas.footer.back_to_site') }}
                </a>
                <a href="{{ route('privacy') }}" class="text-xs text-white/60 hover:text-[#ff5e14] transition-colors">{{ __('common.privacy_policy') }}</a>
                <a href="{{ route('cookies') }}" class="text-xs text-white/60 hover:text-[#ff5e14] transition-colors">{{ __('common.cookie_policy') }}</a>
            </div>
        </div>
    </div>
</footer>
