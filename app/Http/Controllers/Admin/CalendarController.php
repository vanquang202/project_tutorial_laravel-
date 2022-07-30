<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CrubRequest;
use App\Models\Calendar;
use App\Services\Interfaces\IRuleInterface;
use App\Services\Traits\Crub;
use Illuminate\Http\Request;

class CalendarController extends Controller implements IRuleInterface
{
    use Crub;
    public function __construct(
        public Calendar $model
    ) {
        if(!isset(request()->id)) return redirect()->back()->with('error','Không tìm thấy lớp !');
        $this->classroom_id = request()->id;
        $this->views = [
            'router-list' => route('admin.classroom.show',['id' => $this->classroom_id])
        ];
    }



    public function getRules($method ,$id)
    {
        return [
            'class_time_id' => 'required',
            'class_id' => 'required',
            'date' => 'required',
            'detail' => 'required',
        ];
    }
}