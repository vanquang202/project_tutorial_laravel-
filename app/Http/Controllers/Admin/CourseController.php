<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImageRequest;
use App\Models\Course;
use App\Services\Interfaces\IRuleInterface;
use App\Services\Traits\Crub;
use App\Services\Traits\UploadImage;
use Illuminate\Http\Request;

class CourseController extends Controller implements IRuleInterface
{
    use Crub, UploadImage;

    public function __construct(public Course $model)
    {
        $this->views = [
            'router-list' => route('admin.course.index'),
            'list' => 'pages.admin.courses.index',
            'create' => 'pages.admin.courses.add',
            'edit' => 'pages.admin.courses.edit',
            'detail' => 'pages.admin.courses.detail'
        ];
    }

    public function getRules($method, $id)
    {
        $rule = [];
        switch ($method):
            case 'POST':
                $rule = [
                    'name' => 'required|unique:courses,name',
                    'image' => 'required',
                    'detail' => 'required',
                    'status' => 'required',
                    'price' => 'required',
                ];
                break;
            case 'PUT':
                $rule = [
                    'name' => "required|unique:courses,name,$id,id",
                    'detail' => 'required',
                    'status' => 'required',
                    'price' => 'required',
                ];

                break;
            default:
                break;
        endswitch;

        return $rule;
    }

    public function getDataCreate()
    {
        return [];
    }

    public function   getDataIndex()
    {
        $courses = $this->model->getDataListPaginate(['limit' => 5]);
        $courses->makeHidden(['images', 'detail']);
        return  ['dataList' => $courses];
    }

    public function getDataEdit($id)
    {
        $data = $this->model::find($id);
        return ['data' => $data];
    }

    public function show($id)
    {
        $course = $this->model->getDataModelById($id);
        if (!$course) return redirect()->back()->with('error', 'Không thể xem chi tiết của khóa học này !');
        return view($this->views['detail'], ['course' => $course]);
    }


    // Api

    public function updateImageCourse(UploadImageRequest $r, $id)
    {
        return $this->uploadFile($r, $id);
    }

    private function uploadFile($r, $id, $flagUpload = false)
    {
        if (!$flagUpload) $nameImageNew = $this->upLoadImage($r->image, $r->image_old);
        if ($flagUpload) $nameImageNew = $this->upLoadImage($r->image);
        if (!$nameImageNew) return response()->json([
            "status" => false,
        ]);

        $imagesNew = [$nameImageNew];
        $course = $this->model->getDataModelById($id);
        $images = json_decode($course->images);
        foreach ($images as $image) {
            if ($flagUpload == false && $image == $r->image_old) continue;
            array_push($imagesNew, $image);
        }
        $course->updateDataModel([
            'images' => $imagesNew
        ]);

        return response()->json([
            "status" => true,
        ]);
    }

    public function uploadImageCourse(UploadImageRequest $r, $id)
    {
        return $this->uploadFile($r, $id, true);
    }
}