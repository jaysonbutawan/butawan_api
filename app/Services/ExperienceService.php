<?php

namespace App\Services;

use App\Models\Experience;
use Illuminate\Support\Collection;

class ExperienceService
{
    public function getAll(): Collection
    {
        // We order by 'order' so your current job (Theobrotect Solutions) stays at the top
        return Experience::orderBy('order', 'asc')->get();
    }

    public function create(array $data): Experience
    {
        return Experience::create($data);
    }

    public function update(Experience $experience, array $data): bool
    {
        return $experience->update($data);
    }

    public function delete(Experience $experience): bool
    {
        return $experience->delete();
    }
}
