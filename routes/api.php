<?php

use App\Http\Controllers\AboutDetailsCardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TechStackController;

Route::prefix('butawan')->group(function () {


    Route::prefix('auth')->name('auth.')->group(function () {
        Route::post('/login', [AuthController::class, 'login'])->name('login');

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
            Route::post('/change-password', [\App\Http\Controllers\AuthController::class, 'changePassword'])->name('change-password');
        });
    });

    Route::prefix('about-details')->name('about-details.')->group(function () {
        Route::get('/', [AboutDetailsCardController::class, 'index'])->name('cards.index');

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/', [AboutDetailsCardController::class, 'store'])->name('cards.store');
            Route::put('/{aboutDetailsCard}', [AboutDetailsCardController::class, 'update'])->name('cards.update');
            Route::delete('/{aboutDetailsCard}', [AboutDetailsCardController::class, 'destroy'])->name('cards.destroy');
        });
    });

    Route::prefix('about-profile')->name('about-profile.')->group(function () {
        Route::get('/', [AboutProfileController::class, 'index'])->name('profile.index');

        Route::middleware('auth:sanctum')->group(function () {
            Route::put('/', [AboutProfileController::class, 'update'])->name('profile.update');
        });
    });

    Route::prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/', [ContactController::class, 'store'])->name('store');
            Route::put('{contact}', [ContactController::class, 'update'])->name('update');
            Route::delete('{contact}', [ContactController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('education')->name('education.')->group(function () {
        Route::get('/', [EducationController::class, 'index'])->name('index');

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/', [EducationController::class, 'store'])->name('store');
            Route::put('/{education}', [EducationController::class, 'update'])->name('update');
            Route::delete('/{education}', [EducationController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('experiences')->name('experiences.')->group(function () {
        Route::get('/', [ExperienceController::class, 'index'])->name('index');
        Route::post('/', [ExperienceController::class, 'store'])->name('store');

        Route::middleware('auth:sanctum')->group(function () {

            Route::put('/{experience}', [ExperienceController::class, 'update'])->name('update');
            Route::delete('/{experience}', [ExperienceController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('hero')->name('hero.')->group(function () {
        Route::get('/', [HeroSectionController::class, 'index'])->name('index');

        Route::middleware('auth:sanctum')->group(function () {
            Route::put('/', [HeroSectionController::class, 'update'])->name('update');
        });
    });

    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::get('{project}', [ProjectController::class, 'show'])->name('show');

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/', [ProjectController::class, 'store'])->name('store');
            Route::put('{project}', [ProjectController::class, 'update'])->name('update');
            Route::delete('{project}', [ProjectController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('tech-stacks')->name('tech-stacks.')->group(function () {
        Route::get('/', [TechStackController::class, 'index'])->name('index');
        Route::get('{techStack}', [TechStackController::class, 'show'])->name('show');

        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/', [TechStackController::class, 'store'])->name('store');
            Route::put('{techStack}', [TechStackController::class, 'update'])->name('update');
            Route::delete('{techStack}', [TechStackController::class, 'destroy'])->name('destroy');
        });
    });
});
