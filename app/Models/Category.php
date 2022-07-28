<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory, Notifiable;
    protected $table = "categorys";
    protected $primaryKey = "id";
    // public $fillable = ['name'];
    protected $guarded = [];
}