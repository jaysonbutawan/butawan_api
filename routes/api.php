<?php

use App\Http\Controllers\PersonalInformation;
use Illuminate\Support\Facades\Route;


Route::get('/biodata', [PersonalInformation::class, 'index']);;
