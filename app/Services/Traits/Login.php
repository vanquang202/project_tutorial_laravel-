<?php

namespace App\Services\Traits;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

trait Login
{
    public function redirect()
    {
        if ($this->middleLogin()) request()->session()->put('flag_admin', true);
        if (!$this->middleLogin()) request()->session()->put('flag_admin', false);
        request()->session()->put('driver', request()->driver);
        return $this->socialite::driver(request()->driver)->redirect(route('web.login.callback'));
    }

    public function callback()
    {
        try {
            $driver_id = request()->session()->get('driver') . '_id';
            $user = $this->socialite::driver(request()->session()->get('driver'))->stateless()->user();
            $userCheck = User::where($driver_id, $user->id)
                ->where('email', $user->email)
                ->first();
            request()->session()->forget('driver');
            if (request()->session()->get('flag_admin')) return $this->checkUserAdmin($userCheck, $user, $driver_id);
            return $this->checkUserLocal($userCheck, $user, $driver_id);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return abort(404);
        }
    }

    private function checkUserLocal($userCheck, $user, $driver_id)
    {
        request()->session()->forget('flag_admin');
        if ($userCheck) {
            auth()->login($userCheck);
            return redirect('/');
        } else {
            $userCheck = $this->user->addUser([
                'name' => $user->name,
                'email' => $user->email,
                $driver_id => $user->id
            ]);
            $userCheck->assignRole('student');
            auth()->login($userCheck);
            Mail::to($user->email)->send(new RegisterMail());
            return redirect('/');
        }
    }

    private function checkUserAdmin($userCheck, $user, $driver_id)
    {
        request()->session()->forget('flag_admin');
        if ($userCheck) {
            if ($userCheck->hasAnyRole(['admin'])) {
                auth()->login($userCheck);
                return $this->redirectAdmin();
            }
            return redirect(route('admin.auth.login'))->withErrors(['error' => "Tài khoản không đủ thẩm quyền !"]);
        }
        return redirect(route('admin.auth.login'))->withErrors(['error' => "Tài khoản chưa tồn tại !"]);
    }


    public function redirectAdmin()
    {
        return redirect('/admin');
    }

    public function redirectLocal()
    {
        return redirect('/');
    }
}
