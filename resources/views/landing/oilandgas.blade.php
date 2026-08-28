@extends('layouts.app')

@section('title', \App\Models\SiteSetting::get('seo_oilandgas_title', 'Xamariz Energy | Oil & Gas — Comunicação Estratégica & Industrial'))
@section('description', \App\Models\SiteSetting::get('seo_oilandgas_description', 'A sua empresa não precisa de mais marketing. Precisa de comunicar melhor. Comunicação estratégica, posicionamento institucional e gestão de reputação para o sector de Oil & Gas em Angola.'))

@push('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        .font-barlow { font-family: 'Barlow', sans-serif !important; }
        .font-roboto { font-family: 'Roboto', sans-serif !important; }
        .validus-orange { color: #ff5e14; }
        .bg-validus-orange { background-color: #ff5e14; }
        .border-validus-orange { border-color: #ff5e14; }
    </style>
@endpush

@section('content')

    @php
        $oilGasClientsGrid = [
            [
                'name' => 'TotalEnergies',
                'logo' => 'images/logos/total.svg',
                'sector' => 'Oil & Gas',
                'type' => 'Operadora Multinacional',
                'scope' => 'Estratégia de comunicação corporativa e posicionamento institucional',
            ],
            [
                'name' => 'Sonangol',
                'logo' => 'images/logos/sonangol.svg',
                'sector' => 'Oil & Gas',
                'type' => 'Operadora Nacional',
                'scope' => 'Comunicação estratégica e gestão de stakeholders',
            ],
            [
                'name' => 'SLB (Schlumberger)',
                'logo' => 'images/logos/slb.svg',
                'sector' => 'Serviços Energéticos',
                'type' => 'Tecnologia & Poços',
                'scope' => 'Conteúdo técnico e posicionamento digital para o mercado angolano',
            ],
            [
                'name' => 'ENI / Azule Energy',
                'logo' => 'images/logos/azule.svg',
                'sector' => 'Oil & Gas',
                'type' => 'Exploração & Transição',
                'scope' => 'Comunicação institucional e relatórios de sustentabilidade',
            ],
            [
                'name' => 'Kaminho',
                'logo' => 'images/logos/kaminho.svg',
                'sector' => 'Energia',
                'type' => 'Projecto Offshore',
                'scope' => 'Posicionamento de marca e identidade corporativa',
            ],
            [
                'name' => 'IFC / Banco Mundial',
                'logo' => 'images/logos/ifc.svg',
                'sector' => 'Institucional',
                'type' => 'Financiamento Multilateral',
                'scope' => 'Comunicação de impacto e relatórios institucionais',
            ],
            [
                'name' => 'AES Angola',
                'logo' => 'images/logos/aes.svg',
                'sector' => 'Energia',
                'type' => 'Serviços Industriais',
                'scope' => 'Estratégia digital e comunicação corporativa',
            ],
            [
                'name' => 'ETU Energias',
                'logo' => 'images/logos/etu.svg',
                'sector' => 'Recursos & Energia',
                'type' => 'Operadora Angolana',
                'scope' => 'Comunicação institucional e reposicionamento de marca',
            ],
            [
                'name' => 'ABS / ILS',
                'logo' => 'images/logos/abs.svg',
                'sector' => 'Serviços Industriais',
                'type' => 'Logística & Suporte',
                'scope' => 'Comunicação técnica e engenharia de suporte',
            ],
            [
                'name' => 'EasyPeople',
                'logo' => 'images/logos/easypeople.svg',
                'sector' => 'RH Industrial',
                'type' => 'Capital Humano',
                'scope' => 'Comunicação interna e employer branding para sector industrial',
            ],
            [
                'name' => 'Chevron (CABGOC)',
                'logo' => 'images/logos/chevron.svg',
                'sector' => 'Oil & Gas',
                'type' => 'Operações Offshore',
                'scope' => 'Comunicação técnica e suporte visual a projectos de exploração',
            ],
            [
                'name' => 'Baker Hughes',
                'logo' => 'images/logos/bakerhughes.svg',
                'sector' => 'Tecnologia & Energia',
                'type' => 'Serviços Petrolíferos',
                'scope' => 'Portfólios técnicos e apresentações corporativas',
            ],
        ];
    @endphp

    {{-- ══════════════════════════════════════════════════════════════
     1. HERO SLIDER — CLONE PIXEL-TO-PIXEL VALIDUS (COM 2 MINI CARDS)
════════════════════════════════════════════════════════════════ --}}
    <section class="relative min-h-[92vh] lg:min-h-screen flex flex-col justify-between bg-[#111215] text-white overflow-hidden pt-28 pb-12 select-none font-barlow">
        {{-- Background Video/Image --}}
        <div class="absolute inset-0 z-0">
            <video class="w-full h-full object-cover opacity-45 brightness-75 scale-105" autoplay muted loop playsinline preload="auto" poster="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1920&auto=format&fit=crop&q=85">
                <source src="{{ asset('video_base.mp4') }}" type="video/mp4">
            </video>
            <div class="absolute inset-0 bg-gradient-to-r from-black/95 via-black/75 to-black/40"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#111215] via-transparent to-black/70"></div>
        </div>

        {{-- Hero Main Content --}}
        <div class="container-myriad relative z-10 pt-12 sm:pt-20 lg:pt-24 my-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-end">
                <div class="lg:col-span-8">
                    <span class="inline-block text-[#ff5e14] text-xs sm:text-sm font-bold uppercase tracking-widest mb-4">
                        XAMARIZ ENERGY &bull; OIL &amp; GAS ADVISORY
                    </span>

                    <h1 class="text-4xl sm:text-6xl md:text-7xl lg:text-[4.6rem] font-black text-white tracking-tight leading-[1.08] mb-6">
                        Providing World Class Solutions &amp; Technologies
                    </h1>

                    <p class="text-base sm:text-lg md:text-xl text-gray-200 font-normal leading-relaxed mb-10 max-w-2xl font-roboto">
                        A sua empresa não precisa de mais marketing. Precisa de comunicar melhor. Num sector onde confiança, reputação e clareza influenciam decisões, a comunicação tornou-se um activo estratégico.
                    </p>

                    {{-- Hero Buttons --}}
                    <div class="flex flex-wrap items-center gap-4 sm:gap-6">
                        <a href="#aog-section" class="inline-flex items-center gap-3.5 px-8 py-4 rounded-full bg-[#ff5e14] text-white text-xs sm:text-sm font-bold uppercase tracking-wider transition-all duration-300 hover:bg-[#e04e0b] hover:scale-[1.02] group">
                            <span class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center text-white group-hover:translate-x-0.5 transition-transform">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </span>
                            <span>Agendar conversa no AOG</span>
                        </a>

                        <a href="#about-section" class="inline-flex items-center justify-center px-8 py-4 rounded-full bg-white text-gray-900 text-xs sm:text-sm font-bold uppercase tracking-wider transition-all duration-300 hover:bg-gray-100 cursor-pointer">
                            <span>Conhecer a nossa abordagem</span>
                        </a>
                    </div>
                </div>

                {{-- 2 Floating Mini Feature Cards on Right Bottom (Exact Validus Screenshot) --}}
                <div class="lg:col-span-4 hidden md:flex items-center gap-4 justify-end">
                    {{-- Mini Card 1 --}}
                    <div class="bg-white/95 backdrop-blur text-gray-900 p-4 rounded-none shadow-xl flex items-center gap-3 w-52 hover:-translate-y-1 transition-transform">
                        <img src="https://images.unsplash.com/photo-1581092334651-ddf26d9a09d0?w=200&auto=format&fit=crop&q=80" alt="Personalised Solutions" class="w-14 h-14 object-cover">
                        <div>
                            <h5 class="text-xs font-bold leading-tight">Personalised Solutions</h5>
                            <span class="text-[10px] text-[#ff5e14] font-semibold flex items-center gap-1 mt-1">Read More &rarr;</span>
                        </div>
                    </div>

                    {{-- Mini Card 2 --}}
                    <div class="bg-white/95 backdrop-blur text-gray-900 p-4 rounded-none shadow-xl flex items-center gap-3 w-52 hover:-translate-y-1 transition-transform">
                        <img src="https://images.unsplash.com/photo-1541888946425-d0fbb18086f6?w=200&auto=format&fit=crop&q=80" alt="Environmental Sensitivity" class="w-14 h-14 object-cover">
                        <div>
                            <h5 class="text-xs font-bold leading-tight">Environmental Sensitivity</h5>
                            <span class="text-[10px] text-[#ff5e14] font-semibold flex items-center gap-1 mt-1">Read More &rarr;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Breadcrumb bottom bar --}}
        <div class="container-myriad relative z-10 pt-10 pb-4 border-t border-white/10 mt-12">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2 text-xs uppercase tracking-widest text-gray-300 font-medium">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Início</a>
                    <span class="text-gray-500">&gt;</span>
                    <span class="text-gray-400">A Agência</span>
                    <span class="text-gray-500">&gt;</span>
                    <span class="text-[#ff5e14] font-semibold">Oil &amp; Gas / Como Trabalhamos</span>
                </div>
                <a href="#about-section" class="hidden sm:inline-flex items-center gap-2 text-xs uppercase tracking-widest text-gray-400 hover:text-white transition-colors group">
                    <span>scroll</span>
                    <span class="group-hover:translate-y-1 transition-transform duration-300">&darr;</span>
                </a>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     2. ABOUT HIGHLIGHT — "LEADING INDUSTRIAL & MANUFACTURING..."
════════════════════════════════════════════════════════════════ --}}
    <section id="about-section" class="py-20 lg:py-28 bg-white text-gray-900 border-b border-gray-100 font-barlow">
        <div class="container-myriad">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                {{-- Left Content --}}
                <div class="lg:col-span-7">
                    <span class="text-[#ff5e14] text-xs font-bold uppercase tracking-widest block mb-3">
                        PROVIDING WORLD CLASS SOLUTIONS &amp; TECHNOLOGIES
                    </span>

                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 tracking-tight leading-[1.15] mb-6">
                        Leading Industrial &amp; Manufacturing Company, Serving Since 1970 With Global Expertise &amp; Strategies.
                    </h2>

                    <p class="font-bold text-gray-800 text-base sm:text-lg leading-relaxed mb-4">
                        Engineering has been built on engineering excellence crafted through quality dedication, innovation and industry expertise.
                    </p>

                    <p class="font-roboto text-sm sm:text-base text-gray-600 leading-relaxed mb-8">
                        Dedicamos o tempo e a atenção necessários para conduzir uma análise aprofundada da sua empresa, dos seus serviços técnicos e dos objectivos comerciais no sector petrolífero. Graças a isso, estruturamos uma estratégia de comunicação sob medida.
                    </p>

                    {{-- 2-Column Checklist with Orange Icons --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8 font-roboto">
                        <div class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#ff5e14]/15 text-[#ff5e14] flex items-center justify-center text-xs font-bold">✓</span>
                            <span class="text-sm font-semibold text-gray-800">Quality Control System</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#ff5e14]/15 text-[#ff5e14] flex items-center justify-center text-xs font-bold">✓</span>
                            <span class="text-sm font-semibold text-gray-800">Environmental Sensitivity</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#ff5e14]/15 text-[#ff5e14] flex items-center justify-center text-xs font-bold">✓</span>
                            <span class="text-sm font-semibold text-gray-800">Certified Engineers</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#ff5e14]/15 text-[#ff5e14] flex items-center justify-center text-xs font-bold">✓</span>
                            <span class="text-sm font-semibold text-gray-800">100% Satisfaction Guarantee</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#ff5e14]/15 text-[#ff5e14] flex items-center justify-center text-xs font-bold">✓</span>
                            <span class="text-sm font-semibold text-gray-800">Highly Professional Staff</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#ff5e14]/15 text-[#ff5e14] flex items-center justify-center text-xs font-bold">✓</span>
                            <span class="text-sm font-semibold text-gray-800">Accurate Testing Processes</span>
                        </div>
                    </div>

                    <a href="{{ route('about') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-[#141518] hover:bg-[#ff5e14] text-white text-xs font-bold uppercase tracking-wider transition-colors duration-200">
                        <span>▶</span>
                        <span>More About Us</span>
                    </a>
                </div>

                {{-- Right Image with World Map Overlay and Video Button --}}
                <div class="lg:col-span-5 relative">
                    <div class="relative overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1581092334651-ddf26d9a09d0?w=800&auto=format&fit=crop&q=80" alt="Engineer with laptop" class="w-full h-auto object-cover">
                        {{-- Circular Play Button --}}
                        <div class="absolute top-6 right-6 w-16 h-16 rounded-full bg-[#ff5e14] text-white flex items-center justify-center shadow-lg hover:scale-110 transition-transform cursor-pointer">
                            <svg class="w-6 h-6 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     3. SPLIT BANNER — "ENVIRONMENTAL SENSITIVITY" (LARANJA + FOTO)
════════════════════════════════════════════════════════════════ --}}
    <section class="grid grid-cols-1 lg:grid-cols-2 font-barlow">
        {{-- Left Half: Industrial Structure with Navigation Arrows --}}
        <div class="relative min-h-[450px] lg:min-h-[550px] overflow-hidden group">
            <img src="https://images.unsplash.com/photo-1541888946425-d0fbb18086f6?w=1200&auto=format&fit=crop&q=80" alt="Industrial Construction" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-0 bg-black/20"></div>

            <div class="absolute top-8 right-8 flex items-center gap-3 z-10">
                <button class="w-11 h-11 rounded-full bg-white/90 hover:bg-white text-gray-900 flex items-center justify-center shadow-md transition-colors">
                    &larr;
                </button>
                <button class="w-11 h-11 rounded-full bg-white/90 hover:bg-white text-gray-900 flex items-center justify-center shadow-md transition-colors">
                    &rarr;
                </button>
            </div>
        </div>

        {{-- Right Half: Solid Orange Background with Environmental Sensitivity Copy --}}
        <div class="bg-[#ff5e14] text-white p-10 sm:p-16 lg:p-20 flex flex-col justify-center relative overflow-hidden">
            <span class="text-xs font-bold uppercase tracking-widest text-white/80 block mb-3">
                ZERO CARBON FUTURE &bull; ESG COMPLIANCE
            </span>

            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-[1.1] mb-6">
                Environmental Sensitivity
            </h2>

            <p class="font-roboto text-base sm:text-lg text-white/90 leading-relaxed mb-8 max-w-xl">
                A transição energética e os compromissos socioambientais exigem dados verificáveis e narrativas de autoridade incontestável. Criamos relatórios de sustentabilidade e ESG que fortalecem a reputação da sua operadora.
            </p>

            <div class="flex flex-wrap items-center gap-4">
                <a href="#aog-section" class="inline-flex items-center justify-center px-8 py-4 rounded-full bg-white text-gray-900 text-xs font-bold uppercase tracking-wider hover:bg-gray-100 transition-colors">
                    Public Health &amp; Safety
                </a>
                <a href="{{ route('services.index') }}" class="inline-flex items-center justify-center px-8 py-4 rounded-full border border-white text-white text-xs font-bold uppercase tracking-wider hover:bg-white/10 transition-colors">
                    Read More
                </a>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     4. 4-COLUMN FEATURE CARDS — "UTILISING LATEST PROCESSING SOLUTIONS..."
