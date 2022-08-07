<?php
namespace App\Services\Repository;

use App\Models\Course;
use App\Services\Traits\CrubModelRepository;

class CourseR implements CrubModelRI,CourseRI
{
    use CrubModelRepository;

    public function __construct(public Course $model)
    {}

    public function getDataListPaginate($params = [])
    {
        return $this->model->getDataListPaginate($params);
    }

    public function updateApiImage($r,$id,$flagUpload,$imagesNew)
    {
        $course = $this->model->getDataModelById($id);
        $images = json_decode($course->images ?? "[]");
        foreach($images as $image)
        {
            if($flagUpload == false && $image == $r->image_old) continue;
            array_push($imagesNew,$image);
        }
        $course->updateDataModel([
            'images' => $imagesNew
        ]);
        return $course;
    }

    public function syncCategorys($data,$categorys)
    {
        $data->categorys()->sync($categorys);
    }

    public function searchData($content)
    {
        return $this
        ->model
        ->where("name","like","%$content%")
        ->orWhere("detail","like","%$content%")
        ->get();
    }

    public function getAllDashboard()
    {
        return $this->model->withCount(['students'])->get()->map(function ($q) {
            return [
                "value" => $q->students_count,
                "category" => $q->name
            ];
        });
    }
}