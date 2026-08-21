@extends('layouts.app')

@section('title', 'Xamariz | Agência de Publicidade Angola & Marketing 360°')
@section('description',
    'A Xamariz é uma agência de publicidade e Marketing 360° em Luanda, Angola, focada em
    comunicação clara e estratégias que dominam o mercado.')

@section('content')

    {{-- ══════════════════════════════════════════════
     HERO — Video Slider (video_base.mp4 & video_base_2.mp4)
════════════════════════════════════════════════ --}}
    <section x-data="{
        activeSlide: 0,
        totalSlides: 2,
        timer: null,
        init() {
            this.startAutoplay();
        },
        startAutoplay() {
            this.timer = setInterval(() => {
                this.next();
            }, 9000);
        },
        resetAutoplay() {
            if (this.timer) clearInterval(this.timer);
            this.startAutoplay();
        },
        goTo(index) {
            this.activeSlide = index;
            this.resetAutoplay();
        },
        next() {
            this.activeSlide = (this.activeSlide + 1) % this.totalSlides;
        },
        prev() {
            this.activeSlide = (this.activeSlide - 1 + this.totalSlides) % this.totalSlides;
        }
    }" class="relative min-h-screen overflow-hidden bg-black select-none">

        {{-- Slide 1: video_base.mp4 --}}
        <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out"
            :class="activeSlide === 0 ? 'opacity-100 z-0' : 'opacity-0 -z-10'">
            <video class="w-full h-full object-cover" autoplay muted loop playsinline preload="auto"
                poster="https://images.unsplash.com/photo-1518135714426-c18f5ffb6f4d?w=1800&auto=format&fit=crop&q=60">
                <source src="{{ asset('video_base.mp4') }}" type="video/mp4">
            </video>
        </div>

        {{-- Slide 2: video_base_2.mp4 --}}
        <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out"
            :class="activeSlide === 1 ? 'opacity-100 z-0' : 'opacity-0 -z-10'">
            <video class="w-full h-full object-cover" autoplay muted loop playsinline preload="auto">
                <source src="{{ asset('video_base_2.mp4') }}" type="video/mp4">
            </video>
        </div>

        {{-- Gradiente apenas no topo — destaque para o menu navbar --}}
        <div class="absolute inset-x-0 top-0 h-40 bg-gradient-to-b from-black/70 to-transparent pointer-events-none z-10">
        </div>

        {{-- Overlay de Controlos do Slider --}}
        <div class="absolute inset-0 z-20 pointer-events-none flex flex-col justify-between p-6 sm:p-10 md:p-12">
            {{-- Contador de slides no topo direito --}}
            <div class="flex justify-end pt-16 sm:pt-20">
                <div
                    class="font-sans text-white/90 text-xs font-semibold tracking-widest px-3.5 py-1.5 pointer-events-auto">
                    <span x-text="String(activeSlide + 1).padStart(2, '0')">01</span>
                    <span class="text-white/40 mx-1">/</span>
                    <span x-text="String(totalSlides).padStart(2, '0')">02</span>
                </div>
            </div>

            {{-- Barra inferior: Controlo dos slides & Scroll --}}
            <div class="flex items-end justify-between w-full">
                {{-- Botões Anterior/Seguinte e Barras de Progresso --}}
                <div class="pointer-events-auto flex items-center gap-4 sm:gap-6  p-2.5 sm:px-4 sm:py-3">
                    <div class="flex items-center gap-1.5">
                        <button @click="prev(); resetAutoplay()"
                            class="p-1.5 text-white/70 hover:text-white hover:bg-white/10 transition-all rounded-xs"
                            aria-label="Slide anterior">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="m15 18-6-6 6-6" />
                            </svg>
                        </button>
                        <button @click="next(); resetAutoplay()"
                            class="p-1.5 text-white/70 hover:text-white hover:bg-white/10 transition-all rounded-xs"
                            aria-label="Slide seguinte">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </button>
                    </div>

                    {{-- Linhas Indicadoras de Slide --}}
                    <div class="flex items-center gap-2">
                        <template x-for="(slide, index) in totalSlides" :key="index">
                            <button @click="goTo(index)"
                                class="relative h-1 transition-all duration-500 overflow-hidden cursor-pointer"
                                :class="activeSlide === index ? 'w-10 bg-[var(--color-brand-accent)]' :
                                    'w-5 bg-white/30 hover:bg-white/60'"
                                :aria-label="'Ir para slide ' + (index + 1)"></button>
                        </template>
                    </div>
                </div>

                {{-- Indicador de Scroll no canto inferior direito --}}
                <div
                    class="pointer-events-auto flex flex-col items-center gap-2 opacity-60 hover:opacity-100 transition-opacity">
                    <span
                        class="font-sans text-white text-[10px] tracking-widest uppercase rotate-90 origin-center translate-x-6">Scroll</span>
                    <div class="w-px h-12 bg-white/40 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1/2 bg-white animate-bounce"></div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    {{-- ══════════════════════════════════════════════
     WHAT WE DO
════════════════════════════════════════════════ --}}
    <section
        class="relative bg-gradient-to-br from-[#09297a] via-[#132058] to-[#281b45] py-28 md:py-36 overflow-hidden text-white"
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
            <div class="flex items-center gap-2.5 mb-10 reveal">
                <span class="w-2 h-2 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                <span class="font-sans text-xs font-bold uppercase tracking-widest text-white/90">O QUE FAZEMOS.</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                <div class="lg:col-span-7 reveal">
                    <h2 class="font-serif text-white font-bold leading-[1.08]"
                        style="font-size: clamp(2.25rem, 4.5vw, 3.75rem); letter-spacing: -0.035em;">
                        Ajudamos empresas e instituições em Angola e no mundo a comunicar com clareza, atrair clientes e
                        dominar o mercado.
                    </h2>
                </div>

                <div class="lg:col-span-5 space-y-10 reveal delay-200 lg:pt-2">
                    <div class="border-l-2 border-[var(--color-brand-accent)] pl-6">
                        <h3
                            class="font-sans text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] mb-3">
                            QUEM SOMOS
                        </h3>
                        <p class="font-sans text-white/80 text-base sm:text-lg leading-relaxed">
                            A Xamariz é uma agência especializada em Comunicação, Publicidade e Marketing 360°, com sede em
                            Luanda (Angola) e projeção internacional.
                        </p>
                    </div>

                    <div class="border-l-2 border-white/20 hover:border-[var(--color-brand-accent)] transition-colors pl-6">
                        <h3 class="font-sans text-xs font-bold uppercase tracking-widest text-white/60 mb-3">
                            PORQUE IMPORTA
                        </h3>
                        <p class="font-sans text-white/80 text-base sm:text-lg leading-relaxed">
                            Numa era de constante excesso de ruído, atrair clientes é cada vez mais difícil. Com estratégias
                            de diferenciação e comunicação transparente, a sua empresa conquista posições de liderança no
                            setor.
                        </p>
                    </div>

                    <div class="pt-2 pl-6">
                        <a href="{{ route('about') }}"
                            class="inline-flex items-center gap-2.5 font-sans text-sm font-semibold text-[var(--color-brand-accent)] hover:text-white transition-colors group">
                            <span>Saber mais sobre nós</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" class="group-hover:translate-x-1 transition-transform">
                                <path d="M5 12h14" />
                                <path d="m12 5 7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════
     SELECTED WORK (Dinamico da BD)
