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
                             <div class="col-6">

                                <div class="card shadow-sm mt-2">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modelId">
                                      Xem học viên
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                    <div class="modal-header">
                                                            <h5 class="modal-title">Modal title</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                       <table class="table table-hover table-inverse table-responsive">
                                                        <thead class="thead-inverse">
                                                            <tr>
                                                                <th>Tên</th>
                                                                <th>Email</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($student as $user )
                                                                    
                                                                <tr>
                                                                   
                                                                    <td>{{$user->user->name}}</td>
                                                                    <td>{{$user->user->email}}</td>
                                                                </tr>
                                                                @endforeach
                                                               
                                                            </tbody>
                                                       </table>
                                                       
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <script>
                                        var modelId = document.getElementById('modelId');
                                    
                                        modelId.addEventListener('show.bs.modal', function (event) {
                                              // Button that triggered the modal
                                              let button = event.relatedTarget;
                                              // Extract info from data-bs-* attributes
                                              let recipient = button.getAttribute('data-bs-whatever');
                                    
                                            // Use above variables to manipulate the DOM
                                        });
                                    </script>
                                    
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 ">
                    <div class="card shadow-sm mt-2 p-2">
                        <h2>Thêm lịch học</h2>
                        @php
                            if ($calendar) {
                                $method = 'PUT';
                                $action = route('admin.calendar.update',['id'=>$calendar->id]) . '?classroom_id=' . $classroom->id;
                                $dataCreate = [
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
                                        'value' => $calendar->class_time_id,
                                    ],
                                    [
                                        'label' => 'Ngày học',
                                        'type' => 'date',
                                        'name' => 'date',
                                        'min' => $classroom->date_open,
                                        'value' => $calendar->date,
                                    ],
                                    [
                                        'label' => 'Ghi chú lịch học ',
                                        'type' => 'textarea',
                                        'name' => 'detail',
                                        'value' => $calendar->detail,
                                    ],
                                ];
                            } else {
                                $method = 'POST';
                                $action = route('admin.calendar.store') . '?classroom_id=' . $classroom->id;
                                $dataCreate = [
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
                                ];
                            }
                        @endphp
                      
                        <x-form :dataForm="$dataCreate" :method="$method" :action="$action"></x-form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-sm mt-2 p-2">
                          <h1>Danh sách lịch học</h1>
                        <x-index :hidens="['create' => true,]" :data="$calendars->toArray()" :route_create="'admin.classroom.create'" :route_update="['admin.classroom.show', ['id' => $classroom->id], 'calendar_id']" :route_delete="['admin.calendar.destroy',['classroom_id' => $classroom->id],'id']">
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
