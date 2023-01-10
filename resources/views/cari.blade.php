@extends('layoutnavbar.navbar')
@section('navbar')
<form action="/dashboard/cari" method="get">
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0"><input class="form-control form-control-lg" type="text" placeholder="Masukkan Nama Lapangan/Kota..." name="cari"></div>
                            <div class="col-12 col-md-3"><button class="btn btn-primary btn-block btn-lg" type="submit">Cari</button></div>
                        </div>
</form>
@foreach($lapangan as $lap)
            
<div class="emblemcontainer">
    <button class="buttonemblem">
        <a href={{"/dashboard/cari/".$lap['id']}} style="text-decoration: none">
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
@endsection