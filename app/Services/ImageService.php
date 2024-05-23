<?php

namespace App\Services;

use Illuminate\Support\Str;

class ImageService
{
    public function UploadImage($request, $folder, $file)
    {
        $file = $request->file($file);

        $imgFile = $folder.time() . Str::random(10) . '.' . $file->getClientOriginalExtension();
        public_path($folder . $imgFile);

        $file->move('storage/'.$folder, $imgFile);

        return $imgFile;
    }
}
