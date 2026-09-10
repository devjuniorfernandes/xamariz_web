<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\WorkCategory;
use App\Models\Work;
use App\Models\TeamMember;
use App\Models\Service;
use App\Models\Post;
use App\Models\HeroSlide;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@xamariz.ao'],
            [
                'name' => 'Administrador Xamariz',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        // 2. Work Categories (Filters)
        $categoriesData = [
            ['name' => 'Marketing 360°', 'slug' => 'marketing-360', 'filter_key' => 'marketing', 'display_order' => 1],
            ['name' => 'Branding & Design', 'slug' => 'branding-design', 'filter_key' => 'branding', 'display_order' => 2],
            ['name' => 'Web & SEO', 'slug' => 'web-seo', 'filter_key' => 'web', 'display_order' => 3],
            ['name' => 'Audiovisual', 'slug' => 'audiovisual', 'filter_key' => 'audiovisual', 'display_order' => 4],
        ];

        $categories = [];
        foreach ($categoriesData as $cat) {
            $categories[$cat['filter_key']] = WorkCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
        }

        // 3. Clients
        $clientsData = [
            [
                'name' => 'ExxonMobil',
                'slug' => 'exxonmobil',
                'logo_path' => 'images/logos/exxon.svg',
                'sector' => 'Energia & Petróleo',
                'headline' => 'Parceria Estratégica de Comunicação & Atração de Talentos',
                'description' => 'Desenvolvemos formatos de conteúdos audiovisuais e campanhas de reciclagem avançada para a ExxonMobil, humanizando conceitos técnicos complexos para o público global e stakeholders.',
                'services_provided' => 'Estratégia, Audiovisual & Comunicação Interna',
                'testimonial_text' => 'A Xamariz transformou a nossa comunicação técnica numa narrativa humanizada de enorme alcance.',
                'testimonial_author' => 'Direção de Comunicação Corporativa',
                'testimonial_role' => 'ExxonMobil Angola',
                'show_in_marquee' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'Tullow Oil',
                'slug' => 'tullow-oil',
                'logo_path' => 'images/logos/shell.svg',
                'sector' => 'Recursos Naturais & Gás',
                'headline' => 'Comunicação Comunitária e Envolvimento Local',
                'description' => 'Criámos publicações ilustradas e materiais estratégicos que aproximam as comunidades locais da cadeia de valor energética da Tullow Oil.',
                'services_provided' => 'Publicações, Ilustração & Envolvimento Comunitário',
                'show_in_marquee' => true,
                'display_order' => 2,
            ],
            [
                'name' => 'Perenco',
                'slug' => 'perenco',
                'logo_path' => 'images/logos/bp.svg',
                'sector' => 'Sustentabilidade & Energia',
                'headline' => 'Campanhas anuais de Sustentabilidade & Transição Energética',
                'description' => 'Produção de campanhas de elevado impacto visual documentando iniciativas de descarbonização e captura de carbono.',
                'services_provided' => 'Branding, Campanhas & Produção Audiovisual',
                'show_in_marquee' => true,
                'display_order' => 3,
            ],
            [
                'name' => 'Western LNG',
                'slug' => 'western-lng',
                'logo_path' => 'images/logos/total.svg',
                'sector' => 'Gás Natural & Infraestruturas',
                'headline' => 'Visualização 3D e Animações de Projetos de Grande Escala',
                'description' => 'Animação 3D hiper-realista que posiciona projetos de infraestrutura de gás natural no seu ambiente natural.',
                'services_provided' => 'Animação 3D CGI & Modelagem de Infraestruturas',
                'show_in_marquee' => true,
                'display_order' => 4,
            ],
            [
                'name' => 'Huawei',
                'slug' => 'huawei',
                'logo_path' => 'images/logos/huawei.svg',
                'sector' => 'Tecnologia & Telecomunicações',
                'headline' => 'Posicionamento de Marca & Ativação Tecnológica 5G',
                'description' => 'Estratégia de comunicação institucional e campanhas de lançamento para soluções de infraestrutura tecnológica.',
                'services_provided' => 'Estratégia 360°, Ativação & Comunicação Digital',
                'show_in_marquee' => true,
                'display_order' => 5,
            ],
            [
                'name' => 'Emirates',
                'slug' => 'emirates',
                'logo_path' => 'images/logos/emirates.svg',
                'sector' => 'Aviação & Turismo',
                'headline' => 'Ativações de Marca & Promoções Globais',
                'description' => 'Campanhas publicitárias para a rota internacional Luanda-Dubai e posicionamento de serviço de primeira classe.',
                'services_provided' => 'Publicidade, Outdoor & Marketing Digital',
                'show_in_marquee' => true,
                'display_order' => 6,
            ],
            [
                'name' => 'Sonangol',
                'slug' => 'sonangol',
                'logo_path' => 'images/logos/total.svg',
                'sector' => 'Energia & Recursos Naturais',
                'headline' => 'Comunicação Institucional da Marca Líder de Angola',
                'description' => 'Planeamento estratégico de comunicação e produção de conteúdos para a celebração de marcos históricos corporativos.',
                'services_provided' => 'Estratégia, Branding, Audiovisual & Marketing 360°',
                'show_in_marquee' => true,
                'display_order' => 7,
            ],
            [
                'name' => 'Xamariz Tech',
                'slug' => 'xamariz-tech',
                'logo_path' => 'logo_xamariz.svg',
                'sector' => 'Tecnologia & Inovação',
                'headline' => 'Soluções Digitais & Transformação Tecnológica',
                'description' => 'Desenvolvimento de ecossistemas web e software corporativo de elevado impacto para empresas inovadoras.',
                'services_provided' => 'Desenvolvimento Web, UX/UI & SEO',
                'show_in_marquee' => false,
                'display_order' => 8,
            ],
        ];

        // Os clientes deste seeder são dados de demonstração: substituir sempre
        // o conjunto existente para evitar registos antigos ou duplicados.
        Client::query()->delete();

        $clients = [];
        foreach ($clientsData as $c) {
            $clients[$c['slug']] = Client::create($c);
        }

        // 4. Works (Linked to Client and WorkCategory)
        $worksData = [
            [
                'title' => 'Meet the Exxperts',
                'slug' => 'exxperts',
                'client_id' => $clients['exxonmobil']->id,
                'work_category_id' => $categories['marketing']->id,
                'summary' => 'Formato de conteúdos que transformou conhecimento técnico em comunicação humanizada.',
                'description' => 'A campanha Meet the Exxperts foi concebida para aproximar a liderança técnica da ExxonMobil das comunidades locais e dos parceiros institucionais em Angola. Através de vídeos em formato de entrevista editorial, artigos ilustrados e campanhas em redes sociais, convertemos dados complexos de engenharia em narrativas inspiradoras e acessíveis.',
                'cover_image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=900&auto=format&fit=crop&q=80',
                'results_metrics' => [
                    'Alcance de +500.000 pessoas no LinkedIn & plataformas digitais.',
                    'Aumento de 40% na perceção positiva da marca empregadora.',
                    'Produção integral de 12 episódios audiovisuais HD.'
                ],
                'is_featured_home' => true,
                'display_order' => 1,
            ],
            [
                'title' => 'Building Futures',
                'slug' => 'building-futures',
                'client_id' => $clients['tullow-oil']->id,
                'work_category_id' => $categories['branding']->id,
                'summary' => 'Publicação ilustrada que aproxima comunidades locais da cadeia de valor do setor energético.',
                'description' => 'Uma estratégia de branding e comunicação comunitária desenvolvida para a Tullow Oil. O projeto uniu ilustração de alta qualidade, relatórios institucionais e ativação no terreno para demonstrar o investimento sustentável em educação e saúde.',
                'cover_image' => 'https://images.unsplash.com/photo-1590859808308-3d2d9c515b1a?w=700&auto=format&fit=crop&q=80',
                'results_metrics' => [
                    'Distribuição de 15.000 edições impressas nas comunidades.',
                    'Reconhecimento em fóruns internacionais de responsabilidade social.'
                ],
                'is_featured_home' => true,
                'display_order' => 2,
            ],
            [
                'title' => 'Carbon Capture and Storage',
                'slug' => 'perenco-ccs',
                'client_id' => $clients['perenco']->id,
                'work_category_id' => $categories['marketing']->id,
                'summary' => 'Campanha anual sobre projetos de sustentabilidade e captura de carbono.',
                'description' => 'Desenvolvimento de uma estratégia de posicionamento 360° focada nos avanços da Perenco em tecnologias de descarbonização e responsabilidade ambiental.',
                'cover_image' => 'https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?w=700&auto=format&fit=crop&q=80',
                'results_metrics' => [
                    'Apresentado na conferência anual de energia de Luanda.'
                ],
                'is_featured_home' => true,
                'display_order' => 3,
            ],
            [
                'title' => 'Exxtend Advanced Recycling',
                'slug' => 'exxtend',
                'client_id' => $clients['exxonmobil']->id,
                'work_category_id' => $categories['branding']->id,
                'summary' => 'Reciclagem avançada transformada numa narrativa de economia circular.',
                'description' => 'Conceção da identidade visual e narrativa de comunicação para a iniciativa de reciclagem de polímeros avançados da ExxonMobil.',
                'cover_image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?w=700&auto=format&fit=crop&q=80',
                'results_metrics' => [
                    'Criação de ecossistema digital de comunicação sustentável.'
                ],
                'is_featured_home' => true,
                'display_order' => 4,
            ],
            [
                'title' => 'Ksi Lisims LNG',
                'slug' => 'ksi-lisims-lng',
                'client_id' => $clients['western-lng']->id,
                'work_category_id' => $categories['audiovisual']->id,
                'summary' => 'Animação 3D de alta fidelidade para projeto de gás natural flutuante.',
                'description' => 'Produção de vídeo CGI 3D e animações hiper-realistas para demonstrar o funcionamento e os rigorosos padrões ambientais do projeto Ksi Lisims LNG.',
                'cover_image' => 'https://images.unsplash.com/photo-1504593811423-6dd665756598?w=700&auto=format&fit=crop&q=80',
                'results_metrics' => [
                    'Animação 3D exibida para investidores e reguladores globais.'
                ],
                'is_featured_home' => true,
                'display_order' => 5,
            ],
            [
                'title' => 'Plataforma Web & SEO 360°',
                'slug' => 'xamariz-web-portal',
                'client_id' => $clients['xamariz-tech']->id,
                'work_category_id' => $categories['web']->id,
                'summary' => 'Desenvolvimento de portal institucional ultra-rápido otimizado para motores de busca.',
                'description' => 'Plataforma web de última geração focada em alta performance, animações fluidas e posicionamento de topo nos motores de busca.',
                'cover_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=700&auto=format&fit=crop&q=80',
                'results_metrics' => [
                    'Pontuação 100/100 no Google PageSpeed.',
                    'Taxa de conversão de leads aumentada em 3x.'
                ],
                'is_featured_home' => false,
                'display_order' => 6,
            ],
        ];

        foreach ($worksData as $w) {
            Work::updateOrCreate(['slug' => $w['slug']], $w);
        }

        // 5. Team Members — geridos pelo TeamMemberSeeder (fotos em public/equipa)
        $this->call(TeamMemberSeeder::class);

        // 5b. Clientes — geridos pelo ClientSeeder (logótipos em public/clientes)
        $this->call(ClientSeeder::class);

        // 6. Services — geridos pelo ServiceSeeder
        $this->call(ServiceSeeder::class);

        // 7. Posts / Insights
        $postsData = [
            [
                'title' => 'Como a comunicação transparente é a chave para a diferenciação no mercado angolano',
                'slug' => 'stakeholder-communication-2026',
                'category' => 'Estratégia 360°',
                'summary' => 'Num ambiente competitivo, a clareza e a estratégia de marca são os fatores decisivos para atrair e reter clientes.',
                'content' => 'Num mercado em rápida aceleração como o angolano, as marcas que se destacam não são apenas as que investem mais em publicidade, mas sim as que comunicam com maior clareza e transparência. Neste artigo, exploramos as 5 pilares do marketing de diferenciação.',
                'cover_image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1200&auto=format&fit=crop&q=80',
                'published_at' => '2026-08-01 10:00:00',
                'status' => 'published',
            ],
            [
                'title' => 'Construir marcas fortes que resistem às mudanças de mercado e geram valor',
                'slug' => 'greenwashing-how-to-avoid',
                'category' => 'Branding & Reputação',
                'summary' => 'Como estabelecer uma reputação sólida e inesquecível junto de clientes e parceiros estratégicos.',
                'content' => 'A reputação corporativa constrói-se com coerência visual, mensagem estratégica alinhada e compromisso real de valor para a sociedade.',
                'cover_image' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1200&auto=format&fit=crop&q=80',
                'published_at' => '2026-07-15 14:30:00',
                'status' => 'published',
            ],
            [
                'title' => 'Desmistificar o tráfego pago e o SEO para gerar leads qualificadas',
                'slug' => 'deep-tech-communication',
                'category' => 'Marketing Digital',
                'summary' => 'Estratégias digitais orientadas a resultados que colocam a sua empresa no topo das pesquisas do Google.',
                'content' => 'Gerar tráfego é apenas o primeiro passo. O grande trunfo de um sistema de vendas online é converter visitantes casuais em clientes fieis.',
                'cover_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&auto=format&fit=crop&q=80',
                'published_at' => '2026-06-20 09:00:00',
                'status' => 'published',
            ],
        ];

        foreach ($postsData as $p) {
            Post::updateOrCreate(['slug' => $p['slug']], $p);
        }

        // 8. Hero Slides
        HeroSlide::updateOrCreate(
            ['video_path' => 'video_base.mp4'],
            ['title' => 'Vídeo Principal Hero 1', 'display_order' => 1, 'is_active' => true]
        );
        HeroSlide::updateOrCreate(
            ['video_path' => 'video_base_2.mp4'],
            ['title' => 'Vídeo Principal Hero 2', 'display_order' => 2, 'is_active' => true]
        );

        // 9. Site Settings
        SiteSetting::set('site_name', 'Xamariz | Agência de Publicidade Angola & Marketing 360°');
        SiteSetting::set('address', 'Rua Francisco Sotto Mayor 18, Bairro Azul, Luanda, Angola');
        SiteSetting::set('phone', '+244 941 561 422');
        SiteSetting::set('email', 'geral@xamariz.ao');
        SiteSetting::set('linkedin', 'https://linkedin.com/company/xamariz');
        SiteSetting::set('instagram', 'https://instagram.com/xamariz.ao');
    }
}
