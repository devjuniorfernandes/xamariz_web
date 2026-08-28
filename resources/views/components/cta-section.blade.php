@props([
    'title' => 'Vamos começar.',
    'subtitle' => 'Conte-nos sobre o seu projeto. Vamos construir o sucesso juntos.',
    'btnText' => 'AGENDE UMA CONVERSA',
    'btnUrl' => route('contact'),
])

{{-- ══════════════════════════════════════════════
 CTA FINAL PADRONIZADO (DESIGN SYSTEM)
════════════════════════════════════════════════ --}}
<section class="py-32 bg-[var(--color-brand-dark)]">
    <div class="container-myriad text-center">
        <div class="reveal">
            <div class="divider-line mb-8 mx-auto"></div>
            <h2 class="font-serif text-white font-black mb-6"
                style="font-size: clamp(2rem, 5vw, 4.5rem); letter-spacing: -0.04em;">
                {{ $title }}
            </h2>
            <p class="font-sans text-white/50 text-xl mb-12 max-w-md mx-auto leading-relaxed">
                {{ $subtitle }}
            </p>
            <a href="{{ $btnUrl }}" class="btn-primary text-base px-8 py-4">
                {{ $btnText }}
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <path d="M5 12h14" />
                    <path d="m12 5 7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
</section>
