<?php

namespace App\Services\Traits;

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

    private function getDataRequest($data)
    {
        if(isset($data['images'])) return $data = $this->getDataHasImage($data);
        if(isset($data['image'])) return $data = $this->getDataHasImages($data);
        return $data;
    }

    private function getDataHasImage($data)
    {
        $nameImage = $this->upLoadImage($data['image']);
        $dataResult = Arr::except($data, ['image']);
        $dataResult['image']  = $nameImage;
        return $dataResult;
    }

    private function getDataHasImages($data)
    {
        $arrayImages = [];
        foreach ($data['images'] as $image) {
            $nameImage = $this->upLoadImage($image);
            if($nameImage) array_push($arrayImages , $nameImage);
        }
        $dataResult = Arr::except($data, ['images']);
        $dataResult['images']  = json_encode($arrayImages);
        return $dataResult;
    }

    public function store(Request $request)
    {
        $data = $this->getDataRequest($request->except(['_token']));
        $this->model::create($data);
        return redirect($this->views['router-list']);
    }

    public function edit(Request $request, $id)
    {
        return view($this->views['edit'], $this->getDataEdit($id));
    }

    public function update(Request $request, $id)
    {
        $data = $this->getDataRequest($request->except(['_token']));
        $this->model::find($id)->update($data);

        return redirect($this->views['router-list']);
    }

    public function destroy($id)
    {
        $this->model::find($id)->delete();

        return redirect($this->views['router-list']);
    }
}