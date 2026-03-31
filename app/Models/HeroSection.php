<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeroSection extends Model
{
   use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'summary',
        'status_badge'
    ];

    protected $casts = [
        'is_available' => 'boolean',
    ];
}
