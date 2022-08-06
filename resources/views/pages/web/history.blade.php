@extends('layout_web.index')
@section('conten_web')
    <div class="site-wrap">
        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="/">Trang chủ </a> <span class="mx-2 mb-0">/</span> <a
                            class="text-black">Lịch sử </strong></div>
                </div>
            </div>
        </div>
        <div class="site-section">
            <div class=" container">
                <table class="table site-block-order-table mb-5">
                    <thead>
                        <tr>
                            <th>Mã hóa đơn </th>
                            <th>Khóa học </th>
                            <th>Lớp </th>
                            <th>Học phí</th>
                            <th>Tình trạng </th>
                            <th>Ngày đăng ký </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->code }}</td>
                                <td>{{ $student->course->name }}</td>
                                <td>{{ $student->class->name ?? 'Không có lớp học ' }}</td>
                                <td>{{ number_format($student->price) }} đ</td>
                                <td>{{ $student->status == 1 ? 'Thành công ' : 'Đang xử lý ' }}</td>
                                <td>{{ $student->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js_web')
@endsection
