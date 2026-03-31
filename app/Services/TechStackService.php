<?php

namespace App\Services;

use App\Models\TechStack;
use Illuminate\Support\Collection;

class TechStackService
{
    public function getAll(): Collection
    {
        return TechStack::orderBy('sort_order', 'asc')->get();
    }

    public function create(array $data): TechStack
    {
        return TechStack::create($data);
    }

    public function update(TechStack $techStack, array $data): bool
    {
        return $techStack->update($data);
    }

    public function delete(TechStack $techStack): bool
    {
        return $techStack->delete();
    }

    public function toggleStatus(TechStack $techStack): bool
    {
        return $techStack->update(['is_active' => !$techStack->is_active]);
    }
}