════════════════════════════════════════════════════════════════ --}}
    <section class="py-20 lg:py-28 bg-[#fafafa] border-b border-gray-200 font-barlow">
        <div class="container-myriad">
            {{-- Top Heading with Right Buttons --}}
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-16">
                <div class="max-w-2xl">
                    <span class="text-[#ff5e14] text-xs font-bold uppercase tracking-widest block mb-2">
                        ALL INDUSTRIAL SERVICES &bull; TOTAL QUALITY
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 tracking-tight leading-[1.15]">
                        Utilising Latest Processing Solutions, And Decades Of Work Experience.
                    </h2>
                </div>

                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                    <a href="{{ route('services.index') }}" class="inline-flex items-center justify-center px-7 py-3.5 bg-[#141518] hover:bg-[#ff5e14] text-white text-xs font-bold uppercase tracking-wider transition-colors">
                        Explore More
                    </a>
                    <a href="#aog-section" class="text-sm font-bold text-gray-800 hover:text-[#ff5e14] flex items-center gap-2 transition-colors">
                        <span>Find Out More</span>
                        <span class="text-[#ff5e14]">&rarr;</span>
                    </a>
                </div>
            </div>

            {{-- 4 White Cards Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                {{-- Card 1 --}}
                <div class="bg-white p-8 border border-gray-200 flex flex-col justify-between hover:border-[#ff5e14] hover:shadow-lg transition-all duration-300 group">
                    <div>
                        <div class="text-[#ff5e14] mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#ff5e14] transition-colors">High Quality Energy</h4>
                        <p class="font-roboto text-xs text-gray-600 leading-relaxed mb-6">
                            Comunicação institucional e consultoria de posicionamento para operadoras multinacionais e nacionais.
                        </p>
                    </div>
                    <a href="{{ route('services.index') }}" class="text-xs font-bold text-gray-900 group-hover:text-[#ff5e14] flex items-center gap-1 transition-colors">
                        Read More &rarr;
                    </a>
                </div>

                {{-- Card 2 --}}
                <div class="bg-white p-8 border border-gray-200 flex flex-col justify-between hover:border-[#ff5e14] hover:shadow-lg transition-all duration-300 group">
                    <div>
                        <div class="text-[#ff5e14] mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#ff5e14] transition-colors">Certified Technical Staff</h4>
                        <p class="font-roboto text-xs text-gray-600 leading-relaxed mb-6">
                            Apoio a concursos, relatórios de conformidade e produção de conteúdos executivos de alta precisão.
                        </p>
                    </div>
                    <a href="{{ route('services.index') }}" class="text-xs font-bold text-gray-900 group-hover:text-[#ff5e14] flex items-center gap-1 transition-colors">
                        Read More &rarr;
                    </a>
                </div>

                {{-- Card 3 --}}
                <div class="bg-white p-8 border border-gray-200 flex flex-col justify-between hover:border-[#ff5e14] hover:shadow-lg transition-all duration-300 group">
                    <div>
                        <div class="text-[#ff5e14] mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#ff5e14] transition-colors">Production Engineering</h4>
                        <p class="font-roboto text-xs text-gray-600 leading-relaxed mb-6">
                            Sinalética industrial, manuais de segurança e comunicação operacional para plataformas onshore e offshore.
                        </p>
                    </div>
                    <a href="{{ route('services.index') }}" class="text-xs font-bold text-gray-900 group-hover:text-[#ff5e14] flex items-center gap-1 transition-colors">
                        Read More &rarr;
                    </a>
                </div>

                {{-- Card 4 --}}
                <div class="bg-white p-8 border border-gray-200 flex flex-col justify-between hover:border-[#ff5e14] hover:shadow-lg transition-all duration-300 group">
                    <div>
                        <div class="text-[#ff5e14] mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#ff5e14] transition-colors">Comprehensive Maintenance</h4>
                        <p class="font-roboto text-xs text-gray-600 leading-relaxed mb-6">
                            Gestão contínua de relações públicas, cobertura audiovisual técnica e ativações de marca para grandes eventos.
                        </p>
                    </div>
                    <a href="{{ route('services.index') }}" class="text-xs font-bold text-gray-900 group-hover:text-[#ff5e14] flex items-center gap-1 transition-colors">
                        Read More &rarr;
                    </a>
                </div>
            </div>

            {{-- Bottom Callout Bar under Cards (Validus) --}}
            <div class="bg-white p-6 sm:p-8 border border-gray-200 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <span class="w-10 h-10 rounded-full bg-[#ff5e14]/15 text-[#ff5e14] flex items-center justify-center font-bold text-lg shrink-0">
                        ▶
                    </span>
                    <p class="font-roboto text-xs sm:text-sm text-gray-700 leading-relaxed">
                        We serve the global market and decade young industry expertise through serving an impressive list of long-term clients.
                    </p>
                </div>
                <a href="#aog-section" class="inline-flex items-center justify-center px-6 py-3 bg-[#141518] hover:bg-[#ff5e14] text-white text-xs font-bold uppercase tracking-wider transition-colors shrink-0">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     5. DARK SECTION — "BUILDING FUTURE, RESTORING PAST!" (VALIDUS)
════════════════════════════════════════════════════════════════ --}}
    <section class="py-24 lg:py-32 bg-[#111215] text-white border-t border-white/5 font-barlow">
        <div class="container-myriad">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                {{-- Left Column: Title & Feature List --}}
                <div class="lg:col-span-6">
                    <span class="text-[#ff5e14] text-xs font-bold uppercase tracking-widest block mb-3">
                        DEDICATED TO QUALITY, INNOVATION AND PERFORMANCE
                    </span>

                    <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-[1.12] mb-6">
                        Building Future, Restoring Past!
                    </h2>

                    <p class="font-roboto text-sm sm:text-base text-gray-300 leading-relaxed mb-8">
                        Estratégia de comunicação, posicionamento institucional e gestão de reputação para operadores, prestadores de serviços e instituições do sector energético angolano e internacional.
                    </p>

                    <div class="space-y-6 mb-10">
                        <div class="flex items-start gap-4">
                            <div class="text-[#ff5e14] shrink-0 mt-1">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-white">Quality Control System</h4>
                                <p class="font-roboto text-xs text-gray-400 mt-1">We enhance our industry operations by relieving you of the worries associated with corporate positioning.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="text-[#ff5e14] shrink-0 mt-1">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-white">Accurate Testing Processes</h4>
                                <p class="font-roboto text-xs text-gray-400 mt-1">We’ll work with you on your project, together we’ll fine-tune your new communication plans.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="text-[#ff5e14] shrink-0 mt-1">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-white">Highly Professional Staff</h4>
                                <p class="font-roboto text-xs text-gray-400 mt-1">Smooth, easy &amp; instant handling with full control over strategic stakeholder alignment.</p>
                            </div>
                        </div>
                    </div>

                    <a href="#aog-section" class="inline-flex items-center gap-3 px-8 py-4 rounded-full bg-[#ff5e14] text-white text-xs font-bold uppercase tracking-wider hover:bg-[#e04e0b] transition-colors">
                        Request A Quote
                    </a>
                </div>

                {{-- Right Column: Industrial Vertical Images Showcase --}}
                <div class="lg:col-span-6 grid grid-cols-2 gap-4">
                    <div class="relative overflow-hidden aspect-[3/4] shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1581092334651-ddf26d9a09d0?w=600&auto=format&fit=crop&q=80" alt="Worker driving forklift" class="w-full h-full object-cover">
                    </div>
                    <div class="relative overflow-hidden aspect-[3/4] shadow-2xl mt-8">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600&auto=format&fit=crop&q=80" alt="Industrial pipes" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     6. ORANGE PROCESS SECTION — "INDIVIDUALLY ASSESS EACH PLAN..." (VALIDUS)
════════════════════════════════════════════════════════════════ --}}
    <section class="py-24 lg:py-32 bg-[#ff5e14] text-white font-barlow relative overflow-hidden">
        <div class="container-myriad relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                {{-- Left Column: Big Headline & Action --}}
                <div class="lg:col-span-5">
                    <span class="text-xs font-bold uppercase tracking-widest text-white/80 block mb-3">
                        WHERE QUALITY MEETS INNOVATION
                    </span>

                    <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-[1.12] mb-8">
                        Individually Assess Each Plan And Offer Optimal Solutions For Your Facility Needs!
                    </h2>

                    <a href="#aog-section" class="inline-flex items-center gap-3 px-8 py-4 rounded-full bg-white text-gray-900 text-xs font-bold uppercase tracking-wider hover:bg-gray-100 transition-colors mb-12">
                        <span>▶</span>
                        <span>Meet Our Experts</span>
                    </a>

                    {{-- Technical Wireframe Watermark Icon --}}
                    <div class="opacity-20 max-w-xs">
                        <svg class="w-full h-auto" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 100 100">
                            <rect x="10" y="20" width="80" height="60" rx="4" />
                            <circle cx="50" cy="50" r="18" />
                            <path d="M50 10v20 M50 70v20 M10 50h20 M70 50h20 M30 30l12 12 M58 58l12 12 M70 30l-12 12 M42 58l-12 12" />
                        </svg>
                    </div>
                </div>

                {{-- Right Column: 4 Process Step Cards with Images (01, 02, 03, 04) --}}
                <div class="lg:col-span-7 space-y-6">
                    {{-- Step 01 --}}
                    <div class="bg-black/15 p-6 sm:p-8 flex flex-col sm:flex-row items-center gap-6 border border-white/10 hover:bg-black/25 transition-colors">
                        <div class="flex-1">
                            <span class="text-3xl sm:text-4xl font-extrabold text-white block mb-2">01</span>
                            <h4 class="text-lg font-bold text-white mb-2">Initial analysis of your project</h4>
                            <p class="font-roboto text-xs text-white/80 leading-relaxed">
                                Dedicamos o tempo e a atenção necessários para conduzir uma análise aprofundada da sua empresa e serviços técnicos.
                            </p>
                        </div>
                        <div class="w-full sm:w-40 h-28 shrink-0 overflow-hidden shadow-md">
                            <img src="https://images.unsplash.com/photo-1581092334651-ddf26d9a09d0?w=400&auto=format&fit=crop&q=80" alt="Step 01" class="w-full h-full object-cover">
                        </div>
                    </div>

                    {{-- Step 02 --}}
                    <div class="bg-black/15 p-6 sm:p-8 flex flex-col sm:flex-row items-center gap-6 border border-white/10 hover:bg-black/25 transition-colors">
                        <div class="flex-1">
                            <span class="text-3xl sm:text-4xl font-extrabold text-white block mb-2">02</span>
                            <h4 class="text-lg font-bold text-white mb-2">Local vision &amp; presentation</h4>
                            <p class="font-roboto text-xs text-white/80 leading-relaxed">
                                Criamos apresentações executivas de alto impacto, relatórios de sustentabilidade e dossiers de concurso para operadoras.
                            </p>
                        </div>
                        <div class="w-full sm:w-40 h-28 shrink-0 overflow-hidden shadow-md">
                            <img src="https://images.unsplash.com/photo-1541888946425-d0fbb18086f6?w=400&auto=format&fit=crop&q=80" alt="Step 02" class="w-full h-full object-cover">
                        </div>
                    </div>

                    {{-- Step 03 --}}
                    <div class="bg-black/15 p-6 sm:p-8 flex flex-col sm:flex-row items-center gap-6 border border-white/10 hover:bg-black/25 transition-colors">
                        <div class="flex-1">
                            <span class="text-3xl sm:text-4xl font-extrabold text-white block mb-2">03</span>
                            <h4 class="text-lg font-bold text-white mb-2">Clear on-site communication</h4>
                            <p class="font-roboto text-xs text-white/80 leading-relaxed">
                                Sinalética industrial resistente a ambientes corrosivos, manuais de indução e comunicação de segurança QHSE.
                            </p>
                        </div>
                        <div class="w-full sm:w-40 h-28 shrink-0 overflow-hidden shadow-md">
                            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=400&auto=format&fit=crop&q=80" alt="Step 03" class="w-full h-full object-cover">
                        </div>
                    </div>

                    {{-- Step 04 --}}
                    <div class="bg-black/15 p-6 sm:p-8 flex flex-col sm:flex-row items-center gap-6 border border-white/10 hover:bg-black/25 transition-colors">
                        <div class="flex-1">
                            <span class="text-3xl sm:text-4xl font-extrabold text-white block mb-2">04</span>
                            <h4 class="text-lg font-bold text-white mb-2">Easy &amp; instant handling</h4>
                            <p class="font-roboto text-xs text-white/80 leading-relaxed">
                                Produção de stands e ativações para o Angola Oil &amp; Gas e gestão contínua de relações públicas e reputação.
                            </p>
                        </div>
                        <div class="w-full sm:w-40 h-28 shrink-0 overflow-hidden shadow-md">
                            <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=400&auto=format&fit=crop&q=80" alt="Step 04" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     7. CASE STUDIES & CLIENT LOGOS SHOWCASE
