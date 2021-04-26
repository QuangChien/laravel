<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait StorageImageTrait
{
    public function storageTraitUpload($fileUpload, $folderName)
    {
        if ($fileUpload !== null) {
            $fileNameOrigin = $fileUpload->getClientOriginalName();
            $path = $fileUpload->storeAs(
                'public/images/' . $folderName,
                $fileNameOrigin
            );

            return $data = [
                'name' => $fileNameOrigin,
                'path' => Storage::url($path),
            ];
        }
    }
}
