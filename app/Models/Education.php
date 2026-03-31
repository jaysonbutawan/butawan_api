<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Education extends Model
{
 use HasFactory;

    // Explicitly define the table name since it's not the standard plural 'educations'
    protected $table = 'education';

    protected $fillable = [
        'year',
        'degree',
        'school',
        'note',
        'icon',
        'order'
    ];

    protected $casts = [
        'order' => 'integer',
    ];
}
