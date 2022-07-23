<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Traits\Login;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use Login;
}