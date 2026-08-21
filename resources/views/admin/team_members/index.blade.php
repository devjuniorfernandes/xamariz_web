@extends('admin.layouts.app')

@section('title', 'Equipa & Liderança | CMS Xamariz')
@section('header_title', 'Gestão da Equipa & Liderança')

@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between bg-slate-900 border border-slate-800/80 p-5 rounded-2xl">
        <div>
            <h2 class="text-lg font-bold text-white">Membros da Equipa</h2>
            <p class="text-xs text-slate-400">CEO, Conselho de Direção e Especialistas da Xamariz</p>
        </div>
        <a href="{{ route('admin.team-members.create') }}" class="px-5 py-2.5 rounded-xl bg-[#fe3d0a] hover:bg-[#d63205] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[#fe3d0a]/20 transition-all">
            + Novo Membro
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800/80 rounded-2xl overflow-hidden shadow-xl">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-950 text-slate-400 uppercase tracking-wider font-extrabold border-b border-slate-800">
                <tr>
                    <th class="py-4 px-6">Membro / Foto</th>
                    <th class="py-4 px-6">Cargo / Função</th>
                    <th class="py-4 px-6">Departamento</th>
                    <th class="py-4 px-6 text-center">Estado</th>
                    <th class="py-4 px-6 text-right">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800 text-slate-300">
                @forelse($team as $member)
                    <tr class="hover:bg-slate-800/40 transition-colors">
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-3">
                                @php
                                    $pPath = $member->photo_path;
                                    $pUrl = $pPath ? (Str::startsWith($pPath, ['http://', 'https://']) ? $pPath : asset(ltrim($pPath, '/'))) : null;
                                @endphp
                                @if($pUrl)
                                    <img src="{{ $pUrl }}" alt="{{ $member->name }}" class="w-10 h-10 rounded-full object-cover bg-slate-800 border border-slate-700">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-slate-800 text-white font-bold flex items-center justify-center text-xs">
                                        {{ substr($member->name, 0, 1) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="font-bold text-white text-sm">{{ $member->name }}</p>
                                    <p class="text-[11px] text-slate-500 font-mono">{{ $member->email ?? 'Sem e-mail' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="text-slate-200 font-semibold">{{ $member->role }}</span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 rounded-lg text-[11px] font-extrabold uppercase {{ $member->department === 'ceo' ? 'bg-amber-500/20 text-amber-400 border border-amber-500/30' : ($member->department === 'direction' ? 'bg-purple-500/20 text-purple-400 border border-purple-500/30' : 'bg-slate-800 text-slate-300') }}">
                                {{ strtoupper($member->department) }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-center">
                            @if($member->is_active)
                                <span class="px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-400 font-bold text-[10px]">ATIVO</span>
                            @else
                                <span class="text-slate-600 font-bold text-[10px]">INATIVO</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <a href="{{ route('admin.team-members.edit', $member) }}" class="inline-flex p-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-200 hover:text-white transition-colors" title="Editar">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 210.3H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            <form action="{{ route('admin.team-members.destroy', $member) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem a certeza que deseja eliminar este membro?')">
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
                        <td colspan="5" class="py-8 text-center text-slate-500">Nenhum membro da equipa registado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
