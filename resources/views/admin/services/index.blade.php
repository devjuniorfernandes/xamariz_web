@extends('admin.layouts.app')

@section('title', 'Serviços 360° | CMS Xamariz')
@section('header_title', 'Gestão de Serviços & Oferta 360°')

@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between bg-slate-900 border border-slate-800/80 p-5 rounded-2xl">
        <div>
            <h2 class="text-lg font-bold text-white">Serviços Oferecidos</h2>
            <p class="text-xs text-slate-400">Cards interativos da Home e páginas detalhadas de serviços</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="px-5 py-2.5 rounded-xl bg-[#fe3d0a] hover:bg-[#d63205] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[#fe3d0a]/20 transition-all">
            + Novo Serviço
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800/80 rounded-2xl overflow-hidden shadow-xl">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-950 text-slate-400 uppercase tracking-wider font-extrabold border-b border-slate-800">
                <tr>
                    <th class="py-4 px-6">Código</th>
                    <th class="py-4 px-6">Título do Serviço</th>
                    <th class="py-4 px-6">Descrição Curta</th>
                    <th class="py-4 px-6 text-center">Estado</th>
                    <th class="py-4 px-6 text-right">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800 text-slate-300">
                @forelse($services as $service)
                    <tr class="hover:bg-slate-800/40 transition-colors">
                        <td class="py-4 px-6 font-mono font-bold text-[#fe3d0a]">
                            {{ $service->number_code }}
                        </td>
                        <td class="py-4 px-6 font-bold text-white text-sm">
                            {{ $service->title }}
                        </td>
                        <td class="py-4 px-6 text-slate-400 max-w-md truncate">
                            {{ $service->short_description }}
                        </td>
                        <td class="py-4 px-6 text-center">
                            @if($service->is_active)
                                <span class="px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-400 font-bold text-[10px]">ATIVO</span>
                            @else
                                <span class="text-slate-600 font-bold text-[10px]">INATIVO</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <a href="{{ route('admin.services.edit', $service) }}" class="inline-flex p-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-200 hover:text-white transition-colors" title="Editar">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 210.3H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem a certeza que deseja eliminar este serviço?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 rounded-lg bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 transition-colors" title="Eliminar">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-slate-500">Nenhum serviço registado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
