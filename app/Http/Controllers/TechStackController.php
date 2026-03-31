<?php

namespace App\Http\Controllers;

use App\Models\TechStack;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TechStackService;
use Illuminate\Http\JsonResponse;

class TechStackController extends Controller
{
   public function __construct(
        protected TechStackService $service
    ) {}

    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:tech_stacks,name',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        $tech = $this->service->create($validated);
        return response()->json($tech, 201);
    }

    public function show(TechStack $techStack): JsonResponse
    {
        return response()->json($techStack);
    }

    public function update(Request $request, TechStack $techStack): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'string|unique:tech_stacks,name,' . $techStack->id,
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        $this->service->update($techStack, $validated);
        return response()->json($techStack);
    }

    public function destroy(TechStack $techStack): JsonResponse
    {
        $this->service->delete($techStack);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
