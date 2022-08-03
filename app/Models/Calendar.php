<?php

namespace App\Models;

use App\Services\Interfaces\ICrubModelInterface;
use App\Services\Traits\CrubModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Calendar extends Model implements ICrubModelInterface
{
    use HasFactory, Notifiable, CrubModel;
    protected $table = "calendars";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function getPaginate($params = [],$with = [])
    {
        return $this->with($with)->paginate($params['limit']);
    }

    public function class()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function class_time()
    {
        return $this->belongsTo(ClassTime::class);
    }
}