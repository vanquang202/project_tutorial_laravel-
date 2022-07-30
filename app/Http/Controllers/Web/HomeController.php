<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public $compact = [];
    public function __construct(
        public Course $course
    ) {
    }
    public function home()
    {
        $courses = $this->course->getDataList(['limit' => 20]);
        $this->compact['courses'] =  $courses;

        return view('pages.web.home', $this->compact);
    }
}