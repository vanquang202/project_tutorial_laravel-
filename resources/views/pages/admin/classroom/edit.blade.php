@extends('layouts_admin.main')
@section('title', 'Chỉnh sửa lớp học')
@section('page-title', 'Chỉnh sửa lớp học')
@section('content')
    <div>
        <x-form :dataForm="[
            [
                'label' => 'Tên lớp',
                'type' => 'text',
                'name' => 'name',
                'value' => $data->name,
            ],
            [
                'label' => 'Thuộc khóa học',
                'type' => 'select',
                'name' => 'course_id',
                'options' => $courses,
                'value' => $data->course_id,
            ],
            [
                'label' => 'Giáo viên chủ nghiệm',
                'type' => 'select',
                'name' => 'lecturer_id',
                'options' => $users,
                'value' => $data->lecturer_id,
            ],
            [
                'label' => 'Thời gian mở lớp',
                'type' => 'datetime-local',
                'name' => 'date_open',
                'value' => $data->date_open,
            ],
            [
                'label' => 'Trạng thái',
                'type' => 'select',
                'name' => 'status',
                'options' => [['value' => 1, 'label' => 'Kích hoạt'], ['value' => 0, 'label' => 'Chưa kích hoạt']],
                'value' => $data->status,
            ],
        ]" :method="'PUT'" :action="route('admin.classroom.update', ['id' => $data->id])"></x-form>
    </div>

@endsection
@section('page-script')
@endsection
