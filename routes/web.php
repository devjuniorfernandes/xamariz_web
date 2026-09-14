<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\WorkCategoryController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ContactLeadController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\LocaleController;

// ─── Locale Switcher ───────────────────────────
Route::get('/locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

// ─── Public Routes ─────────────────────────────
// Slugs alinhados com o sitemap SEO legado (xamariz.ao) para preservar a
// autoridade de domínio. Ver Xamariz_SEO_Sitemap_Migration_Master.
Route::get('/', [PageController::class, 'home'])->name('home');

// Institucional
Route::get('/quem-somos', [PageController::class, 'about'])->name('about');
Route::get('/quem-somos/equipa', [PageController::class, 'teamIndex'])->name('team.index');
Route::get('/quem-somos/clientes', [PageController::class, 'clientsIndex'])->name('clients.index');

// Serviços  (/servicos/)
Route::get('/servicos', [PageController::class, 'servicesIndex'])->name('services.index');
Route::get('/servicos/{slug}', [PageController::class, 'servicesShow'])->name('services.show');

// Portfólio  (/portfolio/) — a página individual foi anulada (só lightbox da imagem).
// URLs antigas de projeto redirecionam para a listagem (preserva SEO, evita 404).
Route::get('/portfolio', [PageController::class, 'workIndex'])->name('work.index');
Route::get('/portfolio/{slug}', fn (string $slug) => redirect()->route('work.index', [], 301));
Route::get('/clients/{slug}', [PageController::class, 'clientsShow'])->name('clients.show');

// Blog  (/blog/{categoria}/{slug}/)
Route::get('/blog', [PageController::class, 'insightsIndex'])->name('insights.index');
Route::get('/blog/{category}/{slug}', [PageController::class, 'insightsShow'])->name('insights.show');

// Contactos  (/contactos/)
Route::get('/contactos', [PageController::class, 'contact'])->name('contact');
Route::post('/contactos', [PageController::class, 'contactSubmit'])->name('contact.submit');

// Páginas SEO /marketing (landing pages críticas — não colapsar em /servicos)
Route::get('/marketing/marketing-digital', [PageController::class, 'marketingDigital'])->name('marketing.digital');
Route::get('/marketing/seo-search-engine-optimization', [PageController::class, 'marketingSeo'])->name('marketing.seo');
Route::get('/marketing/marketing-de-diferenciacao', [PageController::class, 'marketingDiferenciacao'])->name('marketing.diferenciacao');
Route::get('/marketing-de-conteudo', [PageController::class, 'marketingConteudo'])->name('marketing.conteudo');

// Versão inglesa (estrutura /en/ do sitemap)
Route::get('/en', [PageController::class, 'homeEn'])->name('home.en');
Route::get('/en/contacts', [PageController::class, 'contactEn'])->name('contact.en');

Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/cookies', [PageController::class, 'cookies'])->name('cookies');
Route::get('/energy', [PageController::class, 'oilandgas'])->name('landing.oilandgas');
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');

// ─── Redirects 301 (preservar URLs antigas → novas) ─────────────
// Slugs anteriores da app Laravel
Route::redirect('/servico', '/servicos', 301);
Route::get('/servico/{slug}', fn (string $slug) => redirect('/servicos/' . $slug, 301));
Route::redirect('/services', '/servicos', 301);
Route::get('/services/{slug}', fn (string $slug) => redirect('/servicos/' . $slug, 301));
Route::redirect('/work', '/portfolio', 301);
Route::get('/work/{slug}', fn (string $slug) => redirect()->route('work.index', [], 301));
Route::redirect('/insights', '/blog', 301);
Route::get('/insights/{slug}', function (string $slug) {
    $post = \App\Models\Post::where('slug', $slug)->first();
    // Respeita a estrutura de URL de cada artigo (raiz vs categorizado).
    $target = $post ? $post->url : url('/blog/geral/' . $slug);
    return redirect($target, 301);
});
Route::redirect('/contact', '/contactos', 301);

// Clientes e Equipa foram consolidados na página "Quem Somos".
Route::redirect('/clients', '/quem-somos/clientes', 301);
Route::redirect('/team', '/quem-somos/equipa', 301);
Route::redirect('/about', '/quem-somos', 301);

// Redirect histórico já existente no domínio (folha "Redirects" do sitemap)
Route::redirect('/marketing-digital', '/marketing/marketing-digital', 301);

Route::redirect('/oilandgas', '/energy', 301);

// ─── Admin Auth Routes ─────────────────────────
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// ─── Admin Protected Routes ────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('works', WorkController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('work-categories', WorkCategoryController::class);
    Route::resource('team-members', TeamMemberController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('posts', PostController::class);
    Route::resource('contact-leads', ContactLeadController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::resource('hero-slides', HeroSlideController::class);

    Route::get('/pages', [PageContentController::class, 'index'])->name('pages.index');
    Route::post('/pages', [PageContentController::class, 'update'])->name('pages.update');

    Route::get('/landing', [\App\Http\Controllers\Admin\LandingContentController::class, 'index'])->name('landing.index');
    Route::post('/landing', [\App\Http\Controllers\Admin\LandingContentController::class, 'update'])->name('landing.update');

    Route::get('/settings', [SiteSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SiteSettingController::class, 'update'])->name('settings.update');
});

// ─── Catch-all: artigos de blog com URL de raiz (/{slug}/) ──────
// DEVE ficar por último. Só resolve posts root_level publicados; caso
// contrário devolve 404. Como é registado depois de todas as rotas
// estáticas, nunca as sombreia.
Route::get('/{slug}', [PageController::class, 'insightsRoot'])
    ->where('slug', '[a-z0-9]+(?:-[a-z0-9]+)*')
    ->name('insights.root');
