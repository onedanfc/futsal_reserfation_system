@extends('role.admin.layout.sidebar')
@section('sidebar')
<div class="container-fluid">
    <div class="flexlapangan text-light">
        <div>
            <a class="nav-link" href="#deposit" onclick="deposit()">Deposit Saldo</a>
        </div>
        <div>
            <a class="nav-link" href="#tarik" onclick="tarik()">Tarik Saldo</a>
        </div>
    </div>
<div class="table-responsive">
    <table id="deposit" style="display: none;" class="table table-info table-striped table-hover caption-top">
        <caption>Deposit Saldo</caption>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Lengkap</th>
                <th>Nomor Rekening</th>
                <th>Nominal Pengisian</th>
                <th>Saldo Akhir</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($saldo as $s)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $s['namalengkap'] }}</td>
                <td>{{ $s['no_rekening'] }}</td>
                <td>Rp.{{ $s['awal'] }}</td>
                <td>Rp. {{ $s['akhir'] }}</td>
                <td style="display: flex;">
                    <form action="/dashboard/admin/member/deposit/confirm" method="post">@csrf <input type="hidden" value="{{ $s['id'] }}" name="id"><button class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button></form>               
                    &nbsp;<form action="/dashboard/admin/member/deposit/tolak" method="post">@csrf <input type="hidden" value="{{ $s['id'] }}" name="id"><button class="btn btn-danger btn-sm"><i class="fa fa-ban" aria-hidden="true"></i></button></form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $saldo->links() }}
</div>
{{-- ---------------Tarik --}}
<div class="table-responsive">
    <table id="tarik" style="display: none;" class="table table-info table-striped table-hover caption-top">
        <caption>Tarik Saldo</caption>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Lengkap</th>
                <th>Nomor Rekening</th>
                <th>Nominal Penarikan</th>
                <th>Saldo Akhir</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Onedanfc</td>
                <td>98760987</td>
                <td>Rp 55.000</td>
                <td>Rp. 450.000</td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<script src="\js\admin.js"></script>
@endsection