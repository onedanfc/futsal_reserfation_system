@extends('layoutnavbar.navbar')
@section('navbar')
   <div class="container">
    <div class="card shadow-lg o-hidden border-0 my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-flex">
                    <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;/img/3.jpg&quot;);"></div>
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h4 class="text-dark mb-4">Buat Akun!</h4>
                        </div>
                        <form class="user" action="/daftar" method="POST">
                            @csrf
                            <div class="form-group"><input class="form-control form-control-user @error('name') is-invalid @enderror" type="text" id="namalengkap" aria-describedby="namalengkapfeedback" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}" required></div>                  
                            @error('name')
                                <div class="invalid-report">
                                   {{ $message }}
                                    </div>    
                            @enderror
                            
                            <div class="form-group"><input class="form-control form-control-user @error('email') is-invalid @enderror" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Alamat Email" name="email" value="{{ old('email') }}" required></div>
                            @error('email')
                                <div class="invalid-report">
                                   {{ $message }}
                                    </div>    
                            @enderror

                            <div class="form-group row">
                                <div class="col">
                                <input class="form-control form-control-user @error('password') is-invalid @enderror" type="password" id="examplePasswordInput" placeholder="Password" name="password" required>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-user @error('konfirmasipassword') is-invalid @enderror" type="password" id="examplePasswordInput" placeholder="Konfirmasi Password" name="konfirmasipassword" required>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    @error('password')
                                    <div class="invalid-report">
                                       {{ $message }}
                                        </div>    
                                @enderror   
                                </div>
                                <div class="col">
                                    @error('konfirmasipassword')
                                    <div class="invalid-report">
                                       {{ $message }}
                                        </div>    
                                @enderror   
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('role') is-invalid @enderror" type="radio" name="role" id="member" value="member">
                                    <label class="form-check-label" for="member">
                                      Member
                                    </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('role') is-invalid @enderror" type="radio" name="role" id="pengelola" value="pengelola">
                                    <label class="form-check-label" for="pengelola">
                                      Pengelola Lapangan
                                    </label>
                                  </div>
                            </div>
                            @error('role')
                                <div   class="invalid-report">
                                    {{ $message }}
                                    </div>    
                                @enderror
                            <button class="btn btn-success btn-block text-white btn-user" type="submit">Daftarkan Akun</button>
                            <hr>
                        </form>
                        <div class="text-center"><a class="small text-secondary" href="/masuk">Sudah Punya Akun? Masuk!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection