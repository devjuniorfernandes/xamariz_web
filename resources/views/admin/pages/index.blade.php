@extends('admin.layouts.app')

@section('title', 'Gestão de Páginas | CMS Xamariz')
@section('header_title', 'Páginas & Conteúdos do Site')

@php
    $firstTab = array_key_first($pages);
@endphp

@section('content')
<div class="max-w-5xl mx-auto space-y-6" x-data="{ tab: '{{ request('tab', $firstTab) }}' }">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-white tracking-tight">Conteúdo das Páginas</h2>
            <p class="text-xs text-gray-400 mt-0.5">Selecione uma página e edite todo o conteúdo apresentado no site. Cada separador corresponde a uma página pública.</p>
        </div>
    </div>

    {{-- Tabs: uma por página --}}
    <div class="flex items-center gap-2 border-b border-[#2c2d30] pb-3 overflow-x-auto no-scrollbar">
        @foreach($pages as $slug => $page)
            <button type="button" @click="tab = '{{ $slug }}'"
                :class="tab === '{{ $slug }}' ? 'bg-[var(--color-brand-accent)] text-white' : 'bg-[#1f2022] text-gray-400 hover:text-white hover:bg-[#2c2d30]'"
                class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer flex items-center gap-2">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $page['icon'] }}"></path></svg>
                <span>{{ $page['label'] }}</span>
                @if(($page['status'] ?? 'active') === 'pending')
                    <span class="text-[9px] font-bold px-1.5 py-0.5 rounded-full bg-amber-500/20 text-amber-300">Em breve</span>
                @endif
            </button>
        @endforeach
    </div>

    <form action="{{ route('admin.pages.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <input type="hidden" name="active_tab" :value="tab">

        @foreach($pages as $slug => $page)
            <div x-show="tab === '{{ $slug }}'" x-transition class="space-y-6">

                @if(!empty($page['note']))
                    <div class="flex items-start gap-3 p-4 bg-[#141414] border border-[#2c2d30] text-xs text-gray-400">
                        <svg class="w-4 h-4 mt-0.5 shrink-0 text-[var(--color-brand-accent)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>{{ $page['note'] }}</span>
                    </div>
                @endif

                @if(empty($page['sections']))
                    {{-- Página só-informativa (conteúdo gerido noutro local) --}}
                    <div class="bg-[#1f2022] border border-dashed border-[#2c2d30] p-10 text-center space-y-3">
                        <div class="w-12 h-12 mx-auto rounded-full bg-[#141414] flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Sem campos editáveis nesta página</h3>
                        <p class="text-xs text-gray-400 max-w-md mx-auto">O conteúdo de <strong class="text-gray-200">{{ $page['label'] }}</strong> é gerido nos locais indicados acima.</p>
                    </div>
                @else
                    @foreach($page['sections'] as $section)
                        <div class="bg-[#1f2022] border border-[#2c2d30] p-6 sm:p-8 space-y-6">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-[var(--color-brand-accent)]">{{ $section['title'] }}</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach($section['fields'] as $key => $field)
                                    @php
                                        $type = $field['type'] ?? 'text';
                                        $value = old($key, $settings[$key] ?? ($field['default'] ?? ''));
                                        $wide  = in_array($type, ['textarea', 'image', 'video']) || (($field['rows'] ?? 0) >= 6);
                                    @endphp

                                    <div class="{{ $wide ? 'md:col-span-2' : '' }} space-y-2">
                                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300">{{ $field['label'] }}</label>

                                        @if($type === 'textarea')
                                            <textarea name="{{ $key }}" rows="{{ $field['rows'] ?? 3 }}"
                                                class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm leading-relaxed">{{ $value }}</textarea>

                                        @elseif($type === 'image')
                                            @if($value)
                                                <img src="{{ $value }}" alt="" class="h-24 w-auto object-cover border border-[#2c2d30]" onerror="this.style.display='none'">
                                            @endif
                                            <input type="text" name="{{ $key }}" value="{{ $value }}" placeholder="https://... ou caminho do ficheiro"
                                                class="w-full px-4 py-2.5 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-xs">
                                            <input type="file" name="{{ $key }}_file" accept="image/*"
                                                class="w-full text-xs text-gray-400 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:bg-gray-800 file:text-white">

                                        @elseif($type === 'toggle')
                                            @php $checked = filter_var(old($key, $settings[$key] ?? ($field['default'] ?? '1')), FILTER_VALIDATE_BOOLEAN); @endphp
                                            <label class="flex items-center gap-3 cursor-pointer select-none">
                                                <input type="hidden" name="{{ $key }}" value="0">
                                                <input type="checkbox" name="{{ $key }}" value="1" {{ $checked ? 'checked' : '' }}
                                                    class="h-5 w-5 rounded border-[#2c2d30] bg-[#141414] text-[var(--color-brand-accent)] focus:ring-[var(--color-brand-accent)] focus:ring-offset-0">
                                                <span class="text-xs text-gray-300">Ativado</span>
                                            </label>

                                        @elseif($type === 'video')
                                            @php $vtype = \App\Support\VideoEmbed::type($value); @endphp
                                            <div class="flex items-center gap-2">
                                                <input type="text" name="{{ $key }}" value="{{ $value }}" placeholder="office.mp4  •  https://youtu.be/…  •  https://vimeo.com/…"
                                                    class="flex-1 px-4 py-2.5 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-xs">
                                                <span class="shrink-0 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1.5 rounded-full
                                                    {{ $vtype === 'youtube' ? 'bg-red-500/20 text-red-300' : ($vtype === 'vimeo' ? 'bg-sky-500/20 text-sky-300' : ($vtype === 'file' ? 'bg-emerald-500/20 text-emerald-300' : ($vtype === 'embed' ? 'bg-violet-500/20 text-violet-300' : 'bg-gray-700 text-gray-400'))) }}">
                                                    {{ $vtype === 'file' ? 'Ficheiro' : ($vtype === 'none' ? 'Vazio' : ucfirst($vtype)) }}
                                                </span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <span class="text-[11px] text-gray-500 shrink-0">Ou carregar ficheiro:</span>
                                                <input type="file" name="{{ $key }}_file" accept="video/*"
                                                    class="w-full text-xs text-gray-400 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:bg-gray-800 file:text-white">
                                            </div>

                                        @else
                                            <input type="{{ $type === 'url' ? 'url' : 'text' }}" name="{{ $key }}" value="{{ $value }}"
                                                class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                                        @endif

                                        @if(!empty($field['help']))
                                            <p class="text-[11px] text-gray-500">{{ $field['help'] }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <div class="flex items-center justify-between gap-4">
                        <a href="{{ route(match($slug) {
                                'home' => 'home',
                                'about' => 'about',
                                'services' => 'services.index',
                                'work' => 'work.index',
                                'clients' => 'clients.index',
                                'team' => 'team.index',
                                'contact' => 'contact',
                                'legal' => 'privacy',
                                default => 'home',
                            }) }}" target="_blank"
                            class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-gray-400 hover:text-white transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            <span>Pré-visualizar página</span>
                        </a>

                        <button type="submit" class="admin-btn px-8 py-3.5 rounded-full bg-[var(--color-brand-accent)] hover:bg-[#e03405] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[var(--color-brand-accent)]/25 transition-all cursor-pointer">
                            Guardar Conteúdo
                        </button>
                    </div>
                @endif
            </div>
        @endforeach
    </form>

</div>
@endsection
