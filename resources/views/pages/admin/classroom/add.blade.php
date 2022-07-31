@extends('layouts_admin.main')
@section('title', 'Thêm mới lớp học')
@section('page-title', 'Thêm mới lớp học')
@section('content')
    <div>
        <x-form :dataForm="[
            [
                'label' => 'Tên lớp',
                'type' => 'text',
                'name' => 'name',
            ],
            [
                'label' => 'Thuộc khóa học',
                'type' => 'select',
                'name' => 'course_id',
                'options' => $courses,
            ],
            [
                'label' => 'Giáo viên chủ nghiệm',
                'type' => 'select',
                'name' => 'lecturer_id',
                'options' => $users,
            ],
            [
                'label' => 'Thời gian mở lớp',
                'type' => 'datetime-local',
                'name' => 'date_open',
            ],
            [
                'label' => 'Trạng thái',
                'type' => 'select',
                'name' => 'status',
                'options' => [['value' => 1, 'label' => 'Kích hoạt'], ['value' => 0, 'label' => 'Chưa kích hoạt']],
            ],
        ]" :method="'POST'" :action="route('admin.classroom.store')"></x-form>
    </div>

@endsection
@section('page-script')
@endsection
