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

// ─── Public Routes ─────────────────────────────
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/work', [PageController::class, 'workIndex'])->name('work.index');
Route::get('/work/{slug}', [PageController::class, 'workShow'])->name('work.show');
Route::get('/team', [PageController::class, 'teamIndex'])->name('team.index');
Route::get('/clients', [PageController::class, 'clientsIndex'])->name('clients.index');
Route::get('/clients/{slug}', [PageController::class, 'clientsShow'])->name('clients.show');
Route::get('/services', [PageController::class, 'servicesIndex'])->name('services.index');
Route::get('/services/{slug}', [PageController::class, 'servicesShow'])->name('services.show');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/insights', [PageController::class, 'insightsIndex'])->name('insights.index');
Route::get('/insights/{slug}', [PageController::class, 'insightsShow'])->name('insights.show');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/cookies', [PageController::class, 'cookies'])->name('cookies');
Route::get('/oilandgas', [PageController::class, 'oilandgas'])->name('landing.oilandgas');
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');

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

    Route::get('/settings', [SiteSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SiteSettingController::class, 'update'])->name('settings.update');
});
