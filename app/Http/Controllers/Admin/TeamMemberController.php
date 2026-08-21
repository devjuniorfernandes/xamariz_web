<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $team = TeamMember::orderBy('display_order')->get();
        return view('admin.team_members.index', compact('team'));
    }

    public function create()
    {
        return view('admin.team_members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'department' => 'required|in:ceo,direction,specialist',
            'bio' => 'nullable|string',
            'quote' => 'nullable|string',
            'photo_path' => 'nullable|file|mimes:svg,png,webp,jpg,jpeg|max:5120',
            'photo_url' => 'nullable|string',
            'social_linkedin' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'email' => 'nullable|email',
            'display_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($request->name);

        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('team', 'public');
            $validated['photo_path'] = Storage::url($path);
        } elseif ($request->filled('photo_url')) {
            $validated['photo_path'] = $request->photo_url;
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        TeamMember::create($validated);

        return redirect()->route('admin.team-members.index')->with('success', 'Membro da equipa criado com sucesso.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team_members.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'department' => 'required|in:ceo,direction,specialist',
            'bio' => 'nullable|string',
            'quote' => 'nullable|string',
            'photo_path' => 'nullable|file|mimes:svg,png,webp,jpg,jpeg|max:5120',
            'photo_url' => 'nullable|string',
            'social_linkedin' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'email' => 'nullable|email',
            'display_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        if ($request->name !== $teamMember->name) {
            $validated['slug'] = Str::slug($request->name);
        }

        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('team', 'public');
            $validated['photo_path'] = Storage::url($path);
        } elseif ($request->filled('photo_url')) {
            $validated['photo_path'] = $request->photo_url;
        }

        $validated['is_active'] = $request->boolean('is_active');

        $teamMember->update($validated);

        return redirect()->route('admin.team-members.index')->with('success', 'Membro da equipa atualizado com sucesso.');
    }

    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();
        return redirect()->route('admin.team-members.index')->with('success', 'Membro eliminado com sucesso.');
    }
}
