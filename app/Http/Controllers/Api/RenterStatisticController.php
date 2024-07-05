<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\RenterStatisticService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RenterStatisticController extends Controller
{
    public function __construct(
        private readonly RenterStatisticService $renterStatisticService,
    ) {}

    public function index(): JsonResponse
    {
        try {
            $statistics = $this->renterStatisticService->getRenterAddedPropertyStatistic();
            return response()->json(['statistics' => $statistics], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch statistics'], 500);
        }
    }
}
