@extends('layouts.app')

@php
    use App\Models\SiteSetting;
    $h1  = SiteSetting::get('seo_hero_title', 'SEO — Search Engine Optimization');
    $sub = SiteSetting::get('seo_hero_subtitle', 'Otimize o seu website para aparecer em destaque nos motores de pesquisa e ser encontrado por quem procura aquilo que oferece.');
@endphp

@section('title', $h1 . ' | Xamariz')
@section('description', $sub)

@section('content')
    @include('marketing._body', [
        'eyebrow'  => 'SEO',
        'h1'       => $h1,
        'intro'    => $sub,
        'blocks'   => [
            ['title' => SiteSetting::get('seo_b1_title', 'O que é o SEO?'), 'body' => SiteSetting::get('seo_b1_text', 'SEO (Search Engine Optimization) é o conjunto de atividades que usa análise digital e marketing para melhorar a sua presença online. O foco está em otimizar o website para obter destaque nos resultados dos motores de pesquisa como o Google, o Bing e o Yahoo. Ter um website não basta se ninguém o encontra online.')],
            ['title' => SiteSetting::get('seo_b2_title', 'Porque é que o SEO é importante'), 'body' => SiteSetting::get('seo_b2_text', 'A otimização aumenta a probabilidade de o seu negócio aparecer quando alguém pesquisa temas relacionados com a sua oferta. Assim, melhora a presença online, aumenta a visibilidade nas pesquisas e facilita a descoberta da sua empresa pelas pessoas certas.')],
        ],
        'faq'      => [
            ['q' => SiteSetting::get('seo_faq1_q', 'O que é o SEO?'), 'a' => SiteSetting::get('seo_faq1_a', 'A otimização de websites para melhorar a presença e a visibilidade nos resultados de pesquisa.')],
            ['q' => SiteSetting::get('seo_faq2_q', 'Porque é importante?'), 'a' => SiteSetting::get('seo_faq2_a', 'Porque um website pode existir sem ser encontrado pelos potenciais clientes.')],
            ['q' => SiteSetting::get('seo_faq3_q', 'Que motores de pesquisa?'), 'a' => SiteSetting::get('seo_faq3_a', 'Google, Bing e Yahoo.')],
            ['q' => SiteSetting::get('seo_faq4_q', 'O SEO garante o primeiro lugar?'), 'a' => SiteSetting::get('seo_faq4_a', 'Não. Trabalhamos por destaque e melhores posições — não prometemos a primeira posição garantida.')],
        ],
        'ctaTitle'    => SiteSetting::get('seo_cta_title', 'Quer ser encontrado no Google?'),
        'ctaSubtitle' => SiteSetting::get('seo_cta_subtitle', 'Agende um encontro e vamos definir a sua estratégia de SEO para fomentar o crescimento.'),
    ])
@endsection
