<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\HeroSectionService;
use Illuminate\Http\JsonResponse;

class HeroSectionController extends Controller
{
    public function __construct(
        protected HeroSectionService $service
    ) {}

    /**
     * Get the hero data for your Angular frontend
     */
    public function index(): JsonResponse
    {
        $hero = $this->service->getHero();
        return response()->json($hero);
    }

    /**
     * Update the hero data (from your admin dashboard)
     */
    // HeroSectionController.php
    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'status_badge' => 'nullable|string|max:255',
        ]);

        $hero = $this->service->updateHero($validated);

        return response()->json($hero);
    }
}
