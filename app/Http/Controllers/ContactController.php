<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ContactService;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
   public function __construct(
        protected ContactService $service
    ) {}

    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'label' => 'nullable|string',
            'value' => 'nullable|string',
            'href'  => 'nullable|string',
            'order' => 'integer'
        ]);

        $contact = $this->service->create($validated);
        return response()->json($contact, 201);
    }

    public function update(Request $request, Contact $contact): JsonResponse
    {
        $validated = $request->validate([
            'icon'  => 'nullable|string',
            'label' => 'nullable|string',
            'value' => 'nullable|string',
            'href'  => 'nullable|string',
            'order' => 'integer'
        ]);

        $this->service->update($contact, $validated);
        return response()->json($contact);
    }

    public function destroy(Contact $contact): JsonResponse
    {
        $this->service->delete($contact);
        return response()->json(['message' => 'Contact link removed']);
    }
}
