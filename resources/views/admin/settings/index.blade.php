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
    </div>

    {{-- Aviso: conteúdo das páginas migrado para o menu "Páginas" --}}
    <div class="flex items-start gap-3 p-4 bg-[#1f2022] border border-[#2c2d30] text-xs text-gray-400">
        <svg class="w-4 h-4 mt-0.5 shrink-0 text-[var(--color-brand-accent)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span>O conteúdo editorial das páginas (Sobre, Home, Vídeos e Páginas Legais) foi movido para o menu <a href="{{ route('admin.pages.index') }}" class="text-[var(--color-brand-accent)] font-bold hover:underline">Páginas</a>. Aqui ficam apenas os dados gerais de contacto e o SEO.</span>
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

        {{-- Save Button Bar --}}
        <div class="pt-4 flex items-center justify-end">
            <button type="submit" class="admin-btn px-8 py-3.5 rounded-full bg-[var(--color-brand-accent)] hover:bg-[#e03405] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[var(--color-brand-accent)]/25 transition-all cursor-pointer">
                Guardar Configurações & SEO
            </button>
        </div>
    </form>

</div>
@endsection
