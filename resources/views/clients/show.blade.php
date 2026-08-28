@extends('layouts.app')

@php
    $allClientsData = [
        'exxonmobil' => [
            'name' => 'ExxonMobil',
            'sector' => 'Energia & Recursos',
            'logo' =>
                '<svg width="220" height="60" viewBox="0 0 180 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 10H30L38 24L46 10H61L48 29L62 48H47L38 33L29 48H14L28 29L15 10Z" fill="#EE2722"/><path d="M60 10H75L83 24L91 10H106L93 29L107 48H92L83 33L74 48H59L73 29L60 10Z" fill="#EE2722"/><text x="112" y="38" font-family="Inter, sans-serif" font-weight="900" font-size="24" fill="#EE2722">Mobil</text></svg>',
            'headline' => 'Parceria Estratégica de Comunicação & Atração de Talentos',
            'desc' =>
                'Desenvolvemos formatos de conteúdos audiovisuais e campanhas de reciclagem avançada para a ExxonMobil, humanizando conceitos técnicos complexos para o público global e stakeholders.',
            'services_provided' => 'Estratégia, Audiovisual & Comunicação Interna',
            'works' => [
                [
                    'slug' => 'exxperts',
                    'client' => 'ExxonMobil',
                    'title' => 'Meet the Exxperts',
                    'desc' => 'Formato de conteúdos que transformou conhecimento técnico em comunicação humanizada.',
                    'img' =>
                        'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=700&auto=format&fit=crop&q=80',
                ],
                [
                    'slug' => 'exxtend',
                    'client' => 'ExxonMobil',
                    'title' => 'Exxtend Advanced Recycling',
                    'desc' => 'Reciclagem avançada transformada numa narrativa de economia circular.',
                    'img' =>
                        'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?w=700&auto=format&fit=crop&q=80',
                ],
            ],
        ],
        'tullow-oil' => [
            'name' => 'Tullow Oil',
            'sector' => 'Petróleo & Gás',
            'logo' =>
                '<svg width="200" height="60" viewBox="0 0 180 50" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="25" cy="25" r="16" fill="#005A36"/><path d="M25 15V35M15 25H35" stroke="#FFFFFF" stroke-width="4"/><text x="52" y="34" font-family="Inter, sans-serif" font-weight="900" font-size="22" fill="#005A36" letter-spacing="1">TULLOW</text></svg>',
            'headline' => 'Comunicação Comunitária e Envolvimento Local',
            'desc' =>
                'Criámos publicações ilustradas e materiais estratégicos que aproximam as comunidades locais da cadeia de valor energética da Tullow Oil.',
            'services_provided' => 'Publicações, Ilustração & Envolvimento Comunitário',
            'works' => [
                [
                    'slug' => 'building-futures',
                    'client' => 'Tullow Oil',
                    'title' => 'Building Futures',
                    'desc' =>
                        'Publicação ilustrada que aproxima comunidades locais da cadeia de valor do setor energético.',
                    'img' =>
                        'https://images.unsplash.com/photo-1590859808308-3d2d9c515b1a?w=700&auto=format&fit=crop&q=80',
                ],
            ],
        ],
        'perenco' => [
            'name' => 'Perenco',
            'sector' => 'Energia & Sustentabilidade',
            'logo' =>
                '<svg width="200" height="60" viewBox="0 0 180 50" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="10" y="12" width="26" height="26" fill="#002D62"/><path d="M18 20H28M18 25H28M18 30H24" stroke="#FFFFFF" stroke-width="2.5"/><text x="45" y="34" font-family="Inter, sans-serif" font-weight="900" font-size="22" fill="#002D62" letter-spacing="1">PERENCO</text></svg>',
            'headline' => 'Campanhas anuais de Sustentabilidade & Transição Energética',
            'desc' =>
                'Produção de campanhas de elevado impacto visual documentando iniciativas de descarbonização e captura de carbono.',
            'services_provided' => 'Branding, Campanhas & Produção Audiovisual',
            'works' => [
                [
                    'slug' => 'perenco-ccs',
                    'client' => 'Perenco',
                    'title' => 'Carbon Capture and Storage',
                    'desc' => 'Campanha anual sobre projetos de sustentabilidade e captura de carbono.',
                    'img' =>
                        'https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?w=700&auto=format&fit=crop&q=80',
                ],
            ],
        ],
        'sonangol' => [
            'name' => 'Sonangol',
            'sector' => 'Energia & Recursos Naturais',
            'logo' =>
                '<svg width="200" height="60" viewBox="0 0 180 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22 10C15 18 15 28 22 36C29 28 29 18 22 10Z" fill="#E30613"/><path d="M22 16C18 22 18 28 22 32C26 28 26 22 22 16Z" fill="#FFC72C"/><text x="36" y="34" font-family="Inter, sans-serif" font-weight="900" font-size="22" fill="#141414">SONANGOL</text></svg>',
            'headline' => 'Comunicação Institucional da Marca Líder de Angola',
            'desc' =>
                'Planeamento estratégico de comunicação e produção de conteúdos para a celebração de marcos históricos corporativos.',
            'services_provided' => 'Estratégia, Branding, Audiovisual & Marketing 360°',
            'works' => [
                [
                    'slug' => 'building-futures',
                    'client' => 'Sonangol',
                    'title' => 'Orgulho Nacional',
                    'desc' => 'Campanha publicitária institucional celebrando a energia que move Angola.',
                    'img' =>
                        'https://images.unsplash.com/photo-1590859808308-3d2d9c515b1a?w=700&auto=format&fit=crop&q=80',
                ],
            ],
        ],
    ];

    $clientObj = is_object($client) ? $client : null;
    $clientArr = is_array($client) ? $client : $allClientsData[$slug] ?? null;

    $cName = $clientObj ? $clientObj->name : $clientArr['name'] ?? ucfirst(str_replace('-', ' ', $slug));
    $cSector = $clientObj
        ? $clientObj->sector ?? 'Parceiro Estratégico'
        : $clientArr['sector'] ?? 'Parceiro Estratégico';
    $cHeadline = $clientObj
        ? $clientObj->headline ?? 'Estratégias de Publicidade & Marketing 360°'
        : $clientArr['headline'] ?? 'Estratégias de Publicidade & Marketing 360°';
    $cDesc = $clientObj
        ? $clientObj->description ??
            'Projetos desenvolvidos pela Xamariz para fortalecer a liderança e reputação no mercado.'
        : $clientArr['desc'] ??
            ($clientArr['description'] ??
                'Projetos desenvolvidos pela Xamariz para fortalecer a liderança e reputação no mercado.');
    $cServices = $clientObj
        ? $clientObj->services_provided ?? 'Estratégia, Branding, Audiovisual & Marketing 360°'
        : $clientArr['services_provided'] ?? 'Estratégia, Branding, Audiovisual & Marketing 360°';

    $cLogoRaw = $clientObj ? $clientObj->logo_path : $clientArr['logo'] ?? ($clientArr['logo_path'] ?? '');
    $cLogoUrl = $cLogoRaw
        ? (Str::startsWith($cLogoRaw, ['http://', 'https://'])
            ? $cLogoRaw
            : asset(ltrim($cLogoRaw, '/')))
        : null;

    $cWorks = [];
    if ($clientObj && $clientObj->works && count($clientObj->works) > 0) {
        $cWorks = $clientObj->works;
    } elseif ($clientArr && isset($clientArr['works'])) {
        $cWorks = $clientArr['works'];
    }
