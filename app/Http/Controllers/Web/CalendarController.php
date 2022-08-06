<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Repository\CalendarRI;
use App\Services\Repository\StudentRI;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function __construct(public StudentRI $student)
    {}
    public function index()
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $dtNow = $dt;
        $students = $this->student->getCalendarByAuth();
        $arr = [];
        foreach ($students->toArray()  as $student)
        {
            if(isset( $student['class']))
                if(isset( $student['class']['calendars']))
                    $arr = array_merge($arr, $student['class']['calendars']);
        }
        $calendars= collect($arr);
        if(!request('sub') && !request('next'))
            $calendars = $calendars->where('date','>=',$dtNow->toDateString())->where('date','<=', $dt->addDays(7)->toDateString());
        if(request('sub'))
            $calendars = $calendars->where('date','<=',$dtNow->toDateString())->where('date','>=', $dt->subDays(request('sub'))->toDateString());
        if(request('next'))
            $calendars = $calendars->where('date','>=',$dtNow->toDateString())->where('date','<=', $dt->addDays(request('next'))->toDateString());
        $calendars= $calendars
            ->sortBy("date")
            ->toArray();
        return view('pages.web.calendar',['calendars'=> $calendars]);
    }
}
