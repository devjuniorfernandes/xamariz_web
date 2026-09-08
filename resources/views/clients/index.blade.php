@extends('layouts.app')

@section('title', \App\Models\SiteSetting::get('seo_clients_title', 'Clientes e Marcas Parceiras em Angola | Xamariz'))
@section('description', \App\Models\SiteSetting::get('seo_clients_description', 'Conheça os clientes e marcas líderes em Angola e no mercado internacional que confiam na Xamariz para acelerar o seu crescimento comercial.'))

@section('content')

    {{-- Hero Section --}}
    <section class="pt-40 pb-20 bg-white text-gray-900 border-b border-gray-100">
        <div class="container-myriad">
            <div class="reveal flex items-center gap-3 text-xs uppercase font-sans tracking-widest mb-6 sm:mb-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Xamariz</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">{{ \App\Models\SiteSetting::get('clients_breadcrumb', 'Parcerias e Clientes') }}</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-end">
                <div class="lg:col-span-8 reveal">
                    <h1
                        class="font-sans  text-3xl sm:text-5xl font-normal text-gray-900 tracking-tight leading-[1.1] mb-6">
                        {{ \App\Models\SiteSetting::get('clients_hero_title', 'Marcas líderes que confiam na Xamariz.') }}
                    </h1>
                    <p class="font-sans text-gray-600 text-lg sm:text-xl leading-relaxed max-w-3xl">
                        {{ \App\Models\SiteSetting::get('clients_hero_subtitle', 'Trabalhamos com empresas corporativas, instituições e líderes globais em Angola e no mundo. Clique num logótipo para ver os trabalhos realizados.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Client Logos Grid Section --}}
    <section class="py-20 bg-gray-50/50">
        <div class="container-myriad">
            @if (isset($clients) && $clients->count() > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 reveal">
                    @foreach ($clients as $client)
                        @php
                            $slug = is_object($client) ? $client->slug : $client['slug'];
                            $name = is_object($client) ? $client->name : $client['name'];
                            $logoRaw = is_object($client) ? $client->logo_path : $client['logo'] ?? '';
                            $logoUrl = $logoRaw
                                ? (Str::startsWith($logoRaw, ['http://', 'https://'])
                                    ? $logoRaw
                                    : asset(ltrim($logoRaw, '/')))
                                : null;
                        @endphp
                        <a href="{{ route('clients.show', $slug) }}" title="{{ $name }}"
                            class="group flex items-center justify-center h-36 transition-all duration-300 p-6 relative select-none">

                            <div
                                class="filter grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300 flex items-center justify-center">
                                @if (Str::startsWith($logoRaw, '<svg'))
                                    {!! $logoRaw !!}
                                @elseif($logoUrl)
                                    <img src="{{ $logoUrl }}" alt="{{ $name }}"
                                        class="max-w-full max-h-16 object-contain">
                                @else
                                    <span class="font-sans font-bold text-gray-800 text-lg">{{ $name }}</span>
                                @endif
                            </div>

                        </a>
                    @endforeach
                </div>
            @else
                <div class="py-16 text-center">
                    <p class="font-sans text-gray-500 text-lg">{{ \App\Models\SiteSetting::get('clients_empty', 'Nenhum cliente cadastrado de momento.') }}</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <x-cta-section
        :title="\App\Models\SiteSetting::get('clients_cta_title', 'Pronto para transformar a comunicação da sua marca?')"
        :subtitle="\App\Models\SiteSetting::get('clients_cta_subtitle', 'Junte-se às maiores empresas e marcas do mercado. Desenvolvemos estratégias de Marketing 360° sob medida para o seu setor.')" />

@endsection
