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
        return $this->with(['lecturer', 'course'])->withCount(['calendars'])->paginate($params['limit'] ?? null);
    }

    public function getClassroom($id)
    {
        return $this
            ->where('status', 1)
            ->whereId($id)
            ->with(['calendars' => function ($q) {
                return $q->with(['class_time'])->orderBy("date", "asc");
            }])->first();
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function calendars()
    {
        return $this->hasMany(Calendar::class, 'class_id');
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id')->with('user');
    }
}