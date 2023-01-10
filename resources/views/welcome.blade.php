@extends('layoutnavbar.navbar')
@section('navbar')
@if(session()->has('kosong'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <center>{{ session('kosong') }}</center>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <header class="mt-5 text-center text-info masthead" style="background:url('/img/carousel2.png'); font-family:cursive;">
        <div class="container-fluid mt-1">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form action="/dashboard/cari" method="get">
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0"><input class="form-control form-control-lg" type="text" placeholder="Masukkan Nama Lapangan/Kota..." name="cari"></div>
                            <div class="col-12 col-md-3"><button class="btn btn-primary btn-block btn-lg" type="submit">Cari</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
@endsection