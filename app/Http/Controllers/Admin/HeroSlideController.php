<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;

class HeroSlideController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::orderBy('display_order')->get();
        return view('admin.hero_slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.hero_slides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'video_path' => 'required|string|max:255',
            'poster_image' => 'nullable|string|max:255',
            'display_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        HeroSlide::create($validated);

        return redirect()->route('admin.hero-slides.index')->with('success', 'Slide de Vídeo criado com sucesso.');
    }

    public function edit(HeroSlide $heroSlide)
    {
        return view('admin.hero_slides.edit', compact('heroSlide'));
    }

    public function update(Request $request, HeroSlide $heroSlide)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'video_path' => 'required|string|max:255',
            'poster_image' => 'nullable|string|max:255',
            'display_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $heroSlide->update($validated);

        return redirect()->route('admin.hero-slides.index')->with('success', 'Slide de Vídeo atualizado com sucesso.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        $heroSlide->delete();
        return redirect()->route('admin.hero-slides.index')->with('success', 'Slide eliminado com sucesso.');
    }
}
