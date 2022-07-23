<?php
namespace App\Services\Traits;

use App\Models\User;

trait Login
{
    public function redirect()
    {
        request()->session()->put('driver',request()->driver);
        return $this->socialite::driver(request()->driver)->redirect(route('login.callback'));
    }

    public function callback()
    {
        try {
            $user = ($this->socialite::driver(request()->session()->get('driver')))->stateless()->user();
            $userLogin = User::where('email', $user->email)->first();
            dd($user);
            request()->session()->forget('driver');
            if ($userLogin) {
                auth()->login($userLogin);
                return redirect('/dashboard');
            } else {
                $userLogin = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                ]);
                auth()->login($userLogin);
                return redirect('/dashboard');
            }
        } catch (\Throwable $th) {
            return redirect('/errors');
        }
    }
}