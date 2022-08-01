<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $compact = [];
    public function __construct(private Course $course)
    {
    }
    public function detailCouse($id)
    {
        $data = $this->course->getDataModelById($id, ['categorys']);
        if (is_null($data)) {
            return  redirect(404);
        }
        $this->compact['data'] =  $data;
        return view('pages.web.detail_couse', $this->compact);
    }
}