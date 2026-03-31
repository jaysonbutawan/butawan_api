<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
   use HasFactory;

    protected $fillable = [
        'icon',
        'type',
        'title',
        'description',
        'stack',
        'link',
        'order'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'stack' => 'array',
        'order' => 'integer',
    ];
}
