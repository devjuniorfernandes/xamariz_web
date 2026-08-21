<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Models\Client;
use App\Models\TeamMember;
use App\Models\Service;
use App\Models\Post;
use App\Models\ContactLead;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'works_count' => Work::count(),
            'clients_count' => Client::count(),
            'team_count' => TeamMember::count(),
            'posts_count' => Post::count(),
            'leads_count' => ContactLead::where('status', 'new')->count(),
            'services_count' => Service::count(),
        ];

        $recentWorks = Work::with(['client', 'category'])->latest()->take(5)->get();
        $recentLeads = ContactLead::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentWorks', 'recentLeads'));
    }
}
