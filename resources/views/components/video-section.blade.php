@php
    $cultureVideo = \App\Models\SiteSetting::get('culture_video_url', 'office.mp4');
    $cultureVideoSrc = Str::startsWith($cultureVideo, ['http://', 'https://']) ? $cultureVideo : asset(ltrim($cultureVideo, '/'));
@endphp

{{-- ══════════════════════════════════════════════
 FULL WIDTH VIDEO SECTION (OUR TEAM & CULTURE)
════════════════════════════════════════════════ --}}
<section
    class="relative w-full min-h-[600px] lg:min-h-[750px] bg-black overflow-hidden flex items-center py-20 lg:py-28 select-none">
    {{-- Full Width Video Background --}}
    <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline preload="auto">
        <source src="{{ $cultureVideoSrc }}" type="video/mp4">
    </video>

    {{-- Dark Opacity Overlay --}}
    <div class="absolute inset-0 bg-black/60 backdrop-brightness-90 z-10"></div>

    {{-- Overlay Content --}}
    <div class="container-myriad relative z-20 w-full text-white">

        {{-- Main Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-end">

            {{-- Left Column: Large Headline --}}
            <div class="lg:col-span-7 reveal">
                <h2
                    class="font-sans text-4xl sm:text-6xl lg:text-7xl font-bold text-white tracking-tight leading-[1.06]">
                    {!! nl2br(e(\App\Models\SiteSetting::get('culture_video_title', "Juntos,\ntransformamos visão\nem realidade."))) !!}
                </h2>
            </div>

            {{-- Right Column: Paragraph + Action Buttons --}}
            <div class="lg:col-span-5 reveal delay-200 flex flex-col items-start lg:pl-8 lg:pb-2">
                <p class="font-sans text-white/90 text-base sm:text-lg leading-relaxed max-w-md mb-8">
                    {{ \App\Models\SiteSetting::get('culture_video_desc', 'Somos estrategistas, criativos, contadores de histórias e especialistas em performance dedicados à excelência em Angola e no mundo.') }}
                </p>

                <div class="flex items-center gap-4">
                    <button type="button"
                        class="showreel-trigger inline-flex items-center gap-3 px-7 py-3.5 rounded-full border border-white text-white hover:border-[var(--color-brand-accent)] hover:text-[var(--color-brand-accent)] text-xs font-semibold uppercase tracking-wider transition-all duration-300 group cursor-pointer">
                        <span>CONHEÇA-NOS</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                            class="text-[var(--color-brand-accent)] group-hover:translate-x-1 transition-transform">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>

                    <button type="button"
                        class="showreel-trigger w-12 h-12 rounded-full border border-[var(--color-brand-accent)] bg-[var(--color-brand-accent)]/20 hover:bg-[var(--color-brand-accent)] text-white flex items-center justify-center transition-all duration-300 hover:scale-105 cursor-pointer group"
                        aria-label="Assistir Vídeo">
                        <svg class="w-5 h-5 fill-current text-[var(--color-brand-accent)] group-hover:text-white transition-colors ml-0.5"
                            viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>
