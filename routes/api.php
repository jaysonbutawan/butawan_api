<?php

use App\Http\Controllers\PersonalInformation;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'api.auth'])->group(function () {
    Route::prefix('butawan')->group(function () {
        Route::get('/biodata', [PersonalInformation::class, 'index']);
        Route::get('/biodata/{section}', [PersonalInformation::class, 'show']);
    });
});
