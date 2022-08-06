@extends('layout_web.index')
@section('conten_web')
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="icon-check_circle display-3 text-success"></span>
                    <h2 class="display-3 text-black">Cảm ơn!</h2>
                    <p class="lead mb-5">Bạn đã đặt khóa học thành công !!</p>
                    <p><a href="{{ route('web.calendar.index') }}" class="btn btn-sm btn-primary">Trở về trang các khóa
                            học</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
