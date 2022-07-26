@extends('layouts_admin.main')
@section('title', 'Thêm mới voucher ')
@section('page-title', 'Thêm mới voucher ')
@section('content')
    <div>
        <x-form :dataForm="[
            [
                'label' => 'Code giảm giá ',
                'type' => 'text',
                'name' => 'code',
            ],
            [
                'label' => 'Giá trị giảm giá ',
                'type' => 'number',
                'name' => 'value',
            ],
            [
                'label' => 'Chi tiết giảm giá  ',
                'type' => 'textarea',
                'name' => 'detail',
            ],
            [
                'label' => 'Giảm giá theo ',
                'type' => 'select',
                'name' => 'type',
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
            ],
            [
                'label' => 'Trạng thái voucher ',
                'type' => 'select',
                'name' => 'status',
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
        ]" :method="'POST'" :action="route('admin.voucher.store')"></x-form>
    </div>

@endsection
@section('page-script')
@endsection
