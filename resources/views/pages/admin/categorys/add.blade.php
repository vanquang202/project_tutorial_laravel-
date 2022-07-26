@extends('layouts_admin.main')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('content')
    <div>
        <x-form :dataForm="[
            [
                'label' => 'Tên danh mục',
                'type' => 'text',
                'name' => 'name',
            ],
        ]" :method="'POST'" :action="route('admin.category.store')"></x-form>
    </div>

@endsection
@section('page-script')
@endsection
