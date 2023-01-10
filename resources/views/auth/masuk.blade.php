@extends('layoutnavbar.navbar')
@section('navbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;/img/2.jpg&quot;);"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <center>{{ session('success') }}</center>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                @endif
                                @if(session()->has('LoginError'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <center>{{ session('LoginError') }}</center>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Selamat Datang!</h4>
                                </div>
                                <form class="user" action="/masuk" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-control form-control-user @error('email') is-invalid @enderror" type="email" id="email" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email..." name="email" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password" required>
                                    </div>
                                    <div class="form-group"></div>
                                    <button class="btn btn-success btn-block text-white btn-user" type="submit">Masuk</button>
                                    <hr>
                                </form>
                                <div class="text-center"><a class="small text-secondary" href="/daftar">Buat Akun?</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection