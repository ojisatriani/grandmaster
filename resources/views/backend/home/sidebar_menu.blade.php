@if($menu->tampil)
<li class="{{ $menu->aktif }}">
    <a href="{{ $menu->url }}" title="{{ $menu->nama }}" data-filter-tags="{{ $menu->nama }}">
        <i class="fa {{ $menu->icon }}"></i>
        <span class="nav-link-text" data-i18n="nav.{{ $menu->kode }}">{{ $menu->nama }}</span>
    </a>
    @if ($menu->child->count() > 0)
        <ul>
            @each('backend.home.sidebar_menu', $menu->child, 'menu')
        </ul>
    @endif
</li>
@else
    <li class="{{ $menu->aktif }}">
        <a href="{{ $menu->url }}" title="{{ $menu->nama }}" data-filter-tags="{{ strtolower($menu->nama) }}">
            <i class="fa {{ $menu->icon }}"></i>
            <span class="nav-link-text" data-i18n="nav.{{ Str::slug($menu->nama .'_'.$menu->nama, '_') }}">{{ $menu->nama }}</span>
        </a>
    </li>
@endif