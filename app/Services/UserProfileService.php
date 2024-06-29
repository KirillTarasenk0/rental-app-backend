<?php

namespace App\Services;

use App\Contracts\UserProfileContract;
use App\Models\User;
use App\Http\Requests\UserEditProfileRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class UserProfileService implements UserProfileContract
{
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

    private function uploadFile(UploadedFile $file): string
    {
        try {
            if (!$file->isValid()) {
                throw new \Exception('Invalid file upload.');
            }
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('avatars', $fileName, 'public');
            return $fileName;
        } catch (\Exception $e) {
            Log::error('Failed to upload file: ' . $e->getMessage());
            return '';
        }
    }
}
