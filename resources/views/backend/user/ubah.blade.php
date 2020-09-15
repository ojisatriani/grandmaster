{!! Form::open(array('id' => 'frmOji', 'class' => 'form account-form', 'method' => 'PUT')) !!}
<div class="row">
    <div class="col-md-6">
        <p>
            {!! Form::label('Nama', 'Nama', array('class' => 'col-md-6 control-label')) !!}
            {!! Form::text('nama', $user->nama, array('id' => 'nama', 'class' => 'form-control', 'placeholder' =>
            'Nama')) !!}
        </p>
        <p>
            {!! Form::label('username', 'Username', array('class' => 'col-md-6 control-label')) !!}
            {!! Form::text('username', $user->username, array('id' => 'username', 'class' => 'form-control',
            'placeholder' => 'Username', 'readonly')) !!}
        </p>
        <p>
            {!! Form::label('Password', 'Password', array('class' => 'col-md-6 control-label')) !!}
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
            <small>Kosongkan jika tidak perlu</small>
        </p>
    </div>
    <div class="col-md-6">
        <p>
            {!! Form::label('Email', 'Email', array('class' => 'col-md-6 control-label')) !!}
            {!! Form::text('email', $user->email, array('id' => 'email', 'class' => 'form-control', 'placeholder' =>
            'Email')) !!}
        </p>

        <p>
            {!! Form::label('Akses Grup', 'Akses Grup', array('class' => 'col-md-6 control-label')) !!}
            {!! Form::select('aksesgrup_id', $aksesgrup, $user->aksesgrup_id, array('id' => 'aksesgrup_id', 'class' =>
            'form-control')) !!}
        </p>
        <p>
            {!! Form::label('level', 'Level', array('class' => 'col-md-6 control-label')) !!}
            {!! Form::select('level', config('master.level'), $user->level, array('id' => 'level', 'class' =>
            'form-control')) !!}
        </p>
    </div>
    {!! Form::hidden('id', $user->id, array('id' => 'id')) !!}
    {!! Form::hidden('url', URL::previous(), array('id' => 'url')) !!}
</div>
<div class="row">
    <div class="col-md-12">
        <span class="pesan"></span>
    </div>
</div>
{!! Form::close() !!}
<script src="{{ URL::asset('resources/vendor/jquery/jquery.enc.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/user/ajax.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/home/ajax.js') }}"></script>
