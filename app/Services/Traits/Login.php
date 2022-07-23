<?php
namespace App\Services\Traits;

use App\Models\User;

trait Login
{
    public function redirect()
    {
        dd(request()->all());
        return $this->socialite::driver('google')->redirect('callback');
    }

    public function callback()
    {
        try {

            $user = ($this->socialite::driver($this->driver()))->stateless()->user();
            $id_social = $this->driver() . '_id';
            $findId = User::where($id_social, $user->id)->first();
            unset($findId->password);
            if ($findId) {
                auth()->login($findId);
                if($findId->hasOrRoles(['admin','auth'])) return redirect('/admin');
                return redirect('/home');
            } else {
                if ($ac = User::where('email', $user->email)->first()) {
                    $ac->$id_social = $user->id;
                    $ac->save();
                } else {

                    $userLogin = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        $id_social => $user->id,
                        'password' => password_hash($user->id, PASSWORD_DEFAULT),
                    ]);
                }
                auth()->login($userLogin);
                return redirect('/home');
            }
        } catch (\Throwable $th) {
            return redirect('/errors');
        }
    }
}