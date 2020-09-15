{!! Form::open(array('id' => 'frmOji', 'class' => 'form account-form', 'method' => 'post')) !!}
<div class="row">
	<div class="col-md-6">
		<p>
			{!! Form::label('nama', 'Nama Menu', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('nama', NULL, array('id' => 'nama', 'class' => 'form-control', 'placeholder' => 'Nama Menu')) !!}
		</p>
		<p>
			{!! Form::label('kode', 'Kode Menu', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('kode', NULL, array('id' => 'kode', 'class' => 'form-control', 'placeholder' => 'Kode Menu')) !!}
		</p>
		<p>
			{!! Form::label('link', 'Link', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('link', NULL, array('id' => 'link', 'class' => 'form-control', 'placeholder' => 'Link')) !!}
		</p>
	</div>
	<div class="col-md-6">
		<p>
			{!! Form::label('icon', 'Icon', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('icon', 'fa-square', array('id' => 'icon', 'class' => 'form-control', 'placeholder' => 'Icon')) !!}
		</p>
		<p>
			{!! Form::label('status', 'Status', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::select('status', array(1 => 'Show', 0 => 'Hide'), NULL, array('id' => 'status', 'class' => 'form-control')) !!}
		</p>
		<p>
			{!! Form::label('tampil', 'Tampilkan', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::select('tampil', array(1 => 'Private', 0 => 'Public'), NULL, array('id' => 'tampil', 'class' => 'form-control')) !!}
		</p>
	</div>
	{!! Form::hidden('url', URL::previous(), array('id' => 'url')) !!}
</div>
<div class="row">
		<div class="col-md-12">
				<span class="pesan"></span>
		</div>
</div>
{!! Form::close() !!}
<script src="{{ URL::asset('ojisatriani/menu/ajax.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/home/ajax.js') }}"></script>
