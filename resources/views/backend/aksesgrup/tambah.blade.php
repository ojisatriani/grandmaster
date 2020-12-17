{!! Form::open(array('id' => 'frmOji', 'route' => ['aksesgrup.store'], 'class' => 'form account-form', 'method' => 'post')) !!}
<div class="row">
	<div class="col-md-12">
		<p>
			{!! Form::label('nama', 'Nama Grup', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('nama', NULL, array('id' => 'nama', 'class' => 'form-control', 'placeholder' => 'Nama Grup')) !!}
		</p>
		<p>
			{!! Form::label('alias', 'Alias', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('alias', NULL, array('id' => 'alias', 'class' => 'form-control', 'placeholder' => 'Alias')) !!}
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
