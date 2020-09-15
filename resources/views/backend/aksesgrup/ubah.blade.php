{!! Form::open(array('id' => 'frmOji', 'class' => 'form account-form', 'method' => 'PUT')) !!}
<div class="row">
	<div class="col-md-12">
		<p>
			{!! Form::label('Nama Grup', 'Nama Grup', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('nama', $aksesgrup->nama, array('id' => 'nama', 'class' => 'form-control', 'placeholder' => 'Nama Grup')) !!}
		</p>
		<p>
			{!! Form::label('alias', 'Alias', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('alias', $aksesgrup->alias, array('id' => 'alias', 'class' => 'form-control', 'placeholder' => 'Alias')) !!}
		</p>
	</div>
	{!! Form::hidden('url', URL::previous(), array('id' => 'url')) !!}
	{!! Form::hidden('id', $aksesgrup->id, array('id' => 'id')) !!}
</div>
<div class="row">
	<div class="col-md-12">
		<span class="pesan"></span>
	</div>
</div>
{!! Form::close() !!}
<script src="{{ URL::asset('ojisatriani/aksesgrup/ajax.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/home/ajax.js') }}"></script>
