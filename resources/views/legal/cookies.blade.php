@extends('layouts.app')

@section('title', 'Política de Cookies | Xamariz Marketing 360°')
@section('description', 'Informações sobre a utilização de cookies no website da Xamariz.')

@section('content')
<section class="pt-40 pb-24 bg-[var(--color-brand-dark)]">
    <div class="container-myriad">
        <div class="max-w-3xl reveal">
            <div class="divider-line mb-8"></div>
            <h1 class="font-serif text-white font-black mb-6" style="font-size: clamp(2rem, 4vw, 3.5rem); letter-spacing: -0.04em;">Política de Cookies.</h1>
            <p class="font-sans text-white/60 text-lg leading-relaxed">Transparência sobre as tecnologias de navegação e desempenho utilizadas.</p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container-myriad">
        <div class="max-w-3xl font-sans text-gray-700 text-base leading-relaxed space-y-6 reveal">
            @php
                $customCookies = \App\Models\SiteSetting::get('legal_cookies_policy');
            @endphp

            @if($customCookies)
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($customCookies)) !!}
                </div>
            @else
                <p>O website da <strong>Xamariz</strong> utiliza cookies e tecnologias semelhantes para garantir uma experiência de navegação eficiente, rápida e personalizada.</p>

                <h2 class="font-sans font-bold text-gray-900 text-xl tracking-tight mt-8">1. O que são Cookies?</h2>
                <p>Cookies são pequenos ficheiros de texto guardados no seu navegador ou dispositivo quando visita um website. Permitem reconhecer as suas preferências e otimizar o funcionamento da página.</p>

                <h2 class="font-sans font-bold text-gray-900 text-xl tracking-tight mt-8">2. Que Tipos de Cookies Utilizamos?</h2>
                <p><strong>Cookies Essenciais:</strong> Necessários para o funcionamento básico e segurança do website, tais como a navegação e o envio de formulários.</p>
                <p><strong>Cookies de Desempenho e Estatística:</strong> Ajudam-nos a compreender como os visitantes interagem com o site através de dados agregados e anónimos (ex: Google Analytics), permitindo melhorar continuamente os nossos conteúdos.</p>

                <h2 class="font-sans font-bold text-gray-900 text-xl tracking-tight mt-8">3. Como Gerir as Suas Preferências</h2>
                <p>Pode configurar o seu navegador a qualquer momento para recusar todos os cookies ou para alertá-lo quando um cookie estiver a ser enviado. Note que algumas funcionalidades do website podem não operar na totalidade caso desative cookies essenciais.</p>

                <p class="mt-8">Para esclarecimentos adicionais, contacte-nos através do e-mail <a href="mailto:{{ \App\Models\SiteSetting::get('email', 'geral@xamariz.ao') }}" class="text-[var(--color-brand-accent)] font-semibold hover:underline">{{ \App\Models\SiteSetting::get('email', 'geral@xamariz.ao') }}</a>.</p>
            @endif
        </div>
    </div>
</section>

{{-- CTA Section --}}
<x-cta-section />

@endsection
