<?php

namespace App\Services\Interfaces;

use App\Http\Requests\CrubRequest;
use Illuminate\Http\Request;
use Arr;

interface ICrubModelInterface
{
    public function getDataModelById($id);

    public function storeDataModel($data);

    public function updateDataModel($data);

    public function destroyDataModel();
}