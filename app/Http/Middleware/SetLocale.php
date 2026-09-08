<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $availableLocales = array_keys(config('app.available_locales', [
            'pt' => [],
            'en' => [],
            'fr' => [],
        ]));

        $defaultLocale = config('app.locale', 'pt');

        $locale = session('locale');

        if (!$locale || !in_array($locale, $availableLocales)) {
            $cookieLocale = $request->cookie('locale');
            if ($cookieLocale && in_array($cookieLocale, $availableLocales)) {
                $locale = $cookieLocale;
            } else {
                // Tenta inferir pelo cabeçalho Accept-Language do navegador
                $preferred = $request->getPreferredLanguage($availableLocales);
                $locale = $preferred ?: $defaultLocale;
            }
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
