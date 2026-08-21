@extends('admin.layouts.app')

@section('title', 'Criar Novo Projeto | CMS Xamariz')
@section('header_title', 'Adicionar Projeto ao Portfólio')

@section('content')
<div class="max-w-4xl mx-auto space-y-6" x-data="{
    gallery: [
        { url: 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?w=1200&auto=format&fit=crop&q=80', size: 'full', caption: '' },
        { url: 'https://images.unsplash.com/photo-1604187351574-c75ca79f5807?w=900&auto=format&fit=crop&q=80', size: 'half', caption: '' },
        { url: 'https://images.unsplash.com/photo-1601924921557-45e6dea0a157?w=900&auto=format&fit=crop&q=80', size: 'half', caption: '' }
    ],
    addImage() {
        this.gallery.push({ url: '', size: 'full', caption: '' });
    },
    removeImage(index) {
        this.gallery.splice(index, 1);
    }
}">

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-white uppercase tracking-wider">Novo Projeto</h2>
        <a href="{{ route('admin.works.index') }}" class="text-xs text-gray-400 hover:text-white uppercase tracking-wider">&larr; Voltar à lista</a>
    </div>

    <form action="{{ route('admin.works.store') }}" method="POST" enctype="multipart/form-data" class="bg-[#1f2022] border border-[#2c2d30] rounded-none p-8 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Título do Projeto *</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Ex: Meet the Exxperts" class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Cliente / Marca *</label>
                <select name="client_id" required class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                    <option value="">-- Selecionar Cliente --</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Filtro / Sector *</label>
                <select name="work_category_id" required class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                    <option value="">-- Selecionar Categoria / Filtro --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('work_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }} ({{ $category->filter_key }})</option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Imagem de Capa (Hero Cover) *</label>
                <input type="text" name="cover_url" value="{{ old('cover_url') }}" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm font-mono mb-2">
                <input type="file" name="cover_image" class="text-xs text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-[var(--color-brand-accent)] file:text-white hover:file:bg-[var(--color-brand-accent-hover)] cursor-pointer">
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Link do Projeto Concluído (Website Externo)</label>
                <input type="url" name="external_url" value="{{ old('external_url') }}" placeholder="Ex: https://www.exxonmobil.com" class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm font-mono">
                <p class="text-[11px] text-gray-500 mt-1">Cria o botão "Ver Projeto Concluído ↗" no detalhe público do trabalho.</p>
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Vídeo Externo (YouTube / Vimeo / MP4)</label>
                <input type="text" name="video_url" value="{{ old('video_url') }}" placeholder="Ex: https://www.youtube.com/watch?v=dQw4w9WgXcQ ou MP4" class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm font-mono">
                <p class="text-[11px] text-gray-500 mt-1">Incorpora automaticamente um leitor de vídeo HD no estudo de caso do projeto.</p>
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Slogan / Frase Curta de Impacto (Tagline)</label>
                <input type="text" name="tagline" value="{{ old('tagline') }}" placeholder="Ex: Reciclagem avançada transformada numa narrativa de economia circular." class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Resumo Curto (Exibido nos Cards) *</label>
                <textarea name="summary" rows="3" required class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">{{ old('summary') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Descrição Completa / Case Study *</label>
                <textarea name="description" rows="6" required class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">{{ old('description') }}</textarea>
            </div>

            {{-- Dynamic Image Gallery Builder with Sizes --}}
            <div class="md:col-span-2 space-y-4 pt-4 border-t border-[#2c2d30]">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Galeria de Imagens de Diferentes Tamanhos</h3>
                        <p class="text-xs text-gray-400">Adicione imagens ao case study e escolha o formato de exibição (Largura Total 100%, 2 Colunas 50%, Retrato 33%).</p>
                    </div>
                    <button type="button" @click="addImage()" class="px-4 py-2 rounded-full bg-white/10 hover:bg-white/20 text-white text-xs font-bold uppercase tracking-wider transition-all">
                        + Adicionar Imagem
                    </button>
                </div>

                <div class="space-y-3">
                    <template x-for="(img, index) in gallery" :key="index">
                        <div class="p-4 bg-[#141414] border border-[#2c2d30] rounded-none grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
                            <div class="md:col-span-6">
                                <label class="block text-[10px] font-bold uppercase text-gray-400 mb-1">URL da Imagem</label>
                                <input type="text" :name="'gallery['+index+'][url]'" x-model="img.url" placeholder="https://..." class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-xs text-white focus:outline-none focus:border-[var(--color-brand-accent)] font-mono">
                            </div>
                            <div class="md:col-span-4">
                                <label class="block text-[10px] font-bold uppercase text-gray-400 mb-1">Tamanho / Formato na Grelha</label>
                                <select :name="'gallery['+index+'][size]'" x-model="img.size" class="w-full px-3 py-2 bg-[#1f2022] border border-[#2c2d30] text-xs text-white focus:outline-none focus:border-[var(--color-brand-accent)] font-semibold">
                                    <option value="full">100% Largura Total (Full Width 1200px)</option>
                                    <option value="half">50% Metade da Grelha (2 Colunas)</option>
                                    <option value="portrait">33% Retrato Vertical (3 Colunas)</option>
                                </select>
                            </div>
                            <div class="md:col-span-2 text-right pt-4 md:pt-0">
                                <button type="button" @click="removeImage(index)" class="px-3 py-1.5 rounded-full bg-rose-500/20 text-rose-300 hover:bg-rose-500/40 text-[11px] font-bold uppercase transition-all">
                                    Remover
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">Estado</label>
                <select name="status" class="w-full px-4 py-3 rounded-none bg-[#141414] border border-[#2c2d30] text-white focus:outline-none focus:border-[var(--color-brand-accent)] text-sm">
                    <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Publicado</option>
                    <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Rascunho</option>
                </select>
            </div>

            <div class="flex items-center pt-6">
                <label class="flex items-center gap-3 cursor-pointer text-gray-300 text-xs font-bold uppercase tracking-wider">
                    <input type="checkbox" name="is_featured_home" value="1" {{ old('is_featured_home') ? 'checked' : '' }} class="bg-[#141414] border-[#2c2d30] text-[var(--color-brand-accent)] focus:ring-0">
                    <span>Destacar na Homepage</span>
                </label>
            </div>
        </div>

        <div class="pt-6 border-t border-[#2c2d30] flex items-center justify-end gap-4">
            <a href="{{ route('admin.works.index') }}" class="px-6 py-3 rounded-full bg-[#2c2d30] hover:bg-gray-700 text-xs font-bold uppercase tracking-wider text-gray-300 transition-all">Cancelar</a>
            <button type="submit" class="px-8 py-3 rounded-full bg-[var(--color-brand-accent)] hover:bg-[var(--color-brand-accent-hover)] text-white text-xs font-bold uppercase tracking-wider transition-all">Guardar Projeto</button>
        </div>
    </form>

</div>
@endsection
