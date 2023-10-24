<?php

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

function uploadImage($image, $path, $old_path = null) {
    if ($image) {
        if (file_exists($old_path)) {
            unlink($old_path);
        }

        $image_name = date('YmdHis').'.'.$image->extension();
        $url = $path.$image_name;

        if (!File::isDirectory(public_path($path))) {
            File::makeDirectory(public_path($path), 0777, true, true);
        }

        Image::make($image)->save(public_path($path).$image_name);

        return $url;
    }
}