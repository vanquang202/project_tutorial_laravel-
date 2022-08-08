<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\OrderCard;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use App\Models\Voucher;
use App\Services\Traits\ReponseApi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{

    use ReponseApi;
    protected $compact = [];
    public function __construct(
        private Course $course,
        private Classroom $classroom,
        private Voucher $voucher,
        private Student $student,
        private Classroom $class,
        private User $user,
        private Mail $mail,
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
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $classroom = $this->classroom->getClassroom($request->id)->calendars;
        if (strtotime($classroom[0]->date) <= strtotime($dt->toDateString())) return  $this->responseApi(['status' => false, 'payload' => "Lớp học đã bắt đầu ! Không thể tham gia "]);
        return $this->responseApi(['status' => true, 'payload' => $classroom]);
    }
    public function getVocher(Request $request)
    {
        $voucher = $this->voucher->findVocher($request->code);
        if ($voucher) {
            return $this->responseApi(['status' => true, 'payload' =>  $voucher]);
        } else {
            return $this->responseApi(['status' => false, 'message' => 'Mã voucher không tồn tại !! ']);
        }
    }
    public function checkout(Request $request)
    {
        try {
            $code_bill = time() . rand(000001, 999999);
            if ($this->student->checkUserPayCardClassCourseExists([
                'user_id' => $request->user_id,
                'course_id' => $request->couser_id,
                'class_id' => $request->class_id,
            ])) return $this->responseApi(['status' => false, 'message' => 'Bạn đã là học viên của lớp này! Vui lòng chọn lớp khác ']);

            $student = $this->student->storeDataModel([
                'user_id' => $request->user_id,
                'course_id' => $request->couser_id,
                'class_id' => $request->class_id,
                'price' => $request->priceCouser,
                'code' => $code_bill,
                'status' => 1
            ]);

            if (!$student)  return $this->responseApi(['status' => false, 'message' => 'Đã xảy ra lỗi với hóa đơn của bạn']);
            $user = $this->user->getDataModelById($request->user_id);
            $this->mail::to($user->email)->send(new OrderCard([
                'subject' => "Thanh toán hóa đơn $code_bill thành công !",
                "student" => $student,
                "user" => $user,
                "course" => $this->course->getDataModelById($request->couser_id),
                "class" => $this->class->getDataModelById($request->class_id),
            ]));
            return $this->responseApi(['status' => true, 'payload' => route('web.thankyou')], 200);
        } catch (\Throwable $th) {
            return $this->responseApi(['status' => false, 'message' => "Không thể hoàn tất hóa đơn của bạn vui lòng liên hệ quản trị viên "], 404);
        }
    }
}