@extends('layouts_admin.main')
@section('title', 'Danh sách hóa đơn')
@section('page-title', 'Danh sách hóa đơn')
@section('content')
    <div class="card card-flush p-4">
        <div class="table-responsive table-responsive-md">


            <table class="table table-row-bordered table-row-gray-300 gy-7  table-hover ">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Họ tên</th>
                        <th>Khóa học</th>
                        <th>Lớp</th>
                        <th>Trạng thái thanh toán</th>
                        <th>Mã đơn đăng kí</th>
                        <th colspan="2">Thao tác </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key => $student)
                        <tr>
                            <td scope="row">{{ $key + 1 }}</td>
                            <td>{{ $student->user->name }}</td>
                            <td>{{ $student->course->name }}</td>
                            <td>{{ $student->class->name }}</td>
                            <td>
                                @if ($student->status == 0)
                                    <p type="button" class="alert alert-danger">Chưa thanh toán</p>
                                @else
                                    <p type="button" class="alert alert-primary">Đã thanh toán</p>
                                @endif
                            </td>
                            <td>{{ $student->code }}</td>
                            <td>
                                <form action="{{ route('admin.student.destroy', ['id' => $student->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-warning  btn-sm">Xóa </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('admin.student.print', ['id' => $student->id]) }}"
                                    class="btn btn-primary">In
                                    hóa đơn </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-10">

                {{ $students->appends(request()->all())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
@section('page-script')
@endsection
