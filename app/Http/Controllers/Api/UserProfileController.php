<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\UserEditProfileRequest;
use App\Services\UserProfileService;
use Illuminate\Support\Facades\Auth;

class UserProfileController
{
    public function __construct(
        private readonly UserProfileService $userProfileService,
    ) {}

    public function editUserProfileData(UserEditProfileRequest $request): JsonResponse
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
        $updatedUser = $this->userProfileService->changeUserProfileData($request, $user);
        return response()->json(['user' => $updatedUser, 'avatar' => asset('storage/avatars/' . $updatedUser->avatar)], 200);
    }
}
