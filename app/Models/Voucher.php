<?php

namespace App\Models;

use App\Services\Interfaces\ICrubModelInterface;
use App\Services\Traits\CrubModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model implements ICrubModelInterface
{
    use HasFactory, CrubModel;
    protected $table = "vouchers";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function getDataIndexList($params = [])
    {
        return $this->paginate($params['limit']);
    }

    public function findVocher($code)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        return $this->where('dealine','>',$dt->toDateTimeString())->where('code', $code)->first();
    }
}
