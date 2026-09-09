@extends('layouts.landing')

@section('title', \App\Models\SiteSetting::get('seo_oilandgas_title', 'Xamariz Energy | Oil & Gas — Comunicação Estratégica & Industrial'))
@section('description', \App\Models\SiteSetting::get('seo_oilandgas_description', 'A sua empresa não precisa de mais marketing. Precisa de comunicar melhor. Comunicação estratégica, posicionamento institucional e gestão de reputação para o sector de Oil & Gas em Angola.'))

@push('head')
    <style>
        /* Uma única fonte em toda a landing: Barlow (a fonte dos títulos). */
        body { font-family: 'Barlow', sans-serif; }
        .font-barlow, .font-roboto { font-family: 'Barlow', sans-serif !important; }
        .oil-orange { color: #ff5e14; }

        /* Design system O&G: botões sem cantos arredondados.
           Entra na layer 'base' para vencer a regra global button{border-radius:9999px} por especificidade. */
        @layer base {
            main button, main a { border-radius: 0 !important; }
            /* Forçar Barlow também nos títulos (o app.css define Inter como fonte base dos headings). */
            main h1, main h2, main h3, main h4, main h5, main h6,
            footer h1, footer h2, footer h3, footer h4,
            nav h1, nav h2, nav h3 { font-family: 'Barlow', sans-serif !important; }
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
        // Logos reais das marcas O&G (ficheiros em public/).
        $oilGasLogos = [
            ['name' => 'AES',           'logo' => 'AES.png'],
            ['name' => 'ABS',           'logo' => 'ABS.png'],
            ['name' => 'Cavisa',        'logo' => 'Cavisa Oil Lda.png'],
            ['name' => 'Easy People',        'logo' => 'easypeople.png'],
            ['name' => 'SLB',           'logo' => 'SLBPrancheta 1.png'],
            ['name' => 'TotalEnergies', 'logo' => 'Total Energies.png'],
            ['name' => 'ENI',           'logo' => 'eni.png'],
            ['name' => 'Famar',        'logo' => 'famar.png'],
            ['name' => 'ETU Energias',  'logo' => 'ETU ENERGIAS.png'],
            ['name' => 'ILS',           'logo' => 'ILS.png'],
            ['name' => 'Kaminho',       'logo' => 'KAMINHO.png'],
             ['name' => 'Pumangol',       'logo' => 'Pumangol.png'],
            ['name' => 'Sonagalp',       'logo' => 'Sonagalp.png'],
            ['name' => 'Sonangol',       'logo' => 'Sonangol.png'],
            ['name' => 'Stylus',       'logo' => 'stylus.png'],
        ];

        // Secção "Focus" — separadores (tabs). Imagens são placeholders O&G a substituir por fotografia real.
        $areaTabs = [
            ['key' => 'corporate',   'img' => 'https://images.unsplash.com/photo-1581092334651-ddf26d9a09d0?w=1400&auto=format&fit=crop&q=80'],
            ['key' => 'projects',    'img' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1400&auto=format&fit=crop&q=80'],
            ['key' => 'executive',   'img' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?w=1400&auto=format&fit=crop&q=80'],
            ['key' => 'digital',     'img' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1400&auto=format&fit=crop&q=80'],
            ['key' => 'stakeholder', 'img' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1400&auto=format&fit=crop&q=80'],
        ];
    @endphp

    {{-- ══════════════════════════════════════════════════════════════
     1. HERO — Vídeo cinematográfico O&G
    ══════════════════════════════════════════════════════════════ --}}
    <section class="relative min-h-[92vh] lg:min-h-screen flex flex-col justify-between bg-[#111215] text-white overflow-hidden pt-28 pb-12 select-none font-barlow">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            @php $heroImg = \App\Models\SiteSetting::get('landing_hero_image', 'oil.jpg'); @endphp
            <img src="{{ \Illuminate\Support\Str::startsWith($heroImg, ['http://','https://','/']) ? $heroImg : asset($heroImg) }}" alt="Xamariz Energy"
                class="w-full h-full object-cover">
            {{-- Overlay equilibrado: escurece o lado do texto e desvanece para revelar a imagem --}}
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/45 to-black/10"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#111215]/90 via-transparent to-[#111215]/30"></div>
        </div>

        <div class="container-myriad relative z-10 pt-12 sm:pt-20 lg:pt-24 my-auto">
            <div class="max-w-4xl reveal">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-semibold text-white tracking-tight leading-[1.1] mb-6 max-w-3xl">
                    {{ __('oilandgas.hero.title_line1') }}<br>
                    <span class="text-white">{{ __('oilandgas.hero.title_line2') }}</span>
                </h1>

                <p class="text-base sm:text-lg text-gray-200 font-normal leading-relaxed mb-10 max-w-xl font-roboto">
                    {!! nl2br(e(__('oilandgas.hero.subtitle'))) !!}
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
        <div class="container-myriad relative z-10 pt-10 pb-4 border-t border-white/10 mt-12 flex justify-end">
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
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start reveal">
                <div class="lg:col-span-6">
                    <span class="text-[#ff5e14] text-xs font-bold uppercase tracking-widest block mb-4">
                        {{ __('oilandgas.industry.eyebrow') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-[2.75rem] font-bold text-gray-900 tracking-tight leading-[1.15] mb-6">
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
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     2b. IMPACTO — duas colunas: conteúdo (gradiente) + imagem
    ══════════════════════════════════════════════════════════════ --}}
    <section class="relative w-full font-barlow overflow-hidden bg-[#0f1f4a]">
        {{-- Gradiente + malha apenas na metade do texto (esquerda); a direita é a imagem --}}
        <div class="absolute inset-0 lg:right-1/2 z-0 bg-[#0f1f4a]"
            style="background-image:url('{{ asset('grad.jfif') }}');background-size:cover;background-position:center;background-repeat:no-repeat;">
            <x-blue-mesh />
        </div>
        {{-- Imagem: metade direita a preencher todo o espaço (mobile: bloco no topo) --}}
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            @php $impactImg = \App\Models\SiteSetting::get('landing_impact_image', 'luanda_picture.jpg'); @endphp
            <img src="{{ \Illuminate\Support\Str::startsWith($impactImg, ['http://','https://','/']) ? $impactImg : asset($impactImg) }}" alt="Xamariz Energy"
                class="w-full h-72 sm:h-96 lg:h-full object-cover">
        </div>

        <div class="container-myriad relative z-10">
            <div class="lg:grid lg:grid-cols-2">
                {{-- Esquerda: conteúdo no container --}}
                <div class="py-16 lg:py-28 lg:pr-16 text-white reveal">
                    <span class="text-[#ff5e14] text-xs font-bold uppercase tracking-widest block mb-4">
                        {{ __('oilandgas.noise.eyebrow') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-[2.75rem] font-bold text-white tracking-tight leading-[1.15] mb-8">
                        {{ __('oilandgas.noise.title') }}
                    </h2>

                    <div class="space-y-2 font-roboto text-lg sm:text-xl text-white/90 leading-relaxed mb-6">
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

                {{-- Espaçador para a metade direita (onde entra a imagem absoluta) --}}
                <div class="hidden lg:block" aria-hidden="true"></div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     3. EXPERIÊNCIA REAL NA INDÚSTRIA — logos discretos
    ══════════════════════════════════════════════════════════════ --}}
    <section class="py-20 lg:py-24 bg-[#fafafa] border-b border-gray-200 font-barlow">
        <div class="container-myriad">
            <div class="max-w-3xl mb-12 reveal">
                <h2 class="text-3xl sm:text-4xl lg:text-[2.75rem] font-bold text-gray-900 tracking-tight leading-[1.15] mb-4">
                    {{ __('oilandgas.clients.title') }}
                </h2>
                <p class="font-roboto text-sm sm:text-base text-gray-600 leading-relaxed">
                    {{ __('oilandgas.clients.subtitle') }}
                </p>
            </div>

            {{-- Slider contínuo de logos. Efeito: cor real ao centro, monocromático nas extremidades (via JS). --}}
            <div id="oil-logo-slider" class="relative w-full overflow-hidden py-4">
                <div class="absolute left-0 top-0 bottom-0 w-16 sm:w-40 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
                <div class="absolute right-0 top-0 bottom-0 w-16 sm:w-40 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>
                <div class="flex items-center gap-10 sm:gap-14 w-max animate-oil-marquee hover:[animation-play-state:paused]">
                    @foreach (array_merge($oilGasLogos, $oilGasLogos) as $client)
                        <div class="shrink-0 flex items-center justify-center h-20 px-2">
                            <img src="{{ asset(rawurlencode($client['logo'])) }}" alt="{{ $client['name'] }}"
                                class="oil-logo max-h-14 sm:max-h-16 w-auto object-contain"
                                style="filter: grayscale(1); opacity: .55;">
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

            {{-- Heading + Approach link --}}
            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6 mb-6 reveal">
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
            <div class="relative w-full reveal">
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
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     6. COMO PENSAMOS — mini-artigos
    ══════════════════════════════════════════════════════════════ --}}
    <section id="como-pensamos" class="py-20 lg:py-28 bg-white border-b border-gray-100 font-barlow scroll-mt-20">
        <div class="container-myriad">
            {{-- Heading + link "ver todas" --}}
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6 mb-12 lg:mb-16 reveal">
                <div class="max-w-2xl">
                    <span class="text-[#ff5e14] text-xs font-bold uppercase tracking-widest block mb-4">
                        {{ __('oilandgas.thinking.eyebrow') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-[2.75rem] font-bold text-gray-900 tracking-tight leading-[1.15]">
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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-12 reveal">
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
    <section id="aog" class="py-24 lg:py-32 text-white relative overflow-hidden font-barlow scroll-mt-20 bg-[#0f1f4a]"
        style="background-image:url('{{ asset('grad.jfif') }}');background-size:cover;background-position:center;background-repeat:no-repeat;">
        <x-blue-mesh />
        <div class="container-myriad relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                {{-- Left --}}
                <div class="lg:col-span-6 reveal">
                    <span class="inline-block text-[#ff5e14] text-xs font-bold uppercase tracking-widest mb-4">
                        {{ __('oilandgas.aog.eyebrow') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-[2.75rem] font-bold text-white tracking-tight leading-[1.15] mb-6">
                        {{ __('oilandgas.aog.title') }}
                    </h2>
                    <p class="font-roboto text-lg text-white/90 leading-relaxed mb-10">
                        {{ __('oilandgas.aog.lead') }}
                    </p>

                    <div class="space-y-4 pt-6 border-t border-white/25 font-roboto">
                        <div class="flex items-center gap-4 text-sm text-white">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#ff5e14] shrink-0"></span>
                            <span>{{ __('oilandgas.aog.point_meetings') }}</span>
                        </div>
                        <div class="flex items-center gap-4 text-sm text-white">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#ff5e14] shrink-0"></span>
                            <span>{{ __('oilandgas.aog.point_contact') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Right: Form --}}
                <div class="lg:col-span-6 bg-white p-8 sm:p-10 shadow-2xl reveal">
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

                    <form id="aog-form" action="{{ route('contact.submit') }}" method="POST" class="space-y-5"
                        data-error-msg="{{ __('oilandgas.aog.form.error') }}">
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

                        <button type="submit" id="aog-submit"
                            class="w-full py-4 bg-[#141518] text-white text-xs font-bold uppercase tracking-wider hover:bg-[#ff5e14] transition-colors duration-300 cursor-pointer disabled:opacity-70 disabled:cursor-wait flex items-center justify-center gap-3">
                            <svg data-spinner class="hidden animate-spin w-4 h-4" viewBox="0 0 24 24" fill="none">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                            <span data-label>{{ __('oilandgas.aog.form.submit') }}</span>
                        </button>
                    </form>

                    {{-- Notificação (toast) --}}
                    <div id="aog-toast" class="fixed top-6 right-6 z-[999999] hidden max-w-sm font-roboto">
                        <div data-toast-box class="flex items-start gap-3 p-4 pr-5 shadow-2xl text-sm text-white">
                            <svg data-toast-icon class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"></svg>
                            <span data-toast-msg></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        // Logos: cor real ao passar no centro, monocromático (cinza) nas extremidades.
        (function () {
            const slider = document.getElementById('oil-logo-slider');
            if (!slider) return;
            const logos = Array.from(slider.querySelectorAll('.oil-logo'));
            if (!logos.length) return;

            const REVEAL_RADIUS = 240; // px a partir do centro onde o logo fica a cores

            function frame() {
                const box = slider.getBoundingClientRect();
                const centerX = box.left + box.width / 2;

                for (const img of logos) {
                    const r = img.getBoundingClientRect();
                    const imgCenter = r.left + r.width / 2;
                    const dist = Math.abs(imgCenter - centerX);

                    // t = 1 no centro, 0 longe (com suavização smoothstep)
                    let t = 1 - Math.min(dist / REVEAL_RADIUS, 1);
                    t = t * t * (3 - 2 * t);

                    img.style.filter = 'grayscale(' + (1 - t).toFixed(3) + ')';
                    img.style.opacity = (0.5 + 0.5 * t).toFixed(3);
                }
                requestAnimationFrame(frame);
            }
            requestAnimationFrame(frame);
        })();

        // Formulário AOG: submissão AJAX com spinner + notificação (sucesso/erro).
        (function () {
            const form = document.getElementById('aog-form');
            if (!form) return;
            const btn = document.getElementById('aog-submit');
            const spinner = btn.querySelector('[data-spinner]');
            const label = btn.querySelector('[data-label]');
            const labelDefault = label.textContent;

            const toast = document.getElementById('aog-toast');
            const toastBox = toast.querySelector('[data-toast-box]');
            const toastIcon = toast.querySelector('[data-toast-icon]');
            const toastMsg = toast.querySelector('[data-toast-msg]');
            const ICONS = {
                success: '<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />',
                error: '<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />',
            };
            let toastTimer = null;

            function showToast(type, message) {
                toastBox.style.background = type === 'success' ? '#141518' : '#b91c1c';
                toastIcon.innerHTML = ICONS[type] || ICONS.success;
                toastMsg.textContent = message;
                toast.classList.remove('hidden');
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(-8px)';
                toast.style.transition = 'opacity .3s ease, transform .3s ease';
                requestAnimationFrame(() => {
                    toast.style.opacity = '1';
                    toast.style.transform = 'translateY(0)';
                });
                clearTimeout(toastTimer);
                toastTimer = setTimeout(() => {
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateY(-8px)';
                    setTimeout(() => toast.classList.add('hidden'), 300);
                }, 5000);
            }

            function loading(on) {
                btn.disabled = on;
                spinner.classList.toggle('hidden', !on);
            }

            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                loading(true);
                try {
                    const res = await fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                        },
                    });
                    const data = await res.json().catch(() => ({}));
                    if (res.ok) {
                        showToast('success', data.message || 'OK');
                        form.reset();
                    } else {
                        // Mensagens de validação podem vir como chaves cruas (ex.: "validation.required");
                        // nesse caso mostramos a mensagem genérica amigável.
                        let msg = data.errors ? Object.values(data.errors)[0][0] : (data.message || '');
                        if (!msg || /validation\./.test(msg)) msg = form.dataset.errorMsg;
                        showToast('error', msg);
                    }
                } catch (err) {
                    showToast('error', form.dataset.errorMsg);
                } finally {
                    loading(false);
                }
            });
        })();

        // Contador (count-up) nos números da secção "O nosso impacto".
        (function () {
            const counters = Array.from(document.querySelectorAll('.impact-counter'));
            if (!counters.length) return;

            function parse(raw) {
                const m = String(raw).match(/^(\D*)(\d[\d.,]*)(\D*)$/);
                if (!m) return null;
                return { prefix: m[1], suffix: m[3], target: parseFloat(m[2].replace(',', '.')) || 0 };
            }

            // Estado inicial a zero (com prefixo/sufixo), para animar ao entrar em vista.
            counters.forEach(el => {
                const p = parse(el.dataset.count);
                if (p) el.textContent = p.prefix + '0' + p.suffix;
            });

            function animate(el) {
                const p = parse(el.dataset.count);
                if (!p) return;
                const dur = 1400, start = performance.now();
                function tick(now) {
                    const t = Math.min((now - start) / dur, 1);
                    const eased = 1 - Math.pow(1 - t, 3);
                    el.textContent = p.prefix + Math.round(p.target * eased) + p.suffix;
                    if (t < 1) requestAnimationFrame(tick);
                    else el.textContent = el.dataset.count; // valor final exacto
                }
                requestAnimationFrame(tick);
            }

            const io = new IntersectionObserver((entries, obs) => {
                entries.forEach(e => {
                    if (e.isIntersecting) { animate(e.target); obs.unobserve(e.target); }
                });
            }, { threshold: 0.4 });
            counters.forEach(c => io.observe(c));
        })();
    </script>
@endpush
