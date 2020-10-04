{!! Form::open(array('id' => 'frmOji', 'class' => 'form account-form', 'method' => 'DELETE')) !!}
<div class="row">
		<div class="col-md-12">
			<p>
                    <label class="control-label">Hapus data akses grup <strong>{{ $perbaikan->aksesgrup->nama }}</strong> sebagai yang diizinkan untuk perbaikan submenu <strong>{{ $perbaikan->submenu->nama }}</strong> ?</label>
                    {!! Form::hidden('id', $perbaikan->id, array('id' => 'id')) !!}
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
<script src="{{ URL::asset('ojisatriani/perbaikan/ajax.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/home/ajax.js') }}"></script>