════════════════════════════════════════════════ --}}
    @if(isset($featuredWorks) && $featuredWorks->count() > 0)
    <section class="py-28 bg-white">
        <div class="container-myriad">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-16 reveal">
                <div>
                    <div class="divider-line mb-6"></div>
                    <h2 class="font-serif font-black text-[var(--color-brand-dark)]"
                        style="font-size: clamp(1.75rem, 3.5vw, 2.75rem); letter-spacing: -0.03em;">
                        Projetos em destaque.
                    </h2>
                    <p class="font-sans text-[var(--color-muted)] mt-3 max-w-md">
                        Campanhas e soluções de comunicação para grandes marcas em Angola e no mercado internacional.
                    </p>
                </div>
                <a href="{{ route('work.index') }}" class="btn-outline shrink-0">
                    Ver todos os projetos
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </a>
            </div>

            {{-- Work grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-4" data-work-grid>
                @foreach ($featuredWorks as $index => $work)
                    @php
                        $clientName = $work->client ? $work->client->name : '';
                        $categoryFilter = $work->category ? $work->category->filter_key : 'all';
                        $colSpan = match($index) {
                            0 => 'lg:col-span-7 h-[500px]',
                            1 => 'lg:col-span-5 h-[500px]',
                            default => 'lg:col-span-4 h-[380px]',
                        };
                        $cover = $work->cover_image ? asset($work->cover_image) : 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=900&auto=format&fit=crop&q=80';
                    @endphp

                    <a href="{{ route('work.show', $work->slug) }}" class="work-card {{ $colSpan }}" data-sector="{{ $categoryFilter }}">
                        <img src="{{ $cover }}" alt="{{ $work->title }}">
                        <div class="card-overlay">
                            <div class="card-arrow">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M7 17L17 7" />
                                    <path d="M7 7h10v10" />
                                </svg>
                            </div>
                            @if($clientName)
                                <p class="font-sans text-white/70 text-xs mb-1 font-semibold uppercase tracking-wider">{{ $clientName }}</p>
                            @endif
                            <h3 class="font-serif text-white font-black text-2xl mb-2" style="letter-spacing: -0.02em;">{{ $work->title }}</h3>
                            <p class="font-sans text-white/70 text-sm leading-relaxed max-w-sm">
                                {{ Str::limit($work->summary ?? $work->description, 120) }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ══════════════════════════════════════════════
     FULL VIDEO SECTION WITH OVERLAY (OUR TEAM - Dinamico da BD)
════════════════════════════════════════════════ --}}
    @if(isset($teamMembers) && $teamMembers->count() > 0)
    <section
        class="relative w-full min-h-[600px] lg:min-h-[750px] bg-black overflow-hidden flex items-center py-20 lg:py-28 select-none">
        <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline preload="auto">
            <source src="{{ asset('office.mp4') }}" type="video/mp4">
        </video>

        <div class="absolute inset-0 bg-black/55 backdrop-brightness-90 z-10"></div>

        <div class="container-myriad relative z-20 w-full text-white">
            <div class="reveal flex items-center gap-2 mb-8 sm:mb-12">
                <span class="w-2 h-2 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                <span class="font-sans text-xs font-bold uppercase tracking-widest text-white/90">A NOSSA EQUIPA</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-end">
                <div class="lg:col-span-7 reveal">
                    <h2
                        class="font-sans text-4xl sm:text-6xl lg:text-7xl font-bold text-white tracking-tight leading-[1.06]">
                        Juntos,<br>
                        transformamos visão<br>
                        em liderança.
                    </h2>
                </div>

                <div class="lg:col-span-5 reveal delay-200 flex flex-col items-start lg:pl-8 lg:pb-2">
                    <p class="font-sans text-white/90 text-base sm:text-lg leading-relaxed max-w-md mb-8">
                        Somos estrategistas, criativos e produtores dedicados à excelência, focados em colocar a sua marca
                        no topo do mercado em Angola e no mundo.
                    </p>

                    <a href="{{ route('team.index') }}"
                        class="inline-flex items-center gap-3 px-7 py-3 rounded-full border border-white/70 hover:border-white text-white text-xs font-semibold uppercase tracking-wider transition-all duration-300 hover:bg-white/10 group">
                        <span>CONHECER A EQUIPA</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                            class="text-[var(--color-brand-accent)] group-hover:translate-x-1 transition-transform">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </section>
    @endif

    {{-- ══════════════════════════════════════════════
     ABOUT US
════════════════════════════════════════════════ --}}
    <section class="py-24 sm:py-32 bg-white text-gray-900 overflow-hidden">
        <div class="container-myriad">

            <div class="reveal flex items-center gap-2 mb-6 sm:mb-8">
                <span class="w-2 h-2 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-800">SOBRE NÓS</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

                <div class="lg:col-span-6 reveal">
                    <h2
                        class="font-sans text-4xl sm:text-6xl md:text-7xl font-normal text-gray-900 tracking-tight leading-[1.08] mb-8 sm:mb-10">
                        Além da criatividade.<br>
                        Além da imaginação.<br>
                        Resultados reais.
                    </h2>

                    <p class="font-sans text-gray-700 text-base sm:text-lg leading-relaxed max-w-lg mb-10">
                        Transformamos ideias em jornadas, histórias em emoção e marcas em experiências inesquecíveis que
                        dominam o mercado.
                    </p>

                    <a href="{{ route('about') }}"
                        class="inline-flex items-center gap-3 px-7 py-3 rounded-full border border-gray-900 text-gray-900 hover:border-[var(--color-brand-accent)] hover:text-[var(--color-brand-accent)] text-xs font-semibold uppercase tracking-wider transition-all duration-300 group">
                        <span>SOBRE NÓS</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                            class="text-[var(--color-brand-accent)] group-hover:translate-x-1 transition-transform">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

                <div class="lg:col-span-6 reveal delay-200">
                    <div class="aspect-[16/10] overflow-hidden rounded-none bg-gray-900 shadow-lg">
                        <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=1200&auto=format&fit=crop&q=80"
                            alt="Event stage experience"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-700 ease-out">
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════
     SERVICES — Interactive Expanding Cards (Dinamico da BD)
════════════════════════════════════════════════ --}}
    @if(isset($servicesList) && $servicesList->count() > 0)
    <section class="py-24 sm:py-32 bg-gradient-to-br from-[#fe3d0a] via-[#d63205] to-[#801200] text-white overflow-hidden">
        <div class="container-myriad">

            <div class="reveal flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 mb-12 lg:mb-16">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-white inline-block"></span>
                    <span class="font-sans text-xs font-bold tracking-widest text-white/90 uppercase">NOSSOS SERVIÇOS</span>
                </div>

                <h2
                    class="font-sans text-2xl sm:text-3xl md:text-4xl font-bold text-white tracking-tight leading-tight text-left sm:text-right max-w-lg">
                    Soluções de Marketing 360°<br class="hidden sm:inline"> para dominar o mercado<span
                        class="text-white">.</span>
                </h2>
            </div>

            <div class="reveal delay-100" x-data="{ active: 0 }">
                <div class="flex flex-col lg:flex-row gap-4 h-auto lg:h-[540px] w-full">
                    @foreach ($servicesList as $index => $item)
                        @php
                            $numCode = $item->number_code ?? sprintf('%02d', $index + 1);
                            $title = $item->title;
                            $slug = $item->slug;
                            $desc = $item->short_description ?? $item->full_description;
                            $img = $item->image_path ? asset($item->image_path) : 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=1200&auto=format&fit=crop&q=80';
                        @endphp
                        <div @mouseenter="active = {{ $index }}" @click="active = {{ $index }}"
                            class="relative overflow-hidden rounded-none cursor-pointer transition-all duration-700 ease-in-out group min-h-[300px] lg:min-h-0"
                            :class="active === {{ $index }} ? 'lg:flex-[3.5] bg-black/40' :
                                'lg:flex-1 bg-black/80 hover:bg-black/60'">
                            <img src="{{ $img }}" alt="{{ $title }}"
                                class="absolute inset-0 w-full h-full object-cover transition-all duration-700"
                                :class="active === {{ $index }} ? 'scale-100 opacity-80 brightness-90' :
                                    'scale-105 opacity-30 brightness-50 group-hover:opacity-50 group-hover:brightness-75'">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-black/60 pointer-events-none">
                            </div>

                            <div class="relative z-10 h-full p-8 lg:p-10 flex flex-col justify-between transition-opacity duration-500"
                                x-show="active === {{ $index }}"
                                x-transition:enter="transition ease-out duration-300 delay-150"
                                x-transition:enter-start="opacity-0 translate-y-4"
                                x-transition:enter-end="opacity-100 translate-y-0">
                                <div class="flex items-start justify-between w-full">
                                    <h3
                                        class="font-sans font-extrabold text-2xl sm:text-3xl text-white tracking-tight max-w-sm">
                                        {{ $title }}<span class="text-[var(--color-brand-accent)]">.</span>
                                    </h3>
                                    <span class="font-mono text-xs font-semibold text-gray-300/80 tracking-widest pt-1">
                                        {{ $numCode }}
                                    </span>
                                </div>

                                <div class="max-w-md mt-auto pt-16">
                                    <p class="font-sans text-sm sm:text-base text-gray-200 leading-relaxed mb-6">
                                        {{ $desc }}
                                    </p>
                                    <a href="{{ route('services.show', $slug) }}"
                                        class="inline-flex items-center gap-2.5 text-sm font-semibold text-white hover:text-[var(--color-brand-accent)] transition-colors group/btn">
                                        <span>Explorar serviço</span>
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2.5"
                                            class="text-[var(--color-brand-accent)] group-hover/btn:translate-x-1 transition-transform">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div class="relative z-10 h-full p-6 hidden lg:flex items-center justify-center transition-opacity duration-300"
                                x-show="active !== {{ $index }}">
                                <h3
                                    class="font-sans font-semibold text-lg text-white tracking-tight text-center whitespace-normal leading-snug px-2">
                                    {{ $title }}
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    @endif

    {{-- ══════════════════════════════════════════════
     OUR WORK & BRANDS (Dinamico da BD)
════════════════════════════════════════════════ --}}
    @if(isset($brandLogos) && $brandLogos->count() > 0)
    <section class="py-24 sm:py-32 bg-white text-gray-900 overflow-hidden">
        <div class="container-myriad">

            <div class="reveal flex items-center gap-2 mb-6 sm:mb-8">
                <span class="w-2 h-2 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700">NOSSO PORTFÓLIO</span>
            </div>

            <div class="reveal max-w-4xl mb-16 sm:mb-20">
                <h2
                    class="font-sans text-4xl sm:text-6xl md:text-7xl font-normal text-gray-900 tracking-tight leading-[1.12]">
                    Trabalhamos com marcas audazes<br>
                    impulsionando o seu próximo<br>
                    grande salto.
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
                        $lPath = is_object($logoItem) ? $logoItem->logo_path : ($logoItem['logo_path'] ?? '');
                        $lName = is_object($logoItem) ? $logoItem->name : ($logoItem['name'] ?? '');
                        $lSlug = is_object($logoItem) ? $logoItem->slug : ($logoItem['slug'] ?? '');
                        $lUrl = $lPath ? (Str::startsWith($lPath, ['http://', 'https://']) ? $lPath : asset(ltrim($lPath, '/'))) : null;
                    @endphp
                    <a href="{{ route('clients.show', $lSlug) }}" title="{{ $lName }}"
                        class="shrink-0 w-36 sm:w-44 h-16 flex items-center justify-center cursor-pointer opacity-60 grayscale hover:opacity-100 hover:grayscale-0 hover:scale-110 hover:-translate-y-1 transition-all duration-300 ease-out">
                        @if(Str::startsWith($lPath, '<svg'))
                            {!! $lPath !!}
                        @elseif($lUrl)
                            <img src="{{ $lUrl }}" alt="{{ $lName }}"
                                class="max-w-full max-h-12 object-contain pointer-events-none">
                        @else
                            <span class="font-sans font-bold text-gray-800 text-sm">{{ $lName }}</span>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>

        <div class="container-myriad">
            <div class="reveal delay-200 flex justify-center">
                <a href="{{ route('clients.index') }}"
                    class="inline-flex items-center gap-3 px-8 py-3 rounded-full border border-gray-900 text-gray-900 hover:border-[var(--color-brand-accent)] hover:text-[var(--color-brand-accent)] text-xs font-semibold uppercase tracking-wider transition-all duration-300 group">
                    <span>VER CLIENTES</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                        class="text-[var(--color-brand-accent)] group-hover:translate-x-1 transition-transform">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- ══════════════════════════════════════════════
     INSIGHTS & ARTIGOS (Dinamico da BD)
