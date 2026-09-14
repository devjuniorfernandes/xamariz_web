@extends('layouts.app')

@php
    use App\Models\SiteSetting;
    $h1  = SiteSetting::get('md_hero_title', 'Marketing Digital');
    $sub = SiteSetting::get('md_hero_subtitle', 'O conjunto de ações em meios digitais para promover a sua empresa, captar a atenção dos clientes certos e mostrar que a sua oferta resolve os problemas deles.');
@endphp

@section('title', $h1 . ' | Xamariz')
@section('description', $sub)

@section('content')
    @include('marketing._body', [
        'eyebrow'  => 'Marketing Digital',
        'h1'       => $h1,
        'intro'    => $sub,
        'blocks'   => [
            ['title' => SiteSetting::get('md_b1_title', 'O que é o Marketing Digital?'), 'body' => SiteSetting::get('md_b1_text', 'O marketing digital reúne as ações de marketing realizadas em meios digitais para promover empresas, produtos ou serviços. O foco está em captar a atenção de potenciais clientes e demonstrar que a sua oferta é a solução para os problemas deles. Com a estratégia certa, o digital alcança milhares de potenciais clientes, muitas vezes com um investimento inferior ao do marketing tradicional. O princípio é simples: comunique onde está a atenção dos consumidores.')],
            ['title' => SiteSetting::get('md_b2_title', 'O que ganha com o Marketing Digital'), 'body' => SiteSetting::get('md_b2_text', "Uma estratégia bem definida permite atrair a atenção de potenciais clientes, aumentar a visibilidade e as interações, criar relacionamentos e fidelidade, destacar-se da concorrência e procurar um maior retorno do investimento (ROI).\nOs principais tipos incluem Marketing de Conteúdo, Search Engine Marketing (com SEO, PPC e remarketing), E-mail Marketing, Redes Sociais, Mobile, Afiliados, Influência e Realidade Virtual.")],
        ],
        'faq'      => [
            ['q' => SiteSetting::get('md_faq1_q', 'Quais são os principais tipos de marketing digital?'), 'a' => SiteSetting::get('md_faq1_a', 'Marketing de Conteúdo, Search Engine Marketing, E-mail Marketing, Redes Sociais, Mobile, Afiliados, Influência e Realidade Virtual.')],
            ['q' => SiteSetting::get('md_faq2_q', 'O SEO faz parte do marketing digital?'), 'a' => SiteSetting::get('md_faq2_a', 'Sim. O SEO integra o Search Engine Marketing, a par do pay-per-click (PPC) e do remarketing.')],
            ['q' => SiteSetting::get('md_faq3_q', 'Qual é o objetivo do marketing digital?'), 'a' => SiteSetting::get('md_faq3_a', 'Promover a sua oferta, captar a atenção dos clientes certos e contribuir para o crescimento do negócio.')],
            ['q' => SiteSetting::get('md_faq4_q', ''), 'a' => SiteSetting::get('md_faq4_a', '')],
        ],
        'ctaTitle'    => SiteSetting::get('md_cta_title', 'Pronto para crescer no digital?'),
        'ctaSubtitle' => SiteSetting::get('md_cta_subtitle', 'Agende um encontro e vamos definir a estratégia de Marketing Digital ideal para a sua empresa.'),
    ])
@endsection
