{!! Form::open(array('id' => 'frmOji', 'class' => 'form account-form', 'method' => 'post')) !!}
<div class="row">
    <div class="col-md-6">
        <p>
            {!! Form::label('Nama', 'Nama', array('class' => 'col-md-6 control-label')) !!}
            {!! Form::text('nama', NULL, array('id' => 'nama', 'class' => 'form-control', 'placeholder' => 'Nama')) !!}
        </p>
        <p>
            {!! Form::label('username', 'Username', array('class' => 'col-md-6 control-label')) !!}
            {!! Form::text('username', NULL, array('id' => 'username', 'class' => 'form-control', 'placeholder' =>
            'Username')) !!}
        </p>
        <p>
            {!! Form::label('Password', 'Password', array('class' => 'col-md-6 control-label')) !!}
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
        </p>
    </div>
    <div class="col-md-6">
        <p>
            {!! Form::label('email', 'Email', array('class' => 'col-md-6 control-label')) !!}
            {!! Form::text('email', NULL, array('id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email'))
            !!}
        </p>

        <p>
            {!! Form::label('Akses Grup', 'Akses Grup', array('class' => 'col-md-6 control-label')) !!}
            {!! Form::select('aksesgrup_id', $aksesgrup, 2, array('id' => 'aksesgrup_id', 'class' => 'form-control'))
            !!}
        </p>
        <p>
            {!! Form::label('level', 'Level', array('class' => 'col-md-6 control-label')) !!}
            {!! Form::select('level', config('master.level'), 2, array('id' => 'level', 'class' => 'form-control')) !!}
        </p>
    </div>
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
