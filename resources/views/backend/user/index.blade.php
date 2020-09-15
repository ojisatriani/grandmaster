@extends('backend.home.index')
@push('title','User')
@push('header','User')
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
					<th tabindex="0" rowspan="1" colspan="1">Nama</th>
					<th class="text-center wid-10">Username</th>
					<th class="text-center wid-10">Email</th>
					<th class="text-center wid-10" tabindex="0" rowspan="1" colspan="1">Aksi</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
@endsection
@push('js')
@include('backend.home.datatable-js')
<script type="text/javascript" src="{{ URL::asset('ojisatriani/user/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('ojisatriani/user/datatables.js') }}"></script>
@endpush
@push('css')
@include('backend.home.datatable-css')
@endpush
