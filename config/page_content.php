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
                'title'  => 'Os 4 Pilares de Benefícios ("O que muda")',
                'fields' => [
                    'home_pillars_title'    => ['type' => 'text',     'label' => 'Título da Secção', 'default' => 'O que muda com uma comunicação estratégica'],
                    'home_pillars_subtitle' => ['type' => 'text',     'label' => 'Subtítulo', 'default' => 'Metodologia testada para gerar valor mensurável.'],
                    'home_pillar1_title'    => ['type' => 'text',     'label' => 'Pilar 1 — Título', 'default' => 'Deixa de lutar pela atenção'],
                    'home_pillar1_desc'     => ['type' => 'textarea', 'label' => 'Pilar 1 — Descrição', 'rows' => 2, 'default' => 'A mensagem certa chega às pessoas certas sem esforço desperdiçado.'],
                    'home_pillar2_title'    => ['type' => 'text',     'label' => 'Pilar 2 — Título', 'default' => 'Os clientes certos aproximam-se'],
                    'home_pillar2_desc'     => ['type' => 'textarea', 'label' => 'Pilar 2 — Descrição', 'rows' => 2, 'default' => 'Quando entendem o que faz, os que precisam de si procuram-no.'],
                    'home_pillar3_title'    => ['type' => 'text',     'label' => 'Pilar 3 — Título', 'default' => 'A concorrência fica para trás'],
                    'home_pillar3_desc'     => ['type' => 'textarea', 'label' => 'Pilar 3 — Descrição', 'rows' => 2, 'default' => 'Uma mensagem clara é a vantagem que a maioria não tem coragem de construir.'],
                    'home_pillar4_title'    => ['type' => 'text',     'label' => 'Pilar 4 — Título', 'default' => 'O crescimento torna-se previsível'],
                    'home_pillar4_desc'     => ['type' => 'textarea', 'label' => 'Pilar 4 — Descrição', 'rows' => 2, 'default' => 'Com uma base sólida, cada acção gera mais resultado.'],
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
                    'home_services_heading'   => ['type' => 'text', 'label' => 'Título à esquerda', 'default' => 'Transformamos ideias em comunicação que faz sentido.'],
                    'home_services_title'     => ['type' => 'text', 'label' => 'Título à direita', 'default' => 'COMUNICAÇÃO CLARA. IMPACTO REAL.'],
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
                    'home_insights_title'    => ['type' => 'text',     'label' => 'Título', 'default' => 'Aprenda a comunicar melhor'],
                    'home_insights_subtitle' => ['type' => 'textarea', 'label' => 'Subtítulo', 'rows' => 2, 'default' => 'Ideias simples para melhorar a sua comunicação.'],
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
                'title'  => 'Cabeçalho Editorial (Hero)',
                'fields' => [
                    'about_hero_title' => ['type' => 'textarea', 'label' => 'Título Principal do Hero', 'rows' => 3, 'help' => 'Cada quebra de linha vira uma linha no site.', 'default' => "Além da criatividade.\nAlém da imaginação.\nO parceiro de Marketing 360° que a sua empresa precisa."],
                    'about_hero_p1'    => ['type' => 'textarea', 'label' => 'Parágrafo 1', 'rows' => 3, 'default' => 'A Xamariz (marca da empresa Visualclick, Lda) é uma agência de publicidade e comunicação focada em conectar marcas a resultados tangíveis em Angola e no mercado internacional.'],
                    'about_hero_p2'    => ['type' => 'textarea', 'label' => 'Parágrafo 2', 'rows' => 3, 'default' => 'Num mercado onde atrair clientes é cada vez mais desafiador, transformamos a sua mensagem em clareza, diferenciação e liderança comercial.'],
                ],
            ],
            [
                'title'  => 'O que nos move',
                'fields' => [
                    'about_cause_title' => ['type' => 'text',     'label' => 'Título da Secção', 'default' => 'O que nos move'],
                    'about_cause_p1'    => ['type' => 'textarea', 'label' => 'Parágrafo 1', 'rows' => 3, 'default' => 'Existem empresas focadas em oferecer produtos e serviços que resolvam problemas na vida dos consumidores.'],
                    'about_cause_p2'    => ['type' => 'textarea', 'label' => 'Parágrafo 2', 'rows' => 4, 'default' => 'Acreditamos verdadeiramente que se tiverem uma mensagem clara e convincente têm um enorme potencial para serem bem sucedidos e tornarem-se a principal referência no seu mercado. Torne-se uma verdadeira atração de clientes.'],
                ],
            ],
            [
                'title'  => 'A Nossa Oferta & A Nossa Promessa',
                'fields' => [
                    'about_offer_title'   => ['type' => 'text',     'label' => 'Título: A Nossa Oferta', 'default' => 'A Nossa Oferta.'],
                    'about_offer_text'    => ['type' => 'textarea', 'label' => 'Texto da Oferta', 'rows' => 3, 'default' => 'Oferecemos soluções de Marketing 360°, Branding, Produção Audiovisual e Estratégia Digital focadas em gerar autoridade e vendas.'],
                    'about_promise_title' => ['type' => 'text',     'label' => 'Título: A Nossa Promessa', 'default' => 'A Nossa Promessa.'],
                    'about_promise_text'  => ['type' => 'textarea', 'label' => 'Texto da Promessa', 'rows' => 3, 'default' => 'Comprometemo-nos com a excelência criativa, cumprimento rigoroso de prazos e métricas transparentes que comprovam o retorno do seu investimento.'],
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

    // ─── PORTFÓLIO ───────────────────────────────────────────
    'work' => [
        'label'  => 'Portfólio',
        'icon'   => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
        'status' => 'active',
        'note'   => 'Os projetos e filtros são geridos nos menus "Projetos / Portfólio" e "Filtros do Portfólio". Aqui edita os textos fixos.',
        'sections' => [
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
        'note'   => 'Os textos do cabeçalho e do formulário desta página são geridos pelas Traduções (PT/EN/FR). Os dados de contacto apresentados na barra lateral (morada, telefone, e-mail) vêm de Definições do Site » Geral & Contactos e são partilhados por todo o site.',
        'sections' => [],
    ],
];
