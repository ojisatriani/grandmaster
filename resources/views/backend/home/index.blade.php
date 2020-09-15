<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="{{ config('master.aplikasi.nama') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="@ojisatriani">
        <title>@stack('title', 'Administrator') | {{ config('master.aplikasi.nama') }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
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
        <link rel="stylesheet" media="screen, print" href="{{ asset('resources/vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('resources/css/sweetalert2/sweetalert2.bundle.css') }}">
        @stack('css')
    </head>
    <body class="mod-bg-1 ">
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *	This script should be placed right after the body tag for fast execution 
             *	Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /** 
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /** 
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            /** 
             * Save to localstorage 
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /** 
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }

        </script>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                @include('backend.home.sidebar')
                <div class="page-content-wrapper">
                    @include('backend.home.header')
                    <main id="js-page-content" role="main" class="page-content">
                       
                            <ol class="breadcrumb page-breadcrumb">
                                <li class="position-absolute pos-top pos-right d-none d-sm-block">
                                {{ $fungsi->getHari() }}, {{ $fungsi->tanggalIndonesia() }}
                                </li>
                            </ol>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div id="panel-1" class="panel">
                                        <div class="panel-hdr">
                                            <h2>
                                                @stack('header')
                                            </h2>
                                            <div class="panel-toolbar">
                                                <div class="btn-group">
                                                    @stack('tombol')
                                                </div>
                                            </div>
                                        </div>
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    @include('backend.home.footer')
                </div>
            </div>
        </div>
        <script src="{{ asset('backend/js/vendors.bundle.js') }}"></script>
        <script src="{{ asset('backend/js/app.bundle.js') }}"></script>
        <script src="{{ asset('resources/vendor/jquery/blockUI.js') }}"></script>
        <script src="{{ asset('resources/vendor/jquery/jquery.loadmodal.js') }}"></script>
        <script type="text/javascript" src="{{ asset('ojisatriani/home/jquery.js') }}"></script>
        <script src="{{ asset('resources/vendor/sweetalert2/sweetalert2.bundle.js') }}"></script>
        @stack('js')
    </body>
</html>
