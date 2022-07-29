@extends('layouts_admin.main')
@section('title', 'Chi tiết khóa khóa học ' . $course->name)
@section('page-title', 'Chi tiết khóa khóa học ' . $course->name)
@section('content')
    <div class="card card-plush p-5">
        {{-- Breadcrumb --}}
        <ol class="breadcrumb text-muted fs-6 fw-bold">
            <li class="breadcrumb-item pe-3"><a href="{{ route('admin.course.index') }}" class="pe-3">Danh sách khóa học </a>
            </li>
            <li class="breadcrumb-item px-3 text-muted">Chi tiết khóa khóa học {{ $course->name }}</li>
        </ol>
        <div>
            <div class="row">
                <div class="col-2">
                    <div class="p-2 ">
                        <div class="mt-2 p-1 card shadow-sm">
                            <h2>Khóa học : <i style="font-size: 40px">{{ $course->name }}</i></h2>
                            <img style="width: 100% ;max-height:300px" src="{{ asset('images/' . $course->image) }}"
                                alt="">
                            <div class="symbol-group symbol-hover">
                                @foreach (json_decode($course->images) as $key => $image)
                                    <div class="symbol symbol-circle symbol-50px">
                                        <img type="button" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_{{ $key }}"
                                            src="{{ file_exists(public_path('images') . '/' . $image)
                                                ? asset('images/' . $image)
                                                : 'https://t4.ftcdn.net/jpg/04/70/29/97/360_F_470299797_UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg' }}"
                                            alt="" />
                                    </div>

                                    <div class="modal fade" tabindex="-1" id="kt_modal_{{ $key }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Chi tiết ảnh </h5>

                                                    <!--begin::Close-->
                                                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <span class="svg-icon svg-icon-2x"></span>
                                                    </div>
                                                    <!--end::Close-->
                                                </div>

                                                <div class="modal-body">
                                                    <img style="width: 100%"
                                                        src="{{ file_exists(public_path('images') . '/' . $image)
                                                            ? asset('images/' . $image)
                                                            : 'https://t4.ftcdn.net/jpg/04/70/29/97/360_F_470299797_UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg' }}"
                                                        alt="" />
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Thoát
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="symbol symbol-circle symbol-50px">
                                    <i class="bi bi-folder-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-10">
                    <div class="p-2">

                        <div class="card shadow-sm mt-2">
                            <div class="card-header">
                                <h3 class="card-title">Chi tiết </h3>
                            </div>
                            <div class="card-body">
                                {{ $course->detail }}
                            </div>
                        </div>

                        <div class="card shadow-sm mt-2">
                            <div class="card-header">
                                <h3 class="card-title">Giá </h3>
                            </div>
                            <div class="card-body">
                                {{ $course->price }}
                            </div>
                        </div>

                        <div class="card shadow-sm mt-2">
                            <div class="card-header">
                                <h3 class="card-title">Trạng thái </h3>
                            </div>
                            <div class="card-body">
                                {{ $course->status == 1 ? 'Mở' : 'Đóng ' }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('page-script')
@endsection
