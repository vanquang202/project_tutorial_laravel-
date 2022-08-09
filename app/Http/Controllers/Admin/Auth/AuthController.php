<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Traits\Login;
use Illuminate\Http\Request;
use Socialite;

class AuthController extends Controller
{
    use Login;
    public function __construct(
        public Socialite $socialite,
        public User $user
    )
    {}

    public function login()
    {
        return view('pages.admin.auth.index');
    }

    public function middleLogin()
    {
           return true;
    }

}
