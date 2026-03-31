<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'label',
        'value',
        'href',
        'order'
    ];

    protected $casts = [
        'order' => 'integer',
    ];
}
