@extends('admin.layouts.app')

@section('title', 'Definições do Site | CMS Xamariz')
@section('header_title', 'Configurações Globais do Site')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-white">Configurações Gerais</h2>
            <p class="text-xs text-slate-400">Informações corporativas, contactos e redes sociais exibidos no site</p>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="bg-slate-900 border border-slate-800/80 rounded-2xl p-8 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Nome do Site / Empresa</label>
                <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? 'Xamariz | Agência de Publicidade Angola & Marketing 360°') }}" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Endereço Físico (Morada Luanda)</label>
                <input type="text" name="address" value="{{ old('address', $settings['address'] ?? 'Rua Francisco Sotto Mayor 18, Bairro Azul, Luanda, Angola') }}" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Telefone Principal</label>
                <input type="text" name="phone" value="{{ old('phone', $settings['phone'] ?? '+244 941 561 422') }}" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">E-mail Corporativo</label>
                <input type="email" name="email" value="{{ old('email', $settings['email'] ?? 'geral@xamariz.ao') }}" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">LinkedIn URL</label>
                <input type="url" name="linkedin" value="{{ old('linkedin', $settings['linkedin'] ?? 'https://linkedin.com/company/xamariz') }}" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Instagram URL</label>
                <input type="url" name="instagram" value="{{ old('instagram', $settings['instagram'] ?? 'https://instagram.com/xamariz.ao') }}" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
            </div>
        </div>

        <div class="pt-6 border-t border-slate-800 flex items-center justify-end">
            <button type="submit" class="px-6 py-3 rounded-xl bg-[#fe3d0a] hover:bg-[#d63205] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[#fe3d0a]/25 transition-all">Guardar Configurações</button>
        </div>
    </form>

</div>
@endsection
