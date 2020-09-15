@extends('backend.home.index')
@push('title', $halaman->nama)
@push('header', $halaman->nama)
@push('tombol')
<a href="#tambah" class="btn btn-sm btn-primary tambah">
	Tambah  <i class="fa fa-plus-circle"></i>
</a>
@endpush
@section('content')
<div class="panel-container show">
	<div class="panel-content">
		<table id="datatable" class="table table-bordered table-hover table-striped w-100">
			<thead class="bg-primary-600">
				<tr>
					<th>Nama</th>
					<th>Kode</th>
					<th>Link</th>
					<th class="text-center wid-10" tabindex="0" rowspan="1" colspan="1">Status</th>
					<th class="text-center wid-10" tabindex="0" rowspan="1" colspan="1">Submenu</th>
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
<script type="text/javascript" src="{{ URL::asset('ojisatriani/'.$halaman->kode.'/datatables.js') }}"></script>
@endpush
@push('css')
@include('backend.home.datatable-css')
@endpush
