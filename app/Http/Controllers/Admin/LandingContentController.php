<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Support\LandingContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingContentController extends Controller
{
    /**
     * Editor multilingue (PT/EN/FR) do conteúdo da Landing Page.
     */
    public function index()
    {
        $sections = config('landing_content');
        $locales  = LandingContent::locales();

        // Valores actuais: override do CMS se existir, senão a tradução base.
        // Imagens são de valor único (não traduzíveis).
        $values = [];
        $images = [];
        foreach ($sections as $section) {
            foreach ($section['fields'] as $key => $field) {
                if (($field['type'] ?? 'text') === 'image') {
                    $images[$key] = SiteSetting::get($key, $field['default'] ?? '');
                    continue;
                }
                foreach ($locales as $locale) {
                    $override = SiteSetting::get(LandingContent::settingKey($locale, $key));
                    $values[$locale][$key] = $override !== null
                        ? $override
                        : $this->langDefault($key, $field, $locale);
                }
            }
        }

        return view('admin.landing.index', compact('sections', 'locales', 'values', 'images'));
    }

    /**
     * Grava os overrides. Se o valor for igual à tradução base (ou vazio),
     * o override é removido (mantém o fallback à tradução).
     */
    public function update(Request $request)
    {
        $sections = config('landing_content');
        $locales  = LandingContent::locales();
        $input    = $request->input('c', []);

        foreach ($sections as $section) {
            foreach ($section['fields'] as $key => $field) {
                // Imagens: valor único (URL ou upload), não traduzível.
                if (($field['type'] ?? 'text') === 'image') {
                    if ($request->hasFile($key . '_file')) {
                        $path = $request->file($key . '_file')->store('landing', 'public');
                        SiteSetting::set($key, Storage::url($path), 'landing');
                    } elseif ($request->filled($key)) {
                        SiteSetting::set($key, trim($request->input($key)), 'landing');
                    }
                    continue;
                }

                foreach ($locales as $locale) {
                    $settingKey = LandingContent::settingKey($locale, $key);
                    $submitted  = $input[$locale][$key] ?? '';
                    $submitted  = is_string($submitted) ? trim($submitted) : $submitted;
                    $default    = $this->langDefault($key, $field, $locale);

                    if ($submitted === '' || $submitted === $default) {
                        // Sem override → usa a tradução base.
                        SiteSetting::where('key', $settingKey)->delete();
                    } else {
                        SiteSetting::set($settingKey, $submitted, 'landing');
                    }
                }
            }
        }

        return redirect()->route('admin.landing.index')
            ->with('success', 'Conteúdo da Landing Page atualizado com sucesso.');
    }

    /**
     * Valor base do ficheiro de tradução para um campo/idioma.
     * Listas são devolvidas como texto (uma linha por item) para o textarea.
     */
    protected function langDefault(string $key, array $field, string $locale): string
    {
        $value = __(LandingContent::GROUP . '.' . $key, [], $locale);

        if (is_array($value)) {
            // Lista simples (ex.: industry.items). Estruturas complexas ficam vazias.
            $flat = array_filter($value, 'is_string');
            return implode("\n", $flat);
        }

        return (string) $value;
    }
}
