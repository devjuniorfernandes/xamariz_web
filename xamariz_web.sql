-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 21-Ago-2026 às 12:24
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `xamariz_web`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `logo_white_path` varchar(255) DEFAULT NULL,
  `sector` varchar(255) DEFAULT NULL,
  `headline` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `services_provided` text DEFAULT NULL,
  `testimonial_text` text DEFAULT NULL,
  `testimonial_author` varchar(255) DEFAULT NULL,
  `testimonial_role` varchar(255) DEFAULT NULL,
  `show_in_marquee` tinyint(1) NOT NULL DEFAULT 1,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clients`
--

INSERT INTO `clients` (`id`, `name`, `slug`, `logo_path`, `logo_white_path`, `sector`, `headline`, `website_url`, `description`, `services_provided`, `testimonial_text`, `testimonial_author`, `testimonial_role`, `show_in_marquee`, `display_order`, `created_at`, `updated_at`) VALUES
(10, 'Júnior Fernandes', 'junior-fernandes', '/storage/clients/0tjsCFXZChxtKx8GhhwcBsL7ZvYsGM7K9EpINPNJ.svg', NULL, 'consultoria', NULL, 'https://coaf.ao/', NULL, NULL, 'ADFSGHD', 'afa', 'FA', 1, 0, '2026-08-18 11:12:32', '2026-08-18 11:38:19'),
(11, 'Sonangol', 'sonangol', 'images/logos/total.svg', NULL, 'Energia & Recursos Naturais', 'Comunicação Institucional da Marca Líder de Angola', 'https://coaf.ao/', 'Planeamento estratégico de comunicação e produção de conteúdos para a celebração de marcos históricos corporativos.', 'Estratégia, Branding, Audiovisual & Marketing 360°', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Fernandes', 'OK', 1, 7, '2026-08-18 11:16:57', '2026-08-18 14:28:33'),
(12, 'ExxonMobil', 'exxonmobil', 'images/logos/exxon.svg', NULL, 'Energia & Petróleo', 'Parceria Estratégica de Comunicação & Atração de Talentos', NULL, 'Desenvolvemos formatos de conteúdos audiovisuais e campanhas de reciclagem avançada para a ExxonMobil, humanizando conceitos técnicos complexos para o público global e stakeholders.', 'Estratégia, Audiovisual & Comunicação Interna', 'A Xamariz transformou a nossa comunicação técnica numa narrativa humanizada de enorme alcance.', 'Direção de Comunicação Corporativa', 'ExxonMobil Angola', 1, 1, '2026-08-18 11:26:39', '2026-08-18 14:28:33'),
(13, 'Tullow Oil', 'tullow-oil', 'images/logos/shell.svg', NULL, 'Recursos Naturais & Gás', 'Comunicação Comunitária e Envolvimento Local', NULL, 'Criámos publicações ilustradas e materiais estratégicos que aproximam as comunidades locais da cadeia de valor energética da Tullow Oil.', 'Publicações, Ilustração & Envolvimento Comunitário', NULL, NULL, NULL, 1, 2, '2026-08-18 11:26:39', '2026-08-18 14:28:33'),
(14, 'Perenco', 'perenco', 'images/logos/bp.svg', NULL, 'Sustentabilidade & Energia', 'Campanhas anuais de Sustentabilidade & Transição Energética', NULL, 'Produção de campanhas de elevado impacto visual documentando iniciativas de descarbonização e captura de carbono.', 'Branding, Campanhas & Produção Audiovisual', NULL, NULL, NULL, 1, 3, '2026-08-18 11:26:39', '2026-08-18 14:28:33'),
(15, 'Western LNG', 'western-lng', 'images/logos/total.svg', NULL, 'Gás Natural & Infraestruturas', 'Visualização 3D e Animações de Projetos de Grande Escala', NULL, 'Animação 3D hiper-realista que posiciona projetos de infraestrutura de gás natural no seu ambiente natural.', 'Animação 3D CGI & Modelagem de Infraestruturas', NULL, NULL, NULL, 1, 4, '2026-08-18 11:26:39', '2026-08-18 14:28:33'),
(16, 'Huawei', 'huawei', 'images/logos/huawei.svg', NULL, 'Tecnologia & Telecomunicações', 'Posicionamento de Marca & Ativação Tecnológica 5G', NULL, 'Estratégia de comunicação institucional e campanhas de lançamento para soluções de infraestrutura tecnológica.', 'Estratégia 360°, Ativação & Comunicação Digital', NULL, NULL, NULL, 1, 5, '2026-08-18 11:26:39', '2026-08-18 14:28:33'),
(17, 'Emirates', 'emirates', 'images/logos/emirates.svg', NULL, 'Aviação & Turismo', 'Ativações de Marca & Promoções Globais', NULL, 'Campanhas publicitárias para a rota internacional Luanda-Dubai e posicionamento de serviço de primeira classe.', 'Publicidade, Outdoor & Marketing Digital', NULL, NULL, NULL, 1, 6, '2026-08-18 11:26:39', '2026-08-18 14:28:33'),
(18, 'Xamariz Tech', 'xamariz-tech', 'logo_xamariz.svg', NULL, 'Tecnologia & Inovação', 'Soluções Digitais & Transformação Tecnológica', NULL, 'Desenvolvimento de ecossistemas web e software corporativo de elevado impacto para empresas inovadoras.', 'Desenvolvimento Web, UX/UI & SEO', NULL, NULL, NULL, 0, 8, '2026-08-18 11:26:39', '2026-08-18 14:28:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contact_leads`
--

