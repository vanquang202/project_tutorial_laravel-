<?php
namespace App\Services\Repository;

use App\Models\Calendar;
use App\Models\Classroom as ModelsClassroom;
use App\Models\ClassTime;
use App\Services\Traits\CrubModelRepository;

class CalendarR implements CrubModelRI,CalendarRI
{
    use CrubModelRepository;

    public function __construct(public Calendar $model)
    {}

}