<?php

namespace App\Services;

use App\Contracts\UserProfileContract;
use App\Models\User;
use App\Http\Requests\UserEditProfileRequest;
use Illuminate\Support\Facades\Auth;

class UserProfileService implements UserProfileContract
{
    public function changeUserProfileData(UserEditProfileRequest $request): User
    {
        $user = Auth::user();
        if ($request->has('name')) {
            $user->name = $request->input('name');
        }
        if ($request->has('email')) {
            $user->email = $request->input('email');
        }
        if ($request->has('role')) {
            $user->role = $request->input('role');
        }
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
        $user->save();
        return $user;
    }
}
