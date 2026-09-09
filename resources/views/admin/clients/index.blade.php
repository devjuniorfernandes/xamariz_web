@extends('admin.layouts.app')

@section('title', 'Clientes & Marcas | CMS Xamariz')
@section('header_title', 'Gestão de Clientes & Marcas')

@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between bg-slate-900 border border-slate-800/80 p-5 rounded-2xl">
        <div>
            <h2 class="text-lg font-bold text-white">Marcas Parceiras</h2>
            <p class="text-xs text-slate-400">Arraste os clientes para definir a ordem visual no site.</p>
        </div>
        <a href="{{ route('admin.clients.create') }}" class="px-5 py-2.5 rounded-xl bg-[#fe3d0a] hover:bg-[#d63205] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[#fe3d0a]/20 transition-all">
            + Novo Cliente
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800/80 rounded-2xl overflow-hidden shadow-xl">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-950 text-slate-400 uppercase tracking-wider font-extrabold border-b border-slate-800">
                <tr>
                    <th class="py-4 px-6">Cliente</th>
                    <th class="py-4 px-6">Sector</th>
                    <th class="py-4 px-6 text-center">Projetos Relacionados</th>
                    <th class="py-4 px-6 text-center">Marquee Home</th>
                    <th class="py-4 px-6 text-right">Ações</th>
                </tr>
            </thead>
            <tbody id="clients-sortable" class="divide-y divide-slate-800 text-slate-300">
                @forelse($clients as $client)
                    <tr draggable="true" data-client-id="{{ $client->id }}" class="hover:bg-slate-800/40 transition-colors cursor-grab active:cursor-grabbing">
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-3">
                                @php
                                    $logoUrl = $client->logo_path;
                                    if ($logoUrl) {
                                        $logoUrl = Str::startsWith($logoUrl, ['http://', 'https://']) ? $logoUrl : asset(ltrim($logoUrl, '/'));
                                    }
                                @endphp
                                @if($logoUrl)
                                    <img src="{{ $logoUrl }}" alt="{{ $client->name }}" class="w-10 h-10 rounded-lg object-contain bg-slate-950 p-1.5 border border-slate-800">
                                @else
                                    <div class="w-10 h-10 rounded-lg bg-slate-800 text-white font-bold flex items-center justify-center text-sm">
                                        {{ substr($client->name, 0, 1) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="font-bold text-white text-sm">{{ $client->name }}</p>
                                    <p class="text-[11px] text-slate-500 font-mono">/clients/{{ $client->slug }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="text-slate-300 font-semibold">{{ $client->sector ?? 'Geral' }}</span>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <span class="px-2.5 py-1 rounded-full bg-blue-500/20 text-blue-400 font-extrabold text-xs">
                                {{ $client->works_count }} Obras
                            </span>
                        </td>
                        <td class="py-4 px-6 text-center">
                            @if($client->show_in_marquee)
                                <span class="px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-400 font-bold text-[10px]">SIM</span>
                            @else
                                <span class="text-slate-600 font-bold text-[10px]">NÃO</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <a href="{{ route('admin.clients.edit', $client) }}" class="inline-flex p-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-200 hover:text-white transition-colors" title="Editar">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 210.3H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem a certeza que deseja eliminar este cliente?')">
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
                        <td colspan="5" class="py-8 text-center text-slate-500">Nenhum cliente registado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <p id="clients-sort-status" class="text-xs text-slate-500 hidden">Ordem guardada.</p>

</div>

@push('scripts')
<script>
    const clientsTable = document.getElementById('clients-sortable');
    const sortStatus = document.getElementById('clients-sort-status');
    let draggedClient = null;

    clientsTable?.querySelectorAll('tr[draggable="true"]').forEach(row => {
        row.addEventListener('dragstart', () => {
            draggedClient = row;
            row.classList.add('opacity-40');
        });
        row.addEventListener('dragend', () => {
            row.classList.remove('opacity-40');
            draggedClient = null;
        });
        row.addEventListener('dragover', event => {
            event.preventDefault();
            if (draggedClient && draggedClient !== row) {
                const box = row.getBoundingClientRect();
                row.parentNode.insertBefore(draggedClient, event.clientY < box.top + box.height / 2 ? row : row.nextSibling);
            }
        });
        row.addEventListener('drop', async event => {
            event.preventDefault();
            const clientIds = [...clientsTable.querySelectorAll('tr[data-client-id]')].map(item => item.dataset.clientId);
            const response = await fetch('{{ route('admin.clients.reorder') }}', {
                method: 'POST',
                headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json'},
                body: JSON.stringify({client_ids: clientIds})
            });
            if (response.ok) {
                sortStatus.classList.remove('hidden');
                setTimeout(() => sortStatus.classList.add('hidden'), 2000);
            }
        });
    });
</script>
@endpush
@endsection
