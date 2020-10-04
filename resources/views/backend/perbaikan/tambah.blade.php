{!! Form::open(array('id' => 'frmOji', 'class' => 'form account-form', 'method' => 'post')) !!}
<div class="row">
	<div class="col-md-12">
		<p>
			{!! Form::label('aksesgrup_id', 'Akses Grup', array('class' => 'col-md-12 control-label')) !!}
			{!! Form::select('aksesgrup_id', $aksesgrup, NULL, array('id' => 'aksesgrup_id', 'class' => 'form-control')) !!}
		</p>
	</div>
		{!! Form::hidden('url', URL::previous(), array('id' => 'url')) !!}
		{!! Form::hidden('submenu_id', $submenu->id, array('id' => 'submenu_id')) !!}
</div>
<div class="row">
	<div class="col-md-12">
		<span class="pesan"></span>
	</div>
</div>
{!! Form::close() !!}
<script src="{{ URL::asset('ojisatriani/perbaikan/ajax.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/home/ajax.js') }}"></script>
