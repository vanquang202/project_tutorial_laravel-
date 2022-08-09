<?php

namespace App\Services\Traits;

use Illuminate\Support\Arr;

trait CrubModelRepository
{
     use UploadImage;

    private function getDataRequest($data, $dataModelExitsByUpdate = null)
    {
        if (isset($data['image']) && isset($data['images'])) return $data = $this->getDataHasAllImage($data, $dataModelExitsByUpdate);
        if (isset($data['image'])) return $data = $this->getDataHasImage($data, $dataModelExitsByUpdate);
        if (isset($data['images'])) return $data = $this->getDataHasImages($data, $dataModelExitsByUpdate);
        return $data;
    }

    private function getDataHasImage($data, $dataModelExitsByUpdate = null)
    {
        $dataImageModleExistByUpdate = null;
        if ($dataModelExitsByUpdate) $dataImageModleExistByUpdate = $dataModelExitsByUpdate->image;
        $nameImage = $this->upLoadImage($data['image'], $dataImageModleExistByUpdate);
        $dataResult = Arr::except($data, ['image']);
        $dataResult['image']  = $nameImage;
        return $dataResult;
    }

    private function getDataHasImages($data, $dataModelExitsByUpdate = null)
    {
        $arrayImages = [];
        foreach ($data['images'] as $image) {
            $nameImage = $this->upLoadImage($image);
            if ($nameImage) array_push($arrayImages, $nameImage);
        }
        $dataResult = Arr::except($data, ['images']);
        $dataResult['images']  = json_encode($arrayImages);
        return $dataResult;
    }

    private function getImageJsonDeCodeModelExitst($dataModelExitsByUpdate)
    {
        $images = json_decode($dataModelExitsByUpdate->images);
        return $images;
    }

    private function getDataHasAllImage($data, $dataModelExitsByUpdate = null)
    {
        $data = $this->getDataHasImages($this->getDataHasImage($data, $dataModelExitsByUpdate), $dataModelExitsByUpdate);
        return $data;
    }


    public function getDataModelById($id, $with = [])
    {
        return $this->model->getDataModelById($id, $with);
    }

    public function storeDataModel($request)
    {
        $data = $this->getDataRequest($request->except(['_token','_method','id','classroom_id','categorys']));
        return $this->model->storeDataModel($data);
    }

    public function updateDataModel($request,$id)
    {
        $modelFindById = $this->model->getDataModelById($id);
        $data = $this->getDataRequest($request->except(['_token','_method','classroom_id','categorys']), $modelFindById);
        return $modelFindById->updateDataModel($data);
    }

    public function destroyDataModel($id)
    {
        $modelFindById = $this->model->getDataModelById($id);
        if ($modelFindById->image && $modelFindById->images) $this->checkImageExist($modelFindById->image, $modelFindById->images);
        if ($modelFindById->image) $this->checkImageExist($modelFindById->image);
        if ($modelFindById->images) $this->checkImageExist($modelFindById->image);
        return $modelFindById->destroyDataModel();
    }
}
