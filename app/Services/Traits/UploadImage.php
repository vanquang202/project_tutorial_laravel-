<?php
namespace App\Services\Traits;

trait UploadImage
{
    public function upLoadImage($image,$dataImageModleExistByUpdate = null)
    {
        try {
            if($dataImageModleExistByUpdate) $this->checkImageExist($dataImageModleExistByUpdate);
            $nameImage = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $nameImage);
            return $nameImage;
        } catch (\Throwable $th) {
            return null;
        }
    }

    private function checkImageExist($dataImageModleExistByUpdate)
    {
        if (file_exists(public_path('images') . '\\' . $dataImageModleExistByUpdate)) {
            unlink(public_path('images') . '\\' . $dataImageModleExistByUpdate);
        };
    }
}