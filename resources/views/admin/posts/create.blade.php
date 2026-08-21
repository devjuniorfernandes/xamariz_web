@extends('admin.layouts.app')

@section('title', 'Novo Artigo | CMS Xamariz')
@section('header_title', 'Escrever Novo Artigo de Insights')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-white">Novo Artigo</h2>
        <a href="{{ route('admin.posts.index') }}" class="text-xs text-slate-400 hover:text-white">&larr; Voltar à lista</a>
    </div>

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-800/80 rounded-2xl p-8 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Título do Artigo *</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Ex: Como a comunicação transparente é a chave..." class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Categoria / Tema</label>
                <input type="text" name="category" value="{{ old('category') }}" placeholder="Ex: Estratégia 360°, Branding & Reputação" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Autor (Membro da Equipa)</label>
                <select name="author_id" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
                    <option value="">-- Selecione o Autor --</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }} ({{ $author->role }})</option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Resumo / Excerpt</label>
                <textarea name="summary" rows="2" placeholder="Breve resumo para os cartões de pré-visualização..." class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">{{ old('summary') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Conteúdo do Artigo (Texto Completo)</label>
                <textarea name="content" rows="10" placeholder="Escreva o artigo completo aqui..." class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm font-sans">{{ old('content') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Imagem de Capa (Upload)</label>
                <input type="file" name="cover_image" accept="image/*" class="w-full text-xs text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-800 file:text-white hover:file:bg-slate-700">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Ou URL de Imagem Externa</label>
                <input type="url" name="cover_url" value="{{ old('cover_url') }}" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Data de Publicação</label>
                <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Estado</label>
                <select name="status" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
                    <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Publicado</option>
                    <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Rascunho</option>
                </select>
            </div>
        </div>

        <div class="pt-6 border-t border-slate-800 flex items-center justify-end gap-4">
            <a href="{{ route('admin.posts.index') }}" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs font-bold text-slate-300 transition-all">Cancelar</a>
            <button type="submit" class="px-6 py-3 rounded-xl bg-[#fe3d0a] hover:bg-[#d63205] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[#fe3d0a]/25 transition-all">Guardar Artigo</button>
        </div>
    </form>

</div>
@endsection
