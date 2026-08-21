@extends('admin.layouts.app')

@section('title', 'Editar Serviço | CMS Xamariz')
@section('header_title', 'Editar Serviço: '.$service->title)

@section('content')
<div class="max-w-4xl mx-auto space-y-6" x-data="{
    deliverables: {{ json_encode(old('deliverables', $service->deliverables ?? [
        ['title' => '', 'desc' => '']
    ])) }},
    methodology: {{ json_encode(old('methodology', $service->methodology ?? [
        ['step' => '01', 'title' => 'Diagnóstico & Imersão', 'desc' => 'Estudamos profundamente o seu negócio, concorrentes e público-alvo para mapear oportunidades reais.'],
        ['step' => '02', 'title' => 'Estratégia & Conceito', 'desc' => 'Desenvolvemos o plano de ação com metas claras, mensagens de impacto e cronograma de execução.'],
        ['step' => '03', 'title' => 'Produção & Implementação', 'desc' => 'Criamos e lançamos as peças publicitárias, plataformas web, vídeos ou campanhas com excelência.'],
        ['step' => '04', 'title' => 'Análise de ROI & Otimização', 'desc' => 'Monitorizamos o desempenho em tempo real, ajustando métricas para maximizar a conversão.']
    ])) }},
    metrics: {{ json_encode(old('metrics', $service->metrics ?? [
        ['value' => '+350%', 'label' => 'Aumento de Alcance Relevante'],
        ['value' => '98%', 'label' => 'Taxa de Retenção de Clientes'],
        ['value' => '100%', 'label' => 'Alinhamento com Objetivos de ROI']
    ])) }}
}">

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-white">Editar Serviço</h2>
        <a href="{{ route('admin.services.index') }}" class="text-xs text-slate-400 hover:text-white">&larr; Voltar à lista</a>
    </div>

    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" class="bg-slate-900 border border-slate-800/80 rounded-2xl p-8 space-y-8">
        @csrf
        @method('PUT')

        {{-- Secção 1: Informações Gerais --}}
        <div class="space-y-6">
            <h3 class="text-sm font-extrabold uppercase tracking-wider text-[#fe3d0a] border-b border-slate-800 pb-2">1. Informações Principais & Hero</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Código do Serviço (Ex: 01, 02) *</label>
                    <input type="text" name="number_code" value="{{ old('number_code', $service->number_code) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white font-mono focus:outline-none focus:border-[#fe3d0a] text-sm">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Título do Serviço *</label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Subtítulo / Tagline Estratégico (Hero)</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $service->tagline) }}" placeholder="Ex: Transformamos mensagens corporativas complexas em posicionamentos claros..." class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-[#fe3d0a] text-sm">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Descrição Curta (Card Interativo da Homepage)</label>
                    <textarea name="short_description" rows="2" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">{{ old('short_description', $service->short_description) }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Descrição Geral Completa (Hero da página de detalhes)</label>
                    <textarea name="full_description" rows="3" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">{{ old('full_description', $service->full_description) }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Substituir Imagem de Destaque (Upload SVG / PNG / WEBP)</label>
                    <input type="file" name="image_path" accept=".svg,.png,.webp,.jpg,.jpeg,image/*" class="w-full text-xs text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-800 file:text-white hover:file:bg-slate-700">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Ou URL de Imagem Externa</label>
                    <input type="url" name="image_url" value="{{ old('image_url', $service->image_path) }}" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
                </div>
            </div>
        </div>

        {{-- Secção 2: Valor Estratégico --}}
        <div class="space-y-6 pt-4 border-t border-slate-800">
            <h3 class="text-sm font-extrabold uppercase tracking-wider text-[#fe3d0a] border-b border-slate-800 pb-2">2. Valor Estratégico ("Como este serviço transforma a sua empresa")</h3>

            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Parágrafo 1 de Introdução Estratégica</label>
                    <textarea name="strategic_value_para1" rows="3" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">{{ old('strategic_value_para1', $service->strategic_value_para1) }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Parágrafo 2 de Aprofundamento Estratégico</label>
                    <textarea name="strategic_value_para2" rows="3" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">{{ old('strategic_value_para2', $service->strategic_value_para2) }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Citação em Destaque (Frase / Quote da Direção)</label>
                    <input type="text" name="quote" value="{{ old('quote', $service->quote) }}" class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white focus:outline-none focus:border-[#fe3d0a] text-sm">
                </div>
            </div>
        </div>

        {{-- Secção 3: Entregáveis & Soluções Incluídas --}}
        <div class="space-y-6 pt-4 border-t border-slate-800">
            <div class="flex items-center justify-between border-b border-slate-800 pb-2">
                <h3 class="text-sm font-extrabold uppercase tracking-wider text-[#fe3d0a]">3. Entregáveis & Soluções Incluídas ("O Que Entregamos")</h3>
                <button type="button" @click="deliverables.push({title: '', desc: ''})" class="px-3 py-1.5 rounded-full bg-slate-800 hover:bg-slate-700 text-xs font-bold text-slate-200 transition-all">+ Adicionar Entregável</button>
            </div>

            <div class="space-y-4">
                <template x-for="(item, index) in deliverables" :key="index">
                    <div class="p-4 bg-slate-950 border border-slate-800/80 rounded-xl space-y-3 relative">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-400" x-text="'Entregável 0' + (index + 1)"></span>
                            <button type="button" @click="deliverables.splice(index, 1)" class="text-xs text-rose-400 hover:text-rose-300">Remover</button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <input type="text" :name="'deliverables['+index+'][title]'" x-model="item.title" placeholder="Título da Solução" class="w-full px-3 py-2 rounded-lg bg-slate-900 border border-slate-800 text-white text-xs">
                            </div>
                            <div>
                                <input type="text" :name="'deliverables['+index+'][desc]'" x-model="item.desc" placeholder="Descrição curta da solução..." class="w-full px-3 py-2 rounded-lg bg-slate-900 border border-slate-800 text-white text-xs">
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        {{-- Secção 4: Metodologia Xamariz --}}
        <div class="space-y-6 pt-4 border-t border-slate-800">
            <div class="flex items-center justify-between border-b border-slate-800 pb-2">
                <h3 class="text-sm font-extrabold uppercase tracking-wider text-[#fe3d0a]">4. Metodologia Xamariz ("Como executamos com precisão")</h3>
                <button type="button" @click="methodology.push({step: '0' + (methodology.length + 1), title: '', desc: ''})" class="px-3 py-1.5 rounded-full bg-slate-800 hover:bg-slate-700 text-xs font-bold text-slate-200 transition-all">+ Adicionar Passo</button>
            </div>

            <div class="space-y-4">
                <template x-for="(item, index) in methodology" :key="index">
                    <div class="p-4 bg-slate-950 border border-slate-800/80 rounded-xl space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-bold text-[var(--color-brand-accent)]" x-text="'PASSO 0' + (index + 1)"></span>
                            <button type="button" @click="methodology.splice(index, 1)" class="text-xs text-rose-400 hover:text-rose-300">Remover</button>
                        </div>
                        <input type="hidden" :name="'methodology['+index+'][step]'" :value="'0' + (index + 1)">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <input type="text" :name="'methodology['+index+'][title]'" x-model="item.title" placeholder="Título do Passo" class="w-full px-3 py-2 rounded-lg bg-slate-900 border border-slate-800 text-white text-xs">
                            </div>
                            <div>
                                <input type="text" :name="'methodology['+index+'][desc]'" x-model="item.desc" placeholder="Descrição do processo..." class="w-full px-3 py-2 rounded-lg bg-slate-900 border border-slate-800 text-white text-xs">
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        {{-- Secção 5: Métricas de Impacto --}}
        <div class="space-y-6 pt-4 border-t border-slate-800">
            <div class="flex items-center justify-between border-b border-slate-800 pb-2">
                <h3 class="text-sm font-extrabold uppercase tracking-wider text-[#fe3d0a]">5. Métricas de Impacto</h3>
                <button type="button" @click="metrics.push({value: '', label: ''})" class="px-3 py-1.5 rounded-full bg-slate-800 hover:bg-slate-700 text-xs font-bold text-slate-200 transition-all">+ Adicionar Métrica</button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <template x-for="(item, index) in metrics" :key="index">
                    <div class="p-4 bg-slate-950 border border-slate-800/80 rounded-xl space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-400" x-text="'Métrica ' + (index + 1)"></span>
                            <button type="button" @click="metrics.splice(index, 1)" class="text-xs text-rose-400 hover:text-rose-300">Remover</button>
                        </div>
                        <input type="text" :name="'metrics['+index+'][value]'" x-model="item.value" placeholder="Valor (Ex: +350%)" class="w-full px-3 py-2 rounded-lg bg-slate-900 border border-slate-800 text-white text-xs font-bold">
                        <input type="text" :name="'metrics['+index+'][label]'" x-model="item.label" placeholder="Rótulo (Ex: Alcance Relevante)" class="w-full px-3 py-2 rounded-lg bg-slate-900 border border-slate-800 text-white text-xs">
                    </div>
                </template>
            </div>
        </div>

        <div class="pt-6 border-t border-slate-800 flex items-center justify-end gap-4">
            <a href="{{ route('admin.services.index') }}" class="px-5 py-3 rounded-full bg-slate-800 hover:bg-slate-700 text-xs font-bold text-slate-300 transition-all">Cancelar</a>
            <button type="submit" class="px-6 py-3 rounded-full bg-[#fe3d0a] hover:bg-[#d63205] text-white text-xs font-bold uppercase tracking-wider shadow-lg shadow-[#fe3d0a]/25 transition-all">Atualizar Serviço 360°</button>
        </div>
    </form>

</div>
@endsection
