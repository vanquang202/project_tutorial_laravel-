<div>
    @props(['data', 'route_create', 'route_update', 'route_delete', 'links'])

    @if (count($data['data']) > 0)
        <table border="1">
            <thead>
                <tr>
                    @foreach ($data['data'][0] as $key => $item)
                        @if (!in_array($key, $rolColume))
                            <th>{{ \Str::title($key) }}</td>
                        @endif
                    @endforeach
                    <td colspan="2">
                        <a href="{{ route($route_create) }}">Thêm mới </a>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['data'] as $v)
                    <tr>
                        @foreach ($v as $key => $item)
                            @if (!in_array($key, $rolColume))
                                <td>
                                    @if (in_array($key, $medias))
                                        <img src="{{ $item }}" alt="">
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
                            <a href="{{ route($route_update, ['id' => $v['id']]) }}">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route($route_delete, ['id' => $v['id']]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button>Delete</button>
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
