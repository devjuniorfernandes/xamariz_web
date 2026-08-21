@extends('layouts.app')

@php
    $title = is_object($work) ? $work->title : ($work['title'] ?? 'Estudo de Caso');
    $clientName = is_object($work) && $work->client ? $work->client->name : ($work['client'] ?? '');
    $categoryName = is_object($work) && $work->category ? $work->category->name : ($work['sector'] ?? '');
    $cover = is_object($work) ? $work->cover_image : ($work['hero'] ?? '');
    $tagline = is_object($work) ? ($work->tagline ?? $work->summary) : ($work['tagline'] ?? '');
    $description = is_object($work) ? $work->description : ($work['intro'] ?? '');
    $summary = is_object($work) ? $work->summary : ($work['body'] ?? '');
    $externalUrl = is_object($work) ? $work->external_url : ($work['external_url'] ?? null);
    $videoUrl = is_object($work) ? $work->video_url : ($work['video_url'] ?? null);
    $gallery = is_object($work) ? ($work->gallery ?? []) : ($work['images'] ?? []);

    // Format YouTube Embed URL if applicable
    $embedVideoUrl = null;
    if (!empty($videoUrl)) {
        if (str_contains($videoUrl, 'youtube.com/watch?v=')) {
            $videoId = explode('v=', $videoUrl)[1] ?? '';
            $videoId = explode('&', $videoId)[0];
            $embedVideoUrl = "https://www.youtube.com/embed/" . $videoId;
        } elseif (str_contains($videoUrl, 'youtu.be/')) {
            $videoId = explode('youtu.be/', $videoUrl)[1] ?? '';
            $videoId = explode('?', $videoId)[0];
            $embedVideoUrl = "https://www.youtube.com/embed/" . $videoId;
        } elseif (str_contains($videoUrl, 'vimeo.com/')) {
            $vimeoId = explode('vimeo.com/', $videoUrl)[1] ?? '';
            $embedVideoUrl = "https://player.vimeo.com/video/" . $vimeoId;
        } else {
            $embedVideoUrl = $videoUrl; // Direct MP4 or custom embed
        }
    }
@endphp

@section('title', $title . ' | Portfólio Xamariz')
@section('description', Str::limit(strip_tags($summary), 160))

