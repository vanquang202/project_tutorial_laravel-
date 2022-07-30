@extends('layouts_admin.main')
@section('title', 'Chi tiết lớp học ' . $classroom->name)
@section('page-title', 'Chi tiết lớp học ' . $classroom->name)
@section('content')
    <div class="card card-plush p-5">
        <ol class="breadcrumb text-muted fs-6 fw-bold">
            <li class="breadcrumb-item pe-3"><a href="{{ route('admin.classroom.index') }}" class="pe-3">Danh sách lớp học
                </a>
            </li>
            <li class="breadcrumb-item px-3 text-muted">Chi tiết lớp học {{ $classroom->name }}</li>
        </ol>
        <div>
            <div class="row">
                <div class="col-2">
                    <div class="p-2 ">
                        <div class="mt-2 p-1 card shadow-sm">
                            <h2>Lớp học : <i style="font-size: 30px">{{ $classroom->name }}</i></h2>
                            <h2>Giảng viên : <i>{{ $classroom->lecturer->name }}</i></h2>
                            <h2>Khóa học : <i>{{ $classroom->course->name }}</i></h2>
                        </div>
                    </div>
                </div>

                <div class="col-10">
                    <div class="p-2">
                        <div class="row">
                            <div class="col-6">
                                <div class="card shadow-sm mt-2">
                                    <div class="card-header">
                                        <h3 class="card-title">Thời gian mở lớp học </h3>
                                    </div>
                                    <div class="card-body">
                                        {{ $classroom->date_open }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="card shadow-sm mt-2">
                                    <div class="card-header">
                                        <h3 class="card-title">Trạng thái </h3>
                                    </div>
                                    <div class="card-body">
                                        {{ $classroom->status == 1 ? 'Mở' : 'Đóng ' }}
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 ">
                    <div class="card shadow-sm mt-2 p-2">
                        <h2>Thêm lịch học</h2>
                        <x-form :dataForm="[
                            [
                                'label' => '',
                                'type' => 'hidden',
                                'name' => 'class_id',
                                'value' => $classroom->id,
                            ],
                            [
                                'label' => 'Ca học ',
                                'type' => 'select',
                                'name' => 'class_time_id',
                                'options' => $class_time->toArray(),
                            ],
                            [
                                'label' => 'Ngày học',
                                'type' => 'date',
                                'name' => 'date',
                                'min' => $classroom->date_open,
                            ],
                            [
                                'label' => 'Ghi chú lịch học ',
                                'type' => 'textarea',
                                'name' => 'detail',
                            ],
                        ]" :method="'POST'" :action="route('admin.calendar.store') . '?id=' . $classroom->id"></x-form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-sm mt-2 p-2">
                        <x-index :hidens="['create' => true, 'delete' => true]" :data="$calendars->toArray()" :route_create="'admin.classroom.create'" :route_update="'admin.classroom.edit'" :route_delete="'admin.classroom.destroy'">
                        </x-index>
                        <div class="mt-10">
                            {{ $calendars->appends(request()->all())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
@endsection
