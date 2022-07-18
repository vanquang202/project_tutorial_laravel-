<div>
    @props(['dataForm', 'action', 'method'])
    <form action="{{ $action }}" method="POST">
        @csrf
        @method($method)
        @foreach ($dataForm as $data)
            <div class="form-group">
                <label class="form-label">{{ $data['label'] ?? $dara['name'] }}</label>
                <input type="{{ $data['type'] }}" value="{{ $data['value'] ?? old($data['name']) }}"
                    name="{{ $data['name'] }}" class="form-control">
                @error($data['name'])
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        @endforeach
        <div class="mt-2 form-group">
            <button class="btn btn-primary" type="submit">Submt</button>
        </div>
    </form>
</div>
