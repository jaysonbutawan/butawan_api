<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeroSection extends Model
{
   use HasFactory;

    protected $fillable = [
        'availability_text',
        'is_available',
        'first_name',
        'last_name',
        'role_prefix',
        'role_highlight',
        'description'
    ];

    protected $casts = [
        'is_available' => 'boolean',
    ];
}
