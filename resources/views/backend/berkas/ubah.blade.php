{!! Form::open(array('id' => 'frmOji', 'route' => ['berkas.update', $berkas->id], 'class' => 'form account-form', 'method' => 'PUT', 'files'=>TRUE)) !!}
<div class="row">
	<div class="col-md-12">
		<p>
			{!! Form::label('nama ', 'Nama Berkas', array('class' => 'col-md-6 control-label')) !!}
			{!! Form::text('nama', $berkas->nama, array('id' => 'nama', 'class' => 'form-control', 'placeholder' => 'Nama Berkas')) !!}
		</p>
		<p>
			<label for="lampiran" class="col-md-12 control-label">Lampiran (<a href="{{ $berkas->file_url }}">Download</a>)</label>
			{!! Form::file('lampiran', array('id' => 'lampiran', 'class' => 'form-control', 'placeholder' => 'lampiran')) !!}
			<small>Kosongkan Lampiran jika tidak ingin diubah</small>
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
