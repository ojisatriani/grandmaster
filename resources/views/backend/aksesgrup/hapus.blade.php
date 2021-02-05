{!! Form::open(array('id' => 'frmOji', 'route' => ['aksesgrup.destroy', $aksesgrup->id], 'class' => 'form account-form', 'method' => 'DELETE')) !!}
<div class="row">
    <div class="col-md-12">
        @if(Auth::user()->aksesgrup_id == $aksesgrup->id)
        <p>
            <div class="alert alert-danger" role="alert"><i class="fa fa-warning"></i> Anda menggunakan akses grup ini.
                Jika dihapus, Maka anda kehilangan semua akses menu dari akses grup ini.</div>
        </p>
        @endif
        <p>
            <label class="control-label">Hapus data <strong>{{ $aksesgrup->nama }}?</strong></label>
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
