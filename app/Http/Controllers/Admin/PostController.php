<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author')->latest()->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $authors = TeamMember::orderBy('name')->get();
        return view('admin.posts.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
            'cover_image' => 'nullable|file|mimes:svg,png,webp,jpg,jpeg|max:5120',
            'cover_url' => 'nullable|string',
            'author_id' => 'nullable|exists:team_members,id',
            'published_at' => 'nullable|date',
            'status' => 'required|in:draft,published',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($request->title);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('posts', 'public');
            $validated['cover_image'] = Storage::url($path);
        } elseif ($request->filled('cover_url')) {
            $validated['cover_image'] = $request->cover_url;
        }

        if (!$request->filled('published_at') && $request->status === 'published') {
            $validated['published_at'] = now();
        }

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Artigo de Insight criado com sucesso.');
    }

    public function edit(Post $post)
    {
        $authors = TeamMember::orderBy('name')->get();
        return view('admin.posts.edit', compact('post', 'authors'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
            'cover_image' => 'nullable|file|mimes:svg,png,webp,jpg,jpeg|max:5120',
            'cover_url' => 'nullable|string',
            'author_id' => 'nullable|exists:team_members,id',
            'published_at' => 'nullable|date',
            'status' => 'required|in:draft,published',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        if ($request->title !== $post->title) {
            $validated['slug'] = Str::slug($request->title);
        }

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('posts', 'public');
            $validated['cover_image'] = Storage::url($path);
        } elseif ($request->filled('cover_url')) {
            $validated['cover_image'] = $request->cover_url;
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Artigo de Insight atualizado com sucesso.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Artigo eliminado com sucesso.');
    }
}
