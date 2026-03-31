<?php
namespace App\Services;

use App\Models\AboutDetailsCard;
use Illuminate\Support\Collection;

class AboutDetailsCardService
{
    public function getAllCards(): Collection
    {
        return AboutDetailsCard::all();
    }

    public function createCard(array $data): AboutDetailsCard
    {
        return AboutDetailsCard::create($data);
    }

    public function updateCard(AboutDetailsCard $card, array $data): bool
    {
        return $card->update($data);
    }

    public function deleteCard(AboutDetailsCard $card): bool
    {
        return $card->delete();
    }
}
