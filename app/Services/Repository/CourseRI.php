<?php
namespace App\Services\Repository;

interface CourseRI
{
    public function getDataListPaginate($params = []);
     public function updateApiImage($r,$id,$flagUpload,$imagesNew);
}
