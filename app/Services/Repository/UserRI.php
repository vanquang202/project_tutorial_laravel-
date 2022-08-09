<?php
namespace App\Services\Repository;

interface UserRI
{
     public function getListUser($params = []);
     public function changeRole($params = []);
}
