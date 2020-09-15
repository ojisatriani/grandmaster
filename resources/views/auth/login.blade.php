@extends('auth.index')
@section('content')
<div class="blankpage-form-field">
    <div
        class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
        <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
            <img src="{{ asset('backend/img/logo.png') }}" alt="{{ config('master.aplikasi.nama') }}"
                aria-roledescription="logo">
            <span class="page-logo-text mr-1">{{ config('master.aplikasi.nama') }}</span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </div>
    <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input type="text" id="username" class="form-control  @error('username') is-invalid @enderror"
                    name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group text-left">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember"></label>
                    {{ __('Ingatkan Saya') }}
                </div>
            </div>
            <button type="submit" class="btn btn-default float-right">{{ __('Login') }}</button>
        </form>
    </div>
</div>
<video poster="{{asset('backend/img/backgrounds/clouds.png')}}" id="bgvid" playsinline autoplay muted loop>
    <source src="{{asset('backend/media/video/cc.webm')}}" type="video/webm">
    <source src="{{asset('backend/media/video/cc.mp4')}}" type="video/mp4">
</video>
@include('auth.footer')
@endsection
