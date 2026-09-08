<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageContentController extends Controller
{
    /**
     * Editor de conteúdos organizado por página (uma aba por página).
     */
    public function index()
    {
        $pages    = config('page_content');
        $settings = SiteSetting::all()->pluck('value', 'key');

        return view('admin.pages.index', compact('pages', 'settings'));
    }

    /**
     * Gravar o conteúdo submetido, validado contra o esquema em config/page_content.php.
     * Só chaves declaradas no esquema são aceites (evita mass-assignment de chaves arbitrárias).
     */
    public function update(Request $request)
    {
        $pages = config('page_content');

        foreach ($pages as $page) {
            foreach ($page['sections'] as $section) {
                foreach ($section['fields'] as $key => $field) {
                    $type = $field['type'] ?? 'text';

                    // Campos de imagem/vídeo: um upload de ficheiro tem prioridade sobre o URL escrito.
                    if (in_array($type, ['image', 'video'], true) && $request->hasFile($key . '_file')) {
                        $folder = $type === 'video' ? 'videos' : 'settings';
                        $path = $request->file($key . '_file')->store($folder, 'public');
                        SiteSetting::set($key, Storage::url($path), 'page_content');
                        continue;
                    }

                    if ($request->has($key)) {
                        SiteSetting::set($key, $request->input($key), 'page_content');
                    }
                }
            }
        }

        $activeTab = $request->input('active_tab', 'home');

        return redirect()
            ->route('admin.pages.index', ['tab' => $activeTab])
            ->with('success', 'Conteúdo da página atualizado com sucesso.');
    }
}
