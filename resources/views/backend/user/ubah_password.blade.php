{!! Form::open(array('id' => 'frmOji', 'class' => 'form account-form', 'method' => 'POST')) !!}
<div class="row">
		<div class="col-md-12">

	<p>
		@if($user->password == NULL)
			<div class="alert alert-danger" role="alert"><i class="fa fa-warning"></i> Anda belum pernah melakukan pengaturan "Password", Silahkan lakukan pengaturan sekarang.</div>
		@else
		{!! Form::label('Password Lama', 'Password Lama', array('class' => 'col-sm-6 control-label')) !!}
		{!! Form::password('password_lama', array('id' => 'password_lama', 'class' => 'form-control', 'placeholder' => 'Password Lama')) !!}

		@endif
		</p>
	<p>
		{!! Form::label('Password Baru', 'Password Baru', array('class' => 'col-sm-6 control-label')) !!}
		{!! Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password Baru')) !!}
	</p>
	<p>
		{!! Form::label('Konfirmasi Password Baru', 'Konfirmasi Password Baru', array('class' => 'col-sm-6 control-label')) !!}
		{!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Konfirmasi Password Baru')) !!}
	</p>
	{!! Form::hidden('url', URL::previous(), array('id' => 'url')) !!}
	{!! Form::hidden('id', $user->id, array('id' => 'id')) !!}
{!! Form::close() !!}
<div class="row">
		<div class="col-md-12">
				<span class="pesan"></span>
		</div>
</div>
<script type="text/javascript" src="{{ URL::asset('resources/vendor/jquery/jquery.enc.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/user/ajax.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/home/ajax.js') }}"></script>
