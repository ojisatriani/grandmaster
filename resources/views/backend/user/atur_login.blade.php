{!! Form::open(array('id' => 'frmOji', 'class' => 'form account-form', 'method' => 'post')) !!}
<div class="row">
		<div class="col-md-12">
				<p>
						<label class="control-label">Atur Login Sebagai <strong>{{ $user->pegawai->nama }}?</strong></label>
						{!! Form::hidden('id', $user->id, array('id' => 'id')) !!}
						{!! Form::hidden('url', url('/home'), array('id' => 'url')) !!}
				</p>
		</div>
</div>
<div class="row">
		<div class="col-md-12">
				<span class="pesan"></span>
		</div>
</div>
{!! Form::close() !!}
<script src="{{ URL::asset('ojisatriani/user/ajax.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/home/ajax.js') }}"></script>
