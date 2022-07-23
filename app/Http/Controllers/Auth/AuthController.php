<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Traits\Login;
use Illuminate\Http\Request;
use Socialite;
class AuthController extends Controller
{
    use Login;
    public function __construct(public Socialite $socialite)
    {}

    public function login()
    {
        return view('auth.login_admin');
    }
}