<?php
namespace App\Services\Repository;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserR implements UserRI
{

    public function __construct(public User $model,public Role $role)
    {}

    public function getListUser($params = [])
    {
        $model = $this->model::with('roles');
        if($params['q'])
            $model
            ->where("email","like","%".$params['q']."%")
            ->orWhere("name","like","%".$params['q']."%");
        return $model
        ->orderBy("id","desc")
        ->paginate($params['limit']);
    }

    public function changeRole($params = [])
    {
        $role = $this->role::whereName($params["role"])->first();
        if(!$role) return false;
        $user = $this->model::whereEmail($params["email"])->first();
        if(!$user) return false;
        $user->syncRoles($role);
        return true;
    }
}
