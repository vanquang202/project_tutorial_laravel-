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
}