@extends('layouts.landing')

@section('title', \App\Models\SiteSetting::get('seo_oilandgas_title', 'Xamariz Energy | Oil & Gas — Comunicação Estratégica & Industrial'))
@section('description', \App\Models\SiteSetting::get('seo_oilandgas_description', 'A sua empresa não precisa de mais marketing. Precisa de comunicar melhor. Comunicação estratégica, posicionamento institucional e gestão de reputação para o sector de Oil & Gas em Angola.'))

@push('head')
    <style>
        .font-barlow { font-family: 'Barlow', sans-serif !important; }
        .font-roboto { font-family: 'Roboto', sans-serif !important; }
        .oil-orange { color: #ff5e14; }

        /* Design system O&G: botões sem cantos arredondados.
           Entra na layer 'base' para vencer a regra global button{border-radius:9999px} por especificidade. */
        @layer base {
            main button, main a { border-radius: 0 !important; }
        }

        @keyframes oil-marquee {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-oil-marquee { animation: oil-marquee 26s linear infinite; will-change: transform; }
        @media (prefers-reduced-motion: reduce) { .animate-oil-marquee { animation: none; } }
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

        // Secção "Focus" — separadores (tabs). Imagens são placeholders O&G a substituir por fotografia real.
        $areaTabs = [
            ['key' => 'corporate',   'img' => 'https://images.unsplash.com/photo-1581092334651-ddf26d9a09d0?w=1400&auto=format&fit=crop&q=80'],
            ['key' => 'projects',    'img' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1400&auto=format&fit=crop&q=80'],
            ['key' => 'executive',   'img' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?w=1400&auto=format&fit=crop&q=80'],
            ['key' => 'digital',     'img' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1400&auto=format&fit=crop&q=80'],
            ['key' => 'employer',    'img' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=1400&auto=format&fit=crop&q=80'],
            ['key' => 'stakeholder', 'img' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1400&auto=format&fit=crop&q=80'],
        ];
    @endphp

    {{-- ══════════════════════════════════════════════════════════════
     1. HERO — Vídeo cinematográfico O&G
    ══════════════════════════════════════════════════════════════ --}}
    <section class="relative min-h-[92vh] lg:min-h-screen flex flex-col justify-between bg-[#111215] text-white overflow-hidden pt-28 pb-12 select-none font-barlow">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('oil_gas_hero.jpg') }}" alt="Xamariz Energy — Oil & Gas"
                class="w-full h-full object-cover">
            {{-- Overlay equilibrado: escurece o lado do texto e desvanece para revelar a imagem --}}
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/45 to-black/10"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#111215]/90 via-transparent to-[#111215]/30"></div>
        </div>

        <div class="container-myriad relative z-10 pt-12 sm:pt-20 lg:pt-24 my-auto">
            <div class="max-w-4xl">
                <span class="inline-block text-[#ff5e14] text-xs sm:text-sm font-bold uppercase tracking-widest mb-6">
                    {{ __('oilandgas.hero.eyebrow') }}
                </span>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight leading-[1.12] mb-6 max-w-2xl">
                    {{ __('oilandgas.hero.title_line1') }}
                    <span class="text-[#ff5e14]">{{ __('oilandgas.hero.title_line2') }}</span>
                </h1>

                <p class="text-base sm:text-lg text-gray-200 font-normal leading-relaxed mb-10 max-w-xl font-roboto">
                    {{ __('oilandgas.hero.subtitle') }}
                </p>

                <a href="#aog"
                    class="inline-flex items-center gap-3.5 px-8 py-4 bg-[#ff5e14] text-white text-xs sm:text-sm font-bold uppercase tracking-wider transition-all duration-300 hover:bg-[#e04e0b] group">
                    <span>{{ __('oilandgas.hero.cta') }}</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
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

            {{-- Slider contínuo de logos (sem cards).
                 PLACEHOLDERS: cada item mostra um marcador cinza com o nome da empresa.
                 Para usar os logos reais, troque o bloco do placeholder por:
                 <img src="{{ '{{' }} asset($client['logo']) {{ '}}' }}" alt="{{ '{{' }} $client['name'] {{ '}}' }}" class="max-h-11 w-auto object-contain"> --}}
            <div class="relative w-full overflow-hidden py-4">
                <div class="absolute left-0 top-0 bottom-0 w-16 sm:w-40 bg-gradient-to-r from-[#fafafa] to-transparent z-10 pointer-events-none"></div>
                <div class="absolute right-0 top-0 bottom-0 w-16 sm:w-40 bg-gradient-to-l from-[#fafafa] to-transparent z-10 pointer-events-none"></div>
                <div class="flex items-center gap-8 sm:gap-12 w-max animate-oil-marquee hover:[animation-play-state:paused]">
                    @foreach (array_merge($oilGasLogos, $oilGasLogos) as $client)
                        {{-- Placeholder do logo — substituir por <img> real (ver comentário acima) --}}
                        <div class="shrink-0 flex items-center justify-center h-14 w-40 sm:w-48 bg-gray-100 border border-dashed border-gray-300 text-gray-400 hover:text-gray-600 font-barlow font-bold text-sm uppercase tracking-wide transition-colors">
                            {{ $client['name'] }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     4. ONDE AJUDAMOS — secção "Focus" (full width, conteúdo no container)
    ══════════════════════════════════════════════════════════════ --}}
    <section id="areas" class="w-full py-20 lg:py-28 bg-white border-b border-gray-100 font-barlow scroll-mt-20"
        x-data="{ tab: 0 }">
        <div class="container-myriad">

            {{-- Eyebrow --}}
            <span class="text-[#ff5e14] text-xs font-bold uppercase tracking-widest block mb-6">
                {{ __('oilandgas.areas.eyebrow') }}
            </span>

            {{-- Heading + Approach link --}}
            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6 mb-6">
                <h2 class="text-3xl sm:text-4xl lg:text-[2.75rem] font-bold text-gray-900 tracking-tight leading-[1.15] max-w-3xl">
                    {{ __('oilandgas.areas.title') }}
                </h2>
                <a href="#aog"
                    class="shrink-0 inline-flex items-center gap-2 text-sm font-bold text-[#ff5e14] hover:text-[#e04e0b] transition-colors uppercase tracking-wide lg:mt-3">
                    <span>{{ __('oilandgas.areas.approach_link') }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            {{-- Intro paragraph --}}
            <p class="font-roboto text-sm sm:text-base text-gray-500 leading-relaxed max-w-2xl mb-12">
                {{ __('oilandgas.areas.intro') }}
            </p>

            {{-- Tabs row --}}
            <div class="border-t border-gray-200 flex flex-wrap gap-x-8 sm:gap-x-12 gap-y-2 mb-10">
                @foreach ($areaTabs as $i => $tab)
                    <button type="button" @click="tab = {{ $i }}"
                        class="-mt-px border-t-2 py-4 text-left text-sm sm:text-[0.95rem] font-bold uppercase tracking-wide transition-colors duration-200 max-w-[10rem] leading-tight"
                        :class="tab === {{ $i }} ? 'border-[#ff5e14] text-[#ff5e14]' : 'border-transparent text-gray-400 hover:text-gray-700'">
                        {{ __("oilandgas.areas.items.{$tab['key']}.title") }}
                    </button>
                @endforeach
            </div>

            {{-- Image + overlay card (muda por tab) --}}
            <div class="relative w-full">
                @foreach ($areaTabs as $i => $tab)
                    <div x-show="tab === {{ $i }}" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        @if($i > 0) style="display:none" @endif>
                        <div class="relative">
                            <img src="{{ $tab['img'] }}" alt="{{ __("oilandgas.areas.items.{$tab['key']}.title") }}"
                                class="w-full h-[380px] sm:h-[460px] lg:h-[540px] object-cover">

                            {{-- Overlay card --}}
                            <div class="absolute top-0 left-0 bg-[#ff5e14] text-white p-8 sm:p-10 w-72 sm:w-96 min-h-[240px] sm:min-h-[300px] flex flex-col">
                                <h3 class="text-xl sm:text-2xl font-bold leading-snug mb-3">
                                    {{ __("oilandgas.areas.items.{$tab['key']}.title") }}
                                </h3>
                                <p class="font-roboto text-xs sm:text-sm text-white/90 leading-relaxed mb-auto">
                                    {{ __("oilandgas.areas.items.{$tab['key']}.desc") }}
                                </p>
                                <a href="#aog" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider group mt-6">
                                    <span>{{ __('oilandgas.areas.explore') }}</span>
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        {{-- Serviços concretos (O&G) sob a imagem --}}
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 lg:gap-8 mt-8">
                            <p class="lg:col-span-4 text-xs font-bold uppercase tracking-widest text-gray-400">
                                {{ __('oilandgas.areas.deliverables_label') }}
                            </p>
                            <ul class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-3 font-roboto">
                                @foreach (__("oilandgas.areas.items.{$tab['key']}.deliverables") as $deliverable)
                                    <li class="flex items-start gap-3 text-sm font-semibold text-gray-800">
                                        <span class="text-[#ff5e14] mt-0.5 shrink-0">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </span>
                                        <span>{{ $deliverable }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
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
    <section id="como-pensamos" class="py-20 lg:py-28 bg-white border-b border-gray-100 font-barlow scroll-mt-20">
        <div class="container-myriad">
            {{-- Heading + link "ver todas" --}}
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6 mb-12 lg:mb-16">
                <div class="max-w-2xl">
                    <span class="text-[#ff5e14] text-xs font-bold uppercase tracking-widest block mb-2">
                        {{ __('oilandgas.thinking.eyebrow') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 tracking-tight leading-[1.14]">
                        {{ __('oilandgas.thinking.title') }}
                    </h2>
                </div>
                <a href="{{ route('insights.index') }}"
                    class="shrink-0 inline-flex items-center gap-2 text-sm font-bold text-[#ff5e14] hover:text-[#e04e0b] transition-colors uppercase tracking-wide">
                    <span>{{ __('oilandgas.thinking.all_link') }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            @if (isset($insights) && $insights->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-12">
                    @foreach ($insights as $post)
                        @php
                            $cover = $post->cover_image
                                ? (Str::startsWith($post->cover_image, 'http') ? $post->cover_image : asset($post->cover_image))
                                : 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=800&auto=format&fit=crop&q=80';
                            $date = $post->published_at
                                ? $post->published_at->locale(app()->getLocale())->isoFormat('LL')
                                : null;
                        @endphp

                        <a href="{{ route('insights.show', $post->slug) }}" class="group flex flex-col h-full">
                            {{-- Imagem --}}
                            <div class="aspect-[4/3] w-full overflow-hidden bg-gray-100 mb-5">
                                <img src="{{ $cover }}" alt="{{ $post->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                            </div>

                            {{-- Título --}}
                            <h3 class="text-lg font-bold text-gray-900 leading-snug mb-6 group-hover:text-[#ff5e14] transition-colors">
                                {{ $post->title }}
                            </h3>

                            {{-- Divisor + data | categoria (fixo no fundo → cards com a mesma altura) --}}
                            <div class="mt-auto pt-4 border-t border-gray-200 flex items-center gap-3 text-xs text-gray-500 font-roboto">
                                @if ($date)
                                    <span>{{ $date }}</span>
                                    <span class="w-px h-3 bg-gray-300"></span>
                                @endif
                                <span>{{ $post->category ?? 'Insights' }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="font-roboto text-gray-500">{{ __('oilandgas.thinking.empty') }}</p>
            @endif
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     7. AOG / CTA FINAL + formulário
    ══════════════════════════════════════════════════════════════ --}}
    <section id="aog" class="py-24 lg:py-32 text-white relative overflow-hidden font-barlow scroll-mt-20"
        style="background: linear-gradient(90deg, #ea580c 0%, #ef4444 50%, #facc15 100%);">
        <div class="container-myriad relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                {{-- Left --}}
                <div class="lg:col-span-6">
                    <span class="inline-block text-white text-xs font-bold uppercase tracking-widest mb-4">
                        {{ __('oilandgas.aog.eyebrow') }}
                    </span>
                    <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-[1.1] mb-6">
                        {{ __('oilandgas.aog.title') }}
                    </h2>
                    <p class="font-roboto text-lg text-white/90 leading-relaxed mb-10">
                        {{ __('oilandgas.aog.lead') }}
                    </p>

                    <div class="space-y-4 pt-6 border-t border-white/25 font-roboto">
                        <div class="flex items-center gap-4 text-sm text-white">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#141518] shrink-0"></span>
                            <span>{{ __('oilandgas.aog.point_meetings') }}</span>
                        </div>
                        <div class="flex items-center gap-4 text-sm text-white">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#141518] shrink-0"></span>
                            <span>{{ __('oilandgas.aog.point_contact') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Right: Form --}}
                <div class="lg:col-span-6 bg-white p-8 sm:p-10 shadow-2xl">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">
                        {{ __('oilandgas.aog.form.title') }}
                    </h3>
                    <p class="font-roboto text-xs text-gray-500 mb-6">
                        {{ __('oilandgas.aog.form.subtitle') }}
                    </p>

                    @if (session('success'))
                        <div class="mb-6 p-4 bg-[#141518]/5 border border-[#141518]/20 text-sm text-gray-900 font-roboto">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                        @csrf
                        <input type="hidden" name="sectors[]" value="Angola Oil &amp; Gas – Reunião AOG">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 font-roboto">
                            <div>
                                <label class="block text-xs uppercase tracking-wider font-semibold text-gray-700 mb-2 font-barlow">{{ __('oilandgas.aog.form.first_name') }} *</label>
                                <input type="text" name="first_name" required placeholder="{{ __('oilandgas.aog.form.first_name_ph') }}"
                                    class="w-full bg-white border border-gray-300 focus:border-[#141518] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-wider font-semibold text-gray-700 mb-2 font-barlow">{{ __('oilandgas.aog.form.last_name') }} *</label>
                                <input type="text" name="last_name" required placeholder="{{ __('oilandgas.aog.form.last_name_ph') }}"
                                    class="w-full bg-white border border-gray-300 focus:border-[#141518] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 font-roboto">
                            <div>
                                <label class="block text-xs uppercase tracking-wider font-semibold text-gray-700 mb-2 font-barlow">{{ __('oilandgas.aog.form.email') }} *</label>
                                <input type="email" name="email" required placeholder="{{ __('oilandgas.aog.form.email_ph') }}"
                                    class="w-full bg-white border border-gray-300 focus:border-[#141518] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-wider font-semibold text-gray-700 mb-2 font-barlow">{{ __('oilandgas.aog.form.company') }} *</label>
                                <input type="text" name="company" required placeholder="{{ __('oilandgas.aog.form.company_ph') }}"
                                    class="w-full bg-white border border-gray-300 focus:border-[#141518] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors">
                            </div>
                        </div>

                        <div class="font-roboto">
                            <label class="block text-xs uppercase tracking-wider font-semibold text-gray-700 mb-2 font-barlow">{{ __('oilandgas.aog.form.message') }}</label>
                            <textarea name="message" rows="3" placeholder="{{ __('oilandgas.aog.form.message_ph') }}"
                                class="w-full bg-white border border-gray-300 focus:border-[#141518] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full py-4 bg-[#141518] text-white text-xs font-bold uppercase tracking-wider hover:bg-[#ff5e14] transition-colors duration-300 cursor-pointer">
                            {{ __('oilandgas.aog.form.submit') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
