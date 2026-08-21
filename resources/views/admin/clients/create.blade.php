@extends('admin.layouts.app')

@section('title', 'Novo Cliente | CMS Xamariz')
@section('header_title', 'Adicionar Novo Cliente')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-white">Novo Cliente</h2>
        <a href="{{ route('admin.clients.index') }}" class="text-xs text-slate-400 hover:text-white">&larr; Voltar à lista</a>
    </div>

    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-800/80 rounded-2xl p-8 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Nome da Empresa / Marca *</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Ex: ExxonMobil" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Sector de Atuação</label>
                <input type="text" name="sector" value="{{ old('sector') }}" placeholder="Ex: Energia & Petróleo" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Website Oficial (URL)</label>
                <input type="url" name="website_url" value="{{ old('website_url') }}" placeholder="https://exxonmobil.com" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Logotipo (Upload SVG / PNG / WEBP)</label>
                <input type="file" name="logo_path" accept=".svg,.png,.webp,.jpg,.jpeg,image/svg+xml,image/png,image/webp,image/jpeg" class="w-full text-xs text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-800 file:text-white hover:file:bg-slate-700">
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Headline / Título Principal da Parceria</label>
                <input type="text" name="headline" value="{{ old('headline') }}" placeholder="Ex: Comunicação Institucional da Marca Líder de Angola" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Descrição / Resumo Executivo da Parceria</label>
                <textarea name="description" rows="3" placeholder="Ex: Planeamento estratégico de comunicação e produção de conteúdos para a celebração de marcos históricos..." class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">{{ old('description') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Serviços Prestados</label>
                <input type="text" name="services_provided" value="{{ old('services_provided') }}" placeholder="Ex: Estratégia, Branding, Audiovisual & Marketing 360°" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Ou Caminho do Logotipo Existente (Asset Path)</label>
                <input type="text" name="logo_url" value="{{ old('logo_url') }}" placeholder="images/logos/exxon.svg" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Depoimento do Cliente (Testemunho)</label>
                <textarea name="testimonial_text" rows="3" placeholder="Citação do cliente sobre a Xamariz..." class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">{{ old('testimonial_text') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Autor do Depoimento</label>
                <input type="text" name="testimonial_author" value="{{ old('testimonial_author') }}" placeholder="Ex: Direção de Comunicação" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Cargo do Autor</label>
                <input type="text" name="testimonial_role" value="{{ old('testimonial_role') }}" placeholder="Ex: ExxonMobil Angola" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div class="md:col-span-2 flex items-center gap-3 pt-2">
                <input type="checkbox" name="show_in_marquee" id="show_in_marquee" value="1" {{ old('show_in_marquee', true) ? 'checked' : '' }} class="w-5 h-5 rounded bg-slate-950 border-slate-800 text-[#fe3d0a] focus:ring-[#fe3d0a]">
                <label for="show_in_marquee" class="text-sm font-semibold text-slate-200 cursor-pointer">Exibir Logotipo no Carrossel da Homepage (Marquee)</label>
            </div>
        </div>

        <div class="pt-6 border-t border-slate-800 flex items-center justify-end gap-4">
            <a href="{{ route('admin.clients.index') }}" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs font-bold text-slate-300 transition-all">Cancelar</a>
            <button type="submit" class="px-6 py-3 rounded-xl bg-[#fe3d0a] hover:bg-[#d63205] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[#fe3d0a]/25 transition-all">Guardar Cliente</button>
        </div>
    </form>

</div>
@endsection
