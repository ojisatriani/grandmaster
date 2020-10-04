@extends('backend.home.index')
@push('header', $submenu->nama)
@section('content')
<div class="h-alt-hf d-flex flex-column align-items-center justify-content-center text-center">
    <h1 class="page-error color-fusion-500">
        <span class="text-gradient">503</span>
        <small class="fw-500">
            {{ $submenu->nama }}
        </small>
    </h1>
    <h3 class="fw-500 mb-5">
        Mohon maaf, halaman ini sedang dalam perbaikan.
    </h3>
</div>
@endsection