════════════════════════════════════════════════ --}}
    @if(isset($latestInsights) && $latestInsights->count() > 0)
    <section class="py-24 bg-gray-50 text-gray-900 border-t border-gray-200">
        <div class="container-myriad">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-16 reveal">
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                        <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700">INSIGHTS & ARTIGOS</span>
                    </div>
                    <h2 class="font-sans text-3xl sm:text-5xl font-bold text-gray-900 tracking-tight">
                        Pensamento estratégico recente.
                    </h2>
                </div>
                <a href="{{ route('insights.index') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[var(--color-brand-accent)] hover:text-gray-900 transition-colors">
                    Ver todos os artigos
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 reveal">
                @foreach ($latestInsights as $post)
                    @php
                        $cover = $post->cover_image ? asset($post->cover_image) : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1200&auto=format&fit=crop&q=80';
                    @endphp
                    <a href="{{ route('insights.show', $post->slug) }}" class="group block">
                        <div class="aspect-[16/10] overflow-hidden bg-gray-200 mb-4">
                            <img src="{{ $cover }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <span class="font-sans text-xs font-semibold text-[var(--color-brand-accent)] uppercase tracking-wider mb-2 block">
                            {{ $post->category ?? 'Estratégia' }}
                        </span>
                        <h3 class="font-sans text-xl font-bold text-gray-900 group-hover:text-[var(--color-brand-accent)] transition-colors leading-snug mb-2">
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
    <section class="py-32 bg-[var(--color-brand-dark)]">
        <div class="container-myriad text-center">
            <div class="reveal">
                <div class="divider-line mb-8 mx-auto"></div>
                <h2 class="font-serif text-white font-black mb-6"
                    style="font-size: clamp(2rem, 5vw, 4.5rem); letter-spacing: -0.04em;">
                    Vamos começar.
                </h2>
                <p class="font-sans text-white/50 text-xl mb-12 max-w-md mx-auto leading-relaxed">
                    Conte-nos sobre o seu projeto. Vamos construir o sucesso juntos.
                </p>
                <a href="{{ route('contact') }}" class="btn-primary text-base px-8 py-4">
                    Falar com a equipa.
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

@endsection
