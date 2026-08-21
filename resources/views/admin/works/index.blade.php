@extends('admin.layouts.app')

@section('title', 'Projetos do Portfólio | CMS Xamariz')
@section('header_title', 'Gestão de Projetos & Portfólio')

@section('content')
<div class="space-y-6">

    {{-- Top Action Bar & Filters --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-[#1f2022] border border-[#2c2d30] p-5 rounded-none">
        <form method="GET" action="{{ route('admin.works.index') }}" class="flex flex-wrap items-center gap-3">
            {{-- Category / Filter Dropdown --}}
            <select name="category" onchange="this.form.submit()" class="px-4 py-2.5 rounded-none bg-[#141414] border border-[#2c2d30] text-xs font-semibold text-gray-200 focus:outline-none focus:border-[var(--color-brand-accent)]">
                <option value="">-- Todos os Filtros / Sectores --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>

            {{-- Client Dropdown --}}
            <select name="client" onchange="this.form.submit()" class="px-4 py-2.5 rounded-none bg-[#141414] border border-[#2c2d30] text-xs font-semibold text-gray-200 focus:outline-none focus:border-[var(--color-brand-accent)]">
                <option value="">-- Todos os Clientes / Marcas --</option>
                @foreach($clients as $c)
                    <option value="{{ $c->id }}" {{ request('client') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Pesquisar projeto..." class="px-4 py-2.5 rounded-none bg-[#141414] border border-[#2c2d30] text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[var(--color-brand-accent)]">

            <button type="submit" class="px-5 py-2.5 rounded-full bg-[#2c2d30] hover:bg-gray-700 text-xs font-bold uppercase tracking-wider text-white transition-all">Filtrar</button>
            @if(request()->hasAny(['category', 'client', 'search']))
                <a href="{{ route('admin.works.index') }}" class="text-xs text-gray-400 hover:text-white underline uppercase tracking-wider">Limpar</a>
            @endif
        </form>

        <a href="{{ route('admin.works.create') }}" class="px-6 py-2.5 rounded-full bg-[var(--color-brand-accent)] hover:bg-[var(--color-brand-accent-hover)] text-white text-xs font-bold uppercase tracking-wider transition-all flex items-center justify-center gap-2">
            <span>+ Criar Novo Projeto</span>
        </a>
    </div>

    {{-- Data Table --}}
    <div class="bg-[#1f2022] border border-[#2c2d30] rounded-none overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#141414] text-gray-400 uppercase tracking-wider font-extrabold border-b border-[#2c2d30]">
                    <tr>
                        <th class="py-4 px-6">Projeto / Capa</th>
                        <th class="py-4 px-6">Cliente (Marca)</th>
                        <th class="py-4 px-6">Filtro / Sector</th>
                        <th class="py-4 px-6 text-center">Destaque Home</th>
                        <th class="py-4 px-6 text-center">Estado</th>
                        <th class="py-4 px-6 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#2c2d30] text-gray-300">
                    @forelse($works as $work)
                        <tr class="hover:bg-black/30 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    @php
                                        $wCover = $work->cover_image;
                                        $wCoverUrl = $wCover ? (Str::startsWith($wCover, ['http://', 'https://']) ? $wCover : asset(ltrim($wCover, '/'))) : null;
                                    @endphp
                                    @if($wCoverUrl)
                                        <img src="{{ $wCoverUrl }}" alt="{{ $work->title }}" class="w-12 h-12 rounded-none object-cover bg-[#141414] border border-[#2c2d30]">
                                    @else
                                        <div class="w-12 h-12 rounded-none bg-[#141414] border border-[#2c2d30] flex items-center justify-center text-xs font-bold text-gray-500">
                                            W
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-bold text-white text-sm">{{ $work->title }}</p>
                                        <p class="text-[11px] text-gray-500 font-mono">/work/{{ $work->slug }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                @if($work->client)
                                    <span class="px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 font-bold border border-blue-500/20 text-[10px] uppercase tracking-wider">
                                        {{ $work->client->name }}
                                    </span>
                                @else
                                    <span class="text-gray-500 italic">Sem cliente</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                @if($work->category)
                                    <span class="px-3 py-1 rounded-full bg-purple-500/10 text-purple-400 font-bold border border-purple-500/20 text-[10px] uppercase tracking-wider">
                                        {{ $work->category->name }}
                                    </span>
                                @else
                                    <span class="text-gray-500 italic">Sem filtro</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center">
                                @if($work->is_featured_home)
                                    <span class="px-2.5 py-1 rounded-full bg-emerald-500/20 text-emerald-400 font-bold text-[10px]">SIM</span>
                                @else
                                    <span class="text-gray-600 font-bold text-[10px]">NÃO</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center">
                                <span class="px-3 py-1 rounded-full text-[10px] font-extrabold uppercase {{ $work->status === 'published' ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30' : 'bg-amber-500/20 text-amber-400 border border-amber-500/30' }}">
                                    {{ $work->status }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.works.edit', $work) }}" class="inline-flex p-2 text-gray-400 hover:text-white transition-colors" title="Editar">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 210.3H3v-3.572L16.732 3.732z"></path></svg>
                                </a>
                                <form action="{{ route('admin.works.destroy', $work) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem a certeza que deseja eliminar este projeto?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-rose-400 hover:text-rose-300 transition-colors" title="Eliminar">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-gray-500 font-medium">Nenhum projeto encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($works->hasPages())
            <div class="p-4 border-t border-[#2c2d30]">
                {{ $works->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
