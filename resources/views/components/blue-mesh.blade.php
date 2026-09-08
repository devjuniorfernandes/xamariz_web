{{-- Overlay decorativo: malha geométrica em laranja (acento da marca) sobre fundo azul.
     Mesmo tratamento da secção "As empresas não estão a falhar. Estão a comunicar mal." --}}
<div class="absolute inset-0 pointer-events-none opacity-25">
    <svg class="absolute right-0 top-0 h-full w-1/2 text-[var(--color-brand-accent)]" viewBox="0 0 600 600"
        fill="none" stroke="currentColor">
        <g stroke-width="1.2">
            <path d="M100 0 L600 500" opacity="0.4" />
            <path d="M200 0 L600 400" opacity="0.5" />
            <path d="M300 0 L600 300" opacity="0.6" />
            <path d="M400 0 L600 200" opacity="0.7" />
            <path d="M500 0 L600 100" opacity="0.8" />

            <path d="M600 0 L100 500" opacity="0.4" />
            <path d="M600 100 L200 500" opacity="0.5" />
            <path d="M600 200 L300 500" opacity="0.6" />
            <path d="M600 300 L400 500" opacity="0.7" />

            <circle cx="450" cy="200" r="180" stroke-dasharray="4 4" opacity="0.3" />
            <circle cx="450" cy="200" r="300" stroke-dasharray="6 6" opacity="0.2" />
        </g>
    </svg>

    <svg class="absolute -right-20 -bottom-20 w-[600px] h-[600px] text-[var(--color-brand-accent)]"
        viewBox="0 0 400 400" fill="none" stroke="currentColor">
        <path d="M0,400 Q200,200 400,0 M0,350 Q200,150 400,-50 M0,300 Q200,100 400,-100 M0,250 Q200,50 400,-150"
            stroke-width="1" opacity="0.3" />
    </svg>
</div>
