<?php
namespace App\Services\Repository;

interface CrubModelRI
{
    public function getDataModelById($id, $with = []);
    public function storeDataModel($request);
    public function updateDataModel($request,$id);
    public function destroyDataModel($id);
}