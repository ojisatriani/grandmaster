@extends('backend.home.index')
@push('title', 'Detail '. $halaman->nama . ' '. $aksesgrup->nama)
@push('header', 'Detail '. $halaman->nama . ' '.$aksesgrup->nama)
@push('tombol')
<div class="btn-group pull-right">
    <a href="{{ url('aksesgrup') }}" class="btn btn-sm btn-danger">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>
@endpush
@section('content')
<div class="panel-container show">
	<div class="panel-content">
		<table id="datatable" class="table table-bordered table-hover table-striped w-100">
			<thead class="bg-primary-600">
				<tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Username</th>
                </tr>
			</thead>
		</table>
	</div>
</div>
@endsection
@push('js')
@include('backend.home.datatable-js')
<script type="text/javascript" src="{{ URL::asset('ojisatriani/'. $halaman->kode .'/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('ojisatriani/'. $halaman->kode .'/'.$aksesgrup->id.'/datatables_detail.js') }}"></script>
@endpush
@push('css')
@include('backend.home.datatable-css')
@endpush