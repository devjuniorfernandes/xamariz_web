@extends('admin.layouts.app')

@section('title', 'Editar Artigo | CMS Xamariz')
@section('header_title', 'Editar Artigo: '.$post->title)

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-white uppercase tracking-wider">Editar Artigo</h2>
        <a href="{{ route('admin.posts.index') }}" class="text-xs text-gray-400 hover:text-white uppercase tracking-wider">&larr; Voltar à lista</a>
    </div>

    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="bg-[#1f2022] border border-[#2c2d30] rounded-none p-8 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Título do Artigo *</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}" required class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Categoria / Tema</label>
                <input type="text" name="category" value="{{ old('category', $post->category) }}" class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Autor (Membro da Equipa)</label>
                <select name="author_id" class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                    <option value="">-- Selecione o Autor --</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id', $post->author_id) == $author->id ? 'selected' : '' }}>{{ $author->name }} ({{ $author->role }})</option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Resumo / Excerpt</label>
                <textarea name="summary" rows="2" class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">{{ old('summary', $post->summary) }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Conteúdo do Artigo (Texto Completo)</label>
                <textarea name="content" rows="10" class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm font-sans">{{ old('content', $post->content) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Substituir Capa (Upload)</label>
                <input type="file" name="cover_image" accept="image/*" class="w-full text-xs text-gray-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-[var(--color-brand-accent)] file:text-white hover:file:bg-[var(--color-brand-accent-hover)] cursor-pointer">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Ou URL de Imagem Externa</label>
                <input type="url" name="cover_url" value="{{ old('cover_url', $post->cover_image) }}" class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Estado</label>
                <select name="status" class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                    <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Publicado</option>
                    <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Rascunho</option>
                </select>
            </div>
        </div>

        <div class="pt-6 border-t border-[#2c2d30] flex items-center justify-end gap-4">
            <a href="{{ route('admin.posts.index') }}" class="px-6 py-3 rounded-full bg-[#2c2d30] hover:bg-gray-700 text-xs font-bold uppercase tracking-wider text-gray-300 transition-all">Cancelar</a>
            <button type="submit" class="px-8 py-3 rounded-full bg-[var(--color-brand-accent)] hover:bg-[var(--color-brand-accent-hover)] text-white text-xs font-bold uppercase tracking-wider transition-all">Atualizar Artigo</button>
        </div>
    </form>

</div>
@endsection
