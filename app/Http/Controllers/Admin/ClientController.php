<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::withCount('works')->orderBy('display_order')->get();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function reorder(Request $request)
    {
        $validated = $request->validate([
            'client_ids' => ['required', 'array'],
            'client_ids.*' => ['integer', 'exists:clients,id'],
        ]);

        foreach ($validated['client_ids'] as $position => $clientId) {
            Client::whereKey($clientId)->update(['display_order' => $position + 1]);
        }

        return response()->json(['success' => true]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sector' => 'nullable|string|max:255',
            'headline' => 'nullable|string|max:500',
            'website_url' => 'nullable|url|max:255',
            'logo_path' => 'nullable|file|mimes:svg,png,webp,jpg,jpeg|max:5120',
            'logo_url' => 'nullable|string',
            'description' => 'nullable|string',
            'services_provided' => 'nullable|string|max:500',
            'testimonial_text' => 'nullable|string',
            'testimonial_author' => 'nullable|string',
            'testimonial_role' => 'nullable|string',
            'show_in_marquee' => 'boolean',
            'display_order' => 'integer',
        ]);

        $validated['slug'] = Str::slug($request->name);

        if ($request->hasFile('logo_path')) {
            $path = $request->file('logo_path')->store('clients', 'public');
            $validated['logo_path'] = Storage::url($path);
        } elseif ($request->filled('logo_url')) {
            $validated['logo_path'] = $request->logo_url;
        }

        $validated['show_in_marquee'] = $request->boolean('show_in_marquee');

        Client::create($validated);

        return redirect()->route('admin.clients.index')->with('success', 'Cliente criado com sucesso.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sector' => 'nullable|string|max:255',
            'headline' => 'nullable|string|max:500',
            'website_url' => 'nullable|url|max:255',
            'logo_path' => 'nullable|file|mimes:svg,png,webp,jpg,jpeg|max:5120',
            'logo_url' => 'nullable|string',
            'description' => 'nullable|string',
            'services_provided' => 'nullable|string|max:500',
            'testimonial_text' => 'nullable|string',
            'testimonial_author' => 'nullable|string',
            'testimonial_role' => 'nullable|string',
            'show_in_marquee' => 'boolean',
            'display_order' => 'integer',
        ]);

        if ($request->name !== $client->name) {
            $validated['slug'] = Str::slug($request->name);
        }

        if ($request->hasFile('logo_path')) {
            $path = $request->file('logo_path')->store('clients', 'public');
            $validated['logo_path'] = Storage::url($path);
        } elseif ($request->filled('logo_url')) {
            $validated['logo_path'] = $request->logo_url;
        }

        $validated['show_in_marquee'] = $request->boolean('show_in_marquee');

        $client->update($validated);

        return redirect()->route('admin.clients.index')->with('success', 'Cliente atualizado com sucesso.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Cliente eliminado com sucesso.');
    }
}
