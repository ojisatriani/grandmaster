@extends('backend.home.index')
@push('title', 'Grup yang di izinkan akses saat perbaikan')
@push('header', 'Grup yang di izinkan akses saat perbaikan')
@push('tombol')
<a href="{{ URL::asset($url_admin.'/submenu/'.$submenu->menu_id) }}" class="btn btn-sm btn-danger">
	<i class="fa fa-arrow-circle-left"></i> Kembali
</a>
<a href="#tambah" id="editable_table_new" aksesgrup-id="{{ $submenu->id }}" class="btn btn-sm btn-primary tambah">
	Tambah  <i class="fa fa-plus-circle"></i>
</a>
@endpush
@section('content')
<div class="panel-container show">
	<div class="panel-content">
		<table id="datatable" class="table table-bordered table-hover table-striped w-100">
			<thead class="bg-primary-600">
				<tr>
					<th>Akses Grup</th>
					<th class="text-center wid-10" tabindex="0" rowspan="1" colspan="1">Aksi</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

@endsection
@push('js')
@include('backend.home.datatable-js')
<script type="text/javascript" src="{{ URL::asset('ojisatriani/'.$halaman->kode.'/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('ojisatriani/'.$halaman->kode.'/'.$submenu->id.'/datatables.js') }}"></script>
@endpush
@push('css')
@include('backend.home.datatable-css')
@endpush
