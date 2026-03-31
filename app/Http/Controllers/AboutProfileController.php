<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AboutProfileService;
use Illuminate\Http\JsonResponse;

class AboutProfileController extends Controller
{
   public function __construct(
        protected AboutProfileService $service
    ) {}

    /**
     * Display the profile for the Angular frontend.
     */
    public function index(): JsonResponse
    {
        $profile = $this->service->getProfile();
        return response()->json($profile);
    }

    /**
     * Update the profile (for your admin dashboard).
     */
    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'section_label'      => 'nullable|string',
            'heading_main'       => 'nullable|string',
            'heading_highlight'  => 'nullable|string',
            'description_top'    => 'nullable|string',
            'description_bottom' => 'nullable|string',
        ]);

        $profile = $this->service->updateProfile($validated);
        return response()->json($profile);
    }
}
