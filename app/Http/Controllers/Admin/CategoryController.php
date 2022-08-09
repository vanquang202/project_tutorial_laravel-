<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Interfaces\IRuleInterface;
use App\Services\Repository\CategoryR;
use App\Services\Repository\CategoryRI;
use App\Services\Traits\Crub;
use Illuminate\Http\Request;

class CategoryController extends Controller implements IRuleInterface
{
    use Crub;

    public function __construct(public CategoryRI $model)
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
        $categorys = $this->model->getDataListPaginate(['limit' => 5]);
        return  ['categorys' => $categorys];
    }

    public function getDataCreate()
    {
        return [];
    }

    public function getDataEdit($id)
    {
        $category = $this->model->getDataModelById($id);
        return ['category' => $category];
    }

    public function getRules($method, $id)
    {
        $rule = [];
        switch ($method):
            case 'POST':
                $rule = [
                    'name' => 'required'
                ];
                break;
            case 'PUT':
                $rule = [
                    'name' => 'required'
                ];
                break;
            default:
                break;
        endswitch;

        return $rule;
    }
}