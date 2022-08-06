<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $compact = [];
    public function __construct(
        public Course $course,
        public Category $category
    ) {
    }
    public function home()
    {
        $courses = $this->course->getDataList(['limit' => 20]);
        $this->compact['courses'] =  $courses;
        return view('pages.web.home', $this->compact);
    }
    public function shop()
    {
        // dd(request());
        $courses = $this->course->getDataListPaginate(['limit' => 6,'category_id' => request()->category_id ?? null]);
        $categorys = $this->category->getDataList([], ['cousers']);
        $this->compact['courses'] =  $courses;
        $this->compact['categorys'] =  $categorys;


        return view('pages.web.shop', $this->compact);
    }
}
