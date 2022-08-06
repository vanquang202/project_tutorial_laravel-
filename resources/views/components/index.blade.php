<div class="card card-flush p-4">
    @props(['data', 'route_create', 'route_update', 'route_delete', 'links', 'hidens'])
    @if (!isset($hidens['create']))
        <div class=" d-flex justify-content-end align-content-end">
            <a class="btn btn-primary" href="{{ route($route_create) }}" role="button">Thêm mới</a>
        </div>
    @endif
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
                            <span class="svg-icon svg-icon-dark svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/General/Settings-2.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
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
                                        @elseif (in_array($key, $dataMuntipleStatus))
                                            @foreach ($dataMuntipleStatusValue[$key] as $k1 => $v1)
                                                @if ($k1 == $item)
                                                    {{ $v1 }}
                                                @endif
                                            @endforeach
                                        @else
                                            @if (is_array($item))
                                                @if (isset($relationshipModel[$key]))
                                                    {{ $item[$relationshipModel[$key]] }}
                                                @else
                                                    {{ $item['name'] ?? 'Chưa tồn tại key name ' }}
                                                @endif
                                            @elseif (isset($links[$key]))
                                                @if (isset($item['status']))
                                                    @if ($item['status'] == 1)
                                                        <a
                                                            href="{{ route($links[$key], ['id' => $v['id']]) }}">{{ $item }}</a>
                                                    @else
                                                        {{ $item }}
                                                    @endif
                                                @else
                                                    <a
                                                        href="{{ route($links[$key], ['id' => $v['id']]) }}">{{ $item }}</a>
                                                @endif
                                            @else
                                                {{ $item }}
                                            @endif
                                        @endif
                                    </td>
                                @endif
                            @endforeach
                            <td>
                                @if (!isset($hidens['update']))
                                    @if (is_array($route_update))
                                        @php
                                            if (isset($route_update[2])) {
                                                $dataRoute = array_merge($route_update[1], [
                                                    $route_update[2] => $v['id'],
                                                ]);
                                            }
                                        @endphp
                                        <a href="{{ route($route_update[0], $dataRoute) }}" type="button"
                                            class="btn btn-info btn-sm mb-2">
                                            Sửa
                                        </a>
                                    @else
                                        <a href="{{ route($route_update, ['id' => $v['id']]) }}" type="button"
                                            class="btn btn-info btn-sm mb-2">
                                            Sửa
                                        </a>
                                    @endif
                                @endif

                                <br>
                                @if (!isset($hidens['delete']))
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($countRelationship as $rela)
                                        @if (isset($v[$rela]))
                                            @if ($v[$rela] > 0)
                                                @php
                                                    $count = $count + 1;
                                                @endphp
                                            @endif
                                        @endif
                                    @endforeach
                                    @if ($count == 0)
                                        @if (is_array($route_delete))
                                            @php
                                                if (isset($route_delete[2])) {
                                                    $dataRoute = array_merge($route_delete[1], [
                                                        $route_delete[2] => $v['id'],
                                                    ]);
                                                }
                                            @endphp
                                            <form action="{{ route($route_delete[0], $dataRoute) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-warning  btn-sm">Xóa </button>
                                            </form>
                                        @else
                                            <form action="{{ route($route_delete, ['id' => $v['id']]) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-warning  btn-sm">Xóa </button>
                                            </form>
                                        @endif
                                    @endif
                                @endif
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
