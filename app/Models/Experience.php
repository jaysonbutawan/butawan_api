<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
  use HasFactory;

    protected $fillable = [
        'date',
        'role',
        'company',
        'description',
        'tech',
        'order'
    ];

    /**
     * Cast the JSON 'tech' column to a PHP array automatically.
     */
    protected $casts = [
        'tech' => 'array',
        'order' => 'integer'
    ];
}
