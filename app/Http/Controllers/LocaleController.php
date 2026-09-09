<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * Alternar o idioma da aplicação.
     */
    public function switch(Request $request, string $locale): RedirectResponse
    {
        $availableLocales = array_keys(config('app.available_locales', [
            'pt' => [],
            'en' => [],
        ]));

        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.fallback_locale', 'pt');
        }

        session(['locale' => $locale]);
        app()->setLocale($locale);

        $cookie = cookie('locale', $locale, 60 * 24 * 365); // 1 ano de validade

        return back()->withCookie($cookie);
    }
}
