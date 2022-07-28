<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\User;
use App\Services\Interfaces\IRuleInterface;
use App\Services\Traits\Crub;
use Illuminate\Http\Request;

class ClassroomController extends Controller implements IRuleInterface
{
    use Crub;
    public function __construct(
        public Classroom $model,
        public Course $course,
        public User $user
    ) {
        $this->views = [
            'router-list' => route('admin.classroom.index'),
            'list' => 'pages.admin.classroom.index',
            'create' => 'pages.admin.classroom.add',
            'edit' => 'pages.admin.classroom.edit',

        ];
    }
    public function getRules($method, $id)
    {
        $rule = [];
        switch ($method):
            case 'POST':
                $rule = [
                    'name' => 'required|unique:class,name',
                    'lecturer_id' => 'required',
                    'course_id' => 'required',
                    'detail' => 'required',
                    'status' => 'required',
                    'date_open' => 'required',
                ];
                break;
            case 'PUT':
                $rule = [
                    'name' => "required|unique:class,name.$id,id",
                    'lecturer_id' => 'required',
                    'course_id' => 'required',
                    'detail' => 'required',
                    'status' => 'required',
                    'date_open' => 'required',
                ];

                break;
            default:
                break;
        endswitch;
        return $rule;
    }
    public function getDataCreate()
    {
        $courses = $this->course::where('status', 1)->get(['id as value', 'name as label']);
        $users = $this->user::get(['id as value', 'name as label']);
        return [
            'courses' => $courses->toArray(),
            'users' => $users->toArray(),
        ];
    }
    public function   getDataIndex()
    {
        $data = $this->model::paginate(5);
        // $data->makeHidden(['images', 'detail']);
        return  ['dataList' => $data];
    }
    public function getDataEdit($id)
    {
        $data = $this->model::find($id);
        return ['data' => $data];
    }
}