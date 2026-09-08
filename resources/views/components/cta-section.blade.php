@props([
    'title' => null,
    'subtitle' => null,
    'btnText' => null,
    'btnUrl' => route('contact'),
])

@php
    $title = $title ?: __('home.cta_title');
    $subtitle = $subtitle ?: __('home.cta_subtitle');
    $btnText = $btnText ?: __('home.cta_btn');
@endphp

{{-- ══════════════════════════════════════════════
     CTA FINAL PADRONIZADO
     BACKGROUND DO FOOTER + LINHAS #EE5129
════════════════════════════════════════════════ --}}

<section
    class="relative overflow-hidden py-32 text-white bg-gradient-to-br from-[#09297a] via-[#132058] to-[#281b45]"
>

    {{-- DECORAÇÕES DE FUNDO --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">

        {{-- Linhas geométricas --}}
        <svg
            class="absolute right-0 top-0 h-full w-1/2"
            viewBox="0 0 600 600"
            preserveAspectRatio="xMidYMid slice"
            fill="none"
            stroke="#EE5129"
        >
            <g stroke-width="1.2">

                <path d="M100 0 L600 500" opacity="0.40" />
                <path d="M200 0 L600 400" opacity="0.50" />
                <path d="M300 0 L600 300" opacity="0.60" />
                <path d="M400 0 L600 200" opacity="0.70" />
                <path d="M500 0 L600 100" opacity="0.80" />

                <path d="M600 0 L100 500" opacity="0.40" />
                <path d="M600 100 L200 500" opacity="0.50" />
                <path d="M600 200 L300 500" opacity="0.60" />
                <path d="M600 300 L400 500" opacity="0.70" />

                {{-- Círculos --}}
                <circle
                    cx="450"
                    cy="200"
                    r="180"
                    stroke-dasharray="4 4"
                    opacity="0.35"
                />

                <circle
                    cx="450"
                    cy="200"
                    r="300"
                    stroke-dasharray="6 6"
                    opacity="0.25"
                />

            </g>
        </svg>


        {{-- Linhas curvas --}}
        <svg
            class="absolute -right-20 -bottom-20 w-[600px] h-[600px]"
            viewBox="0 0 400 400"
            preserveAspectRatio="xMidYMid meet"
            fill="none"
            stroke="#EE5129"
        >
            <path
                d="
                    M0,400 Q200,200 400,0
                    M0,350 Q200,150 400,-50
                    M0,300 Q200,100 400,-100
                    M0,250 Q200,50 400,-150
                "
                stroke-width="1"
                opacity="0.35"
            />
        </svg>

    </div>


    {{-- CONTEÚDO --}}
    <div class="container-myriad relative z-10 text-center">

        <div class="reveal">

            <div class="divider-line mb-8 mx-auto"></div>

            <h2
                class="font-serif text-white font-black mb-6"
                style="font-size: clamp(2rem, 5vw, 2.5rem); letter-spacing: -0.04em;"
            >
                {!! nl2br(e($title)) !!}
            </h2>

            <p class="font-sans text-white text-xl mb-12 max-w-md mx-auto leading-relaxed">
                {{ $subtitle }}
            </p>

            <a
                href="{{ $btnUrl }}"
                class="btn-primary text-base px-8 py-4 inline-flex items-center justify-center gap-3"
            >
                {{ $btnText }}

                <svg
                    width="16"
                    height="16"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path d="M5 12h14" />
                    <path d="m12 5 7 7-7 7" />
                </svg>
            </a>

        </div>

    </div>

</section>

