@extends('role.pengelola.layout.sidebar')
@section('sidebar')
<div class="container-fluid">
    {{-- -------Pesan Alert--------- --}}
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <center>{{ session('success') }}</center>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('update'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <center>{{ session('update') }}</center>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
{{-- ---------------------- --}}
<h2>Pengaturan Lapangan</h2>
<hr>
@if($lapangan != null)
    @if($lapangan['status']==1)
        <form id="contactForm" action="/lapangan/update" method="post" enctype="multipart/form-data">
            @csrf
            {{-- <div class="form-row">
                <div class="col-md-6">
                    <div id="successfail"></div>
                </div>
            </div> --}}
            <input type="hidden" name="id" value="{{ $lapangan['id'] }}">
            <input type="hidden" name="oldgambar1" value="{{ $lapangan['gambar1'] }}">
            <input type="hidden" name="oldgambar2" value="{{ $lapangan['gambar2'] }}">
            <div class="form-row">
                <div class="col-12 col-md-6" id="message">
                    <div class="form-group">
                        <label for="field">Nama Lapangan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-address-card"></i>
                                </span>
                            </div>
                            <input class="form-control @error('namalapangan') is-invalid @enderror" type="text" id="field" name="namalapangan" placeholder="Masukkan Nama Lapangan..!" value="{{ $lapangan['namalapangan'] }}">
                        </div>
                    </div>
                    @error('namalapangan')
                        <div class="invalid-report">
                            {{ $message }}
                        </div>    
                    @enderror
                    <div class="form-group">
                        <label for="kota">Kota/Kabupaten</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-area-chart" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input class="form-control @error('kota') is-invalid @enderror" type="text" id="kota" name="kota" placeholder="Masukkan Kota atau Kabupaten..!" value="{{ $lapangan['kota'] }}">
                        </div>
                    </div>
                    @error('kota')
                        <div class="invalid-report">
                            {{ $message }}
                        </div>    
                    @enderror
                    <div class="form-group">
                        <label for="jmllapangan">Jumlah Lapangan</label>
                        <div class="input-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('jml_lapangan') is-invalid @enderror" type="radio" name="jml_lapangan" id="jmllapangan" value="1">
                                <label class="form-check-label" for="jmllapangan">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('jml_lapangan') is-invalid @enderror" type="radio" name="jml_lapangan" id="jmllapangan" value="2">
                                <label class="form-check-label" for="jmllapangan">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('jml_lapangan') is-invalid @enderror" type="radio" name="jml_lapangan" id="jmllapangan" value="3">
                                <label class="form-check-label" for="jmllapangan">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('jml_lapangan') is-invalid @enderror" type="radio" name="jml_lapangan" id="jmllapangan" value="4">
                                <label class="form-check-label" for="jmllapangan">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('jml_lapangan') is-invalid @enderror" type="radio" name="jml_lapangan" id="jmllapangan" value="5">
                                <label class="form-check-label" for="jmllapangan">5</label>
                            </div>
                        </div>
                    </div>
                    @error('jml_lapangan')
                        <div class="invalid-report">
                            {{ $message }}
                        </div>    
                    @enderror
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    Rp.
                                </span>
                            </div>
                            <input class="form-control @error('harga') is-invalid @enderror" type="text" id="harga" name="harga" placeholder="Tentukan Harga Sewa..!" value="{{ $lapangan['harga'] }}">
                        </div>
                    </div>
                    @error('harga')
                        <div class="invalid-report">
                            {{ $message }}
                        </div>    
                    @enderror
                    <div class="form-row">
                        <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                            <div class="form-group"><label for="from-phone">Nomor Telephone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+62
                                        </span>
                                    </div>
                                    <input class="form-control @error('phone') is-invalid @enderror" type="text" id="from-phone" name="phone" placeholder="contoh:87123456789" value="{{ $lapangan['phone'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="from-calltime">Paling Sering Aktif</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    </div>
                                    <select class="form-control" id="from-calltime" name="aktif">
                                        <optgroup label="Paling Sering Aktif">
                                            <option value="Pagi">Pagi</option>
                                            <option value="Siang">Siang</option>
                                            <option value="Sore">Sore</option>
                                            <option value="Malam">Malam</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('phone')
                        <div class="invalid-report">
                            {{ $message }}
                        </div>    
                    @enderror
                    <div class="form-group">
                        <label for="jmllapangan">Upload Gambar</label>
                        <div class="row">
                    <div class="col"><input class="@error('gambar1') is-invalid @enderror" type="file" name="gambar1"></div>
                    <div class="col"><input class="@error('gambar2') is-invalid @enderror" type="file" name="gambar2"></div>
                        </div>
                    </div>
                    @error('gambar1')
                        <div class="invalid-report">
                            {{ $message }}
                        </div>    
                    @enderror
                    @error('gambar2')
                        <div class="invalid-report">
                            {{ $message }}
                        </div>    
                    @enderror
                    
                    <div class="form-group">
                        <label for="from-comments">Detail Lapangan</label>
                        <textarea class="form-control @error('detail') is-invalid @enderror" id="from-comments" name="detail" placeholder="Masukkan Detail" rows="5">{{ $lapangan['detail'] }}</textarea>
                    </div>
                    @error('detail')
                        <div class="invalid-report">
                            {{ $message }}
                        </div>    
                    @enderror
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <button class="btn btn-success btn-block" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                    <hr class="d-flex d-md-none">
                </div>
                <div class="col-12 col-md-6">
                    <h2>{{ $lapangan['namalapangan'] }}</h2>
                    <h5>{{ $lapangan['kota'] }}</h5>
                    <h4>Rp. {{ number_format($lapangan['harga'],0,',' , '.') }}/Jam</h4>
                    <h5>Telephone:{{ $lapangan['phone'] }}({{ $lapangan['aktif'] }})</h5>
                    <div class="img-fluid">
                    <img src="{{ asset('storage/'.$lapangan['gambar1']) }}" alt="" width="200px">
                    <img src="{{ asset('storage/'.$lapangan['gambar2']) }}" alt="" width="200px">
                    </div>
                    <p><pre style="font-family: cursive">{{ $lapangan['detail'] }}</pre></p>
                    <h6>
                        
                        Lapangan 1
                        @for($i=2; $i<=$lapangan['jml_lapangan']; $i++)
                        |<a href=""> Lapangan{{ $i }} </a>
                        @endfor
                    </h6>
                    <div class="table-responsive-sm">
                    <table class="table table-borderless table-sm">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Senin</th>
                                <th>Selasa</th>
                                <th>Rabu</th>
                                <th>Kamis</th>
                                <th>Jum'at</th>
                                <th>Sabtu</th>
                                <th>Minggu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=07; $i<=23; $i++)
                            <tr>
                                <td>{{ $i }}.00-{{ $i+1 }}.00</td>
                                @for($a='a'; $a<='g'; $a++)
                                <td>
                                    <input type="checkbox" value="{{ $i }}{{ $a }}">
                                    <div class="textjadwal"></div>
                                    
                                </td>
                                @endfor
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </form>
    @elseif($lapangan['status']==0)
        <h4 style="color: red"><strong>Lapanganmu dalam proses verifikasi oleh Admin</strong></h4>
    @endif    
