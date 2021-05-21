@if($menu->private)
        <li class="list-group-item">
            {!! Form::checkbox('menu[]', $menu->id, $menu->checkAksesmenu($aksesgrup->id), array('id' => 'icheck-input menu'.$menu->id, 'menu-id' => $menu->id, 'class' => 'icheck-input menu'.$menu->id)) !!}
            <strong>{{ $menu->nama }}</strong>
            {{--  @if ($menu->punya_sub)  --}}
                <ul>
                    @foreach ($menu->child as $item)
                        @include('backend.aksesmenu.menu', ['menu'=>$item, 'aksesgrup'=>$aksesgrup])
                    @endforeach
                </ul>
            {{--  @endif  --}}
        </li>
@else
    <li class="list-group-item">
        {!! Form::checkbox('menu[]', $menu->id, TRUE, array('id' => 'icheck-input menu'.$menu->id, 'menu-id' => $menu->id, 'class' => 'icheck-input menu'.$menu->id, 'disabled')) !!}
        <strong>{{ $menu->nama }}</strong>
        {{--  @if ($menu->punya_sub)  --}}
            <ul>
                @foreach ($menu->child as $item)
                    @include('backend.aksesmenu.menu', ['menu'=>$item, 'aksesgrup'=>$aksesgrup])
                @endforeach
            </ul>
        {{--  @endif  --}}
    </li>
@endif