@extends('backend.home.index')
@push('title', 'Akses Menu dari '. $aksesgrup->nama)
@push('header', 'Akses Menu dari '. $aksesgrup->nama)
@push('tombol')
<a href="{{ URL::asset($url_admin.'/aksesgrup') }}" class="btn btn-sm btn-danger">
	<i class="fa fa-arrow-circle-left"></i> Kembali
</a>
<a href="#tambah" id="editable_table_new" aksesgrup-id="{{ $aksesgrup->id }}" class="btn btn-sm btn-primary tambah">
	Kelola  <i class="fa fa-plus-circle"></i>
</a>
@endpush
@section('content')
<div class="panel-container show">
	<div class="panel-content">
		<table id="datatable" class="table table-bordered table-hover table-striped w-100">
			<thead class="bg-primary-600">
				<tr>
					<th>Menu</th>
					<th>Sub Menu</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

@endsection
@push('js')
@include('backend.home.datatable-js')
<script type="text/javascript" src="{{ URL::asset('ojisatriani/'.$halaman->kode.'/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('ojisatriani/'.$halaman->kode.'/'.$aksesgrup->id.'/datatables.js') }}"></script>

<link rel="stylesheet" href="{{ url('backend/assets/vendor_plugins/iCheck/icheck.min.js') }}">
@endpush
@push('css')
@include('backend.home.datatable-css')
@endpush
