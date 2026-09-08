@props([
    'src' => '',
    'mode' => 'embed',      {{-- 'background' (loop mudo, cobre o contentor) | 'embed' (modal com controlos) --}}
    'deferred' => false,    {{-- true: não carrega/reproduz até ser ativado por JS (modais) --}}
    'poster' => null,
])

@php
    use App\Support\VideoEmbed;
    $type = VideoEmbed::type($src);
    $isBg = $mode === 'background';
@endphp

@if($type === 'file')
    @php $fileUrl = $deferred ? '' : VideoEmbed::fileUrl($src); @endphp
    <video
        {{ $attributes->class($isBg ? 'absolute inset-0 w-full h-full object-cover' : 'w-full h-full') }}
        @if($isBg) autoplay muted loop playsinline @else controls playsinline @endif
        preload="{{ $deferred ? 'none' : 'auto' }}"
        @if($poster) poster="{{ $poster }}" @endif
        @if($deferred) data-video-file data-src="{{ VideoEmbed::fileUrl($src) }}" @endif>
        @if(! $deferred)
            <source src="{{ $fileUrl }}" type="{{ VideoEmbed::mime($src) }}">
        @endif
    </video>

@elseif(in_array($type, ['youtube', 'vimeo', 'embed']))
    @php $embedUrl = VideoEmbed::embedUrl($src, $isBg ? 'background' : 'modal'); @endphp

    @if($isBg)
        {{-- Iframe escalado para cobrir o contentor como fundo (16:9). --}}
        <div {{ $attributes->class('absolute inset-0 overflow-hidden pointer-events-none') }}>
            <iframe
                style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:100vw;height:56.25vw;min-height:100%;min-width:177.78vh;"
                src="{{ $embedUrl }}"
                frameborder="0"
                allow="autoplay; fullscreen; encrypted-media; picture-in-picture"
                allowfullscreen
                tabindex="-1"
                aria-hidden="true"></iframe>
        </div>
    @else
        <iframe
            {{ $attributes->class('w-full h-full') }}
            @if($deferred) src="" data-video-embed data-src="{{ $embedUrl }}" @else src="{{ $embedUrl }}" @endif
            frameborder="0"
            allow="autoplay; fullscreen; encrypted-media; picture-in-picture"
            allowfullscreen></iframe>
    @endif

@else
    {{-- Sem fonte definida: nada a renderizar. --}}
@endif
