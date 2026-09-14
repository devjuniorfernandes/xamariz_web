@extends('layouts.app')

@section('title', \App\Models\SiteSetting::get('seo_home_title', 'Xamariz | Agência de Publicidade Angola & Internacional • Marketing 360°'))
@section('description', \App\Models\SiteSetting::get('seo_home_description', 'A Xamariz é a agência líder em Publicidade, Comunicação e Marketing 360° em Luanda, Angola. Comunicação clara e estratégias que dominam o mercado.'))

@section('content')

    {{-- ══════════════════════════════════════════════
    HERO — Vídeo principal (com imagem de fallback)
    ════════════════════════════════════════════════ --}}
    <section class="relative min-h-screen overflow-hidden bg-black select-none">

        {{-- ============================================================
        VÍDEO DE FUNDO (com poster como fallback enquanto carrega)
        ============================================================= --}}
        <div class="absolute inset-0 w-full h-full">

            <x-video mode="background"
                :src="\App\Models\SiteSetting::get('home_hero_video1', 'video_base.mp4')"
                :loop="\App\Models\SiteSetting::get('home_hero_loop', '1') !== '0'"
                poster="{{ \App\Models\SiteSetting::get('home_hero_poster1', 'https://images.unsplash.com/photo-1518135714426-c18f5ffb6f4d?w=1800&auto=format&fit=crop&q=60') }}"
                class="w-full h-full object-cover" />
        </div>


        {{-- ============================================================
        OVERLAY ESCURO
        Escurece o vídeo para melhorar a leitura do texto
        ============================================================= --}}
        <div class="absolute inset-0 bg-black/45 z-10 pointer-events-none"></div>


        {{-- ============================================================
        GRADIENTE SUPERIOR
        Ajuda a destacar o navbar
        ============================================================= --}}
        <div class="absolute inset-x-0 top-0 h-40
            bg-gradient-to-b from-black/75 to-transparent
            pointer-events-none z-20">
        </div>


        {{-- ============================================================
        TÍTULO + SUBTÍTULO
        ============================================================= --}}
        <div class="absolute inset-0 z-30 flex items-center pointer-events-none">

            <div class="container-myriad">

                <div class="max-w-3xl text-white">

                    {{-- Pequeno título --}}
                    <!--<p class="mb-4-->
                    <!--    text-xs sm:text-sm-->
                    <!--    font-semibold-->
                    <!--    uppercase-->
                    <!--    tracking-[0.3em]-->
                    <!--    text-white/75">-->

                    <!--    Descubra algo extraordinário-->
                    <!--</p>-->


                    {{-- Título principal --}}
                    <h1 class="
                        text-4xl
                        sm:text-5xl
                        md:text-6xl
                        lg:text-7xl
                        font-sans
                        font-bold
                        leading-[0.95]
                        tracking-tight
                        drop-shadow-2xl
                    ">

                        <span class="block whitespace-nowrap">{{ \App\Models\SiteSetting::get('home_hero_title', 'Quem comunica melhor,') }}</span>
                        <span class="block text-[var(--color-brand-accent)]">{{ \App\Models\SiteSetting::get('home_hero_title_accent', 'cresce melhor.') }}</span>

                    </h1>


                    {{-- Subtítulo --}}
                    <p class="
                        mt-6
                        max-w-xl
                        text-sm
                        sm:text-base
                        md:text-lg
                        leading-relaxed
                        text-white/80
                        drop-shadow-lg
                    ">

                        {!! nl2br(e(\App\Models\SiteSetting::get('home_hero_subtitle', 'Ajudamos empresas a clarificar a sua mensagem para atrair clientes certos e liderar o seu mercado.'))) !!}

                    </p>

                    <div class="mt-8">
                        <a href="{{ route('contact') }}" class="pointer-events-auto inline-flex items-center gap-3 px-7 py-3 rounded-full
                   text-white text-xs font-semibold uppercase tracking-wider
                   transition-all duration-300 group shrink-0
                   bg-[var(--color-brand-accent)] hover:bg-[var(--color-brand-accent-hover)]">

                            <span>{{ \App\Models\SiteSetting::get('home_hero_cta_label', 'Agende conversa') }}</span>

                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                class="text-white group-hover:translate-x-1 transition-transform">

                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>

                            </svg>

                        </a>
                    </div>


                </div>

            </div>

        </div>


        {{-- ============================================================
        CONTROLOS DO SLIDER
        ============================================================= --}}
        <div class="
            absolute
            inset-0
            z-40
            pointer-events-none
            flex
            flex-col
            justify-between
            p-6
            sm:p-10
            md:p-12
        ">


            {{-- espaçador superior (mantém a barra inferior alinhada em baixo) --}}
            <div class="pt-16 sm:pt-20"></div>


            {{-- ========================================================
            BARRA INFERIOR
            ========================================================= --}}
            <div class="flex items-end justify-end w-full">


                {{-- ====================================================
                INDICADOR DE SCROLL
                ===================================================== --}}
                <div class="
                    pointer-events-auto
                    flex
                    flex-col
                    items-center
                    gap-2
                    opacity-60
                    hover:opacity-100
                    transition-opacity
                ">

                    <span class="
                        font-sans
                        text-white
                        text-[10px]
                        tracking-widest
                        uppercase
                        rotate-90
                        origin-center
                        translate-x-6
                    ">
                        Scroll
                    </span>


                    <div class="
                        w-px
                        h-12
                        bg-white/40
                        relative
                        overflow-hidden
                    ">

                        <div class="
                            absolute
                            top-0
                            left-0
                            w-full
                            h-1/2
                            bg-white
                            animate-bounce
                        "></div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ══════════════════════════════════════════════
    WHAT WE DO
    ════════════════════════════════════════════════ --}}
    <section
        class="relative bg-[#0f1f4a] py-28 md:py-36 overflow-hidden text-white"
        style="background-image:url('{{ asset('grad.jfif') }}');background-size:cover;background-position:center;background-repeat:no-repeat;"
        id="whoweare">

        {{-- Overlay Mesh SVG --}}
        <div class="absolute inset-0 pointer-events-none opacity-25">
            <svg class="absolute right-0 top-0 h-full w-1/2 text-[var(--color-brand-accent)]" viewBox="0 0 600 600"
                fill="none" stroke="currentColor">
                <g stroke-width="1.2">
                    <path d="M100 0 L600 500" opacity="0.4" />
                    <path d="M200 0 L600 400" opacity="0.5" />
                    <path d="M300 0 L600 300" opacity="0.6" />
                    <path d="M400 0 L600 200" opacity="0.7" />
                    <path d="M500 0 L600 100" opacity="0.8" />

                    <path d="M600 0 L100 500" opacity="0.4" />
                    <path d="M600 100 L200 500" opacity="0.5" />
                    <path d="M600 200 L300 500" opacity="0.6" />
                    <path d="M600 300 L400 500" opacity="0.7" />

                    <circle cx="450" cy="200" r="180" stroke-dasharray="4 4" opacity="0.3" />
                    <circle cx="450" cy="200" r="300" stroke-dasharray="6 6" opacity="0.2" />
                </g>
            </svg>

            <svg class="absolute -right-20 -bottom-20 w-[600px] h-[600px] text-[var(--color-brand-accent)]"
                viewBox="0 0 400 400" fill="none" stroke="currentColor">
                <path d="M0,400 Q200,200 400,0 M0,350 Q200,150 400,-50 M0,300 Q200,100 400,-100 M0,250 Q200,50 400,-150"
                    stroke-width="1" opacity="0.3" />
            </svg>
        </div>

        <div class="container-myriad relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                <div class="lg:col-span-7 reveal">
                    <h2 class="font-serif text-white font-bold leading-[1.08]"
                        style="font-size: clamp(1.75rem, 3.4vw, 3rem); letter-spacing: -0.035em;">
                        {!! nl2br(e(\App\Models\SiteSetting::get('home_whoweare_title', "As empresas não estão a falhar.\nEstão a comunicar mal."))) !!}
                    </h2>
                </div>

                <div class="lg:col-span-5 space-y-10 reveal delay-200 lg:pt-2">
                    <div class="border-l-2 border-white/20 hover:border-[var(--color-brand-accent)] transition-colors pl-6">
                        <p class="font-sans text-white/80 text-base sm:text-lg leading-relaxed">
                            {!! nl2br(e(\App\Models\SiteSetting::get('home_whoweare_text', "Investem no digital.\nPublicam conteúdo.\nFazem campanhas.\nMas o mercado não entende.\nE quando não entende, escolhe outro."))) !!}
                        </p>
                        <div class="pt-8">
                            <!--<a href="{{ route('about') }}"-->
                            <!--    class="inline-flex items-center gap-2.5 font-sans text-sm font-bold uppercase tracking-widest text-[var(--color-brand-accent)] hover:text-white transition-colors group">-->
                            <!--    <span>Saber mais sobre nós</span>-->
                            <!--    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"-->
                            <!--        stroke-width="2" class="group-hover:translate-x-1 transition-transform">-->
                            <!--        <path d="M5 12h14" />-->
                            <!--        <path d="m12 5 7 7-7 7" />-->
                            <!--    </svg>-->
                            <!--</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════
    SELECTED WORK (Dinamico da BD)
    ════════════════════════════════════════════════ --}}


    {{-- ══════════════════════════════════════════════
    FULL VIDEO SECTION WITH OVERLAY (OUR TEAM & CULTURE)
    ════════════════════════════════════════════════ --}}


    {{-- ══════════════════════════════════════════════
    ABOUT US
    ════════════════════════════════════════════════ --}}
    <section class="py-16 sm:py-20 bg-white text-gray-900 overflow-hidden">
        <div class="container-myriad">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

                <div class="lg:col-span-6 reveal">
                    <h2
                        class="font-sans text-4xl sm:text-6xl md:text-4xl font-normal text-gray-900 tracking-tight leading-[1.08] mb-8 sm:mb-10">
                        <p class="font-extrabold">{{ \App\Models\SiteSetting::get('home_about_title_strong', 'Quando a mensagem é clara,') }}</p> <span>{{ \App\Models\SiteSetting::get('home_about_title', 'as pessoas certas encontram-no.') }}</span>

                    </h2>
                    <ul class="border-t border-gray-300">

                        <li class="flex items-center py-4 border-b border-gray-300" style="column-gap: 24px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                style="flex-shrink: 0; color: var(--color-brand-accent);">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>

                            <span>
                                {{ \App\Models\SiteSetting::get('home_about_item1', 'Entendem o que faz.') }}
                            </span>
                        </li>


                        <li class="flex items-center py-4 border-b border-gray-300" style="column-gap: 24px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                style="flex-shrink: 0; color: var(--color-brand-accent);">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>

                            <span>
                                {{ \App\Models\SiteSetting::get('home_about_item2', 'Reconhecem o valor.') }}
                            </span>
                        </li>


                        <li class="flex items-center py-4 border-b border-gray-300" style="column-gap: 24px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                style="flex-shrink: 0; color: var(--color-brand-accent);">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>

                            <span>
                                {{ \App\Models\SiteSetting::get('home_about_item3', 'E escolhem-no a si.') }}
                            </span>
                        </li>

                    </ul>


                    <style>
                        .about-button {
                            display: inline-flex !important;
                            margin-top: 20px !important;
                        }
                    </style>


                </div>

                <div class="lg:col-span-6 reveal delay-200 relative">

                    <div x-data="{
                position: 50,
                autoPosition: 50,
                direction: -1,
                hovering: false,
                dragging: false,
                timer: null,

                init() {

                    this.autoPosition = this.position;

                    this.timer = setInterval(() => {

                        // Se o utilizador estiver a interagir,
                        // não executa a animação automática.
                        if (this.hovering || this.dragging) {
                            return;
                        }

                        this.autoPosition += this.direction * 0.15;

                        // Limite esquerdo do automático
                        if (this.autoPosition <= 30) {
                            this.autoPosition = 30;
                            this.direction = 1;
                        }

                        // Limite direito do automático
                        if (this.autoPosition >= 70) {
                            this.autoPosition = 70;
                            this.direction = -1;
                        }

                        this.position = this.autoPosition;

                    }, 16);
                }
            }" x-init="init()" @mouseenter="hovering = true" @mouseleave="
                hovering = false;
                dragging = false;
            " class="relative aspect-[16/10] select-none overflow-hidden rounded-none bg-gray-900 shadow-2xl group cursor-ew-resize">

                        {{-- Imagem Base (Depois / Resultado Real) --}}
                        <img src="{{ asset('home2.png') }}" alt="Depois — Experiência Real"
                            class="absolute inset-0 w-full h-full object-cover pointer-events-none">


                        {{-- Tag Badge: Depois / Resultados --}}
                        <div class="absolute top-4 right-4 z-10 px-3 py-1 bg-black/70 backdrop-blur-md rounded-full text-[10px] font-sans font-bold tracking-widest text-white uppercase pointer-events-none transition-opacity duration-200"
                            :class="position > 85 ? 'opacity-0' : 'opacity-100'">
                            Depois
                        </div>


                        {{-- Imagem Sobreposta (Antes / Conceito / Preparação) --}}
                        <div class="absolute inset-0 w-full h-full pointer-events-none overflow-hidden"
                            :style="`clip-path: inset(0 calc(100% - ${position}%) 0 0);`">

                            <img src="{{ asset('home1.png') }}" alt="Antes — Conceito & Estrutura"
                                class="absolute inset-0 w-full h-full object-cover grayscale brightness-90 contrast-125">


                            {{-- Tag Badge: Antes / Conceito --}}
                            <div class="absolute top-4 left-4 z-10 px-3 py-1 bg-black/70 backdrop-blur-md rounded-full text-[10px] font-sans font-bold tracking-widest text-white uppercase pointer-events-none transition-opacity duration-200"
                                :class="position < 15 ? 'opacity-0' : 'opacity-100'">
                                Antes
                            </div>

                        </div>


                        {{-- Barra Divisória e Pega Central --}}
                        <div class="absolute top-0 bottom-0 pointer-events-none z-20"
                            :style="`left: ${position}%; transform: translateX(-50%);`">

                            {{-- Linha vertical --}}
                            <div class="w-[2px] h-full bg-white shadow-[0_0_12px_rgba(0,0,0,0.8)] mx-auto"></div>


                            {{-- Botão Central com Setas --}}
                            <div
                                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white text-gray-900 shadow-[0_4px_20px_rgba(0,0,0,0.4)] flex items-center justify-center border-2 border-[var(--color-brand-accent)] transition-transform duration-200 group-hover:scale-110">

                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-900">
                                    <path d="m8 7-5 5 5 5"></path>
                                    <path d="m16 7 5 5-5 5"></path>
                                </svg>

                            </div>

                        </div>


                        {{-- Input Range Transparente para Controlo Táctil e Rato --}}
                        <input type="range" min="0" max="100" step="0.1" x-model.number="position"
                            @mousedown="dragging = true" @mouseup="dragging = false" @touchstart="dragging = true"
                            @touchend="dragging = false" @input="
                    autoPosition = position;
                    dragging = true;
                " @change="dragging = false" aria-label="Comparar antes e depois"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-ew-resize z-30 m-0 p-0">

                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════
    CLAREZA EXIGE MÉTODO — 3 PASSOS
    ════════════════════════════════════════════════ --}}
    <section
        class="relative overflow-hidden py-20 sm:py-28 text-gray-900"
        style="background: linear-gradient(160deg, #ffffff 0%, #fdf1ea 55%, #fbe6da 100%);">

        {{-- Flourish decorativo (canto inferior esquerdo) --}}
        <svg class="absolute -left-24 bottom-0 w-[520px] h-[520px] text-[var(--color-brand-accent)] opacity-[0.12] pointer-events-none"
            viewBox="0 0 400 400" fill="none" stroke="currentColor" aria-hidden="true">
            <path d="M0,400 Q220,240 400,60 M-20,360 Q200,200 380,20 M-40,320 Q180,160 360,-20 M-60,280 Q160,120 340,-60 M-80,240 Q140,80 320,-100"
                stroke-width="1.1" />
        </svg>

        <div class="container-myriad relative z-10">

            {{-- Cabeçalho --}}
            <div class="text-center max-w-3xl mx-auto reveal">
                <p class="font-sans text-xs sm:text-sm font-bold uppercase tracking-[0.22em] text-[var(--color-brand-accent)] mb-4">
                    {{ \App\Models\SiteSetting::get('home_method_kicker', 'Clareza exige método.') }}
                </p>

                <h2 class="font-sans font-extrabold text-[#0f1f4a] tracking-tight leading-[1.1]"
                    style="font-size: clamp(1.75rem, 3.6vw, 3rem);">
                    {{ \App\Models\SiteSetting::get('home_method_title', 'É assim que transformamos clareza em impacto.') }}
                </h2>

                <div class="w-14 h-[3px] bg-[var(--color-brand-accent)] mx-auto mt-6"></div>
            </div>


            {{-- 3 Passos --}}
            @php
                $methodSteps = [
                    [
                        'num' => '01',
                        'title' => \App\Models\SiteSetting::get('home_method_step1_title', 'Compreender'),
                        'desc' => \App\Models\SiteSetting::get('home_method_step1_desc', 'Analisamos o seu negócio, o mercado, o público e a concorrência para identificar oportunidades reais de diferenciação.'),
                        'icon' => 'search',
                    ],
                    [
                        'num' => '02',
                        'title' => \App\Models\SiteSetting::get('home_method_step2_title', 'Clarificar'),
                        'desc' => \App\Models\SiteSetting::get('home_method_step2_desc', 'Encontramos o posicionamento, a mensagem e a estratégia que tornam o valor da sua empresa mais claro e relevante para as pessoas certas.'),
                        'icon' => 'bulb',
                    ],
                    [
                        'num' => '03',
                        'title' => \App\Models\SiteSetting::get('home_method_step3_title', 'Comunicar'),
                        'desc' => \App\Models\SiteSetting::get('home_method_step3_desc', 'Criamos e executamos comunicação, conteúdos e experiências que chegam às pessoas certas e geram resultados para o seu negócio.'),
                        'icon' => 'megaphone',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-3 mt-16 sm:mt-20">

                @foreach ($methodSteps as $i => $step)
                    <div class="reveal delay-{{ $i * 100 }} px-0 md:px-10 py-8 md:py-0 {{ $i > 0 ? 'md:border-l md:border-[#e7d6cb] border-t md:border-t-0 border-[#e7d6cb]' : '' }}">

                        {{-- Ícone + Número/Título --}}
                        <div class="flex items-center gap-5">

                            <div class="shrink-0 w-16 h-16 rounded-full bg-[var(--color-brand-accent)]/10 flex items-center justify-center">
                                @switch($step['icon'])
                                    @case('search')
                                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"
                                            class="text-[var(--color-brand-accent)]">
                                            <circle cx="11" cy="11" r="7"></circle>
                                            <path d="m21 21-4.3-4.3"></path>
                                        </svg>
                                        @break
                                    @case('bulb')
                                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"
                                            class="text-[var(--color-brand-accent)]">
                                            <path d="M9 18h6"></path>
                                            <path d="M10 22h4"></path>
                                            <path d="M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5.76.76 1.23 1.52 1.41 2.5"></path>
                                        </svg>
                                        @break
                                    @case('megaphone')
                                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"
                                            class="text-[var(--color-brand-accent)]">
                                            <path d="m3 11 18-5v12L3 14v-3z"></path>
                                            <path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"></path>
                                        </svg>
                                        @break
                                @endswitch
                            </div>

                            <div>
                                <span class="font-mono text-lg font-bold text-[var(--color-brand-accent)] tracking-wide block leading-none mb-2">
                                    {{ $step['num'] }}
                                </span>
                                <h3 class="font-sans font-bold text-[#0f1f4a] text-2xl leading-none tracking-tight">
                                    {{ $step['title'] }}
                                </h3>
                            </div>

                        </div>

                        {{-- Descrição --}}
                        <p class="font-sans text-gray-500 text-sm sm:text-base leading-relaxed mt-6">
                            {{ $step['desc'] }}
                        </p>

                    </div>
                @endforeach

            </div>

        </div>
    </section>

        @include('components.video-section')

    {{-- ══════════════════════════════════════════════
    SERVICES — Interactive Expanding Cards (Dinamico da BD)
    ════════════════════════════════════════════════ --}}

@if (isset($servicesList) && $servicesList->count() > 0)

    <div class="relative w-full">

        <section
            class="relative w-full py-24 sm:py-32 text-white overflow-hidden"
            style="background: linear-gradient(90deg, #ea580c 0%, #ef4444 50%, #facc15 100%);"
        >

            <div class="container-myriad">

                {{-- HEADER --}}
                <div class="reveal flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 mb-12 lg:mb-16">

                    <div class="lg:col-span-7 reveal">

                        <h2 class="font-sans text-4xl sm:text-6xl lg:text-7xl font-bold text-white tracking-tight leading-[1.06]">
                            {{ \App\Models\SiteSetting::get('home_services_heading', 'Da estratégia à execução, tudo começa pela clareza.') }}
                        </h2>

                    </div>


                    <div class="flex flex-col items-start sm:items-end gap-5 max-w-lg">

                        <h2 class="font-sans text-2xl sm:text-3xl md:text-4xl font-bold text-white tracking-tight leading-tight text-left sm:text-right whitespace-nowrap">
                            {{ \App\Models\SiteSetting::get('home_services_title', 'Como podemos ajudar') }}
                        </h2>


                        <a
                            href="{{ route('services.index') }}"
                            class="inline-flex items-center gap-3 px-7 py-3 rounded-full border border-white text-white hover:bg-white hover:text-[#d63205] text-xs font-semibold uppercase tracking-wider transition-all duration-300 group"
                        >

                            <span>{{ \App\Models\SiteSetting::get('home_services_cta', 'VER TODOS OS SERVIÇOS') }}</span>

                            <svg
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="group-hover:translate-x-1 transition-transform"
                            >
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>

                        </a>

                    </div>

                </div>


                {{-- SERVICES --}}
                <div
                    class="reveal delay-100"
                    x-data="{ active: 0 }"
                >

                    <div class="flex flex-col lg:flex-row gap-4 h-auto lg:h-[540px] w-full">

                        @foreach ($servicesList as $index => $item)

                            @php

                                $numCode = $item->number_code ?? sprintf('%02d', $index + 1);

                                $title = $item->title;

                                $slug = $item->slug;

                                $desc = $item->short_description ?? $item->full_description;

                                $serviceImages = [
                                    'estrategia-comunicacao' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1200&auto=format&fit=crop&q=80',
                                    'websites-plataformas-digitais-seo' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&auto=format&fit=crop&q=80',
                                    'conteudo-redes-sociais' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1200&auto=format&fit=crop&q=80',
                                    'audiovisual' => 'https://images.unsplash.com/photo-1492619375914-88005aa9e8fb?w=1200&auto=format&fit=crop&q=80',
                                    'performance-digital' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1200&auto=format&fit=crop&q=80',
                                ];
                                $img = $item->image_path ? asset($item->image_path) : ($serviceImages[$slug] ?? $serviceImages['estrategia-comunicacao']);

                            @endphp


                            {{-- SERVICE CARD --}}
                            <div
                                @mouseenter="active = {{ $index }}"
                                @click="active = {{ $index }}"

                                class="relative overflow-hidden rounded-none cursor-pointer transition-all duration-700 ease-in-out group min-h-[300px] lg:min-h-0"

                                :class="
                                    active === {{ $index }}
                                        ? 'lg:flex-[3.5] bg-black/40'
                                        : 'lg:flex-1 bg-black/80 hover:bg-black/60'
                                "
                            >

                                {{-- IMAGE --}}
                                <img
                                    src="{{ $img }}"
                                    alt="{{ $title }}"

                                    class="absolute inset-0 w-full h-full object-cover transition-all duration-700"

                                    :class="
                                        active === {{ $index }}
                                            ? 'scale-100 opacity-80 brightness-90'
                                            : 'scale-105 opacity-30 brightness-50 group-hover:opacity-50 group-hover:brightness-75'
                                    "
                                >


                                {{-- IMAGE OVERLAY --}}
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-black/60 pointer-events-none"
                                ></div>


                                {{-- ACTIVE CONTENT --}}
                                <div
                                    class="relative z-10 h-full p-8 lg:p-10 flex flex-col justify-between transition-opacity duration-500"

                                    x-show="active === {{ $index }}"

                                    x-transition:enter="transition ease-out duration-300 delay-150"

                                    x-transition:enter-start="opacity-0 translate-y-4"

                                    x-transition:enter-end="opacity-100 translate-y-0"
                                >

                                    {{-- TITLE + NUMBER --}}
                                    <div class="flex items-start justify-between w-full">

                                        <h3 class="font-sans font-extrabold text-2xl sm:text-3xl text-white tracking-tight max-w-sm">
                                            {{ $title }}<span class="text-[var(--color-brand-accent)]">.</span>
                                        </h3>


                                        <span class="font-mono text-xs font-semibold text-gray-300/80 tracking-widest pt-1">
                                            {{ $numCode }}
                                        </span>

                                    </div>


                                    {{-- DESCRIPTION --}}
                                    <div class="max-w-md mt-auto pt-16">

                                        <p class="font-sans text-sm sm:text-base text-gray-200 leading-relaxed mb-6">
                                            {{ $desc }}
                                        </p>


                                        {{-- SERVICE LINK --}}
                                        <a
                                            href="{{ route('services.show', $slug) }}"

                                            class="inline-flex items-center gap-2.5 text-sm font-semibold text-white hover:text-[var(--color-brand-accent)] transition-colors group/btn"
                                        >

                                            <span>{{ \App\Models\SiteSetting::get('home_services_card_link', 'Explorar serviço') }}</span>


                                            <svg
                                                width="18"
                                                height="18"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2.5"

                                                class="text-[var(--color-brand-accent)] group-hover/btn:translate-x-1 transition-transform"
                                            >

                                                <line
                                                    x1="5"
                                                    y1="12"
                                                    x2="19"
                                                    y2="12"
                                                ></line>

                                                <polyline
                                                    points="12 5 19 12 12 19"
                                                ></polyline>

                                            </svg>

                                        </a>

                                    </div>

                                </div>


                                {{-- INACTIVE CONTENT --}}
                                <div
                                    class="relative z-10 h-full p-6 hidden lg:flex items-center justify-center transition-opacity duration-300"

                                    x-show="active !== {{ $index }}"
                                >

                                    <h3
                                        class="font-sans font-semibold text-lg text-white tracking-tight text-center whitespace-normal leading-snug px-2"
                                    >
                                        {{ $title }}
                                    </h3>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </section>

    </div>

@endif





    @if (isset($featuredWorks) && $featuredWorks->count() > 0)
        <section class="py-12 bg-white">
            <div class="container-myriad">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-16 reveal">
                    <div>
                        <h2 class="font-serif font-black text-[var(--color-brand-dark)]"
                            style="font-size: clamp(1.75rem, 3.5vw, 2.75rem); letter-spacing: -0.03em;">
                            {{ \App\Models\SiteSetting::get('home_works_title', 'Projetos em destaque.') }}
                        </h2>
                        <p class="font-sans text-[var(--color-muted)] mt-3 max-w-md">
                            {{ \App\Models\SiteSetting::get('home_works_subtitle', 'Campanhas e soluções de comunicação para grandes marcas em Angola e no mercado internacional.') }}
                        </p>
                    </div>
                    <a href="{{ route('work.index') }}"
                        class="inline-flex items-center gap-3 px-7 py-3 rounded-full border border-gray-900 text-gray-900 hover:border-[var(--color-brand-accent)] hover:text-[var(--color-brand-accent)] text-xs font-semibold uppercase tracking-wider transition-all duration-300 group shrink-0">
                        <span>{{ \App\Models\SiteSetting::get('home_works_cta', 'VER TODOS OS PROJETOS') }}</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="text-[var(--color-brand-accent)] group-hover:translate-x-1 transition-transform">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

                {{-- Work grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-4" data-work-grid>
                    @foreach ($featuredWorks as $index => $work)
                        @php
                            $clientName = $work->client ? $work->client->name : '';
                            $categoryFilter = $work->category ? $work->category->filter_key : 'all';
                            $colSpan = match ($index) {
                                0, 1, 2 => 'lg:col-span-4 h-[380px]',
                                default => 'lg:col-span-6 h-[500px]',
                            };
                            $cover = $work->cover_image
                                ? asset($work->cover_image)
                                : 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=900&auto=format&fit=crop&q=80';
                        @endphp

                        <div x-data role="button" tabindex="0"
                            @click="$dispatch('open-lightbox', { src: @js($cover), alt: @js($work->title) })"
                            @keydown.enter="$dispatch('open-lightbox', { src: @js($cover), alt: @js($work->title) })"
                            class="work-card {{ $colSpan }} cursor-zoom-in"
                            data-sector="{{ $categoryFilter }}">
                            <img src="{{ $cover }}" alt="{{ $work->title }}">
                            <div class="card-overlay">
                                <div class="card-arrow">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <circle cx="11" cy="11" r="7" />
                                        <path d="M21 21l-4.3-4.3" />
                                    </svg>
                                </div>
                                @if ($clientName)
                                    <p class="font-sans text-white/70 text-xs mb-1 font-semibold uppercase tracking-wider">
                                        {{ $clientName }}
                                    </p>
                                @endif
                                <h3 class="font-serif text-white font-black text-2xl mb-2" style="letter-spacing: -0.02em;">
                                    {{ $work->title }}</h3>
                                <p class="font-sans text-white/70 text-sm leading-relaxed max-w-sm">
                                    {{ Str::limit($work->summary ?? $work->description, 120) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ══════════════════════════════════════════════
    OUR WORK & BRANDS (Dinamico da BD)
    ════════════════════════════════════════════════ --}}
    @if (isset($brandLogos) && $brandLogos->count() > 0)
        <section class="py-16 sm:py-20 bg-white text-gray-900 overflow-hidden">
            <div class="container-myriad">

                <div class="reveal max-w-4xl mb-16 sm:mb-20">
                    <h2
                        class="font-sans text-xl sm:text-3xl font-normal text-gray-900 tracking-tight leading-[1.12]">
                        Empresas que confiam na Xamariz
                    </h2>
                </div>

            </div>

            <div class="reveal delay-100 relative w-full overflow-hidden py-10 mb-16">

                <div
                    class="absolute left-0 top-0 bottom-0 w-24 sm:w-40 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none">
                </div>
                <div
                    class="absolute right-0 top-0 bottom-0 w-24 sm:w-40 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none">
                </div>

                @php
                    $duplicatedLogos = $brandLogos->concat($brandLogos);
                @endphp

                <div class="flex items-center gap-12 sm:gap-20 w-max animate-marquee hover:[animation-play-state:paused]">
                    @foreach ($duplicatedLogos as $logoItem)
                        @php
                            $lPath = is_object($logoItem) ? $logoItem->logo_path : $logoItem['logo_path'] ?? '';
                            $lName = is_object($logoItem) ? $logoItem->name : $logoItem['name'] ?? '';
                            $lSlug = is_object($logoItem) ? $logoItem->slug : $logoItem['slug'] ?? '';
                            $lUrl = $lPath
                                ? (Str::startsWith($lPath, ['http://', 'https://'])
                                    ? $lPath
                                    : asset(ltrim($lPath, '/')))
                                : null;
                        @endphp
                        <div title="{{ $lName }}"
                            class="shrink-0 w-44 sm:w-44 h-26 flex items-center justify-center opacity-60 grayscale hover:opacity-100 hover:grayscale-0 hover:scale-110 hover:-translate-y-1 transition-all duration-300 ease-out">
                            @if (Str::startsWith($lPath, '<svg'))
                                {!! $lPath !!}
                            @elseif($lUrl)
                                <img src="{{ $lUrl }}" alt="{{ $lName }}"
                                    class="max-w-full max-h-12 object-contain pointer-events-none">
                            @else
                                <span class="font-sans font-bold text-gray-800 text-sm">{{ $lName }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

          
        </section>
    @endif

    {{-- ══════════════════════════════════════════════
    INSIGHTS & ARTIGOS (Dinamico da BD)
    ════════════════════════════════════════════════ --}}
    @if (isset($latestInsights) && $latestInsights->count() > 0)
        <section class="py-24 bg-gray-50 text-gray-900 border-t border-gray-200">
            <div class="container-myriad">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-12 sm:mb-16 reveal">
                    <div>
                        <h2 class="font-sans text-3xl sm:text-5xl font-bold text-gray-900 tracking-tight">
                            Ideias para empresas que querem fazer a diferença.
                        </h2>
                        <p class="font-sans text-gray-700 text-lg sm:text-xl leading-relaxed max-w-lg mt-2">
                            Comunicação, estratégia e transformação digital para um mercado em constante mudança.
                        </p>
                    </div>
                    <a href="{{ route('insights.index') }}"
                        class="inline-flex items-center gap-3 px-7 py-3 rounded-full border border-gray-900 text-gray-900 hover:border-[var(--color-brand-accent)] hover:text-[var(--color-brand-accent)] text-xs font-semibold uppercase tracking-wider transition-all duration-300 group shrink-0">
                        <span>{{ \App\Models\SiteSetting::get('home_insights_cta', 'VER TODOS OS ARTIGOS') }}</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="text-[var(--color-brand-accent)] group-hover:translate-x-1 transition-transform">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 reveal">
                    @foreach ($latestInsights as $post)
                        @php
                            $cover = $post->cover_image
                                ? asset($post->cover_image)
                                : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1200&auto=format&fit=crop&q=80';
                        @endphp
                        <a href="{{ $post->url }}" class="group block">
                            <div class="aspect-[16/10] overflow-hidden bg-gray-200 mb-4">
                                <img src="{{ $cover }}" alt="{{ $post->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <span
                                class="font-sans text-xs font-semibold text-[var(--color-brand-accent)] uppercase tracking-wider mb-2 block">
                                {{ $post->category ?? 'Estratégia' }}
                            </span>
                            <h3
                                class="font-sans text-xl font-bold text-gray-900 group-hover:text-[var(--color-brand-accent)] transition-colors leading-snug mb-2">
                                {{ $post->title }}
                            </h3>
                            <p class="font-sans text-gray-600 text-sm line-clamp-2">
                                {{ $post->summary }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    {{-- ══════════════════════════════════════════════
    CTA FINAL — Vamos começar.
    ════════════════════════════════════════════════ --}}
    <x-cta-section />

@endsection
