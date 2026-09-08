@props([
    'mobile' => false,
])

@php
    $currentLocale = app()->getLocale();
    $locales = config('app.available_locales', [
        'pt' => ['name' => 'Português', 'code' => 'PT', 'flag' => '🇵🇹'],
        'en' => ['name' => 'English', 'code' => 'EN', 'flag' => '🇬🇧'],
        'fr' => ['name' => 'Français', 'code' => 'FR', 'flag' => '🇫🇷'],
    ]);
    $current = $locales[$currentLocale] ?? $locales['pt'];
@endphp

@if ($mobile)
    {{-- Mobile Version: Clean Button Group --}}
    <div class="flex items-center justify-between gap-2 p-1.5 bg-gray-100/80 rounded-full">
        @foreach ($locales as $code => $locale)
            @php $isActive = ($code === $currentLocale); @endphp
            <a href="{{ route('locale.switch', $code) }}"
               class="flex-1 inline-flex items-center justify-center gap-1.5 py-2 px-3 text-xs font-semibold rounded-full transition-all duration-200 {{ $isActive ? 'bg-[var(--color-brand-accent)] text-white shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                <span>{{ $locale['flag'] }}</span>
                <span>{{ $locale['code'] }}</span>
            </a>
        @endforeach
    </div>
@else
    {{-- Desktop Version: Alpine.js Dropdown --}}
    <div x-data="{ open: false }" @click.outside="open = false" class="relative inline-block text-left">
        <button type="button"
                @click="open = !open"
                :class="(isDarkNav && !scrolled) ?
                    'text-white/90 hover:text-white border-white/20 hover:border-white/40 bg-white/5 hover:bg-white/10' :
                    'text-gray-800 hover:text-gray-900 border-gray-200 hover:border-gray-300 bg-gray-50 hover:bg-gray-100'"
                class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium tracking-wider uppercase rounded-full border transition-colors duration-200 focus:outline-none"
                aria-label="{{ __('common.switch_language') }}">
            <span>{{ $current['flag'] }}</span>
            <span class="font-semibold">{{ $current['code'] }}</span>
            <svg class="w-3 h-3 transition-transform duration-200" :class="open ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        <div x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 -translate-y-1"
             style="display: none;"
             class="absolute right-0 mt-2 w-44 rounded-xl bg-white shadow-xl ring-1 ring-black/5 py-1.5 z-[9999999] focus:outline-none">
            <div class="px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-gray-400 border-b border-gray-100 mb-1">
                {{ __('common.language') }}
            </div>
            @foreach ($locales as $code => $locale)
                @php $isActive = ($code === $currentLocale); @endphp
                <a href="{{ route('locale.switch', $code) }}"
                   class="flex items-center justify-between px-3 py-2 text-xs transition-colors duration-150 {{ $isActive ? 'bg-orange-50/80 text-[var(--color-brand-accent)] font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                    <div class="flex items-center gap-2">
                        <span class="text-sm">{{ $locale['flag'] }}</span>
                        <span>{{ $locale['name'] }}</span>
                    </div>
                    @if ($isActive)
                        <svg class="w-3.5 h-3.5 text-[var(--color-brand-accent)]" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
@endif
