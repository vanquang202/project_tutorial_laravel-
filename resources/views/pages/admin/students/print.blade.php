<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
</head>

<body>
    <table border="1" class="table table-row-bordered table-row-gray-300 gy-7  table-hover ">
        <thead class="thead-inverse">
            <tr>
                <th>Ho ten</th>
                <th>Khoa hoc</th>
                <th>Lop</th>
                <th>Trang thai thanh toan</th>
                <th>Ma hoa don</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $student->user->name }}</td>
                <td>{{ $student->course->name }}</td>
                <td>{{ $student->class->name }}</td>
                <td>
                    @if ($student->status == 0)
                        Chưa thanh toán
                    @else
                        Đã thanh toán
                    @endif
                </td>
                <td>{{ $student->code }}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>
