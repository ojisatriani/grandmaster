<li class="{{ $mn->aktif }}">
    <a href="#" title="{{ $mn->nama }}" data-filter-tags="{{ $mn->nama }}">
        <i class="fa {{ $mn->icon }}"></i>
        <span class="nav-link-text" data-i18n="nav.{{ $mn->kode }}">{{ $mn->nama }}</span>
    </a>
    <ul>
        @foreach($mn->submenu as $sub)
            @if($sub->tampil == 1)
                @if($sub->checkAksessubmenu(Auth::user()->aksesgrup_id))
                    @include('backend.home.sidebar_item.submenu', ['mn'=>$mn,'sub'=>$sub])
                @endif
            @else
                @include('backend.home.sidebar_item.submenu', ['mn'=>$mn,'sub'=>$sub])
            @endif
        @endforeach
    </ul>
</li>