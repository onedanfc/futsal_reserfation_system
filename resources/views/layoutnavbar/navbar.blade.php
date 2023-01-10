<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="icon" href="\img\favicon.png" type="image/gif" sizes="16x16">
        <title>{{ $title }} | Aplikasi Pemesanan Tiket Futsal</title>

        {{-- icon bootstrap --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
 
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="{{asset('/fontawesome/fontawesome5-overrides.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('/bootstrap/lapangan.css')}}" />
        <link rel="stylesheet" href="{{asset('/bootstrap/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('/bootstrap/header.css')}}" />
        

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

        <style>
            nav{
                background-color: turquoise;
                font-family: cursive;
            }
            body{
                background-color: gainsboro;
            }
        </style>
    </head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search">
        <div class="container-fluid">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="\img\logo.png" alt="" height="45px">
            </a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link {{ ($title==="Beranda") ? 'text-grey': 'text-white' }}" href="/"><strong>Beranda</strong></a></li>
                    <li class="nav-item"><a class="nav-link {{ ($title==="Halaman Bantuan") ? 'text-grey': 'text-white' }}" href="/dashboard/bantuan"><strong>Bantuan</strong></a></li>
                    <li class="nav-item"><a class="nav-link {{ ($title==="Halaman Tentang") ? 'text-grey': 'text-white' }}" href="/dashboard/tentang"><strong>Tentang</strong></a></li>
                </ul>
                <form class="form-inline mr-auto" target="_self">
                    <!-- <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" name="search"></div> -->
                </form>
                <a class="btn btn-success action-button" role="button" href="/masuk">Masuk</a>
            </div>
        </div>
    </nav>        
        {{-- ------------- --}}
        @yield('navbar')  
        {{-- ---------     --}}   

    <div class="footer-basic">
        <footer>
            <div class="social">
                <a href="#"><i class="icon ion-social-instagram"></i></a>
                <a href="#"><i class="icon ion-social-snapchat"></i></a>
                <a href="#"><i class="icon ion-social-twitter"></i></a>
                <a href="#"><i class="icon ion-social-facebook"></i></a>
            </div>
            <p class="copyright">Onedanfc © 2022</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/js/bs-init.js')}}"></script>
    <script src="{{asset('/js/theme.js')}}"></script>
</body>
</html>        