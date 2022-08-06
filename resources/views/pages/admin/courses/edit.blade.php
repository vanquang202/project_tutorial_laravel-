@extends('layouts_admin.main')
@section('title', 'Chỉnh sửa khóa học')
@section('page-title', 'Chỉnh sửa khóa học')
@section('content')
    <div>
        <x-form :dataForm="[
            [
                'label' => 'Tên khóa học',
                'type' => 'text',
                'name' => 'name',
                'value' => $data->name,
            ],
            [
                'label' => 'Ảnh chính',
                'type' => 'file',
                'name' => 'image',
                'value' => $data->image,
            ],

            [
                'label' => 'Giá khóa học',
                'type' => 'number',
                'name' => 'price',
                'value' => $data->price,
            ],
            [
                'label' => 'Mô tả',
                'type' => 'textarea',
                'name' => 'detail',
                'value' => $data->detail,
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
                'value' => $category,
            ],
        ]" :method="'PUT'" :action="route('admin.course.update', ['id' => $data->id])"></x-form>
    </div>


@endsection
@section('page-script')
@endsection
