<?php

/*
|--------------------------------------------------------------------------
| Conteúdo Editável das Páginas (CMS » Páginas)
|--------------------------------------------------------------------------
|
| Fonte única de verdade para o editor de conteúdos por página.
| É consumido por:
|   - App\Http\Controllers\Admin\PageContentController (validação + gravação)
|   - resources/views/admin/pages/index.blade.php (renderização das abas)
|
| Cada página tem: label, icon (path SVG), status e secções.
| Cada campo tem uma chave (= chave em site_settings) e:
|   - type: text | textarea | image | url
|   - label, default, help (opcional), rows (para textarea)
|
| Campos do tipo "image" aceitam URL no campo de texto OU upload no campo
| "<chave>_file" (o controller trata o upload e grava o URL na chave).
|
| Para expandir a cobertura (fase seguinte): adicionar novos campos aqui e
| ligar a respetiva string na blade pública via SiteSetting::get('<chave>').
|
*/

return [

    // ─── HOME ────────────────────────────────────────────────
    'home' => [
        'label'  => 'Página Inicial',
        'icon'   => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
        'status' => 'active',
        'sections' => [
            [
                'title'  => 'Cabeçalho (Hero)',
                'fields' => [
                    'home_hero_title'        => ['type' => 'text',     'label' => 'Título — parte principal', 'default' => 'Quem comunica melhor,'],
                    'home_hero_title_accent' => ['type' => 'text',     'label' => 'Título — parte destacada (laranja)', 'default' => 'cresce melhor.'],
                    'home_hero_subtitle'     => ['type' => 'textarea', 'label' => 'Subtítulo', 'rows' => 3, 'help' => 'Use quebras de linha para separar em várias linhas.', 'default' => 'Ajudamos empresas a clarificar a sua mensagem para atrair clientes certos e liderar o seu mercado.'],
                    'home_hero_cta_label'    => ['type' => 'text',     'label' => 'Texto do botão', 'help' => 'O botão liga à página de Contacto.', 'default' => 'Agende conversa'],
                ],
            ],
            [
                'title'  => 'Secção "As empresas não estão a falhar"',
                'fields' => [
                    'home_whoweare_title' => ['type' => 'textarea', 'label' => 'Título', 'rows' => 3, 'help' => 'Cada quebra de linha (Enter) cria uma nova linha no site.', 'default' => "As empresas não estão a falhar.\nEstão a comunicar mal."],
                    'home_whoweare_text'  => ['type' => 'textarea', 'label' => 'Texto (coluna direita)', 'rows' => 6, 'help' => 'Cada quebra de linha (Enter) cria uma nova linha no site.', 'default' => "Investem no digital.\nPublicam conteúdo.\nFazem campanhas.\nMas o mercado não entende.\nE quando não entende, escolhe outro."],
                ],
            ],
            [
                'title'  => 'Slider de Comparação Antes / Depois',
                'fields' => [
                    'home_slider_title'         => ['type' => 'text',  'label' => 'Título da Secção', 'default' => 'O poder de uma identidade visual que vende.'],
                    'home_slider_subtitle'      => ['type' => 'text',  'label' => 'Subtítulo', 'default' => 'Arraste o cursor e veja a transformação do conceito à execução final.'],
                    'home_slider_before_img'    => ['type' => 'image', 'label' => 'Imagem ANTES / Conceito', 'default' => 'https://images.unsplash.com/photo-1501386761578-eac5c94b800a?w=1200&auto=format&fit=crop&q=80'],
                    'home_slider_after_img'     => ['type' => 'image', 'label' => 'Imagem DEPOIS / Resultado', 'default' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=1200&auto=format&fit=crop&q=80'],
                    'home_slider_metric1_val'   => ['type' => 'text',  'label' => 'Métrica 1 (Valor)', 'default' => '+140%'],
                    'home_slider_metric1_label' => ['type' => 'text',  'label' => 'Métrica 1 (Etiqueta)', 'default' => 'Taxa de Conversão'],
                    'home_slider_metric2_val'   => ['type' => 'text',  'label' => 'Métrica 2 (Valor)', 'default' => '+65%'],
                    'home_slider_metric2_label' => ['type' => 'text',  'label' => 'Métrica 2 (Etiqueta)', 'default' => 'Reconhecimento de Marca'],
                ],
            ],
            [
                'title'  => 'Secção "Clareza exige método" (3 passos)',
                'fields' => [
                    'home_method_kicker'     => ['type' => 'text',     'label' => 'Antetítulo (laranja)', 'default' => 'Clareza exige método.'],
                    'home_method_title'      => ['type' => 'text',     'label' => 'Título da Secção', 'default' => 'É assim que transformamos clareza em impacto.'],
                    'home_method_step1_title' => ['type' => 'text',     'label' => 'Passo 1 — Título', 'default' => 'Compreender'],
                    'home_method_step1_desc'  => ['type' => 'textarea', 'label' => 'Passo 1 — Descrição', 'rows' => 3, 'default' => 'Analisamos o seu negócio, o mercado, o público e a concorrência para identificar oportunidades reais de diferenciação.'],
                    'home_method_step2_title' => ['type' => 'text',     'label' => 'Passo 2 — Título', 'default' => 'Clarificar'],
                    'home_method_step2_desc'  => ['type' => 'textarea', 'label' => 'Passo 2 — Descrição', 'rows' => 3, 'default' => 'Encontramos o posicionamento, a mensagem e a estratégia que tornam o valor da sua empresa mais claro e relevante para as pessoas certas.'],
                    'home_method_step3_title' => ['type' => 'text',     'label' => 'Passo 3 — Título', 'default' => 'Comunicar'],
                    'home_method_step3_desc'  => ['type' => 'textarea', 'label' => 'Passo 3 — Descrição', 'rows' => 3, 'default' => 'Criamos e executamos comunicação, conteúdos e experiências que chegam às pessoas certas e geram resultados para o seu negócio.'],
                ],
            ],
            [
                'title'  => 'Secção "Quando a mensagem é clara"',
                'fields' => [
                    'home_about_title_strong' => ['type' => 'text', 'label' => 'Título — parte a negrito', 'default' => 'Quando a mensagem é clara,'],
                    'home_about_title'        => ['type' => 'text', 'label' => 'Título — parte final', 'default' => 'as pessoas certas encontram-no.'],
                    'home_about_item1'        => ['type' => 'text', 'label' => 'Item 1 da lista', 'default' => 'Entendem o que faz.'],
                    'home_about_item2'        => ['type' => 'text', 'label' => 'Item 2 da lista', 'default' => 'Reconhecem o valor.'],
                    'home_about_item3'        => ['type' => 'text', 'label' => 'Item 3 da lista', 'default' => 'E escolhem-no a si.'],
                ],
            ],
            [
                'title'  => 'Secção Serviços (cabeçalho)',
                'fields' => [
                    'home_services_heading'   => ['type' => 'text', 'label' => 'Título à esquerda', 'default' => 'Da estratégia à execução, tudo começa pela clareza.'],
                    'home_services_title'     => ['type' => 'text', 'label' => 'Título à direita', 'help' => 'Deve caber numa só linha.', 'default' => 'Como podemos ajudar'],
                    'home_services_cta'       => ['type' => 'text', 'label' => 'Texto do botão', 'default' => 'VER TODOS OS SERVIÇOS'],
                    'home_services_card_link' => ['type' => 'text', 'label' => 'Ligação nos cartões', 'default' => 'Explorar serviço'],
                ],
            ],
            [
                'title'  => 'Secção Projetos em Destaque',
                'fields' => [
                    'home_works_title'    => ['type' => 'text',     'label' => 'Título', 'default' => 'Projetos em destaque.'],
                    'home_works_subtitle' => ['type' => 'textarea', 'label' => 'Subtítulo', 'rows' => 2, 'default' => 'Campanhas e soluções de comunicação para grandes marcas em Angola e no mercado internacional.'],
                    'home_works_cta'      => ['type' => 'text',     'label' => 'Texto do botão', 'default' => 'VER TODOS OS PROJETOS'],
                ],
            ],
            [
                'title'  => 'Secção Marcas / Clientes (marquee)',
                'fields' => [
                    'home_brands_title' => ['type' => 'textarea', 'label' => 'Título', 'rows' => 2, 'default' => 'Trabalhamos com marcas audazes impulsionando o seu próximo grande salto.'],
                    'home_brands_cta'   => ['type' => 'text',     'label' => 'Texto do botão', 'default' => 'VER CLIENTES'],
                ],
            ],
            [
                'title'  => 'Secção Insights (cabeçalho)',
                'fields' => [
                    'home_insights_cta'      => ['type' => 'text',     'label' => 'Texto do botão', 'default' => 'VER TODOS OS ARTIGOS'],
                ],
            ],
        ],
    ],

    // ─── SOBRE NÓS ───────────────────────────────────────────
    'about' => [
        'label'  => 'Sobre Nós',
        'icon'   => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        'status' => 'active',
        'sections' => [
            [
                'title'  => 'Cabeçalho (Banner azul no topo)',
                'fields' => [
                    'about_hero_title'    => ['type' => 'text', 'label' => 'Título do Banner', 'default' => 'Quem Somos'],
                    'about_hero_subtitle' => ['type' => 'text', 'label' => 'Subtítulo do Banner', 'default' => 'Ajudamos empresas a serem compreendidas.'],
                ],
            ],
            [
                'title'  => 'Em que acreditamos (Filosofia da Marca)',
                'fields' => [
                    'about_beliefs_title' => ['type' => 'text',     'label' => 'Título', 'default' => 'Em que acreditamos.'],
                    'about_beliefs_text'  => ['type' => 'textarea', 'label' => 'Texto da Filosofia', 'rows' => 3, 'default' => 'Acreditamos que a publicidade deve transcender o ruído visual e criar ligações autênticas entre marcas e consumidores.'],
                    'about_history_title' => ['type' => 'text',     'label' => 'Título da Secção de História', 'default' => 'A Nossa História.'],
                ],
            ],
            [
                'title'  => 'Galeria de Fotos do Escritório / Equipa',
                'fields' => [
                    'about_gallery_img1' => ['type' => 'image', 'label' => 'Foto 1', 'default' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1800&auto=format&fit=crop&q=80'],
                    'about_gallery_img2' => ['type' => 'image', 'label' => 'Foto 2', 'default' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&auto=format&fit=crop&q=80'],
                    'about_gallery_img3' => ['type' => 'image', 'label' => 'Foto 3', 'default' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=900&auto=format&fit=crop&q=80'],
                ],
            ],
        ],
    ],

    // ─── MÉDIA & VÍDEOS (GLOBAL) ─────────────────────────────
    'media' => [
        'label'  => 'Vídeos & Média',
        'icon'   => 'M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z',
        'status' => 'active',
        'note'   => 'Todos os campos de vídeo aceitam qualquer fonte: ficheiro local (ex.: office.mp4), URL do YouTube, Vimeo ou outro link de vídeo — a fonte é detetada automaticamente. Pode ainda carregar um ficheiro local diretamente. Para vídeos de fundo (hero e cultura), recomenda-se MP4 para melhor desempenho.',
        'sections' => [
            [
                'title'  => 'Vídeo do Cabeçalho (Hero da Página Inicial)',
                'fields' => [
                    'home_hero_video1'  => ['type' => 'video', 'label' => 'Vídeo principal do Hero', 'help' => 'Local, YouTube, Vimeo ou outro. Recomendado: MP4.', 'default' => 'video_base.mp4'],
                    'home_hero_poster1' => ['type' => 'image', 'label' => 'Imagem de Fallback (mostrada enquanto o vídeo carrega)', 'default' => 'https://images.unsplash.com/photo-1518135714426-c18f5ffb6f4d?w=1800&auto=format&fit=crop&q=60'],
                    'home_hero_loop'    => ['type' => 'toggle', 'label' => 'Reproduzir em contínuo (loop)', 'help' => 'Repete o vídeo do hero sem parar.', 'default' => '1'],
                ],
            ],
            [
                'title'  => 'Showreel (Vídeo do Botão "Agende uma conversa")',
                'fields' => [
                    'showreel_video_url' => ['type' => 'video', 'label' => 'Vídeo do Showreel (Modal)', 'help' => 'Cole o link do YouTube/Vimeo (qualquer formato), um MP4 direto ou carregue um ficheiro. Abre em janela com controlos.', 'default' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
                ],
            ],
            [
                'title'  => 'Secção de Cultura ("Pronto para comunicar melhor?")',
                'fields' => [
                    'culture_image_url'  => ['type' => 'image',   'label' => 'Imagem de Fundo (opcional)', 'help' => 'Carregue uma imagem para usar como fundo. Para usar vídeo, deixe este campo vazio.', 'default' => 'equipa.png'],
                    'culture_video_url'  => ['type' => 'video',    'label' => 'Vídeo de Fundo', 'help' => 'Local, YouTube, Vimeo ou outro. Sem som, como fundo. Recomendado: MP4.', 'default' => 'office.mp4'],
                    'culture_video_loop' => ['type' => 'toggle',   'label' => 'Reproduzir em contínuo (loop)', 'help' => 'Repete o vídeo de fundo sem parar.', 'default' => '1'],
                    'culture_video_title'=> ['type' => 'text',     'label' => 'Título da secção', 'default' => 'Pronto para comunicar melhor?'],
                    'culture_video_cta'  => ['type' => 'text',     'label' => 'Texto do botão', 'help' => 'O botão liga à página de Contacto.', 'default' => 'Agende uma conversa'],
                ],
            ],
        ],
    ],

    // ─── PÁGINAS LEGAIS ──────────────────────────────────────
    'legal' => [
        'label'  => 'Páginas Legais',
        'icon'   => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
        'status' => 'active',
        'sections' => [
            [
                'title'  => 'Políticas',
                'fields' => [
                    'legal_privacy_policy' => ['type' => 'textarea', 'label' => 'Política de Privacidade (Texto / HTML)', 'rows' => 10, 'help' => 'Se ficar vazio, o site usa o texto base padrão.', 'default' => ''],
                    'legal_cookies_policy' => ['type' => 'textarea', 'label' => 'Política de Cookies (Texto / HTML)', 'rows' => 10, 'help' => 'Se ficar vazio, o site usa o texto base padrão.', 'default' => ''],
                ],
            ],
        ],
    ],

    // ─── SERVIÇOS ────────────────────────────────────────────
    'services' => [
        'label'  => 'Serviços',
        'icon'   => 'M13 10V3L4 14h7v7l9-11h-7z',
        'status' => 'active',
        'note'   => 'A lista de serviços é gerida no menu "Serviços 360°". Aqui edita apenas os textos fixos da página.',
        'sections' => [
            [
                'title'  => 'Cabeçalho (Banner azul no topo)',
                'fields' => [
                    'services_banner_title'    => ['type' => 'text', 'label' => 'Título do Banner', 'default' => 'Serviços'],
                    'services_banner_subtitle' => ['type' => 'text', 'label' => 'Subtítulo do Banner', 'default' => 'Da estratégia à execução.'],
                ],
            ],
            [
                'title'  => 'Cabeçalho da Página',
                'fields' => [
                    'services_breadcrumb'   => ['type' => 'text',     'label' => 'Migalha de Pão (Breadcrumb)', 'default' => 'Soluções & Serviços 360°'],
                    'services_hero_title'   => ['type' => 'textarea', 'label' => 'Título Principal (H1)', 'rows' => 2, 'default' => 'Organizados pelo problema, focados em resultados reais.'],
                    'services_hero_subtitle'=> ['type' => 'textarea', 'label' => 'Subtítulo / Introdução', 'rows' => 3, 'default' => 'Atrair clientes num mercado competitivo exige uma comunicação clara e uma estratégia de diferenciação. Desenvolvemos ecossistemas de Marketing 360° desenhados para colocar a sua empresa no topo do seu setor.'],
                    'services_empty'        => ['type' => 'text',     'label' => 'Mensagem quando não há serviços', 'default' => 'Nenhum serviço cadastrado de momento.'],
                ],
            ],
            [
                'title'  => 'Chamada Final (CTA)',
                'fields' => [
                    'services_cta_title'    => ['type' => 'textarea', 'label' => 'Título do CTA', 'rows' => 2, 'default' => 'Não tem a certeza de qual o serviço ideal para o seu projeto?'],
                    'services_cta_subtitle' => ['type' => 'textarea', 'label' => 'Subtítulo do CTA', 'rows' => 2, 'default' => 'Apresente-nos o seu desafio comercial. Nós desenvolvemos a solução ideal.'],
                ],
            ],
        ],
    ],

    // ─── MARKETING (Páginas SEO /marketing) ──────────────────
    'marketing' => [
        'label'  => 'Marketing SEO',
        'icon'   => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6',
        'status' => 'active',
        'note'   => 'Páginas de aterragem críticas para SEO (/marketing/...). Os H1/H2 seguem a folha "H1-H2 SEO Lock" do plano de migração. Não devem ser eliminadas nem colapsadas na página de Serviços.',
        'sections' => [
            [
                'title'  => 'Marketing Digital  (/marketing/marketing-digital/)',
                'fields' => [
                    'md_hero_title'     => ['type' => 'text',     'label' => 'H1 — Título', 'default' => 'Marketing Digital'],
                    'md_hero_subtitle'  => ['type' => 'textarea', 'label' => 'Subtítulo / Introdução', 'rows' => 3, 'default' => 'O conjunto de ações em meios digitais para promover a sua empresa, captar a atenção dos clientes certos e mostrar que a sua oferta resolve os problemas deles.'],
                    'md_b1_title'       => ['type' => 'text',     'label' => 'H2 — Bloco 1 (Título)', 'default' => 'O que é o Marketing Digital?'],
                    'md_b1_text'        => ['type' => 'textarea', 'label' => 'Bloco 1 (Texto)', 'rows' => 6, 'default' => 'O marketing digital reúne as ações de marketing realizadas em meios digitais para promover empresas, produtos ou serviços. O foco está em captar a atenção de potenciais clientes e demonstrar que a sua oferta é a solução para os problemas deles. Com a estratégia certa, o digital alcança milhares de potenciais clientes, muitas vezes com um investimento inferior ao do marketing tradicional. O princípio é simples: comunique onde está a atenção dos consumidores.'],
                    'md_b2_title'       => ['type' => 'text',     'label' => 'H2 — Bloco 2 (Título)', 'default' => 'O que ganha com o Marketing Digital'],
                    'md_b2_text'        => ['type' => 'textarea', 'label' => 'Bloco 2 (Texto)', 'rows' => 6, 'default' => "Uma estratégia bem definida permite atrair a atenção de potenciais clientes, aumentar a visibilidade e as interações, criar relacionamentos e fidelidade, destacar-se da concorrência e procurar um maior retorno do investimento (ROI).\nOs principais tipos incluem Marketing de Conteúdo, Search Engine Marketing (com SEO, PPC e remarketing), E-mail Marketing, Redes Sociais, Mobile, Afiliados, Influência e Realidade Virtual."],
                    'md_faq1_q'         => ['type' => 'text',     'label' => 'FAQ 1 — Pergunta', 'default' => 'Quais são os principais tipos de marketing digital?'],
                    'md_faq1_a'         => ['type' => 'textarea', 'label' => 'FAQ 1 — Resposta', 'rows' => 2, 'default' => 'Marketing de Conteúdo, Search Engine Marketing, E-mail Marketing, Redes Sociais, Mobile, Afiliados, Influência e Realidade Virtual.'],
                    'md_faq2_q'         => ['type' => 'text',     'label' => 'FAQ 2 — Pergunta', 'default' => 'O SEO faz parte do marketing digital?'],
                    'md_faq2_a'         => ['type' => 'textarea', 'label' => 'FAQ 2 — Resposta', 'rows' => 2, 'default' => 'Sim. O SEO integra o Search Engine Marketing, a par do pay-per-click (PPC) e do remarketing.'],
                    'md_faq3_q'         => ['type' => 'text',     'label' => 'FAQ 3 — Pergunta', 'default' => 'Qual é o objetivo do marketing digital?'],
                    'md_faq3_a'         => ['type' => 'textarea', 'label' => 'FAQ 3 — Resposta', 'rows' => 2, 'default' => 'Promover a sua oferta, captar a atenção dos clientes certos e contribuir para o crescimento do negócio.'],
                    'md_faq4_q'         => ['type' => 'text',     'label' => 'FAQ 4 — Pergunta (opcional)', 'default' => ''],
                    'md_faq4_a'         => ['type' => 'textarea', 'label' => 'FAQ 4 — Resposta (opcional)', 'rows' => 2, 'default' => ''],
                    'md_cta_title'      => ['type' => 'text',     'label' => 'CTA — Título', 'default' => 'Pronto para crescer no digital?'],
                    'md_cta_subtitle'   => ['type' => 'textarea', 'label' => 'CTA — Subtítulo', 'rows' => 2, 'default' => 'Agende um encontro e vamos definir a estratégia de Marketing Digital ideal para a sua empresa.'],
                ],
            ],
            [
                'title'  => 'SEO  (/marketing/seo-search-engine-optimization/)',
                'fields' => [
                    'seo_hero_title'    => ['type' => 'text',     'label' => 'H1 — Título', 'default' => 'SEO — Search Engine Optimization'],
                    'seo_hero_subtitle' => ['type' => 'textarea', 'label' => 'Subtítulo / Introdução', 'rows' => 3, 'default' => 'Otimize o seu website para aparecer em destaque nos motores de pesquisa e ser encontrado por quem procura aquilo que oferece.'],
                    'seo_b1_title'      => ['type' => 'text',     'label' => 'H2 — Bloco 1 (Título)', 'default' => 'O que é o SEO?'],
                    'seo_b1_text'       => ['type' => 'textarea', 'label' => 'Bloco 1 (Texto)', 'rows' => 6, 'default' => 'SEO (Search Engine Optimization) é o conjunto de atividades que usa análise digital e marketing para melhorar a sua presença online. O foco está em otimizar o website para obter destaque nos resultados dos motores de pesquisa como o Google, o Bing e o Yahoo. Ter um website não basta se ninguém o encontra online.'],
                    'seo_b2_title'      => ['type' => 'text',     'label' => 'H2 — Bloco 2 (Título)', 'default' => 'Porque é que o SEO é importante'],
                    'seo_b2_text'       => ['type' => 'textarea', 'label' => 'Bloco 2 (Texto)', 'rows' => 6, 'default' => 'A otimização aumenta a probabilidade de o seu negócio aparecer quando alguém pesquisa temas relacionados com a sua oferta. Assim, melhora a presença online, aumenta a visibilidade nas pesquisas e facilita a descoberta da sua empresa pelas pessoas certas.'],
                    'seo_faq1_q'        => ['type' => 'text',     'label' => 'FAQ 1 — Pergunta', 'default' => 'O que é o SEO?'],
                    'seo_faq1_a'        => ['type' => 'textarea', 'label' => 'FAQ 1 — Resposta', 'rows' => 2, 'default' => 'A otimização de websites para melhorar a presença e a visibilidade nos resultados de pesquisa.'],
                    'seo_faq2_q'        => ['type' => 'text',     'label' => 'FAQ 2 — Pergunta', 'default' => 'Porque é importante?'],
                    'seo_faq2_a'        => ['type' => 'textarea', 'label' => 'FAQ 2 — Resposta', 'rows' => 2, 'default' => 'Porque um website pode existir sem ser encontrado pelos potenciais clientes.'],
                    'seo_faq3_q'        => ['type' => 'text',     'label' => 'FAQ 3 — Pergunta', 'default' => 'Que motores de pesquisa?'],
                    'seo_faq3_a'        => ['type' => 'textarea', 'label' => 'FAQ 3 — Resposta', 'rows' => 2, 'default' => 'Google, Bing e Yahoo.'],
                    'seo_faq4_q'        => ['type' => 'text',     'label' => 'FAQ 4 — Pergunta', 'default' => 'O SEO garante o primeiro lugar?'],
                    'seo_faq4_a'        => ['type' => 'textarea', 'label' => 'FAQ 4 — Resposta', 'rows' => 2, 'default' => 'Não. Trabalhamos por destaque e melhores posições — não prometemos a primeira posição garantida.'],
                    'seo_cta_title'     => ['type' => 'text',     'label' => 'CTA — Título', 'default' => 'Quer ser encontrado no Google?'],
                    'seo_cta_subtitle'  => ['type' => 'textarea', 'label' => 'CTA — Subtítulo', 'rows' => 2, 'default' => 'Agende um encontro e vamos definir a sua estratégia de SEO para fomentar o crescimento.'],
                ],
            ],
            [
                'title'  => 'Marketing de Diferenciação  (/marketing/marketing-de-diferenciacao/)',
                'fields' => [
                    'dif_hero_title'    => ['type' => 'text',     'label' => 'H1 — Título', 'default' => 'Marketing de Diferenciação'],
                    'dif_hero_subtitle' => ['type' => 'textarea', 'label' => 'Subtítulo / Introdução', 'rows' => 3, 'default' => 'Num mercado onde tantas empresas parecem cópias umas das outras, a diferenciação é o que faz a sua marca ser reconhecida e escolhida.'],
                    'dif_b1_title'      => ['type' => 'text',     'label' => 'H2 — Bloco 1 (Título)', 'default' => 'O que é o Marketing de Diferenciação?'],
                    'dif_b1_text'       => ['type' => 'textarea', 'label' => 'Bloco 1 (Texto)', 'rows' => 6, 'default' => 'É o conjunto de estratégias de comunicação que torna a sua empresa reconhecida pelas suas particularidades e pela forma diferente como resolve os problemas do mercado. O diferencial pode estar na unicidade dos produtos e serviços, na originalidade do atendimento ou em qualquer outro aspeto do negócio. Muitas empresas têm vantagens competitivas reais — mas não as reconhecem, nem as comunicam.'],
                    'dif_b2_title'      => ['type' => 'text',     'label' => 'H2 — Bloco 2 (Título)', 'default' => 'Porque é importante diferenciar-se'],
                    'dif_b2_text'       => ['type' => 'textarea', 'label' => 'Bloco 2 (Texto)', 'rows' => 6, 'default' => "Os consumidores estão cansados de marcas que parecem todas iguais e procuram empresas originais, com soluções diferentes.\nAjudamos a sua empresa a definir e comunicar o seu diferencial, a atrair e fidelizar o público-alvo e a destacar-se claramente da concorrência."],
                    'dif_faq1_q'        => ['type' => 'text',     'label' => 'FAQ 1 — Pergunta', 'default' => 'O que é o Marketing de Diferenciação?'],
                    'dif_faq1_a'        => ['type' => 'textarea', 'label' => 'FAQ 1 — Resposta', 'rows' => 2, 'default' => 'Uma abordagem de comunicação focada em tornar clara a particularidade que distingue a sua empresa.'],
                    'dif_faq2_q'        => ['type' => 'text',     'label' => 'FAQ 2 — Pergunta', 'default' => 'Para que serve?'],
                    'dif_faq2_a'        => ['type' => 'textarea', 'label' => 'FAQ 2 — Resposta', 'rows' => 2, 'default' => 'Para comunicar as suas vantagens competitivas e fortalecer o posicionamento da marca.'],
                    'dif_faq3_q'        => ['type' => 'text',     'label' => 'FAQ 3 — Pergunta', 'default' => 'Onde pode estar o meu diferencial?'],
                    'dif_faq3_a'        => ['type' => 'textarea', 'label' => 'FAQ 3 — Resposta', 'rows' => 2, 'default' => 'No produto, no serviço, no atendimento, na experiência ou noutros aspetos específicos do negócio.'],
                    'dif_faq4_q'        => ['type' => 'text',     'label' => 'FAQ 4 — Pergunta (opcional)', 'default' => ''],
                    'dif_faq4_a'        => ['type' => 'textarea', 'label' => 'FAQ 4 — Resposta (opcional)', 'rows' => 2, 'default' => ''],
                    'dif_cta_title'     => ['type' => 'text',     'label' => 'CTA — Título', 'default' => 'Pronto para destacar a sua marca?'],
                    'dif_cta_subtitle'  => ['type' => 'textarea', 'label' => 'CTA — Subtítulo', 'rows' => 2, 'default' => 'Agende um encontro e vamos definir a estratégia de Marketing de Diferenciação certa para o seu crescimento.'],
                ],
            ],
            [
                'title'  => 'Marketing de Conteúdo  (/marketing-de-conteudo/)',
                'fields' => [
                    'cont_hero_title'   => ['type' => 'text',     'label' => 'H1 — Título', 'default' => 'Marketing de Conteúdo'],
                    'cont_hero_subtitle'=> ['type' => 'textarea', 'label' => 'Subtítulo / Introdução', 'rows' => 3, 'default' => 'Atraia clientes criando conteúdo que o seu público valoriza, em vez de depender apenas da prospeção direta.'],
                    'cont_b1_title'     => ['type' => 'text',     'label' => 'H2 — Bloco 1 (Título)', 'default' => 'O que é o Marketing de Conteúdo?'],
                    'cont_b1_text'      => ['type' => 'textarea', 'label' => 'Bloco 1 (Texto)', 'rows' => 6, 'default' => 'É uma estratégia de marketing digital baseada na criação e distribuição consistente de conteúdo relevante, que procura atrair e conectar-se com um grupo específico de consumidores e conduzi-los à sua oferta. Os formatos incluem textos, vídeos e fotografia — e o conteúdo deve educar, informar ou entreter.'],
                    'cont_b2_title'     => ['type' => 'text',     'label' => 'H2 — Bloco 2 (Título)', 'default' => 'Conteúdo + SEO, no contexto angolano'],
                    'cont_b2_text'      => ['type' => 'textarea', 'label' => 'Bloco 2 (Texto)', 'rows' => 6, 'default' => 'Quando combinado com SEO, o conteúdo passa a ser descoberto através das pesquisas no Google. Em Angola, o crescimento do uso de smartphones e do consumo de conteúdo online torna esta estratégia ainda mais eficaz. A regra é simples: comunique nos canais onde os seus consumidores estão.'],
                    'cont_faq1_q'       => ['type' => 'text',     'label' => 'FAQ 1 — Pergunta', 'default' => 'O que é o marketing de conteúdo?'],
                    'cont_faq1_a'       => ['type' => 'textarea', 'label' => 'FAQ 1 — Resposta', 'rows' => 2, 'default' => 'A criação e distribuição consistente de conteúdo relevante para atrair e conectar uma audiência.'],
                    'cont_faq2_q'       => ['type' => 'text',     'label' => 'FAQ 2 — Pergunta', 'default' => 'Que formatos posso usar?'],
                    'cont_faq2_a'       => ['type' => 'textarea', 'label' => 'FAQ 2 — Resposta', 'rows' => 2, 'default' => 'Textos, vídeos, fotografias e outros.'],
                    'cont_faq3_q'       => ['type' => 'text',     'label' => 'FAQ 3 — Pergunta', 'default' => 'Qual a relação com o SEO?'],
                    'cont_faq3_a'       => ['type' => 'textarea', 'label' => 'FAQ 3 — Resposta', 'rows' => 2, 'default' => 'Conteúdo otimizado pode ser encontrado através das pesquisas no Google.'],
                    'cont_faq4_q'       => ['type' => 'text',     'label' => 'FAQ 4 — Pergunta', 'default' => 'Funciona em Angola?'],
                    'cont_faq4_a'       => ['type' => 'textarea', 'label' => 'FAQ 4 — Resposta', 'rows' => 2, 'default' => 'Sim — o uso crescente de smartphones e o consumo digital tornam-no muito eficaz.'],
                    'cont_cta_title'    => ['type' => 'text',     'label' => 'CTA — Título', 'default' => 'Quer preparar o futuro do seu negócio?'],
                    'cont_cta_subtitle' => ['type' => 'textarea', 'label' => 'CTA — Subtítulo', 'rows' => 2, 'default' => 'Agende um encontro e vamos construir a sua estratégia de Marketing de Conteúdo.'],
                ],
            ],
        ],
    ],

    // ─── PORTFÓLIO ───────────────────────────────────────────
    'work' => [
        'label'  => 'Portfólio',
        'icon'   => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
        'status' => 'active',
        'note'   => 'Os projetos e filtros são geridos nos menus "Projetos / Portfólio" e "Filtros do Portfólio". Aqui edita os textos fixos.',
        'sections' => [
            [
                'title'  => 'Cabeçalho (Banner azul no topo)',
                'fields' => [
                    'work_banner_title'    => ['type' => 'text', 'label' => 'Título do Banner', 'default' => 'Portfólio'],
                    'work_banner_subtitle' => ['type' => 'text', 'label' => 'Subtítulo do Banner', 'default' => 'Trabalho que transforma estratégia em impacto.'],
                ],
            ],
            [
                'title'  => 'Cabeçalho da Página',
                'fields' => [
                    'work_breadcrumb'    => ['type' => 'text',     'label' => 'Migalha de Pão (Breadcrumb)', 'default' => 'Portfólio de Projetos'],
                    'work_hero_title'    => ['type' => 'textarea', 'label' => 'Título Principal (H1)', 'rows' => 2, 'default' => 'Campanhas audazes e resultados que dominam o mercado.'],
                    'work_hero_subtitle' => ['type' => 'textarea', 'label' => 'Subtítulo / Introdução', 'rows' => 3, 'default' => 'Cada projeto começou como um desafio estratégico de comunicação. Explore como transformámos a visão dos nossos clientes em posições de liderança no setor.'],
                    'work_filter_all'    => ['type' => 'text',     'label' => 'Etiqueta do filtro "Todos"', 'default' => 'Todos os Projetos'],
                    'work_empty'         => ['type' => 'text',     'label' => 'Mensagem quando não há projetos', 'default' => 'Nenhum projeto encontrado de momento.'],
                ],
            ],
        ],
    ],

    // ─── CLIENTES ────────────────────────────────────────────
    'clients' => [
        'label'  => 'Clientes',
        'icon'   => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
        'status' => 'active',
        'note'   => 'Os logótipos e marcas são geridos no menu "Clientes & Marcas". Aqui edita os textos fixos da página.',
        'sections' => [
            [
                'title'  => 'Cabeçalho da Página',
                'fields' => [
                    'clients_breadcrumb'    => ['type' => 'text',     'label' => 'Migalha de Pão (Breadcrumb)', 'default' => 'Parcerias e Clientes'],
                    'clients_hero_title'    => ['type' => 'textarea', 'label' => 'Título Principal (H1)', 'rows' => 2, 'default' => 'Marcas líderes que confiam na Xamariz.'],
                    'clients_hero_subtitle' => ['type' => 'textarea', 'label' => 'Subtítulo / Introdução', 'rows' => 3, 'default' => 'Trabalhamos com empresas corporativas, instituições e líderes globais em Angola e no mundo. Clique num logótipo para ver os trabalhos realizados.'],
                    'clients_empty'         => ['type' => 'text',     'label' => 'Mensagem quando não há clientes', 'default' => 'Nenhum cliente cadastrado de momento.'],
                ],
            ],
            [
                'title'  => 'Chamada Final (CTA)',
                'fields' => [
                    'clients_cta_title'    => ['type' => 'textarea', 'label' => 'Título do CTA', 'rows' => 2, 'default' => 'Pronto para transformar a comunicação da sua marca?'],
                    'clients_cta_subtitle' => ['type' => 'textarea', 'label' => 'Subtítulo do CTA', 'rows' => 2, 'default' => 'Junte-se às maiores empresas e marcas do mercado. Desenvolvemos estratégias de Marketing 360° sob medida para o seu setor.'],
                ],
            ],
        ],
    ],

    // ─── EQUIPA ──────────────────────────────────────────────
    'team' => [
        'label'  => 'Equipa',
        'icon'   => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
        'status' => 'active',
        'note'   => 'Os membros da equipa são geridos no menu "Equipa & Liderança". Aqui edita os textos fixos da página.',
        'sections' => [
            [
                'title'  => 'Cabeçalho da Página',
                'fields' => [
                    'team_breadcrumb'    => ['type' => 'text',     'label' => 'Migalha de Pão (Breadcrumb)', 'default' => 'Equipa & Liderança'],
                    'team_hero_title'    => ['type' => 'textarea', 'label' => 'Título Principal (H1)', 'rows' => 2, 'default' => 'Liderança criativa e estratégica ao serviço da sua marca.'],
                    'team_hero_subtitle' => ['type' => 'textarea', 'label' => 'Subtítulo / Introdução', 'rows' => 3, 'default' => 'Conheça a nossa liderança executiva e os especialistas que transformam ideias em campanhas de alto impacto que dominam o mercado em Angola e internacionalmente.'],
                    'team_ceo_bio_title' => ['type' => 'text',     'label' => 'Título do bloco de bio do CEO', 'default' => 'Experiência & Visão de Liderança'],
                ],
            ],
            [
                'title'  => 'Secção Direção & Equipa',
                'fields' => [
                    'team_grid_eyebrow'  => ['type' => 'text',     'label' => 'Etiqueta (eyebrow)', 'default' => 'DIREÇÃO & EQUIPA'],
                    'team_grid_title'    => ['type' => 'text',     'label' => 'Título da Secção', 'default' => 'Equipa'],
                    'team_grid_subtitle' => ['type' => 'textarea', 'label' => 'Descrição da Secção', 'rows' => 2, 'default' => 'Uma equipa integrada de especialistas dedicados à excelência comercial e criativa da sua marca.'],
                    'team_empty'         => ['type' => 'text',     'label' => 'Mensagem quando não há equipa', 'default' => 'Nenhum membro da equipa registado de momento.'],
                ],
            ],
            [
                'title'  => 'Chamada Final (CTA)',
                'fields' => [
                    'team_cta_title'    => ['type' => 'textarea', 'label' => 'Título do CTA', 'rows' => 2, 'default' => 'Pronto para impulsionar o seu negócio?'],
                    'team_cta_subtitle' => ['type' => 'textarea', 'label' => 'Subtítulo do CTA', 'rows' => 2, 'default' => 'A nossa equipa de especialistas está pronta para desenhar a estratégia de Marketing 360° ideal para a sua empresa.'],
                ],
            ],
        ],
    ],

    // ─── CONTACTO ────────────────────────────────────────────
    'contact' => [
        'label'  => 'Contacto',
        'icon'   => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
        'status' => 'active',
        'note'   => 'O formulário e a barra lateral desta página usam as Traduções (PT/EN/FR) e os dados de Definições do Site » Geral & Contactos. Aqui edita o banner azul do topo.',
        'sections' => [
            [
                'title'  => 'Cabeçalho (Banner azul no topo)',
                'fields' => [
                    'contact_hero_title'    => ['type' => 'text', 'label' => 'Título do Banner', 'default' => 'Contactos'],
                    'contact_hero_subtitle' => ['type' => 'text', 'label' => 'Subtítulo do Banner', 'default' => 'Vamos conversar sobre o próximo passo da comunicação da sua marca.'],
                ],
            ],
        ],
    ],

    // ─── ARTIGOS / INSIGHTS ──────────────────────────────────
    'insights' => [
        'label'  => 'Artigos',
        'icon'   => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z',
        'status' => 'active',
        'note'   => 'Os artigos são geridos no menu "Artigos / Insights". Aqui edita o banner azul do topo.',
        'sections' => [
            [
                'title'  => 'Cabeçalho (Banner azul no topo)',
                'fields' => [
                    'insights_hero_title'    => ['type' => 'text', 'label' => 'Título do Banner', 'default' => 'Artigos'],
                    'insights_hero_subtitle' => ['type' => 'text', 'label' => 'Subtítulo do Banner', 'default' => 'Pensar melhor. Comunicar melhor.'],
                ],
            ],
        ],
    ],
];
