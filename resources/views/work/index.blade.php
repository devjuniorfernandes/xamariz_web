@extends('layouts.app')

@section('title', 'Portfólio de Projetos | Xamariz Agência de Publicidade Angola')
@section('description', 'Explore o portfólio de campanhas de publicidade, marketing 360°, redes sociais e produção audiovisual da Xamariz em Angola e internacionalmente.')

@section('content')

    {{-- Page Header --}}
    <section class="pt-40 pb-16 bg-white text-gray-900">
        <div class="container-myriad">
            <div class="reveal flex items-center gap-3 text-xs uppercase font-sans tracking-widest mb-6 sm:mb-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Xamariz</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">Portfólio de Projetos</span>
            </div>

            <div class="max-w-3xl reveal">
                <h1
                    class="font-sans text-4xl sm:text-6xl md:text-7xl font-normal text-gray-900 tracking-tight leading-[1.12] mb-6">
                    Campanhas audazes e resultados que dominam o mercado.
                </h1>
                <p class="font-sans text-gray-600 text-lg sm:text-xl leading-relaxed">
                    Cada projeto começou como um desafio estratégico de comunicação. Explore como transformámos a visão dos nossos clientes em posições de liderança no setor.
                </p>
            </div>
        </div>
    </section>

    {{-- Filters (Dynamic from DB) --}}
    @if(isset($categories) && $categories->count() > 0)
    <section class="bg-white sticky top-[72px] z-40 py-4 border-b border-gray-100">
        <div class="container-myriad">
            <div class="flex flex-wrap gap-3">
                <button data-filter="all"
                    class="font-sans text-xs font-semibold uppercase tracking-wider px-5 py-2.5 rounded-full transition-all duration-200 bg-[var(--color-brand-accent)] text-white">
                    Todos os Projetos
                </button>
                @foreach ($categories as $cat)
                    <button data-filter="{{ $cat->filter_key }}"
                        class="font-sans text-xs font-semibold uppercase tracking-wider px-5 py-2.5 rounded-full transition-all duration-200 bg-gray-100 text-gray-700 hover:bg-gray-200">
                        {{ $cat->name }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Work Grid (Dynamic from DB) --}}
    <section class="bg-white py-16 pb-24">
        <div class="container-myriad">
            @if(isset($works) && $works->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-work-grid>
                    @foreach ($works as $work)
                        @php
                            $clientName = is_object($work) && $work->client ? $work->client->name : (is_array($work) ? ($work['client'] ?? '') : '');
                            $filterKey = is_object($work) && $work->category ? $work->category->filter_key : (is_array($work) ? ($work['sector'] ?? 'all') : 'all');
                            $title = is_object($work) ? $work->title : $work['title'];
                            $slug = is_object($work) ? $work->slug : $work['slug'];
                            $summary = is_object($work) ? ($work->summary ?? $work->description) : ($work['desc'] ?? '');
                            $coverImage = is_object($work) ? $work->cover_image : ($work['img'] ?? null);
                            $cover = $coverImage ? (Str::startsWith($coverImage, ['http://', 'https://']) ? $coverImage : asset(ltrim($coverImage, '/'))) : 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=900&auto=format&fit=crop&q=80';
                        @endphp

                        <a href="{{ route('work.show', $slug) }}"
                            class="work-card h-[420px] rounded-none overflow-hidden block relative group"
                            data-sector="{{ $filterKey }}">
                            <img src="{{ $cover }}" alt="{{ $title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div
                                class="card-overlay absolute inset-0 p-8 flex flex-col justify-end bg-gradient-to-t from-black/90 via-black/40 to-transparent">
                                <div
                                    class="card-arrow absolute top-6 right-6 text-white group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2.5">
                                        <path d="M7 17L17 7" />
                                        <path d="M7 7h10v10" />
                                    </svg>
                                </div>
                                @if($clientName)
                                    <p class="font-sans text-gray-300 text-xs mb-1 font-semibold uppercase tracking-wider">
                                        {{ $clientName }}
                                    </p>
                                @endif
                                <h2 class="font-sans text-white font-bold text-2xl mb-2 tracking-tight">{{ $title }}
                                </h2>
                                <p class="font-sans text-gray-300 text-sm leading-relaxed max-w-sm">{{ Str::limit($summary, 120) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="py-16 text-center">
                    <p class="font-sans text-gray-500 text-lg">Nenhum projeto encontrado de momento.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
