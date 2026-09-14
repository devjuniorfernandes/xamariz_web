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
    class="relative overflow-hidden py-32 text-white bg-[#0f1f4a]"
    style="background-image:url('{{ asset('grad.jfif') }}');background-size:cover;background-position:center;background-repeat:no-repeat;"
>


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

