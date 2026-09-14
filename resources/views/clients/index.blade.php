@extends('layouts.app')

@section('title', 'Clientes | Xamariz')
@section('description', 'Marcas líderes, instituições e empresas que confiam na Xamariz para comunicar melhor em Angola e no mercado internacional.')

@section('content')

    {{-- Header padronizado --}}
    <x-page-hero title="Clientes"
        subtitle="Marcas que confiam na Xamariz para comunicar melhor." />

    {{-- CLIENTES & PARCERIAS --}}
    @if (isset($clients) && $clients->count() > 0)
        <section class="py-20 sm:py-24 bg-white">
            <div class="container-myriad">
                <div class="max-w-3xl mb-12 reveal">
                    <h2 class="font-sans text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">{{ \App\Models\SiteSetting::get('clients_hero_title', 'Marcas líderes que confiam na Xamariz.') }}</h2>
                    <p class="font-sans text-gray-600 text-base sm:text-lg leading-relaxed mt-3">{{ \App\Models\SiteSetting::get('clients_hero_subtitle', 'Trabalhamos com empresas corporativas, instituições e líderes globais em Angola e no mundo. Clique num logótipo para ver os trabalhos realizados.') }}</p>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 reveal">
                    @foreach ($clients as $client)
                        @php
                            $logoRaw = $client->logo_path ?? '';
                            $logoUrl = $logoRaw ? (Str::startsWith($logoRaw, ['http://', 'https://']) ? $logoRaw : asset(ltrim($logoRaw, '/'))) : null;
                        @endphp
                        <a href="{{ route('clients.show', $client->slug) }}" title="{{ $client->name }}" class="group flex items-center justify-center h-36 p-6 select-none">
                            <div class="filter grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300 flex items-center justify-center">
                                @if (Str::startsWith($logoRaw, '<svg'))
                                    {!! $logoRaw !!}
                                @elseif ($logoUrl)
                                    <img src="{{ $logoUrl }}" alt="{{ $client->name }}" class="max-w-full max-h-16 object-contain">
                                @else
                                    <span class="font-sans font-bold text-gray-800 text-lg">{{ $client->name }}</span>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <section class="py-20 sm:py-24 bg-white">
            <div class="container-myriad">
                <p class="font-sans text-gray-500 text-lg">{{ \App\Models\SiteSetting::get('clients_empty', 'Nenhum cliente cadastrado de momento.') }}</p>
            </div>
        </section>
    @endif

    {{-- CTA --}}
    <x-cta-section />

@endsection
