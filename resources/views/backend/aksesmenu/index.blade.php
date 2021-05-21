@extends('backend.home.index')
@push('title', 'Akses Menu dari '. $aksesgrup->nama)
@push('header', 'Akses Menu dari '. $aksesgrup->nama)
@push('tombol')
<a href="{{ URL::asset($url_admin.'/aksesgrup') }}" class="btn btn-sm btn-danger">
	<i class="fa fa-arrow-circle-left"></i> Kembali
</a>
<a href="#tambah" id="editable_table_new" class="btn btn-sm btn-primary tambah">
	Simpan  <i class="fa fa-save"></i>
</a>
@endpush
@section('content')
<div class="panel-container show">
	<div class="panel-content">
		<div class="panel-tag">
			Silahkan pilih Menu dibawah, kemudian klik tombol simpan
		</div>
		{!! Form::open(array('id' => 'frmOji', 'route' => ['aksesmenu.store'], 'class' => 'form account-form', 'method' => 'post')) !!}
		<ul class="list-group list-group-flush">
			@foreach ($menus as $menu)
				@include('backend.aksesmenu.menu', ['menu'=>$menu, 'aksesgrup'=>$aksesgrup])
			@endforeach
		</ul>
		{!! Form::hidden('url', URL::current(), array('id' => 'url')) !!}
		{!! Form::hidden('id', $aksesgrup->id, array('id' => 'id')) !!}
		{!! Form::close() !!}
	</div>
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
@endsection
@push('js')
@include('backend.home.datatable-js')
<script type="text/javascript" src="{{ URL::asset('ojisatriani/'.$halaman->kode.'/jquery.js') }}"></script>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.form.js') }}"></script>
<script src="{{ URL::asset('ojisatriani/home/ajax_progress.js') }}"></script>
@endpush
