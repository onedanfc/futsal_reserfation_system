@extends('role.member.layout.sidebar')
@section('sidebar')
<div class="container-fluid">
    {{-- {{ dd($jadwal) }} --}}
    <div class="container mx-auto">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p>Total Pesanan</p>
                            </div>
                            <div class="col">
                                <p class="text-right">x{{ $total }} jam</p>
                            </div>
                        </div>
                        <hr style="color: rgb(0,0,0);">
                        <div class="row">
                            <div class="col">
                                <p>Nama Lapangan</p>
                            </div>
                            <div class="col">
                                <p class="text-right">{{ $namalapangan }}</p>
                            </div>
                        </div>
                        <hr style="color: rgb(0,0,0);">
                        <div class="row">
                            <div class="col">
                                <p>Biaya/Jam</p>
                            </div>
                            <div class="col">
                                <p class="text-right">Rp. {{ number_format($harga,0,',' , '.') }},-</p>
                            </div>
                        </div>
                        <hr style="color: rgb(0,0,0);">
                        <div class="row">
                            <div class="col">
                                <p>Biaya Layanan</p>
                            </div>
                            <div class="col">
                                <p class="text-right">&nbsp;Gratis</p>
                            </div>
                        </div>
                        <hr style="color: rgb(0,0,0);">
                        <div class="row" style="color:brown">
                            <div class="col">
                                <p>Total Bayar</p>
                            </div>
                            <div class="col">
                                <p class="text-right">&nbsp;Rp. {{ number_format($harga*$total,0,',' , '.') }},-</p>
                            </div>
                        </div>
                        <hr style="color: rgb(0,0,0);">
                        <div class="row">
                            <div class="col-12"><a href="/dashboard"><button class="btn btn-danger btn-block" type="submit">Batalkan</button></a></div>
                        </div>
                        <hr style="color: rgb(0,0,0);">
                        <form action="/dashboard/member/pesan/confirm" method="POST">
                            @csrf
                            <input type="hidden" name="lapangan_id" value="{{ $lapangan_id }}">
                            <input type="hidden" name="user_Id" value="{{ $user_id }}">
                            <input type="hidden" name="namalapangan" value="{{ $namalapangan }}">
                            <input type="hidden" name="harga" value="{{ $harga }}">
                            <input type="hidden" name="lapangan_id" value="{{ $lapangan_id }}">
                            <input type="hidden" name="Pemesan" value="{{ $pemesan }}">
                            @foreach($jadwal as $jad)
                            <input type="hidden" name="jadwal[]" value="{{ $jad }}">
                            @endforeach
                            <div class="col-15"><button class="btn btn-primary btn-block" type="submit">Bayar Sekarang</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection