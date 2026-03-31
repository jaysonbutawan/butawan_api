<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ExperienceService;
use Illuminate\Http\JsonResponse;

class ExperienceController extends Controller
{
    public function __construct(
        protected ExperienceService $service
    ) {}

    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'date'        => 'nullable|string',
            'role'        => 'nullable|string',
            'company'     => 'nullable|string',
            'description' => 'nullable|string',
            'tech'        => 'nullable|array', // Laravel validates this as an array
            'order'       => 'integer'
        ]);

        $experience = $this->service->create($validated);
        return response()->json($experience, 201);
    }

    public function update(Request $request, Experience $experience): JsonResponse
    {
        $validated = $request->validate([
            'date'        => 'nullable|string',
            'role'        => 'nullable|string',
            'company'     => 'nullable|string',
            'description' => 'nullable|string',
            'tech'        => 'nullable|array',
            'order'       => 'integer'
        ]);

        $this->service->update($experience, $validated);
        return response()->json($experience);
    }

    public function destroy(Experience $experience): JsonResponse
    {
        $this->service->delete($experience);
        return response()->json(['message' => 'Experience removed']);
    }
}
