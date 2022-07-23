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

            $driver_id = request()->session()->get('driver') . '_id';
            $user = $this->socialite::driver(request()->session()->get('driver'))
                ->stateless()
                ->user();

            $userCheck = User::where($driver_id,$user->id)
                ->where('email', $user->email)
                ->first();

            request()->session()->forget('driver');
            if($this->middleLogin()) return $this->checkUserAdmin($userCheck ,$user ,$driver_id);
            return $this->checkUser($userCheck ,$user ,$driver_id);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }

    private function checkUserLocal($userCheck ,$user ,$driver_id)
    {
         if ($userCheck) {
                auth()->login($userCheck);
                return $this->redirect();
        } else {
            $userCheck = User::create([
                'name' => $user->name,
                'email' => $user->email,
                $driver_id => $user->id
            ]);
            auth()->login($userCheck);
            return $this->redirect();
        }
    }

     private function checkUserAdmin($userCheck ,$user ,$driver_id)
    {
         if ($userCheck) {
                auth()->login($userCheck);
                return $this->redirect();
        }
        return redirect('login')->withErrors(['error' => "Tài khoản chưa tồn tại !"]);
    }
}