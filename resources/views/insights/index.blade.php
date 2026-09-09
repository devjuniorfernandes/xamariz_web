@extends('layouts.app')

@section('title', \App\Models\SiteSetting::get('seo_insights_title', 'Insights, Tendências e Artigos de Marketing | Xamariz'))
@section('description', \App\Models\SiteSetting::get('seo_insights_description', 'Artigos de opinião, tendências de publicidade, marketing digital e estratégias de comunicação para líderes e empresas em Angola.'))

@section('content')

    {{-- Header --}}
    <section class="pt-40 pb-16 bg-white text-gray-900 border-b border-gray-100">
        <div class="container-myriad">
            <div class="reveal flex items-center gap-3 text-xs uppercase font-sans tracking-widest mb-6 sm:mb-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Xamariz</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">Insights & Artigos</span>
            </div>

            <div class="max-w-3xl reveal">
                <h1
                    class="font-sans text-3xl sm:text-5xl font-normal text-gray-900 tracking-tight leading-[1.12] mb-6">
                    Pensar melhor. Comunicar melhor.
                </h1>
                <p class="font-sans text-gray-600 text-lg sm:text-xl leading-relaxed">
                    Ideias e perspectivas da Xamariz sobre comunicação, marketing, tecnologia e os desafios que estão a transformar as empresas.
                </p>
            </div>
        </div>
    </section>

    {{-- Articles Grid --}}
    <section class="py-20 bg-white">
        <div class="container-myriad">
            @if (isset($insights) && $insights->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-16">
                    @foreach ($insights as $item)
                        @php
                            $itemSlug = is_object($item) ? $item->slug : $item['slug'];
                            $itemTitle = is_object($item) ? $item->title : $item['title'];
                            $itemCategory = is_object($item)
                                ? $item->category ?? 'Insights'
                                : $item['category'] ?? 'Insights';
                            $coverPath = is_object($item) ? $item->cover_image : $item['cover'] ?? null;
                            $itemCover = $coverPath
                                ? (Str::startsWith($coverPath, 'http')
                                    ? $coverPath
                                    : asset($coverPath))
                                : 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=800&auto=format&fit=crop&q=80';
                        @endphp

                        <a href="{{ route('insights.show', $itemSlug) }}" class="group block reveal">
                            {{-- Square Image Container --}}
                            <div class="aspect-square w-full overflow-hidden bg-gray-100 rounded-none mb-5 relative">
                                <img src="{{ $itemCover }}" alt="{{ $itemTitle }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                            </div>

                            {{-- Title + Diagonal Down-Right Arrow --}}
                            <div class="flex items-start justify-between gap-4 pb-4 border-b border-gray-900">
                                <h2
                                    class="font-sans text-xl sm:text-2xl font-bold text-gray-900 tracking-tight leading-tight group-hover:text-[var(--color-brand-accent)] transition-colors">
                                    {{ $itemTitle }}
                                </h2>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2.5"
                                    class="text-[var(--color-brand-accent)] shrink-0 group-hover:translate-x-1 group-hover:translate-y-1 transition-transform duration-300">
                                    <path d="M7 7l10 10" />
                                    <path d="M17 7v10H7" />
                                </svg>
                            </div>

                            {{-- Category Tag below Line --}}
                            <div class="pt-3">
                                <span class="font-sans text-xs font-medium text-gray-500 tracking-wide">
                                    {{ $itemCategory }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="py-16 text-center">
                    <p class="font-sans text-gray-500 text-lg">Nenhum artigo ou insight publicado de momento.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <x-cta-section
        title="Enfrenta um desafio de comunicação semelhante?"
        subtitle="Ajudamos a sua empresa a desenhar campanhas estratégicas com resultados comerciais tangíveis." />

@endsection
