<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Repository\ClassroomRI;
use App\Services\Repository\CourseRI;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(public CourseRI $course)
    {}

    public function index()
    {
        $data = [];
        $data['course'] = $this->course->getAllDashboard();
        return view('pages.admin.dashboard.index',$data);
    }
}