<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\IRuleInterface;
use App\Services\Repository\UserR;
use App\Services\Traits\ReponseApi;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    use ReponseApi;

    public function __construct(public UserR $user)
    {}

    public function index()
    {
        $data = [];
        $data['users'] = $this->user->getListUser([
            "limit" => request()->limit ?? 10,
            "q" => request()->q ?? null
        ]);
        return view("pages.admin.account.index",$data);
    }

    public function changeRole(Request $r)
    {
        if(!auth()->user()->hasRole("admin"))
            return redirect(route("admin.list.account"))->with("error", "Không có quyền cập nhật");
        if(auth()->user()->email == $r->email)
            return redirect(route("admin.list.account"))->with("error", "Không cập nhật quyền cho chính mình !");
        $changeRole = $this->user->changeRole([
            "role" => $r->role,
            "email" => $r->email
        ]);
        if($changeRole == false) return redirect(route("admin.list.account"))->with("error", "Không thể cập nhật quyền ");
        return  redirect(route("admin.list.account"))->with("success", "Thành  công ");
    }
}