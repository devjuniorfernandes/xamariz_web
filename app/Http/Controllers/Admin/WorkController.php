<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Models\Client;
use App\Models\WorkCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function index(Request $request)
    {
        $query = Work::with(['client', 'category']);

        if ($request->filled('category')) {
            $query->where('work_category_id', $request->category);
        }

        if ($request->filled('client')) {
            $query->where('client_id', $request->client);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $works = $query->orderBy('display_order', 'asc')->latest()->paginate(15);
        $clients = Client::orderBy('name')->get();
        $categories = WorkCategory::orderBy('display_order')->get();

        return view('admin.works.index', compact('works', 'clients', 'categories'));
    }

    public function create()
    {
        $clients = Client::orderBy('name')->get();
        $categories = WorkCategory::orderBy('display_order')->get();
        return view('admin.works.create', compact('clients', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client_id' => 'nullable|exists:clients,id',
            'work_category_id' => 'nullable|exists:work_categories,id',
            'tagline' => 'nullable|string|max:500',
            'summary' => 'nullable|string',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|file|mimes:svg,png,webp,jpg,jpeg|max:5120',
            'cover_url' => 'nullable|string',
            'video_url' => 'nullable|string',
            'external_url' => 'nullable|string|url',
            'gallery' => 'nullable|array',
            'is_featured_home' => 'boolean',
            'display_order' => 'integer',
            'status' => 'nullable|in:draft,published',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        // Obrigatórios: apenas o nome (title) e uma imagem — capa (URL/upload) OU galeria.
        $hasCover = $request->hasFile('cover_image') || $request->filled('cover_url');
        $hasGallery = collect($request->input('gallery', []))->contains(fn ($i) => !empty($i['url']));
        if (! $hasCover && ! $hasGallery) {
            return back()->withInput()->withErrors([
                'cover_image' => 'Adicione uma imagem de capa (URL ou upload) ou pelo menos uma imagem na galeria.',
            ]);
        }

        $validated['status'] = $validated['status'] ?? 'published';

        $validated['slug'] = Str::slug($request->title);
        $count = Work::where('slug', 'like', $validated['slug'] . '%')->count();
        if ($count > 0) {
            $validated['slug'] .= '-' . ($count + 1);
        }

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('works', 'public');
            $validated['cover_image'] = Storage::url($path);
        } elseif ($request->filled('cover_url')) {
            $validated['cover_image'] = $request->cover_url;
        }

        $validated['is_featured_home'] = $request->boolean('is_featured_home');
        
        // Format gallery items
        if ($request->has('gallery') && is_array($request->gallery)) {
            $galleryItems = [];
            foreach ($request->gallery as $item) {
                if (!empty($item['url'])) {
                    $galleryItems[] = [
                        'url' => $item['url'],
                        'size' => $item['size'] ?? 'full',
                        'caption' => $item['caption'] ?? '',
                    ];
                }
            }
            $validated['gallery'] = $galleryItems;
        }

        Work::create($validated);

        return redirect()->route('admin.works.index')->with('success', 'Projeto criado com sucesso.');
    }

    public function edit(Work $work)
    {
        $clients = Client::orderBy('name')->get();
        $categories = WorkCategory::orderBy('display_order')->get();
        return view('admin.works.edit', compact('work', 'clients', 'categories'));
    }

    public function update(Request $request, Work $work)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client_id' => 'nullable|exists:clients,id',
            'work_category_id' => 'nullable|exists:work_categories,id',
            'tagline' => 'nullable|string|max:500',
            'summary' => 'nullable|string',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|file|mimes:svg,png,webp,jpg,jpeg|max:5120',
            'cover_url' => 'nullable|string',
            'video_url' => 'nullable|string',
            'external_url' => 'nullable|string',
            'gallery' => 'nullable|array',
            'is_featured_home' => 'boolean',
            'display_order' => 'integer',
            'status' => 'nullable|in:draft,published',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        // Obrigatórios: apenas o nome (title) e uma imagem — capa (URL/upload/existente) OU galeria.
        $hasCover = $request->hasFile('cover_image') || $request->filled('cover_url') || ! empty($work->cover_image);
        $hasGallery = collect($request->input('gallery', []))->contains(fn ($i) => !empty($i['url']));
        if (! $hasCover && ! $hasGallery) {
            return back()->withInput()->withErrors([
                'cover_image' => 'Adicione uma imagem de capa (URL ou upload) ou pelo menos uma imagem na galeria.',
            ]);
        }

        $validated['status'] = $validated['status'] ?? $work->status ?? 'published';

        if ($request->title !== $work->title) {
            $validated['slug'] = Str::slug($request->title);
        }

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('works', 'public');
            $validated['cover_image'] = Storage::url($path);
        } elseif ($request->filled('cover_url')) {
            $validated['cover_image'] = $request->cover_url;
        }

        $validated['is_featured_home'] = $request->boolean('is_featured_home');

        // Format gallery items
        if ($request->has('gallery') && is_array($request->gallery)) {
            $galleryItems = [];
            foreach ($request->gallery as $item) {
                if (!empty($item['url'])) {
                    $galleryItems[] = [
                        'url' => $item['url'],
                        'size' => $item['size'] ?? 'full',
                        'caption' => $item['caption'] ?? '',
                    ];
                }
            }
            $validated['gallery'] = $galleryItems;
        } else {
            $validated['gallery'] = [];
        }

        $work->update($validated);

        return redirect()->route('admin.works.index')->with('success', 'Projeto atualizado com sucesso.');
    }

    public function destroy(Work $work)
    {
        $work->delete();
        return redirect()->route('admin.works.index')->with('success', 'Projeto eliminado com sucesso.');
    }
}
