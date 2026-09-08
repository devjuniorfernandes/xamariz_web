@extends('layouts.landing')

@section('title', \App\Models\SiteSetting::get('seo_oilandgas_title', 'Xamariz Energy | Oil & Gas — Comunicação Estratégica & Industrial'))
@section('description', \App\Models\SiteSetting::get('seo_oilandgas_description', 'A sua empresa não precisa de mais marketing. Precisa de comunicar melhor. Comunicação estratégica, posicionamento institucional e gestão de reputação para o sector de Oil & Gas em Angola.'))

@push('head')
    <style>
        .font-barlow { font-family: 'Barlow', sans-serif !important; }
        .font-roboto { font-family: 'Roboto', sans-serif !important; }
        .oil-orange { color: #ff5e14; }

        @keyframes oil-marquee {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-oil-marquee { animation: oil-marquee 38s linear infinite; }
    </style>
@endpush

@section('content')

    @php
        // Clientes do wireframe — "mostrar discretamente".
        // Logos disponíveis em public/images/logos/*.svg
        $oilGasLogos = [
            ['name' => 'TotalEnergies', 'logo' => 'images/logos/total.svg'],
            ['name' => 'Kaminho',       'logo' => 'images/logos/kaminho.svg'],
            ['name' => 'ENI / Azule',   'logo' => 'images/logos/azule.svg'],
            ['name' => 'Sonangol',      'logo' => 'images/logos/sonangol.svg'],
            ['name' => 'IFC',           'logo' => 'images/logos/ifc.svg'],
            ['name' => 'AES',           'logo' => 'images/logos/aes.svg'],
            ['name' => 'ETU Energias',  'logo' => 'images/logos/etu.svg'],
            ['name' => 'SLB',           'logo' => 'images/logos/slb.svg'],
            ['name' => 'ABS',           'logo' => 'images/logos/abs.svg'],
            ['name' => 'EasyPeople',    'logo' => 'images/logos/easypeople.svg'],
        ];

        $areaIcons = [
            'corporate'   => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
            'projects'    => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
            'executive'   => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
            'digital'     => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
            'employer'    => 'M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4zm6 0a4 4 0 00-3-3.87M9 12a4 4 0 013-3.87',
            'stakeholder' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.86 9.86 0 01-4-.8L3 20l1.3-3.9A7.5 7.5 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z',
        ];
    @endphp

    {{-- ══════════════════════════════════════════════════════════════
     1. HERO — Vídeo cinematográfico O&G
    ══════════════════════════════════════════════════════════════ --}}
    <section class="relative min-h-[92vh] lg:min-h-screen flex flex-col justify-between bg-[#111215] text-white overflow-hidden pt-28 pb-12 select-none font-barlow">
        {{-- Background Video --}}
        <div class="absolute inset-0 z-0">
            {{-- NOTA: reel O&G final a fornecer pelo cliente. Placeholder temporário. --}}
            <video class="w-full h-full object-cover opacity-45 brightness-75 scale-105"
                autoplay muted loop playsinline preload="auto"
                poster="{{ asset('luanda_picture.jpg') }}">
                <source src="{{ asset('Xamariz%20Showcase.mp4') }}" type="video/mp4">
            </video>
            <div class="absolute inset-0 bg-gradient-to-r from-black/95 via-black/75 to-black/40"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#111215] via-transparent to-black/70"></div>
        </div>

        <div class="container-myriad relative z-10 pt-12 sm:pt-20 lg:pt-24 my-auto">
            <div class="max-w-4xl">
                <span class="inline-block text-[#ff5e14] text-xs sm:text-sm font-bold uppercase tracking-widest mb-6">
                    {{ __('oilandgas.hero.eyebrow') }}
                </span>

                <h1 class="text-4xl sm:text-6xl md:text-7xl lg:text-[4.4rem] font-black text-white tracking-tight leading-[1.08] mb-6">
                    {{ __('oilandgas.hero.title_line1') }}<br>
                    <span class="text-[#ff5e14]">{{ __('oilandgas.hero.title_line2') }}</span>
                </h1>

                <p class="text-base sm:text-lg md:text-xl text-gray-200 font-normal leading-relaxed mb-10 max-w-2xl font-roboto">
                    {{ __('oilandgas.hero.subtitle') }}
                </p>

                <a href="#aog"
                    class="inline-flex items-center gap-3.5 px-8 py-4 rounded-full bg-[#ff5e14] text-white text-xs sm:text-sm font-bold uppercase tracking-wider transition-all duration-300 hover:bg-[#e04e0b] hover:scale-[1.02] group">
                    <span class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center text-white group-hover:translate-x-0.5 transition-transform">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </span>
                    <span>{{ __('oilandgas.hero.cta') }}</span>
                </a>
            </div>
        </div>

        {{-- Scroll hint --}}
        <div class="container-myriad relative z-10 pt-10 pb-4 border-t border-white/10 mt-12">
            <a href="#abordagem" class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-gray-400 hover:text-white transition-colors group">
                <span>{{ __('oilandgas.hero.scroll') }}</span>
                <span class="group-hover:translate-y-1 transition-transform duration-300">&darr;</span>
            </a>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     2. A INDÚSTRIA ENERGÉTICA NÃO COMUNICA COMO AS OUTRAS
    ══════════════════════════════════════════════════════════════ --}}
    <section id="abordagem" class="py-20 lg:py-28 bg-white text-gray-900 border-b border-gray-100 font-barlow scroll-mt-20">
        <div class="container-myriad">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                <div class="lg:col-span-6">
                    <span class="text-[#ff5e14] text-xs font-bold uppercase tracking-widest block mb-3">
                        {{ __('oilandgas.industry.eyebrow') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 tracking-tight leading-[1.14] mb-6">
                        {{ __('oilandgas.industry.title') }}
                    </h2>
                    <p class="font-roboto text-base sm:text-lg text-gray-600 leading-relaxed">
                        {{ __('oilandgas.industry.lead') }}
                    </p>
                </div>

                <div class="lg:col-span-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 font-roboto">
                        @foreach (__('oilandgas.industry.items') as $item)
                            <div class="flex items-center gap-3 py-3 border-b border-gray-100">
                                <span class="w-6 h-6 rounded-full bg-[#ff5e14]/12 text-[#ff5e14] flex items-center justify-center text-sm font-bold shrink-0">✓</span>
                                <span class="text-base font-semibold text-gray-800 capitalize">{{ $item }}</span>
                            </div>
                        @endforeach
                    </div>
                    <p class="mt-8 text-sm text-gray-500 italic font-roboto">
                        {{ __('oilandgas.industry.footnote') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     3. EXPERIÊNCIA REAL NA INDÚSTRIA — logos discretos
    ══════════════════════════════════════════════════════════════ --}}
    <section class="py-20 lg:py-24 bg-[#fafafa] border-b border-gray-200 font-barlow">
        <div class="container-myriad">
            <div class="max-w-3xl mb-12">
                <span class="text-[#ff5e14] text-xs font-bold uppercase tracking-widest block mb-2">
                    {{ __('oilandgas.clients.eyebrow') }}
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 tracking-tight leading-[1.14] mb-4">
                    {{ __('oilandgas.clients.title') }}
                </h2>
                <p class="font-roboto text-sm sm:text-base text-gray-600 leading-relaxed">
                    {{ __('oilandgas.clients.subtitle') }}
                </p>
            </div>

            {{-- Grelha discreta --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 sm:gap-6 mb-12">
                @foreach ($oilGasLogos as $client)
                    <div class="bg-white border border-gray-200/70 flex items-center justify-center h-24 px-6 opacity-70 hover:opacity-100 hover:border-[#ff5e14] transition-all duration-300">
                        <img src="{{ asset($client['logo']) }}" alt="{{ $client['name'] }}"
                            class="max-h-10 max-w-[130px] object-contain grayscale hover:grayscale-0 transition-all duration-300">
                    </div>
                @endforeach
            </div>

            {{-- Marquee contínuo --}}
            <div class="relative w-full overflow-hidden pt-8 border-t border-gray-200">
                <div class="absolute left-0 top-8 bottom-0 w-16 sm:w-32 bg-gradient-to-r from-[#fafafa] to-transparent z-10 pointer-events-none"></div>
                <div class="absolute right-0 top-8 bottom-0 w-16 sm:w-32 bg-gradient-to-l from-[#fafafa] to-transparent z-10 pointer-events-none"></div>
                <div class="flex items-center gap-10 sm:gap-14 w-max animate-oil-marquee hover:[animation-play-state:paused]">
                    @foreach (array_merge($oilGasLogos, $oilGasLogos) as $client)
                        <div class="shrink-0 flex items-center justify-center h-10 w-32 sm:w-40 opacity-60 hover:opacity-100 transition-all duration-200">
                            <img src="{{ asset($client['logo']) }}" alt="{{ $client['name'] }}" class="max-h-8 max-w-full object-contain grayscale">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     4. ONDE AJUDAMOS EMPRESAS DA INDÚSTRIA — 6 áreas
    ══════════════════════════════════════════════════════════════ --}}
    <section id="areas" class="py-20 lg:py-28 bg-white border-b border-gray-100 font-barlow scroll-mt-20">
        <div class="container-myriad">
            <div class="max-w-2xl mb-16">
                <span class="text-[#ff5e14] text-xs font-bold uppercase tracking-widest block mb-2">
                    {{ __('oilandgas.areas.eyebrow') }}
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 tracking-tight leading-[1.14]">
                    {{ __('oilandgas.areas.title') }}
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach (['corporate','projects','executive','digital','employer','stakeholder'] as $key)
                    <div class="bg-[#fafafa] p-8 border border-gray-200 hover:border-[#ff5e14] hover:shadow-lg transition-all duration-300 group">
                        <div class="text-[#ff5e14] mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $areaIcons[$key] }}" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#ff5e14] transition-colors">
                            {{ __("oilandgas.areas.items.$key.title") }}
                        </h4>
                        <p class="font-roboto text-sm text-gray-600 leading-relaxed">
                            {{ __("oilandgas.areas.items.$key.desc") }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     5. NO MEIO DO RUÍDO... — fotografia enorme + copy
    ══════════════════════════════════════════════════════════════ --}}
    <section class="relative min-h-[560px] lg:min-h-[680px] flex items-center bg-[#111215] text-white overflow-hidden font-barlow">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('luanda_picture.jpg') }}" alt="Luanda" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-t from-[#111215] via-[#111215]/70 to-[#111215]/30"></div>
        </div>

        <div class="container-myriad relative z-10 py-24">
            <div class="max-w-3xl">
                <span class="text-[#ff5e14] text-xs font-bold uppercase tracking-widest block mb-4">
                    {{ __('oilandgas.noise.eyebrow') }}
                </span>
                <h2 class="text-4xl sm:text-6xl lg:text-7xl font-black text-white tracking-tight leading-[1.05] mb-8">
                    {{ __('oilandgas.noise.title') }}
                </h2>

                <div class="space-y-2 font-roboto text-lg sm:text-xl text-gray-200 leading-relaxed mb-6">
                    @foreach (__('oilandgas.noise.lines') as $line)
                        <p>{{ $line }}</p>
                    @endforeach
                </div>

                <p class="text-2xl sm:text-3xl font-bold text-white mb-6">
                    {{ __('oilandgas.noise.highlight') }}
                </p>
                <p class="text-lg sm:text-xl text-[#ff5e14] font-semibold">
                    {{ __('oilandgas.noise.closing') }}
                </p>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     6. COMO PENSAMOS — mini-artigos
    ══════════════════════════════════════════════════════════════ --}}
    <section id="como-pensamos" class="py-20 lg:py-28 bg-[#fafafa] border-b border-gray-200 font-barlow scroll-mt-20">
        <div class="container-myriad">
            <div class="max-w-2xl mb-16">
                <span class="text-[#ff5e14] text-xs font-bold uppercase tracking-widest block mb-2">
                    {{ __('oilandgas.thinking.eyebrow') }}
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 tracking-tight leading-[1.14]">
                    {{ __('oilandgas.thinking.title') }}
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach (['one','two','three'] as $key)
                    <article class="bg-white border border-gray-200 p-8 flex flex-col justify-between hover:border-[#ff5e14] hover:shadow-lg transition-all duration-300 group">
                        <div>
                            <span class="inline-block text-[10px] font-bold uppercase tracking-wider text-[#ff5e14] bg-[#ff5e14]/10 px-2.5 py-1 mb-5">
                                {{ __("oilandgas.thinking.articles.$key.tag") }}
                            </span>
                            <h3 class="text-xl font-bold text-gray-900 mb-3 leading-snug group-hover:text-[#ff5e14] transition-colors">
                                {{ __("oilandgas.thinking.articles.$key.title") }}
                            </h3>
                            <p class="font-roboto text-sm text-gray-600 leading-relaxed mb-6">
                                {{ __("oilandgas.thinking.articles.$key.desc") }}
                            </p>
                        </div>
                        <a href="{{ route('insights.index') }}" class="text-xs font-bold text-gray-900 group-hover:text-[#ff5e14] flex items-center gap-1 transition-colors">
                            {{ __('oilandgas.thinking.read_more') }} &rarr;
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     7. AOG / CTA FINAL + formulário
    ══════════════════════════════════════════════════════════════ --}}
    <section id="aog" class="py-24 lg:py-32 bg-[#0c0d0f] text-white relative overflow-hidden font-barlow scroll-mt-20">
        <div class="container-myriad relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                {{-- Left --}}
                <div class="lg:col-span-6">
                    <span class="inline-block text-[#ff5e14] text-xs font-bold uppercase tracking-widest mb-4">
                        {{ __('oilandgas.aog.eyebrow') }}
                    </span>
                    <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-[1.1] mb-6">
                        {{ __('oilandgas.aog.title') }}
                    </h2>
                    <p class="font-roboto text-lg text-gray-300 leading-relaxed mb-10">
                        {{ __('oilandgas.aog.lead') }}
                    </p>

                    <div class="space-y-4 pt-6 border-t border-white/10 font-roboto">
                        <div class="flex items-center gap-4 text-sm text-gray-300">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#ff5e14] shrink-0"></span>
                            <span>{{ __('oilandgas.aog.point_meetings') }}</span>
                        </div>
                        <div class="flex items-center gap-4 text-sm text-gray-300">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#ff5e14] shrink-0"></span>
                            <span>{{ __('oilandgas.aog.point_contact') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Right: Form --}}
                <div class="lg:col-span-6 bg-[#16171a] p-8 sm:p-10 border border-white/15">
                    <h3 class="text-2xl font-bold text-white mb-2">
                        {{ __('oilandgas.aog.form.title') }}
                    </h3>
                    <p class="font-roboto text-xs text-gray-400 mb-6">
                        {{ __('oilandgas.aog.form.subtitle') }}
                    </p>

                    @if (session('success'))
                        <div class="mb-6 p-4 bg-[#ff5e14]/15 border border-[#ff5e14]/40 text-sm text-white font-roboto">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                        @csrf
                        <input type="hidden" name="sectors[]" value="Angola Oil &amp; Gas – Reunião AOG">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 font-roboto">
                            <div>
                                <label class="block text-xs uppercase tracking-wider font-semibold text-gray-300 mb-2 font-barlow">{{ __('oilandgas.aog.form.first_name') }} *</label>
                                <input type="text" name="first_name" required placeholder="{{ __('oilandgas.aog.form.first_name_ph') }}"
                                    class="w-full bg-white border border-gray-300 focus:border-[#ff5e14] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-wider font-semibold text-gray-300 mb-2 font-barlow">{{ __('oilandgas.aog.form.last_name') }} *</label>
                                <input type="text" name="last_name" required placeholder="{{ __('oilandgas.aog.form.last_name_ph') }}"
                                    class="w-full bg-white border border-gray-300 focus:border-[#ff5e14] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 font-roboto">
                            <div>
                                <label class="block text-xs uppercase tracking-wider font-semibold text-gray-300 mb-2 font-barlow">{{ __('oilandgas.aog.form.email') }} *</label>
                                <input type="email" name="email" required placeholder="{{ __('oilandgas.aog.form.email_ph') }}"
                                    class="w-full bg-white border border-gray-300 focus:border-[#ff5e14] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-wider font-semibold text-gray-300 mb-2 font-barlow">{{ __('oilandgas.aog.form.company') }} *</label>
                                <input type="text" name="company" required placeholder="{{ __('oilandgas.aog.form.company_ph') }}"
                                    class="w-full bg-white border border-gray-300 focus:border-[#ff5e14] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors">
                            </div>
                        </div>

                        <div class="font-roboto">
                            <label class="block text-xs uppercase tracking-wider font-semibold text-gray-300 mb-2 font-barlow">{{ __('oilandgas.aog.form.message') }}</label>
                            <textarea name="message" rows="3" placeholder="{{ __('oilandgas.aog.form.message_ph') }}"
                                class="w-full bg-white border border-gray-300 focus:border-[#ff5e14] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full py-4 rounded-full bg-[#ff5e14] text-white text-xs font-bold uppercase tracking-wider hover:bg-[#e04e0b] transition-all duration-200 cursor-pointer">
                            {{ __('oilandgas.aog.form.submit') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
