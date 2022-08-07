<?php
namespace App\Services\Repository;

interface CategoryRI
{
    public function getAll();
     public function searchData($content);
}