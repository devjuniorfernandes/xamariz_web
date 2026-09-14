{{--
    Corpo partilhado das páginas SEO /marketing.
    Variáveis esperadas:
      $eyebrow    (string)          — etiqueta acima do H1
      $h1         (string)          — Título principal (H1 real)
      $intro      (string)          — parágrafo de introdução
      $blocks     (array)           — [['title' => H2, 'body' => texto], ...]
      $faq        (array, opcional) — [['q' => Pergunta, 'a' => Resposta], ...]
      $ctaTitle   (string)
      $ctaSubtitle(string)
--}}
@php $faq = collect($faq ?? [])->filter(fn ($f) => trim($f['q'] ?? '') !== '' && trim($f['a'] ?? '') !== '')->values(); @endphp

@if ($faq->count() > 0)
    @push('schema')
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $faq->map(fn ($f) => [
            '@type' => 'Question',
            'name' => $f['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
        ])->all(),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
    @endpush
@endif

{{-- Hero --}}
{{-- Padding-top inline (clamp) para o título ficar sempre abaixo da navbar fixa,
     independentemente do estado da build do Tailwind. --}}
<section class="relative overflow-hidden bg-[#0f1f4a] text-white pb-20 sm:pb-28"
    style="background-image:url('{{ asset('grad.jfif') }}');background-size:cover;background-position:center;padding-top:clamp(9rem, 6rem + 9vw, 14rem);">
    <div class="container-myriad relative z-10">
        <div class="max-w-3xl reveal">
            <div class="flex items-center gap-2 mb-5">
                <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                <span class="font-sans text-xs font-bold uppercase tracking-widest text-white/80">{{ $eyebrow ?? 'Marketing' }}</span>
            </div>
            <h1 class="font-serif font-black text-white leading-[1.05] mb-6"
                style="font-size: clamp(2.25rem, 5vw, 3.5rem); letter-spacing: -0.03em;">
                {{ $h1 }}
            </h1>
            <p class="font-sans text-white/85 text-lg sm:text-xl leading-relaxed max-w-2xl">
                {{ $intro }}
            </p>
        </div>
    </div>
</section>

{{-- Blocos de conteúdo (H2 + texto) --}}
<section class="py-20 sm:py-24 bg-white text-gray-900">
    <div class="container-myriad">
        <div class="max-w-3xl space-y-14">
            @foreach ($blocks as $block)
                <div class="reveal">
                    <h2 class="font-sans font-bold text-2xl sm:text-4xl text-gray-900 tracking-tight mb-5 leading-tight">
                        {{ $block['title'] }}
                    </h2>
                    <p class="font-sans text-gray-700 text-base sm:text-lg leading-relaxed border-l-2 border-[var(--color-brand-accent)] pl-5">
                        {!! nl2br(e($block['body'])) !!}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
@if ($faq->count() > 0)
    <section class="py-20 sm:py-24 bg-gray-50 border-t border-gray-200">
        <div class="container-myriad">
            <div class="max-w-3xl mx-auto">
                <div class="flex items-center gap-2 mb-3 reveal">
                    <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                    <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-500">FAQ</span>
                </div>
                <h2 class="font-sans font-bold text-3xl sm:text-4xl text-gray-900 tracking-tight mb-10 leading-tight reveal">
                    Perguntas frequentes
                </h2>

                <div class="space-y-4">
                    @foreach ($faq as $item)
                        <details class="group reveal rounded-2xl border border-gray-200 bg-white open:border-[var(--color-brand-accent)]/40 open:shadow-[0_8px_30px_rgba(0,0,0,0.06)] transition-all duration-300 [&::-webkit-details-marker]:hidden"
                            {{ $loop->first ? 'open' : '' }}>
                            <summary class="flex items-center justify-between gap-5 cursor-pointer list-none select-none px-6 py-5 font-sans font-semibold text-base sm:text-lg text-gray-900 [&::-webkit-details-marker]:hidden">
                                <span class="group-open:text-[var(--color-brand-accent)] transition-colors">{{ $item['q'] }}</span>
                                <span class="shrink-0 w-9 h-9 rounded-full border border-gray-200 bg-gray-50 group-open:bg-[var(--color-brand-accent)] group-open:border-[var(--color-brand-accent)] flex items-center justify-center transition-all duration-300">
                                    <svg class="w-4 h-4 text-gray-500 group-open:text-white group-open:rotate-45 transition-all duration-300"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                        <line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                </span>
                            </summary>
                            <p class="font-sans text-gray-600 text-base leading-relaxed px-6 pb-6 -mt-1">
                                {{ $item['a'] }}
                            </p>
                        </details>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif

{{-- CTA final padronizado --}}
<x-cta-section :title="$ctaTitle" :subtitle="$ctaSubtitle" />
