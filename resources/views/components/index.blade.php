@props(['data', 'route_create', 'route_update', 'route_delete', 'links'])
<div class="card card-flush p-4">
    <div class=" d-flex justify-content-end align-content-end">
        <a class="btn btn-primary" href="{{ route($route_create) }}" role="button">Thêm mới</a>
    </div>
    <div class="table-responsive table-responsive-md">

        @if (count($data['data']) > 0)

            <table class="table table-row-bordered table-row-gray-300 gy-7  table-hover ">
                <thead>
                    <tr>
                        <th>#</th>
                        @foreach ($data['data'][0] as $key => $item)
                            @if (!in_array($key, $rolColume))
                                <th>{{ \Str::title($key) }}</td>
                            @endif
                        @endforeach
                        <th style="width: 10%">
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['data'] as $k => $v)
                        <tr>
                            <td>{{ $k + 1 }}</td>
                            @foreach ($v as $key => $item)
                                @if (!in_array($key, $rolColume))
                                    <td>
                                        @if (in_array($key, $medias))
                                            <img style="max-width: 130px" src="{{ asset('images/' . $item) }}"
                                                alt="">
                                        @else
                                            @if (isset($links[$key]))
                                                <a href="{{ $links[$key] }}">{{ $item }}</a>
                                            @else
                                                {{ $item }}
                                            @endif
                                        @endif
                                    </td>
                                @endif
                            @endforeach
                            <td>
                                <a href="{{ route($route_update, ['id' => $v['id']]) }}" type="button"
                                    class="btn btn-info btn-sm mb-2">
                                    Edit
                                </a>
                                <br>
                                <form action="{{ route($route_delete, ['id' => $v['id']]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-warning  btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            No item
        @endif

        <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    </div>
</div>
