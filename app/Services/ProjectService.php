<?php
namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Collection;

class ProjectService
{
    public function getAll(): Collection
    {
        return Project::orderBy('order', 'asc')->get();
    }

    public function create(array $data): Project
    {
        return Project::create($data);
    }

    public function update(Project $project, array $data): bool
    {
        return $project->update($data);
    }

    public function delete(Project $project): bool
    {
        return $project->delete();
    }
}
