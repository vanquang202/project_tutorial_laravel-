<?php
namespace App\Services\Traits;

trait UploadImage
{
    public function upLoadImage($image)
    {
        try {
            $nameImage = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $nameImage);
            return $nameImage;
        } catch (\Throwable $th) {
            return null;
        }
    }
}