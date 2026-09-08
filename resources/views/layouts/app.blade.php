<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $defaultTitle = \App\Models\SiteSetting::get('seo_meta_title_default', 'Xamariz | Agência de Publicidade Angola & Internacional • Marketing 360°');
        $defaultDesc = \App\Models\SiteSetting::get('seo_meta_description_default', 'A Xamariz é a agência líder em Publicidade, Comunicação e Marketing 360° em Luanda, Angola. Transformamos a sua mensagem em clareza, diferenciação e resultados de alto impacto.');
        $defaultKeywords = \App\Models\SiteSetting::get('seo_meta_keywords_default', 'agência publicidade angola, marketing 360 luanda, publicidade angola, branding luanda, agência de comunicação angola, produção audiovisual angola');
        $defaultOgImage = \App\Models\SiteSetting::get('seo_og_image_default', 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=1200&auto=format&fit=crop&q=80');
        $googleVerification = \App\Models\SiteSetting::get('seo_google_site_verification');
        $gaId = \App\Models\SiteSetting::get('seo_google_analytics_id');
    @endphp

    {{-- Primary Meta Tags --}}
    <title>@yield('title', $defaultTitle)</title>
    <meta name="title" content="@yield('title', $defaultTitle)">
    <meta name="description" content="@yield('description', $defaultDesc)">
    <meta name="keywords" content="@yield('keywords', $defaultKeywords)">
    <meta name="author" content="Xamariz (Visualclick, Lda)">
    <meta name="robots" content="@yield('meta_robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1')">
    <link rel="canonical" href="@yield('canonical', url()->current())">

    {{-- Geo Tags (Local SEO Angola) --}}
    <meta name="geo.region" content="AO-LUA">
    <meta name="geo.placename" content="Luanda">
    <meta name="geo.position" content="-8.8368;13.2343">
    <meta name="ICBM" content="-8.8368, 13.2343">

    {{-- Google Search Console Verification --}}
    @if($googleVerification)
        <meta name="google-site-verification" content="{{ $googleVerification }}">
    @endif

    {{-- Open Graph / Facebook / WhatsApp / LinkedIn --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:site_name" content="Xamariz Marketing 360°">
    <meta property="og:title" content="@yield('og_title', View::hasSection('title') ? View::getSection('title') : $defaultTitle)">
    <meta property="og:description" content="@yield('og_description', View::hasSection('description') ? View::getSection('description') : $defaultDesc)">
    <meta property="og:image" content="@yield('og_image', $defaultOgImage)">
    <meta property="og:image:alt" content="Xamariz - Agência de Publicidade e Marketing 360°">
    <meta property="og:locale" content="pt_AO">

    {{-- Twitter / X Cards --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="@yield('canonical', url()->current())">
    <meta name="twitter:title" content="@yield('og_title', View::hasSection('title') ? View::getSection('title') : $defaultTitle)">
    <meta name="twitter:description" content="@yield('og_description', View::hasSection('description') ? View::getSection('description') : $defaultDesc)">
    <meta name="twitter:image" content="@yield('og_image', $defaultOgImage)">

    {{-- Favicon & Brand Icons --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#fe3d0a">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,700&display=swap" rel="stylesheet">

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    {{-- Google Analytics GA4 (If configured in CMS) --}}
    @if($gaId)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $gaId }}');
        </script>
    @endif

    {{-- JSON-LD Schema.org (Organization & Local Business) --}}
    @php
        $schemaOrg = [
            '@context' => 'https://schema.org',
            '@type' => 'AdvertisingAgency',
            'name' => \App\Models\SiteSetting::get('site_name', 'Xamariz'),
            'url' => url('/'),
            'logo' => asset('logo_xamariz.svg'),
            'image' => $defaultOgImage,
            'description' => $defaultDesc,
            'telephone' => \App\Models\SiteSetting::get('phone', '+244 941 561 422'),
            'email' => \App\Models\SiteSetting::get('email', 'geral@xamariz.ao'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => \App\Models\SiteSetting::get('address', 'Rua Francisco Sotto Mayor 18, Bairro Azul'),
                'addressLocality' => 'Luanda',
                'addressCountry' => 'AO'
            ],
            'priceRange' => '$$$',
            'openingHours' => 'Mo-Fr 08:30-17:30',
            'sameAs' => array_filter([
                \App\Models\SiteSetting::get('linkedin', 'https://linkedin.com/company/xamariz'),
                \App\Models\SiteSetting::get('instagram', 'https://instagram.com/xamariz.ao'),
                \App\Models\SiteSetting::get('facebook'),
            ])
        ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($schemaOrg, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
    </script>
    @stack('schema')

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
        <div id="showreel-player" class="w-full max-w-5xl aspect-video bg-black">
            <x-video mode="embed" deferred
                :src="\App\Models\SiteSetting::get('showreel_video_url', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ')" />
        </div>
    </div>

    @stack('scripts')
</body>
</html>
