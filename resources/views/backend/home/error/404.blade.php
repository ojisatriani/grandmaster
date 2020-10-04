@extends('backend.home.index')
@push('header', ($submenu->nama ?? 'ERROR'))
@section('content')
<div class="h-alt-hf d-flex flex-column align-items-center justify-content-center text-center">
    <h1 class="page-error color-fusion-500">
        <span class="text-gradient">404</span>
        <small class="fw-500">
            {{ ($submenu->nama ?? 'ERROR') }}
        </small>
    </h1>
    <h3 class="fw-500 mb-5">
        Mohon maaf, Halaman tidak ditemukan.
    </h3>
</div>
@endsection
