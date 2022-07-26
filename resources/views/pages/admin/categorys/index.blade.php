@extends('layouts_admin.main')
@section('title', 'Danh sách danh mục')
@section('page-title', 'Danh sách danh mục')
@section('content')
    <div>
        <x-index :links="[]" :data="$categorys->toArray()" :route_create="'admin.category.create'" :route_update="'admin.category.edit'" :route_delete="'admin.category.destroy'">
        </x-index>
        <div class="mt-10">

            {{ $categorys->appends(request()->all())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('page-script')
@endsection
