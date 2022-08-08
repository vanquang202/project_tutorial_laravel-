@extends('layout_web.index')
@section('conten_web')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('web.home') }}">Trang chủ </a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Khóa học</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-9 order-2">

                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="float-md-left mb-4">
                                <h2 class="text-black h5">Tất cả các khóa học </h2>
                            </div>
                            {{-- <div class="d-flex">
                                <div class="dropdown mr-1 ml-md-auto">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Latest
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                        @foreach ($categorys as $category)
                                            <a class="dropdown-item" href="#">{{ $category->name }}</a>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <a class="dropdown-item" href="#">Relevance</a>
                                        <a class="dropdown-item" href="#">Name, A to Z</a>
                                        <a class="dropdown-item" href="#">Name, Z to A</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Price, low to high</a>
                                        <a class="dropdown-item" href="#">Price, high to low</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row mb-5">

                        @foreach ($courses as $course)
                            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                <x-card-couse :data="$course"></x-card-couse>
                            </div>
                        @endforeach


                    </div>
                    <div class="row" data-aos="fade-up">
                        <div class="col-md-12 text-center">

                            {{ $courses->appends(request()->all())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Danh mục khóa học </h3>
                        <ul class="list-unstyled mb-0">
                            @foreach ($categorys as $category)
                                <li class="mb-1">
                                    <a href="{{ route('web.shop', ['category_id' => $category->id]) }}" class="d-flex">
                                        <span>{{ $category->name }}</span>
                                        <span class="text-black ml-auto">({{ count($category->cousers) }})</span>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection
