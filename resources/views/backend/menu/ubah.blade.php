{!! Form::open(array('id' => 'frmOji', 'route' => ['menu.update', $menu->id], 'class' => 'form account-form', 'method' => 'PUT')) !!}
<div class="row">
	<div class="col-md-12">
		<p>
			{!! Form::label('parent_id', 'Parent Menu', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::select('parent_id', $parent, $menu->parent_id, array('id' => 'parent_id', 'class' => 'form-control')) !!}
		</p>
	</div>
	<div class="col-md-6">
		<p>
			{!! Form::label('Nama Menu', 'Nama Menu', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('nama', $menu->nama, array('id' => 'nama', 'class' => 'form-control', 'placeholder' => 'Nama Menu')) !!}
		</p>
		<p>
			{!! Form::label('Kode Menu', 'Kode Menu', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('kode', $menu->kode, array('id' => 'kode', 'class' => 'form-control', 'placeholder' => 'Kode Menu')) !!}
		</p>
		<p>
			{!! Form::label('Link', 'Link', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('link', $menu->link, array('id' => 'link', 'class' => 'form-control', 'placeholder' => 'Link')) !!}
		</p>
	</div>
	<div class="col-md-6">
		<p>
			{!! Form::label('Icon', 'Icon', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('icon', $menu->icon, array('id' => 'icon', 'class' => 'form-control', 'placeholder' => 'Icon')) !!}
		</p>
		<p>
			{!! Form::label('tampilkan', 'Tampilkan', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::select('tampilkan', array(1 => 'Ya', 0 => 'Tidak'), $menu->tampilkan, array('id' => 'status', 'class' => 'form-control')) !!}
		</p>
		<p>
			{!! Form::label('private', 'Status', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::select('private', array(1 => 'Private', 0 => 'Public'), $menu->private, array('id' => 'private', 'class' => 'form-control')) !!}
		</p>
	</div>
	{!! Form::hidden('table-list', 'datatable', array('id' => 'table-list')) !!}
</div>
<div class="row">
	<div class="col-md-12">
        <span class="pesan"></span>
        <div id="output"></div>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div id="statustxt">0%</div>
            </div>
        </div>
	</div>
</div>
{!! Form::close() !!}
<script src="{{ URL::asset('resources/vendor/jquery/jquery.form.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/home/ajax_progress.js') }}"></script>
