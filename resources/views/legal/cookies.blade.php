@extends('layouts.app')
@section('title', 'Cookies | Myriad')
@section('content')
<section class="pt-40 pb-24 bg-[var(--color-brand-dark)]">
    <div class="container-myriad"><div class="max-w-2xl">
        <div class="divider-line mb-8"></div>
        <h1 class="font-serif text-white font-black mb-6" style="font-size: clamp(2rem, 4vw, 3rem); letter-spacing: -0.04em;">Cookie Policy.</h1>
    </div></div>
</section>
<section class="py-20 bg-white">
    <div class="container-myriad">
        <div class="max-w-2xl font-sans text-[var(--color-muted)] text-base leading-relaxed space-y-6">
            <p>We use cookies to understand how visitors interact with our website and to improve our content and services.</p>
            <h2 class="font-serif font-black text-[var(--color-brand-dark)] text-xl" style="letter-spacing: -0.025em;">Essential cookies</h2>
            <p>These are necessary for the website to function and cannot be switched off.</p>
            <h2 class="font-serif font-black text-[var(--color-brand-dark)] text-xl" style="letter-spacing: -0.025em;">Analytics cookies</h2>
            <p>We use Google Analytics to understand how visitors use our site. This data is aggregated and anonymous.</p>
            <p>To opt out of analytics cookies or to manage your preferences, please contact us at <a href="mailto:info@myriadglobalmedia.com" class="text-[var(--color-brand-accent)]">info@myriadglobalmedia.com</a>.</p>
        </div>
    </div>
</section>
@endsection
