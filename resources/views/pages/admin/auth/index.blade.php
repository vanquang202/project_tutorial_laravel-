@extends('layout_auth.default')
@section('content')
    <div class="login-box">
        <h2>Đăng nhập quản trị viên </h2>
        @error('error')
            <div class="alert alert-danger text-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <a href="{{ route('admin.login.redirect') . '?driver=facebook' }}" class="social-button" id="facebook-connect">
            <span>Đăng nhập với Facebook</span></a>
        <a href="{{ route('admin.login.redirect') . '?driver=google' }}" class="social-button" id="google-connect">
            <span>Đăng nhập với Google</span></a>
        <a href="{{ route('admin.login.redirect') . '?driver=github' }}" class="social-button" id="google-connect">
            <span>Đăng nhập với Github</span></a>
    </div>
@endsection
