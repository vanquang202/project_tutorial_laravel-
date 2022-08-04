<?php

namespace App\Models;

use App\Services\Interfaces\ICrubModelInterface;
use App\Services\Traits\CrubModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model implements ICrubModelInterface
{
    use HasFactory, CrubModel;
    protected $table = "students";
    protected $primaryKey = "id";
    // public $fillable = [];
    protected $guarded = [];
}