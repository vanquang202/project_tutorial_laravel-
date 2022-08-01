<?php
namespace App\Services\Repository;

use App\Models\Classroom as ModelsClassroom;
use App\Models\ClassTime;
use App\Services\Traits\CrubModelRepository;

class ClassroomR implements CrubModelRI,ClassroomRI
{
    use CrubModelRepository;

    public function __construct(public ModelsClassroom $model,public ClassTime $class_time)
    {}

    public function getDataIndexList($params)
    {
        return  $this->model->getDataIndexList($params);
    }

    public function show($id)
    {
        $data = [];
        $data['classroom'] = $this->model->getDataModelById($id, [
            'lecturer', 'course', 'calendars'
        ]);
        $data['calendars'] =  $data['classroom']->calendars()
            ->with(['class_time', 'class'])
            ->paginate(request()->limit ?? 10);
        $data['calendars']->makeHidden(['class_id', 'class_time_id']);
        $data['class_time'] = $this->class_time->getAll();
        return $data;
    }
}