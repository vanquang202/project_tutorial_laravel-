@extends('layout_web.index')
@section('conten_web')
    <div class="site-section block-8">
        <div class=" container">

            <div class="row ">
                <div class="col-md-12 col-lg-5 mb-5">
                    <div
                        style="background-image: url({{ asset('images/' . $data->image) }});height: 500px; width: 100%; background-position: center; background-repeat: no-repeat;background-size: cover;">
                    </div>
                </div>
                <div class="col-md-12 col-lg-7  ">
                    <h1><a href="#">{{ $data->name }}</a></h1>
                    <h2>
                        {{ number_format($data->price, 0, ',', '.') }} đ
                    </h2>
                    <p><a href="{{ route('web.checkout.view', ['couser_id' => $data->id]) }}"
                            class="btn btn-primary btn-sm">Mua
                            ngay</a></p>
                    <p>{{ $data->detail }}</p>
                    {{-- <hr> --}}
                    {{-- <div class="mb-3">
                        <label for="" class="form-label">Chọn lớp học</label>
                        <select class="form-control form-control-sm|form-control-lg" name="" id="">
                            <option value="null">Vui lòng chọn lớp </option>
                            @foreach ($data->classRooms as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach

                        </select>
                    </div> --}}
                    <!-- Button trigger modal -->
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                        Mua khóa học
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">

                                </div>
                                <div class="modal-body">
                                    <h1 class=" text-center">Bạn xác nhận mua khóa học chứ !!!</h1>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                    <button type="button" class="btn btn-primary">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <hr>
                    <label for="" class="form-label">Danh mục khóa học thuộc</label>
                    <br>
                    <ul class=" d-inline-flex m-0 p-0">
                        @foreach ($data->categorys as $cate)
                            <li class=" mx-4"><a
                                    href="{{ route('web.shop', ['category' => $cate->id]) }}">{{ $cate->name }}</a></li>
                        @endforeach
                    </ul>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
