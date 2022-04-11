<?php

namespace App\Http\Traits;

use Intervention\Image\ImageManagerStatic as Image;

trait SaveImageTrait
{
    public function saveImage($photo, $folder)
    {
        // Saving The Image
        $imageExtension = $photo->getClientOriginalExtension();
        $image_name = time() . '.' . $imageExtension;
        $image_name_DataBase = $folder . '/' . time() . '.' . $imageExtension;
        Image::make($photo)->save($folder . '/' . $image_name, 60);
        return $image_name_DataBase;
    }
}
