<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactLead extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'company',
        'sectors',
        'message',
        'status',
        'notes',
    ];

    protected $casts = [
        'sectors' => 'array',
    ];
}
