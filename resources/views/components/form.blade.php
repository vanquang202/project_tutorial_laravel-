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
                        data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                        @foreach ($data['options'] as $option)
                            <option @selected($data['value'] == $option['value']) value="{{ $option['value'] }}">{{ $option['label'] }}
                            </option>
                        @endforeach
                    </select>
                @elseif ($data['type'] == 'select')
                    <select name="{{ $data['name'] }}" class="form-control form-select-solid" data-control="select2"
                        data-placeholder="Select an option" data-allow-clear="true">
                        @foreach ($data['options'] as $option)
                            <option @selected($data['value'] == $option['value']) value="{{ $option['value'] }}">{{ $option['label'] }}
                            </option>
                        @endforeach
                    </select>
                @elseif ($data['type'] == 'images')
                    <input type="file" multiple class="form-control"
                        value="{{ $data['value'] ?? old($data['name']) }}"name="{{ $data['name'] }}">
                @else
                    <input type="{{ $data['type'] }}" value="{{ $data['value'] ?? old($data['name']) }}"
                        name="{{ $data['name'] }}" class="form-control">
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
