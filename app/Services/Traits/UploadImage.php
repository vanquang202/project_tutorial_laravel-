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

    private function checkImageExist($dataImageModleExistByUpdate,  $dataImageHasMultiple = [])
    {
        if(count($dataImageHasMultiple) == 0):
            $this->unLinkImage($dataImageModleExistByUpdate);
            return ;
        else:
        foreach($dataImageHasMultiple as $image)
        {
            $this->unLinkImage($image);
        }
        endif;
    }

    private function unLinkImage($image)
    {
        if (file_exists(public_path('images') . '/' . $image)) {
            unlink(public_path('images') . '/' . $image);
        };
    }
}