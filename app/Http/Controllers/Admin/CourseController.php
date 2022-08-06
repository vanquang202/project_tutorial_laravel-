<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImageRequest;
use App\Services\Interfaces\IRuleInterface;
use App\Services\Repository\CategoryRI;
use App\Services\Repository\CourseRI;
use App\Services\Traits\Crub;
use App\Services\Traits\ReponseApi;
use App\Services\Traits\UploadImage;

class CourseController extends Controller implements IRuleInterface
{
    use Crub, UploadImage, ReponseApi;

    public function __construct(
        public CourseRI $model,
        public CategoryRI $category
    ) {
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
        $data = [];
        $data['categorys'] = $this->category->getAll();
        return $data;
    }

    public function   getDataIndex()
    {
        $courses = $this->model->getDataListPaginate(['limit' => 5]);
        $courses->makeHidden(['images', 'detail']);
        return  ['dataList' => $courses];
    }

    public function getDataEdit($id)
    {
        $data = [];
        $data['categorys'] = $this->category->getAll();
        $data['data'] = $this->model->getDataModelById($id, ['categorys']);
        $data['category'] = $data['data']->categorys->map(function ($q) {
            return $q->id;
        })->toArray();
        return $data;
    }

    public function show($id)
    {
        $course = $this->model->getDataModelById($id, ['classRooms' => function ($q) {
            return $q->with([
                'lecturer',
                'students'
            ]);
        }]);
        // dd($course);
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
        if (!$nameImageNew) return $this->responseApi([
            "status" => false,
        ]);
        $imagesNew = [$nameImageNew];
        $course = $this->model->updateApiImage($r, $id, $flagUpload, $imagesNew);

        if (!$course) {
            $this->unLinkImage($nameImageNew);
            return $this->responseApi([
                "status" => false,
            ]);
        }
        return $this->responseApi([
            "status" => true,
        ]);
    }

    public function uploadImageCourse(UploadImageRequest $r, $id)
    {
        return $this->uploadFile($r, $id, true);
    }
}