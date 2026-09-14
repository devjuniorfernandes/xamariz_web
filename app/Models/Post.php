<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'root_level',
        'summary',
        'content',
        'cover_image',
        'author_id',
        'published_at',
        'status',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'root_level'   => 'boolean',
    ];

    public function author()
    {
        return $this->belongsTo(TeamMember::class, 'author_id');
    }

    /**
     * Segmento de categoria usado no URL do blog (/blog/{categoria}/{slug}).
     * Ex.: "Atrair Clientes" => "atrair-clientes". Cai para "geral" se vazio.
     */
    public function getCategorySlugAttribute(): string
    {
        return Str::slug($this->category ?: 'geral') ?: 'geral';
    }

    /**
     * URL público canónico do artigo, alinhado com o sitemap SEO.
     * Artigos root_level vivem na raiz (/{slug}/); os restantes em
     * /blog/{categoria}/{slug}/.
     */
    public function getUrlAttribute(): string
    {
        if ($this->root_level) {
            return url('/' . $this->slug);
        }

        return route('insights.show', [
            'category' => $this->category_slug,
            'slug'     => $this->slug,
        ]);
    }
}
