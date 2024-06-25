<?php

namespace App\Contracts;

use App\Http\Requests\UserEditProfileRequest;
use App\Models\User;

interface UserProfileContract
{
    public function changeUserProfileData(UserEditProfileRequest $request): User;
}
