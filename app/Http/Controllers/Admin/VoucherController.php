<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Services\Traits\Crub;
class VoucherController extends Controller
{
    use Crub;
    public function __construct(public Voucher $model)
    {
        $this->views = [
            'router-list' => route('admin.voucher.index'),
            'list' => 'pages.admin.vouchers.index',
            'create' => 'pages.admin.vouchers.add',
            'edit' => 'pages.admin.vouchers.edit',
        ];
    }

    public function getDataIndex()
    {
        $vouchers = $this->model::paginate(1);
        return  ['vouchers' => $vouchers];
    }

    public function getDataCreate()
    {
        return [];
    }

    public function getDataEdit($id)
    {
        $voucher = $this->model::find($id);
        return ['voucher' => $voucher];
    }
}