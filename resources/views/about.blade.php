@extends('layouts.app')

@section('title', 'Sobre a Xamariz | Agência de Publicidade Angola & Internacional • Marketing 360°')
@section('description',
    'A Xamariz (marca da Visualclick, Lda) é a agência líder em Publicidade, Comunicação e Marketing
    360° em Luanda, Angola. Comunicação clara e atração de clientes.')

@section('content')

    {{-- Hero Section (BNP Paribas Style Editorial Header) --}}
    <section class="pt-40 pb-20 bg-white text-gray-900 border-b border-gray-100">
        <div class="container-myriad">
            {{-- Breadcrumb (Image 1 Style) --}}
            <div class="reveal flex items-center gap-3 text-xs uppercase font-sans tracking-widest mb-6 sm:mb-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Xamariz</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">Sobre o Grupo</span>
            </div>

            <div class="max-w reveal">
                <h1
                    class="font-sans text-4xl sm:text-6xl md:text-7xl font-normal text-gray-900 tracking-tight leading-[1.12] mb-8">
                    Além da criatividade.<br>
                    Além da imaginação.<br>
                    O parceiro de Marketing 360° que a sua empresa precisa.
                </h1>
                <p class="font-sans text-gray-600 text-lg sm:text-xl leading-relaxed mb-4">
                    A Xamariz (marca da empresa Visualclick, Lda) é uma agência de publicidade e comunicação focada em
                    conectar marcas a resultados tangíveis em Angola e no mercado internacional.
                </p>
                <p class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed">
                    Num mercado onde atrair clientes é cada vez mais desafiador, transformamos a sua mensagem em clareza,
                    diferenciação e liderança comercial.
                </p>
            </div>
        </div>
    </section>

    {{-- Featured Editorial Image --}}
    <section class="bg-white py-12">
        <div class="container-myriad">
            <div class="aspect-[21/9] overflow-hidden rounded-none reveal">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1800&auto=format&fit=crop&q=80"
                    alt="Equipa Xamariz Marketing em reunião criativa"
                    class="w-full h-full object-cover hover:scale-[1.02] transition-transform duration-1000">
            </div>
        </div>
    </section>

    {{-- Section: O Que Nos Move & A Nossa Causa --}}
    <section class="py-20 bg-white border-t border-gray-100">
        <div class="container-myriad">
            <div class="max-w reveal space-y-12">

                {{-- O QUE NOS MOVE --}}
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                        <span
                            class="font-sans text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)]">O
                            QUE NOS MOVE</span>
                    </div>
                    <h2 class="font-sans text-3xl sm:text-5xl font-bold text-gray-900 tracking-tight leading-tight mb-6">
                        Mensagem clara, diferenciação e atração de clientes.
                    </h2>
                    <p class="font-sans text-gray-700 text-lg sm:text-xl leading-relaxed font-medium mb-4">
                        Existem empresas focadas em oferecer produtos e serviços que resolvam problemas na vida dos
                        consumidores. Acreditamos verdadeiramente que se tiverem uma mensagem clara e convincente têm um
                        enorme potencial para serem bem sucedidos e tornarem-se a principal referência no seu mercado.
                        Torne-se uma verdadeira atração de clientes.
                    </p>
                    <p class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed">
                        A Xamariz é uma marca da empresa Visualclick, Lda cujo propósito é ajudar empresas a amplificar o
                        crescimento dos seus negócios através da comunicação digital e do
                        <a href="{{ route('services.index') }}"
                            class="text-[var(--color-brand-accent)] font-semibold hover:underline">marketing de
                            diferenciação</a>.
                    </p>
                </div>

                {{-- A NOSSA CAUSA --}}
                <div class="pt-10 border-t border-gray-200 space-y-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                        <span
                            class="font-sans text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)]">A
                            NOSSA CAUSA</span>
                    </div>
                    <p class="font-sans text-gray-700 text-base sm:text-lg leading-relaxed">
                        Vivemos numa era com tanta informação e distrações que cada vez torna-se mais difícil às empresas e
                        instituições transmitirem a sua mensagem com sucesso.
                    </p>
                    <p class="font-sans text-gray-700 text-base sm:text-lg leading-relaxed">
                        Neste contexto, é imperativo que as empresas que almejam ser bem sucedidas tenham uma forte presença
                        online e comuniquem de uma forma cativante.
                    </p>
                    <p
                        class="font-sans text-gray-900 font-semibold text-base sm:text-lg leading-relaxed border-l-4 border-[var(--color-brand-accent)] pl-5">
                        Na Xamariz acreditamos no talento e valor das empresas, instituições e comunidades angolanas e
                        esmeramo-nos por contribuir para o seu crescimento.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- Full Width Video Background Section --}}
    <section
        class="relative w-full min-h-[600px] lg:min-h-[750px] bg-black overflow-hidden flex items-center py-20 lg:py-28 select-none my-12">
        {{-- Full Width Video Background --}}
        <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline preload="auto">
            <source src="{{ asset('office.mp4') }}" type="video/mp4">
        </video>

        {{-- Dark Opacity Overlay --}}
        <div class="absolute inset-0 bg-black/60 backdrop-brightness-90 z-10"></div>

        {{-- Overlay Content --}}
        <div class="container-myriad relative z-20 w-full text-white">

            {{-- Top Left Tag --}}
            <div class="reveal flex items-center gap-2 mb-8 sm:mb-12">
                <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                <span class="font-sans text-xs font-bold uppercase tracking-widest text-white/90">EQUIPA & CULTURA
                    XAMARIZ</span>
            </div>

            {{-- Main Content Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-end">

                {{-- Left Column: Large Headline --}}
                <div class="lg:col-span-7 reveal">
                    <h2
                        class="font-sans text-4xl sm:text-6xl lg:text-7xl font-bold text-white tracking-tight leading-[1.06]">
                        Juntos,<br>
                        transformamos visão<br>
                        em realidade.
                    </h2>
                </div>

                {{-- Right Column: Paragraph + Pill Button --}}
                <div class="lg:col-span-5 reveal delay-200 flex flex-col items-start lg:pl-8 lg:pb-2">
                    <p class="font-sans text-white/90 text-base sm:text-lg leading-relaxed max-w-md mb-8">
                        Somos estrategistas, criativos, contadores de histórias e especialistas em performance dedicados à
                        excelência em Angola e no mundo.
                    </p>

                    <div class="flex items-center gap-4">
                        <button type="button"
                            class="showreel-trigger inline-flex items-center gap-3 px-7 py-3.5 rounded-full border border-white/70 hover:border-white text-white text-xs font-semibold uppercase tracking-wider transition-all duration-300 hover:bg-white/10 group cursor-pointer">
                            <span>CONHEÇA-NOS</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                class="text-[var(--color-brand-accent)] group-hover:translate-x-1 transition-transform">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>

                        <button type="button"
                            class="showreel-trigger w-12 h-12 rounded-full border border-[var(--color-brand-accent)] bg-[var(--color-brand-accent)]/20 hover:bg-[var(--color-brand-accent)] text-white flex items-center justify-center transition-all duration-300 hover:scale-105 cursor-pointer group"
                            aria-label="Assistir Vídeo">
                            <svg class="w-5 h-5 fill-current text-[var(--color-brand-accent)] group-hover:text-white transition-colors ml-0.5" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Section: A Nossa Oferta & A Nossa Promessa --}}
    <section class="py-20 bg-gray-50 text-gray-900 border-t border-b border-gray-200">
        <div class="container-myriad">
            <div class="max-w reveal space-y-16">

                {{-- A NOSSA OFERTA --}}
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                        <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700">COMPROMISSO COM O
                            CLIENTE</span>
                    </div>
                    <h2 class="font-sans text-3xl sm:text-5xl font-bold text-gray-900 tracking-tight mb-6">
                        A Nossa Oferta.
                    </h2>
                    <p class="font-sans text-gray-700 text-lg leading-relaxed mb-4">
                        Nos dias de hoje, os consumidores têm um novo percurso para adquirir os produtos e serviços que
                        desejam. Este novo caminho inicia chamando a atenção dos consumidores para que estes desenvolvam
                        atração pela oferta comercial ou marca apresentadas.
                    </p>
                    <p class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed">
                        A XAMARIZ elabora um plano de comunicação digital para cada empresa e implementa metodologias para
                        criar, gerir e analisar conteúdos relevantes para os seus clientes alvo.
                    </p>
                </div>

                {{-- A NOSSA PROMESSA --}}
                <div class="pt-12 border-t border-gray-200">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                        <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700">EXCELÊNCIA &
                            VALOR</span>
                    </div>
                    <h2 class="font-sans text-3xl sm:text-5xl font-bold text-gray-900 tracking-tight mb-6">
                        A Nossa Promessa.
                    </h2>
                    <p class="font-sans text-gray-700 text-lg leading-relaxed mb-4">
                        Os desafios audaciosos são a ignição que nos faz trabalhar arduamente para superar as expectativas
                        dos nossos clientes e parceiros.
                    </p>
                    <p class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed">
                        Exploramos constantemente novos horizontes e culturas com o objetivo de contribuir para a sua
                        promoção. Na nossa estrada para a excelência através dos serviços que prestamos, temos a satisfação
                        dos clientes como objetivo primordial.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- Feature Section: Como irá beneficiar dos nossos serviços (Central Device + 4 Benefits Grid) --}}
    <section class="py-24 bg-white border-t border-b border-gray-200 overflow-hidden">
        <div class="container-myriad">

            {{-- Section Header --}}
            <div class="reveal text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 mb-3">
                    <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                    <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700">VANTAGENS
                        COMPETITIVAS</span>
                </div>
                <h2 class="font-sans text-3xl sm:text-5xl font-bold text-gray-900 tracking-tight leading-tight mb-4">
                    Como irá beneficiar dos nossos serviços
                </h2>
                <p class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed">
                    Desenvolvemos o ecossistema de comunicação digital ideal para posicionar a sua empresa como a principal
                    referência do mercado.
                </p>
            </div>

            {{-- 3-Column Layout: Left (2 Benefits) - Center (Device) - Right (2 Benefits) --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center reveal delay-100">

                {{-- Left Column (2 Benefits) --}}
                <div class="lg:col-span-4 space-y-12 text-left lg:text-right">

                    {{-- Benefit 1: Mensagem cativante --}}
                    <div class="reveal flex flex-col items-start lg:items-end">
                        <h3
                            class="font-sans text-xl sm:text-2xl font-bold text-[var(--color-brand-accent)] mb-2 tracking-tight">
                            Mensagem cativante
                        </h3>
                        <p class="font-sans text-gray-600 text-sm sm:text-base leading-relaxed max-w-sm">
                            Terá uma mensagem clara e cativante sobre o que oferece aos seus clientes.
                        </p>
                    </div>

                    {{-- Benefit 2: Atrair clientes --}}
                    <div class="reveal delay-100 flex flex-col items-start lg:items-end">
                        <h3
                            class="font-sans text-xl sm:text-2xl font-bold text-[var(--color-brand-accent)] mb-2 tracking-tight">
                            Atrair clientes
                        </h3>
                        <p class="font-sans text-gray-600 text-sm sm:text-base leading-relaxed max-w-sm">
                            Irá atrair muitos clientes que poderão usufruir do que oferece, para resolver um problema nas
                            suas vidas.
                        </p>
                    </div>

                </div>

                {{-- Center Column (Central Device Frame) --}}
                <div class="lg:col-span-4 reveal">
                    <div
                        class="relative mx-auto max-w-[340px] border-4 border-gray-900 bg-gray-900 rounded-none shadow-none overflow-hidden group">
                        {{-- Screen Header Bar --}}
                        <div class="h-6 bg-gray-900 flex items-center justify-center px-4">
                            <div class="w-16 h-1 bg-gray-700 rounded-none"></div>
                        </div>

                        {{-- Mobile Screen Image --}}
                        <div class="aspect-[9/16] overflow-hidden bg-gray-100 relative">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=800&auto=format&fit=crop&q=80"
                                alt="Empreendedor de Sucesso Xamariz"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>
                    </div>
                </div>

                {{-- Right Column (2 Benefits) --}}
                <div class="lg:col-span-4 space-y-12 text-left">

                    {{-- Benefit 3: Íman de clientes --}}
                    <div class="reveal flex flex-col items-start">
                        <h3
                            class="font-sans text-xl sm:text-2xl font-bold text-[var(--color-brand-accent)] mb-2 tracking-tight">
                            Íman de clientes
                        </h3>
                        <p class="font-sans text-gray-600 text-sm sm:text-base leading-relaxed max-w-sm">
                            Terá um website e um sistema de comunicação digital que serão verdadeiros ímanes de clientes.
                        </p>
                    </div>

                    {{-- Benefit 4: Aumentar vendas --}}
                    <div class="reveal delay-100 flex flex-col items-start">
                        <h3
                            class="font-sans text-xl sm:text-2xl font-bold text-[var(--color-brand-accent)] mb-2 tracking-tight">
                            Aumentar vendas
                        </h3>
                        <p class="font-sans text-gray-600 text-sm sm:text-base leading-relaxed max-w-sm">
                            Irá aumentar as vendas e faturação da empresa. O que é sinónimo de crescimento.
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </section>

    {{-- Philosophy & History --}}
    <section class="py-24 bg-white text-gray-900">
        <div class="container-myriad">
            <div class="max-w-4xl space-y-16">

                {{-- Philosophy --}}
                <div class="reveal">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                        <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700">FILOSOFIA DA
                            MARCA</span>
                    </div>
                    <h2 class="font-sans font-bold text-3xl sm:text-5xl text-gray-900 mb-8 tracking-tight">
                        Em que acreditamos.
                    </h2>
                    <div class="space-y-6">
                        @foreach (['Num mundo hiperconectado, comunicar com clareza é uma vantagem comercial decisiva.', 'Ajudamos a sua marca a sair do ruído e a tornar-se uma referência incontornável no seu setor.', 'Desenvolvemos estratégias de Marketing 360° personalizadas para responder aos desafios reais do mercado angolano e global.', 'A nossa equipa combina criatividade publicitária, inteligência digital e execução de alta precisão.'] as $point)
                            <p
                                class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed border-l-2 border-gray-300 pl-5 hover:border-[var(--color-brand-accent)] transition-colors duration-300">
                                {{ $point }}
                            </p>
                        @endforeach
                    </div>
                </div>

                {{-- History --}}
                <div class="reveal delay-100 pt-12 border-t border-gray-200">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                        <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700">NOSSA
                            TRAJETÓRIA</span>
                    </div>
                    <h2 class="font-sans font-bold text-3xl sm:text-5xl text-gray-900 mb-8 tracking-tight">
                        A história da Xamariz.
                    </h2>
                    <div class="space-y-8">
                        @foreach ([['year' => 'Fundação', 'text' => 'Criada no seio da Visualclick, Lda em Luanda, Angola, focada no desenvolvimento digital.'], ['year' => 'Expansão', 'text' => 'Consolidação da marca Xamariz como referência em publicidade e Marketing 360°.'], ['year' => 'Hoje', 'text' => 'Uma equipa multidisciplinar de especialistas em estratégia, SEO, gestão de redes sociais, vídeo e branding.']] as $milestone)
                            <div class="flex flex-col sm:flex-row gap-2 sm:gap-6">
                                <span
                                    class="font-mono text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] shrink-0 pt-1 w-24">{{ $milestone['year'] }}</span>
                                <p class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed">
                                    {{ $milestone['text'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Infinite Image Gallery Carousel (Flush Borderless, Sem Margem, Sem Textos, Mesma Altura, Diversas Larguras) --}}
    <section class="py-0 bg-black overflow-hidden border-t border-b border-gray-900 select-none">
        <div class="relative w-full overflow-hidden">
            <div class="animate-marquee flex items-center gap-0">
                @php
                    $officeTeamGallery = [
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1000&auto=format&fit=crop&q=80',
                            'width' => 'w-[460px] sm:w-[540px]',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=800&auto=format&fit=crop&q=80',
                            'width' => 'w-[280px] sm:w-[320px]',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1497366216548-37526070297c?w=1000&auto=format&fit=crop&q=80',
                            'width' => 'w-[500px] sm:w-[580px]',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=800&auto=format&fit=crop&q=80',
                            'width' => 'w-[320px] sm:w-[380px]',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=1000&auto=format&fit=crop&q=80',
                            'width' => 'w-[420px] sm:w-[480px]',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1522529599102-193c0d76b5b6?w=800&auto=format&fit=crop&q=80',
                            'width' => 'w-[260px] sm:w-[300px]',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1542744807-2856f69756fb?w=1000&auto=format&fit=crop&q=80',
                            'width' => 'w-[440px] sm:w-[520px]',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=800&auto=format&fit=crop&q=80',
                            'width' => 'w-[360px] sm:w-[420px]',
                        ],
                    ];
                @endphp

                @foreach (array_merge($officeTeamGallery, $officeTeamGallery) as $item)
                    <div
                        class="{{ $item['width'] }} h-[320px] sm:h-[420px] shrink-0 overflow-hidden relative group rounded-none">
                        <img src="{{ $item['img'] }}" alt="Xamariz Escritório & Equipa"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24 bg-[var(--color-brand-dark)] text-white">
        <div class="container-myriad text-center reveal">
            <div class="inline-flex items-center gap-2 mb-4">
                <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-400">ENTRE EM CONTACTO</span>
            </div>
            <h2 class="font-sans text-3xl sm:text-5xl font-normal text-white mb-6 tracking-tight">
                Vamos construir algo icónico.
            </h2>
            <p class="font-sans text-gray-400 text-lg mb-10 max-w-md mx-auto leading-relaxed">
                Conte-nos sobre o seu projeto ou objetivo estratégico.
            </p>
            <a href="{{ route('contact') }}"
                class="inline-flex items-center gap-3 px-8 py-3.5 rounded-full bg-[var(--color-brand-accent)] text-white hover:bg-[var(--color-brand-accent-hover)] text-xs font-semibold uppercase tracking-wider transition-all duration-300 group">
                <span>FALAR COM A EQUIPA</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                    class="group-hover:translate-x-1 transition-transform">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>
    </section>

@endsection
