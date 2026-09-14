@extends('layouts.app')

@php
    $articlesData = [
        'stakeholder-communication-2026' => [
            'title' => 'Como a comunicação transparente é a chave para a diferenciação no mercado angolano',
            'date' => 'Agosto 2026',
            'read_time' => '7 min de leitura',
            'hero_img' => 'https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?w=1800&auto=format&fit=crop&q=80',
            'intro' => 'Num ambiente empresarial em constante evolução, o desafio técnico de operacionalizar um negócio é apenas metade da equação. A eficácia da comunicação determina quem lidera o mercado.',
            'quote' => 'Ser compreendido é uma vantagem comercial decisiva. Quanto mais clara for a comunicação, mais fácil se torna conquistar a confiança dos parceiros e acelerar vendas.',
        ],
        'greenwashing-how-to-avoid' => [
            'title' => 'Construir marcas fortes que resistem às mudanças de mercado e geram valor',
            'date' => 'Julho 2026',
            'read_time' => '5 min de leitura',
            'hero_img' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?w=1800&auto=format&fit=crop&q=80',
            'intro' => 'Com a crescente exigência dos consumidores e investidores, a fasquia para uma comunicação de sustentabilidade e responsabilidade corporativa autêntica nunca esteve tão alta.',
            'quote' => 'Marcas genuínas constroem reputação com ações tangíveis e estratégias de comunicação que passam no teste do rigor e da transparência.',
        ],
        'deep-tech-communication' => [
            'title' => 'Desmistificar o tráfego pago e o SEO para gerar leads qualificadas',
            'date' => 'Junho 2026',
            'read_time' => '6 min de leitura',
            'hero_img' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=1800&auto=format&fit=crop&q=80',
            'intro' => 'Quando uma empresa oferece soluções complexas ou tecnologia inovadora, não pode depender de chavões genéricos. É preciso construir entendimento desde a raiz.',
            'quote' => 'Simplificar a tecnologia sem perder a profundidade é a ponte de ouro entre a inovação técnica e a decisão de compra do cliente.',
        ],
        'infrastructure-storytelling' => [
            'title' => 'O impacto do vídeo institucional e spots publicitários na decisão de compra',
            'date' => 'Maio 2026',
            'read_time' => '8 min de leitura',
            'hero_img' => 'https://images.unsplash.com/photo-1474487548417-781cb71495f3?w=1800&auto=format&fit=crop&q=80',
            'intro' => 'Grandes infraestruturas e projetos corporativos exigem uma narrativa visual à altura da sua dimensão para envolver investidores e a opinião pública.',
            'quote' => 'Uma boa produção audiovisual faz com que projetos complexos ganhem vida e relevância emocional para o público decisor.',
        ],
        'investor-communications-complex' => [
            'title' => 'O que o mercado angolano ensina sobre retorno do investimento em publicidade',
            'date' => 'Abril 2026',
            'read_time' => '6 min de leitura',
            'hero_img' => 'https://images.unsplash.com/photo-1590859808308-3d2d9c515b1a?w=1800&auto=format&fit=crop&q=80',
            'intro' => 'Os mercados de capital e os clientes corporativos recompensam a clareza. Dados estratégicos e métricas bem comunicadas reduzem a fricção de vendas.',
            'quote' => 'Métricas transparentes e dados orientados a ROI transformam o investimento em marketing de uma despesa num motor de crescimento previsível.',
        ],
    ];

    $article = $articlesData[$slug] ?? [
        'title' => 'Análise Estratégica de Comunicação & Marketing 360°',
        'date' => 'Agosto 2026',
        'read_time' => '5 min de leitura',
        'hero_img' => 'https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?w=1800&auto=format&fit=crop&q=80',
        'quote' => 'Comunicação clara e estratégica é a chave para o sucesso comercial contínuo.',
    ];

    $postObj = $insight ?? ($post ?? null);
    $hasPost = is_object($postObj) && $postObj->exists;

    // ── Variáveis unificadas: preferem sempre o Post real da BD ──
    $title = $hasPost ? $postObj->title : $article['title'];

    $dateLabel = $hasPost && $postObj->published_at
        ? $postObj->published_at->locale('pt')->isoFormat('LL')
        : ($article['date'] ?? null);

    // Tempo de leitura calculado a partir do corpo real (~200 palavras/min).
    if ($hasPost && $postObj->content) {
        $words = str_word_count(strip_tags($postObj->content));
        $readTime = max(1, (int) round($words / 200)) . ' min de leitura';
    } else {
        $readTime = $article['read_time'] ?? '5 min de leitura';
    }

    $categoryLabel = $hasPost && $postObj->category ? $postObj->category : 'Insights';

    // Imagem de capa: cover_image real (URL absoluta ou asset) → fallback demo/Unsplash.
    if ($hasPost && $postObj->cover_image) {
        $heroImg = Str::startsWith($postObj->cover_image, ['http://', 'https://'])
            ? $postObj->cover_image
            : asset(ltrim($postObj->cover_image, '/'));
    } else {
        $heroImg = !empty($article['hero_img'])
            ? (Str::startsWith($article['hero_img'], ['http://', 'https://']) ? $article['hero_img'] : asset($article['hero_img']))
            : \App\Models\SiteSetting::get('seo_og_image_default');
    }

    $intro   = $hasPost ? ($postObj->summary ?: null) : ($article['intro'] ?? null);
    $bodyHtml = $hasPost ? $postObj->content : null;

    $finalPostTitle = $hasPost && $postObj->meta_title ? $postObj->meta_title : $title . ' | Insights Xamariz';
    $finalPostDesc  = $hasPost && $postObj->meta_description ? $postObj->meta_description : ($intro ?: $article['intro'] ?? '');
    $finalPostImg   = $heroImg;

    // Artigos relacionados (reais); fallback para os demonstrativos.
    $relatedPosts = $hasPost
        ? \App\Models\Post::where('status', 'published')->where('id', '!=', $postObj->id)->latest('published_at')->take(2)->get()
        : collect();
