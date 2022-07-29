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

    public function getDataIndexList($params)
    {
        return $this->with(['lecturer','course'])->paginate($params['limit']);
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class,'lecturer_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}