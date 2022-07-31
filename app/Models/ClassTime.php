<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Services\Interfaces\ICrubModelInterface;
use App\Services\Traits\CrubModel;
use Illuminate\Database\Eloquent\Model;

class ClassTime extends Model implements ICrubModelInterface
{
    use HasFactory, CrubModel;
    protected $table = "class_time";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function getAll()
    {
        return $this->get(['id as value', 'name as label']);
    }
}