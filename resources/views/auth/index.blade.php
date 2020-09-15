<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{ config('master.aplikasi.nama') }}</title>
        <meta name="description" content="Login">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="@ojisatriani">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="{{ asset('backend/css/vendors.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('backend/css/app.bundle.css') }}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('backend/img/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('backend/img/favicon/favicon-32x32.png') }}">
        <link rel="mask-icon" href="{{ asset('backend/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="{{ asset('backend/css/fa-brands.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('resources/vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{asset('backend/css/page-login.css')}}">
    </head>
    <body>
        @yield('content')
        <script src="{{ asset('backend/js/vendors.bundle.js') }}"></script>
        <script src="{{ asset('backend/js/app.bundle.js') }}"></script>
        <script src="{{ asset('resources/vendor/jquery/jquery.ui.shake.js') }}"></script>
        <script src="{{ asset('resources/vendor/jquery/jquery.enc.js') }}"></script>
        @stack('js')
    </body>
</html>