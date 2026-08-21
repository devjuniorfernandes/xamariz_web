@extends('admin.layouts.app')

@section('title', 'Novo Membro | CMS Xamariz')
@section('header_title', 'Adicionar Novo Membro da Equipa')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-white">Novo Membro</h2>
        <a href="{{ route('admin.team-members.index') }}" class="text-xs text-slate-400 hover:text-white">&larr; Voltar à lista</a>
    </div>

    <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-800/80 rounded-2xl p-8 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Nome Completo *</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Ex: Mateus Manuel" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Cargo / Função *</label>
                <input type="text" name="role" value="{{ old('role') }}" required placeholder="Ex: CEO & Fundador" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Departamento *</label>
                <select name="department" required class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
                    <option value="specialist" {{ old('department') === 'specialist' ? 'selected' : '' }}>Especialista / Operacional</option>
                    <option value="direction" {{ old('department') === 'direction' ? 'selected' : '' }}>Conselho de Direção</option>
                    <option value="ceo" {{ old('department') === 'ceo' ? 'selected' : '' }}>CEO & Liderança Destaque</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Foto de Perfil (Upload)</label>
                <input type="file" name="photo_path" accept="image/*" class="w-full text-xs text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-800 file:text-white hover:file:bg-slate-700">
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Ou URL de Foto Externa</label>
                <input type="url" name="photo_url" value="{{ old('photo_url') }}" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Biografia / Resumo Profissional</label>
                <textarea name="bio" rows="3" placeholder="Experiência e foco de trabalho..." class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">{{ old('bio') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Citação em Destaque (Quote)</label>
                <textarea name="quote" rows="2" placeholder="Frase inspiradora sobre estratégia de marca..." class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">{{ old('quote') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">LinkedIn URL</label>
                <input type="url" name="social_linkedin" value="{{ old('social_linkedin') }}" placeholder="https://linkedin.com/in/..." class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">E-mail Profissional</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="nome@xamariz.ao" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>
        </div>

        <div class="pt-6 border-t border-slate-800 flex items-center justify-end gap-4">
            <a href="{{ route('admin.team-members.index') }}" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs font-bold text-slate-300 transition-all">Cancelar</a>
            <button type="submit" class="px-6 py-3 rounded-xl bg-[#fe3d0a] hover:bg-[#d63205] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[#fe3d0a]/25 transition-all">Guardar Membro</button>
        </div>
    </form>

</div>
@endsection
