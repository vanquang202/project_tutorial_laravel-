<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                    <form action="" class="site-block-top-search">
                        <div style="position: relative;" class=" d-flex justify-between align-items-center">
                            <i class="bi bi-search"></i>
                            <input id="search" type="text" class="form-control border-0" placeholder="Tìm kiếm ">
                            <div id="show-search"
                                style="
                                position: absolute;
                                background: blacck;
                                background: white;
                                padding: 5px;
                                top: 1005;
                                max-height: 500px;
                                overflow: auto;
                                left: 0;
                                right: 0;
                                z-index: 20;
                                top: 100%;
                            ">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                    <div class="site-logo">
                        <a href="{{ route('web.home') }}" class="js-logo-clone">Tutorial</a>
                    </div>
                </div>

                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                    <div class="site-top-icons">
                        <ul>
                            @if (auth()->check())
                                <div class="btn-group">
                                    <button type="button" class="btn btn-bg-white btn-sm dropdown-toggle"
                                        id="dropdownMenuReference" data-toggle="dropdown">
                                        {{ auth()->user()->name }}</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <a class="dropdown-item" href="{{ route('web.calendar.index') }}">Lịch học </a>
                                        <a class="dropdown-item" href="{{ route('web.history.index') }}">Lịch sử </a>
                                        <a class="dropdown-item" href="{{ route('web.logout') }}">Đăng xuất</a>
                                    </div>
                                </div>
                            @else
                                <li><a href="{{ route('web.login') }}"><i class="bi bi-person-circle"></i></a></li>
                            @endif

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block p-0">

                <li><a href="{{ route('web.home') }}">Trang chủ </a></li>
                <li>
                    <a role="button" type="button" id="dropdownMenuReference" data-toggle="dropdown">
                        Danh mục khóa học
                    </a>
                    <div style="width: 100px" role="button" class="dropdown-menu"
                        aria-labelledby="dropdownMenuReference">

                        @foreach (\Arr::categorys() as $category)
                            <a class="dropdown-item"
                                href="{{ route('web.shop', ['category_id' => $category['value']]) }}">{{ $category['label'] }}
                            </a>
                        @endforeach
                    </div>
                </li>
                <li><a href="{{ route('web.shop') }}">Các khóa học </a></li>

            </ul>
        </div>
    </nav>
</header>
