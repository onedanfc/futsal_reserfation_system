<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="icon" href="\img\favicon.png" type="image/gif" sizes="16x16">
    <title>{{ $title }} | Aplikasi Pemesanan Tiket Futsal</title>
    <link rel="stylesheet" href="{{ asset('/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/fontawesome/fontawesome5-overrides.min.css') }}">
    
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-success p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <img src="\img\logo.png" alt="" width="55px">
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link {{ ($title==="Pengaturan Pengelola") ? 'active': '' }}" href="/dashboard/admin/pengelola">
                        <i class="fas fa-bank"></i>
                        <span>Pengelola</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title==="Pengaturan Member") ? 'active': '' }}" href="/dashboard/admin/member">
                        <i class="fas fa-futbol"></i>
                        <span>Member</span></a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <!-- <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form> -->
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#">
                                        <span class="d-none d-lg-inline mr-2 text-gray-600 small">{{ auth()->user()->name }}</span>
                                        {{-- @if(auth()->user()->profile)
                                        <img class="border rounded-circle img-profile" src={{"/storage/".auth()->user()->profile}}>
                                        @else
                                        <img class="border rounded-circle img-profile" src="/img/blank.jpg">
                                        @endif --}}
                                        <img class="border rounded-circle img-profile" src="/img/blank.jpg">
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                                        {{-- <a class="dropdown-item" href={{"/pengaturanprofile/".auth()->user()->id}}>
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Pengaturan Akun
                                        </a> --}}
                                        <div class="dropdown-divider"></div>
                                        <form action="/keluar" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Keluar</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
{{-- ------------------- --}}

@yield('sidebar')

{{-- -------------------- --}}
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>1&FC © 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/js/bs-init.js')}}"></script>
    <script src="{{asset('/js/theme.js')}}"></script>
</body>

</html>