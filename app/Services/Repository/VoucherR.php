<?php
namespace App\Services\Repository;

use App\Models\Voucher;
use App\Services\Traits\CrubModelRepository;

class VoucherR implements CrubModelRI,VoucherRI
{
    use CrubModelRepository;

    public function __construct(public Voucher $model)
    {}

    public function getDataIndexList($params)
    {
        return  $this->model->getDataIndexList($params);
    }
}