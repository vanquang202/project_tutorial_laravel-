<?php

namespace App\Services\Repository;

interface StudentRI
{
     public function getCalendarByAuth();
     public function getDataIndexList($params, $with);
}