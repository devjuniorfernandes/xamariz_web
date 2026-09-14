@props([
    'eyebrow' => null,
    'title' => '',
    'subtitle' => null,
])

{{-- Hero padronizado (estilo das páginas /marketing).
     padding-top inline (clamp) para o título ficar sempre abaixo da navbar fixa. --}}
<section class="relative overflow-hidden bg-[#0f1f4a] text-white pb-20 sm:pb-28"
    style="background-image:url('{{ asset('grad.jfif') }}');background-size:cover;background-position:center;background-repeat:no-repeat;padding-top:clamp(9rem, 6rem + 9vw, 14rem);">
    <div class="container-myriad relative z-10">
        <div class="max-w-3xl reveal">
            @if ($eyebrow)
                <div class="flex items-center gap-2 mb-5">
                    <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                    <span class="font-sans text-xs font-bold uppercase tracking-widest text-white/80">{{ $eyebrow }}</span>
                </div>
            @endif
            <h1 class="font-serif font-black text-white leading-[1.05] mb-6"
                style="font-size: clamp(2.25rem, 5vw, 3.5rem); letter-spacing: -0.03em;">
                {!! nl2br(e($title)) !!}
            </h1>
            @if ($subtitle)
                <p class="font-sans text-white/85 text-lg sm:text-xl leading-relaxed max-w-2xl">
                    {{ $subtitle }}
                </p>
            @endif
        </div>
    </div>
</section>
