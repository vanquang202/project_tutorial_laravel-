@extends('layout_web.index')
@section('conten_web')
    <div class="site-wrap">
        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="/">Trang chủ </a> <span class="mx-2 mb-0">/</span> <a
                            class="text-black">Lịch học </strong></div>
                </div>
            </div>
        </div>
        <div class="site-section">
            <div class=" container">
                <select class="form-control" id="form-select">
                    <option @selected(request('sub') == 90) value="sub=90">90 ngày trước</option>
                    <option @selected(request('sub') == 30) value="sub=30">30 ngày trước</option>
                    <option @selected(request('sub') == 7) value="sub=7">7 ngày trước</option>
                    <option @selected(request('next') == 7) value="next=7" selected>7 ngày tới</option>
                    <option @selected(request('next') == 30) value="next=30">30 ngày tới</option>
                    <option @selected(request('next') == 90) value="next=90">90 ngày tới</option>
                </select>
                <table class="table site-block-order-table mb-5">
                    <thead>
                        <tr>
                            <th>Khóa học </th>
                            <th>Lớp </th>
                            <th>Ca học </th>
                            <th>Ghi chú </th>
                            <th>Ngày học </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($calendars as $calendar)
                            <tr>
                                <td>{{ $calendar['class']['course']['name'] }}</td>
                                <td>{{ $calendar['class']['name'] }}</td>
                                <td>{{ $calendar['class_time']['name'] }}</td>
                                <td>{{ $calendar['detail'] }}</td>
                                <td>{{ $calendar['date'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js_web')
    <script>
        $('#form-select').on('change', function() {
            window.location = '{{ route('web.calendar.index') }}' + '?' + $(this).val();
        });
    </script>
@endsection
