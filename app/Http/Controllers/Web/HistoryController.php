<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\IRuleInterface;
use App\Services\Repository\StudentRI;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct(public StudentRI $student)
    {

    }

    public function index()
    {
        $data = [];
        $data['students'] = $this->student->getCalendarByAuth(true);
        return view('pages.web.history',$data);
    }
}