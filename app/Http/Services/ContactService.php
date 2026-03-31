<?php
namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Collection;

class ContactService
{
    public function getAll(): Collection
    {
        return Contact::orderBy('order', 'asc')->get();
    }

    public function create(array $data): Contact
    {
        return Contact::create($data);
    }

    public function update(Contact $contact, array $data): bool
    {
        return $contact->update($data);
    }

    public function delete(Contact $contact): bool
    {
        return $contact->delete();
    }
}
