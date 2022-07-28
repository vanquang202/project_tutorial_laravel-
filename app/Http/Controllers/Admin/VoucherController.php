<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use App\Services\Interfaces\IRuleInterface;
use Illuminate\Http\Request;
use App\Services\Traits\Crub;

class VoucherController extends Controller implements IRuleInterface
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
        $vouchers = $this->model::paginate(5);
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

    public function getRules($method, $id)
    {
        $rule = [];
        switch ($method):
            case 'POST':
                $rule = [
                    'code' => 'required|unique:vouchers,code',
                    'value' => 'required',
                    'detail' => 'required',
                    'type' => 'required',
                    'status' => 'required',
                    'dealine' => 'required|date',
                ];
                break;
            case 'PUT':
                $rule = [
                    'code' => "required|unique:vouchers,code,$id,id",
                    'value' => 'required',
                    'detail' => 'required',
                    'type' => 'required',
                    'status' => 'required',
                    'dealine' => 'required|date',
                ];
                break;
            default:
                break;
        endswitch;

        return $rule;
    }
}