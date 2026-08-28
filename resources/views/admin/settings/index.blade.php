@extends('admin.layouts.app')

@section('title', 'Definições & SEO do Site | CMS Xamariz')
@section('header_title', 'Configurações Globais & Gestão de SEO')

@section('content')
<div class="max-w-5xl mx-auto space-y-6" x-data="{ tab: '{{ request('tab', 'general') }}' }">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-white tracking-tight">Gestão de Conteúdos & SEO</h2>
            <p class="text-xs text-gray-400 mt-0.5">Personalize textos, páginas institucionais, elementos interativos, vídeos e metadados SEO para motores de busca</p>
        </div>
    </div>

    {{-- Navigation Tabs --}}
    <div class="flex items-center gap-2 border-b border-[#2c2d30] pb-3 overflow-x-auto no-scrollbar">
        <button type="button" @click="tab = 'general'"
            :class="tab === 'general' ? 'bg-[var(--color-brand-accent)] text-white' : 'bg-[#1f2022] text-gray-400 hover:text-white hover:bg-[#2c2d30]'"
            class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer">
            Geral & Contactos
        </button>

        <button type="button" @click="tab = 'seo'"
            :class="tab === 'seo' ? 'bg-[var(--color-brand-accent)] text-white shadow-lg shadow-[var(--color-brand-accent)]/20' : 'bg-[#1f2022] text-gray-400 hover:text-white hover:bg-[#2c2d30]'"
            class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <span>SEO & Metadados</span>
        </button>

        <button type="button" @click="tab = 'about'"
            :class="tab === 'about' ? 'bg-[var(--color-brand-accent)] text-white' : 'bg-[#1f2022] text-gray-400 hover:text-white hover:bg-[#2c2d30]'"
            class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer">
            Página Sobre Nós
        </button>

        <button type="button" @click="tab = 'home'"
            :class="tab === 'home' ? 'bg-[var(--color-brand-accent)] text-white' : 'bg-[#1f2022] text-gray-400 hover:text-white hover:bg-[#2c2d30]'"
            class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer">
            Home: Interativos
        </button>

        <button type="button" @click="tab = 'media'"
            :class="tab === 'media' ? 'bg-[var(--color-brand-accent)] text-white' : 'bg-[#1f2022] text-gray-400 hover:text-white hover:bg-[#2c2d30]'"
            class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer">
            Vídeos & Showreel
        </button>

        <button type="button" @click="tab = 'legal'"
            :class="tab === 'legal' ? 'bg-[var(--color-brand-accent)] text-white' : 'bg-[#1f2022] text-gray-400 hover:text-white hover:bg-[#2c2d30]'"
            class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all whitespace-nowrap cursor-pointer">
            Páginas Legais
        </button>
    </div>

    {{-- Main Form --}}
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <input type="hidden" name="active_tab" :value="tab">

        {{-- ════════════════════════════════════════════════
             ABA 1: GERAL & CONTACTOS
        ════════════════════════════════════════════════ --}}
        <div x-show="tab === 'general'" x-transition class="bg-[#1f2022] border border-[#2c2d30] p-6 sm:p-8 space-y-6">
            <h3 class="text-sm font-bold uppercase tracking-wider text-[var(--color-brand-accent)]">Informações Gerais & Redes Sociais</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Nome da Empresa / Título Padrão</label>
                    <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? 'Xamariz | Agência de Publicidade Angola & Marketing 360°') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Endereço Físico (Morada Luanda)</label>
                    <input type="text" name="address" value="{{ old('address', $settings['address'] ?? 'Rua Francisco Sotto Mayor 18, Bairro Azul, Luanda, Angola') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Telefone Principal</label>
                    <input type="text" name="phone" value="{{ old('phone', $settings['phone'] ?? '+244 941 561 422') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">E-mail Corporativo</label>
                    <input type="email" name="email" value="{{ old('email', $settings['email'] ?? 'geral@xamariz.ao') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">LinkedIn URL</label>
                    <input type="url" name="linkedin" value="{{ old('linkedin', $settings['linkedin'] ?? 'https://linkedin.com/company/xamariz') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Instagram URL</label>
                    <input type="url" name="instagram" value="{{ old('instagram', $settings['instagram'] ?? 'https://instagram.com/xamariz.ao') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Facebook URL</label>
                    <input type="url" name="facebook" value="{{ old('facebook', $settings['facebook'] ?? '') }}" placeholder="https://facebook.com/xamariz" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">WhatsApp Direct / Link</label>
                    <input type="text" name="whatsapp" value="{{ old('whatsapp', $settings['whatsapp'] ?? '+244941561422') }}" placeholder="+244941561422" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                </div>
            </div>
        </div>

        {{-- ════════════════════════════════════════════════
             ABA 2: SEO & METADADOS (GOOGLE & SOCIAL)
        ════════════════════════════════════════════════ --}}
        <div x-show="tab === 'seo'" x-transition class="bg-[#1f2022] border border-[#2c2d30] p-6 sm:p-8 space-y-8">
            <div>
                <h3 class="text-sm font-bold uppercase tracking-wider text-[var(--color-brand-accent)]">Controlo de SEO Global & Motores de Busca</h3>
                <p class="text-xs text-gray-400 mt-1">Configure as meta tags que o Google, Bing, LinkedIn, WhatsApp e Facebook usam para indexar e partilhar o site da Xamariz.</p>
            </div>

            {{-- Configurações Globais / Padrão --}}
            <div class="space-y-4 pt-2">
                <h4 class="text-xs font-bold uppercase tracking-widest text-gray-400">1. Metadados Globais (Padrão para todo o site)</h4>
                
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Título Global Padrão (Meta Title)</label>
                    <input type="text" name="seo_meta_title_default" value="{{ old('seo_meta_title_default', $settings['seo_meta_title_default'] ?? 'Xamariz | Agência de Publicidade Angola & Internacional • Marketing 360°') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Meta Descrição Global Padrão (Meta Description)</label>
                    <textarea rows="3" name="seo_meta_description_default" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm leading-relaxed">{{ old('seo_meta_description_default', $settings['seo_meta_description_default'] ?? 'A Xamariz é a agência líder em Publicidade, Comunicação e Marketing 360° em Luanda, Angola. Transformamos a sua mensagem em clareza, diferenciação e atração massiva de clientes.') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Palavras-Chave Globais (Keywords separadas por vírgula)</label>
                    <input type="text" name="seo_meta_keywords_default" value="{{ old('seo_meta_keywords_default', $settings['seo_meta_keywords_default'] ?? 'agência publicidade angola, marketing 360 luanda, publicidade angola, branding luanda, agência comunicação angola, desenvolvimento web angola, consultoria marketing luanda, produção audiovisual angola') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300">Imagem de Partilha Social (Open Graph Image / WhatsApp / LinkedIn)</label>
                        <input type="text" name="seo_og_image_default" value="{{ old('seo_og_image_default', $settings['seo_og_image_default'] ?? 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=1200&auto=format&fit=crop&q=80') }}" class="w-full px-3 py-2 bg-[#141414] border border-[#2c2d30] text-white text-xs mb-2">
                        <input type="file" name="seo_og_image_file" class="w-full text-xs text-gray-400 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:bg-gray-800 file:text-white">
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-1">Google Search Console Verification Tag</label>
                            <input type="text" name="seo_google_site_verification" value="{{ old('seo_google_site_verification', $settings['seo_google_site_verification'] ?? '') }}" placeholder="ex: abc123xyz-verification-code" class="w-full px-3 py-2 bg-[#141414] border border-[#2c2d30] text-white text-xs">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-1">Google Analytics 4 Measurement ID (GA4)</label>
                            <input type="text" name="seo_google_analytics_id" value="{{ old('seo_google_analytics_id', $settings['seo_google_analytics_id'] ?? '') }}" placeholder="ex: G-XXXXXXXXXX" class="w-full px-3 py-2 bg-[#141414] border border-[#2c2d30] text-white text-xs">
                        </div>
                    </div>
                </div>
            </div>

            {{-- SEO Específico por Página Principal --}}
            <div class="space-y-6 pt-6 border-t border-[#2c2d30]">
                <h4 class="text-xs font-bold uppercase tracking-widest text-gray-400">2. SEO Personalizado por Página</h4>

                {{-- Página Inicial --}}
                <div class="p-4 bg-[#141414] border border-[#2c2d30] space-y-3">
                    <span class="text-xs font-bold text-[var(--color-brand-accent)] uppercase">Página Inicial (Home)</span>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-gray-300 mb-1">Título SEO</label>
                            <input type="text" name="seo_home_title" value="{{ old('seo_home_title', $settings['seo_home_title'] ?? 'Xamariz | Agência de Publicidade Angola & Internacional • Marketing 360°') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-gray-300 mb-1">Meta Descrição</label>
                            <input type="text" name="seo_home_description" value="{{ old('seo_home_description', $settings['seo_home_description'] ?? 'Xamariz é a agência líder em Publicidade, Comunicação e Marketing 360° em Luanda, Angola e Internacional. Comunicação clara, estratégia de diferenciação e resultados de alto impacto.') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">
                        </div>
                    </div>
                </div>

                {{-- Página Sobre Nós --}}
                <div class="p-4 bg-[#141414] border border-[#2c2d30] space-y-3">
                    <span class="text-xs font-bold text-[var(--color-brand-accent)] uppercase">Página Sobre Nós (/about)</span>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-gray-300 mb-1">Título SEO</label>
                            <input type="text" name="seo_about_title" value="{{ old('seo_about_title', $settings['seo_about_title'] ?? 'Sobre a Xamariz | Agência de Publicidade Angola & Internacional • Marketing 360°') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-gray-300 mb-1">Meta Descrição</label>
                            <input type="text" name="seo_about_description" value="{{ old('seo_about_description', $settings['seo_about_description'] ?? 'A Xamariz (marca da Visualclick, Lda) é a agência líder em Publicidade, Comunicação e Marketing 360° em Luanda, Angola. Comunicação clara e atração de clientes.') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">
                        </div>
                    </div>
                </div>

                {{-- Página de Serviços --}}
                <div class="p-4 bg-[#141414] border border-[#2c2d30] space-y-3">
                    <span class="text-xs font-bold text-[var(--color-brand-accent)] uppercase">Página de Serviços (/services)</span>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-gray-300 mb-1">Título SEO</label>
                            <input type="text" name="seo_services_title" value="{{ old('seo_services_title', $settings['seo_services_title'] ?? 'Serviços de Marketing 360° e Publicidade em Angola | Xamariz') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-gray-300 mb-1">Meta Descrição</label>
                            <input type="text" name="seo_services_description" value="{{ old('seo_services_description', $settings['seo_services_description'] ?? 'Soluções integradas de Marketing 360°, Branding, Produção Audiovisual, Campanhas Digitais e Desenvolvimento Web para empresas líderes em Angola.') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">
                        </div>
                    </div>
                </div>

                {{-- Página de Portfólio / Trabalhos --}}
                <div class="p-4 bg-[#141414] border border-[#2c2d30] space-y-3">
                    <span class="text-xs font-bold text-[var(--color-brand-accent)] uppercase">Página de Portfólio (/work)</span>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-gray-300 mb-1">Título SEO</label>
                            <input type="text" name="seo_work_title" value="{{ old('seo_work_title', $settings['seo_work_title'] ?? 'Projetos e Portfólio de Campanhas Publicitárias | Xamariz') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-gray-300 mb-1">Meta Descrição</label>
                            <input type="text" name="seo_work_description" value="{{ old('seo_work_description', $settings['seo_work_description'] ?? 'Explore os nossos projetos de Marketing 360°, Branding, Produção Audiovisual e Comunicação Estratégica desenvolvidos para marcas de topo em Angola e no mundo.') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">
                        </div>
                    </div>
                </div>

                {{-- Página de Clientes --}}
                <div class="p-4 bg-[#141414] border border-[#2c2d30] space-y-3">
                    <span class="text-xs font-bold text-[var(--color-brand-accent)] uppercase">Página de Clientes (/clients)</span>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-gray-300 mb-1">Título SEO</label>
                            <input type="text" name="seo_clients_title" value="{{ old('seo_clients_title', $settings['seo_clients_title'] ?? 'Clientes e Marcas Parceiras em Angola | Xamariz') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-gray-300 mb-1">Meta Descrição</label>
                            <input type="text" name="seo_clients_description" value="{{ old('seo_clients_description', $settings['seo_clients_description'] ?? 'Conheça os clientes e marcas líderes em Angola e no mercado internacional que confiam na Xamariz para acelerar o seu crescimento comercial.') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">
                        </div>
                    </div>
                </div>

                {{-- Página de Contactos --}}
                <div class="p-4 bg-[#141414] border border-[#2c2d30] space-y-3">
                    <span class="text-xs font-bold text-[var(--color-brand-accent)] uppercase">Página de Contacto (/contact)</span>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-gray-300 mb-1">Título SEO</label>
                            <input type="text" name="seo_contact_title" value="{{ old('seo_contact_title', $settings['seo_contact_title'] ?? 'Contacte a Agência Xamariz | Luanda, Angola • Agende uma Conversa') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold uppercase text-gray-300 mb-1">Meta Descrição</label>
                            <input type="text" name="seo_contact_description" value="{{ old('seo_contact_description', $settings['seo_contact_description'] ?? 'Fale com a equipa de especialistas da Xamariz em Luanda, Angola. Agende uma conversa estratégica e descubra como impulsionar o seu negócio.') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ════════════════════════════════════════════════
             ABA 3: PÁGINA SOBRE NÓS
        ════════════════════════════════════════════════ --}}
        <div x-show="tab === 'about'" x-transition class="bg-[#1f2022] border border-[#2c2d30] p-6 sm:p-8 space-y-8">
            <h3 class="text-sm font-bold uppercase tracking-wider text-[var(--color-brand-accent)]">Conteúdos da Página Sobre Nós</h3>

            {{-- Hero Editorial --}}
            <div class="space-y-4 pt-2">
                <h4 class="text-xs font-bold uppercase tracking-widest text-gray-400">1. Cabeçalho Editorial (Hero)</h4>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Título Principal do Hero</label>
                    <textarea rows="2" name="about_hero_title" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">{{ old('about_hero_title', $settings['about_hero_title'] ?? "Além da criatividade.\nAlém da imaginação.\nO parceiro de Marketing 360° que a sua empresa precisa.") }}</textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Parágrafo 1</label>
                        <textarea rows="3" name="about_hero_p1" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">{{ old('about_hero_p1', $settings['about_hero_p1'] ?? 'A Xamariz (marca da empresa Visualclick, Lda) é uma agência de publicidade e comunicação focada em conectar marcas a resultados tangíveis em Angola e no mercado internacional.') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Parágrafo 2</label>
                        <textarea rows="3" name="about_hero_p2" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">{{ old('about_hero_p2', $settings['about_hero_p2'] ?? 'Num mercado onde atrair clientes é cada vez mais desafiador, transformamos a sua mensagem em clareza, diferenciação e liderança comercial.') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Causa & Propósito --}}
            <div class="space-y-4 pt-6 border-t border-[#2c2d30]">
                <h4 class="text-xs font-bold uppercase tracking-widest text-gray-400">2. O que nos move & A Nossa Causa</h4>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Título da Secção</label>
                    <input type="text" name="about_cause_title" value="{{ old('about_cause_title', $settings['about_cause_title'] ?? 'Mensagem clara, diferenciação e atração de clientes.') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Texto Explicativo Principal</label>
                    <textarea rows="3" name="about_cause_p1" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">{{ old('about_cause_p1', $settings['about_cause_p1'] ?? 'Existem empresas focadas em oferecer produtos e serviços que resolvam problemas na vida dos consumidores. Acreditamos verdadeiramente que se tiverem uma mensagem clara e convincente têm um enorme potencial para serem bem sucedidos e tornarem-se a principal referência no seu mercado.') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Citação em Destaque (Borda Laranja)</label>
                    <textarea rows="2" name="about_cause_quote" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">{{ old('about_cause_quote', $settings['about_cause_quote'] ?? 'Na Xamariz acreditamos no talento e valor das empresas, instituições e comunidades angolanas e esmeramo-nos por contribuir para o seu crescimento.') }}</textarea>
                </div>
            </div>

            {{-- Oferta & Promessa --}}
            <div class="space-y-4 pt-6 border-t border-[#2c2d30]">
                <h4 class="text-xs font-bold uppercase tracking-widest text-gray-400">3. A Nossa Oferta & A Nossa Promessa</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300">Título: A Nossa Oferta</label>
                        <input type="text" name="about_offer_title" value="{{ old('about_offer_title', $settings['about_offer_title'] ?? 'A Nossa Oferta.') }}" class="w-full px-4 py-2.5 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300">Texto</label>
                        <textarea rows="3" name="about_offer_text" class="w-full px-4 py-2.5 bg-[#141414] border border-[#2c2d30] text-white text-sm">{{ old('about_offer_text', $settings['about_offer_text'] ?? 'Oferecemos soluções de Marketing 360°, Branding, Produção Audiovisual e Estratégia Digital focadas em gerar autoridade e vendas.') }}</textarea>
                    </div>

                    <div class="space-y-3">
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300">Título: A Nossa Promessa</label>
                        <input type="text" name="about_promise_title" value="{{ old('about_promise_title', $settings['about_promise_title'] ?? 'A Nossa Promessa.') }}" class="w-full px-4 py-2.5 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300">Texto</label>
                        <textarea rows="3" name="about_promise_text" class="w-full px-4 py-2.5 bg-[#141414] border border-[#2c2d30] text-white text-sm">{{ old('about_promise_text', $settings['about_promise_text'] ?? 'Comprometemo-nos com a excelência criativa, cumprimento rigoroso de prazos e métricas transparentes que comprovam o retorno do seu investimento.') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Filosofia --}}
            <div class="space-y-4 pt-6 border-t border-[#2c2d30]">
                <h4 class="text-xs font-bold uppercase tracking-widest text-gray-400">4. Em que acreditamos (Filosofia da Marca)</h4>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Título</label>
                    <input type="text" name="about_beliefs_title" value="{{ old('about_beliefs_title', $settings['about_beliefs_title'] ?? 'Em que acreditamos.') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Texto da Filosofia</label>
                    <textarea rows="3" name="about_beliefs_text" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm">{{ old('about_beliefs_text', $settings['about_beliefs_text'] ?? 'Acreditamos que a publicidade deve transcender o ruído visual e criar ligações autênticas entre marcas e consumidores.') }}</textarea>
                </div>
            </div>

            {{-- Galeria de Fotos do Escritório --}}
            <div class="space-y-4 pt-6 border-t border-[#2c2d30]">
                <h4 class="text-xs font-bold uppercase tracking-widest text-gray-400">5. Galeria de Fotos do Escritório / Equipa (3 Imagens)</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300">Foto 1 (URL ou Upload)</label>
                        <input type="text" name="about_gallery_img1" value="{{ old('about_gallery_img1', $settings['about_gallery_img1'] ?? 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=900&auto=format&fit=crop&q=80') }}" class="w-full px-3 py-2 bg-[#141414] border border-[#2c2d30] text-white text-xs mb-2">
                        <input type="file" name="about_gallery_file1" class="w-full text-xs text-gray-400 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:bg-gray-800 file:text-white">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300">Foto 2 (URL ou Upload)</label>
                        <input type="text" name="about_gallery_img2" value="{{ old('about_gallery_img2', $settings['about_gallery_img2'] ?? 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&auto=format&fit=crop&q=80') }}" class="w-full px-3 py-2 bg-[#141414] border border-[#2c2d30] text-white text-xs mb-2">
                        <input type="file" name="about_gallery_file2" class="w-full text-xs text-gray-400 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:bg-gray-800 file:text-white">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300">Foto 3 (URL ou Upload)</label>
                        <input type="text" name="about_gallery_img3" value="{{ old('about_gallery_img3', $settings['about_gallery_img3'] ?? 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=900&auto=format&fit=crop&q=80') }}" class="w-full px-3 py-2 bg-[#141414] border border-[#2c2d30] text-white text-xs mb-2">
                        <input type="file" name="about_gallery_file3" class="w-full text-xs text-gray-400 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:bg-gray-800 file:text-white">
                    </div>
                </div>
            </div>
        </div>

        {{-- ════════════════════════════════════════════════
             ABA 4: HOME INTERATIVOS (SLIDER + 4 PILARES)
        ════════════════════════════════════════════════ --}}
        <div x-show="tab === 'home'" x-transition class="bg-[#1f2022] border border-[#2c2d30] p-6 sm:p-8 space-y-8">
            <h3 class="text-sm font-bold uppercase tracking-wider text-[var(--color-brand-accent)]">Elementos Interativos da Página Inicial</h3>

            {{-- Slider Antes / Depois --}}
            <div class="space-y-4 pt-2">
                <h4 class="text-xs font-bold uppercase tracking-widest text-gray-400">1. Slider de Comparação Antes / Depois</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Título da Secção</label>
                        <input type="text" name="home_slider_title" value="{{ old('home_slider_title', $settings['home_slider_title'] ?? 'O poder de uma identidade visual que vende.') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Subtítulo</label>
                        <input type="text" name="home_slider_subtitle" value="{{ old('home_slider_subtitle', $settings['home_slider_subtitle'] ?? 'Arraste o cursor e veja a transformação do conceito à execução final.') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300">Imagem ANTES / Conceito (URL ou Upload)</label>
                        <input type="text" name="home_slider_before_img" value="{{ old('home_slider_before_img', $settings['home_slider_before_img'] ?? 'https://images.unsplash.com/photo-1501386761578-eac5c94b800a?w=1200&auto=format&fit=crop&q=80') }}" class="w-full px-3 py-2 bg-[#141414] border border-[#2c2d30] text-white text-xs mb-2">
                        <input type="file" name="home_slider_before_file" class="w-full text-xs text-gray-400 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:bg-gray-800 file:text-white">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300">Imagem DEPOIS / Resultado (URL ou Upload)</label>
                        <input type="text" name="home_slider_after_img" value="{{ old('home_slider_after_img', $settings['home_slider_after_img'] ?? 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=1200&auto=format&fit=crop&q=80') }}" class="w-full px-3 py-2 bg-[#141414] border border-[#2c2d30] text-white text-xs mb-2">
                        <input type="file" name="home_slider_after_file" class="w-full text-xs text-gray-400 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:bg-gray-800 file:text-white">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-1">Métrica 1 (Valor)</label>
                            <input type="text" name="home_slider_metric1_val" value="{{ old('home_slider_metric1_val', $settings['home_slider_metric1_val'] ?? '+140%') }}" class="w-full px-3 py-2 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-1">Métrica 1 (Etiqueta)</label>
                            <input type="text" name="home_slider_metric1_label" value="{{ old('home_slider_metric1_label', $settings['home_slider_metric1_label'] ?? 'Taxa de Conversão') }}" class="w-full px-3 py-2 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-1">Métrica 2 (Valor)</label>
                            <input type="text" name="home_slider_metric2_val" value="{{ old('home_slider_metric2_val', $settings['home_slider_metric2_val'] ?? '+65%') }}" class="w-full px-3 py-2 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-1">Métrica 2 (Etiqueta)</label>
                            <input type="text" name="home_slider_metric2_label" value="{{ old('home_slider_metric2_label', $settings['home_slider_metric2_label'] ?? 'Reconhecimento de Marca') }}" class="w-full px-3 py-2 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                        </div>
                    </div>
                </div>
            </div>

            {{-- 4 Pilares de Benefícios --}}
            <div class="space-y-4 pt-6 border-t border-[#2c2d30]">
                <h4 class="text-xs font-bold uppercase tracking-widest text-gray-400">2. Os 4 Pilares de Benefícios ("O QUE MUDA")</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Título da Secção</label>
                        <input type="text" name="home_pillars_title" value="{{ old('home_pillars_title', $settings['home_pillars_title'] ?? 'O que muda com uma comunicação estratégica') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Subtítulo</label>
                        <input type="text" name="home_pillars_subtitle" value="{{ old('home_pillars_subtitle', $settings['home_pillars_subtitle'] ?? 'Metodologia testada para gerar valor mensurável.') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
                    <div class="p-4 bg-[#141414] border border-[#2c2d30] space-y-3">
                        <span class="text-xs font-bold text-[var(--color-brand-accent)] uppercase">01. Diagnóstico</span>
                        <input type="text" name="home_pillar1_title" value="{{ old('home_pillar1_title', $settings['home_pillar1_title'] ?? 'Análise e Diagnóstico') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-sm">
                        <textarea rows="2" name="home_pillar1_desc" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">{{ old('home_pillar1_desc', $settings['home_pillar1_desc'] ?? 'Mapeamento profundo do mercado angolano e do posicionamento da concorrência.') }}</textarea>
                    </div>

                    <div class="p-4 bg-[#141414] border border-[#2c2d30] space-y-3">
                        <span class="text-xs font-bold text-[var(--color-brand-accent)] uppercase">02. Estratégia</span>
                        <input type="text" name="home_pillar2_title" value="{{ old('home_pillar2_title', $settings['home_pillar2_title'] ?? 'Estratégia Diferenciada') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-sm">
                        <textarea rows="2" name="home_pillar2_desc" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">{{ old('home_pillar2_desc', $settings['home_pillar2_desc'] ?? 'Definição de mensagem clara e plano multicanal focado no seu público ideal.') }}</textarea>
                    </div>

                    <div class="p-4 bg-[#141414] border border-[#2c2d30] space-y-3">
                        <span class="text-xs font-bold text-[var(--color-brand-accent)] uppercase">03. Execução</span>
                        <input type="text" name="home_pillar3_title" value="{{ old('home_pillar3_title', $settings['home_pillar3_title'] ?? 'Execução de Alto Impacto') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-sm">
                        <textarea rows="2" name="home_pillar3_desc" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">{{ old('home_pillar3_desc', $settings['home_pillar3_desc'] ?? 'Produção de classe mundial em design, audiovisual, tráfego pago e eventos.') }}</textarea>
                    </div>

                    <div class="p-4 bg-[#141414] border border-[#2c2d30] space-y-3">
                        <span class="text-xs font-bold text-[var(--color-brand-accent)] uppercase">04. Resultados</span>
                        <input type="text" name="home_pillar4_title" value="{{ old('home_pillar4_title', $settings['home_pillar4_title'] ?? 'Resultados Tangíveis') }}" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-sm">
                        <textarea rows="2" name="home_pillar4_desc" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-white text-xs">{{ old('home_pillar4_desc', $settings['home_pillar4_desc'] ?? 'Acompanhamento rigoroso de conversão, ROI e liderança consolidada.') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- ════════════════════════════════════════════════
             ABA 5: VÍDEOS & SHOWREEL
        ════════════════════════════════════════════════ --}}
        <div x-show="tab === 'media'" x-transition class="bg-[#1f2022] border border-[#2c2d30] p-6 sm:p-8 space-y-6">
            <h3 class="text-sm font-bold uppercase tracking-wider text-[var(--color-brand-accent)]">Mídia & Vídeos Globais</h3>

            <div class="space-y-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Vídeo do Showreel (Modal de Vídeo)</label>
                    <p class="text-xs text-gray-400 mb-2">URL de YouTube Embed (ex: <code>https://www.youtube.com/embed/...</code>), Vimeo ou ficheiro MP4 direto.</p>
                    <input type="text" name="showreel_video_url" value="{{ old('showreel_video_url', $settings['showreel_video_url'] ?? 'https://www.youtube-nocookie.com/embed/dQw4w9WgXcQ?autoplay=1') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                </div>

                <div class="pt-6 border-t border-[#2c2d30]">
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Vídeo de Fundo da Secção de Cultura (Caminho / URL)</label>
                    <p class="text-xs text-gray-400 mb-2">Ficheiro local (ex: <code>office.mp4</code>) ou URL externo direto de vídeo MP4.</p>
                    <input type="text" name="culture_video_url" value="{{ old('culture_video_url', $settings['culture_video_url'] ?? 'office.mp4') }}" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Título do Bloco de Vídeo</label>
                        <textarea rows="2" name="culture_video_title" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm">{{ old('culture_video_title', $settings['culture_video_title'] ?? "Juntos,\ntransformamos visão\nem realidade.") }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Descrição do Bloco de Vídeo</label>
                        <textarea rows="2" name="culture_video_desc" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm">{{ old('culture_video_desc', $settings['culture_video_desc'] ?? 'Somos estrategistas, criativos, contadores de histórias e especialistas em performance dedicados à excelência em Angola e no mundo.') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- ════════════════════════════════════════════════
             ABA 6: PÁGINAS LEGAIS
        ════════════════════════════════════════════════ --}}
        <div x-show="tab === 'legal'" x-transition class="bg-[#1f2022] border border-[#2c2d30] p-6 sm:p-8 space-y-6">
            <h3 class="text-sm font-bold uppercase tracking-wider text-[var(--color-brand-accent)]">Páginas Legais e Políticas</h3>

            <div class="space-y-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Política de Privacidade (Texto / HTML)</label>
                    <textarea rows="10" name="legal_privacy_policy" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm font-mono leading-relaxed">{{ old('legal_privacy_policy', $settings['legal_privacy_policy'] ?? '') }}</textarea>
                    <p class="text-xs text-gray-400 mt-1">Se deixar vazio, o site utilizará o texto base padrão de privacidade.</p>
                </div>

                <div class="pt-6 border-t border-[#2c2d30]">
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Política de Cookies (Texto / HTML)</label>
                    <textarea rows="10" name="legal_cookies_policy" class="w-full px-4 py-3 bg-[#141414] border border-[#2c2d30] text-white text-sm font-mono leading-relaxed">{{ old('legal_cookies_policy', $settings['legal_cookies_policy'] ?? '') }}</textarea>
                    <p class="text-xs text-gray-400 mt-1">Se deixar vazio, o site utilizará o texto base padrão de cookies.</p>
                </div>
            </div>
        </div>

        {{-- Save Button Bar --}}
        <div class="pt-4 flex items-center justify-end">
            <button type="submit" class="admin-btn px-8 py-3.5 rounded-full bg-[var(--color-brand-accent)] hover:bg-[#e03405] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[var(--color-brand-accent)]/25 transition-all cursor-pointer">
                Guardar Configurações & SEO
            </button>
        </div>
    </form>

</div>
@endsection
