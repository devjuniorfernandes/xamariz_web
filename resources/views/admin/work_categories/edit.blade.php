@extends('admin.layouts.app')

@section('title', 'Editar Filtro | CMS Xamariz')
@section('header_title', 'Editar Filtro: '.$workCategory->name)

@section('content')
<div class="max-w-xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-white">Editar Filtro</h2>
        <a href="{{ route('admin.work-categories.index') }}" class="text-xs text-slate-400 hover:text-white">&larr; Voltar à lista</a>
    </div>

    <form action="{{ route('admin.work-categories.update', $workCategory) }}" method="POST" class="bg-slate-900 border border-slate-800/80 rounded-2xl p-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Nome do Filtro *</label>
            <input type="text" name="name" value="{{ old('name', $workCategory->name) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Chave de Filtro (filter_key) *</label>
            <input type="text" name="filter_key" value="{{ old('filter_key', $workCategory->filter_key) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm font-mono">
            <p class="text-[11px] text-slate-500 mt-1">Identificador técnico usado nos botões de filtro da página pública.</p>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Ordem de Exibição</label>
            <input type="number" name="display_order" value="{{ old('display_order', $workCategory->display_order) }}" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
        </div>

        <div class="pt-6 border-t border-slate-800 flex items-center justify-end gap-4">
            <a href="{{ route('admin.work-categories.index') }}" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs font-bold text-slate-300 transition-all">Cancelar</a>
            <button type="submit" class="px-6 py-3 rounded-xl bg-[#fe3d0a] hover:bg-[#d63205] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[#fe3d0a]/25 transition-all">Atualizar Filtro</button>
        </div>
    </form>

</div>
@endsection
