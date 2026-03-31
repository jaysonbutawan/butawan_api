<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProjectService;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
public function __construct(
        protected ProjectService $service
    ) {}

    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'icon'        => 'required|string',
            'type'        => 'required|string',
            'title'       => 'required|string',
            'description' => 'required|string',
            'stack'       => 'required|array', // Validates JSON input as array
            'link'        => 'nullable|url',
            'order'       => 'integer'
        ]);

        $project = $this->service->create($validated);
        return response()->json($project, 201);
    }

    public function show(Project $project): JsonResponse
    {
        return response()->json($project);
    }

    public function update(Request $request, Project $project): JsonResponse
    {
        $validated = $request->validate([
            'icon'        => 'string',
            'type'        => 'string',
            'title'       => 'string',
            'description' => 'string',
            'stack'       => 'array',
            'link'        => 'nullable|url',
            'order'       => 'integer'
        ]);

        $this->service->update($project, $validated);
        return response()->json($project);
    }

    public function destroy(Project $project): JsonResponse
    {
        $this->service->delete($project);
        return response()->json(['message' => 'Project deleted successfully']);
    }
}