════════════════════════════════════════════════════════════════ --}}
    <section class="py-20 lg:py-28 bg-[#fafafa] border-b border-gray-200 font-barlow">
        <div class="container-myriad">
            {{-- Section Heading --}}
            <div class="max-w-3xl mb-12 sm:mb-16">
                <span class="text-[#ff5e14] text-xs font-bold uppercase tracking-widest block mb-2">
                    EXPERIÊNCIA COMPROVADA NO SECTOR &bull; TRACK RECORD
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 tracking-tight leading-[1.12] mb-4">
                    Trabalhamos com organizações que operam em ambientes de elevada complexidade.
                </h2>
                <p class="font-roboto text-sm sm:text-base text-gray-600 leading-relaxed">
                    Estratégia de comunicação, posicionamento institucional e gestão de reputação para operadores, prestadores de serviços e instituições do sector energético angolano e internacional.
                </p>
            </div>

            {{-- 3-Column Grid of Official SVG Logos --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
                @foreach ($oilGasClientsGrid as $client)
                    <div class="bg-white p-7 sm:p-8 border border-gray-200 flex flex-col justify-between hover:border-[#ff5e14] hover:shadow-md transition-all duration-300 group">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-6">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-[#ff5e14] bg-[#ff5e14]/10 px-2.5 py-1">
                                    {{ $client['sector'] }}
                                </span>
                                <span class="text-[11px] text-gray-400 font-medium truncate">
                                    {{ $client['type'] }}
                                </span>
                            </div>

                            <div class="h-14 flex items-center justify-start mb-5">
                                <img src="{{ asset($client['logo']) }}" alt="{{ $client['name'] }}" class="max-h-12 max-w-[170px] object-contain group-hover:scale-105 transition-transform duration-300">
                            </div>

                            <p class="font-roboto text-xs sm:text-sm text-gray-600 leading-relaxed min-h-[40px]">
                                {{ $client['scope'] }}
                            </p>
                        </div>

                        <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400 font-semibold group-hover:text-[#ff5e14] transition-colors">
                            <span>Xamariz Energy Advisory</span>
                            <span class="text-base group-hover:translate-x-1 transition-transform">&rarr;</span>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Marquee Continuous Banner --}}
            <div class="pt-8 border-t border-gray-200">
                <p class="text-center text-xs uppercase tracking-widest text-gray-400 font-bold mb-8">
                    Operadoras &bull; Prestadores de Serviços &bull; Instituições Energéticas
                </p>

                <div class="relative w-full overflow-hidden py-3">
                    <div class="absolute left-0 top-0 bottom-0 w-16 sm:w-32 bg-gradient-to-r from-[#fafafa] to-transparent z-10 pointer-events-none"></div>
                    <div class="absolute right-0 top-0 bottom-0 w-16 sm:w-32 bg-gradient-to-l from-[#fafafa] to-transparent z-10 pointer-events-none"></div>

                    <div class="flex items-center gap-10 sm:gap-14 w-max animate-marquee hover:[animation-play-state:paused]">
                        @foreach (array_merge($oilGasClientsGrid, $oilGasClientsGrid) as $client)
                            <div class="shrink-0 flex items-center justify-center h-12 w-36 sm:w-44 px-4 py-2 bg-white border border-gray-200/70 opacity-70 hover:opacity-100 hover:border-[#ff5e14] transition-all duration-200">
                                <img src="{{ asset($client['logo']) }}" alt="{{ $client['name'] }}" class="max-h-8 max-w-full object-contain">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════════════════════════════
     8. CONTACT / REQUEST A QUOTE — ANGOLA OIL & GAS 2026 (VALIDUS)
════════════════════════════════════════════════════════════════ --}}
    <section id="aog-section" class="py-24 lg:py-32 bg-[#0c0d0f] text-white border-t border-white/10 relative overflow-hidden font-barlow">
        <div class="container-myriad relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                {{-- Left Column: Request A Quote Message --}}
                <div class="lg:col-span-6">
                    <span class="inline-block text-[#ff5e14] text-xs font-bold uppercase tracking-widest mb-4">
                        Angola Oil &amp; Gas Conference 2026
                    </span>
                    <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-[1.1] mb-6">
                        Vamos conversar durante o AOG.
                    </h2>
                    <p class="text-lg text-gray-300 leading-relaxed mb-6 font-roboto">
                        Vamos estar presentes no <span class="text-white font-bold">Angola Oil &amp; Gas</span>.
                    </p>
                    <p class="font-roboto text-base text-gray-400 leading-relaxed mb-10">
                        Se acredita que a comunicação pode gerar mais valor para a sua organização, teremos todo o gosto em conversar consigo e analisar oportunidades estratégicas para a sua marca no sector energético.
                    </p>

                    <div class="space-y-4 pt-6 border-t border-white/10 font-roboto">
                        <div class="flex items-center gap-4 text-sm text-gray-300">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#ff5e14]"></span>
                            <span>Reuniões executivas presenciais durante o evento em Luanda</span>
                        </div>
                        <div class="flex items-center gap-4 text-sm text-gray-300">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#ff5e14]"></span>
                            <span>Contacto directo da equipa de energia: aog@xamariz.ao</span>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Form with White Background Inputs --}}
                <div class="lg:col-span-6 bg-[#16171a] p-8 sm:p-10 border border-white/15">
                    <h3 class="text-2xl font-bold text-white mb-2">
                        Request A Meeting / Agendar conversa
                    </h3>
                    <p class="font-roboto text-xs text-gray-400 mb-6">
                        Preencha os dados abaixo para coordenarmos o horário mais conveniente durante o AOG.
                    </p>

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                        @csrf
                        <input type="hidden" name="sectors[]" value="Angola Oil & Gas 2026 - Reunião AOG">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 font-roboto">
                            <div>
                                <label class="block text-xs uppercase tracking-wider font-semibold text-gray-300 mb-2 font-barlow">Nome *</label>
                                <input type="text" name="first_name" required placeholder="ex: Manuel"
                                    class="w-full bg-white border border-gray-300 focus:border-[#ff5e14] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-wider font-semibold text-gray-300 mb-2 font-barlow">Sobrenome *</label>
                                <input type="text" name="last_name" required placeholder="ex: Santos"
                                    class="w-full bg-white border border-gray-300 focus:border-[#ff5e14] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 font-roboto">
                            <div>
                                <label class="block text-xs uppercase tracking-wider font-semibold text-gray-300 mb-2 font-barlow">E-mail Corporativo *</label>
                                <input type="email" name="email" required placeholder="ex: m.santos@operadora.com"
                                    class="w-full bg-white border border-gray-300 focus:border-[#ff5e14] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-wider font-semibold text-gray-300 mb-2 font-barlow">Organização / Empresa *</label>
                                <input type="text" name="company" required placeholder="ex: Operadora, Prestador de Serviços..."
                                    class="w-full bg-white border border-gray-300 focus:border-[#ff5e14] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors">
                            </div>
                        </div>

                        <div class="font-roboto">
                            <label class="block text-xs uppercase tracking-wider font-semibold text-gray-300 mb-2 font-barlow">Tema de Interesse ou Disponibilidade</label>
                            <textarea name="message" rows="3"
                                placeholder="Indique o dia preferencial durante o AOG ou os principais desafios de comunicação da sua organização..."
                                class="w-full bg-white border border-gray-300 focus:border-[#ff5e14] text-gray-900 placeholder-gray-400 text-sm px-4 py-3 outline-none transition-colors"></textarea>
                        </div>

                        <button type="submit" class="w-full py-4 rounded-full bg-[#ff5e14] text-white text-xs font-bold uppercase tracking-wider hover:bg-[#e04e0b] transition-all duration-200 cursor-pointer shadow-none">
                            Submit Your Request / Agendar Reunião AOG
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
