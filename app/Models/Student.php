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

    public function checkUserPayCardClassCourseExists($data)
    {
        return $this
            ->where('user_id', $data['user_id'])
            ->where('course_id', $data['course_id'])
            ->where('class_id', $data['class_id'])
            ->exists();
    }

    public function class()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function classRoom($class_id)
    {
        return $this->where('class_id', $class_id)->with(['user'])->get();
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function getDataIndexList($params = [], $with = [])
    {
        return $this->with(count($with) == 0 ? [] : $with)->paginate($params['limit']);
    }
}
