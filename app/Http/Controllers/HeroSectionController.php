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
    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'availability_text' => 'string',
            'is_available'      => 'boolean',
            'first_name'        => 'required|string',
            'last_name'         => 'required|string',
            'role_prefix'       => 'string',
            'role_highlight'    => 'required|string',
            'description'       => 'required|string',
        ]);

        $hero = $this->service->updateHero($validated);
        return response()->json($hero);
    }
}

