<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassTime;
use App\Models\Course;
use App\Models\User;
use App\Services\Interfaces\IRuleInterface;
use App\Services\Repository\ClassroomRI;
use App\Services\Traits\Crub;

class ClassroomController extends Controller implements IRuleInterface
{
    use Crub;
    public function __construct(
        public ClassroomRI $model,
        public Course $course,
        public User $user,
        public ClassTime $class_time,
    ) {
        $this->views = [
            'router-list' => route('admin.classroom.index'),
            'list' => 'pages.admin.classroom.index',
            'create' => 'pages.admin.classroom.add',
            'edit' => 'pages.admin.classroom.edit',
            'detail' => 'pages.admin.classroom.detail'
        ];
    }

    public function getRules($method, $id)
    {
        $rule = [];
        $ruleCode = "";
        switch ($method):
            case 'POST':
                $ruleCode = "required|unique:class,name";
                break;
            case 'PUT':
                $ruleCode = "required|unique:class,name,$id,id";
                break;
            default:
                break;
        endswitch;

        $rule = [
            'name'  =>  $ruleCode,
            'lecturer_id' => 'required',
            'course_id' => 'required',
            'status' => 'required',
            'date_open' => 'required',
        ];
        return $rule;
    }

    public function getDataCreate()
    {
        $courses = $this->course->getDataListActive([], ['id as value', 'name as label']);
        $users = $this->user->getDataList([], ['id as value', 'name as label']);

        return [
            'courses' => $courses->toArray(),
            'users' => $users->toArray(),
        ];
    }

    public function   getDataIndex()
    {
        $data = $this->model->getDataIndexList([
            'limit' => request('limit') ?? 10
        ]);
        $data->makeHidden(['course_id', 'lecturer_id']);
        return  ['dataList' => $data];
    }

    public function getDataEdit($id)
    {
        $data = $this->model->getDataModelById($id);
        $courses = $this->course->getDataListActive([], ['id as value', 'name as label']);
        $users = $this->user->getDataList([], ['id as value', 'name as label']);
        return [
            'courses' => $courses->toArray(),
            'users' => $users->toArray(),
            'data' => $data
        ];
    }

    public function show($id)
    {
        $data = $this->model->show($id);

        if (!$data['classroom'] || !$data['calendars']) return redirect()->back()->with('error', 'Không thể xem chi tiết của lớp học này !');
        if ($data['classroom']->status == 0) return redirect()->back()->with('error', 'Lớp học này đang ở trạng thái khóa !');
        return view($this->views['detail'], $data);
    }
}