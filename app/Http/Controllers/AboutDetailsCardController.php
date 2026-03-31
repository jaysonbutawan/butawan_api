<?php

namespace App\Http\Controllers;

use App\Models\AboutDetailsCard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AboutDetailsCardService;
use Illuminate\Http\JsonResponse;

class AboutDetailsCardController extends Controller
{
  public function __construct(
        protected AboutDetailsCardService $service
    ) {}

    public function index(): JsonResponse
    {
        return response()->json($this->service->getAllCards());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'label' => 'required|string',
            'value' => 'required|string',
        ]);

        $card = $this->service->createCard($validated);
        return response()->json($card, 201);
    }

    public function update(Request $request, AboutDetailsCard $aboutDetailsCard): JsonResponse
    {
        $validated = $request->validate([
            'label' => 'string',
            'value' => 'string',
        ]);

        $this->service->updateCard($aboutDetailsCard, $validated);
        return response()->json($aboutDetailsCard);
    }

    public function destroy(AboutDetailsCard $aboutDetailsCard): JsonResponse
    {
        $this->service->deleteCard($aboutDetailsCard);
        return response()->json(['message' => 'Card removed']);
    }
}
