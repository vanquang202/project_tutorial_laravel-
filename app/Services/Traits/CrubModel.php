<?php
namespace App\Services\Traits;

trait CrubModel
{
    public function getDataModelById($id)
    {
        $model = $this->find($id);
        return $model;
    }

    public function storeDataModel($data)
    {
        $model = $this->create($data);
        return $model;
    }

    public function updateDataModel($data)
    {
        $model = $this->update($data);
        return $model;
    }

    public function destroyDataModel()
    {
        return $this->delete();
    }
}
