@extends('admin.layouts.app')

@section('title', 'Editar Slide | CMS Xamariz')
@section('header_title', 'Editar Slide de Vídeo')

@section('content')
<div class="max-w-xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-white">Editar Slide</h2>
        <a href="{{ route('admin.hero-slides.index') }}" class="text-xs text-slate-400 hover:text-white">&larr; Voltar à lista</a>
    </div>

    <form action="{{ route('admin.hero-slides.update', $heroSlide) }}" method="POST" class="bg-slate-900 border border-slate-800/80 rounded-2xl p-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Título do Slide (Opcional)</label>
            <input type="text" name="title" value="{{ old('title', $heroSlide->title) }}" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Caminho / Nome do Ficheiro MP4 *</label>
            <input type="text" name="video_path" value="{{ old('video_path', $heroSlide->video_path) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white font-mono focus:outline-none focus:border-[#fe3d0a] text-sm">
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Ordem de Exibição</label>
            <input type="number" name="display_order" value="{{ old('display_order', $heroSlide->display_order) }}" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
        </div>

        <div class="pt-6 border-t border-slate-800 flex items-center justify-end gap-4">
            <a href="{{ route('admin.hero-slides.index') }}" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs font-bold text-slate-300 transition-all">Cancelar</a>
            <button type="submit" class="px-6 py-3 rounded-xl bg-[#fe3d0a] hover:bg-[#d63205] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[#fe3d0a]/25 transition-all">Atualizar Slide</button>
        </div>
    </form>

</div>
@endsection
