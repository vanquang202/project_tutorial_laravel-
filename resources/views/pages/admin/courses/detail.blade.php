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
                                @foreach (json_decode($course->images ?? '[]') as $key => $image)
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
                                                    <label for="form-upload-by-{{ $key }}">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Files/Upload-folder.svg--><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24"
                                                                        height="24" />
                                                                    <path
                                                                        d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                                        fill="#000000" opacity="0.3" />
                                                                    <path
                                                                        d="M8.54301601,14.4923287 L10.6661,14.4923287 L10.6661,16.5 C10.6661,16.7761424 10.8899576,17 11.1661,17 L12.33392,17 C12.6100624,17 12.83392,16.7761424 12.83392,16.5 L12.83392,14.4923287 L14.9570039,14.4923287 C15.2331463,14.4923287 15.4570039,14.2684711 15.4570039,13.9923287 C15.4570039,13.8681299 15.41078,13.7483766 15.3273331,13.6563877 L12.1203391,10.1211145 C11.934804,9.91658739 11.6185961,9.90119131 11.414069,10.0867264 C11.4020553,10.0976245 11.390579,10.1091008 11.3796809,10.1211145 L8.1726869,13.6563877 C7.98715181,13.8609148 8.00254789,14.1771227 8.20707501,14.3626578 C8.29906387,14.4461047 8.41881721,14.4923287 8.54301601,14.4923287 Z"
                                                                        fill="#000000" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        Cập nhật ảnh mới
                                                    </label>
                                                    <div class="form-error-{{ $key }}"></div>
                                                    <input data-key="{{ $key }}" data-id="{{ $course->id }}"
                                                        data-image_old="{{ $image }}" style="display: none"
                                                        type="file" id="form-upload-by-{{ $key }}"
                                                        class="file-upload-change form-control">
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
                                <label for="upload-file" style="background: white;  border: 1px solid black;"
                                    class="symbol symbol-circle symbol-50px">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Navigation/Plus.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect fill="#000000" x="4" y="11" width="16"
                                                    height="2" rx="1" />
                                                <rect fill="#000000" opacity="0.3"
                                                    transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) "
                                                    x="4" y="11" width="16" height="2"
                                                    rx="1" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </label>
                                <input data-id="{{ $course->id }}" style="display: none" type="file"
                                    id="upload-file">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-10">
                    <div class="p-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="card shadow-sm mt-2">
                                    <div class="card-header">
                                        <h3 class="card-title">Chi tiết </h3>
                                    </div>
                                    <div class="card-body">
                                        {{ $course->detail }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card shadow-sm mt-2">
                                    <div class="card-header">
                                        <h3 class="card-title">Giá </h3>
                                    </div>
                                    <div class="card-body">
                                        {{ $course->price }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="card shadow-sm mt-2">
                                    <div class="card-header">
                                        <h3 class="card-title">Trạng thái </h3>
                                    </div>
                                    <div class="card-body">
                                        {{ $course->status == 1 ? 'Mở' : 'Đóng ' }}
                                    </div>
                                </div>

                            </div>
                            <div class="col-12">

                                <div class="card shadow-sm mt-2 p-4">
                                    <div class="table-responsive table-responsive-md">

                                        <table class="table table-row-bordered table-row-gray-300 gy-7  table-hover">
                                            <thead class="">
                                                <tr>
                                                    <th>Giảng viên</th>
                                                    <th>Email giảng viên</th>
                                                    <th>Tên phòng</th>
                                                    <th> Trạng thái</th>
                                                    <th> Ngày mở</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($course->classRooms as $class)
                                                    <tr>
                                                        <td>{{ $class->lecturer->name }}</td>
                                                        <td>{{ $class->lecturer->email }}</td>
                                                        <td>{{ $class->name }}</td>
                                                        <td>{{ $class->status }}</td>
                                                        <td>{{ $class->date_open }}</td>
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary btn-lg"
                                                                data-bs-toggle="modal" data-bs-target="#modelId">
                                                                Xem học viên
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="modelId" tabindex="-1"
                                                                role="dialog" aria-labelledby="modelTitleId"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Modal title</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="container-fluid">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Tên</th>
                                                                                            <th>Email</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($class->students as $user)
                                                                                            <tr>
                                                                                                <td>{{ $user->user->name }}
                                                                                                </td>
                                                                                                <td>{{ $user->user->email }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach

                                                                                    </tbody>
                                                                                </table>

                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="button"
                                                                                class="btn btn-primary">Save</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <script>
                                                                var modelId = document.getElementById('modelId');

                                                                modelId.addEventListener('show.bs.modal', function(event) {
                                                                    // Button that triggered the modal
                                                                    let button = event.relatedTarget;
                                                                    // Extract info from data-bs-* attributes
                                                                    let recipient = button.getAttribute('data-bs-whatever');

                                                                    // Use above variables to manipulate the DOM
                                                                });
                                                            </script>

                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('page-script')
    <script>
        const _token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('assets/js/system/course/index.js') }}"></script>
@endsection
