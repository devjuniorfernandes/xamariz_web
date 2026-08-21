@extends('admin.layouts.app')

@section('title', 'Contactos & Leads | CMS Xamariz')
@section('header_title', 'Gestão de Contactos & Leads')

@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between bg-slate-900 border border-slate-800/80 p-5 rounded-2xl">
        <div>
            <h2 class="text-lg font-bold text-white">Mensagens do Formulário de Contacto</h2>
            <p class="text-xs text-slate-400">Leads recebidas a partir da página pública de contactos</p>
        </div>
    </div>

    <div class="bg-slate-900 border border-slate-800/80 rounded-2xl overflow-hidden shadow-xl">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-950 text-slate-400 uppercase tracking-wider font-extrabold border-b border-slate-800">
                <tr>
                    <th class="py-4 px-6">Nome Completo</th>
                    <th class="py-4 px-6">E-mail</th>
                    <th class="py-4 px-6">Empresa</th>
                    <th class="py-4 px-6 text-center">Estado</th>
                    <th class="py-4 px-6 text-right">Data</th>
                    <th class="py-4 px-6 text-right">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800 text-slate-300">
                @forelse($leads as $lead)
                    <tr class="hover:bg-slate-800/40 transition-colors">
                        <td class="py-4 px-6 font-bold text-white text-sm">
                            {{ $lead->first_name }} {{ $lead->last_name }}
                        </td>
                        <td class="py-4 px-6 font-mono text-slate-300">
                            {{ $lead->email }}
                        </td>
                        <td class="py-4 px-6 text-slate-400">
                            {{ $lead->company ?? '-' }}
                        </td>
                        <td class="py-4 px-6 text-center">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-extrabold uppercase {{ $lead->status === 'new' ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30' : ($lead->status === 'in_progress' ? 'bg-amber-500/20 text-amber-400 border border-amber-500/30' : 'bg-slate-800 text-slate-400') }}">
                                {{ $lead->status === 'new' ? 'NOVO' : ($lead->status === 'in_progress' ? 'EM ATENDIMENTO' : 'CONCLUÍDO') }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-right text-slate-400">
                            {{ $lead->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <a href="{{ route('admin.contact-leads.show', $lead) }}" class="inline-flex px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-white font-semibold transition-colors">
                                Ver Detalhes
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-500">Nenhuma mensagem recebida ainda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
