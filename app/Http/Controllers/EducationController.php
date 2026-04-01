<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EducationService;
use Illuminate\Http\JsonResponse;

class EducationController extends Controller
{
   public function __construct(
        protected EducationService $service
    ) {}

    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'year'   => 'nullable|string',
            'degree' => 'nullable|string',
            'school' => 'nullable|string',
            'note'   => 'nullable|string',
            'icon'   => 'nullable|string',
            'order'  => 'integer'
        ]);

        $education = $this->service->create($validated);
        return response()->json($education, 201);
    }

    public function update(Request $request, Education $education): JsonResponse
    {
        $validated = $request->validate([
            'year'   => 'nullable|string',
            'degree' => 'nullable|string',
            'school' => 'nullable|string',
            'note'   => 'nullable|string',
            'icon'   => 'nullable|string',
            'order'  => 'integer'
        ]);

        $this->service->update($education, $validated);
        return response()->json($education);
    }

    public function destroy(Education $education): JsonResponse
    {
        $this->service->delete($education);
        return response()->json(['message' => 'Education record deleted']);
    }
}
