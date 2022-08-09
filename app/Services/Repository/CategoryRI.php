<?php
namespace App\Services\Repository;

interface CategoryRI
{
    public function getAll();
    public function getDataListPaginate($params = [], $with = []);
    public function searchData($content);
}