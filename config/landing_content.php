<?php

/*
|--------------------------------------------------------------------------
| Conteúdo Editável da Landing Page (Energy / Oil & Gas) — Multilingue
|--------------------------------------------------------------------------
|
| Fonte única para o editor multilingue (PT/EN/FR) da landing.
| As chaves correspondem exactamente aos caminhos em lang/<locale>/oilandgas.php.
|
| Consumido por:
|   - App\Http\Controllers\Admin\LandingContentController (editor + gravação)
|   - App\Support\LandingContent (injecta os overrides na tradução em runtime)
|
| Os overrides são guardados em site_settings com a chave "landing:{locale}:{chave}".
| Se um campo não tiver override, usa-se o valor do ficheiro de tradução.
|
| type: text | textarea | list  (list = uma linha por item)
|
*/

return [

    [
        'title' => 'Navegação & Rodapé',
        'fields' => [
            'nav.approach'      => ['type' => 'text', 'label' => 'Menu: Abordagem'],
            'nav.areas'         => ['type' => 'text', 'label' => 'Menu: Áreas'],
            'nav.thinking'      => ['type' => 'text', 'label' => 'Menu: Como pensamos'],
            'nav.aog'           => ['type' => 'text', 'label' => 'Menu: Contacto'],
            'nav.cta'           => ['type' => 'text', 'label' => 'Botão do menu (CTA)'],
            'footer.tagline'    => ['type' => 'textarea', 'label' => 'Rodapé: Tagline'],
            'footer.areas_title'=> ['type' => 'text', 'label' => 'Rodapé: Título "Áreas"'],
            'footer.contact_title' => ['type' => 'text', 'label' => 'Rodapé: Título "Contactos"'],
            'footer.energy_team' => ['type' => 'text', 'label' => 'Rodapé: Equipa de Energia'],
            'footer.back_to_site' => ['type' => 'text', 'label' => 'Rodapé: Voltar ao site'],
        ],
    ],

    [
        'title' => 'Imagens',
        'fields' => [
            'landing_hero_image'   => ['type' => 'image', 'label' => 'Imagem do Hero (fundo)', 'default' => 'oil.jpg'],
            'landing_impact_image' => ['type' => 'image', 'label' => 'Imagem da secção Impacto / Diferenciação', 'default' => 'luanda_picture.jpg'],
        ],
    ],

    [
        'title' => 'Hero',
        'fields' => [
            'hero.eyebrow'     => ['type' => 'text', 'label' => 'Eyebrow'],
            'hero.title_line1' => ['type' => 'text', 'label' => 'Título — linha 1'],
            'hero.title_line2' => ['type' => 'text', 'label' => 'Título — linha 2'],
            'hero.subtitle'    => ['type' => 'textarea', 'label' => 'Subtítulo'],
            'hero.cta'         => ['type' => 'text', 'label' => 'Botão (CTA)'],
            'hero.scroll'      => ['type' => 'text', 'label' => 'Texto "Descer"'],
        ],
    ],

    [
        'title' => 'A indústria energética',
        'fields' => [
            'industry.eyebrow' => ['type' => 'text', 'label' => 'Eyebrow'],
            'industry.title'   => ['type' => 'textarea', 'label' => 'Título'],
            'industry.lead'    => ['type' => 'textarea', 'label' => 'Texto introdutório'],
            'industry.items'   => ['type' => 'list', 'label' => 'Lista de itens (um por linha)'],
        ],
    ],

    [
        'title' => 'Impacto / Diferenciação',
        'fields' => [
            'noise.eyebrow'   => ['type' => 'text', 'label' => 'Eyebrow'],
            'noise.title'     => ['type' => 'text', 'label' => 'Título'],
            'noise.lines'     => ['type' => 'list', 'label' => 'Linhas (uma por linha)'],
            'noise.highlight' => ['type' => 'textarea', 'label' => 'Frase em destaque'],
            'noise.closing'   => ['type' => 'text', 'label' => 'Frase de fecho'],
        ],
    ],

    [
        'title' => 'Experiência real (Clientes)',
        'fields' => [
            'clients.eyebrow'  => ['type' => 'text', 'label' => 'Eyebrow'],
            'clients.title'    => ['type' => 'text', 'label' => 'Título'],
            'clients.subtitle' => ['type' => 'textarea', 'label' => 'Subtítulo'],
        ],
    ],

    [
        'title' => 'Onde ajudamos (Áreas)',
        'fields' => [
            'areas.eyebrow'            => ['type' => 'text', 'label' => 'Eyebrow'],
            'areas.title'              => ['type' => 'textarea', 'label' => 'Título'],
            'areas.intro'             => ['type' => 'textarea', 'label' => 'Introdução'],
            'areas.approach_link'      => ['type' => 'text', 'label' => 'Link "Explorar abordagem"'],
            'areas.explore'            => ['type' => 'text', 'label' => 'Etiqueta "Explorar"'],
        ],
    ],

    [
        'title' => 'Áreas — Comunicação Corporativa',
        'fields' => [
            'areas.items.corporate.title' => ['type' => 'text', 'label' => 'Título'],
            'areas.items.corporate.desc'  => ['type' => 'textarea', 'label' => 'Descrição'],
        ],
    ],
    [
        'title' => 'Áreas — Comunicação de Projectos',
        'fields' => [
            'areas.items.projects.title' => ['type' => 'text', 'label' => 'Título'],
            'areas.items.projects.desc'  => ['type' => 'textarea', 'label' => 'Descrição'],
        ],
    ],
    [
        'title' => 'Áreas — Comunicação de Liderança',
        'fields' => [
            'areas.items.executive.title' => ['type' => 'text', 'label' => 'Título'],
            'areas.items.executive.desc'  => ['type' => 'textarea', 'label' => 'Descrição'],
        ],
    ],
    [
        'title' => 'Áreas — Comunicação Digital & Conteúdo',
        'fields' => [
            'areas.items.digital.title' => ['type' => 'text', 'label' => 'Título'],
            'areas.items.digital.desc'  => ['type' => 'textarea', 'label' => 'Descrição'],
        ],
    ],
    [
        'title' => 'Áreas — Stakeholder Engagement',
        'fields' => [
            'areas.items.stakeholder.title' => ['type' => 'text', 'label' => 'Título'],
            'areas.items.stakeholder.desc'  => ['type' => 'textarea', 'label' => 'Descrição'],
        ],
    ],

    [
        'title' => 'Como pensamos (cabeçalho)',
        'fields' => [
            'thinking.eyebrow'   => ['type' => 'text', 'label' => 'Eyebrow'],
            'thinking.title'     => ['type' => 'text', 'label' => 'Título'],
            'thinking.all_link'  => ['type' => 'text', 'label' => 'Link "Ver todas"'],
            'thinking.empty'     => ['type' => 'text', 'label' => 'Mensagem sem artigos'],
            'thinking.read_more' => ['type' => 'text', 'label' => 'Texto "Ler mais"'],
        ],
    ],

    [
        'title' => 'Angola Oil & Gas (secção final)',
        'fields' => [
            'aog.eyebrow'        => ['type' => 'text', 'label' => 'Eyebrow'],
            'aog.title'          => ['type' => 'textarea', 'label' => 'Título'],
            'aog.lead'           => ['type' => 'textarea', 'label' => 'Texto'],
            'aog.point_meetings' => ['type' => 'text', 'label' => 'Bullet 1'],
            'aog.point_contact'  => ['type' => 'text', 'label' => 'Bullet 2'],
        ],
    ],
    [
        'title' => 'Formulário AOG',
        'fields' => [
            'aog.form.title'         => ['type' => 'text', 'label' => 'Título do formulário'],
            'aog.form.subtitle'      => ['type' => 'textarea', 'label' => 'Subtítulo'],
            'aog.form.first_name'    => ['type' => 'text', 'label' => 'Campo: Nome'],
            'aog.form.first_name_ph' => ['type' => 'text', 'label' => 'Placeholder: Nome'],
            'aog.form.last_name'     => ['type' => 'text', 'label' => 'Campo: Sobrenome'],
            'aog.form.last_name_ph'  => ['type' => 'text', 'label' => 'Placeholder: Sobrenome'],
            'aog.form.email'         => ['type' => 'text', 'label' => 'Campo: E-mail'],
            'aog.form.email_ph'      => ['type' => 'text', 'label' => 'Placeholder: E-mail'],
            'aog.form.company'       => ['type' => 'text', 'label' => 'Campo: Empresa'],
            'aog.form.company_ph'    => ['type' => 'text', 'label' => 'Placeholder: Empresa'],
            'aog.form.message'       => ['type' => 'text', 'label' => 'Campo: Mensagem'],
            'aog.form.message_ph'    => ['type' => 'textarea', 'label' => 'Placeholder: Mensagem'],
            'aog.form.submit'        => ['type' => 'text', 'label' => 'Botão submeter'],
            'aog.form.error'         => ['type' => 'text', 'label' => 'Mensagem de erro'],
        ],
    ],

];
