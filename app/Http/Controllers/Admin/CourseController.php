<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Services\Interfaces\IRuleInterface;
use App\Services\Traits\Crub;
use Illuminate\Http\Request;

class CourseController extends Controller implements IRuleInterface
{
    use Crub;
    public function __construct(public Course $model)
    {
        $this->views = [
            'router-list' => route('admin.course.index'),
            'list' => 'pages.admin.courses.index',
            'create' => 'pages.admin.courses.add',
            'edit' => 'pages.admin.courses.edit',

        ];
    }
    public function getRules($method, $id)
    {
        $rule = [];
        switch ($method):
            case 'POST':
                $rule = [
                    'name' => 'required|unique:courses,name',
                    'image' => 'required',
                    'detail' => 'required',
                    'status' => 'required',
                    'price' => 'required',
                ];
                break;
            case 'PUT':
                $rule = [
                    'name' => "required|unique:courses,name,$id,id",
                    'detail' => 'required',
                    'status' => 'required',
                    'price' => 'required',
                ];

                break;
            default:
                break;
        endswitch;

        return $rule;
    }
    public function getDataCreate()
    {
    }
    public function   getDataIndex()
    {
        $courses = $this->model::paginate(5);
        $courses->makeHidden(['images', 'detail']);
        return  ['dataList' => $courses];
    }
    public function getDataEdit($id)
    {
        $data = $this->model::find($id);
        return ['data' => $data];
    }
}