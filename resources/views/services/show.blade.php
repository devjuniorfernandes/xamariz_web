@extends('layouts.app')

@php
    $srvTitle = is_object($service) ? $service->title : 'Estratégia & Marketing 360°';
    $srvTagline = is_object($service)
        ? $service->tagline ?? $service->short_description
        : 'Transformamos mensagens corporativas complexas em posicionamentos claros e líderes no mercado.';
    $srvDesc = is_object($service)
        ? $service->full_description ?? $service->short_description
        : 'O Marketing 360° da Xamariz conecta todos os pontos de contacto da sua empresa ao seu público-alvo em Angola e no mercado internacional.';
    $slug = is_object($service) ? $service->slug : null;

    $imgPath = is_object($service) ? $service->image_path : null;
    $serviceImages = [
        'estrategia-comunicacao' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1800&auto=format&fit=crop&q=80',
        'websites-plataformas-digitais-seo' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1800&auto=format&fit=crop&q=80',
        'conteudo-redes-sociais' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1800&auto=format&fit=crop&q=80',
        'audiovisual' => 'https://images.unsplash.com/photo-1492619375914-88005aa9e8fb?w=1800&auto=format&fit=crop&q=80',
        'performance-digital' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1800&auto=format&fit=crop&q=80',
    ];
    $srvImage = $imgPath
        ? (Str::startsWith($imgPath, 'http')
            ? $imgPath
            : asset($imgPath))
        : ($serviceImages[$slug] ?? $serviceImages['estrategia-comunicacao']);

    $para1 = is_object($service) ? $service->strategic_value_para1 : null;
    $para2 = is_object($service) ? $service->strategic_value_para2 : null;
    $quoteText = is_object($service) ? $service->quote : null;

    $deliverablesList =
        is_object($service) && !empty($service->deliverables)
            ? $service->deliverables
            : [
                [
                    'title' => 'Consultoria Estratégica 360°',
                    'desc' =>
                        'Diagnóstico profundo de posicionamento, concorrência e identificação de oportunidades de diferenciação.',
                ],
                [
                    'title' => 'Planos de Comunicação Integrada',
                    'desc' =>
                        'Roteiros estratégicos detalhados com cronogramas, matriz de canais e definição de KPIs comerciais.',
                ],
                [
                    'title' => 'Pesquisa & Inteligência de Mercado',
                    'desc' =>
                        'Estudo comportamental de consumidores e partes interessadas para orientar tomadas de decisão.',
                ],
                [
                    'title' => 'Gestão de Reputação Corporativa',
                    'desc' =>
                        'Estratégias de blindagem da imagem da empresa perante parceiros, investidores e órgãos reguladores.',
                ],
                [
                    'title' => 'Mensagem de Marca & Storytelling',
                    'desc' =>
                        'Desenvolvimento de narrativas convincentes que geram ligação emocional e autoridade imediata.',
                ],
                [
                    'title' => 'Otimização de ROI & Performance',
                    'desc' =>
                        'Acompanhamento rigoroso de dados estratégicos e relatórios periódicos de crescimento comercial.',
                ],
            ];

    $methodologyList =
        is_object($service) && !empty($service->methodology)
            ? $service->methodology
            : [
                [
                    'step' => '01',
                    'title' => 'Diagnóstico & Imersão',
                    'desc' =>
                        'Estudamos profundamente o seu negócio, concorrentes e público-alvo para mapear oportunidades reais.',
                ],
                [
                    'step' => '02',
                    'title' => 'Estratégia & Conceito',
                    'desc' =>
                        'Desenvolvemos o plano de ação com metas claras, mensagens de impacto e cronograma de execução.',
                ],
                [
                    'step' => '03',
                    'title' => 'Produção & Implementação',
                    'desc' =>
                        'Criamos e lançamos as peças publicitárias, plataformas web, vídeos ou campanhas com excelência.',
                ],
                [
                    'step' => '04',
                    'title' => 'Análise de ROI & Otimização',
                    'desc' =>
                        'Monitorizamos o desempenho em tempo real, ajustando métricas para maximizar a conversão.',
                ],
            ];

    $metricsList =
        is_object($service) && !empty($service->metrics)
            ? $service->metrics
            : [
                ['value' => '+350%', 'label' => 'Aumento de Alcance Relevante'],
                ['value' => '98%', 'label' => 'Taxa de Retenção de Clientes'],
                ['value' => '100%', 'label' => 'Alinhamento com Objetivos de ROI'],
            ];
@endphp

@section('title', (is_object($service) && $service->meta_title ? $service->meta_title : $srvTitle . ' | Xamariz Marketing 360°'))
@section('description', (is_object($service) && $service->meta_description ? $service->meta_description : Str::limit(strip_tags($srvDesc), 160)))
@section('og_image', $srvImage)

