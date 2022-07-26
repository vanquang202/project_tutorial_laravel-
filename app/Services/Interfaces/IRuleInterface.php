<?php

namespace App\Services\Interfaces;

use App\Http\Requests\CrubRequest;
use Illuminate\Http\Request;
use Arr;

interface IRuleInterface
{
    public function getRules($method ,$id);
}