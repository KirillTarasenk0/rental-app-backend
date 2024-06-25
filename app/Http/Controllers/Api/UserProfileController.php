<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\UserEditProfileRequest;
use App\Services\UserProfileService;

class UserProfileController
{
    public function __construct(
        private readonly UserProfileService $userProfileService,
    ) {}
    public function editUserProfileData(UserEditProfileRequest $request): JsonResponse
    {
        $user = $this->userProfileService->changeUserProfileData($request);
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
        return response()->json(['user' => $user], 200);
    }
}
