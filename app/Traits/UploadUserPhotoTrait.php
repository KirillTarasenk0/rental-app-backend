<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

trait UploadUserPhotoTrait
{
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
