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

        $services = [
            [
                'number_code' => '01',
                'title' => 'Estratégia & Comunicação',
                'slug' => 'estrategia-comunicacao',
                'subtext' => 'Definimos o que dizer, a quem e porquê.',
            ],
            [
                'number_code' => '02',
                'title' => 'Websites, Plataformas digitais & SEO',
                'slug' => 'websites-plataformas-digitais-seo',
                'subtext' => 'Construímos experiências digitais que são encontradas, compreendidas e escolhidas.',
            ],
            [
                'number_code' => '03',
                'title' => 'Conteúdo & Redes Sociais',
                'slug' => 'conteudo-redes-sociais',
                'subtext' => 'Criamos conteúdo que transforma atenção em relação.',
            ],
            [
                'number_code' => '04',
                'title' => 'Audiovisual',
                'slug' => 'audiovisual',
                'subtext' => 'Damos forma às histórias que merecem ser vistas.',
            ],
            [
                'number_code' => '05',
                'title' => 'Performance Digital',
                'slug' => 'performance-digital',
                'subtext' => 'Transformamos comunicação em resultados mensuráveis.',
            ],
        ];

        foreach ($services as $index => $service) {
            Service::create([
                'number_code' => $service['number_code'],
                'title' => $service['title'],
                'slug' => $service['slug'],
                'tagline' => $service['subtext'],
                'short_description' => $service['subtext'],
                'display_order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}
