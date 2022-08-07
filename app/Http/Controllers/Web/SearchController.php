<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\IRuleInterface;
use App\Services\Repository\CategoryRI;
use App\Services\Repository\CourseRI;
use App\Services\Traits\ReponseApi;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    use ReponseApi;
    public function   __construct(
        private CategoryRI $category,
        private CourseRI $course
    )
    {}

    public function search(Request $r)
    {
        try {
            $data = ["status" => true];
            $data['dataCategory'] = $this->category->searchData($r->content);
            $data['dataCourse'] = $this->course->searchData($r->content);
            return $this->responseApi($data);
        } catch (\Throwable $th) {
            return $this->responseApi(["status" => false,"message" => "Lỗi tìm kiếm "]);
        }
    }
}