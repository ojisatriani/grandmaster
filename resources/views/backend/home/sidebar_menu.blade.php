@if($menu->tampilkan)
    @if($menu->private)
        @if($menu->checkAksesmenu(Auth::user()->aksesgrup_id))
            <li class="{{ $menu->aktif }}">
                <a href="{{ $menu->url }}" title="{{ $menu->nama }}" data-filter-tags="{{ $menu->nama }}">
                    <i class="fa {{ $menu->icon }}"></i>
                    <span class="nav-link-text" data-i18n="nav.{{ $menu->kode }}">{{ $menu->nama }}</span>
                </a>
                @if ($menu->punya_sub)
                    <ul>
                        @each('backend.home.sidebar_menu', $menu->child, 'menu')
                    </ul>
                @endif
            </li>
        @endif
    @else
        <li class="{{ $menu->aktif }}">
            <a href="{{ $menu->url }}" title="{{ $menu->nama }}" data-filter-tags="{{ $menu->nama }}">
                <i class="fa {{ $menu->icon }}"></i>
                <span class="nav-link-text" data-i18n="nav.{{ $menu->kode }}">{{ $menu->nama }}</span>
            </a>
            @if ($menu->punya_sub)
                <ul>
                    @each('backend.home.sidebar_menu', $menu->child, 'menu')
                </ul>
            @endif
        </li>
    @endif
@endif