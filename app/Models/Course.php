<?php

namespace App\Models;

use App\Services\Interfaces\ICrubModelInterface;
use App\Services\Traits\CrubModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Course extends Model implements ICrubModelInterface
{
    use HasFactory, CrubModel;
    protected $table = "courses";
    protected $primaryKey = "id";
    // public $fillable = [];
    protected $guarded = [];

    public function getDataList($params = [])
    {
        return $this->get()->take($params['limit']);
    }

    public function classRooms()
    {
        return $this->hasMany(Classroom::class,  'course_id');
    }

    public function categorys()
    {
        return $this->belongsToMany(Category::class, 'category_course', 'course_id', 'category_id');
    }
}