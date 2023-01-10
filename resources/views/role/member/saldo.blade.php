@extends('role.member.layout.sidebar')
@section('sidebar')
<div class="container-fluid">
    @if(session()->has('deposit'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <center>{{ session('deposit') }}</center>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
    @endif
    @if(!$saldo)
    <div class="headersaldo">Rp 0,-</div>
    @else
    <div class="headersaldo">Rp. {{ number_format($saldo['akhir'],0,',' , '.') }},-</div>
    @endif
    <div class="containersaldo">
        <div class="btn itemsaldo" onclick="tarik()"><center><i class="fs-1 fa fa-undo" aria-hidden="true"></i><br>Tarik saldo</center></div>
        <div class="btn itemsaldo" onclick="isi()"><center><i class="fa fa-plus-square" aria-hidden="true"></i><br>Isi Saldo</center></div>
        <div class="btn itemsaldo" onclick="transaksimember()"><center><i class="fa fa-exchange" aria-hidden="true"></i><br>Transaksi</center></div>
    </div>
    <div id="tarik" style="display: none">
        <h3><p style="color:red; font-weight:bold">Saldo masih bersifat Uji coba,tidak dapat melakukan penarikan!</p></h3>
    </div>
    <div id="isi" style="display: ">
        {{-- <h1>Member isi saldo</h1> --}}
    
            @if(!$saldo)

            {{-- <center> --}}
                <div id="nav-tab-card" class="tab-pane fade show active container-fluid">
                    <form action="/member/saldo/deposit" role="form" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                      <div class="form-group">
                        <label for="username">Nama Lengkap</label>
                        <input type="text" name="namalengkap" placeholder="Masukkan Nama Lengkap Anda..!" class="form-control @error('namalengkap') is-invalid @enderror">
                      </div>
                      @error('namalengkap')
                                <div class="invalid-report">
                                   {{ $message }}
                                    </div>    
                                @enderror
                      
                      <div class="form-group">
                        <label for="cardNumber">Nomor Rekening</label>
                        <div class="input-group">
                          <input type="text" name="no_rekening" placeholder="Masukkan No Rekening Bank Anda" class="form-control @error('no_rekening') is-invalid @enderror">
                          <div class="input-group-append">
                            <span class="input-group-text text-muted">
                                <i class="fa fa-cc-visa mx-1"></i>
                                <i class="fa fa-cc-amex mx-1"></i>
                                <i class="fa fa-cc-mastercard mx-1"></i>
                            </span>
                        </div>
                        </div>
                      </div>
                      @error('no_rekening')
                                <div class="invalid-report">
                                   {{ $message }}
                                    </div>    
                                @enderror
                      <div class="form-group">
                        <label for="username">Nominal Isi Saldo</label>
                        <input type="text" name="saldo" placeholder="Minimal Rp 10.000" class="form-control @error('saldo') is-invalid @enderror">
                      </div>
                      @error('saldo')
                                <div class="invalid-report">
                                   {{ $message }}
                                    </div>    
                                @enderror
                      <button type="submit" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> Isi Saldo  </button>
                    </form>
                </div>
            {{-- </center> --}}
            @else
                @if($saldo['status']==0)
                    <h4><p style="color: rgb(223, 37, 114); font-weight:600">Isi Saldo Anda Belum di konfirmasi Admin</p></h4>
                @else

                {{-- <center> --}}
                    <div id="nav-tab-card" class="tab-pane fade show active container-fluid">
                        <form action="/member/saldo/deposit" method="POST" role="form">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                          <div class="form-group">
                            <label for="username">Nama Lengkap</label>
                            <input type="text" name="namalengkap" placeholder="Masukkan Nama Lengkap Anda..!" class="form-control @error('namalengkap') is-invalid @enderror" value="{{ $saldo['namalengkap'] }}">
                          </div>
                          @error('namalengkap')
                                <div class="invalid-report">
                                   {{ $message }}
                                    </div>    
                            @enderror
                          
                          <div class="form-group">
                            <label for="cardNumber">Nomor Rekening</label>
                            <div class="input-group">
                              <input type="text" name="no_rekening" placeholder="Masukkan No Rekening Bank Anda" class="form-control @error('no_rekening') is-invalid @enderror" value="{{ $saldo['no_rekening'] }}">
                              <div class="input-group-append">
                                <span class="input-group-text text-muted">
                                    <i class="fa fa-cc-visa mx-1"></i>
                                    <i class="fa fa-cc-amex mx-1"></i>
                                    <i class="fa fa-cc-mastercard mx-1"></i>
                                </span>
                            </div>
                            </div>
                            @error('no_rekening')
                                <div class="invalid-report">
                                   {{ $message }}
                                    </div>    
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="username">Nominal Isi Saldo</label>
                            <input type="text" name="saldo" placeholder="Minimal Rp 10.000" class="form-control @error('saldo') is-invalid @enderror">
                          </div>
                          @error('saldo')
                                <div class="invalid-report">
                                   {{ $message }}
                                    </div>    
                            @enderror
                          <button type="submit" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> Isi Saldo  </button>
                        </form>
                      </div>
                {{-- </center> --}}
                @endif
            @endif
        
    </div>
    <div id="transaksimember" style="display: none">
        <div class="table-responsive">
            <table class="table table-info table-striped table-hover caption-top">
                <caption>Transaksi</caption>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lapangan</th>
                        <th>Nominal</th>
                        <th>Lapangan</th>
                        <th>Waktu Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $trans)
                    
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $trans['namalapangan'] }}</td>
                        <td>Rp {{ number_format($trans['nominal'],0,',' , '.') }}</td>
                        
                        <td>Lapangan {{ $trans['lapangan'] }}</td>
                        <td>{{ $trans['created_at'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $transaksi->links() }}
    </div>
</div>
<script>
    function tarik(){
        var t = document.getElementById('tarik');
        if(t.style.display==='none'){
            t.style.display=''
        }else{
            t.style.display='none'
        }
        var i = document.getElementById('isi');
        i.style.display='none';
        var tm = document.getElementById('transaksimember');
        tm.style.display='none';
    }
    function isi(){
        var i = document.getElementById('isi');
        if(i.style.display==='none'){
            i.style.display=''
        }else{
            i.style.display='none'
        }
        var t = document.getElementById('tarik');
        t.style.display='none';
        var tm = document.getElementById('transaksimember');
        tm.style.display='none';
    }
    function transaksimember(){
        var tm = document.getElementById('transaksimember');
        if(tm.style.display==='none'){
            tm.style.display=''
        }else{
            tm.style.display='none'
        }
        var i = document.getElementById('isi');
        i.style.display='none';
        var t = document.getElementById('tarik');
        t.style.display='none';
    }
</script>
@endsection