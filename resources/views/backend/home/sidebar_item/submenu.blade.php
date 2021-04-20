<li class="{{ $sub->aktif }}">
    <a href="{{ url(ltrim($url_admin.'/'.$sub->link, '/')) }}" title="{{$sub->nama}}" data-filter-tags="{{ strtolower($mn->nama) }} {{ strtolower($sub->nama) }}">
        <i class="fa {{ $sub->icon }}"></i>
        <span class="nav-link-text" data-i18n="nav.{{ Str::slug($mn->nama .'_'.$sub->nama, '_') }}">{{ $sub->nama }}</span>
    </a>
</li>