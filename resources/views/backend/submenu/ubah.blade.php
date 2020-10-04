{!! Form::open(array('id' => 'frmOji', 'class' => 'form account-form', 'method' => 'PUT')) !!}
<div class="row">
	<div class="col-md-6">
		<p>
			{!! Form::label('menu_id', 'Nama Menu', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::select('menu_id', $menu, $submenu->menu_id, array('id' => 'menu_id', 'class' => 'form-control')) !!}
		</p>
		<p>
			{!! Form::label('nama', 'Nama Submenu', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('nama', $submenu->nama, array('id' => 'nama', 'class' => 'form-control', 'placeholder' => 'Nama Submenu')) !!}
		</p>
		<p>
			{!! Form::label('kode', 'Kode Submenu', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('kode', $submenu->kode, array('id' => 'kode', 'class' => 'form-control', 'placeholder' => 'Kode Submenu')) !!}
		</p>
		<p>
			{!! Form::label('link', 'Link', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('link', $submenu->link, array('id' => 'link', 'class' => 'form-control', 'placeholder' => 'Link')) !!}
		</p>
	</div>
	<div class="col-md-6">
		<p>
			{!! Form::label('icon', 'Icon', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('icon', $submenu->icon, array('id' => 'icon', 'class' => 'form-control', 'placeholder' => 'Icon')) !!}
		</p>
		<p>
			{!! Form::label('status', 'Status', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::select('status', array(1 => 'Tampil', 0 => 'Tidak Tampil'), $submenu->status, array('id' => 'status', 'class' => 'form-control')) !!}
		</p>
		<p>
			{!! Form::label('tampil', 'Tampilkan', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::select('tampil', array(1 => 'Private', 0 => 'Public'), $submenu->tampil, array('id' => 'tampil', 'class' => 'form-control')) !!}
		</p>
		<p>
			{!! Form::label('perbaikan', 'Perbaikan', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::select('perbaikan', array(1 => 'Ya', 0 => 'Tidak'), $submenu->perbaikan, array('id' => 'tampil', 'class' => 'form-control')) !!}
		</p>
	</div>
		{!! Form::hidden('url', URL::previous(), array('id' => 'url')) !!}
		{!! Form::hidden('id', $submenu->id, array('id' => 'id')) !!}
</div>
<div class="row">
	<div class="col-md-12">
		<span class="pesan"></span>
	</div>
</div>
{!! Form::close() !!}
<script src="{{ URL::asset('ojisatriani/submenu/ajax.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/home/ajax.js') }}"></script>
