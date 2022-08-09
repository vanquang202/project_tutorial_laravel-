@props(['data'])
<div
    style="background-image: url({{ asset('images/' . $data['image']) }});height: 270px; width: 100%; background-position: center; background-repeat: no-repeat;background-size: cover;">
</div>
<div class="block-4 p-4 text-center border">
    <h2
        style=" font-size: 14px; font-weight:
                                            600; color: #5b5b5b; display: block; display: -webkit-box; max-width: 100%;
                                            line-height: 1.6; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
                                            text-overflow: ellipsis; overflow: hidden; text-align: initial;">
        <a href="{{ route('web.couser.detail', ['id' => $data['id']]) }}">{{ $data['name'] }}</a>
    </h2>
    <p class="text-primary font-weight-bold">{{ number_format($data['price'], 0, ',', '.') }} đ</p>
</div>
