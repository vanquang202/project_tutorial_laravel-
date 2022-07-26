@extends('layouts_admin.main')
@section('title', 'Chỉnh sửa danh mục')
@section('page-title', 'Chỉnh sửa danh mục')
@section('content')
    <div>
        <x-form :dataForm="[
            [
                'label' => 'Code giảm giá ',
                'type' => 'text',
                'name' => 'code',
                'value' => $voucher->code,
            ],
            [
                'label' => 'Giá trị giảm giá ',
                'type' => 'number',
                'name' => 'value',
                'value' => $voucher->value,
            ],
            [
                'label' => 'Chi tiết giảm giá  ',
                'type' => 'textarea',
                'name' => 'detail',
                'value' => $voucher->detail,
            ],
            [
                'label' => 'Giảm giá theo ',
                'type' => 'select',
                'name' => 'type',
                'value' => $voucher->type,
                'options' => [
                    [
                        'value' => 0,
                        'label' => 'Giảm giá theo phần trăm ',
                    ],
                    [
                        'value' => 1,
                        'label' => 'Giảm giá theo tiền ',
                    ],
                ],
            ],
            [
                'label' => 'Thời hạn voucher hết hạn  ',
                'type' => 'datetime-local',
                'name' => 'dealine',
                'value' => $voucher->dealine,
            ],
            [
                'label' => 'Trạng thái voucher ',
                'type' => 'select',
                'name' => 'status',
                'value' => $voucher->status,
                'options' => [
                    [
                        'value' => 0,
                        'label' => 'Đóng ',
                    ],
                    [
                        'value' => 1,
                        'label' => 'Mở ',
                    ],
                ],
            ],
        ]" :method="'PUT'" :action="route('admin.voucher.update', ['id' => $voucher->id])"></x-form>
    </div>

@endsection
@section('page-script')
@endsection
