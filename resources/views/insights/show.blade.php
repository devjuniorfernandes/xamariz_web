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
        'intro' => 'Estratégias de diferenciação e posicionamento comercial para empresas que pretendem dominar o mercado angolano e internacional.',
        'quote' => 'Comunicação clara e estratégica é a chave para o sucesso comercial contínuo.',
    ];
@endphp

@section('title', $article['title'] . ' | Insights Xamariz')
@section('description', $article['intro'])

@section('content')

{{-- Header --}}
<section class="pt-40 pb-16 bg-[var(--color-brand-dark)] text-white">
    <div class="container-myriad">
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-3 text-xs uppercase font-sans tracking-widest mb-8">
            <a href="{{ route('insights.index') }}" class="text-white/60 hover:text-[var(--color-brand-accent)] transition-colors">Insights</a>
            <span class="text-white/30">/</span>
            <span class="text-white/40 truncate max-w-xs">{{ $article['title'] }}</span>
        </div>

        <div class="max-w-3xl">
            <h1 class="font-sans text-3xl sm:text-5xl font-bold text-white mb-6 tracking-tight leading-[1.12]">
                {{ $article['title'] }}
            </h1>
            <div class="flex items-center gap-4 text-white/50 text-xs font-sans uppercase tracking-wider">
                <time>{{ $article['date'] }}</time>
                <span>•</span>
                <span>{{ $article['read_time'] }}</span>
            </div>
        </div>
    </div>
</section>

{{-- Hero Image --}}
<div class="bg-[var(--color-brand-dark)] pb-12">
    <div class="container-myriad">
        <div class="aspect-[21/9] overflow-hidden rounded-none">
            <img
                src="{{ $article['hero_img'] }}"
                alt="{{ $article['title'] }}"
                class="w-full h-full object-cover"
            >
        </div>
    </div>
</div>

{{-- Article Body --}}
<article class="py-20 bg-white text-gray-900">
    <div class="container-myriad">
        <div class="max-w-3xl mx-auto">
            <p class="font-sans text-gray-900 font-medium text-xl sm:text-2xl leading-relaxed mb-10 reveal tracking-tight">
                {{ $article['intro'] }}
            </p>
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
            @foreach ([
                ['slug' => 'greenwashing-how-to-avoid',  'date' => 'Julho 2026', 'title' => 'Construir marcas fortes que resistem às mudanças de mercado e geram valor'],
                ['slug' => 'deep-tech-communication',    'date' => 'Junho 2026', 'title' => 'Desmistificar o tráfego pago e o SEO para gerar leads qualificadas'],
            ] as $related)
                <a href="{{ route('insights.show', $related['slug']) }}" class="block p-8 border border-gray-200 bg-white hover:border-[var(--color-brand-accent)] group transition-all duration-300 rounded-none hover:shadow-md">
                    <span class="font-sans text-xs font-semibold text-[var(--color-brand-accent)] uppercase tracking-wider mb-2 block">{{ $related['date'] }}</span>
                    <h4 class="font-sans text-xl font-bold text-gray-900 group-hover:text-[var(--color-brand-accent)] transition-colors leading-snug">
                        {{ $related['title'] }}
                    </h4>
                </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
