<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Traits\Crub;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use Crub;
    public function __construct(public Category $model)
    {
        $this->views = [
            'router-list' => route('admin.category.index'),
            'list' => 'pages.admin.categorys.index',
            'create' => 'pages.admin.categorys.add',
            'edit' => 'pages.admin.categorys.edit',

        ];
    }
    public function getDataIndex()
    {
        $categorys = $this->model::paginate(1);
        return  ['categorys' => $categorys];
    }

    public function getDataCreate()
    {
    }
    public function getDataEdit($id)
    {
        $category = $this->model::find($id);
        return ['category' => $category];
    }
}