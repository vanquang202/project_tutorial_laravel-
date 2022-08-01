<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Course;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    protected $compact = [];
    public function __construct(
        private Course $course,
        private Classroom $classroom
    ) {
    }
    public function viewCheckout()
    {

        if (!request('couser_id')) {
            return redirect()->back();
        }
        $data = $this->course->getDataModelById(request('couser_id'), ['classRooms']);
        if (is_null($data)) {
            return  redirect(404);
        }

        $this->compact['data'] =  $data;
        return view('pages.web.checkout', $this->compact);
    }

    public function getCalendar(Request $request)
    {
        $classroom = $this->classroom->getDataModelById(
            $request->id,
            ['calendars' => function ($q) {
                return $q->with(['class_time']);
            }]
        )->calendars;
        return response()->json(['payload' => $classroom], 200);
    }
}