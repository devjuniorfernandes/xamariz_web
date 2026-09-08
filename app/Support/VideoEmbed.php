<?php

namespace App\Support;

use Illuminate\Support\Str;

/**
 * Normaliza fontes de vídeo de origens diversas (ficheiro local, YouTube,
 * Vimeo ou qualquer embed) numa marcação utilizável no site.
 *
 * Aceita qualquer forma que o cliente cole no CMS:
 *   - YouTube:  youtube.com/watch?v=ID, youtu.be/ID, /embed/ID, -nocookie
 *   - Vimeo:    vimeo.com/ID, player.vimeo.com/video/ID
 *   - Ficheiro: office.mp4, /videos/x.webm, https://cdn/…/x.mp4
 *   - Outro:    qualquer URL de embed (iframe) já pronta
 */
class VideoEmbed
{
    /** Extensões tratadas como ficheiro de vídeo direto (<video>). */
    protected const FILE_EXTENSIONS = ['mp4', 'webm', 'ogg', 'ogv', 'mov', 'm4v'];

    /**
     * Devolve o tipo da fonte: 'none' | 'youtube' | 'vimeo' | 'file' | 'embed'.
     */
    public static function type(?string $src): string
    {
        $src = trim((string) $src);

        if ($src === '') {
            return 'none';
        }

        if (static::isYouTube($src)) {
            return 'youtube';
        }

        if (static::isVimeo($src)) {
            return 'vimeo';
        }

        // Caminho local (sem protocolo) OU URL http que termina em extensão de vídeo.
        if (! Str::startsWith($src, ['http://', 'https://', '//'])) {
            return 'file';
        }

        $path = parse_url($src, PHP_URL_PATH) ?: '';
        if (in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), self::FILE_EXTENSIONS, true)) {
            return 'file';
        }

        return 'embed';
    }

    public static function isYouTube(string $src): bool
    {
        return (bool) preg_match('~(youtube\.com|youtu\.be|youtube-nocookie\.com)~i', $src);
    }

    public static function isVimeo(string $src): bool
    {
        return (bool) preg_match('~(vimeo\.com)~i', $src);
    }

    public static function isFile(?string $src): bool
    {
        return static::type($src) === 'file';
    }

    /**
     * ID do vídeo do YouTube a partir de qualquer forma de URL.
     */
    public static function youTubeId(string $src): ?string
    {
        if (preg_match('~(?:youtube\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/|v/)|youtu\.be/)([A-Za-z0-9_-]{11})~i', $src, $m)) {
            return $m[1];
        }

        return null;
    }

    /**
     * ID do vídeo do Vimeo a partir de qualquer forma de URL.
     */
    public static function vimeoId(string $src): ?string
    {
        if (preg_match('~vimeo\.com/(?:video/|channels/[^/]+/|groups/[^/]+/videos/)?(\d+)~i', $src, $m)) {
            return $m[1];
        }

        return null;
    }

    /**
     * URL de embed normalizada (iframe) para youtube/vimeo/embed.
     * $context: 'modal' (reproduz com controlos) ou 'background' (loop mudo sem controlos).
     */
    public static function embedUrl(string $src, string $context = 'modal', bool $loop = true): string
    {
        $type = static::type($src);

        if ($type === 'youtube') {
            $id = static::youTubeId($src);
            if (! $id) {
                return $src;
            }
            if ($context === 'background') {
                $params = ['autoplay' => 1, 'mute' => 1, 'controls' => 0, 'showinfo' => 0, 'modestbranding' => 1, 'rel' => 0, 'playsinline' => 1];
                if ($loop) {
                    // O YouTube exige playlist=ID para que loop=1 funcione.
                    $params['loop'] = 1;
                    $params['playlist'] = $id;
                }
            } else {
                $params = ['autoplay' => 1, 'rel' => 0, 'modestbranding' => 1, 'playsinline' => 1];
                if ($loop) {
                    $params['loop'] = 1;
                    $params['playlist'] = $id;
                }
            }

            return 'https://www.youtube-nocookie.com/embed/' . $id . '?' . http_build_query($params);
        }

        if ($type === 'vimeo') {
            $id = static::vimeoId($src);
            if (! $id) {
                return $src;
            }
            $params = $context === 'background'
                ? ['background' => 1, 'autoplay' => 1, 'muted' => 1, 'loop' => $loop ? 1 : 0]
                : ['autoplay' => 1, 'loop' => $loop ? 1 : 0];

            return 'https://player.vimeo.com/video/' . $id . '?' . http_build_query($params);
        }

        // Embed genérico: assume-se já pronto; devolve-se tal como está.
        return $src;
    }

    /**
     * URL utilizável de um ficheiro de vídeo (local vira asset(), remoto mantém-se).
     */
    public static function fileUrl(string $src): string
    {
        if (Str::startsWith($src, ['http://', 'https://', '//'])) {
            return $src;
        }

        return asset(ltrim($src, '/'));
    }

    /**
     * Tipo MIME aproximado a partir da extensão (para a tag <source>).
     */
    public static function mime(string $src): string
    {
        $path = parse_url($src, PHP_URL_PATH) ?: $src;
        return match (strtolower(pathinfo($path, PATHINFO_EXTENSION))) {
            'webm'         => 'video/webm',
            'ogg', 'ogv'   => 'video/ogg',
            'mov', 'm4v'   => 'video/mp4',
            default        => 'video/mp4',
        };
    }
}
