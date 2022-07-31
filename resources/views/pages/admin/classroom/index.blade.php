@extends('layouts_admin.main')
@section('title', 'Danh sách lớp học')
@section('page-title', 'Danh sách lớp học')
@section('content')
    <div>
        <x-index :links="['name' => 'admin.classroom.show']" :data="$dataList->toArray()" :route_create="'admin.classroom.create'" :route_update="'admin.classroom.edit'" :route_delete="'admin.classroom.destroy'">
        </x-index>
        <div class="mt-10">
            {{ $dataList->appends(request()->all())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('page-script')
@endsection
