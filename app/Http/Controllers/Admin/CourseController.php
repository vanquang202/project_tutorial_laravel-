<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Services\Traits\Crub;
use Illuminate\Http\Request;

class CourseController extends Controller
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
    public function getDataCreate()
    {
    }
    public function   getDataIndex()
    {
        $courses = $this->model::paginate(1);
        return  ['dataList' => $courses];
    }
}