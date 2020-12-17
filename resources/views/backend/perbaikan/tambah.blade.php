{!! Form::open(array('id' => 'frmOji', 'route' => ['perbaikan.store'], 'class' => 'form account-form', 'method' => 'post')) !!}
<div class="row">
	<div class="col-md-12">
		<p>
			{!! Form::label('aksesgrup_id', 'Akses Grup', array('class' => 'col-md-12 control-label')) !!}
			{!! Form::select('aksesgrup_id', $aksesgrup, NULL, array('id' => 'aksesgrup_id', 'class' => 'form-control')) !!}
		</p>
	</div>
	{!! Form::hidden('submenu_id', $submenu->id, array('id' => 'submenu_id')) !!}
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
