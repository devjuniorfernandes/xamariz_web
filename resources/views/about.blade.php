@extends('layouts.app')

@section('title', \App\Models\SiteSetting::get('seo_about_title', 'Sobre a Xamariz | Agência de Publicidade Angola & Internacional • Marketing 360°'))
@section('description', \App\Models\SiteSetting::get('seo_about_description', 'A Xamariz ajuda empresas a transformar complexidade em clareza e a clareza em impacto. Comunicação clara e atração de clientes.'))

@section('content')

    {{-- Hero Section (BNP Paribas Style Editorial Header) --}}
    <section class="pt-40 pb-20 bg-white text-gray-900 border-b border-gray-100">
        <div class="container-myriad">
            {{-- Breadcrumb (apenas o principal) --}}
            <div class="reveal flex items-center gap-3 text-xs uppercase font-sans tracking-widest mb-6 sm:mb-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Xamariz</a>
            </div>

            <div class="max-w reveal">
                <h1
                    class="font-sans text-3xl sm:text-5xl font-normal text-gray-900 tracking-tight leading-[1.12] mb-8">
                    O que nos move.
                </h1>
                <p class="font-sans text-gray-600 text-lg sm:text-xl leading-relaxed mb-4">
                    Existem empresas focadas em oferecer produtos e serviços que resolvam problemas na vida dos consumidores.
                </p>
                <p class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed mb-4">
                    Acreditamos verdadeiramente que se tiverem uma mensagem clara e convincente têm um enorme potencial para serem bem sucedidos e tornarem-se a principal referência no seu mercado. Torna-se uma verdadeira atração de clientes.
                </p>
                <p class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed">
                    A Xamariz é uma marca da empresa Visualclick, Lda cujo propósito é ajudar empresas a amplificar o crescimento dos seus negócios através da comunicação digital e marketing de diferenciação.
                </p>
            </div>
        </div>
    </section>

    {{-- Featured Editorial Image --}}
    <section class="bg-white py-12">
        <div class="container-myriad">
            <div class="aspect-[21/9] overflow-hidden rounded-none reveal">
                <img src="{{ asset('equipa.png') }}"
                    alt="Equipa Xamariz"
                    class="w-full h-full object-cover hover:scale-[1.02] transition-transform duration-1000">
                <p class="mt-2 text-[10px] text-gray-400">Foto: Erik Cleves Kristensen / Wikimedia Commons (CC BY 2.0)</p>
            </div>
        </div>
    </section>

    {{-- Section: O que nos move --}}
    <section class="py-20 bg-white border-t border-gray-100">
        <div class="container-myriad">
            <div class="max-w reveal space-y-12">

                {{-- A NOSSA CAUSA --}}
                <div class="pt-10 border-t border-gray-200 space-y-6">
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
                        {{ \App\Models\SiteSetting::get('about_cause_quote', 'Na Xamariz acreditamos no talento e valor das empresas, instituições e comunidades angolanas e esmeramo-nos por contribuir para o seu crescimento.') }}
                    </p>
                </div>

        </div>
    </section>

    {{-- Full Width Video Background Section --}}
    @include('components.video-section')

    {{-- Section: A Nossa Oferta & A Nossa Promessa --}}
    <section class="py-20 bg-gray-50 text-gray-900 border-t border-b border-gray-200">
        <div class="container-myriad">
            <div class="max-w reveal space-y-16">

                {{-- A NOSSA OFERTA --}}
                <div>
                    <h2 class="font-sans text-3xl sm:text-5xl font-bold text-gray-900 tracking-tight mb-6">
                        {{ \App\Models\SiteSetting::get('about_offer_title', 'A Nossa Oferta.') }}
                    </h2>
                    <p class="font-sans text-gray-700 text-lg leading-relaxed mb-4">
                        {{ \App\Models\SiteSetting::get('about_offer_text', 'Nos dias de hoje, os consumidores têm um novo percurso para adquirir os produtos e serviços que desejam. Este novo caminho inicia chamando a atenção dos consumidores para que estes desenvolvam atração pela oferta comercial ou marca apresentadas. A XAMARIZ elabora um plano de comunicação digital para cada empresa e implementa metodologias para criar, gerir e analisar conteúdos relevantes para os seus clientes alvo.') }}
                    </p>
                </div>

                {{-- A NOSSA PROMESSA --}}
                <div class="pt-12 border-t border-gray-200">
                    <h2 class="font-sans text-3xl sm:text-5xl font-bold text-gray-900 tracking-tight mb-6">
                        {{ \App\Models\SiteSetting::get('about_promise_title', 'A Nossa Promessa.') }}
                    </h2>
                    <p class="font-sans text-gray-700 text-lg leading-relaxed mb-4">
                        {{ \App\Models\SiteSetting::get('about_promise_text', 'Os desafios audaciosos são a ignição que nos faz trabalhar arduamente para superar as expectativas dos nossos clientes e parceiros. Exploramos constantemente novos horizontes e culturas com o objetivo de contribuir para a sua promoção. Na nossa estrada para a excelência através dos serviços que prestamos, temos a satisfação dos clientes como objetivo primordial.') }}
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
                    <div class="relative mx-auto max-w-[340px] overflow-hidden group">


                        {{-- Mobile Screen Image --}}
                        <div class="aspect-[9/18] relative">
                            <img src="{{ asset('mobile_x.png') }}" alt="Empreendedor de Sucesso Xamariz"
                                class="w-full h-full">
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
                    <h2 class="font-sans font-bold text-3xl sm:text-5xl text-gray-900 mb-8 tracking-tight">
                        {{ \App\Models\SiteSetting::get('about_beliefs_title', 'Em que acreditamos.') }}
                    </h2>
                    <div class="space-y-6">
                        <p class="font-sans text-gray-700 text-base sm:text-lg leading-relaxed border-l-2 border-[var(--color-brand-accent)] pl-5">
                            {{ \App\Models\SiteSetting::get('about_beliefs_text', 'Acreditamos que a publicidade deve transcender o ruído visual e criar ligações autênticas entre marcas e consumidores. Num mundo hiperconectado, comunicar com clareza é uma vantagem comercial decisiva.') }}
                        </p>
                    </div>
                </div>

                {{-- History --}}
                <div class="reveal delay-100 pt-12 border-t border-gray-200">
                    <h2 class="font-sans font-bold text-3xl sm:text-5xl text-gray-900 mb-8 tracking-tight">
                        {{ \App\Models\SiteSetting::get('about_history_title', 'A história da Xamariz.') }}
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

    {{-- ═══════════════ A NOSSA EQUIPA (consolidado de /team) ═══════════════ --}}
    @if (($ceoMember ?? null) || (isset($teamMembers) && $teamMembers->count() > 0))
        <section class="py-24 bg-white border-t border-gray-200">
            <div class="container-myriad">
                <div class="reveal mb-12">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                        <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700">{{ \App\Models\SiteSetting::get('team_grid_eyebrow', 'DIREÇÃO & EQUIPA') }}</span>
                    </div>
                    <h2 class="font-sans text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">{{ \App\Models\SiteSetting::get('team_grid_title', 'Equipa') }}</h2>
                    <p class="font-sans text-gray-600 text-sm sm:text-base max-w-2xl mt-3">{{ \App\Models\SiteSetting::get('team_grid_subtitle', 'Uma equipa integrada de especialistas dedicados à excelência comercial e criativa da sua marca.') }}</p>
                </div>

                @if ($ceoMember ?? null)
                    @php
                        $ceoPhoto = $ceoMember->photo_path
                            ? (Str::startsWith($ceoMember->photo_path, ['http://', 'https://']) ? $ceoMember->photo_path : asset(ltrim($ceoMember->photo_path, '/')))
                            : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80';
                    @endphp
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center mb-20 reveal">
                        <div class="lg:col-span-5 pb-8">
                            <div class="aspect-square overflow-hidden bg-gray-100">
                                <img src="{{ $ceoPhoto }}" alt="{{ $ceoMember->name }}" class="w-full h-full object-cover object-top grayscale-[10%] hover:grayscale-0 transition-all duration-500">
                            </div>
                        </div>
                        <div class="lg:col-span-7 space-y-6">
                            <div>
                                <h3 class="font-sans text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight mb-1">{{ $ceoMember->name }}</h3>
                                <p class="font-sans text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] mb-4">{{ $ceoMember->role }}</p>
                                @if ($ceoMember->quote)
                                    <p class="font-sans text-gray-700 text-lg leading-relaxed italic border-l-2 border-[var(--color-brand-accent)] pl-4">"{{ $ceoMember->quote }}"</p>
                                @endif
                            </div>
                            @if ($ceoMember->bio)
                                <div class="border-t border-gray-200 pt-6 space-y-4">
                                    <h4 class="font-sans text-lg font-bold text-gray-900 tracking-tight">{{ \App\Models\SiteSetting::get('team_ceo_bio_title', 'Experiência & Visão de Liderança') }}</h4>
                                    <p class="font-sans text-gray-600 text-sm leading-relaxed">{!! nl2br(e($ceoMember->bio)) !!}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                @if (isset($teamMembers) && $teamMembers->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-8 gap-y-12 mt-20 lg:mt-28 pt-12 border-t border-gray-100">
                        @foreach ($teamMembers as $member)
                            @php
                                $photoPath = $member->photo_path;
                                $photo = $photoPath
                                    ? (Str::startsWith($photoPath, ['http://', 'https://']) ? $photoPath : asset(ltrim($photoPath, '/')))
                                    : 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=800&auto=format&fit=crop&q=80';
                            @endphp
                            <div class="group reveal">
                                <div class="aspect-[3/4] overflow-hidden bg-gray-200 mb-4">
                                    <img src="{{ $photo }}" alt="{{ $member->name }}" class="w-full h-full object-cover grayscale-[15%] group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500">
                                </div>
                                <h3 class="font-sans font-bold text-gray-900 text-lg tracking-tight group-hover:text-[var(--color-brand-accent)] transition-colors">{{ $member->name }}</h3>
                                <p class="font-sans text-xs text-gray-500 font-semibold tracking-wide uppercase mt-1">{{ $member->role }}</p>
                                @if ($member->bio)
                                    <p class="font-sans text-xs text-gray-600 leading-relaxed mt-2 line-clamp-2">{{ $member->bio }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- ═══════════════ CLIENTES & PARCERIAS (consolidado de /clients) ═══════════════ --}}
    @if (isset($clients) && $clients->count() > 0)
        <section class="py-20 bg-gray-50/50 border-t border-gray-200">
            <div class="container-myriad">
                <div class="max-w-3xl mb-12 reveal">
                    <h2 class="font-sans text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">{{ \App\Models\SiteSetting::get('clients_hero_title', 'Marcas líderes que confiam na Xamariz.') }}</h2>
                    <p class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed mt-3">{{ \App\Models\SiteSetting::get('clients_hero_subtitle', 'Trabalhamos com empresas corporativas, instituições e líderes globais em Angola e no mundo. Clique num logótipo para ver os trabalhos realizados.') }}</p>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 reveal">
                    @foreach ($clients as $client)
                        @php
                            $logoRaw = $client->logo_path ?? '';
                            $logoUrl = $logoRaw ? (Str::startsWith($logoRaw, ['http://', 'https://']) ? $logoRaw : asset(ltrim($logoRaw, '/'))) : null;
                        @endphp
                        <a href="{{ route('clients.show', $client->slug) }}" title="{{ $client->name }}" class="group flex items-center justify-center h-36 p-4 select-none">
                            <div class="filter grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300 flex items-center justify-center">
                                @if (Str::startsWith($logoRaw, '<svg'))
                                    {!! $logoRaw !!}
                                @elseif ($logoUrl)
                                    <img src="{{ $logoUrl }}" alt="{{ $client->name }}" class="max-w-full max-h-24 object-contain">
                                @else
                                    <span class="font-sans font-bold text-gray-800 text-lg">{{ $client->name }}</span>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

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
    <x-cta-section title="Vamos construir algo icónico."
        subtitle="Conte-nos sobre o seu projeto ou objetivo estratégico." />

@endsection
