@extends('admin.layouts.app')

@section('title', 'Editar Membro | CMS Xamariz')
@section('header_title', 'Editar Membro: '.$teamMember->name)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-white">Editar Membro</h2>
        <a href="{{ route('admin.team-members.index') }}" class="text-xs text-slate-400 hover:text-white">&larr; Voltar à lista</a>
    </div>

    <form action="{{ route('admin.team-members.update', $teamMember) }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-800/80 rounded-2xl p-8 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Nome Completo *</label>
                <input type="text" name="name" value="{{ old('name', $teamMember->name) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Cargo / Função *</label>
                <input type="text" name="role" value="{{ old('role', $teamMember->role) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Departamento *</label>
                <select name="department" required class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
                    <option value="specialist" {{ old('department', $teamMember->department) === 'specialist' ? 'selected' : '' }}>Especialista / Operacional</option>
                    <option value="direction" {{ old('department', $teamMember->department) === 'direction' ? 'selected' : '' }}>Conselho de Direção</option>
                    <option value="ceo" {{ old('department', $teamMember->department) === 'ceo' ? 'selected' : '' }}>CEO & Liderança Destaque</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Substituir Foto (Upload)</label>
                <input type="file" name="photo_path" accept="image/*" class="w-full text-xs text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-800 file:text-white hover:file:bg-slate-700">
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Ou URL de Foto Externa</label>
                @php
                    // Só pré-preenche quando a foto atual é um URL externo. Se for um
                    // caminho local (ex.: equipa/Adriano.jpg), deixa vazio — senão o
                    // type="url" do navegador bloqueava a submissão a pedir um URL válido.
                    $externalPhoto = \Illuminate\Support\Str::startsWith($teamMember->photo_path ?? '', ['http://', 'https://'])
                        ? $teamMember->photo_path
                        : '';
                @endphp
                <input type="url" name="photo_url" value="{{ old('photo_url', $externalPhoto) }}" placeholder="https://…" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
                <p class="mt-1 text-[11px] text-slate-500">A foto atual mantém-se se deixares este campo vazio e não carregares um novo ficheiro.</p>
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Biografia / Resumo Profissional</label>
                <textarea name="bio" rows="3" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">{{ old('bio', $teamMember->bio) }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Citação em Destaque (Quote)</label>
                <textarea name="quote" rows="2" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">{{ old('quote', $teamMember->quote) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">LinkedIn URL</label>
                <input type="url" name="social_linkedin" value="{{ old('social_linkedin', $teamMember->social_linkedin) }}" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">E-mail Profissional</label>
                <input type="email" name="email" value="{{ old('email', $teamMember->email) }}" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Estado</label>
                <input type="hidden" name="is_active" value="0">
                <label class="inline-flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $teamMember->is_active) ? 'checked' : '' }} class="w-5 h-5 rounded bg-slate-950 border-slate-700 text-[#fe3d0a] focus:ring-[#fe3d0a]">
                    <span class="text-sm text-slate-300">Membro ativo (visível no site)</span>
                </label>
            </div>
        </div>

        <div class="pt-6 border-t border-slate-800 flex items-center justify-end gap-4">
            <a href="{{ route('admin.team-members.index') }}" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs font-bold text-slate-300 transition-all">Cancelar</a>
            <button type="submit" class="px-6 py-3 rounded-xl bg-[#fe3d0a] hover:bg-[#d63205] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[#fe3d0a]/25 transition-all">Atualizar Membro</button>
        </div>
    </form>

</div>
@endsection