@endphp

@section('title', $finalPostTitle)
@section('description', $finalPostDesc)
@section('og_image', $finalPostImg)
@section('og_type', 'article')

@push('head')
<style>
    .post-content h2 { font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 700; letter-spacing: -0.02em; color: #111827; margin: 2.5rem 0 1rem; line-height: 1.2; }
    .post-content h3 { font-size: 1.25rem; font-weight: 700; color: #111827; margin: 2rem 0 0.75rem; }
    .post-content p { margin-bottom: 1.25rem; }
    .post-content ul, .post-content ol { margin: 0 0 1.5rem 1.25rem; list-style-position: outside; }
    .post-content ul { list-style: disc; }
    .post-content ol { list-style: decimal; }
    .post-content li { margin-bottom: 0.5rem; padding-left: 0.25rem; }
    .post-content a { color: var(--color-brand-accent); text-decoration: underline; }
    .post-content strong { color: #111827; font-weight: 700; }
    .post-content blockquote { border-left: 4px solid var(--color-brand-accent); background: #f9fafb; padding: 2rem; margin: 2.5rem 0; font-style: italic; color: #111827; font-weight: 600; font-size: 1.25rem; line-height: 1.6; }
</style>
@endpush

@push('schema')
<script type="application/ld+json">
{!! json_encode(array_filter([
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => $title,
    'description' => $finalPostDesc,
    'image' => $finalPostImg,
    'datePublished' => $hasPost && $postObj->published_at ? $postObj->published_at->toIso8601String() : null,
    'dateModified' => $hasPost && $postObj->updated_at ? $postObj->updated_at->toIso8601String() : null,
    'author' => [
        '@type' => 'Organization',
        'name' => $hasPost && $postObj->author ? $postObj->author->name : 'Xamariz',
    ],
    'publisher' => [
        '@type' => 'AdvertisingAgency',
        'name' => 'Xamariz',
        'logo' => [
            '@type' => 'ImageObject',
            'url' => asset('logo_xamariz.svg')
        ]
    ],
    'mainEntityOfPage' => [
        '@type' => 'WebPage',
        '@id' => url()->current()
    ]
]), JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Início', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Artigos', 'item' => route('insights.index')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $title, 'item' => url()->current()],
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush

@section('content')

{{-- Header --}}
<section class="pt-40 pb-16 bg-white text-gray-900 border-b border-gray-100">
    <div class="container-myriad">
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-3 text-xs uppercase font-sans tracking-widest mb-8">
            <a href="{{ route('insights.index') }}" class="text-gray-500 hover:text-[var(--color-brand-accent)] transition-colors">Artigos</a>
            <span class="text-gray-300">/</span>
            <span class="text-gray-500">{{ $categoryLabel }}</span>
            <span class="text-gray-300">/</span>
            <span class="text-gray-400 truncate max-w-xs">{{ $title }}</span>
        </div>

        <div class="max-w-3xl">
            <h1 class="font-sans text-3xl sm:text-5xl font-bold text-gray-900 mb-6 tracking-tight leading-[1.12]">
                {{ $title }}
            </h1>
            <div class="flex items-center gap-4 text-gray-500 text-xs font-sans uppercase tracking-wider">
                @if($dateLabel)<time>{{ $dateLabel }}</time><span>•</span>@endif
                <span>{{ $readTime }}</span>
            </div>
        </div>
    </div>
</section>

{{-- Hero Image --}}
<div class="bg-white pb-12">
    <div class="container-myriad">
        <div class="aspect-[21/9] overflow-hidden rounded-none">
            <img
                src="{{ $heroImg }}"
                alt="{{ $title }}"
                class="w-full h-full object-cover"
            >
        </div>
    </div>
</div>

{{-- Article Body --}}
<article class="py-20 bg-white text-gray-900">
    <div class="container-myriad">
        <div class="max-w-3xl mx-auto">
            @if($intro)
                <p class="font-sans text-gray-900 font-medium text-xl sm:text-2xl leading-relaxed mb-10 reveal tracking-tight">
                    {{ $intro }}
                </p>
            @endif

            @if($bodyHtml)
                {{-- Corpo real do artigo (HTML gerido no CMS) --}}
                <div class="post-content font-sans text-gray-600 text-base sm:text-lg leading-relaxed space-y-6 reveal">
                    {!! $bodyHtml !!}
                </div>
            @else
                {{-- Fallback demonstrativo (quando o artigo ainda não tem corpo na BD) --}}
                <div class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed space-y-8 reveal">
                    <p>
                        Num mercado dinâmico e ruidoso como o de Angola e os mercados globais, atrair a atenção do cliente e garantir a preferência comercial exige uma abordagem focada em clareza, relevância e consistência.
                    </p>
                    <p>
                        As empresas líderes não veem a publicidade apenas como a criação de anúncios, mas como a construção contínua de um ecossistema de confiança. Desde o posicionamento de marca (Branding) ao desenvolvimento web e produção audiovisual, cada ponto de contacto deve transmitir o valor real da empresa.
                    </p>

                    <blockquote class="border-l-4 border-[var(--color-brand-accent)] bg-gray-50 p-8 my-10 rounded-none">
                        <p class="font-sans text-gray-900 font-semibold text-xl leading-relaxed italic mb-2">
                            "{{ $article['quote'] }}"
                        </p>
                        <cite class="font-sans text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] not-italic">— Xamariz Marketing 360°</cite>
                    </blockquote>

                    <p>
                        A integração de estratégias de tráfego pago, otimização SEO e produção de conteúdos de alta definição permite que a mensagem alcance exatamente os decisores no momento em que procuram soluções.
                    </p>
                    <p>
                        Projetos com estratégias de comunicação bem estruturadas convertem mais leads, reduzem o ciclo de vendas e consolidam uma posição de liderança inquestionável no seu setor.
                    </p>
                </div>
            @endif
        </div>
    </div>
</article>

{{-- Related Insights --}}
<section class="py-20 bg-gray-50 border-t border-gray-200">
    <div class="container-myriad">
        <div class="flex items-center justify-between mb-12 reveal">
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                <h3 class="font-sans text-2xl font-bold text-gray-900 tracking-tight">Mais artigos e análises</h3>
            </div>
            <a href="{{ route('insights.index') }}" class="font-sans text-xs font-bold uppercase tracking-wider text-[var(--color-brand-accent)] hover:underline">
                Ver todos os artigos →
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 reveal delay-100">
            @if($relatedPosts->count() > 0)
                @foreach ($relatedPosts as $related)
                    <a href="{{ $related->url }}" class="block p-8 border border-gray-200 bg-white hover:border-[var(--color-brand-accent)] group transition-all duration-300 rounded-none hover:shadow-md">
                        <span class="font-sans text-xs font-semibold text-[var(--color-brand-accent)] uppercase tracking-wider mb-2 block">
                            {{ $related->published_at ? $related->published_at->locale('pt')->isoFormat('LL') : $related->category }}
                        </span>
                        <h4 class="font-sans text-xl font-bold text-gray-900 group-hover:text-[var(--color-brand-accent)] transition-colors leading-snug">
                            {{ $related->title }}
                        </h4>
                    </a>
                @endforeach
            @else
                @foreach ([
                    ['slug' => 'greenwashing-how-to-avoid',  'date' => 'Julho 2026', 'title' => 'Construir marcas fortes que resistem às mudanças de mercado e geram valor'],
                    ['slug' => 'deep-tech-communication',    'date' => 'Junho 2026', 'title' => 'Desmistificar o tráfego pago e o SEO para gerar leads qualificadas'],
                ] as $related)
                    <a href="{{ route('insights.show', ['category' => 'geral', 'slug' => $related['slug']]) }}" class="block p-8 border border-gray-200 bg-white hover:border-[var(--color-brand-accent)] group transition-all duration-300 rounded-none hover:shadow-md">
                        <span class="font-sans text-xs font-semibold text-[var(--color-brand-accent)] uppercase tracking-wider mb-2 block">{{ $related['date'] }}</span>
                        <h4 class="font-sans text-xl font-bold text-gray-900 group-hover:text-[var(--color-brand-accent)] transition-colors leading-snug">
                            {{ $related['title'] }}
                        </h4>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</section>

{{-- CTA Section --}}
<x-cta-section />

@endsection
