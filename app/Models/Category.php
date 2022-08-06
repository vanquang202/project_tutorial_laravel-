<?php

namespace App\Models;

use App\Services\Interfaces\ICrubModelInterface;
use App\Services\Traits\CrubModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model implements ICrubModelInterface
{
    use HasFactory, CrubModel;
    protected $table = "categorys";
    protected $primaryKey = "id";
    // public $fillable = ['name'];
    protected $guarded = [];



    public function getDataList($params = [], $with = [])
    {
        return $this->with($with)->withCount($with)->get();
    }

    public function getDataListPaginate($params = [], $with = [])
    {
        return $this->with($with)->withCount(['cousers'])->paginate($params['limit'] ?? null);
    }

    public function cousers()
    {
        return $this->belongsToMany(Course::class, 'category_course', 'category_id', 'course_id');
    }
}