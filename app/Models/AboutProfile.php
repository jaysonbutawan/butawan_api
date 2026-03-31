<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutProfile extends Model
{
   use HasFactory;

    protected $fillable = [
        'section_label',
        'heading_main',
        'heading_highlight',
        'description_top',
        'description_bottom',
    ];
}
