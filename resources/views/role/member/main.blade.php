@extends('role.member.layout.sidebar')
@section('sidebar')

<div class="container-fluid">
    @if(session()->has('berhasil'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <center>{{ session('berhasil') }}</center>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="/member/cari" method="GET" class="form-inline d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input class="bg-light form-control border-0 large" type="text" name="carilapangan" placeholder="Nama/Kota ..." value="{{ old('carilapangan') }}">
            <div class="input-group-append">
                <button class="btn btn-success py-0" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <form action="/member/carijam" method="GET" class="form-inline d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <select class="form-control" id="hari" name="hari">
                <optgroup label="Pilih Hari">
                    <option value="a">Senin</option>
                    <option value="b">Selasa</option>
                    <option value="c">Rabu</option>
                    <option value="d">Kamis</option>
                    <option value="e">Jum'at</option>
                    <option value="f">Sabtu</option>
                    <option value="g">Minggu</option>
                </optgroup>
            </select>
            <select class="form-control" id="jam" name="jam">
                <optgroup label="Pilih Jam">
                    <option value="7">07.00</option>
                    <option value="8">08.00</option>
                    <option value="9">09.00</option>
                    <option value="10">10.00</option>
                    <option value="11">11.00</option>
                    <option value="12">12.00</option>
                    <option value="13">13.00</option>
                    <option value="14">14.00</option>
                    <option value="15">15.00</option>
                    <option value="16">16.00</option>
                    <option value="17">17.00</option>
                    <option value="18">18.00</option>
                    <option value="19">19.00</option>
                    <option value="20">20.00</option>
                    <option value="21">21.00</option>
                    <option value="22">22.00</option>
                    <option value="23">23.00</option>
                </optgroup>
            </select>
            <div class="input-group-append">
                <button class="btn btn-success py-0" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <br><hr>
    
        @foreach($lapangan as $lap)
            
                <div class="emblemcontainer">
                    <button class="buttonemblem">
                        <a href={{"/dashboard/member/".$lap['id']}} style="text-decoration: none">
                            @if($lap['gambar1'])
                            <img class="emblem" src="{{ asset('storage/'.$lap['gambar1']) }}">
                            @else
                            <img class="emblem" src="/img/blank.jpg">
                            @endif
                            <div style="font-size: 13px; color: gray;">{{ $lap['kota'] }}</div>
                            <div style="color: rgb(63, 59, 59);">{{ $lap['namalapangan'] }}</div><br>
                        </a>
                    </button>
                </div>
        @endforeach
        {{ $lapangan->links() }}
    
</div>
@endsection