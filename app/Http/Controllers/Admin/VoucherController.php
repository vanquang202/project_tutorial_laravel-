<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\IRuleInterface;
use App\Services\Repository\VoucherR;
use App\Services\Traits\Crub;

class VoucherController extends Controller implements IRuleInterface
{
    use Crub;

    public function __construct(public VoucherR $model)
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
        $vouchers = $this->model->getDataIndexList(['limit' => 5]);
        return  ['vouchers' => $vouchers];
    }

    public function getDataCreate()
    {
        return [];
    }

    public function getDataEdit($id)
    {
        $voucher = $this->model->getDataModelById($id);
        return ['voucher' => $voucher];
    }

    public function getRules($method, $id)
    {
        $rule = [];
        $ruleCode = "";
        switch ($method):
            case 'POST':
                $ruleCode =  "required|unique:vouchers,code";
                break;
            case 'PUT':
                $ruleCode =  "required|unique:vouchers,code,$id,id";
                break;
            default:
                break;
        endswitch;
        $rule = [
            'code' => $ruleCode,
            'value' => 'required',
            'detail' => 'required',
            'type' => 'required',
            'status' => 'required',
            'dealine' => 'required|date',
        ];
        return $rule;
    }
}