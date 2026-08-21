@extends('layouts.app')

@section('title', 'Clientes | Xamariz • Agência de Publicidade Angola & Internacional')
@section('description',
    'Conheça os clientes e marcas líderes que confiam na Xamariz para estratégias de Publicidade,
    Branding, Desenvolvimento Web e Marketing 360°.')

@section('content')

    {{-- Hero Section --}}
    <section class="pt-40 pb-20 bg-white text-gray-900 border-b border-gray-100">
        <div class="container-myriad">
            <div class="reveal flex items-center gap-3 text-xs uppercase font-sans tracking-widest mb-6 sm:mb-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Xamariz</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">Parcerias e Clientes</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-end">
                <div class="lg:col-span-8 reveal">
                    <h1
                        class="font-sans text-4xl sm:text-6xl md:text-7xl font-normal text-gray-900 tracking-tight leading-[1.1] mb-6">
                        Marcas líderes que confiam na Xamariz.
                    </h1>
                    <p class="font-sans text-gray-600 text-lg sm:text-xl leading-relaxed max-w-3xl">
                        Trabalhamos com empresas corporativas, instituições e líderes globais em Angola e no mundo. Clique
                        num logótipo para ver os trabalhos realizados.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Client Logos Grid Section --}}
    <section class="py-20 bg-gray-50/50">
        <div class="container-myriad">
            @if(isset($clients) && $clients->count() > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 reveal">
                    @foreach ($clients as $client)
                        @php
                            $slug = is_object($client) ? $client->slug : $client['slug'];
                            $name = is_object($client) ? $client->name : $client['name'];
                            $logoRaw = is_object($client) ? $client->logo_path : ($client['logo'] ?? '');
                            $logoUrl = $logoRaw ? (Str::startsWith($logoRaw, ['http://', 'https://']) ? $logoRaw : asset(ltrim($logoRaw, '/'))) : null;
                        @endphp
                        <a href="{{ route('clients.show', $slug) }}" title="{{ $name }}"
                            class="group flex items-center justify-center h-36 transition-all duration-300 p-6 relative select-none">

                            <div
                                class="filter grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300 flex items-center justify-center">
                                @if(Str::startsWith($logoRaw, '<svg'))
                                    {!! $logoRaw !!}
                                @elseif($logoUrl)
                                    <img src="{{ $logoUrl }}" alt="{{ $name }}" class="max-w-full max-h-16 object-contain">
                                @else
                                    <span class="font-sans font-bold text-gray-800 text-lg">{{ $name }}</span>
                                @endif
                            </div>

                        </a>
                    @endforeach
                </div>
            @else
                <div class="py-16 text-center">
                    <p class="font-sans text-gray-500 text-lg">Nenhum cliente cadastrado de momento.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24 bg-[var(--color-brand-dark)] text-white">
        <div class="container-myriad text-center reveal">
            <div class="inline-flex items-center gap-2 mb-4">
                <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-400">NOVA PARCERIA DE
                    SUCESSO</span>
            </div>
            <h2 class="font-sans text-3xl sm:text-5xl font-normal text-white mb-6 tracking-tight">
                Pronto para transformar a comunicação da sua marca?
            </h2>
            <p class="font-sans text-gray-400 text-lg mb-10 max-w-xl mx-auto leading-relaxed">
                Junte-se às maiores empresas e marcas do mercado. Desenvolvemos estratégias de Marketing 360° sob medida
                para o seu setor.
            </p>
            <a href="{{ route('contact') }}"
                class="inline-flex items-center gap-3 px-8 py-3.5 rounded-full bg-[var(--color-brand-accent)] text-white hover:bg-[var(--color-brand-accent-hover)] text-xs font-semibold uppercase tracking-wider transition-all duration-300 group">
                <span>FALAR COM A EQUIPA</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                    class="group-hover:translate-x-1 transition-transform">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>
    </section>

@endsection