@section('content')

    {{-- Hero Section --}}
    <section class="relative h-[45vh] min-h-[300px] overflow-hidden bg-[var(--color-brand-dark)]">
        <img src="{{ $cover }}" alt="{{ $title }}" class="w-full h-full object-cover opacity-50">
        <div class="absolute inset-0 bg-gradient-to-t from-[#141414] via-[#141414]/60 to-transparent"></div>
        <div class="absolute inset-x-0 bottom-0 container-myriad pb-16">
            <p class="font-sans text-white/60 text-xs uppercase tracking-widest font-semibold mb-3">
                {{ $clientName }} {{ $categoryName ? '• ' . $categoryName : '' }}
            </p>
            <h1 class="font-serif text-white font-bold text-3xl sm:text-5xl lg:text-6xl tracking-tight leading-tight">
                {{ $title }}
            </h1>
        </div>
    </section>

    {{-- Navigation Breadcrumb (Image 1 Style) --}}
    <div class="bg-[var(--color-brand-dark)] border-b border-white/10">
        <div class="container-myriad py-4 flex items-center justify-between gap-4">
            <div class="flex items-center gap-3 text-xs uppercase font-sans tracking-widest">
                <a href="{{ route('work.index') }}" class="text-white/60 hover:text-white transition-colors">Portfólio</a>
                <span class="text-white/30">/</span>
                <span class="text-white/40 truncate max-w-xs sm:max-w-md">{{ $title }}</span>
            </div>

            {{-- Link para Ver Projeto Concluído no Site Externo --}}
            @if(!empty($externalUrl))
                <a href="{{ $externalUrl }}" target="_blank" rel="noopener noreferrer" class="btn-primary py-2 px-5 text-xs inline-flex items-center gap-2">
                    <span>Ver Projeto Concluído</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                </a>
            @endif
        </div>
    </div>

    {{-- Case Study Content --}}
    <article class="py-20 bg-white text-gray-900">
        <div class="container-myriad">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">

                {{-- Intro & Metadata Column --}}
                <div class="lg:col-span-4 space-y-8">
                    @if(!empty($tagline))
                        <p class="font-sans text-gray-900 font-bold text-xl sm:text-2xl leading-relaxed reveal">
                            {{ $tagline }}
                        </p>
                    @endif

                    <div class="border-t border-gray-200 pt-6 space-y-4 reveal delay-100">
                        <div>
                            <p class="font-sans text-xs font-semibold uppercase tracking-widest text-gray-400 mb-1">CLIENTE</p>
                            <p class="font-sans font-bold text-gray-900 text-lg">{{ $clientName }}</p>
                        </div>

                        @if(!empty($categoryName))
                            <div>
                                <p class="font-sans text-xs font-semibold uppercase tracking-widest text-gray-400 mb-1">SECTOR / FILTRO</p>
                                <p class="font-sans font-semibold text-gray-700 text-sm">{{ $categoryName }}</p>
                            </div>
                        @endif

                        @if(!empty($externalUrl))
                            <div class="pt-2">
                                <a href="{{ $externalUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-[var(--color-brand-accent)] hover:underline">
                                    <span>Ver Projeto Concluído ↗</span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Description Copy Column --}}
                <div class="lg:col-span-7 lg:col-start-6 space-y-6 font-sans text-gray-600 text-base sm:text-lg leading-relaxed">
                    <div class="reveal">
                        {!! nl2br(e($description)) !!}
                    </div>

                    @if(!empty($summary) && $summary !== $description)
                        <div class="p-8 bg-gray-50 border-l-4 border-[var(--color-brand-accent)] reveal delay-100 mt-8">
                            <p class="font-sans text-gray-900 font-semibold text-base leading-relaxed">
                                {{ $summary }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Embedded Video Section (YouTube / Vimeo / MP4) --}}
            @if(!empty($embedVideoUrl))
                <div class="mt-16 reveal">
                    <h3 class="font-sans text-xs font-bold uppercase tracking-widest text-gray-400 mb-4">VÍDEO DO PROJETO / SPOT PUBLICITÁRIO</h3>
                    <div class="aspect-video w-full overflow-hidden bg-black shadow-2xl">
                        @if(str_contains($embedVideoUrl, 'youtube.com') || str_contains($embedVideoUrl, 'vimeo.com'))
                            <iframe src="{{ $embedVideoUrl }}" class="w-full h-full border-0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @else
                            <video controls class="w-full h-full object-cover">
                                <source src="{{ $embedVideoUrl }}" type="video/mp4">
                                O seu navegador não suporta reprodução de vídeo.
                            </video>
                        @endif
                    </div>
                </div>
            @endif

            {{-- Dynamic Image Gallery of Different Sizes (Full 100%, Half 50%, Portrait 33%) --}}
            @if(!empty($gallery) && count($gallery) > 0)
                <div class="mt-20">
                    <h3 class="font-sans text-xs font-bold uppercase tracking-widest text-gray-400 mb-8">GALERIA DE IMAGENS DO PROJETO</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-6">
                        @foreach ($gallery as $i => $item)
                            @php
                                $imgUrl = is_array($item) ? ($item['url'] ?? $item) : $item;
                                $size = is_array($item) ? ($item['size'] ?? 'full') : ($i === 0 ? 'full' : 'half');
                                $caption = is_array($item) ? ($item['caption'] ?? '') : '';

                                // Determine Grid Column Span & Aspect Height based on image size
                                if ($size === 'full') {
                                    $gridClass = 'col-span-1 md:col-span-2 lg:col-span-12 h-[540px]';
                                } elseif ($size === 'portrait') {
                                    $gridClass = 'col-span-1 md:col-span-1 lg:col-span-4 h-[500px]';
                                } else { // half
                                    $gridClass = 'col-span-1 md:col-span-1 lg:col-span-6 h-[400px]';
                                }
                            @endphp

                            @if(!empty($imgUrl))
                                <div class="{{ $gridClass }} overflow-hidden group relative reveal" style="animation-delay: {{ $i * 100 }}ms">
                                    <img src="{{ $imgUrl }}" alt="Galeria {{ $title }} {{ $i + 1 }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    @if(!empty($caption))
                                        <div class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-black/80 to-transparent text-white text-xs font-sans">
                                            {{ $caption }}
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </article>

    {{-- CTA --}}
    <section class="py-24 bg-[var(--color-brand-dark)]">
        <div class="container-myriad">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-8">
                <div>
                    <h2 class="font-sans text-white font-bold text-3xl mb-2" style="letter-spacing: -0.03em;">
                        Pretende um projeto com este nível de impacto?
                    </h2>
                    <p class="font-sans text-white/50 text-base">Fale com a equipa de especialistas da Xamariz.</p>
                </div>
                <a href="{{ route('contact') }}" class="btn-primary shrink-0">
                    <span>Falar com a Equipa</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

@endsection
