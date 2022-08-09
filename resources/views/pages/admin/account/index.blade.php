@extends('layouts_admin.main')
@section('title', 'Danh sách tài khoản ')
@section('page-title', 'Danh sách tài khoản ')
@section('content')
    <div class="card card-plush p-3">
        <input id="seach-ip" type="text" value="{{ request()->q ?? '' }}" class="form-control" placeholder="Tìm kiếm ">
        <table class="table table-row-bordered table-row-gray-300 gy-7  table-hover ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Trạng thái kết nối </th>
                    <th>Quyền </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $k => $user)
                    <tr>
                        <td>{{ $k + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->google_id)
                                Google
                            @elseif ($user->facebook_id)
                                Facebook
                            @elseif ($user->github_id)
                                Github
                            @else
                                Không liên kết
                            @endif
                        </td>
                        <td>
                            <select class="select-account-role  form-control">
                                <option @selected(count($user->roles) == 0) value="0">Chưa phân quyền </option>
                                <option @selected((count($user->roles) > 0 ? $user->roles[0]->name : 'a') == 'admin')
                                    value="{{ route('admin.change.role.account') }}?email={{ $user->email }}&role=admin">
                                    Quyền
                                    quản trị viên </option>
                                <option @selected((count($user->roles) > 0 ? $user->roles[0]->name : 'a') == 'teacher')
                                    value="{{ route('admin.change.role.account') }}?email={{ $user->email }}&role=teacher">
                                    Quyền
                                    giáo viên </option>
                                <option @selected((count($user->roles) > 0 ? $user->roles[0]->name : 'a') == 'student')
                                    value="{{ route('admin.change.role.account') }}?email={{ $user->email }}&role=student">
                                    Quyền
                                    học viên </option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-10">

            {{ $users->appends(request()->all())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('page-script')
    <script>
        $(".select-account-role").on("change", function() {
            if ($(this).val() == 0) return false;
            window.location = $(this).val();
            return false;
        });
        $("#seach-ip").on("change", function() {
            if ($(this).val().trim() == "") {
                window.location = '{{ route('admin.list.account') }}';
                return false;
            }
            window.location = '{{ route('admin.list.account') }}?q=' + $(this).val();
            return false;
        });
    </script>
@endsection
