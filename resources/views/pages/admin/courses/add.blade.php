@extends('layouts_admin.main')
@section('title', 'Thêm mới khóa học')
@section('page-title', 'Thêm mới khóa học')
@section('content')
    <div>
        <x-form :dataForm="[
            [
                'label' => 'Tên khóa học',
                'type' => 'text',
                'name' => 'name',
            ],
            [
                'label' => 'Ảnh chính',
                'type' => 'file',
                'name' => 'image',
            ],
            [
                'label' => 'Ảnh phụ',
                'type' => 'images',
                'name' => 'images[]',
            ],
            [
                'label' => 'Giá khóa học',
                'type' => 'number',
                'name' => 'price',
            ],
            [
                'label' => 'Mô tả',
                'type' => 'textarea',
                'name' => 'detail',
            ],
            [
                'label' => 'Trạng thái',
                'type' => 'select',
                'name' => 'status',
                'options' => [['value' => 1, 'label' => 'Kích hoạt'], ['value' => 0, 'label' => 'Chưa kích hoạt']],
            ],
            [
                'label' => 'Danh mục',
                'type' => 'selects',
                'name' => 'categorys[]',
                'options' => $categorys,
            ],
        ]" :method="'POST'" :action="route('admin.course.store')"></x-form>
    </div>


@endsection
@section('page-script')
@endsection
