<section
    class="relative w-full min-h-[600px] lg:min-h-[750px] bg-black overflow-hidden flex items-center py-20 lg:py-28 select-none">

    {{-- Full Width Video Background (local, YouTube, Vimeo ou outro) --}}
    <x-video mode="background"
        :src="\App\Models\SiteSetting::get('culture_video_url', 'office.mp4')"
        class="z-0" />

    {{-- Dark Opacity Overlay --}}
    <div class="absolute inset-0 bg-black/60 z-10 pointer-events-none"></div>

    {{-- Overlay Content --}}
    <div class="container-myriad relative z-20 w-full text-white">

        {{-- Main Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-end">

            {{-- Left Column: Large Headline --}}
            <div class="lg:col-span-7 reveal">

                <h2 class="
                    font-sans
                    text-4xl
                    sm:text-6xl
                    lg:text-7xl
                    font-bold
                    text-white
                    tracking-tight
                    leading-[1.06]
                ">
                    Pronto para comunicar melhor?
                </h2>

                <div class="mt-8">

                    <button
                        type="button"
                        class="
                            showreel-trigger
                            inline-flex
                            items-center
                            gap-3
                            px-7
                            py-3.5
                            rounded-full
                            border
                            border-white
                            text-white
                            hover:border-[var(--color-brand-accent)]
                            hover:text-[var(--color-brand-accent)]
                            text-xs
                            font-semibold
                            uppercase
                            tracking-wider
                            transition-all
                            duration-300
                            group
                            cursor-pointer
                        ">

                        <span>Agende uma conversa</span>

                        <svg
                            width="16"
                            height="16"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="text-[var(--color-brand-accent)] group-hover:translate-x-1 transition-transform">

                            <line x1="5" y1="12" x2="19" y2="12"></line>

                            <polyline points="12 5 19 12 12 19"></polyline>

                        </svg>

                    </button>

                </div>

            </div>

        </div>

    </div>

</section>
