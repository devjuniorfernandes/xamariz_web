<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'filter_key',
        'display_order',
    ];

    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
