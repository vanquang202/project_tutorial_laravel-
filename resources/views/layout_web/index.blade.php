<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shoppers &mdash; Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layout_web._style')
</head>

<body>

    <div class="site-wrap">
        @include('layout_web._header')

        @yield('conten_web')

        @include('layout_web._footer')
    </div>

    @include('layout_web._script')
    @yield('js_web')
</body>

</html>
