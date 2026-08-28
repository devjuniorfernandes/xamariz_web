@extends('layouts.app')

@section('title', 'Política de Privacidade | Xamariz Marketing 360°')
@section('description', 'Política de privacidade e proteção de dados da Xamariz (Visualclick, Lda).')

@section('content')
<section class="pt-40 pb-24 bg-[var(--color-brand-dark)]">
    <div class="container-myriad">
        <div class="max-w-3xl reveal">
            <div class="divider-line mb-8"></div>
            <h1 class="font-serif text-white font-black mb-6" style="font-size: clamp(2rem, 4vw, 3.5rem); letter-spacing: -0.04em;">Política de Privacidade.</h1>
            <p class="font-sans text-white/60 text-lg leading-relaxed">Compromisso com a transparência, segurança e proteção dos seus dados pessoais.</p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container-myriad">
        <div class="max-w-3xl font-sans text-gray-700 text-base leading-relaxed space-y-6 reveal">
            @php
                $customPrivacy = \App\Models\SiteSetting::get('legal_privacy_policy');
            @endphp

            @if($customPrivacy)
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($customPrivacy)) !!}
                </div>
            @else
                <p>A presente Política de Privacidade explica como a <strong>Xamariz</strong> (marca operada pela <strong>Visualclick, Lda</strong>, registada em Luanda, Angola) recolhe, utiliza, protege e processa os dados pessoais fornecidos pelos utilizadores no seu website e canais digitais.</p>

                <h2 class="font-sans font-bold text-gray-900 text-xl tracking-tight mt-8">1. Dados que Recolhemos</h2>
                <p>Recolhemos apenas as informações que nos fornece diretamente, tais como o nome, endereço de correio eletrónico, número de telefone, empresa e mensagem aquando do preenchimento do nosso formulário de contacto ou pedido de proposta comercial.</p>

                <h2 class="font-sans font-bold text-gray-900 text-xl tracking-tight mt-8">2. Finalidade do Tratamento de Dados</h2>
                <p>Os seus dados são utilizados exclusivamente para responder às suas solicitações de informação, apresentar propostas de serviços de Marketing 360°, agendar reuniões e manter uma relação profissional e comercial transparente.</p>

                <h2 class="font-sans font-bold text-gray-900 text-xl tracking-tight mt-8">3. Partilha e Segurança da Informação</h2>
                <p>A Xamariz não comercializa nem partilha os seus dados pessoais com entidades terceiras para fins de marketing sem o seu consentimento explícito. Adotamos medidas de segurança técnicas e organizativas rigorosas para proteger os seus dados.</p>

                <h2 class="font-sans font-bold text-gray-900 text-xl tracking-tight mt-8">4. Os Seus Direitos</h2>
                <p>Tem o direito de solicitar o acesso, retificação, atualização ou eliminação dos seus dados pessoais a qualquer momento. Para o efeito, basta entrar em contacto connosco através do e-mail <a href="mailto:{{ \App\Models\SiteSetting::get('email', 'geral@xamariz.ao') }}" class="text-[var(--color-brand-accent)] font-semibold hover:underline">{{ \App\Models\SiteSetting::get('email', 'geral@xamariz.ao') }}</a>.</p>
            @endif
        </div>
    </div>
</section>

{{-- CTA Section --}}
<x-cta-section />

@endsection
