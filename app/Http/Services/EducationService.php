<?php
namespace App\Services;

use App\Models\Education;
use Illuminate\Support\Collection;

class EducationService
{
    public function getAll(): Collection
    {
        return Education::orderBy('order', 'asc')->get();
    }

    public function create(array $data): Education
    {
        return Education::create($data);
    }

    public function update(Education $education, array $data): bool
    {
        return $education->update($data);
    }

    public function delete(Education $education): bool
    {
        return $education->delete();
    }
}
