<?php
namespace App\Services;

use App\Models\AboutProfile;

class AboutProfileService
{
    /**
     * Get the first (and usually only) profile record.
     */
    public function getProfile(): ?AboutProfile
    {
        return AboutProfile::first();
    }

    /**
     * Create or Update the profile.
     */
    public function updateProfile(array $data): AboutProfile
    {
        // updateOrCreate ensures we don't accidentally create multiple "About Me" sections
        return AboutProfile::updateOrCreate(
            ['id' => 1],
            $data
        );
    }
}
