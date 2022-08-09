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

    public function getDataListActive($params = [], $get = [])
    {
        if (count($get) > 0) {
            $query =  $this->where('status', 1)->get($get)->take($params['limit'] ?? null);
        } else {
            $query =  $this->where('status', 1)->get()->take($params['limit'] ?? null);
        }
        return $query;
    }

    public function getDataList($params = [])
    {
        $query =  $this->where('status', 1)
            ->orderBy("id","desc")
            ->limit($params['limit'] ?? null)
            ->get();
        return $query;
    }

    public function getDataListPaginate($params = [])
    {

        $query =  $this->with([])
            ->withCount(['classRooms','students','categorys']) ;
        if(isset($params['category_id'])) $query->whereHas('categorys',function ($q) use ($params){
            return $q->whereIn('category_id',[$params['category_id']]);
        });
        return $query
            ->orderBy('id','desc')
            ->paginate($params['limit'] ?? null);
    }
    // public function whenWhereHasRelationship($value = null, $relation = null, $tableColumn = null)
    // {
    //     if ($value == null) return $this;
    //     if ($relation == null) return $this;
    //     if ($tableColumn == null) return $this;
    //     return $this->whereHas($relation, function ($query) use ($value,  $tableColumn) {
    //         $query->where($tableColumn, $value);
    //     });
    // }
    public function classRooms()
    {
        return $this->hasMany(Classroom::class,  'course_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class,'course_id');
    }

    public function categorys()
    {
        return $this->belongsToMany(Category::class, 'category_course', 'course_id', 'category_id');
    }
}