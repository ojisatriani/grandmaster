{!! Form::open(array('id' => 'frmOji', 'class' => 'form account-form', 'method' => 'DELETE')) !!}
<div class="row">
		<div class="col-md-12">
				@if(Auth::user()->aksesgrup_id == $aksesgrup->id)
			<p>
				<div class="alert alert-danger" role="alert"><i class="fa fa-warning"></i> Anda menggunakan akses grup ini. Jika dihapus, Maka anda kehilangan semua akses menu dari akses grup ini.</div>
			</p>
				@endif

				<p>
						<label class="control-label">Hapus data <strong>{{ $aksesgrup->nama }}?</strong></label>
						{!! Form::hidden('id', $aksesgrup->id, array('id' => 'id')) !!}
						{!! Form::hidden('url', URL::previous(), array('id' => 'url')) !!}
				</p>
		</div>
</div>
<div class="row">
		<div class="col-md-12">
				<span class="pesan"></span>
		</div>
</div>
{!! Form::close() !!}
<script src="{{ URL::asset('ojisatriani/aksesgrup/ajax.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/home/ajax.js') }}"></script>
