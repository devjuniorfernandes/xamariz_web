@extends('layouts.app')

@php
    use App\Models\SiteSetting;
    $h1  = SiteSetting::get('dif_hero_title', 'Marketing de Diferenciação');
    $sub = SiteSetting::get('dif_hero_subtitle', 'Num mercado onde tantas empresas parecem cópias umas das outras, a diferenciação é o que faz a sua marca ser reconhecida e escolhida.');
@endphp

@section('title', $h1 . ' | Xamariz')
@section('description', $sub)

@section('content')
    @include('marketing._body', [
        'eyebrow'  => 'Marketing de Diferenciação',
        'h1'       => $h1,
        'intro'    => $sub,
        'blocks'   => [
            ['title' => SiteSetting::get('dif_b1_title', 'O que é o Marketing de Diferenciação?'), 'body' => SiteSetting::get('dif_b1_text', 'É o conjunto de estratégias de comunicação que torna a sua empresa reconhecida pelas suas particularidades e pela forma diferente como resolve os problemas do mercado. O diferencial pode estar na unicidade dos produtos e serviços, na originalidade do atendimento ou em qualquer outro aspeto do negócio. Muitas empresas têm vantagens competitivas reais — mas não as reconhecem, nem as comunicam.')],
            ['title' => SiteSetting::get('dif_b2_title', 'Porque é importante diferenciar-se'), 'body' => SiteSetting::get('dif_b2_text', "Os consumidores estão cansados de marcas que parecem todas iguais e procuram empresas originais, com soluções diferentes.\nAjudamos a sua empresa a definir e comunicar o seu diferencial, a atrair e fidelizar o público-alvo e a destacar-se claramente da concorrência.")],
        ],
        'faq'      => [
            ['q' => SiteSetting::get('dif_faq1_q', 'O que é o Marketing de Diferenciação?'), 'a' => SiteSetting::get('dif_faq1_a', 'Uma abordagem de comunicação focada em tornar clara a particularidade que distingue a sua empresa.')],
            ['q' => SiteSetting::get('dif_faq2_q', 'Para que serve?'), 'a' => SiteSetting::get('dif_faq2_a', 'Para comunicar as suas vantagens competitivas e fortalecer o posicionamento da marca.')],
            ['q' => SiteSetting::get('dif_faq3_q', 'Onde pode estar o meu diferencial?'), 'a' => SiteSetting::get('dif_faq3_a', 'No produto, no serviço, no atendimento, na experiência ou noutros aspetos específicos do negócio.')],
            ['q' => SiteSetting::get('dif_faq4_q', ''), 'a' => SiteSetting::get('dif_faq4_a', '')],
        ],
        'ctaTitle'    => SiteSetting::get('dif_cta_title', 'Pronto para destacar a sua marca?'),
        'ctaSubtitle' => SiteSetting::get('dif_cta_subtitle', 'Agende um encontro e vamos definir a estratégia de Marketing de Diferenciação certa para o seu crescimento.'),
    ])
@endsection