@endphp

@section('title', $cName . ' • Parceria de Marca & Projetos | Xamariz')
@section('description', 'Explore os projetos de publicidade, branding, audiovisual e marketing 360° desenvolvidos pela Xamariz para a marca ' . $cName . ' em Angola e no mercado internacional.')

@section('content')

    {{-- Client Header Section --}}
    <section class="pt-40 pb-20 bg-white border-b border-gray-100">
        <div class="container-myriad">

            {{-- Design System Breadcrumb --}}
            <div class="reveal flex items-center gap-3 text-xs uppercase font-sans tracking-widest mb-8">
                <a href="{{ route('clients.index') }}" class="text-gray-600 hover:text-gray-900 transition-colors">
                    Parcerias e Clientes
                </a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400 truncate max-w-xs sm:max-w-md">{{ $cSector }}</span>
            </div>

            {{-- Client Logo / Name --}}
            <div class="reveal mb-8 h-16 flex items-center">
                @if (Str::startsWith($cLogoRaw, '<svg'))
                    {!! $cLogoRaw !!}
                @elseif($cLogoUrl)
                    <img src="{{ $cLogoUrl }}" alt="{{ $cName }}" class="max-h-16 max-w-xs object-contain">
                @else
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">{{ $cName }}</h2>
                @endif
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                <div class="lg:col-span-8 reveal">
                    <h1 class="font-sans text-3xl sm:text-5xl font-bold text-gray-900 tracking-tight leading-tight mb-6">
                        {{ $cHeadline }}
                    </h1>
                    <p class="font-sans text-gray-600 text-lg sm:text-xl leading-relaxed max-w-3xl">
                        {{ $cDesc }}
                    </p>
                </div>

                <div class="lg:col-span-4 reveal delay-100">
                    <div class="p-8 bg-gray-50 border border-gray-200 rounded-none space-y-4">
                        <p class="font-sans text-xs font-bold uppercase tracking-widest text-gray-500">RESUMO DA PARCERIA
                        </p>
                        <div>
                            <p class="font-sans text-xs font-semibold text-gray-400 uppercase">CLIENTE</p>
                            <p class="font-sans text-lg font-bold text-gray-900">{{ $cName }}</p>
                        </div>
                        <div>
                            <p class="font-sans text-xs font-semibold text-gray-400 uppercase">SETOR DE ATUAÇÃO</p>
                            <p class="font-sans text-sm font-semibold text-gray-700">{{ $cSector }}</p>
                        </div>
                        <div>
                            <p class="font-sans text-xs font-semibold text-gray-400 uppercase">SERVIÇOS PRESTADOS</p>
                            <p class="font-sans text-sm font-semibold text-gray-700">{{ $cServices }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Client Works Grid --}}
    <section class="py-20 bg-gray-50/50">
        <div class="container-myriad">

            <div class="reveal flex items-center justify-between mb-12">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                        <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700">PORTFÓLIO DE
                            PROJETOS</span>
                    </div>
                    <h2 class="font-sans text-3xl font-bold text-gray-900 tracking-tight">
                        Trabalhos efetuados para {{ $cName }}
                    </h2>
                </div>
                <span class="font-mono text-xs font-bold text-gray-500 uppercase tracking-widest">
                    {{ count($cWorks) }} {{ count($cWorks) > 1 ? 'Projetos' : 'Projeto' }}
                </span>
            </div>

            @if (count($cWorks) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($cWorks as $work)
                        @php
                            $wSlug = is_object($work) ? $work->slug : $work['slug'];
                            $wTitle = is_object($work) ? $work->title : $work['title'];
                            $wClientName =
                                is_object($work) && $work->client
                                    ? $work->client->name
                                    : (is_array($work)
                                        ? $work['client'] ?? $cName
                                        : $cName);
                            $wDesc = is_object($work) ? $work->summary ?? $work->description : $work['desc'] ?? '';
                            $wCover = is_object($work) ? $work->cover_image : $work['img'] ?? '';
                            $wImg = $wCover
                                ? (Str::startsWith($wCover, ['http://', 'https://'])
                                    ? $wCover
                                    : asset(ltrim($wCover, '/')))
                                : 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=700&auto=format&fit=crop&q=80';
                        @endphp
                        <a href="{{ route('work.show', $wSlug) }}"
                            class="work-card h-[420px] rounded-none overflow-hidden block relative group reveal">
                            <img src="{{ $wImg }}" alt="{{ $wTitle }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div
                                class="card-overlay absolute inset-0 p-8 flex flex-col justify-end bg-gradient-to-t from-black/90 via-black/40 to-transparent">
                                <div
                                    class="card-arrow absolute top-6 right-6 text-white group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5">
                                        <path d="M7 17L17 7" />
                                        <path d="M7 7h10v10" />
                                    </svg>
                                </div>
                                <p class="font-sans text-gray-300 text-xs mb-1 font-semibold uppercase tracking-wider">
                                    {{ $wClientName }}</p>
                                <h3 class="font-sans text-white font-bold text-2xl mb-2 tracking-tight">{{ $wTitle }}
                                </h3>
                                <p class="font-sans text-gray-300 text-sm leading-relaxed">{{ $wDesc }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="py-12 text-center bg-white border border-gray-200">
                    <p class="font-sans text-gray-500 text-base">Nenhum projeto específico associado a este cliente de
                        momento.</p>
                </div>
            @endif

        </div>
    </section>

    {{-- CTA Section --}}
    <x-cta-section
        title="Procura resultados semelhantes para a sua empresa?"
        subtitle="Fale com a nossa equipa de especialistas e descubra como o Marketing 360° da Xamariz pode impulsionar o seu negócio." />

@endsection
