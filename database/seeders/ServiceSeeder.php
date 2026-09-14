<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Substitui os serviços existentes pelos 5 serviços atuais da Xamariz.
     * Cada serviço tem um título e um subtexto (short_description / tagline).
     */
    public function run(): void
    {
        // Apagar serviços existentes e recriar
        Service::query()->delete();

        // Blocos partilhados pelos 5 serviços (alinhados com a Knowledge Base 2026).
        // A KB confirma que as páginas individuais partilham os mesmos entregáveis,
        // metodologia e indicadores — variam apenas o título e a proposta curta.
        $deliverables = [
            ['title' => 'Consultoria Estratégica 360°', 'desc' => 'Diagnóstico de posicionamento, concorrência e oportunidades de diferenciação.'],
            ['title' => 'Planos de Comunicação Integrada', 'desc' => 'Roteiros estratégicos com cronogramas, matriz de canais e definição de KPIs comerciais.'],
            ['title' => 'Pesquisa & Inteligência de Mercado', 'desc' => 'Estudo comportamental de consumidores e partes interessadas para apoiar decisões.'],
            ['title' => 'Gestão de Reputação Corporativa', 'desc' => 'Estratégias de proteção e gestão da imagem perante parceiros, investidores e órgãos reguladores.'],
            ['title' => 'Mensagem de Marca & Storytelling', 'desc' => 'Desenvolvimento de narrativas destinadas a gerar ligação emocional e autoridade.'],
            ['title' => 'Otimização de ROI & Performance', 'desc' => 'Acompanhamento de dados estratégicos e relatórios periódicos de crescimento comercial.'],
        ];

        $methodology = [
            ['step' => '01', 'title' => 'Diagnóstico & Imersão', 'desc' => 'Estudo do negócio, concorrentes e público-alvo para mapear oportunidades.'],
            ['step' => '02', 'title' => 'Estratégia & Conceito', 'desc' => 'Plano de ação com metas claras, mensagens de impacto e cronograma.'],
            ['step' => '03', 'title' => 'Produção & Implementação', 'desc' => 'Criação e lançamento de peças publicitárias, plataformas web, vídeos ou campanhas.'],
            ['step' => '04', 'title' => 'Análise de ROI & Otimização', 'desc' => 'Monitorização do desempenho e ajustes para maximizar a conversão.'],
        ];

        $metrics = [
            ['value' => '+350%', 'label' => 'Aumento de Alcance Relevante'],
            ['value' => '98%', 'label' => 'Taxa de Retenção de Clientes'],
            ['value' => '100%', 'label' => 'Alinhamento com Objetivos de ROI'],
        ];

        $services = [
            [
                'number_code' => '01',
                'title' => 'Estratégia & Comunicação',
                'slug' => 'estrategia-comunicacao',
                'subtext' => 'Definimos o que dizer, a quem e porquê.',
            ],
            [
                'number_code' => '02',
                'title' => 'Web & SEO',
                'slug' => 'websites-plataformas-digitais-seo',
                'subtext' => 'Criamos experiências digitais que tornam a sua empresa mais fácil de encontrar, compreender e escolher.',
            ],
            [
                'number_code' => '03',
                'title' => 'Conteúdo & Comunicação Digital',
                'slug' => 'conteudo-redes-sociais',
                'subtext' => 'Criamos conteúdos que tornam a sua mensagem clara, relevante e consistente.',
            ],
            [
                'number_code' => '04',
                'title' => 'Audiovisual',
                'slug' => 'audiovisual',
                'subtext' => 'Damos forma às histórias que merecem ser vistas.',
            ],
            [
                'number_code' => '05',
                'title' => 'Campanhas & Performance',
                'slug' => 'performance-digital',
                'subtext' => 'Levamos a mensagem certa às pessoas certas e medimos o que realmente importa.',
            ],
        ];

        foreach ($services as $index => $service) {
            Service::create([
                'number_code' => $service['number_code'],
                'title' => $service['title'],
                'slug' => $service['slug'],
                'tagline' => $service['subtext'],
                'short_description' => $service['subtext'],
                'deliverables' => $deliverables,
                'methodology' => $methodology,
                'metrics' => $metrics,
                'display_order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}
