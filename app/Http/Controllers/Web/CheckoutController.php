<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Student;
use App\Models\Voucher;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    protected $compact = [];
    public function __construct(
        private Course $course,
        private Classroom $classroom,
        private Voucher $voucher,
        private Student $student
    ) {
    }
    public function viewCheckout()
    {

        if (!request('couser_id')) {
            return redirect()->back();
        }
        $data = $this->course->getDataModelById(
            request('couser_id'),
            ['classRooms' => function ($q) {
                return $q->where('status', 1);
            }]
        );
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
    public function getVocher(Request $request)
    {
        $voucher = $this->voucher->findVocher($request->code);
        return response()->json($voucher, 200);
    }
    public function checkout(Request $request)
    {
        $code_bill = time() . rand(000001, 999999);
        $this->student->storeDataModel([
            'user_id' => $request->user_id,
            'course_id' => $request->couser_id,
            'class_id' => $request->class_id,
            'price' => $request->priceCouser,
            'code' => $code_bill,
            'status' => 0
        ]);
        return response()->json(['payload' => route('web.thankyou')], 200);
    }
}