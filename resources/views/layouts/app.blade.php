<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Xamariz | Agência de Publicidade Angola & Internacional • Marketing 360°')</title>
    <meta name="description" content="@yield('description', 'Xamariz é a agência líder em Publicidade, Comunicação e Marketing 360° em Luanda, Angola e Internacional. Comunicação clara, estratégia de diferenciação e resultados de alto impacto.')">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', 'Xamariz | Agência de Publicidade Angola & Internacional • Marketing 360°')">
    <meta property="og:description" content="@yield('og_description', 'Comunicação clara e estratégia de diferenciação para a sua empresa dominar o mercado.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">

    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,700&display=swap" rel="stylesheet">

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="antialiased">

    {{-- Custom Orange Circle Cursor --}}
    <div id="custom-cursor-follower" class="fixed top-0 left-0 w-10 h-10 -ml-5 -mt-5 rounded-full border-2 border-[var(--color-brand-accent)] pointer-events-none z-[99999] opacity-0 hidden md:block"></div>
    <div id="custom-cursor-dot" class="fixed top-0 left-0 w-2.5 h-2.5 -ml-1.25 -mt-1.25 rounded-full bg-[var(--color-brand-accent)] pointer-events-none z-[99999] opacity-0 hidden md:block"></div>

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Showreel Modal (global) --}}
    <div id="showreel-modal" class="hidden fixed inset-0 z-[9999] bg-black/90 items-center justify-center p-4">
        <button id="showreel-close" class="absolute top-6 right-6 text-white hover:text-[var(--color-brand-accent)] transition-colors">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
        <div class="w-full max-w-5xl aspect-video bg-black">
            <iframe
                class="w-full h-full"
                src="https://player.vimeo.com/video/1234567890?autoplay=1&color=fe3d0a"
                frameborder="0"
                allow="autoplay; fullscreen"
                allowfullscreen>
            </iframe>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
