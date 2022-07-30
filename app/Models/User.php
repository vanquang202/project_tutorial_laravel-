<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;
    protected $table = "users";
    protected $guarded = [];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addUser($data = [])
    {
        $user = $this::create($data);
        return $user;
    }

    public function getDataList($params = [], $get = [])
    {
        if (count($get) > 0) {
            $query =  $this->get($get)->take($params['limit'] ?? null);
        } else {
            $query =  $this->get()->take($params['limit'] ?? null);
        }
        return $query;
    }
}