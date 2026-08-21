@extends('layouts.app')

@section('title', 'Serviços de Marketing 360° | Xamariz Agência de Publicidade')
@section('description', 'Serviços de Marketing 360°, Publicidade, Redes Sociais, Desenvolvimento Web, SEO e Produção Audiovisual em Luanda, Angola e Internacional.')

@section('content')

{{-- Header --}}
<section class="pt-40 pb-20 bg-white text-gray-900 border-b border-gray-100">
    <div class="container-myriad">
        <div class="reveal flex items-center gap-3 text-xs uppercase font-sans tracking-widest mb-6 sm:mb-8">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Xamariz</a>
            <span class="text-gray-300">/</span>
            <span class="text-gray-400">Soluções & Serviços 360°</span>
        </div>

        <div class="max-w-4xl reveal">
            <h1 class="font-sans text-4xl sm:text-6xl md:text-7xl font-normal text-gray-900 tracking-tight leading-[1.12] mb-6">
                Organizados pelo problema, focados em resultados reais.
            </h1>
            <p class="font-sans text-gray-600 text-lg sm:text-xl leading-relaxed">
                Atrair clientes num mercado competitivo exige uma comunicação clara e uma estratégia de diferenciação. Desenvolvemos ecossistemas de Marketing 360° desenhados para colocar a sua empresa no topo do seu setor.
            </p>
        </div>
    </div>
</section>

{{-- Services Accordion List --}}
<section class="py-20 bg-white">
    <div class="container-myriad">
        @if(isset($servicesList) && $servicesList->count() > 0)
            <div class="space-y-6">
                @foreach ($servicesList as $index => $service)
                    @php
                        $numCode = $service->number_code ?? sprintf('%02d', $index + 1);
                        $title = $service->title;
                        $slug = $service->slug;
                        $desc = $service->short_description ?? $service->full_description;
                        $deliverables = is_array($service->deliverables) ? $service->deliverables : (is_array($service->key_benefits) ? $service->key_benefits : []);
                    @endphp
                    <div class="p-8 sm:p-10 border border-gray-200 bg-gray-50/50 hover:bg-gray-50 transition-colors rounded-none reveal">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8">
                            <div class="space-y-4 max-w-3xl">
                                <div class="flex items-center gap-3">
                                    <span class="font-mono text-xs font-bold text-[var(--color-brand-accent)] uppercase tracking-widest">{{ $numCode }}</span>
                                    <span class="w-1.5 h-1.5 bg-gray-300 inline-block"></span>
                                    <span class="font-sans text-xs font-bold text-gray-500 uppercase tracking-wider">SERVIÇO ESPECIALIZADO</span>
                                </div>
                                <h2 class="font-sans text-2xl sm:text-4xl font-bold text-gray-900 tracking-tight">{{ $title }}</h2>
                                <p class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed">{{ $desc }}</p>
                                
                                {{-- Key deliverables list --}}
                                @if(count($deliverables) > 0)
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 pt-2">
                                        @foreach ($deliverables as $item)
                                            <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
                                                <span class="w-1.5 h-1.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                                                <span>{{ is_array($item) ? ($item['title'] ?? '') : $item }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <a 
                                href="{{ route('services.show', $slug) }}" 
                                class="inline-flex items-center gap-3 px-7 py-3.5 rounded-full border border-gray-900 text-gray-900 hover:border-[var(--color-brand-accent)] hover:text-[var(--color-brand-accent)] text-xs font-semibold uppercase tracking-wider transition-all shrink-0 self-start lg:self-center group"
                            >
                                <span>EXPLORAR SERVIÇO</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-[var(--color-brand-accent)] group-hover:translate-x-1 transition-transform">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="py-16 text-center">
                <p class="font-sans text-gray-500 text-lg">Nenhum serviço cadastrado de momento.</p>
            </div>
        @endif
    </div>
</section>

{{-- CTA Section --}}
<section class="py-24 bg-[var(--color-brand-dark)] text-white">
    <div class="container-myriad text-center reveal">
        <div class="inline-flex items-center gap-2 mb-4">
            <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
            <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-400">PRECISA DE ORIENTAÇÃO E ESTRATÉGIA?</span>
        </div>
        <h2 class="font-sans text-3xl sm:text-5xl font-normal text-white mb-6 tracking-tight">
            Não tem a certeza de qual o serviço ideal para o seu projeto?
        </h2>
        <p class="font-sans text-gray-400 text-lg mb-10 max-w-md mx-auto leading-relaxed">
            Apresente-nos o seu desafio comercial. Nós desenvolvemos a solução ideal.
        </p>
        <a 
            href="{{ route('contact') }}" 
            class="inline-flex items-center gap-3 px-8 py-3.5 rounded-full bg-[var(--color-brand-accent)] text-white hover:bg-[var(--color-brand-accent-hover)] text-xs font-semibold uppercase tracking-wider transition-all duration-300 group"
        >
            <span>FALAR COM A EQUIPA</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </a>
    </div>
</section>

@endsection
