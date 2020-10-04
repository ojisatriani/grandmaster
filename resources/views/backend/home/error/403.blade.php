@extends('backend.home.index')
@push('header', ($submenu->nama ?? 'Tidak ada akses'))
@section('content')
<div class="h-alt-hf d-flex flex-column align-items-center justify-content-center text-center">
    <h1 class="page-error color-fusion-500">
        <span class="text-gradient">403</span>
        <small class="fw-500">
            {{ ($submenu->nama ?? 'Tidak ada akses') }}
        </small>
    </h1>
    <h3 class="fw-500 mb-5">
        Mohon maaf, anda tidak ada akses untuk mengunjungi halaman ini.
    </h3>
</div>
@endsection
