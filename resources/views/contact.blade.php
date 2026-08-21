@extends('layouts.app')

@section('title', 'Contactos | Xamariz Agência de Publicidade Angola & Internacional')
@section('description',
    'Entre em contacto com a Xamariz em Luanda, Angola. Agência de Publicidade e Marketing 360°.
    Agende uma reunião presencial ou virtual.')

@section('content')

    {{-- Header --}}
    <section class="pt-40 pb-20 bg-white text-gray-900">
        <div class="container-myriad">
            <div class="reveal flex items-center gap-3 text-xs uppercase font-sans tracking-widest mb-6 sm:mb-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Xamariz</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-400">Entre em Contacto</span>
            </div>

            <div class="max-w-3xl reveal">
                <h1
                    class="font-sans text-4xl sm:text-6xl md:text-7xl font-normal text-gray-900 tracking-tight leading-[1.12] mb-6">
                    Vamos transformar a sua visão em liderança.
                </h1>
                <p class="font-sans text-gray-600 text-lg sm:text-xl leading-relaxed">
                    Conte-nos sobre a sua empresa, o seu projeto ou objetivo estratégico de marketing. A nossa equipa em
                    Luanda está pronta para colaborar.
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
                    <form action="#" method="POST" class="space-y-8">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                            <div>
                                <label
                                    class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700 block mb-2">Nome</label>
                                <input type="text" name="first_name" placeholder="Seu nome"
                                    class="w-full px-4 py-3.5 border border-gray-300 rounded-none focus:outline-none focus:border-[var(--color-brand-accent)] font-sans text-base transition-colors"
                                    required>
                            </div>
                            <div>
                                <label
                                    class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700 block mb-2">Sobrenome</label>
                                <input type="text" name="last_name" placeholder="Seu sobrenome"
                                    class="w-full px-4 py-3.5 border border-gray-300 rounded-none focus:outline-none focus:border-[var(--color-brand-accent)] font-sans text-base transition-colors"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label
                                class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700 block mb-2">Empresa
                                / Instituição</label>
                            <input type="text" name="company" placeholder="Nome da empresa"
                                class="w-full px-4 py-3.5 border border-gray-300 rounded-none focus:outline-none focus:border-[var(--color-brand-accent)] font-sans text-base transition-colors">
                        </div>

                        <div>
                            <label
                                class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700 block mb-2">Endereço
                                de Email</label>
                            <input type="email" name="email" placeholder="seuemail@empresa.com"
                                class="w-full px-4 py-3.5 border border-gray-300 rounded-none focus:outline-none focus:border-[var(--color-brand-accent)] font-sans text-base transition-colors"
                                required>
                        </div>

                        <div>
                            <label
                                class="font-sans text-xs font-bold uppercase tracking-widest text-gray-700 block mb-2">Como
                                podemos ajudar?</label>
                            <textarea name="message" rows="5" placeholder="Descreva brevemente o seu projeto, dúvida ou desafio comercial..."
                                class="w-full px-4 py-3.5 border border-gray-300 rounded-none focus:outline-none focus:border-[var(--color-brand-accent)] font-sans text-base transition-colors"
                                required></textarea>
                        </div>

                        <button type="submit"
                            class="inline-flex items-center gap-3 px-8 py-3.5 rounded-full bg-[var(--color-brand-accent)] text-white hover:bg-[var(--color-brand-accent-hover)] text-xs font-semibold uppercase tracking-wider transition-all duration-300 group">
                            <span>ENVIAR MENSAGEM</span>
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
                            Informações de Contacto.
                        </h2>

                        <div class="space-y-6">
                            {{-- Endereço --}}
                            <div>
                                <p
                                    class="font-sans text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] mb-1">
                                    ENDEREÇO</p>
                                <p class="font-sans text-gray-700 text-sm leading-relaxed">
                                    Rua Francisco Sotto Mayor 18, Bairro Azul, Luanda, Angola
                                </p>
                            </div>

                            {{-- Telefone --}}
                            <div>
                                <p
                                    class="font-sans text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] mb-1">
                                    TELEFONE</p>
                                <a href="tel:+244941561422"
                                    class="font-sans text-sm font-semibold text-gray-900 hover:text-[var(--color-brand-accent)] transition-colors block">
                                    +244 941 561 422
                                </a>
                            </div>

                            {{-- Email --}}
                            <div>
                                <p
                                    class="font-sans text-xs font-bold uppercase tracking-widest text-[var(--color-brand-accent)] mb-1">
                                    EMAIL</p>
                                <a href="mailto:info@xamarizmarketing.com"
                                    class="font-sans text-sm font-semibold text-gray-900 hover:text-[var(--color-brand-accent)] transition-colors block">
                                    info@xamarizmarketing.com
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
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d947.7799826607414!2d13.22004904995043!3d-8.827960672144876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a51f3bf03a151ed%3A0xebfa0891c7ef7dc1!2sXamariz%20Marketing!5e1!3m2!1spt-PT!2sao!4v1786881385788!5m2!1spt-PT!2sao"
                class="w-full h-full border-0 block" allowfullscreen="" loading="lazy"
                referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
    </section>

@endsection
