@extends('layoutnavbar.navbar')
@section('navbar')
    {{-- <h2>Ini adalah halaman Tentang ya!</h2> --}}
    <div class="d-flex d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center highlight-blue" id="About" style="height: 500px;background-color: rgba(255,255,255,0.9);">
        <div class="container">
            <div class="intro">
                <h2 class="text-center" style="color: #172f76;">TENTANG APLIKASI</h2>
                <hr style="height: 2px;color: #214a80;background-color: #172f76;">
                <p class="text-center" style="color: #172f76;font-family: Muli, sans-serif;">
                    Dengan adanya plikasi ini diharapkan dapat membantu pihak-pihak yang berhubungan dengan pemesanan lapangan futsal menjadi semakin terbantu!
                   <br><br>
                   Diantaranya seperti:<br>
                   
                       Pihak konsumen yang dalam aplikasi ini disebut (Member) dalam memperoleh informasi mengenai detail lapangan futsal yang masih kosong secara cepat.
                       Mempermudah konsumen(Member) dalam melakukan pemesanan lapangan futsal tanpa perlu datang langsung ke lokasi.<br>
                       Membantu pihak pengelola lapangan dalam menjangkau lebih banyak konsumen.
                      
                </p>
            </div>
            <div class="buttons"></div>
        </div>
    </div>
    
@endsection