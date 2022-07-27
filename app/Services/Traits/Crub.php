<?php

namespace App\Services\Traits;

use App\Http\Requests\CrubRequest;
use Illuminate\Http\Request;
use Arr;

trait Crub
{
    use UploadImage;
    public function index()
    {
        return view($this->views['list'], $this->getDataIndex());
    }

    public function create()
    {
        return view($this->views['create'], $this->getDataCreate() ?? []);
    }

    private function getDataRequest($data, $dataModelExitsByUpdate = null)
    {
        if (isset($data['image']) && isset($data['images'])) return $data = $this->getDataHasAllImage($data, $dataModelExitsByUpdate);
        if (isset($data['images'])) return $data = $this->getDataHasImage($data, $dataModelExitsByUpdate);
        if (isset($data['image'])) return $data = $this->getDataHasImages($data, $dataModelExitsByUpdate);
        return $data;
    }

    private function getDataHasImage($data, $dataModelExitsByUpdate = null)
    {
        $dataImageModleExistByUpdate = null;
        if($dataModelExitsByUpdate) $dataImageModleExistByUpdate = $dataModelExitsByUpdate->image;
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

    private function getDataHasAllImage($data,$dataModelExitsByUpdate = null)
    {
        $data = $this->getDataHasImages($this->getDataHasImage($data,$dataModelExitsByUpdate),$dataModelExitsByUpdate);
        return $data;
    }

    public function store(CrubRequest $request)
    {
        $data = $this->getDataRequest($request->except(['_token']));
        $this->model::create($data);
        return redirect($this->views['router-list']);
    }

    public function edit($id)
    {
        return view($this->views['edit'], $this->getDataEdit($id));
    }

    public function update(CrubRequest $request, $id)
    {
        $modelFindById = $this->model::find($id);
        $data = $this->getDataRequest($request->except(['_token']), $modelFindById);
        $modelFindById->update($data);

        return redirect($this->views['router-list']);
    }

    public function destroy($id)
    {
        $this->model::find($id)->delete();
        return redirect($this->views['router-list']);
    }
}