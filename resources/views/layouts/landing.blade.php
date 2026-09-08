<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $defaultTitle = \App\Models\SiteSetting::get('seo_meta_title_default', 'Xamariz | Agência de Publicidade Angola & Internacional • Marketing 360°');
        $defaultDesc = \App\Models\SiteSetting::get('seo_meta_description_default', 'A Xamariz é a agência líder em Publicidade, Comunicação e Marketing 360° em Luanda, Angola.');
        $defaultOgImage = \App\Models\SiteSetting::get('seo_og_image_default', 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=1200&auto=format&fit=crop&q=80');
        $googleVerification = \App\Models\SiteSetting::get('seo_google_site_verification');
        $gaId = \App\Models\SiteSetting::get('seo_google_analytics_id');
    @endphp

    {{-- Primary Meta Tags --}}
    <title>@yield('title', $defaultTitle)</title>
    <meta name="title" content="@yield('title', $defaultTitle)">
    <meta name="description" content="@yield('description', $defaultDesc)">
    <meta name="author" content="Xamariz (Visualclick, Lda)">
    <meta name="robots" content="@yield('meta_robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1')">
    <link rel="canonical" href="@yield('canonical', url()->current())">

    {{-- Geo Tags (Local SEO Angola) --}}
    <meta name="geo.region" content="AO-LUA">
    <meta name="geo.placename" content="Luanda">
    <meta name="geo.position" content="-8.8368;13.2343">
    <meta name="ICBM" content="-8.8368, 13.2343">

    @if($googleVerification)
        <meta name="google-site-verification" content="{{ $googleVerification }}">
    @endif

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:site_name" content="Xamariz Energy">
    <meta property="og:title" content="@yield('og_title', View::hasSection('title') ? View::getSection('title') : $defaultTitle)">
    <meta property="og:description" content="@yield('og_description', View::hasSection('description') ? View::getSection('description') : $defaultDesc)">
    <meta property="og:image" content="@yield('og_image', $defaultOgImage)">
    <meta property="og:locale" content="pt_AO">

    {{-- Twitter / X Cards --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', View::hasSection('title') ? View::getSection('title') : $defaultTitle)">
    <meta name="twitter:description" content="@yield('og_description', View::hasSection('description') ? View::getSection('description') : $defaultDesc)">
    <meta name="twitter:image" content="@yield('og_image', $defaultOgImage)">

    {{-- Favicon & Brand Icons --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#111215">

    {{-- Fonts: Inter (base, para o language-switcher/UI) + Barlow/Roboto (tema O&G) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,700&family=Inter:wght@300;400;500;600;700;800;900&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="antialiased bg-[#111215]" id="top">

    {{-- Landing Header (dedicado) --}}
    @include('components.landing.oilandgas-header')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Landing Footer (dedicado) --}}
    @include('components.landing.oilandgas-footer')

    @stack('scripts')
</body>
</html>
