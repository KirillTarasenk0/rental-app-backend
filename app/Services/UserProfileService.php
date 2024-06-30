<?php

namespace App\Services;

use App\Contracts\UserProfileContract;
use App\Models\User;
use App\Http\Requests\UserEditProfileRequest;
use App\Traits\UploadUserPhotoTrait;

class UserProfileService implements UserProfileContract
{
    use UploadUserPhotoTrait;

    public function changeUserProfileData(UserEditProfileRequest $request, User $user): User
    {
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
            $avatar = $request->file('avatar');
            $url = $this->uploadFile($avatar);
            $user->avatar = $url;
        }
        $user->save();
        return $user;
    }
}
