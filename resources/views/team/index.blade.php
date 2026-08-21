@extends('layouts.app')

@section('title', 'Equipa & Liderança | Xamariz Agência de Publicidade Angola')
@section('description',
    'Conheça o CEO e a equipa de 18 especialistas em Marketing 360°, Publicidade, Branding e
    Estratégia Digital da Xamariz em Luanda, Angola.')

@section('content')

    {{-- Header --}}
    <section class="pt-40 pb-16 bg-white text-gray-900">
        <div class="container-myriad">
            <div class="reveal flex items-center gap-3 text-xs uppercase font-sans tracking-widest mb-6 sm:mb-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Xamariz</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">Equipa & Liderança</span>
            </div>

            <div class="max-w-3xl reveal">
                <h1
                    class="font-sans text-4xl sm:text-6xl md:text-7xl font-normal text-gray-900 tracking-tight leading-[1.12] mb-6">
                    Liderança criativa e estratégica ao serviço da sua marca.
                </h1>
                <p class="font-sans text-gray-600 text-lg sm:text-xl leading-relaxed">
                    Conheça a nossa liderança executiva e os especialistas que transformam ideias em campanhas de alto
                    impacto que dominam o mercado em Angola e internacionalmente.
                </p>
            </div>
        </div>
    </section>

    {{-- CEO Highlight Section --}}
    @if(isset($ceoMember) && $ceoMember)
    <section class="pb-20 bg-white">
        <div class="container-myriad">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center p-8 sm:p-12">

                {{-- CEO Photo Column --}}
                <div class="lg:col-span-5 reveal">
                    <div class="aspect-[3/4] overflow-hidden rounded-none bg-gray-100 relative group">
                        @php
                            $ceoPhoto = $ceoMember->photo_path ? (Str::startsWith($ceoMember->photo_path, ['http://', 'https://']) ? $ceoMember->photo_path : asset(ltrim($ceoMember->photo_path, '/'))) : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80';
                        @endphp
                        <img src="{{ $ceoPhoto }}"
                            alt="{{ $ceoMember->name }} - {{ $ceoMember->role }}"
                            class="w-full h-full object-cover rounded-none grayscale-[10%] group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500 ease-out">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                        </div>
                    </div>
                </div>

                {{-- CEO Details Column --}}
                <div class="lg:col-span-7 reveal delay-100 space-y-6">

                    <div>
                        <h2 class="font-sans text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight mb-1">
                            {{ $ceoMember->name }}
                        </h2>
                        <p
                            class="font-sans text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] mb-4">
                            {{ $ceoMember->role }}
                        </p>
                        @if($ceoMember->quote)
                            <p
                                class="font-sans text-gray-700 text-lg leading-relaxed italic border-l-2 border-[var(--color-brand-accent)] pl-4">
                                "{{ $ceoMember->quote }}"
                            </p>
                        @endif
                    </div>

                    {{-- Social Media Links --}}
                    @if($ceoMember->social_linkedin || $ceoMember->social_twitter || $ceoMember->social_instagram || $ceoMember->email)
                    <div class="flex items-center gap-4 pt-2">
                        <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-500">REDES SOCIAIS:</span>
                        @if($ceoMember->social_linkedin)
                        <a href="{{ $ceoMember->social_linkedin }}" target="_blank" rel="noopener" title="LinkedIn"
                            class="p-2 text-gray-700 hover:text-white hover:bg-[var(--color-brand-accent)] hover:border-[var(--color-brand-accent)] transition-all duration-200 rounded-none">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                                <rect x="2" y="9" width="4" height="12" />
                                <circle cx="4" cy="4" r="2" />
                            </svg>
                        </a>
                        @endif
                        @if($ceoMember->social_twitter)
                        <a href="{{ $ceoMember->social_twitter }}" target="_blank" rel="noopener" title="Twitter/X"
                            class="p-2 text-gray-700 hover:text-white hover:bg-[var(--color-brand-accent)] hover:border-[var(--color-brand-accent)] transition-all duration-200 rounded-none">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z" />
                            </svg>
                        </a>
                        @endif
                        @if($ceoMember->social_instagram)
                        <a href="{{ $ceoMember->social_instagram }}" target="_blank" rel="noopener" title="Instagram"
                            class="p-2 text-gray-700 hover:text-white hover:bg-[var(--color-brand-accent)] hover:border-[var(--color-brand-accent)] transition-all duration-200 rounded-none">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                            </svg>
                        </a>
                        @endif
                        @if($ceoMember->email)
                        <a href="mailto:{{ $ceoMember->email }}" title="Email"
                            class="p-2 text-gray-700 hover:text-white hover:bg-[var(--color-brand-accent)] hover:border-[var(--color-brand-accent)] transition-all duration-200 rounded-none">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                        </a>
                        @endif
                    </div>
                    @endif

                    @if($ceoMember->bio)
                    <div class="border-t border-gray-200 pt-6 space-y-4">
                        <h3 class="font-sans text-lg font-bold text-gray-900 tracking-tight">
                            Experiência & Visão de Liderança
                        </h3>
                        <p class="font-sans text-gray-600 text-sm leading-relaxed">
                            {{ $ceoMember->bio }}
                        </p>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- Board of Directors & Team Grid Section --}}
    @if(isset($teamMembers) && $teamMembers->count() > 0)
    <section class="py-20 bg-[#f9fafb] border-t border-gray-200">
        <div class="container-myriad">

            <div class="reveal mb-12 flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                        <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700">DIREÇÃO &
                            EQUIPA</span>
                    </div>
                    <h2 class="font-sans text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">
                        Conselho de Direção & Especialistas
                    </h2>
                </div>
                <p class="font-sans text-gray-600 text-sm max-w-md">
                    Uma equipa integrada de especialistas dedicados à excelência comercial e criativa da sua marca.
                </p>
            </div>

            {{-- Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-8 gap-y-12">
                @foreach ($teamMembers as $member)
                    @php
                        $name = is_object($member) ? $member->name : $member['name'];
                        $role = is_object($member) ? $member->role : $member['role'];
                        $bio = is_object($member) ? $member->bio : ($member['bio'] ?? '');
                        $photoPath = is_object($member) ? $member->photo_path : ($member['img'] ?? '');
                        $photo = $photoPath ? (Str::startsWith($photoPath, ['http://', 'https://']) ? $photoPath : asset(ltrim($photoPath, '/'))) : 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=800&auto=format&fit=crop&q=80';
                    @endphp
                    <div class="group reveal cursor-pointer">
                        {{-- Profile Photo Container with Hover Zoom & Subtle Vignette --}}
                        <div class="aspect-[3/4] overflow-hidden rounded-none bg-gray-200 mb-4 relative">
                            <img src="{{ $photo }}" alt="{{ $name }}"
                                class="w-full h-full object-cover rounded-none grayscale-[15%] group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500 ease-out">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                            </div>
                        </div>

                        {{-- Member Info --}}
                        <div class="flex items-start gap-2.5">
                            <span
                                class="w-2.5 h-2.5 bg-[var(--color-brand-accent)] rounded-full shrink-0 mt-1.5 inline-block group-hover:scale-125 transition-transform duration-300"></span>

                            <div>
                                <h3
                                    class="font-sans font-bold text-gray-900 text-lg tracking-tight leading-tight group-hover:text-[var(--color-brand-accent)] transition-colors duration-300">
                                    {{ $name }}
                                </h3>
                                <p class="font-sans text-xs text-gray-500 font-semibold tracking-wide uppercase mt-1">
                                    {{ $role }}
                                </p>
                                @if($bio)
                                    <p class="font-sans text-xs text-gray-600 leading-relaxed mt-2 line-clamp-2">
                                        {{ $bio }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    @elseif(!isset($ceoMember) || !$ceoMember)
        <section class="py-24 bg-white text-center">
            <div class="container-myriad">
                <p class="font-sans text-gray-500 text-lg">Nenhum membro da equipa registado de momento.</p>
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-24 bg-[var(--color-brand-dark)] text-white">
        <div class="container-myriad text-center reveal">
            <div class="inline-flex items-center gap-2 mb-4">
                <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-brand-accent)] inline-block"></span>
                <span class="font-sans text-xs font-bold uppercase tracking-widest text-gray-400">TRABALHE CONNOSCO</span>
            </div>
            <h2 class="font-sans text-3xl sm:text-5xl font-normal text-white mb-6 tracking-tight">
                Pronto para impulsionar o seu negócio?
            </h2>
            <p class="font-sans text-gray-400 text-lg mb-10 max-w-md mx-auto leading-relaxed">
                A nossa equipa de 18 especialistas está pronta para desenhar a estratégia de Marketing 360° ideal para a sua
                empresa.
            </p>
            <a href="{{ route('contact') }}"
                class="inline-flex items-center gap-3 px-8 py-3.5 rounded-full bg-[var(--color-brand-accent)] text-white hover:bg-[var(--color-brand-accent-hover)] text-xs font-semibold uppercase tracking-wider transition-all duration-300 group">
                <span>FALAR COM A EQUIPA</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                    class="group-hover:translate-x-1 transition-transform">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>
    </section>

@endsection
