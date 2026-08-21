<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_code',
        'title',
        'slug',
        'tagline',
        'short_description',
        'full_description',
        'strategic_value_para1',
        'strategic_value_para2',
        'quote',
        'key_benefits',
        'deliverables',
        'methodology',
        'metrics',
        'image_path',
        'icon',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'key_benefits' => 'array',
        'deliverables' => 'array',
        'methodology' => 'array',
        'metrics' => 'array',
        'is_active' => 'boolean',
    ];
}
