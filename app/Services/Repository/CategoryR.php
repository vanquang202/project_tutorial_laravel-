<?php
namespace App\Services\Repository;

use App\Models\Category;
use App\Services\Traits\CrubModelRepository;

class CategoryR implements CrubModelRI,CategoryRI
{
    use CrubModelRepository;
    public function __construct(public Category $model)
    {}

    public function getAll()
    {
        return $this->model->get(['id as value','name as label'])->toArray();
    }

    public function getDataListPaginate($params = [], $with = [])
    {
         return $this->model->with($with)->withCount(['cousers'])->paginate($params['limit'] ?? null);
    }

    public function searchData($content)
    {
        return $this
        ->model
        ->where("name","like","%$content%")
        ->get();
    }
}
