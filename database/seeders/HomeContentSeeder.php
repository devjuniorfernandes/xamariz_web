<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

/**
 * Atualiza o conteúdo da página inicial gerido pela base de dados:
 *  - Secção de serviços (heading e subtítulo)
 *  - Secção "Clareza exige método" (3 passos)
 *  - Títulos e subtextos dos 5 serviços
 *
 * Não destrutivo: usa updateOrCreate por chave / slug, preservando
 * os restantes campos (deliverables, methodology, métricas, imagens, etc.).
 *
 * Executar em produção com:
 *   php artisan db:seed --class=HomeContentSeeder
 */
class HomeContentSeeder extends Seeder
{
    public function run(): void
    {
        // ── Secção de serviços (home) ───────────────────────────────
        SiteSetting::set('home_services_heading', 'Da estratégia à execução, tudo começa pela clareza.', 'page_content');
        SiteSetting::set('home_services_title', 'Como podemos ajudar', 'page_content');

        // ── Secção "Clareza exige método" (3 passos) ────────────────
        SiteSetting::set('home_method_kicker', 'Clareza exige método.', 'page_content');
        SiteSetting::set('home_method_title', 'É assim que transformamos clareza em impacto.', 'page_content');

        SiteSetting::set('home_method_step1_title', 'Compreender', 'page_content');
        SiteSetting::set('home_method_step1_desc', 'Analisamos o seu negócio, o mercado, o público e a concorrência para identificar oportunidades reais de diferenciação.', 'page_content');

        SiteSetting::set('home_method_step2_title', 'Clarificar', 'page_content');
        SiteSetting::set('home_method_step2_desc', 'Encontramos o posicionamento, a mensagem e a estratégia que tornam o valor da sua empresa mais claro e relevante para as pessoas certas.', 'page_content');

        SiteSetting::set('home_method_step3_title', 'Comunicar', 'page_content');
        SiteSetting::set('home_method_step3_desc', 'Criamos e executamos comunicação, conteúdos e experiências que chegam às pessoas certas e geram resultados para o seu negócio.', 'page_content');

        // ── Subtítulos das Heros (banner azul) de cada página ───────
        SiteSetting::set('services_banner_title', 'Serviços', 'page_content');
        SiteSetting::set('services_banner_subtitle', 'Da estratégia à execução.', 'page_content');

        SiteSetting::set('work_banner_title', 'Portfólio', 'page_content');
        SiteSetting::set('work_banner_subtitle', 'Trabalho que transforma estratégia em impacto.', 'page_content');

        SiteSetting::set('about_hero_title', 'Quem Somos', 'page_content');
        SiteSetting::set('about_hero_subtitle', 'Ajudamos empresas a serem compreendidas.', 'page_content');

        SiteSetting::set('insights_hero_title', 'Artigos', 'page_content');
        SiteSetting::set('insights_hero_subtitle', 'Pensar melhor. Comunicar melhor.', 'page_content');

        SiteSetting::set('contact_hero_title', 'Contactos', 'page_content');
        SiteSetting::set('contact_hero_subtitle', '', 'page_content');

        // ── Serviços (título + subtexto), preservando restantes campos ──
        $services = [
            [
                'slug' => 'estrategia-comunicacao',
                'title' => 'Estratégia & Comunicação',
                'subtext' => 'Definimos o que dizer, a quem e porquê.',
            ],
            [
                'slug' => 'websites-plataformas-digitais-seo',
                'title' => 'Web & SEO',
                'subtext' => 'Criamos experiências digitais que tornam a sua empresa mais fácil de encontrar, compreender e escolher.',
            ],
            [
                'slug' => 'conteudo-redes-sociais',
                'title' => 'Conteúdo & Comunicação Digital',
                'subtext' => 'Criamos conteúdos que tornam a sua mensagem clara, relevante e consistente.',
            ],
            [
                'slug' => 'audiovisual',
                'title' => 'Audiovisual',
                'subtext' => 'Damos forma às histórias que merecem ser vistas.',
            ],
            [
                'slug' => 'performance-digital',
                'title' => 'Campanhas & Performance',
                'subtext' => 'Levamos a mensagem certa às pessoas certas e medimos o que realmente importa.',
            ],
        ];

        foreach ($services as $service) {
            Service::where('slug', $service['slug'])->update([
                'title' => $service['title'],
                'tagline' => $service['subtext'],
                'short_description' => $service['subtext'],
            ]);
        }
    }
}
