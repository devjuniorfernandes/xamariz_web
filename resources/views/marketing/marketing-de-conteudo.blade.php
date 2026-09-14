@extends('layouts.app')

@php
    use App\Models\SiteSetting;
    $h1  = SiteSetting::get('cont_hero_title', 'Marketing de Conteúdo');
    $sub = SiteSetting::get('cont_hero_subtitle', 'Atraia clientes criando conteúdo que o seu público valoriza, em vez de depender apenas da prospeção direta.');
@endphp

@section('title', $h1 . ' | Xamariz')
@section('description', $sub)

@section('content')
    @include('marketing._body', [
        'eyebrow'  => 'Marketing de Conteúdo',
        'h1'       => $h1,
        'intro'    => $sub,
        'blocks'   => [
            ['title' => SiteSetting::get('cont_b1_title', 'O que é o Marketing de Conteúdo?'), 'body' => SiteSetting::get('cont_b1_text', 'É uma estratégia de marketing digital baseada na criação e distribuição consistente de conteúdo relevante, que procura atrair e conectar-se com um grupo específico de consumidores e conduzi-los à sua oferta. Os formatos incluem textos, vídeos e fotografia — e o conteúdo deve educar, informar ou entreter.')],
            ['title' => SiteSetting::get('cont_b2_title', 'Conteúdo + SEO, no contexto angolano'), 'body' => SiteSetting::get('cont_b2_text', 'Quando combinado com SEO, o conteúdo passa a ser descoberto através das pesquisas no Google. Em Angola, o crescimento do uso de smartphones e do consumo de conteúdo online torna esta estratégia ainda mais eficaz. A regra é simples: comunique nos canais onde os seus consumidores estão.')],
        ],
        'faq'      => [
            ['q' => SiteSetting::get('cont_faq1_q', 'O que é o marketing de conteúdo?'), 'a' => SiteSetting::get('cont_faq1_a', 'A criação e distribuição consistente de conteúdo relevante para atrair e conectar uma audiência.')],
            ['q' => SiteSetting::get('cont_faq2_q', 'Que formatos posso usar?'), 'a' => SiteSetting::get('cont_faq2_a', 'Textos, vídeos, fotografias e outros.')],
            ['q' => SiteSetting::get('cont_faq3_q', 'Qual a relação com o SEO?'), 'a' => SiteSetting::get('cont_faq3_a', 'Conteúdo otimizado pode ser encontrado através das pesquisas no Google.')],
            ['q' => SiteSetting::get('cont_faq4_q', 'Funciona em Angola?'), 'a' => SiteSetting::get('cont_faq4_a', 'Sim — o uso crescente de smartphones e o consumo digital tornam-no muito eficaz.')],
        ],
        'ctaTitle'    => SiteSetting::get('cont_cta_title', 'Quer preparar o futuro do seu negócio?'),
        'ctaSubtitle' => SiteSetting::get('cont_cta_subtitle', 'Agende um encontro e vamos construir a sua estratégia de Marketing de Conteúdo.'),
    ])
@endsection
