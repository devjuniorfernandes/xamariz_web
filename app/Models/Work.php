<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'client_id',
        'work_category_id',
        'summary',
        'description',
        'cover_image',
        'gallery',
        'video_url',
        'external_url',
        'tagline',
        'results_metrics',
        'is_featured_home',
        'display_order',
        'status',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'gallery' => 'array',
        'results_metrics' => 'array',
        'is_featured_home' => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function category()
    {
        return $this->belongsTo(WorkCategory::class, 'work_category_id');
    }
}
