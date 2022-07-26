@extends('layouts_admin.main')
@section('title', 'Chỉnh sửa danh mục')
@section('page-title', 'Chỉnh sửa danh mục')
@section('content')
    <div>
        <x-form :dataForm="[
            [
                'label' => 'Tên danh mục',
                'type' => 'text',
                'name' => 'name',
                'value' => $category->name,
            ],
        ]" :method="'PUT'" :action="route('admin.category.update', ['id' => $category->id])"></x-form>
    </div>

@endsection
@section('page-script')
@endsection
