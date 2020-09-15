@extends('backend.home.index')
@push('title', 'Halaman Tidak Ditemukan')
@push('header', 'Halaman Tidak Ditemukan')
@section('content')
<section class="error-page bg-img h-p100" style="background-image: url({{url('backend/images/error-bg.jpg')}});">
    <div class="container h-p100">
        <div class="row h-p100 align-items-center justify-content-center text-center text-white">
            <div class="col-lg-7 col-md-10 col-12">
                <h1 class="text-danger font-size-180 font-weight-bold error-page-title"> 404</h1>
                <h1>Halaman tidak ditemukan</h1>
                <h3>Mungkin anda tidak ada akses ke halaman ini</h3>
                <div class="my-30"><a href="{{url('/')}}" class="btn btn-white btn-outline">Kembali ke beranda</a></div>				  
            </div>				
        </div>
    </div>
</section>
@endsection