@push('schema')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => $srvTitle,
    'provider' => [
        '@type' => 'AdvertisingAgency',
        'name' => 'Xamariz'
    ],
    'description' => (is_object($service) && $service->meta_description ? $service->meta_description : Str::limit(strip_tags($srvDesc), 160)),
    'image' => $srvImage
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush

@section('content')

    {{-- Hero Section --}}
    <section class="pt-40 pb-20 bg-white text-gray-900 border-b border-gray-100">
        <div class="container-myriad">
            {{-- Breadcrumb --}}
            <div class="reveal flex items-center gap-3 text-xs uppercase font-sans tracking-widest mb-6 sm:mb-8">
                <a href="{{ route('services.index') }}"
                    class="text-gray-600 hover:text-gray-900 transition-colors">Serviços</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400 truncate max-w-xs sm:max-w-md">{{ $srvTitle }}</span>
            </div>

            <div class="max-w-4xl reveal">
                <h1
                    class="font-sans text-4xl sm:text-6xl md:text-7xl font-bold text-gray-900 tracking-tight leading-[1.1] mb-6">
                    {{ $srvTitle }}.
                </h1>
                @if ($srvTagline)
                    <p
                        class="font-sans text-xl sm:text-2xl font-semibold text-[var(--color-brand-accent)] leading-relaxed mb-6">
                        {{ $srvTagline }}
                    </p>
                @endif
                <p class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed max-w-3xl">
                    {{ $srvDesc }}
                </p>
            </div>
        </div>
    </section>

    {{-- Featured Full-Width Editorial Photo --}}
    <section class="bg-white py-12">
        <div class="container-myriad">
            <div class="aspect-[21/9] overflow-hidden rounded-none reveal border border-gray-200">
                <img src="{{ $srvImage }}" alt="{{ $srvTitle }} Xamariz"
                    class="w-full h-full object-cover hover:scale-[1.02] transition-transform duration-1000">
            </div>
        </div>
    </section>

    {{-- Section: Valor Estratégico --}}
    @if ($para1 || $para2 || $quoteText)
        <section class="py-20 bg-white border-t border-gray-100">
            <div class="container-myriad">
                <div class="max-w reveal space-y-8">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                        <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700">VALOR
                            ESTRATÉGICO</span>
                    </div>

                    <h2 class="font-sans text-3xl sm:text-5xl font-bold text-gray-900 tracking-tight leading-tight">
                        Como este serviço transforma a sua empresa.
                    </h2>

                    {{-- 2 Parágrafos de Descrição do Serviço --}}
                    <div class="space-y-6 text-gray-700 text-base sm:text-lg leading-relaxed font-normal">
                        @if ($para1)
                            <p>{{ $para1 }}</p>
                        @endif
                        @if ($para2)
                            <p>{{ $para2 }}</p>
                        @endif
                    </div>

                    {{-- Caixa de Citação --}}
                    @if ($quoteText)
                        <div
                            class="p-8 border-l-4 border-[var(--color-brand-accent)] bg-gray-50 text-gray-900 rounded-none mt-8">
                            <p class="font-sans text-lg sm:text-xl font-semibold italic leading-relaxed">
                                "{{ $quoteText }}"
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Key Deliverables Grid --}}
    @if (!empty($deliverablesList))
        <section class="py-24 bg-gray-50 border-t border-b border-gray-200">
            <div class="container-myriad">

                <div class="reveal max-w-3xl mb-16">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                        <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700">O QUE
                            ENTREGAMOS</span>
                    </div>
                    <h2 class="font-sans text-3xl sm:text-5xl font-bold text-gray-900 tracking-tight">
                        Entregáveis & Soluções Incluídas.
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal">
                    @foreach ($deliverablesList as $index => $item)
                        <div
                            class="p-8 bg-white border border-gray-200 rounded-none hover:border-[var(--color-brand-accent)] transition-all duration-300 group flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between mb-6">
                                    <span
                                        class="font-mono text-xs font-bold text-[var(--color-brand-accent)]">0{{ $index + 1 }}</span>
                                    <span class="w-2 h-2 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                                </div>
                                <h3
                                    class="font-sans text-xl font-bold text-gray-900 mb-3 tracking-tight group-hover:text-[var(--color-brand-accent)] transition-colors">
                                    {{ $item['title'] ?? '' }}
                                </h3>
                                <p class="font-sans text-gray-600 text-sm leading-relaxed">
                                    {{ $item['desc'] ?? '' }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

    {{-- Process Steps --}}
    @if (!empty($methodologyList))
        <section class="py-24 bg-white">
            <div class="container-myriad">

                <div class="reveal max-w-3xl mb-16">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                        <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700">METODOLOGIA
                            XAMARIZ</span>
                    </div>
                    <h2 class="font-sans text-3xl sm:text-5xl font-bold text-gray-900 tracking-tight">
                        Como executamos com precisão.
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 reveal">
                    @foreach ($methodologyList as $index => $process)
                        <div
                            class="p-8 border-l-2 border-gray-200 hover:border-[var(--color-brand-accent)] transition-colors duration-300">
                            <span
                                class="font-mono text-xs font-bold text-[var(--color-brand-accent)] tracking-widest block mb-3">PASSO
                                {{ $process['step'] ?? '0' . ($index + 1) }}</span>
                            <h3 class="font-sans text-lg font-bold text-gray-900 mb-2 tracking-tight">
                                {{ $process['title'] ?? '' }}</h3>
                            <p class="font-sans text-gray-600 text-sm leading-relaxed">{{ $process['desc'] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

    {{-- Key Metrics Impact --}}
    @if (!empty($metricsList))
        <section class="py-20 bg-gray-900 text-white">
            <div class="container-myriad">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center reveal">
                    @foreach ($metricsList as $metric)
                        <div class="space-y-2">
                            <span
                                class="font-sans text-4xl sm:text-6xl font-bold text-[var(--color-brand-accent)] tracking-tight block">{{ $metric['value'] ?? '' }}</span>
                            <span
                                class="font-sans text-xs font-bold uppercase tracking-widest text-gray-400 block">{{ $metric['label'] ?? '' }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Other Services Navigation --}}
    @if (isset($allServices) && $allServices->count() > 1)
        <section class="py-24 bg-white border-t border-gray-200">
            <div class="container-myriad">
                <div class="reveal flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-12">
                    <div>
                        <div class="flex items-center gap-2 mb-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                            <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700">EXPLORAR
                                MAIS</span>
                        </div>
                        <h2 class="font-sans text-3xl sm:text-5xl font-bold text-gray-900 tracking-tight">
                            Outros Serviços 360°
                        </h2>
                    </div>
                    <a href="{{ route('services.index') }}"
                        class="font-sans text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] hover:underline">
                        VER TODOS OS SERVIÇOS →
                    </a>
                </div>

                <div class="space-y-6 reveal">
                    @foreach ($allServices as $otherService)
                        @if (is_object($service) ? $otherService->id !== $service->id : $otherService->slug !== $slug)
                            <div
                                class="p-8 sm:p-10 border border-gray-200 bg-gray-50/50 hover:bg-gray-50 transition-colors rounded-none">
                                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8">
                                    <div class="space-y-4 max-w-3xl">
                                        <div class="flex items-center gap-3">
                                            <span
                                                class="font-mono text-xs font-bold text-[var(--color-brand-accent)] uppercase tracking-widest">{{ $otherService->number_code }}</span>
                                            <span class="w-1.5 h-1.5 bg-gray-300 inline-block rounded-none"></span>
                                            <span
                                                class="font-sans text-xs font-bold text-gray-500 uppercase tracking-wider">SERVIÇO
                                                ESPECIALIZADO</span>
                                        </div>
                                        <h3 class="font-sans text-2xl sm:text-4xl font-bold text-gray-900 tracking-tight">
                                            {{ $otherService->title }}
                                        </h3>
                                        <p class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed">
                                            {{ $otherService->short_description ?? $otherService->full_description }}
                                        </p>

                                        {{-- Key deliverables list --}}
                                        @if (!empty($otherService->deliverables))
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 pt-2">
                                                @foreach (array_slice($otherService->deliverables, 0, 4) as $item)
                                                    <div
                                                        class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                                                        <span
                                                            class="w-1.5 h-1.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                                                        <span>{{ $item['title'] ?? '' }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <a href="{{ route('services.show', $otherService->slug) }}"
                                        class="inline-flex items-center gap-3 px-7 py-3.5 rounded-full border border-gray-900 text-gray-900 hover:border-[var(--color-brand-accent)] hover:text-[var(--color-brand-accent)] text-xs font-semibold uppercase tracking-wider transition-all shrink-0 self-start lg:self-center group">
                                        <span>EXPLORAR SERVIÇO</span>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="text-[var(--color-brand-accent)] group-hover:translate-x-1 transition-transform">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <x-cta-section
        title="Transforme a sua mensagem em liderança de mercado."
        subtitle="Fale com a nossa equipa de especialistas e descubra a melhor estratégia para o seu negócio." />

@endsection
