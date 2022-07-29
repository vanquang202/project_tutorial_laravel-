@extends('layouts_admin.main')
@section('title', 'Danh sách khóa học')
@section('page-title', 'Danh sách khóa học')
@section('content')
    <div>
        <x-index :links="[
            'name' => 'admin.course.show',
        ]" :data="$dataList->toArray()" :route_create="'admin.course.create'" :route_update="'admin.course.edit'" :route_delete="'admin.course.destroy'">
        </x-index>
        <div class="mt-10">

            {{ $dataList->appends(request()->all())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('page-script')
@endsection
