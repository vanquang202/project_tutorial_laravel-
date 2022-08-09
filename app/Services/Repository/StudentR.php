<?php

namespace App\Services\Repository;

use App\Models\Student;
use App\Services\Traits\CrubModel;
use App\Services\Traits\CrubModelRepository;

class StudentR implements CrubModelRI, StudentRI
{
    use CrubModelRepository;

    public function __construct(public Student $model)
    {
    }

    public function getCalendarByAuth($flagHistory = false)
    {
        $with = [];
        if ($flagHistory)  $with = ['class', 'course'];
        if (!$flagHistory) $with = ['class' => function ($q) {
            return $q->with(['calendars' => function ($q) {
                return $q->with(['class' => function ($q) {
                    return $q->with(['course']);
                }, 'class_time']);
            }]);
        }];
        return $this->model::where('user_id', auth()->id())
            ->with($with)
            ->get();
    }
    public function getDataIndexList($params, $with)
    {
        return  $this->model->getDataIndexList($params, $with);
    }
}