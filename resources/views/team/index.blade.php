@extends('layouts.app')

@section('title', 'Equipa | Xamariz')
@section('description', 'Conheça a equipa de especialistas da Xamariz — as pessoas que transformam ideias complexas em comunicação clara e de impacto.')

@section('content')

    {{-- Header padronizado --}}
    <x-page-hero title="Equipa"
        subtitle="Os especialistas que dão vida à comunicação da sua marca." />

    {{-- A NOSSA EQUIPA --}}
    @if (($ceoMember ?? null) || (isset($teamMembers) && $teamMembers->count() > 0))
        <section class="py-20 sm:py-24 bg-white">
            <div class="container-myriad">
                <div class="reveal mb-12">
                    <h2 class="font-sans text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">As pessoas por trás da Xamariz.</h2>
                    <p class="font-sans text-gray-600 text-sm sm:text-base max-w-2xl mt-3">Uma equipa de especialistas unidos por uma mesma convicção: uma boa comunicação começa por compreender o desafio.</p>
                </div>

                @if ($ceoMember ?? null)
                    @php
                        $ceoPhoto = $ceoMember->photo_src
                            ?: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80';
                    @endphp
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center mb-20 reveal">
                        <div class="lg:col-span-5 pb-8">
                            <div class="aspect-square overflow-hidden bg-gray-100">
                                <img src="{{ $ceoPhoto }}" alt="{{ $ceoMember->name }}" class="w-full h-full object-cover object-top grayscale-[10%] hover:grayscale-0 transition-all duration-500">
                            </div>
                        </div>
                        <div class="lg:col-span-7 space-y-6">
                            <div>
                                <h3 class="font-sans text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight mb-1">{{ $ceoMember->name }}</h3>
                                <p class="font-sans text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] mb-4">{{ $ceoMember->role }}</p>
                                @if ($ceoMember->quote)
                                    <p class="font-sans text-gray-700 text-lg leading-relaxed italic border-l-2 border-[var(--color-brand-accent)] pl-4">"{{ $ceoMember->quote }}"</p>
                                @endif
                            </div>
                            @if ($ceoMember->bio)
                                <div class="border-t border-gray-200 pt-6 space-y-4">
                                    <h4 class="font-sans text-lg font-bold text-gray-900 tracking-tight">{{ \App\Models\SiteSetting::get('team_ceo_bio_title', 'Experiência & Visão de Liderança') }}</h4>
                                    <p class="font-sans text-gray-600 text-sm leading-relaxed">{!! nl2br(e($ceoMember->bio)) !!}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                @if (isset($teamMembers) && $teamMembers->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-8 gap-y-12 mt-20 lg:mt-28 pt-12 border-t border-gray-100">
                        @foreach ($teamMembers as $member)
                            @php
                                $photo = $member->photo_src
                                    ?: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=800&auto=format&fit=crop&q=80';
                            @endphp
                            <div class="group reveal">
                                <div class="aspect-[3/4] overflow-hidden bg-gray-200 mb-4">
                                    <img src="{{ $photo }}" alt="{{ $member->name }}" class="w-full h-full object-cover grayscale-[15%] group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500">
                                </div>
                                <h3 class="font-sans font-bold text-gray-900 text-lg tracking-tight group-hover:text-[var(--color-brand-accent)] transition-colors">{{ $member->name }}</h3>
                                <p class="font-sans text-xs text-gray-500 font-semibold tracking-wide uppercase mt-1">{{ $member->role }}</p>
                                @if ($member->bio)
                                    <p class="font-sans text-xs text-gray-600 leading-relaxed mt-2 line-clamp-2">{{ $member->bio }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- CTA --}}
    <x-cta-section />

@endsection
