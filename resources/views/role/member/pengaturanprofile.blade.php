@extends('role.member.layout.sidebar')
@section('sidebar')

{{-- ----------Pesan Alert------------ --}}
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <center>{{ session('success') }}</center>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if(session()->has('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <center>{{ session('fail') }}</center>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if(session()->has('profile'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <center>{{ session('profile') }}</center>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
{{-- ----------------------------- --}}

<div class="container-fluid">
    <h3 class="text-dark mb-4">Pengaturan Profile</h3>
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <form action="/pengaturanprofile/delete" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user['id'] }}">
                        <button type="submit" class="hapus_profile" onclick="return confirm('Foto profile akan dihapus.Yakin?')">Hapus Gambar</button>
                    </form>
                    <div class="card-body text-center shadow">
                        @if($user->profile)
                            <img class="rounded-circle mb-3 mt-4" src="{{ asset('storage/'.$user['profile']) }}" width="160" height="160">
                        @else
                            <img class="rounded-circle mb-3 mt-4" src="/img/blank.jpg" width="160" height="160">
                        @endif
                        <form action="/pengaturanprofile/upload" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user['id'] }}">
                            <input class="gambarprofile form-control-file custom-file-input" type="file" id="user_group_logo" accept="image/*" name="profile">
                            <input type="hidden" name="oldprofile" value="{{ $user['profile'] }}">
                            <label id="user_group_label" for="user_group_logo"><i class="fas fa-upload"></i>&nbsp;Pilih Gambar</label>
                            <div class="form-group"><button class="btn btn-success btn-sm" type="submit">Upload Gambar</button></div>
                                @error('profile')
                                    <div class="invalid-report">
                                    {{ $message }}
                                    </div>    
                                @enderror
                        </form>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-success m-0 font-weight-bold">User Settings</p>
                    </div>
                    <div class="card-body">

                        <form action="/pengaturanprofile/update" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <input type="hidden" name="id" value="{{ $user['id'] }}">
                                    <div class="form-group">
                                        <label for="username"><strong>Username</strong></label>
                                        <input class="form-control" type="text" id="username" name="name" value="{{ $user['name'] }}">
                                    </div>
                                    @error('name')
                                <div class="invalid-report">
                                   {{ $message }}
                                    </div>    
                                @enderror
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email"><strong>Email Address</strong></label>
                                        <input class="form-control" type="email" id="email" name="email" value="{{ $user['email'] }}">
                                    </div>
                                    @error('email')
                                <div class="invalid-report">
                                   {{ $message }}
                                    </div>    
                                @enderror
                                </div>
                            </div>
                            <div class="card-header py-3">
                                <p class="text-success m-0 font-weight-bold">Ubah Password</p>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password"><strong>Password Lama</strong></label>
                                        <input class="form-control" type="password" id="password" name="password">
                                        <input type="hidden" name="oldpassword" value="{{ $user['password'] }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="newpassword"><strong>Password Baru</strong></label>
                                        <input class="form-control" type="password" id="newpassword" name="newpassword">
                                    </div>
                                    @error('newpassword')
                                <div class="invalid-report">
                                   {{ $message }}
                                    </div>    
                                @enderror
                                </div>
                            </div>
                            <div class="form-group"><button class="btn btn-success btn-sm" type="submit">Update Profile</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection