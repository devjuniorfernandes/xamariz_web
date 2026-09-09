<?php

namespace App\Support;

use App\Models\SiteSetting;

/**
 * Injecta os overrides do CMS (multilingues) sobre as traduções da landing,
 * mantendo os ficheiros lang de oilandgas como base/fallback.
 *
 * A blade continua a usar __('oilandgas.*') sem alterações — os valores
 * definidos no editor da Landing Page substituem os do ficheiro em runtime.
 */
class LandingContent
{
    public const GROUP = 'oilandgas';

    /** Idiomas suportados no editor. */
    public static function locales(): array
    {
        return array_keys(config('app.available_locales', ['pt' => [], 'en' => []]));
    }

    /** Chave em site_settings para um override. */
    public static function settingKey(string $locale, string $key): string
    {
        return "landing:{$locale}:{$key}";
    }

    /**
     * Aplica os overrides do idioma indicado (ou o actual) ao tradutor.
     * Deve correr antes de renderizar a landing.
     */
    public static function apply(?string $locale = null): void
    {
        $locale = $locale ?: app()->getLocale();
        $translator = app('translator');

        // Garante que o ficheiro base é carregado ANTES de sobrepor
        // (senão o load() posterior apagaria os overrides).
        $translator->load('*', self::GROUP, $locale);

        $overrides = SiteSetting::where('key', 'like', "landing:{$locale}:%")
            ->pluck('value', 'key');

        if ($overrides->isEmpty()) {
            return;
        }

        $lists = self::listKeys();
        $lines = [];

        foreach ($overrides as $settingKey => $value) {
            if ($value === null || $value === '') {
                continue;
            }
            $key = substr($settingKey, strlen("landing:{$locale}:"));

            if (in_array($key, $lists, true)) {
                $value = self::toList($value);
            }

            $lines[self::GROUP . '.' . $key] = $value;
        }

        if ($lines) {
            $translator->addLines($lines, $locale);
        }
    }

    /** Converte texto multi-linha numa lista (array), ignorando linhas vazias. */
    public static function toList(string $value): array
    {
        return array_values(array_filter(
            array_map('trim', preg_split('/\r\n|\r|\n/', $value)),
            static fn ($line) => $line !== ''
        ));
    }

    /** Chaves cujo tipo é 'list' (para converter string → array). */
    public static function listKeys(): array
    {
        $keys = [];
        foreach (config('landing_content', []) as $section) {
            foreach ($section['fields'] as $key => $field) {
                if (($field['type'] ?? 'text') === 'list') {
                    $keys[] = $key;
                }
            }
        }
        return $keys;
    }
}
