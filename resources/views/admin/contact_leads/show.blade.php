@extends('admin.layouts.app')

@section('title', 'Detalhes da Lead | CMS Xamariz')
@section('header_title', 'Mensagem de Contacto')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-white">Detalhes do Contacto</h2>
        <a href="{{ route('admin.contact-leads.index') }}" class="text-xs text-slate-400 hover:text-white">&larr; Voltar às mensagens</a>
    </div>

    <div class="bg-slate-900 border border-slate-800/80 rounded-2xl p-8 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-800 pb-4">
            <div>
                <h3 class="text-lg font-bold text-white">{{ $contactLead->first_name }} {{ $contactLead->last_name }}</h3>
                <p class="text-xs text-slate-400 font-mono">{{ $contactLead->email }} {{ $contactLead->company ? '| Empresa: '.$contactLead->company : '' }}</p>
            </div>
            <span class="text-xs text-slate-500">{{ $contactLead->created_at->format('d/m/Y H:i') }}</span>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Mensagem Enviada:</label>
            <div class="p-4 rounded-xl bg-slate-950 border border-slate-800 text-slate-200 text-sm leading-relaxed whitespace-pre-line">
                {{ $contactLead->message }}
            </div>
        </div>

        {{-- Status Update Form --}}
        <form action="{{ route('admin.contact-leads.update', $contactLead) }}" method="POST" class="pt-6 border-t border-slate-800 space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Alterar Estado da Lead</label>
                    <select name="status" class="w-full px-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-xs font-semibold">
                        <option value="new" {{ $contactLead->status === 'new' ? 'selected' : '' }}>Nova</option>
                        <option value="in_progress" {{ $contactLead->status === 'in_progress' ? 'selected' : '' }}>Em Atendimento</option>
                        <option value="closed" {{ $contactLead->status === 'closed' ? 'selected' : '' }}>Concluído / Atendido</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Notas Internas</label>
                    <input type="text" name="notes" value="{{ old('notes', $contactLead->notes) }}" placeholder="Ex: Respondido por e-mail em 17/08..." class="w-full px-4 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-xs">
                </div>
            </div>

            <div class="flex items-center justify-between pt-2">
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#fe3d0a] hover:bg-[#d63205] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[#fe3d0a]/20 transition-all">
                    Atualizar Estado
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
