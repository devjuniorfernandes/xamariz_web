<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkCategoryController extends Controller
{
    public function index()
    {
        $categories = WorkCategory::withCount('works')->orderBy('display_order')->get();
        return view('admin.work_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.work_categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'filter_key' => 'required|string|max:50|unique:work_categories,filter_key',
            'display_order' => 'integer',
        ]);

        $validated['slug'] = Str::slug($request->name);

        WorkCategory::create($validated);

        return redirect()->route('admin.work-categories.index')->with('success', 'Filtro criado com sucesso.');
    }

    public function edit(WorkCategory $workCategory)
    {
        return view('admin.work_categories.edit', compact('workCategory'));
    }

    public function update(Request $request, WorkCategory $workCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'filter_key' => 'required|string|max:50|unique:work_categories,filter_key,' . $workCategory->id,
            'display_order' => 'integer',
        ]);

        if ($request->name !== $workCategory->name) {
            $validated['slug'] = Str::slug($request->name);
        }

        $workCategory->update($validated);

        return redirect()->route('admin.work-categories.index')->with('success', 'Filtro atualizado com sucesso.');
    }

    public function destroy(WorkCategory $workCategory)
    {
        $workCategory->delete();
        return redirect()->route('admin.work-categories.index')->with('success', 'Filtro eliminado com sucesso.');
    }
}
