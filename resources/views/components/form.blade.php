<div class="card card-flush p-5">
    @props(['dataForm', 'action', 'method'])
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)
        @foreach ($dataForm as $data)
            <div class="form-group mb-5">
                <label class="form-label">{{ $data['label'] ?? $dara['name'] }}</label>

                @if ($data['type'] == 'textarea')
                    <textarea class="form-control" name="{{ $data['name'] }}" id="" rows="3">{{ $data['value'] ?? old($data['name']) }}</textarea>
                @elseif ($data['type'] == 'selects')
                    <select name="{{ $data['name'] }}" class="form-control form-select-solid" data-control="select2"
                        data-placeholder="Vui lòng chọn !!" data-allow-clear="true" multiple="multiple">
                        @foreach ($data['options'] as $option)
                            <option @selected(in_array($option['value'], $data['value'] ?? [])) value="{{ $option['value'] }}">{{ $option['label'] }}
                            </option>
                        @endforeach
                    </select>
                @elseif ($data['type'] == 'select')
                    <select name="{{ $data['name'] }}" class="form-control form-select-solid" data-control="select2"
                        data-placeholder="Vui lòng chọn !!" data-allow-clear="true">
                        @foreach ($data['options'] as $option)
                            <option @selected(($data['value'] ?? -1) == $option['value']) value="{{ $option['value'] }}">{{ $option['label'] }}
                            </option>
                        @endforeach
                    </select>
                @elseif ($data['type'] == 'images')
                    <input type="file" multiple class="form-control"
                        value="{{ $data['value'] ?? old($data['name']) }}"name="{{ $data['name'] }}">
                @else
                    @if ($data['type'] == 'date' && isset($data['min']))
                        @php
                            $dt = \Carbon\Carbon::parse($data['min']);
                        @endphp
                    @endif
                    @if ($data['type'] == 'file' && isset($data['value']))
                        @if (file_exists(public_path('images') . '/' . $data['value']))
                            <img style="width:100%;max-height:400px" src="{{ asset('images/' . $data['value']) }}"
                                alt="">
                        @else
                            <img style="width:100%;max-height:400px"
                                src="https://redzonekickboxing.com/wp-content/uploads/2017/04/default-image-620x600.jpg"
                                alt="">
                        @endif
                    @endif
                    <input type="{{ $data['type'] }}"
                        min="{{ $data['type'] == 'date' && isset($data['min']) ? $dt->toDateString() : null }}"
                        value="{{ $data['value'] ?? old($data['name']) }}" name="{{ $data['name'] }}"
                        class="form-control">
                @endif
                @error($data['name'])
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        @endforeach
        <div class="mt-2 form-group">
            <button class="btn btn-primary" type="submit">Lưu</button>
        </div>

    </form>
</div>
