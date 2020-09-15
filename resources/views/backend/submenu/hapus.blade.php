{!! Form::open(array('id' => 'frmOji', 'class' => 'form account-form', 'method' => 'DELETE')) !!}
<div class="row">
		<div class="col-md-12">
				<p>
						<label class="control-label">Hapus data <strong>{{ $submenu->nama }}?</strong></label>
						{!! Form::hidden('id', $submenu->id, array('id' => 'id')) !!}
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
<script src="{{ URL::asset('ojisatriani/submenu/ajax.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/home/ajax.js') }}"></script>
