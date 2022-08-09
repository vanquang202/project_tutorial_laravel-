<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Services\Repository\StudentR;
use App\Services\Repository\StudentRI;
use App\Services\Traits\Crub;
use App\Services\Traits\CrubModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use Crub, CrubModel;
    public function __construct(private StudentRI $student )
    {
        $this->model = $student;
        $this->views = [
            'router-list' => route('admin.student.index'),
            'list' => 'pages.admin.students.index',
            'create' => 'pages.admin.students.add',
            'edit' => 'pages.admin.students.edit',

        ];
    }

    public function getDataIndex()
    {
        $students = $this->student->getDataIndexList(
            ['limit' => 5],
            [
                'user' => function ($q) {
                    return $q->select(['id', 'name']);
                },
                'class' => function ($q) {
                    return $q->select(['id', 'name']);
                },
                'course' => function ($q) {
                    return $q->select(['id', 'name']);
                },
            ]
        );

        return  ['students' => $students];
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
        return $rule;
    }
}
