{!! Form::open(array('id' => 'frmOji', 'route' => ['berkas.store'], 'class' => 'form account-form', 'method' => 'post', 'files'=>TRUE)) !!}
<div class="row">
	<div class="col-md-12">
		<p>
			{!! Form::label('nama', 'Nama Berkas', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('nama', NULL, array('id' => 'nama', 'class' => 'form-control', 'placeholder' => 'Nama Berkas')) !!}
		</p>
		<p>
			{!! Form::label('lampiran', 'Lampiran', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::file('lampiran', array('id' => 'lampiran', 'class' => 'form-control', 'placeholder' => 'lampiran')) !!}
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
