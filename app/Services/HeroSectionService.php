<?php

namespace App\Services;

use App\Models\HeroSection;

class HeroSectionService
{
    public function getHero(): ?HeroSection
    {
        return HeroSection::first();
    }

    public function updateHero(array $data): HeroSection
    {
        // Always targets ID 1 to maintain a single record
        return HeroSection::updateOrCreate(
            ['id' => 1],
            $data
        );
    }
}
