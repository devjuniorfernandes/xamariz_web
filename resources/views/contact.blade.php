@extends('layouts.app')

@section('title', \App\Models\SiteSetting::get('seo_contact_title', 'Contacte a Agência Xamariz | Luanda, Angola • Agende uma Conversa'))
@section('description', \App\Models\SiteSetting::get('seo_contact_description', 'Fale com a equipa de especialistas da Xamariz em Luanda, Angola. Agende uma conversa estratégica e descubra como impulsionar o seu negócio.'))

@push('head')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush

@section('content')

    {{-- Header --}}
    <x-page-hero :title="\App\Models\SiteSetting::get('contact_hero_title', 'Contactos')"
        :subtitle="\App\Models\SiteSetting::get('contact_hero_subtitle', '')" />

    {{-- Título editorial da página --}}
    <section class="py-16 sm:py-20 bg-white text-gray-900 border-b border-gray-100">
        <div class="container-myriad">
            <div class="max-w-3xl reveal">
                <h2 class="font-sans text-3xl sm:text-5xl font-normal text-gray-900 tracking-tight leading-[1.12] mb-6">
                    {{ __('contact.hero_title') }}
                </h2>
                <p class="font-sans text-gray-600 text-lg sm:text-xl leading-relaxed">
                    {{ __('contact.hero_subtitle') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Form + Offices --}}
    <section class="py-20 bg-white border-t border-gray-200">
        <div class="container-myriad">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">

                {{-- Contact Form --}}
                <div class="lg:col-span-7 reveal">
                    @if(session('success'))
                        <div class="mb-8 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-none text-sm font-medium">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-8">
                        @csrf

                        <div>
                            <div>
                                <label
                                    class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700 block mb-2">{{ __('contact.first_name') }}</label>
                                <input type="text" name="first_name" placeholder="{{ __('contact.first_name_placeholder') }}"
                                    class="w-full px-4 py-3.5 border border-gray-300 rounded-none focus:outline-none focus:border-[var(--color-brand-accent)] font-sans text-base transition-colors"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label
                                class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700 block mb-2">{{ __('contact.email') }}</label>
                            <input type="email" name="email" placeholder="{{ __('contact.email_placeholder') }}"
                                class="w-full px-4 py-3.5 border border-gray-300 rounded-none focus:outline-none focus:border-[var(--color-brand-accent)] font-sans text-base transition-colors"
                                required>
                        </div>

                        <div>
                            <label
                                class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700 block mb-2">{{ __('contact.message') }}</label>
                            <textarea name="message" rows="5"
                                placeholder="{{ __('contact.message_placeholder') }}"
                                class="w-full px-4 py-3.5 border border-gray-300 rounded-none focus:outline-none focus:border-[var(--color-brand-accent)] font-sans text-base transition-colors"
                                required></textarea>
                        </div>

                        <div>
                            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            @error('g-recaptcha-response')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="inline-flex items-center gap-3 px-8 py-3.5 rounded-full bg-[var(--color-brand-accent)] text-white hover:bg-[var(--color-brand-accent-hover)] text-xs font-semibold uppercase tracking-wider transition-all duration-300 group">
                            <span>{{ __('contact.submit_btn') }}</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                class="group-hover:translate-x-1 transition-transform">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>
                    </form>
                </div>

                {{-- Contact Info Sidebar --}}
                <div class="lg:col-span-4 lg:col-start-9 reveal delay-100">
                    <div class="p-8 border border-gray-200 bg-gray-50/50 rounded-none space-y-8">
                        <h2 class="font-sans text-xl font-bold text-gray-900 tracking-tight border-b border-gray-200 pb-4">
                            {{ __('contact.contact_info_title') }}
                        </h2>

                        <div class="space-y-6">
                            {{-- Endereço --}}
                            <div>
                                <p
                                    class="font-sans text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] mb-1">
                                    {{ __('contact.address_label') }}</p>
                                <p class="font-sans text-gray-700 text-sm leading-relaxed">
                                    {{ \App\Models\SiteSetting::get('address', 'Rua Francisco Sotto Mayor 18, Bairro Azul, Luanda, Angola') }}
                                </p>
                            </div>

                            {{-- Telefone --}}
                            <div>
                                <p
                                    class="font-sans text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] mb-1">
                                    {{ __('contact.phone_label') }}</p>
                                @php $contactPhone = \App\Models\SiteSetting::get('phone', '+244 941 561 422'); @endphp
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contactPhone) }}"
                                    class="font-sans text-sm font-semibold text-gray-900 hover:text-[var(--color-brand-accent)] transition-colors block">
                                    {{ $contactPhone }}
                                </a>
                            </div>

                            {{-- Email --}}
                            <div>
                                <p
                                    class="font-sans text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] mb-1">
                                    {{ __('contact.email_label') }}</p>
                                @php $contactEmail = \App\Models\SiteSetting::get('email', 'info@xamarizmarketing.com'); @endphp
                                <a href="mailto:{{ $contactEmail }}"
                                    class="font-sans text-sm font-semibold text-gray-900 hover:text-[var(--color-brand-accent)] transition-colors block">
                                    {{ $contactEmail }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Google Maps Section (Full Width, 0 Bottom Margin) --}}
    <section class="pt-16 pb-0 bg-white border-t border-gray-200 mb-0">

        <div class="w-full h-[500px] overflow-hidden leading-none border-t border-b border-gray-200">
            <iframe
                title="Localização da Xamariz — Rua Francisco Sotto Mayor 18, Bairro Azul, Luanda"
                src="https://maps.google.com/maps?q=-8.827960672144876,13.22004904995043&z=16&hl=pt-PT&output=embed"
                width="600" height="500"
                class="w-full h-full border-0 block" allowfullscreen="" loading="lazy"
                referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
    </section>

@endsection