CREATE TABLE `contact_leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `sectors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`sectors`)),
  `message` text NOT NULL,
  `status` enum('new','in_progress','closed') NOT NULL DEFAULT 'new',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hero_slides`
--

CREATE TABLE `hero_slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) NOT NULL,
  `poster_image` varchar(255) DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `hero_slides`
--

INSERT INTO `hero_slides` (`id`, `title`, `video_path`, `poster_image`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Vídeo Principal Hero 1', 'video_base.mp4', NULL, 1, 1, '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(2, 'Vídeo Principal Hero 2', 'video_base_2.mp4', NULL, 2, 1, '2026-08-18 09:35:44', '2026-08-18 09:35:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_08_17_000001_create_clients_table', 1),
(5, '2026_08_17_000002_create_work_categories_table', 1),
(6, '2026_08_17_000003_create_works_table', 1),
(7, '2026_08_17_000004_create_team_members_table', 1),
(8, '2026_08_17_000005_create_services_table', 1),
(9, '2026_08_17_000006_create_posts_table', 1),
(10, '2026_08_17_000007_create_contact_leads_table', 1),
(11, '2026_08_17_000008_create_hero_slides_table', 1),
(12, '2026_08_17_000009_create_site_settings_table', 1),
(13, '2026_08_17_000010_add_role_to_users_table', 1),
(14, '2026_08_18_000001_add_detailed_fields_to_services_table', 2),
(15, '2026_08_18_000002_add_headline_and_services_provided_to_clients_table', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'published',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `category`, `summary`, `content`, `cover_image`, `author_id`, `published_at`, `status`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Como a comunicação transparente é a chave para a diferenciação no mercado angolano', 'stakeholder-communication-2026', 'Estratégia 360°', 'Num ambiente competitivo, a clareza e a estratégia de marca são os fatores decisivos para atrair e reter clientes.', 'Num mercado em rápida aceleração como o angolano, as marcas que se destacam não são apenas as que investem mais em publicidade, mas sim as que comunicam com maior clareza e transparência. Neste artigo, exploramos as 5 pilares do marketing de diferenciação.', 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1200&auto=format&fit=crop&q=80', NULL, '2026-08-01 09:00:00', 'published', NULL, NULL, '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(2, 'Construir marcas fortes que resistem às mudanças de mercado e geram valor', 'greenwashing-how-to-avoid', 'Branding & Reputação', 'Como estabelecer uma reputação sólida e inesquecível junto de clientes e parceiros estratégicos.', 'A reputação corporativa constrói-se com coerência visual, mensagem estratégica alinhada e compromisso real de valor para a sociedade.', 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1200&auto=format&fit=crop&q=80', NULL, '2026-07-15 13:30:00', 'published', NULL, NULL, '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(3, 'Desmistificar o tráfego pago e o SEO para gerar leads qualificadas', 'deep-tech-communication', 'Marketing Digital', 'Estratégias digitais orientadas a resultados que colocam a sua empresa no topo das pesquisas do Google.', 'Gerar tráfego é apenas o primeiro passo. O grande trunfo de um sistema de vendas online é converter visitantes casuais em clientes fieis.', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&auto=format&fit=crop&q=80', NULL, '2026-06-20 08:00:00', 'published', NULL, NULL, '2026-08-18 09:35:44', '2026-08-18 09:35:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number_code` varchar(255) NOT NULL DEFAULT '01',
  `title` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `full_description` longtext DEFAULT NULL,
  `strategic_value_para1` text DEFAULT NULL,
  `strategic_value_para2` text DEFAULT NULL,
  `quote` text DEFAULT NULL,
  `key_benefits` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`key_benefits`)),
  `deliverables` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`deliverables`)),
  `methodology` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`methodology`)),
  `metrics` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metrics`)),
  `image_path` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id`, `number_code`, `title`, `tagline`, `slug`, `short_description`, `full_description`, `strategic_value_para1`, `strategic_value_para2`, `quote`, `key_benefits`, `deliverables`, `methodology`, `metrics`, `image_path`, `icon`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '01', 'Estratégia & Marketing 360°', 'Transformamos mensagens corporativas complexas em posicionamentos claros e líderes no mercado.', 'marketing-360-estrategia', 'Planeamento de comunicação integrada, posicionamento de marca e estratégias de diferenciação para dominar o mercado.', 'O Marketing 360° da Xamariz conecta todos os pontos de contacto da sua empresa ao seu público-alvo em Angola e no mercado internacional. Desenhamos estratégias integradas que alinham comunicação digital, branding, media e vendas para impulsionar resultados mensuráveis.', 'No mercado angolano e internacional, o verdadeiro sucesso comercial não resulta de ações isoladas, mas sim da construção de um ecossistema de comunicação forte, integrado e coerente. A nossa abordagem de Marketing 360° alinha todos os pontos de contacto da sua marca — desde a consultoria inicial e pesquisa de mercado até à execução nos meios digitais e tradicionais.', 'Ao eliminar a fragmentação na mensagem corporativa, garantimos que a sua empresa transmita autoridade, confiança e diferenciação perante clientes, parceiros e investidores. Desenvolvemos estratégias sob medida que ligam o posicionamento de marca a metas diretas de vendas e retenção.', 'Num mercado dinâmico e ruidoso, atrair clientes exige clareza absoluta, relevância estratégica e consistência em todos os canais.', NULL, '[{\"title\":\"Consultoria Estrat\\u00e9gica 360\\u00b0\",\"desc\":\"Diagn\\u00f3stico profundo de posicionamento, concorr\\u00eancia e identifica\\u00e7\\u00e3o de oportunidades de diferencia\\u00e7\\u00e3o.\"},{\"title\":\"Planos de Comunica\\u00e7\\u00e3o Integrada\",\"desc\":\"Roteiros estrat\\u00e9gicos detalhados com cronogramas, matriz de canais e defini\\u00e7\\u00e3o de KPIs comerciais.\"},{\"title\":\"Pesquisa & Intelig\\u00eancia de Mercado\",\"desc\":\"Estudo comportamental de consumidores e partes interessadas para orientar tomadas de decis\\u00e3o.\"},{\"title\":\"Gest\\u00e3o de Reputa\\u00e7\\u00e3o Corporativa\",\"desc\":\"Estrat\\u00e9gias de blindagem da imagem da empresa perante parceiros, investidores e \\u00f3rg\\u00e3os reguladores.\"},{\"title\":\"Mensagem de Marca & Storytelling\",\"desc\":\"Desenvolvimento de narrativas convincentes que geram liga\\u00e7\\u00e3o emocional e autoridade imediata.\"},{\"title\":\"Otimiza\\u00e7\\u00e3o de ROI & Performance\",\"desc\":\"Acompanhamento rigoroso de dados estrat\\u00e9gicos e relat\\u00f3rios peri\\u00f3dicos de crescimento comercial.\"}]', '[{\"step\":\"01\",\"title\":\"Diagn\\u00f3stico & Imers\\u00e3o\",\"desc\":\"Estudamos profundamente o seu neg\\u00f3cio, concorrentes e p\\u00fablico-alvo para mapear oportunidades reais.\"},{\"step\":\"02\",\"title\":\"Estrat\\u00e9gia & Conceito\",\"desc\":\"Desenvolvemos o plano de a\\u00e7\\u00e3o com metas claras, mensagens de impacto e cronograma de execu\\u00e7\\u00e3o.\"},{\"step\":\"03\",\"title\":\"Produ\\u00e7\\u00e3o & Implementa\\u00e7\\u00e3o\",\"desc\":\"Criamos e lan\\u00e7amos as pe\\u00e7as publicit\\u00e1rias, plataformas web, v\\u00eddeos ou campanhas com excel\\u00eancia.\"},{\"step\":\"04\",\"title\":\"An\\u00e1lise de ROI & Otimiza\\u00e7\\u00e3o\",\"desc\":\"Monitorizamos o desempenho em tempo real, ajustando m\\u00e9tricas para maximizar a convers\\u00e3o.\"}]', '[{\"value\":\"+350%\",\"label\":\"Aumento de Alcance Relevante\"},{\"value\":\"98%\",\"label\":\"Taxa de Reten\\u00e7\\u00e3o de Clientes\"},{\"value\":\"100%\",\"label\":\"Alinhamento com Objetivos de ROI\"}]', 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1800&auto=format&fit=crop&q=80', NULL, 1, 1, '2026-08-18 09:35:44', '2026-08-18 11:26:39'),
