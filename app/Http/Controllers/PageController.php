<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Client;
use App\Models\WorkCategory;
use App\Models\TeamMember;
use App\Models\Service;
use App\Models\Post;
use App\Models\HeroSlide;
use App\Models\ContactLead;

class PageController extends Controller
{
    public function home()
    {
        $heroSlides = HeroSlide::where('is_active', true)->orderBy('display_order')->get();
        $featuredWorks = Work::with(['client', 'category'])
            ->where('status', 'published')
            ->where('is_featured_home', true)
            ->orderBy('display_order')
            ->take(5)
            ->get();
        
        $servicesList = Service::where('is_active', true)->orderBy('display_order')->take(5)->get();
        $brandLogos = Client::where('show_in_marquee', true)->orderBy('display_order')->get();
        $teamMembers = TeamMember::where('is_active', true)->orderBy('display_order')->take(4)->get();
        $latestInsights = Post::where('status', 'published')->latest('published_at')->take(3)->get();

        return view('home', compact('heroSlides', 'featuredWorks', 'servicesList', 'brandLogos', 'teamMembers', 'latestInsights'));
    }

    public function workIndex()
    {
        $works = Work::with(['client', 'category'])
            ->where('status', 'published')
            ->orderBy('display_order')
            ->get();
        
        $categories = WorkCategory::orderBy('display_order')->get();

        return view('work.index', compact('works', 'categories'));
    }

    public function workShow(string $slug)
    {
        $work = Work::with(['client', 'category'])->where('slug', $slug)->first();
        if (!$work) {
            // Fallback for statically declared slugs if DB not seeded yet
            return view('work.show', ['slug' => $slug]);
        }

        $relatedWorks = Work::with(['client', 'category'])
            ->where('id', '!=', $work->id)
            ->where('status', 'published')
            ->take(3)
            ->get();

        return view('work.show', compact('work', 'relatedWorks', 'slug'));
    }

    public function teamIndex()
    {
        $ceoMember = TeamMember::where('department', 'ceo')->where('is_active', true)->first();
        $teamMembers = TeamMember::where('is_active', true)
            ->where('department', '!=', 'ceo')
            ->orderBy('display_order')
            ->get();

        return view('team.index', compact('ceoMember', 'teamMembers'));
    }

    public function clientsIndex()
    {
        $clients = Client::withCount('works')->orderBy('display_order')->get();
        return view('clients.index', compact('clients'));
    }

    public function clientsShow(string $slug)
    {
        $client = Client::with('works')->where('slug', $slug)->first();
        if (!$client) {
            return view('clients.show', ['slug' => $slug]);
        }
        return view('clients.show', compact('client', 'slug'));
    }

    public function servicesIndex()
    {
        $servicesList = Service::where('is_active', true)->orderBy('display_order')->get();
        return view('services.index', compact('servicesList'));
    }

    public function servicesShow(string $slug)
    {
        $service = Service::where('slug', $slug)->first();
        $allServices = Service::where('is_active', true)->orderBy('display_order')->get();
        return view('services.show', compact('service', 'slug', 'allServices'));
    }

    public function about()
    {
        $teamMembers = TeamMember::where('is_active', true)->orderBy('display_order')->take(8)->get();
        return view('about', compact('teamMembers'));
    }

    public function insightsIndex()
    {
        $insights = Post::where('status', 'published')->latest('published_at')->get();
        return view('insights.index', compact('insights'));
    }

    public function insightsShow(string $slug)
    {
        $insight = Post::with('author')->where('slug', $slug)->first();
        return view('insights.show', compact('insight', 'slug'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|max:255',
            'company'    => 'nullable|string|max:255',
            'message'    => 'nullable|string|max:5000',
            'sectors'    => 'nullable|array',
        ]);

        ContactLead::create([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'email'      => $validated['email'],
            'company'    => $validated['company'] ?? null,
            'message'    => $validated['message'] ?? null,
            'sectors'    => $validated['sectors'] ?? [],
            'status'     => 'new',
        ]);

        // Pedidos AJAX (ex.: landing /energy) recebem JSON; validação falhada devolve 422 automaticamente.
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => __('contact.success_message'),
            ]);
        }

        return redirect()->route('contact')->with('success', __('contact.success_message'));
    }

    public function privacy()
    {
        return view('legal.privacy');
    }

    public function cookies()
    {
        return view('legal.cookies');
    }

    public function oilandgas()
    {
        // Aplica os overrides multilingues do CMS sobre as traduções da landing.
        \App\Support\LandingContent::apply();

        // Landing page autónoma (layout dedicado). Os logos dos clientes
        // são uma lista fixa e específica de marcas, definida na própria view.
        // Os artigos da secção "Como pensamos" vêm do site principal (Posts publicados).
        $insights = Post::where('status', 'published')->latest('published_at')->take(4)->get();

        return view('landing.oilandgas', compact('insights'));
    }

    public function sitemap()
    {
        $works = Work::where('status', 'published')->get();
        $services = Service::where('is_active', true)->get();
        $clients = Client::all();
        $insights = Post::where('status', 'published')->get();

        $xml = view('sitemap', compact('works', 'services', 'clients', 'insights'))->render();

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}
