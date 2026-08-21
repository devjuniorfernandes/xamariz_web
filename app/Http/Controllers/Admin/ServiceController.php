<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('display_order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number_code' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:500',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'strategic_value_para1' => 'nullable|string',
            'strategic_value_para2' => 'nullable|string',
            'quote' => 'nullable|string',
            'deliverables' => 'nullable|array',
            'methodology' => 'nullable|array',
            'metrics' => 'nullable|array',
            'image_path' => 'nullable|file|mimes:svg,png,webp,jpg,jpeg|max:5120',
            'image_url' => 'nullable|string',
            'display_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($request->title);

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('services', 'public');
            $validated['image_path'] = Storage::url($path);
        } elseif ($request->filled('image_url')) {
            $validated['image_path'] = $request->image_url;
        }

        $validated['is_active'] = $request->boolean('is_active', true);

        // Filter empty items in deliverables, methodology, metrics arrays
        if ($request->has('deliverables') && is_array($request->deliverables)) {
            $validated['deliverables'] = array_values(array_filter($request->deliverables, fn($item) => !empty($item['title'])));
        }
        if ($request->has('methodology') && is_array($request->methodology)) {
            $validated['methodology'] = array_values(array_filter($request->methodology, fn($item) => !empty($item['title'])));
        }
        if ($request->has('metrics') && is_array($request->metrics)) {
            $validated['metrics'] = array_values(array_filter($request->metrics, fn($item) => !empty($item['value'])));
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Serviço criado com sucesso.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'number_code' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:500',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'strategic_value_para1' => 'nullable|string',
            'strategic_value_para2' => 'nullable|string',
            'quote' => 'nullable|string',
            'deliverables' => 'nullable|array',
            'methodology' => 'nullable|array',
            'metrics' => 'nullable|array',
            'image_path' => 'nullable|file|mimes:svg,png,webp,jpg,jpeg|max:5120',
            'image_url' => 'nullable|string',
            'display_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        if ($request->title !== $service->title) {
            $validated['slug'] = Str::slug($request->title);
        }

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('services', 'public');
            $validated['image_path'] = Storage::url($path);
        } elseif ($request->filled('image_url')) {
            $validated['image_path'] = $request->image_url;
        }

        $validated['is_active'] = $request->boolean('is_active');

        // Filter empty items in deliverables, methodology, metrics arrays
        if ($request->has('deliverables') && is_array($request->deliverables)) {
            $validated['deliverables'] = array_values(array_filter($request->deliverables, fn($item) => !empty($item['title'])));
        } else {
            $validated['deliverables'] = [];
        }

        if ($request->has('methodology') && is_array($request->methodology)) {
            $validated['methodology'] = array_values(array_filter($request->methodology, fn($item) => !empty($item['title'])));
        } else {
            $validated['methodology'] = [];
        }

        if ($request->has('metrics') && is_array($request->metrics)) {
            $validated['metrics'] = array_values(array_filter($request->metrics, fn($item) => !empty($item['value'])));
        } else {
            $validated['metrics'] = [];
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Serviço atualizado com sucesso.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Serviço eliminado com sucesso.');
    }
}
