@extends('role.admin.layout.sidebar')
@section('sidebar')
<div class="container-fluid">
    <div class="flexlapangan text-light">
        <div>
            <a class="nav-link" href="#lapangan" onclick="lapangan()">lapangan</a>
        </div>
        <div>
            <a class="nav-link" href="#saldo" onclick="saldo()">saldo</a>
        </div>
    </div>
<div class="table-responsive">
    <table id="lapangan" style="display: none;" class="table table-info table-striped table-hover caption-top">
        <caption>Lapangan</caption>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Lapangan</th>
                <th>Kota</th>
                <th>Harga</th>
                <th>Telephone</th>
                <th>Gambar</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lapangan as $l)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $l['namalapangan'] }}</td>
                <td>{{ $l['kota'] }}</td>
                <td>Rp.{{ $l['harga'] }}</td>
                <td>{{ $l['phone'] }}</td>
                <td>
                    <img src="{{ asset('storage/'.$l['gambar1']) }}" width="75px">
                    <img src="{{ asset('storage/'.$l['gambar2']) }}" width="75px">
                </td>
                <td style="display: flex;">
                    <form action="/dashboard/admin/pengelola/lapangan/confirm" method="post">@csrf <input type="hidden" value="{{ $l['id'] }}" name="id"><input type="hidden" value="{{ $l['user_id'] }}" name="user_id"><button class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button></form>               
                    &nbsp;<form action="/dashboard/admin/pengelola/lapangan/tolak" method="post">@csrf <input type="hidden" value="{{ $l['id'] }}" name="id"><input type="hidden" value="{{ $l['user_id'] }}" name="user_id"><button class="btn btn-danger btn-sm"><i class="fa fa-ban" aria-hidden="true"></i></button></form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- ---------------saldo --}}
<div class="table-responsive">
    <table id="saldo" style="display: none;" class="table table-info table-striped table-hover caption-top">
        <caption>Saldo</caption>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Lapangan</th>
                <th>Kota</th>
                <th>Harga</th>
                <th>Telephone</th>
                <th>Gambar</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Onedanfc</td>
                <td>Semarang</td>
                <td>Rp.55.000</td>
                <td>087850431453</td>
                <td>
                    <img src="/img/blank.jpg" width="45px">
                    <img src="/img/blank.jpg" width="45px">
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<script src="\js\admin.js"></script>
@endsection