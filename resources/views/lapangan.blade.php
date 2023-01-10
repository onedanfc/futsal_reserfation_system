@extends('layoutnavbar.navbar')
@section('navbar')
<marquee scrolldelay="10" behavior="alternate" style="color: red; font-size: 25px; position: absolute;
    z-index: 2;">fitur isi saldo,edit profile,dan pemesanan lapangan hanya muncul ketika telah melakukan proses registrasi!
</marquee>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('storage/'.$lapangan['gambar1']) }}" class="d-block w-100 h-75" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('storage/'.$lapangan['gambar2']) }}" class="d-block w-100 h-75" alt="...">
          </div>
        </div>
</div>
<ul class="nav nav-pills justify-content-center" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Detail Lapangan</button>
        </li>
        @for($j=1; $j<=$lapangan['jml_lapangan']; $j++)
            <li class="nav-item" role="presentation">
                <button class="btn btn-warning" id="profile-tab" data-bs-toggle="tab" data-bs-target="#lapangan{{ $j }}" type="button" role="tab" aria-controls="lapangan{{ $j }}" aria-selected="false">Lapangan {{ $j }}</button>
            </li>
        @endfor        
</ul>

<div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            
            <div class="row lapangan-row">
                <div class="col-md-4 relative">
                    <div class="avatar center">
                        <div class="avatar-bg center">
                            @if($profile[0]===null)
                                <img class="border rounded-circle img-profile" src="/img/blank.jpg" alt="" width="250px" height="250px">
                            @else
                                <img class="border rounded-circle img-profile" src="{{ asset('storage/'.$profile[0]) }}" alt="" width="250px" height="250px">
                            @endif
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-8">
                    <h1>{{ $lapangan['namalapangan'] }}</h1>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Kota</label>
                                <h5>{{ $lapangan['kota'] }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Harga/Jam </label>
                                <h5>Rp. {{ number_format($lapangan['harga'],0,',' , '.') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Telepon/Whatsapp</label>
                                <h5>{{ $lapangan['phone'] }}({{ $lapangan['aktif'] }})</h5>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Detail Tambahan</label>
                                <pre><h5>{{ $lapangan['detail'] }}</h5></pre>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        @for($j=1; $j<=$lapangan['jml_lapangan']; $j++)
        <div class="tab-pane fade" id="lapangan{{ $j }}" role="tabpanel" aria-labelledby="lapangan{{ $j }}">
            <table class="table table-borderless table-sm table-fluid">
                <thead>
                    <tr>
                        <th style="color: violet">lapangan {{ $j }}</th>
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
                    <form>
                        @for($i=07; $i<=23; $i++)
                            <tr>
                                <td class="align-middle">{{ $i }}.00-{{ $i+1 }}.00</td>
                                @for($a='a'; $a<='g'; $a++)
                                <td>
                                    @if($a<=$hari)
                                        @if($i<=date("H") || $a<$hari)
                                            <div class="containerjadwal">
                                                <div class="nonaktif"></div>
                                                <div class="textjadwal"></div>
                                            </div>
                                        @else
                                            <div class="containerjadwal">
                                                <input type="checkbox" value="{{ $i }},{{ $a }},{{ $j }}" name="jadwal[]" @foreach($ticket as $t){{ ($i==$t['jam'] && $a==$t['hari'] && $j==$t['lapangan']) ? 'disabled': '' }}@endforeach>
                                                <div class="textjadwal"><center>@foreach($ticket as $t){{ ($i==$t['jam'] && $a==$t['hari'] && $j==$t['lapangan']) ? $t['pemesan']: '' }}@endforeach</center></div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="containerjadwal">
                                            <input type="checkbox" value="{{ $i }},{{ $a }},{{ $j }}" name="jadwal[]" @foreach($ticket as $t){{ ($i==$t['jam'] && $a==$t['hari'] && $j==$t['lapangan']) ? 'disabled': '' }}@endforeach>
                                            <div class="textjadwal"><center>@foreach($ticket as $t){{ ($i==$t['jam'] && $a==$t['hari'] && $j==$t['lapangan']) ? $t['pemesan']: '' }}@endforeach</center></div>
                                        </div>
                                    @endif
                                    
                                </td>
                                @endfor
                            </tr>
                        @endfor
                            <tr>
                                <td></td>
                                {{-- <td colspan="7"><button class="btn btn-success col-11 mx-auto" type="submit">Pesan</button></td> --}}
                            </tr>
                    </form>
                </tbody>
            </table>
        </div>
        @endfor
    </div>

<!--<div class="container lapangan profile-view" style="z-index:1">-->
    
<!--            <div class="row lapangan-row">-->
<!--                <div class="col-md-4 relative">-->
<!--                    <div class="avatar center">-->
<!--                        <div class="avatar-bg center">-->
<!--                            @if($profile[0]===null)-->
<!--                                <img class="border rounded-circle img-profile" src="/img/blank.jpg" alt="" width="250px" height="250px">-->
<!--                            @else-->
<!--                                <img class="border rounded-circle img-profile" src="{{ asset('storage/'.$profile[0]) }}" alt="" width="250px" height="250px">-->
<!--                            @endif-->
<!--                        </div>-->
<!--                    </div>-->
                    
<!--                </div>-->
<!--                <div class="col-md-8">-->
<!--                    <h1>{{ $lapangan['namalapangan'] }}</h1>-->
<!--                    <hr>-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-6 col-sm-12">-->
<!--                            <div class="form-group">-->
<!--                                <label class="control-label">Kota</label>-->
<!--                                <h5>{{ $lapangan['kota'] }}</h5>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-6 col-sm-12">-->
<!--                            <div class="form-group">-->
<!--                                <label class="control-label">Harga/Jam </label>-->
<!--                                <h5>Rp. {{ number_format($lapangan['harga'],0,',' , '.') }}</h5>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-6 col-sm-12">-->
<!--                            <div class="form-group">-->
<!--                                <label class="control-label">Telepon/Whatsapp</label>-->
<!--                                <h5>{{ $lapangan['phone'] }}({{ $lapangan['aktif'] }})</h5>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-6 col-sm-12">-->
<!--                            <div class="form-group">-->
<!--                                <label class="control-label">Detail Tambahan</label>-->
<!--                                <pre><h5>{{ $lapangan['detail'] }}</h5></pre>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                </div>-->
<!--            </div>-->
<!--    </div>-->
<!--    <hr>-->
    
<!--    <div class="btn-group btn-group-toggle" data-toggle="buttons">-->
<!--        @for($j=1; $j<=$lapangan['jml_lapangan']; $j++)-->
<!--            <label class="btn btn-outline-info">Lapangan {{ $j }}<input type="radio" name="btnradio" onclick="lapangan{{ $j }}()"></label>-->
<!--        @endfor-->
<!--    </div>-->

<!--@for($j=1; $j<=$lapangan['jml_lapangan']; $j++)-->
<!--    <div class="table-responsive-sm" id="lapangan{{ $j }}" style="display: none;">-->
<!--    <table class="table table-borderless table-lg">-->
<!--        <thead>-->
<!--            <tr>-->
<!--                <th style="color: violet">lapangan {{ $j }}</th>-->
<!--                <th>Senin</th>-->
<!--                <th>Selasa</th>-->
<!--                <th>Rabu</th>-->
<!--                <th>Kamis</th>-->
<!--                <th>Jum'at</th>-->
<!--                <th>Sabtu</th>-->
<!--                <th>Minggu</th>-->
<!--            </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--            <form>-->
<!--                @for($i=07; $i<=23; $i++)-->
<!--                    <tr>-->
<!--                        <td class="align-middle">{{ $i }}.00-{{ $i+1 }}.00</td>-->
<!--                        @for($a='a'; $a<='g'; $a++)-->
<!--                        <td>-->
<!--                            @if($a<=$hari)-->
<!--                                @if($i<=date("H") || $a<$hari)-->
<!--                                    <div class="containerjadwal">-->
<!--                                        <div class="nonaktif"></div>-->
<!--                                        <div class="textjadwal"></div>-->
<!--                                    </div>-->
<!--                                @else-->
<!--                                    <div class="containerjadwal">-->
<!--                                        <input type="checkbox" value="{{ $i }},{{ $a }},{{ $j }}" name="jadwal[]" @foreach($ticket as $t){{ ($i==$t['jam'] && $a==$t['hari'] && $j==$t['lapangan']) ? 'disabled': '' }}@endforeach>-->
<!--                                        <div class="textjadwal"><center>@foreach($ticket as $t){{ ($i==$t['jam'] && $a==$t['hari'] && $j==$t['lapangan']) ? $t['pemesan']: '' }}@endforeach</center></div>-->
<!--                                    </div>-->
<!--                                @endif-->
<!--                            @else-->
<!--                                <div class="containerjadwal">-->
<!--                                    <input type="checkbox" value="{{ $i }},{{ $a }},{{ $j }}" name="jadwal[]" @foreach($ticket as $t){{ ($i==$t['jam'] && $a==$t['hari'] && $j==$t['lapangan']) ? 'disabled': '' }}@endforeach>-->
<!--                                    <div class="textjadwal"><center>@foreach($ticket as $t){{ ($i==$t['jam'] && $a==$t['hari'] && $j==$t['lapangan']) ? $t['pemesan']: '' }}@endforeach</center></div>-->
<!--                                </div>-->
<!--                            @endif-->
                            
<!--                        </td>-->
<!--                        @endfor-->
<!--                    </tr>-->
<!--                @endfor-->
<!--                    <tr>-->
<!--                        <td></td>-->
<!--                        {{-- <td colspan="7"><button class="btn btn-success col-11 mx-auto" type="submit">Pesan</button></td> --}}-->
<!--                    </tr>-->
<!--            </form>-->
<!--        </tbody>-->
<!--    </table>-->
<!--</div>-->
@endfor
@endsection
<script src="\js\displaylapangan.js"></script>