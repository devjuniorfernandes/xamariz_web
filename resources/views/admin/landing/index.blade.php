@extends('admin.layouts.app')

@section('title', 'Landing Page | CMS Xamariz')
@section('header_title', 'Conteúdo da Landing Page (Energy)')

@php
    $localeNames = config('app.available_locales', []);
@endphp

@section('content')
<div class="max-w-6xl mx-auto space-y-6" x-data="{ section: 0 }">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-white tracking-tight">Landing Page — Oil &amp; Gas</h2>
            <p class="text-xs text-gray-400 mt-0.5">Edite o conteúdo da landing. A versão inglesa usa as traduções do sistema; se um campo ficar vazio, usa-se o texto base. <a href="{{ route('landing.oilandgas') }}" target="_blank" class="text-[var(--color-brand-accent)] font-bold hover:underline">Ver landing →</a></p>
        </div>
    </div>

    {{-- Navegação de secções --}}
    <div class="flex items-center gap-2 border-b border-[#2c2d30] pb-3 overflow-x-auto no-scrollbar">
        @foreach($sections as $i => $section)
            <button type="button" @click="section = {{ $i }}"
                :class="section === {{ $i }} ? 'bg-[var(--color-brand-accent)] text-white' : 'bg-[#1f2022] text-gray-400 hover:text-white hover:bg-[#2c2d30]'"
                class="px-4 py-2 rounded-full text-[11px] font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer">
                {{ $section['title'] }}
            </button>
        @endforeach
    </div>

    <form action="{{ route('admin.landing.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        @foreach($sections as $i => $section)
            <div x-show="section === {{ $i }}" x-transition class="bg-[#1f2022] border border-[#2c2d30] p-6 sm:p-8 space-y-8">
                <h3 class="text-sm font-bold uppercase tracking-wider text-[var(--color-brand-accent)]">{{ $section['title'] }}</h3>

                @foreach($section['fields'] as $key => $field)
                    @php $type = $field['type'] ?? 'text'; @endphp
                    <div class="space-y-3 pb-6 border-b border-[#2c2d30] last:border-0 last:pb-0">
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300">
                            {{ $field['label'] }}
                            @if($type === 'list')<span class="text-gray-500 normal-case font-normal">— um item por linha</span>@endif
                            @if($type === 'image')<span class="text-gray-500 normal-case font-normal">— igual em todos os idiomas</span>@endif
                        </label>

                        @if($type === 'image')
                            @php $imgVal = $images[$key] ?? ($field['default'] ?? ''); @endphp
                            <div class="flex items-start gap-4">
                                @if($imgVal)
                                    <img src="{{ \Illuminate\Support\Str::startsWith($imgVal, ['http://','https://','/']) ? $imgVal : asset($imgVal) }}" alt="" class="h-20 w-32 object-cover border border-[#2c2d30]" onerror="this.style.display='none'">
                                @endif
                                <div class="flex-1 space-y-2">
                                    <input type="text" name="{{ $key }}" value="{{ $imgVal }}" placeholder="oil.jpg  ou  https://..."
                                        class="w-full px-3 py-2.5 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                                    <input type="file" name="{{ $key }}_file" accept="image/*"
                                        class="w-full text-xs text-gray-400 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:bg-gray-800 file:text-white">
                                </div>
                            </div>
                        @else
                            @php $L = $locales[0] ?? 'pt'; @endphp
                            @if($type === 'textarea' || $type === 'list')
                                <textarea name="c[{{ $L }}][{{ $key }}]" rows="{{ $type === 'list' ? 5 : 3 }}"
                                    class="w-full px-3 py-2.5 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm leading-relaxed">{{ $values[$L][$key] ?? '' }}</textarea>
                            @else
                                <input type="text" name="c[{{ $L }}][{{ $key }}]" value="{{ $values[$L][$key] ?? '' }}"
                                    class="w-full px-3 py-2.5 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                            @endif
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach

        {{-- Barra de guardar fixa --}}
        <div class="sticky bottom-0 -mx-2 px-2 py-4 bg-[#141414]/95 backdrop-blur border-t border-[#2c2d30] flex items-center justify-between">
            <span class="text-xs text-gray-500">As alterações aplicam-se a todos os separadores de uma só vez.</span>
            <button type="submit" class="admin-btn px-8 py-3.5 rounded-full bg-[var(--color-brand-accent)] hover:bg-[#e03405] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[var(--color-brand-accent)]/25 transition-all cursor-pointer">
                Guardar Conteúdo
            </button>
        </div>
    </form>

</div>
@endsection