(2, '02', 'Publicidade & Branding', 'Criamos marcas fortes e campanhas memoráveis que despertam desejo e atração comercial.', 'publicidade-branding', 'Identidades visuais inesquecíveis, campanhas publicitárias de alto impacto, copywriting persuasivo e ativação de marca.', 'Concebemos identidades visuais marcantes e campanhas publicitárias multimeios que destacam a sua empresa da concorrência. Combinamos direção de arte de ponta, redação publicitária persuasiva e conceitos criativos focados na atração de clientes.', 'Uma marca forte é o ativo mais valioso de uma empresa num mercado altamente competitivo. O nosso serviço de Publicidade & Branding foca-se na criação de identidades visuais de prestígio e narrativas publicitárias convincentes que captam imediatamente a atenção do seu público-alvo.', 'Desde o design de identidade corporativa e manuais de normas gráficas até à concepção de campanhas multimeios de grande escala, esmeramo-nos em transformar a essência do seu negócio num íman de atração de clientes e de valorização no mercado.', 'Uma marca não é apenas um logotipo. É a promessa de valor e o conjunto de emoções que o seu cliente experiencia.', NULL, '[{\"title\":\"Design de Identidade Visual\",\"desc\":\"Logotipos, manuais de normas gr\\u00e1ficas, paletas crom\\u00e1ticas e tipografia corporativa de prest\\u00edgio.\"},{\"title\":\"Campanhas Publicit\\u00e1rias 360\\u00b0\",\"desc\":\"Cria\\u00e7\\u00e3o e produ\\u00e7\\u00e3o de campanhas para imprensa, imprensa digital, outdoors, TV e plataformas digitais.\"},{\"title\":\"Copywriting & Reda\\u00e7\\u00e3o Criativa\",\"desc\":\"Textos persuasivos que captam a aten\\u00e7\\u00e3o imediata e convertem leitores em clientes apaixonados.\"},{\"title\":\"Ativa\\u00e7\\u00e3o & Experi\\u00eancia de Marca\",\"desc\":\"Eventos corporativos, suportes promocionais e conceitos interativos de proximidade com o p\\u00fablico.\"},{\"title\":\"Rebranding & Moderniza\\u00e7\\u00e3o\",\"desc\":\"Revitaliza\\u00e7\\u00e3o estrat\\u00e9gica de marcas consolidadas que pretendem liderar a nova era digital.\"},{\"title\":\"Packaging & Materiais Editoriais\",\"desc\":\"Design de embalagens, brochuras executivas, relat\\u00f3rios anuais e materiais corporativos premium.\"}]', '[{\"step\":\"01\",\"title\":\"Diagn\\u00f3stico & Imers\\u00e3o\",\"desc\":\"Estudamos profundamente o seu neg\\u00f3cio, concorrentes e p\\u00fablico-alvo para mapear oportunidades reais.\"},{\"step\":\"02\",\"title\":\"Estrat\\u00e9gia & Conceito\",\"desc\":\"Desenvolvemos o plano de a\\u00e7\\u00e3o com metas claras, mensagens de impacto e cronograma de execu\\u00e7\\u00e3o.\"},{\"step\":\"03\",\"title\":\"Produ\\u00e7\\u00e3o & Implementa\\u00e7\\u00e3o\",\"desc\":\"Criamos e lan\\u00e7amos as pe\\u00e7as publicit\\u00e1rias, plataformas web, v\\u00eddeos ou campanhas com excel\\u00eancia.\"},{\"step\":\"04\",\"title\":\"An\\u00e1lise de ROI & Otimiza\\u00e7\\u00e3o\",\"desc\":\"Monitorizamos o desempenho em tempo real, ajustando m\\u00e9tricas para maximizar a convers\\u00e3o.\"}]', '[{\"value\":\"5x\",\"label\":\"Maior Memoriza\\u00e7\\u00e3o da Marca\"},{\"value\":\"+220%\",\"label\":\"Engajamento com Campanhas\"},{\"value\":\"100%\",\"label\":\"Design \\u00danico & Original\"}]', 'https://images.unsplash.com/photo-1542744807-2856f69756fb?w=1800&auto=format&fit=crop&q=80', NULL, 2, 1, '2026-08-18 09:35:44', '2026-08-18 11:26:39'),
(3, '03', 'Desenvolvimento Web & SEO', 'Websites institucionais de alto desempenho que posicionam a sua empresa no topo do Google.', 'desenvolvimento-web-seo', 'Websites institucionais de alto nível, plataformas digitais e otimização SEO para atrair potenciais clientes no topo do Google.', 'Construímos soluções web modernas, ultra-rápidas e otimizadas para motores de busca (SEO). O seu website torna-se uma plataforma executiva de vendas 24/7, perfeitamente adaptada a dispositivos móveis e desktops.', 'O seu website institucional é a sede digital e o cartão de visita mais importante da sua empresa no mundo moderno. Projetamos e desenvolvemos plataformas web ultra-rápidas, elegantes e 100% responsivas, construídas rigorosamente de acordo com os mais elevados padrões de UI/UX e segurança.', 'Adicionalmente, implementamos estratégias de SEO (Otimização para Motores de Busca) técnico e de conteúdo para assegurar que a sua empresa conquiste as primeiras posições no Google para as pesquisas mais relevantes do seu setor, gerando tráfego qualificado diariamente.', 'Um website moderno é a sede digital do seu negócio. Deve transmitir confiança imediata e converter visitantes em clientes.', NULL, '[{\"title\":\"Websites Institucionais Premium\",\"desc\":\"Design exclusivo alinhado ao Design System da marca, leve, elegante e de carregamento instant\\u00e2neo.\"},{\"title\":\"Plataformas E-Commerce & Vendas\",\"desc\":\"Lojas online seguras com integra\\u00e7\\u00e3o de pagamentos locais e internacionais.\"},{\"title\":\"Otimiza\\u00e7\\u00e3o SEO T\\u00e9cnico & Local\",\"desc\":\"Posicionamento nas primeiras p\\u00e1ginas do Google para pesquisas estrat\\u00e9gicas do seu setor.\"},{\"title\":\"Landing Pages de Alta Convers\\u00e3o\",\"desc\":\"P\\u00e1ginas focadas na captura de contactos para lan\\u00e7amentos de produtos e servi\\u00e7os.\"},{\"title\":\"Pain\\u00e9is de Gest\\u00e3o & CMS\",\"desc\":\"Sistemas intuitivos que permitem \\u00e0 sua equipa atualizar conte\\u00fados de forma aut\\u00f3noma e segura.\"},{\"title\":\"Manuten\\u00e7\\u00e3o, Seguran\\u00e7a & Hosting\",\"desc\":\"Acompanhamento t\\u00e9cnico cont\\u00ednuo, c\\u00f3pias de seguran\\u00e7a e prote\\u00e7\\u00e3o contra vulnerabilidades.\"}]', '[{\"step\":\"01\",\"title\":\"Diagn\\u00f3stico & Imers\\u00e3o\",\"desc\":\"Estudamos profundamente o seu neg\\u00f3cio, concorrentes e p\\u00fablico-alvo para mapear oportunidades reais.\"},{\"step\":\"02\",\"title\":\"Estrat\\u00e9gia & Conceito\",\"desc\":\"Desenvolvemos o plano de a\\u00e7\\u00e3o com metas claras, mensagens de impacto e cronograma de execu\\u00e7\\u00e3o.\"},{\"step\":\"03\",\"title\":\"Produ\\u00e7\\u00e3o & Implementa\\u00e7\\u00e3o\",\"desc\":\"Criamos e lan\\u00e7amos as pe\\u00e7as publicit\\u00e1rias, plataformas web, v\\u00eddeos ou campanhas com excel\\u00eancia.\"},{\"step\":\"04\",\"title\":\"An\\u00e1lise de ROI & Otimiza\\u00e7\\u00e3o\",\"desc\":\"Monitorizamos o desempenho em tempo real, ajustando m\\u00e9tricas para maximizar a convers\\u00e3o.\"}]', '[{\"value\":\"< 1s\",\"label\":\"Tempo de Carregamento Web\"},{\"value\":\"#1\",\"label\":\"Posi\\u00e7\\u00e3o no Google para Termos-Chave\"},{\"value\":\"100%\",\"label\":\"Mobile Responsive & Seguro\"}]', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1800&auto=format&fit=crop&q=80', NULL, 3, 1, '2026-08-18 09:35:44', '2026-08-18 11:26:39'),
(4, '04', 'Fotografia, Vídeo & Audiovisual', 'Produção cinematográfica e fotografia corporativa para dar vida à essência da sua marca.', 'fotografia-video-audiovisual', 'Vídeo institucional HD, spots publicitários, fotografia corporativa e animação 3D CGI para transmitir a sua mensagem com clareza.', 'A nossa equipa de produção audiovisual captura a força, rigor e paixão da sua empresa através de filmes corporativos, spots publicitários, fotografia executiva e animações 3D CGI com padrão cinematográfico internacional.', 'O conteúdo em vídeo e a fotografia de alta qualidade são os formatos mais eficazes para transmitir confiança, rigor e liderança em segundos. A nossa equipa de produção audiovisual concebe filmes corporativos, spots publicitários e cobertura fotográfica com padrão cinematográfico internacional.', 'Utilizamos equipamentos de última geração, estúdios profissionais, animações 3D CGI e técnicas avançadas de pós-produção para contar a história da sua marca de forma emocionante, impactante e inesquecível para o seu público.', 'O vídeo é a ferramenta mais poderosa para transmitir emoção, autenticidade e liderança em poucos segundos.', NULL, '[{\"title\":\"V\\u00eddeo Institucional Corporativo\",\"desc\":\"Document\\u00e1rios de apresenta\\u00e7\\u00e3o da empresa para investidores, parceiros e grandes clientes.\"},{\"title\":\"Spots Publicit\\u00e1rios TV & Digital\",\"desc\":\"V\\u00eddeos curtos de impacto comercial para campanhas na televis\\u00e3o e plataformas digitais.\"},{\"title\":\"Fotografia Corporativa & Retratos\",\"desc\":\"Sess\\u00f5es fotogr\\u00e1ficas da dire\\u00e7\\u00e3o, instala\\u00e7\\u00f5es, equipamentos e ambiente de trabalho.\"},{\"title\":\"Anima\\u00e7\\u00e3o 3D CGI & Motion Design\",\"desc\":\"Gr\\u00e1ficos animados e simula\\u00e7\\u00f5es 3D para explica\\u00e7\\u00e3o de processos industriais ou produtos.\"},{\"title\":\"Cobertura Audiovisual de Eventos\",\"desc\":\"Capta\\u00e7\\u00e3o fotogr\\u00e1fica e de v\\u00eddeo em congressos, confer\\u00eancias e lan\\u00e7amentos de marcas.\"},{\"title\":\"P\\u00f3s-Produ\\u00e7\\u00e3o & Colora\\u00e7\\u00e3o Profissional\",\"desc\":\"Edi\\u00e7\\u00e3o r\\u00edtmica, sonoplastia, locu\\u00e7\\u00e3o profissional e corre\\u00e7\\u00e3o crom\\u00e1tica avan\\u00e7ada.\"}]', '[{\"step\":\"01\",\"title\":\"Diagn\\u00f3stico & Imers\\u00e3o\",\"desc\":\"Estudamos profundamente o seu neg\\u00f3cio, concorrentes e p\\u00fablico-alvo para mapear oportunidades reais.\"},{\"step\":\"02\",\"title\":\"Estrat\\u00e9gia & Conceito\",\"desc\":\"Desenvolvemos o plano de a\\u00e7\\u00e3o com metas claras, mensagens de impacto e cronograma de execu\\u00e7\\u00e3o.\"},{\"step\":\"03\",\"title\":\"Produ\\u00e7\\u00e3o & Implementa\\u00e7\\u00e3o\",\"desc\":\"Criamos e lan\\u00e7amos as pe\\u00e7as publicit\\u00e1rias, plataformas web, v\\u00eddeos ou campanhas com excel\\u00eancia.\"},{\"step\":\"04\",\"title\":\"An\\u00e1lise de ROI & Otimiza\\u00e7\\u00e3o\",\"desc\":\"Monitorizamos o desempenho em tempo real, ajustando m\\u00e9tricas para maximizar a convers\\u00e3o.\"}]', '[{\"value\":\"4K UltraHD\",\"label\":\"Qualidade Cinematogr\\u00e1fica\"},{\"value\":\"+300%\",\"label\":\"Maior Reten\\u00e7\\u00e3o de V\\u00eddeo\"},{\"value\":\"100%\",\"label\":\"Equipamento Profissional\"}]', 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=1800&auto=format&fit=crop&q=80', NULL, 4, 1, '2026-08-18 09:35:44', '2026-08-18 11:26:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('SupaSCGqDls6gVb7KiA5wtirCIDEmqnZ8WUH6Vxn', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJPWFdjY2Q3bEJjT0gwcXFaY3lvWlRVeG9sb1k4RlpZNDlMT1hLckJIIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC93b3JrXC9leHhwZXJ0cyIsInJvdXRlIjoid29yay5zaG93In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9', 1787068056),
('TXBC1wNPXEElD7a4elGwI8UM7NaVu4SbXvVIjJtV', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiIzQks4UHJlTnpJRTBhYmc3N25rVUhORElVb2NMR1ZuaEpUUDZuM3V2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9jbGllbnRzXC9qdW5pb3ItZmVybmFuZGVzIiwicm91dGUiOiJjbGllbnRzLnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1787066470);

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `site_settings`
--

INSERT INTO `site_settings` (`id`, `key`, `value`, `group`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Xamariz | Agência de Publicidade Angola & Marketing 360°', 'general', '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(2, 'address', 'Rua Francisco Sotto Mayor 18, Bairro Azul, Luanda, Angola', 'general', '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(3, 'phone', '+244 941 561 422', 'general', '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(4, 'email', 'geral@xamariz.ao', 'general', '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(5, 'linkedin', 'https://linkedin.com/company/xamariz', 'general', '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(6, 'instagram', 'https://instagram.com/xamariz.ao', 'general', '2026-08-18 09:35:44', '2026-08-18 09:35:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `department` enum('ceo','direction','specialist') NOT NULL DEFAULT 'specialist',
  `bio` text DEFAULT NULL,
  `quote` text DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `social_linkedin` varchar(255) DEFAULT NULL,
  `social_twitter` varchar(255) DEFAULT NULL,
  `social_instagram` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `slug`, `role`, `department`, `bio`, `quote`, `photo_path`, `social_linkedin`, `social_twitter`, `social_instagram`, `email`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'Yola Neto', 'yola-neto', 'Diretora de Estratégia 360°', 'direction', 'Mestre em Marketing de Performance e planeamento de comunicação integrada.', NULL, 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=800&auto=format&fit=crop&q=80', NULL, NULL, NULL, NULL, 3, 1, '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(4, 'Marcus Okafor', 'marcus-okafor', 'Diretor de Operações (COO)', 'direction', 'Garante a execução impecável de grandes campanhas e gestão de equipas multidisciplinares.', NULL, 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?w=800&auto=format&fit=crop&q=80', NULL, NULL, NULL, NULL, 4, 1, '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(6, 'Eunice Domingos', 'eunice-domingos', 'Lead de Tráfego Pago & Ads', 'specialist', 'Especialista em otimização de conversão e campanhas de anúncios Meta & Google.', NULL, 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=800&auto=format&fit=crop&q=80', NULL, NULL, NULL, NULL, 6, 1, '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(7, 'Tchissola Costa', 'tchissola-costa', 'Diretora de Produção Audiovisual', 'specialist', 'Cineasta encarregue de spots publicitários, vídeos institucionais HD e animações 3D.', NULL, 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=800&auto=format&fit=crop&q=80', NULL, NULL, NULL, NULL, 7, 1, '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(9, 'Nzola Fernandes', 'nzola-fernandes', 'Co-Fundador & Managing Partner', 'direction', 'Especialista em planos de expansão internacional, consultoria e alianças estratégicas.', NULL, 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=800&auto=format&fit=crop&q=80', NULL, NULL, NULL, NULL, 2, 1, '2026-08-18 11:09:33', '2026-08-18 11:09:33'),
(10, 'Kambanja Santos', 'kambanja-santos', 'Diretor Criativo Executivo', 'direction', 'Diretor de arte responsável pela identidade visual e conceito de campanhas de alto impacto.', NULL, 'https://images.unsplash.com/photo-1522529599102-193c0d76b5b6?w=800&auto=format&fit=crop&q=80', NULL, NULL, NULL, NULL, 5, 1, '2026-08-18 11:09:33', '2026-08-18 11:09:33'),
(11, 'Edvaldo Barros', 'edvaldo-barros', 'Head of Web Dev & SEO', 'specialist', 'Arquiteto de sistemas web e especialista em posicionamento no topo dos motores de busca.', NULL, 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=800&auto=format&fit=crop&q=80', NULL, NULL, NULL, NULL, 8, 1, '2026-08-18 11:09:33', '2026-08-18 11:09:33'),
(12, 'Mateus Manuel', 'mateus-manuel', 'CEO & Fundador da Xamariz', 'ceo', 'Com mais de 15 anos de liderança em publicidade, branding e comunicação de grande escala em Angola e na Europa, Mateus Manuel é o arquiteto por trás da filosofia de Marketing 360° da Xamariz.', 'Numa era de constante excesso de ruído, atrair clientes exige comunicar com clareza absoluta, inteligência estratégica e uma coragem criativa que domine o mercado.', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80', 'https://linkedin.com', 'https://x.com', 'https://instagram.com', 'mateus@xamariz.ao', 1, 1, '2026-08-18 11:26:39', '2026-08-18 11:26:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador Xamariz', 'admin@xamariz.ao', 1, NULL, '$2y$12$U4zL2ag7fPN7IERXBjqwJe10p0SbVzXBVD222pBcFDhiSanV9KPNO', NULL, '2026-08-18 09:35:44', '2026-08-18 14:28:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `work_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery`)),
  `video_url` varchar(255) DEFAULT NULL,
  `external_url` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `results_metrics` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`results_metrics`)),
  `is_featured_home` tinyint(1) NOT NULL DEFAULT 0,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `status` enum('draft','published') NOT NULL DEFAULT 'published',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `works`
--

INSERT INTO `works` (`id`, `title`, `slug`, `client_id`, `work_category_id`, `summary`, `description`, `cover_image`, `gallery`, `video_url`, `external_url`, `tagline`, `results_metrics`, `is_featured_home`, `display_order`, `status`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Meet the Exxperts', 'exxperts', 12, 1, 'Formato de conteúdos que transformou conhecimento técnico em comunicação humanizada.', 'A campanha Meet the Exxperts foi concebida para aproximar a liderança técnica da ExxonMobil das comunidades locais e dos parceiros institucionais em Angola. Através de vídeos em formato de entrevista editorial, artigos ilustrados e campanhas em redes sociais, convertemos dados complexos de engenharia em narrativas inspiradoras e acessíveis.', 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=900&auto=format&fit=crop&q=80', NULL, NULL, NULL, NULL, '[\"Alcance de +500.000 pessoas no LinkedIn & plataformas digitais.\",\"Aumento de 40% na perce\\u00e7\\u00e3o positiva da marca empregadora.\",\"Produ\\u00e7\\u00e3o integral de 12 epis\\u00f3dios audiovisuais HD.\"]', 1, 1, 'published', NULL, NULL, '2026-08-18 09:35:44', '2026-08-18 11:26:39'),
(2, 'Building Futures', 'building-futures', 13, 2, 'Publicação ilustrada que aproxima comunidades locais da cadeia de valor do setor energético.', 'Uma estratégia de branding e comunicação comunitária desenvolvida para a Tullow Oil. O projeto uniu ilustração de alta qualidade, relatórios institucionais e ativação no terreno para demonstrar o investimento sustentável em educação e saúde.', 'https://images.unsplash.com/photo-1590859808308-3d2d9c515b1a?w=700&auto=format&fit=crop&q=80', NULL, NULL, NULL, NULL, '[\"Distribui\\u00e7\\u00e3o de 15.000 edi\\u00e7\\u00f5es impressas nas comunidades.\",\"Reconhecimento em f\\u00f3runs internacionais de responsabilidade social.\"]', 1, 2, 'published', NULL, NULL, '2026-08-18 09:35:44', '2026-08-18 11:26:39'),
(3, 'Carbon Capture and Storage', 'perenco-ccs', 14, 1, 'Campanha anual sobre projetos de sustentabilidade e captura de carbono.', 'Desenvolvimento de uma estratégia de posicionamento 360° focada nos avanços da Perenco em tecnologias de descarbonização e responsabilidade ambiental.', 'https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?w=700&auto=format&fit=crop&q=80', NULL, NULL, NULL, NULL, '[\"Apresentado na confer\\u00eancia anual de energia de Luanda.\"]', 1, 3, 'published', NULL, NULL, '2026-08-18 09:35:44', '2026-08-18 11:26:39'),
(4, 'Exxtend Advanced Recycling', 'exxtend', 12, 2, 'Reciclagem avançada transformada numa narrativa de economia circular.', 'Conceção da identidade visual e narrativa de comunicação para a iniciativa de reciclagem de polímeros avançados da ExxonMobil.', 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?w=700&auto=format&fit=crop&q=80', NULL, NULL, NULL, NULL, '[\"Cria\\u00e7\\u00e3o de ecossistema digital de comunica\\u00e7\\u00e3o sustent\\u00e1vel.\"]', 1, 4, 'published', NULL, NULL, '2026-08-18 09:35:44', '2026-08-18 11:26:39'),
(5, 'Ksi Lisims LNG', 'ksi-lisims-lng', 15, 4, 'Animação 3D de alta fidelidade para projeto de gás natural flutuante.', 'Produção de vídeo CGI 3D e animações hiper-realistas para demonstrar o funcionamento e os rigorosos padrões ambientais do projeto Ksi Lisims LNG.', 'https://images.unsplash.com/photo-1504593811423-6dd665756598?w=700&auto=format&fit=crop&q=80', NULL, NULL, NULL, NULL, '[\"Anima\\u00e7\\u00e3o 3D exibida para investidores e reguladores globais.\"]', 1, 5, 'published', NULL, NULL, '2026-08-18 09:35:44', '2026-08-18 11:26:39'),
(6, 'Plataforma Web & SEO 360°', 'xamariz-web-portal', 18, 3, 'Desenvolvimento de portal institucional ultra-rápido otimizado para motores de busca.', 'Plataforma web de última geração focada em alta performance, animações fluidas e posicionamento de topo nos motores de busca.', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=700&auto=format&fit=crop&q=80', NULL, NULL, NULL, NULL, '[\"Pontua\\u00e7\\u00e3o 100\\/100 no Google PageSpeed.\",\"Taxa de convers\\u00e3o de leads aumentada em 3x.\"]', 0, 6, 'published', NULL, NULL, '2026-08-18 09:35:44', '2026-08-18 11:26:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `work_categories`
--

CREATE TABLE `work_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `filter_key` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `work_categories`
--

INSERT INTO `work_categories` (`id`, `name`, `slug`, `filter_key`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Marketing 360°', 'marketing-360', 'marketing', 1, '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(2, 'Branding & Design', 'branding-design', 'branding', 2, '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(3, 'Web & SEO', 'web-seo', 'web', 3, '2026-08-18 09:35:44', '2026-08-18 09:35:44'),
(4, 'Audiovisual', 'audiovisual', 'audiovisual', 4, '2026-08-18 09:35:44', '2026-08-18 09:35:44');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Índices para tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Índices para tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_slug_unique` (`slug`);

--
-- Índices para tabela `contact_leads`
--
ALTER TABLE `contact_leads`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Índices para tabela `hero_slides`
--
ALTER TABLE `hero_slides`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices para tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_author_id_foreign` (`author_id`);

--
-- Índices para tabela `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices para tabela `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_settings_key_unique` (`key`);

--
-- Índices para tabela `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_members_slug_unique` (`slug`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices para tabela `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `works_slug_unique` (`slug`),
  ADD KEY `works_client_id_foreign` (`client_id`),
  ADD KEY `works_work_category_id_foreign` (`work_category_id`);

--
-- Índices para tabela `work_categories`
--
ALTER TABLE `work_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `work_categories_slug_unique` (`slug`),
  ADD UNIQUE KEY `work_categories_filter_key_unique` (`filter_key`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `contact_leads`
--
ALTER TABLE `contact_leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `hero_slides`
--
ALTER TABLE `hero_slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `work_categories`
--
ALTER TABLE `work_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `team_members` (`id`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `works_work_category_id_foreign` FOREIGN KEY (`work_category_id`) REFERENCES `work_categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
