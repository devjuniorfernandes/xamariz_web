<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo_path',
        'logo_white_path',
        'sector',
        'headline',
        'website_url',
        'description',
        'services_provided',
        'testimonial_text',
        'testimonial_author',
        'testimonial_role',
        'show_in_marquee',
        'display_order',
    ];

    protected $casts = [
        'show_in_marquee' => 'boolean',
    ];

    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
