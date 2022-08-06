<?php
namespace App\Services\Repository;

use App\Models\Student;
use App\Services\Traits\CrubModelRepository;

class StudentR implements CrubModelRI,StudentRI
{
    use CrubModelRepository;

    public function __construct(public Student $model)
    {}

    public function getCalendarByAuth()
    {
        return $this->model::where('user_id',auth()->id())
        ->with(['class' => function ($q)
        {
            return $q->with(['calendars'=>function ($q) {
                return $q->with(['class'=>function ($q) {
                    return $q->with(['course']);
                },'class_time']);
            }]);
        }])
        ->get();
    }
}