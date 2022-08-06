<?php

namespace App\Services\Repository;

use App\Models\Calendar;
use App\Models\Classroom as ModelsClassroom;
use App\Models\ClassTime;
use App\Models\Student;
use App\Services\Traits\CrubModelRepository;

class ClassroomR implements CrubModelRI, ClassroomRI
{
    use CrubModelRepository;

    public function __construct(
        public ModelsClassroom $model,
        public ClassTime $class_time,
        public Calendar $calendar,
        public Student $student
    ) {
    }

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
        $data['calendar'] = null;
        if (request()->has('calendar_id')) $data['calendar'] = $this->calendar->getDataModelById(request('calendar_id'));
        $data['calendars'] =  $data['classroom']->calendars()
            ->with(['class_time', 'class'])
            ->orderBy('date', 'asc')
            ->paginate(request()->limit ?? 10);
        $data['calendars']->makeHidden(['class_id', 'class_time_id']);
        $data['class_time'] = $this->class_time->getAll();
        $data['student'] = $this->student->classRoom($id);
        return $data;
    }
}