@else
    <form id="contactForm" action="/lapangan/store" method="post" enctype="multipart/form-data">
        @csrf
        {{-- <div class="form-row">
            <div class="col-md-6">
                <div id="successfail"></div>
            </div>
        </div> --}}
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="form-row">
            <div class="col-12 col-md-6" id="message">
                <div class="form-group">
                    <label for="field">Nama Lapangan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-address-card"></i>
                            </span>
                        </div>
                        <input class="form-control @error('namalapangan') is-invalid @enderror" type="text" id="field" name="namalapangan" placeholder="Masukkan Nama Lapangan..!">
                    </div>
                </div>
                @error('namalapangan')
                    <div class="invalid-report">
                        {{ $message }}
                    </div>    
                @enderror
                <div class="form-group">
                    <label for="kota">Kota/Kabupaten</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-area-chart" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input class="form-control @error('kota') is-invalid @enderror" type="text" id="kota" name="kota" placeholder="Masukkan Kota atau Kabupaten..!">
                    </div>
                </div>
                @error('kota')
                    <div class="invalid-report">
                        {{ $message }}
                    </div>    
                @enderror
                <div class="form-group">
                    <label for="jmllapangan">Jumlah Lapangan</label>
                    <div class="input-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('jml_lapangan') is-invalid @enderror" type="radio" name="jml_lapangan" id="jmllapangan" value="1">
                            <label class="form-check-label" for="jmllapangan">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('jml_lapangan') is-invalid @enderror" type="radio" name="jml_lapangan" id="jmllapangan" value="2">
                            <label class="form-check-label" for="jmllapangan">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('jml_lapangan') is-invalid @enderror" type="radio" name="jml_lapangan" id="jmllapangan" value="3">
                            <label class="form-check-label" for="jmllapangan">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('jml_lapangan') is-invalid @enderror" type="radio" name="jml_lapangan" id="jmllapangan" value="4">
                            <label class="form-check-label" for="jmllapangan">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('jml_lapangan') is-invalid @enderror" type="radio" name="jml_lapangan" id="jmllapangan" value="5">
                            <label class="form-check-label" for="jmllapangan">5</label>
                        </div>
                    </div>
                </div>
                @error('jml_lapangan')
                    <div class="invalid-report">
                        {{ $message }}
                    </div>    
                 @enderror
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-usd" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input class="form-control @error('harga') is-invalid @enderror" type="text" id="harga" name="harga" placeholder="Tentukan Harga Sewa..!">
                    </div>
                </div>
                @error('harga')
                    <div class="invalid-report">
                        {{ $message }}
                    </div>    
                @enderror
                <div class="form-row">
                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                        <div class="form-group"><label for="from-phone">Nomor Telephone</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+62
                                    </span>
                                </div>
                                <input class="form-control @error('phone') is-invalid @enderror" type="text" id="from-phone" name="phone" placeholder="contoh:087123456789">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="from-calltime">Paling Sering Aktif</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-clock-o"></i>
                                    </span>
                                </div>
                                <select class="form-control" id="from-calltime" name="aktif">
                                    <optgroup label="Paling Sering Aktif">
                                        <option value="Pagi">Pagi</option>
                                        <option value="Siang">Siang</option>
                                        <option value="Sore">Sore</option>
                                        <option value="Malam">Malam</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                @error('phone')
                    <div class="invalid-report">
                        {{ $message }}
                    </div>    
                @enderror
                <div class="form-group">
                    <label for="jmllapangan">Upload Gambar</label>
                    <div class="row">
                   <div class="col"><input class="@error('gambar1') is-invalid @enderror" type="file" name="gambar1"></div>
                   <div class="col"><input class="@error('gambar2') is-invalid @enderror" type="file" name="gambar2"></div>
                    </div>
                </div>
                @error('gambar1')
                    <div class="invalid-report">
                        {{ $message }}
                    </div>    
                @enderror
                @error('gambar2')
                    <div class="invalid-report">
                        {{ $message }}
                    </div>    
                @enderror
                
                <div class="form-group">
                    <label for="from-comments">Detail Lapangan</label>
                    <textarea class="form-control @error('detail') is-invalid @enderror" id="from-comments" name="detail" placeholder="Masukkan Detail" rows="5"></textarea>
                </div>
                @error('detail')
                    <div class="invalid-report">
                        {{ $message }}
                    </div>    
                @enderror
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <button class="btn btn-success btn-block" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
                <hr class="d-flex d-md-none">
            </div>
            <div class="col-12 col-md-6">
                <h2>Nama Lapangan Anda</h2>
                <h5>Kota</h5>
                <h4>biaya sewa/Jam</h4>
                <h5>Telephone:089696969(Pagi/siang/sore/malam)</h5>
                <img src="/img/blank.jpg" width="200px">
                <img src="/img/blank.jpg" width="200px">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, culpa impedit aperiam repellat tempore, temporibus alias eaque dolores eius officia dicta architecto magnam praesentium voluptate quas, odit excepturi et blanditiis.</p>
                <h6>
                    Lapangan 1
                    @for($i=2; $i<=5; $i++)
                    |<a href=""> Lapangan{{ $i }} </a>
                    @endfor
                </h6>
                <div class="table-responsive-sm">
                <table class="table table-borderless table-sm">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Senin</th>
                            <th>Selasa</th>
                            <th>Rabu</th>
                            <th>Kamis</th>
                            <th>Jum'at</th>
                            <th>Sabtu</th>
                            <th>Minggu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=07; $i<=23; $i++)
                        <tr>
                            <td>{{ $i }}.00-{{ $i+1 }}.00</td>
                            @for($a='a'; $a<='g'; $a++)
                            <td>
                                <input type="checkbox" value="{{ $i }}{{ $a }}">
                                <div class="textjadwal"></div>
                                
                            </td>
                            @endfor
                        </tr>
                        @endfor
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </form>
@endif
</div>
@endsection