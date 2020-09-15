{!! Form::open(array('id' => 'frmOji', 'class' => 'form account-form', 'method' => 'post')) !!}
<div class="row">
	@foreach($menu as $mn)
	<div class="col-lg-4">
			<ul>
				<li class="list-group-item">
				{!! Form::checkbox('menu[]', $mn->id, $mn->checkAksesmenu($aksesgrup->id), array('id' => 'icheck-input menu'.$mn->id, 'menu-id' => $mn->id, 'class' => 'icheck-input menu'.$mn->id)) !!}
					&nbsp;&nbsp;
					<label for="icheck-input menu{{$mn->id}}">{{$mn->nama}}</label>
					<ul class="list-group">
						@foreach($mn->submenu as $smn)
							<li class="list-group-item">
							{!! Form::checkbox('submenu[]', $smn->id, $smn->checkAksessubmenu($aksesgrup->id), array('id' => 'icheck-input submenu'.$smn->id, 'menu-id' => $smn->menu_id, 'class' => 'icheck-input submenu'.$smn->menu_id)) !!}
								&nbsp;&nbsp;<label for="icheck-input submenu{{$smn->id}}">{{$smn->nama}}</label>
							</li>
						@endforeach
					</ul>
				</li>
			</ul>
		</div>
	@endforeach
	{!! Form::hidden('url', URL::previous(), array('id' => 'url')) !!}
	{!! Form::hidden('id', $aksesgrup->id, array('id' => 'id')) !!}
</div>
<div class="row">
	<div class="col-md-12">
		<span class="pesan"></span>
	</div>
</div>
{!! Form::close() !!}
<script src="{{ URL::asset('ojisatriani/aksesmenu/ajax.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/home/ajax.js') }}"></script>
