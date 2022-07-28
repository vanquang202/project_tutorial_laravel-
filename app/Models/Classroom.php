<?php

namespace App\Models;

use App\Services\Traits\CrubModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory, CrubModel;
    protected $table = "class";
    protected $primaryKey = "id";
    // public $fillable = [];
    protected $guarded = [];
}