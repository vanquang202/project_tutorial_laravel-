@extends('layout_web.index')
@section('conten_web')
    <div class="site-section block-8">
        <div class=" container">

            <div class="row ">
                <div class="col-md-12 col-lg-5 mb-5">
                    <div
                        style="background-image: url({{ asset('images/' . $data->image) }});height: 500px; width: 100%; background-position: center; background-repeat: no-repeat;background-size: cover;">
                    </div>
                </div>
                <div class="col-md-12 col-lg-7  ">
                    <h1><a href="#">{{ $data->name }}</a></h1>
                    <h2>
                        {{ number_format($data->price, 0, ',', '.') }} đ
                    </h2>
                    <p><a href="{{ route('web.checkout.view', ['couser_id' => $data->id]) }}"
                            class="btn btn-primary btn-sm">Mua
                            ngay</a></p>
                    <p>{{ $data->detail }}</p>

                    <hr>
                    <label for="" class="form-label">Danh mục khóa học thuộc</label>
                    <br>
                    <div>
                        @foreach ($data->categorys as $cate)
                            <a class="mx-2"
                                href="{{ route('web.shop', ['category_id' => $cate->id]) }}">{{ $cate->name }}</a>
                        @endforeach
                    </div>
                    <hr>
                    <div>
                        @if ($data->images)
                            @foreach (json_decode($data->images) as $img)
                                <div style="width:100%" class=" mt-2 ">
                                    <img style="width:100%" src="{{ asset('images/' . $img) }}" alt="">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
