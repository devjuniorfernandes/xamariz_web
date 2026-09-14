<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'role',
        'department',
        'bio',
        'quote',
        'photo_path',
        'social_linkedin',
        'social_twitter',
        'social_instagram',
        'email',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * URL da foto pronta para usar em <img src>.
     * - URLs externos (http/https) passam intactos.
     * - Caminhos locais são codificados por segmento (aguenta espaços e
     *   acentos nos nomes de ficheiro, ex.: "equipa/Adriano Faria - Designer Gráfico.jpg").
     */
    public function getPhotoSrcAttribute(): ?string
    {
        $path = $this->photo_path;

        if (! $path) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        $segments = explode('/', ltrim($path, '/'));
        $encoded = implode('/', array_map('rawurlencode', $segments));

        return asset($encoded);
    }
}
