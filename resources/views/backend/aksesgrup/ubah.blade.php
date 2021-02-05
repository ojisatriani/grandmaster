{!! Form::open(array('id' => 'frmOji', 'route' => ['aksesgrup.update', $aksesgrup->id], 'class' => 'form account-form', 'method' => 'PUT')) !!}
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
