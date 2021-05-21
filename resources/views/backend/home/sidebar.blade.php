<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="{{ asset('backend/img/logo.png') }}" alt="{{ config('master.aplikasi.nama') }}" aria-roledescription="logo">
            <span class="page-logo-text mr-1">{{ config('master.aplikasi.nama') }} Admin</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </div>
    <!-- BEGIN PRIMARY NAVIGATION -->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <div class="nav-filter">
            <div class="position-relative">
                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                    <i class="fal fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="info-card">
            <img src="{{ Avatar::create(Auth::user()->nama)->toBase64() }}" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
            <div class="info-card-text">
                <a href="#" class="d-flex align-items-center text-white">
                    <span class="text-truncate text-truncate-sm d-inline-block">
                        {{ Auth::user()->nama }}
                    </span>
                </a>
                <span class="d-inline-block"></span>
            </div>
            <img src="{{ asset('backend/img/card-backgrounds/cover-2-lg.png') }}" class="cover" alt="cover">
            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                <i class="fal fa-angle-down"></i>
            </a>
        </div>
        <ul id="js-nav-menu" class="nav-menu">
            {{--  <li>
                <a href="{{ url('/home') }}" title="Beranda" data-filter-tags="beranda">
                    <i class="fa fa-home"></i>
                    <span class="nav-link-text" data-i18n="nav.beranda">Beranda</span>
                </a>
            </li>  --}}
            @each('backend.home.sidebar_menu', $menu_item, 'menu')
            {{--  @foreach($menu_item as $menu_sidebar)
                @if($menu_sidebar->tampil)
                    @if($menu_sidebar->checkAksesmenu(Auth::user()->aksesgrup_id))
                        @include('backend.home.sidebar_menu', ['menu'=>$menu_sidebar])
                    @endif
                @else
                    @include('backend.home.sidebar_menu', ['menu'=>$menu_sidebar])
                @endif
            @endforeach  --}}
        </ul>
        <div class="filter-message js-filter-message bg-success-600"></div>
    </nav>
    <div class="nav-footer shadow-top">
        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
            <i class="ni ni-chevron-right"></i>
            <i class="ni ni-chevron-right"></i>
        </a>
        <ul class="list-table m-auto nav-footer-buttons">
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
                    <i class="fal fa-comments"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">
                    <i class="fal fa-life-ring"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">
                    <i class="fal fa-phone"></i>
                </a>
            </li>
        </ul>
    </div> <!-- END NAV FOOTER -->
</aside>