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

        $clients = [];
        foreach ($clientsData as $c) {
            $clients[$c['slug']] = Client::updateOrCreate(['slug' => $c['slug']], $c);
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

        // 5. Team Members
        $teamData = [
            [
                'name' => 'Mateus Manuel',
                'slug' => 'mateus-manuel',
                'role' => 'CEO & Fundador da Xamariz',
                'department' => 'ceo',
                'bio' => 'Com mais de 15 anos de liderança em publicidade, branding e comunicação de grande escala em Angola e na Europa, Mateus Manuel é o arquiteto por trás da filosofia de Marketing 360° da Xamariz.',
                'quote' => 'Numa era de constante excesso de ruído, atrair clientes exige comunicar com clareza absoluta, inteligência estratégica e uma coragem criativa que domine o mercado.',
                'photo_path' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80',
                'social_linkedin' => 'https://linkedin.com',
                'social_twitter' => 'https://x.com',
                'social_instagram' => 'https://instagram.com',
                'email' => 'mateus@xamariz.ao',
                'display_order' => 1,
            ],
            [
                'name' => 'Nzola Fernandes',
                'slug' => 'nzola-fernandes',
                'role' => 'Co-Fundador & Managing Partner',
                'department' => 'direction',
                'bio' => 'Especialista em planos de expansão internacional, consultoria e alianças estratégicas.',
                'photo_path' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=800&auto=format&fit=crop&q=80',
                'display_order' => 2,
            ],
            [
                'name' => 'Yola Neto',
                'slug' => 'yola-neto',
                'role' => 'Diretora de Estratégia 360°',
                'department' => 'direction',
                'bio' => 'Mestre em Marketing de Performance e planeamento de comunicação integrada.',
                'photo_path' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=800&auto=format&fit=crop&q=80',
                'display_order' => 3,
            ],
            [
                'name' => 'Marcus Okafor',
                'slug' => 'marcus-okafor',
                'role' => 'Diretor de Operações (COO)',
                'department' => 'direction',
                'bio' => 'Garante a execução impecável de grandes campanhas e gestão de equipas multidisciplinares.',
                'photo_path' => 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?w=800&auto=format&fit=crop&q=80',
                'display_order' => 4,
            ],
            [
                'name' => 'Kambanja Santos',
                'slug' => 'kambanja-santos',
                'role' => 'Diretor Criativo Executivo',
                'department' => 'direction',
                'bio' => 'Diretor de arte responsável pela identidade visual e conceito de campanhas de alto impacto.',
                'photo_path' => 'https://images.unsplash.com/photo-1522529599102-193c0d76b5b6?w=800&auto=format&fit=crop&q=80',
                'display_order' => 5,
            ],
            [
                'name' => 'Eunice Domingos',
                'slug' => 'eunice-domingos',
                'role' => 'Lead de Tráfego Pago & Ads',
                'department' => 'specialist',
                'bio' => 'Especialista em otimização de conversão e campanhas de anúncios Meta & Google.',
                'photo_path' => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=800&auto=format&fit=crop&q=80',
                'display_order' => 6,
            ],
            [
                'name' => 'Tchissola Costa',
                'slug' => 'tchissola-costa',
                'role' => 'Diretora de Produção Audiovisual',
                'department' => 'specialist',
                'bio' => 'Cineasta encarregue de spots publicitários, vídeos institucionais HD e animações 3D.',
                'photo_path' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=800&auto=format&fit=crop&q=80',
                'display_order' => 7,
            ],
            [
                'name' => 'Edvaldo Barros',
                'slug' => 'edvaldo-barros',
                'role' => 'Head of Web Dev & SEO',
                'department' => 'specialist',
                'bio' => 'Arquiteto de sistemas web e especialista em posicionamento no topo dos motores de busca.',
                'photo_path' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=800&auto=format&fit=crop&q=80',
                'display_order' => 8,
            ],
        ];

        foreach ($teamData as $t) {
            TeamMember::updateOrCreate(['slug' => $t['slug']], $t);
        }

        // 6. Services
        $servicesData = [
            [
                'number_code' => '01',
                'title' => 'Estratégia & Marketing 360°',
                'slug' => 'marketing-360-estrategia',
                'tagline' => 'Transformamos mensagens corporativas complexas em posicionamentos claros e líderes no mercado.',
                'short_description' => 'Planeamento de comunicação integrada, posicionamento de marca e estratégias de diferenciação para dominar o mercado.',
                'full_description' => 'O Marketing 360° da Xamariz conecta todos os pontos de contacto da sua empresa ao seu público-alvo em Angola e no mercado internacional. Desenhamos estratégias integradas que alinham comunicação digital, branding, media e vendas para impulsionar resultados mensuráveis.',
                'strategic_value_para1' => 'No mercado angolano e internacional, o verdadeiro sucesso comercial não resulta de ações isoladas, mas sim da construção de um ecossistema de comunicação forte, integrado e coerente. A nossa abordagem de Marketing 360° alinha todos os pontos de contacto da sua marca — desde a consultoria inicial e pesquisa de mercado até à execução nos meios digitais e tradicionais.',
                'strategic_value_para2' => 'Ao eliminar a fragmentação na mensagem corporativa, garantimos que a sua empresa transmita autoridade, confiança e diferenciação perante clientes, parceiros e investidores. Desenvolvemos estratégias sob medida que ligam o posicionamento de marca a metas diretas de vendas e retenção.',
                'quote' => 'Num mercado dinâmico e ruidoso, atrair clientes exige clareza absoluta, relevância estratégica e consistência em todos os canais.',
                'image_path' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1800&auto=format&fit=crop&q=80',
                'deliverables' => [
                    ['title' => 'Consultoria Estratégica 360°', 'desc' => 'Diagnóstico profundo de posicionamento, concorrência e identificação de oportunidades de diferenciação.'],
                    ['title' => 'Planos de Comunicação Integrada', 'desc' => 'Roteiros estratégicos detalhados com cronogramas, matriz de canais e definição de KPIs comerciais.'],
                    ['title' => 'Pesquisa & Inteligência de Mercado', 'desc' => 'Estudo comportamental de consumidores e partes interessadas para orientar tomadas de decisão.'],
                    ['title' => 'Gestão de Reputação Corporativa', 'desc' => 'Estratégias de blindagem da imagem da empresa perante parceiros, investidores e órgãos reguladores.'],
                    ['title' => 'Mensagem de Marca & Storytelling', 'desc' => 'Desenvolvimento de narrativas convincentes que geram ligação emocional e autoridade imediata.'],
                    ['title' => 'Otimização de ROI & Performance', 'desc' => 'Acompanhamento rigoroso de dados estratégicos e relatórios periódicos de crescimento comercial.']
                ],
                'methodology' => [
                    ['step' => '01', 'title' => 'Diagnóstico & Imersão', 'desc' => 'Estudamos profundamente o seu negócio, concorrentes e público-alvo para mapear oportunidades reais.'],
                    ['step' => '02', 'title' => 'Estratégia & Conceito', 'desc' => 'Desenvolvemos o plano de ação com metas claras, mensagens de impacto e cronograma de execução.'],
                    ['step' => '03', 'title' => 'Produção & Implementação', 'desc' => 'Criamos e lançamos as peças publicitárias, plataformas web, vídeos ou campanhas com excelência.'],
                    ['step' => '04', 'title' => 'Análise de ROI & Otimização', 'desc' => 'Monitorizamos o desempenho em tempo real, ajustando métricas para maximizar a conversão.']
                ],
                'metrics' => [
                    ['value' => '+350%', 'label' => 'Aumento de Alcance Relevante'],
                    ['value' => '98%', 'label' => 'Taxa de Retenção de Clientes'],
                    ['value' => '100%', 'label' => 'Alinhamento com Objetivos de ROI']
                ],
                'display_order' => 1,
            ],
            [
                'number_code' => '02',
                'title' => 'Publicidade & Branding',
                'slug' => 'publicidade-branding',
                'tagline' => 'Criamos marcas fortes e campanhas memoráveis que despertam desejo e atração comercial.',
                'short_description' => 'Identidades visuais inesquecíveis, campanhas publicitárias de alto impacto, copywriting persuasivo e ativação de marca.',
                'full_description' => 'Concebemos identidades visuais marcantes e campanhas publicitárias multimeios que destacam a sua empresa da concorrência. Combinamos direção de arte de ponta, redação publicitária persuasiva e conceitos criativos focados na atração de clientes.',
                'strategic_value_para1' => 'Uma marca forte é o ativo mais valioso de uma empresa num mercado altamente competitivo. O nosso serviço de Publicidade & Branding foca-se na criação de identidades visuais de prestígio e narrativas publicitárias convincentes que captam imediatamente a atenção do seu público-alvo.',
                'strategic_value_para2' => 'Desde o design de identidade corporativa e manuais de normas gráficas até à concepção de campanhas multimeios de grande escala, esmeramo-nos em transformar a essência do seu negócio num íman de atração de clientes e de valorização no mercado.',
                'quote' => 'Uma marca não é apenas um logotipo. É a promessa de valor e o conjunto de emoções que o seu cliente experiencia.',
                'image_path' => 'https://images.unsplash.com/photo-1542744807-2856f69756fb?w=1800&auto=format&fit=crop&q=80',
                'deliverables' => [
                    ['title' => 'Design de Identidade Visual', 'desc' => 'Logotipos, manuais de normas gráficas, paletas cromáticas e tipografia corporativa de prestígio.'],
                    ['title' => 'Campanhas Publicitárias 360°', 'desc' => 'Criação e produção de campanhas para imprensa, imprensa digital, outdoors, TV e plataformas digitais.'],
                    ['title' => 'Copywriting & Redação Criativa', 'desc' => 'Textos persuasivos que captam a atenção imediata e convertem leitores em clientes apaixonados.'],
                    ['title' => 'Ativação & Experiência de Marca', 'desc' => 'Eventos corporativos, suportes promocionais e conceitos interativos de proximidade com o público.'],
                    ['title' => 'Rebranding & Modernização', 'desc' => 'Revitalização estratégica de marcas consolidadas que pretendem liderar a nova era digital.'],
                    ['title' => 'Packaging & Materiais Editoriais', 'desc' => 'Design de embalagens, brochuras executivas, relatórios anuais e materiais corporativos premium.']
                ],
                'methodology' => [
                    ['step' => '01', 'title' => 'Diagnóstico & Imersão', 'desc' => 'Estudamos profundamente o seu negócio, concorrentes e público-alvo para mapear oportunidades reais.'],
                    ['step' => '02', 'title' => 'Estratégia & Conceito', 'desc' => 'Desenvolvemos o plano de ação com metas claras, mensagens de impacto e cronograma de execução.'],
                    ['step' => '03', 'title' => 'Produção & Implementação', 'desc' => 'Criamos e lançamos as peças publicitárias, plataformas web, vídeos ou campanhas com excelência.'],
                    ['step' => '04', 'title' => 'Análise de ROI & Otimização', 'desc' => 'Monitorizamos o desempenho em tempo real, ajustando métricas para maximizar a conversão.']
                ],
                'metrics' => [
                    ['value' => '5x', 'label' => 'Maior Memorização da Marca'],
                    ['value' => '+220%', 'label' => 'Engajamento com Campanhas'],
                    ['value' => '100%', 'label' => 'Design Único & Original']
                ],
                'display_order' => 2,
            ],
            [
                'number_code' => '03',
                'title' => 'Desenvolvimento Web & SEO',
                'slug' => 'desenvolvimento-web-seo',
                'tagline' => 'Websites institucionais de alto desempenho que posicionam a sua empresa no topo do Google.',
                'short_description' => 'Websites institucionais de alto nível, plataformas digitais e otimização SEO para atrair potenciais clientes no topo do Google.',
                'full_description' => 'Construímos soluções web modernas, ultra-rápidas e otimizadas para motores de busca (SEO). O seu website torna-se uma plataforma executiva de vendas 24/7, perfeitamente adaptada a dispositivos móveis e desktops.',
                'strategic_value_para1' => 'O seu website institucional é a sede digital e o cartão de visita mais importante da sua empresa no mundo moderno. Projetamos e desenvolvemos plataformas web ultra-rápidas, elegantes e 100% responsivas, construídas rigorosamente de acordo com os mais elevados padrões de UI/UX e segurança.',
                'strategic_value_para2' => 'Adicionalmente, implementamos estratégias de SEO (Otimização para Motores de Busca) técnico e de conteúdo para assegurar que a sua empresa conquiste as primeiras posições no Google para as pesquisas mais relevantes do seu setor, gerando tráfego qualificado diariamente.',
                'quote' => 'Um website moderno é a sede digital do seu negócio. Deve transmitir confiança imediata e converter visitantes em clientes.',
                'image_path' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1800&auto=format&fit=crop&q=80',
                'deliverables' => [
                    ['title' => 'Websites Institucionais Premium', 'desc' => 'Design exclusivo alinhado ao Design System da marca, leve, elegante e de carregamento instantâneo.'],
                    ['title' => 'Plataformas E-Commerce & Vendas', 'desc' => 'Lojas online seguras com integração de pagamentos locais e internacionais.'],
                    ['title' => 'Otimização SEO Técnico & Local', 'desc' => 'Posicionamento nas primeiras páginas do Google para pesquisas estratégicas do seu setor.'],
                    ['title' => 'Landing Pages de Alta Conversão', 'desc' => 'Páginas focadas na captura de contactos para lançamentos de produtos e serviços.'],
                    ['title' => 'Painéis de Gestão & CMS', 'desc' => 'Sistemas intuitivos que permitem à sua equipa atualizar conteúdos de forma autónoma e segura.'],
                    ['title' => 'Manutenção, Segurança & Hosting', 'desc' => 'Acompanhamento técnico contínuo, cópias de segurança e proteção contra vulnerabilidades.']
                ],
                'methodology' => [
                    ['step' => '01', 'title' => 'Diagnóstico & Imersão', 'desc' => 'Estudamos profundamente o seu negócio, concorrentes e público-alvo para mapear oportunidades reais.'],
                    ['step' => '02', 'title' => 'Estratégia & Conceito', 'desc' => 'Desenvolvemos o plano de ação com metas claras, mensagens de impacto e cronograma de execução.'],
                    ['step' => '03', 'title' => 'Produção & Implementação', 'desc' => 'Criamos e lançamos as peças publicitárias, plataformas web, vídeos ou campanhas com excelência.'],
                    ['step' => '04', 'title' => 'Análise de ROI & Otimização', 'desc' => 'Monitorizamos o desempenho em tempo real, ajustando métricas para maximizar a conversão.']
                ],
                'metrics' => [
                    ['value' => '< 1s', 'label' => 'Tempo de Carregamento Web'],
                    ['value' => '#1', 'label' => 'Posição no Google para Termos-Chave'],
                    ['value' => '100%', 'label' => 'Mobile Responsive & Seguro']
                ],
                'display_order' => 3,
            ],
            [
                'number_code' => '04',
                'title' => 'Fotografia, Vídeo & Audiovisual',
                'slug' => 'fotografia-video-audiovisual',
                'tagline' => 'Produção cinematográfica e fotografia corporativa para dar vida à essência da sua marca.',
                'short_description' => 'Vídeo institucional HD, spots publicitários, fotografia corporativa e animação 3D CGI para transmitir a sua mensagem com clareza.',
                'full_description' => 'A nossa equipa de produção audiovisual captura a força, rigor e paixão da sua empresa através de filmes corporativos, spots publicitários, fotografia executiva e animações 3D CGI com padrão cinematográfico internacional.',
                'strategic_value_para1' => 'O conteúdo em vídeo e a fotografia de alta qualidade são os formatos mais eficazes para transmitir confiança, rigor e liderança em segundos. A nossa equipa de produção audiovisual concebe filmes corporativos, spots publicitários e cobertura fotográfica com padrão cinematográfico internacional.',
                'strategic_value_para2' => 'Utilizamos equipamentos de última geração, estúdios profissionais, animações 3D CGI e técnicas avançadas de pós-produção para contar a história da sua marca de forma emocionante, impactante e inesquecível para o seu público.',
                'quote' => 'O vídeo é a ferramenta mais poderosa para transmitir emoção, autenticidade e liderança em poucos segundos.',
                'image_path' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=1800&auto=format&fit=crop&q=80',
                'deliverables' => [
                    ['title' => 'Vídeo Institucional Corporativo', 'desc' => 'Documentários de apresentação da empresa para investidores, parceiros e grandes clientes.'],
                    ['title' => 'Spots Publicitários TV & Digital', 'desc' => 'Vídeos curtos de impacto comercial para campanhas na televisão e plataformas digitais.'],
                    ['title' => 'Fotografia Corporativa & Retratos', 'desc' => 'Sessões fotográficas da direção, instalações, equipamentos e ambiente de trabalho.'],
                    ['title' => 'Animação 3D CGI & Motion Design', 'desc' => 'Gráficos animados e simulações 3D para explicação de processos industriais ou produtos.'],
                    ['title' => 'Cobertura Audiovisual de Eventos', 'desc' => 'Captação fotográfica e de vídeo em congressos, conferências e lançamentos de marcas.'],
                    ['title' => 'Pós-Produção & Coloração Profissional', 'desc' => 'Edição rítmica, sonoplastia, locução profissional e correção cromática avançada.']
                ],
                'methodology' => [
                    ['step' => '01', 'title' => 'Diagnóstico & Imersão', 'desc' => 'Estudamos profundamente o seu negócio, concorrentes e público-alvo para mapear oportunidades reais.'],
                    ['step' => '02', 'title' => 'Estratégia & Conceito', 'desc' => 'Desenvolvemos o plano de ação com metas claras, mensagens de impacto e cronograma de execução.'],
                    ['step' => '03', 'title' => 'Produção & Implementação', 'desc' => 'Criamos e lançamos as peças publicitárias, plataformas web, vídeos ou campanhas com excelência.'],
                    ['step' => '04', 'title' => 'Análise de ROI & Otimização', 'desc' => 'Monitorizamos o desempenho em tempo real, ajustando métricas para maximizar a conversão.']
                ],
                'metrics' => [
                    ['value' => '4K UltraHD', 'label' => 'Qualidade Cinematográfica'],
                    ['value' => '+300%', 'label' => 'Maior Retenção de Vídeo'],
                    ['value' => '100%', 'label' => 'Equipamento Profissional']
                ],
                'display_order' => 4,
            ],
        ];

        foreach ($servicesData as $s) {
            Service::updateOrCreate(['slug' => $s['slug']], $s);
        }

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
