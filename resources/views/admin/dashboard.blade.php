@extends('admin.layouts.app')

@section('title', 'Dashboard CMS | Xamariz')
@section('header_title', 'Visão Geral do CMS')

@section('content')
<div class="space-y-8">

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5">
        
        <div class="p-6 rounded-none bg-[#1f2022] border border-[#2c2d30] hover:border-[var(--color-brand-accent)] transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-400">PROJETOS</span>
                <div class="w-10 h-10 rounded-full bg-[var(--color-brand-accent)]/10 text-[var(--color-brand-accent)] flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-white mt-4">{{ $stats['works_count'] }}</p>
            <a href="{{ route('admin.works.index') }}" class="text-[11px] font-bold uppercase tracking-wider text-[var(--color-brand-accent)] hover:underline mt-2 inline-block">Gerir portfólio &rarr;</a>
        </div>

        <div class="p-6 rounded-none bg-[#1f2022] border border-[#2c2d30] hover:border-[var(--color-brand-accent)] transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-400">CLIENTES</span>
                <div class="w-10 h-10 rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-white mt-4">{{ $stats['clients_count'] }}</p>
            <a href="{{ route('admin.clients.index') }}" class="text-[11px] font-bold uppercase tracking-wider text-blue-400 hover:underline mt-2 inline-block">Gerir marcas &rarr;</a>
        </div>

        <div class="p-6 rounded-none bg-[#1f2022] border border-[#2c2d30] hover:border-[var(--color-brand-accent)] transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-400">EQUIPA</span>
                <div class="w-10 h-10 rounded-full bg-purple-500/10 text-purple-400 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-white mt-4">{{ $stats['team_count'] }}</p>
            <a href="{{ route('admin.team-members.index') }}" class="text-[11px] font-bold uppercase tracking-wider text-purple-400 hover:underline mt-2 inline-block">Ver especialistas &rarr;</a>
        </div>

        <div class="p-6 rounded-none bg-[#1f2022] border border-[#2c2d30] hover:border-[var(--color-brand-accent)] transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-400">SERVIÇOS</span>
                <div class="w-10 h-10 rounded-full bg-amber-500/10 text-amber-400 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-white mt-4">{{ $stats['services_count'] }}</p>
            <a href="{{ route('admin.services.index') }}" class="text-[11px] font-bold uppercase tracking-wider text-amber-400 hover:underline mt-2 inline-block">Gerir ofertas &rarr;</a>
        </div>

        <div class="p-6 rounded-none bg-[#1f2022] border border-[#2c2d30] hover:border-[var(--color-brand-accent)] transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-400">INSIGHTS</span>
                <div class="w-10 h-10 rounded-full bg-cyan-500/10 text-cyan-400 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-white mt-4">{{ $stats['posts_count'] }}</p>
            <a href="{{ route('admin.posts.index') }}" class="text-[11px] font-bold uppercase tracking-wider text-cyan-400 hover:underline mt-2 inline-block">Gerir blog &rarr;</a>
        </div>

        <div class="p-6 rounded-none bg-[#1f2022] border border-[#2c2d30] hover:border-[var(--color-brand-accent)] transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-400">LEADS NOVAS</span>
                <div class="w-10 h-10 rounded-full bg-emerald-500/10 text-emerald-400 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-white mt-4">{{ $stats['leads_count'] }}</p>
            <a href="{{ route('admin.contact-leads.index') }}" class="text-[11px] font-bold uppercase tracking-wider text-emerald-400 hover:underline mt-2 inline-block">Ver mensagens &rarr;</a>
        </div>

    </div>

    {{-- Two Column Recent Sections --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        {{-- Recent Works --}}
        <div class="bg-[#1f2022] border border-[#2c2d30] rounded-none p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-bold text-white uppercase tracking-wider">Projetos Recentes</h2>
                    <p class="text-xs text-gray-400">Últimos trabalhos adicionados ao portfólio</p>
                </div>
                <a href="{{ route('admin.works.create') }}" class="px-4 py-2 rounded-full bg-[var(--color-brand-accent)] hover:bg-[var(--color-brand-accent-hover)] text-white text-xs font-bold uppercase tracking-wider transition-all flex items-center gap-1.5">
                    <span>+ Novo Projeto</span>
                </a>
            </div>

            <div class="divide-y divide-[#2c2d30]">
                @forelse($recentWorks as $work)
                    <div class="py-4 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <img src="{{ $work->cover_image }}" alt="{{ $work->title }}" class="w-12 h-12 rounded-none object-cover bg-[#141414]">
                            <div>
                                <h3 class="text-sm font-bold text-white">{{ $work->title }}</h3>
                                <p class="text-xs text-gray-400">
                                    Cliente: <span class="text-gray-200 font-semibold">{{ $work->client->name ?? 'Sem cliente' }}</span> | 
                                    Filtro: <span class="text-gray-200 font-semibold">{{ $work->category->name ?? 'Sem categoria' }}</span>
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('admin.works.edit', $work) }}" class="p-2 text-gray-400 hover:text-white transition-colors" title="Editar">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 210.3H3v-3.572L16.732 3.732z"></path></svg>
                        </a>
                    </div>
                @empty
                    <p class="py-6 text-center text-xs text-gray-500">Nenhum projeto registado.</p>
                @endforelse
            </div>
        </div>

        {{-- Recent Leads --}}
        <div class="bg-[#1f2022] border border-[#2c2d30] rounded-none p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-bold text-white uppercase tracking-wider">Contactos Recentes</h2>
                    <p class="text-xs text-gray-400">Mensagens enviadas pelo formulário público</p>
                </div>
                <a href="{{ route('admin.contact-leads.index') }}" class="text-xs font-bold uppercase tracking-wider text-emerald-400 hover:underline">Ver todas &rarr;</a>
            </div>

            <div class="divide-y divide-[#2c2d30]">
                @forelse($recentLeads as $lead)
                    <div class="py-4 flex items-center justify-between">
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="text-sm font-bold text-white">{{ $lead->first_name }} {{ $lead->last_name }}</h3>
                                @if($lead->status === 'new')
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">NOVO</span>
                                @endif
                            </div>
                            <p class="text-xs text-gray-400">{{ $lead->email }} {{ $lead->company ? '| '.$lead->company : '' }}</p>
                        </div>
                        <a href="{{ route('admin.contact-leads.show', $lead) }}" class="px-4 py-2 rounded-full bg-[#141414] hover:bg-white/10 text-xs font-bold uppercase tracking-wider text-white transition-colors">
                            Ler Mensagem
                        </a>
                    </div>
                @empty
                    <p class="py-6 text-center text-xs text-gray-500">Nenhuma mensagem recebida ainda.</p>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
