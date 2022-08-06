<?php

namespace App\Services\Traits;

trait CrubModel
{
    public function getDataModelById($id, $with = [])
    {
        $model = $this->with($with)->find($id);
        return $model;
    }

    public function storeDataModel($data)
    {
        $model = $this->create($data);
        return $model;
    }

    public function updateDataModel($data)
    {
        $this->update($data);
        return $this;
    }

    public function destroyDataModel()
    {
        return $this->delete();
    }
}