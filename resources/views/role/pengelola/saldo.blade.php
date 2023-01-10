@extends('role.pengelola.layout.sidebar')
@section('sidebar')
<div class="container-fluid">
    @if(!$saldo)
        Untuk Mengakses Menu Saldo Anda Harus Mendaftarkan Lapangan Terlebih Dahulu!<a href={{"/lapangan/".auth()->user()->id}}>Daftarkan Lapangan!</a>
    @else
        @if($saldo['status']==3)
            <h4>Saldo Anda Belum di Konfirmasi Oleh Admin</h4>
        @else
            <div class="headersaldo">Rp. {{ number_format($saldo['akhir'],0,',' , '.') }},-</div>
            <div class="containersaldo">
                <div class="btn itemsaldo" onclick="tarik()"><center><i class="fs-1 fa fa-undo" aria-hidden="true"></i><br>Tarik saldo</center></div>
                <div class="btn itemsaldo" onclick="transaksimember()"><center><i class="fa fa-exchange" aria-hidden="true"></i><br>Transaksi</center></div>
            </div>
            <div id="tarik" style="display: ">
                @if($saldo['awal']!=0)
                    <h4><p style="color: rgb(223, 37, 114); font-weight:600">Tarik Saldo Anda Belum di konfirmasi Admin</p></h4>    
                @else
                    <div id="nav-tab-card" class="tab-pane fade show active container-fluid">
                        <form action="/pengelola/saldo/tarik" role="form" method="POST">
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
                                <label for="username">Nominal Tarik Saldo</label>
                                <input type="text" name="saldo" placeholder="Minimal Rp 10.000" class="form-control @error('saldo') is-invalid @enderror">
                            </div>
                            @error('saldo')
                                <div class="invalid-report">
                                    {{ $message }}
                                </div>    
                            @enderror
                            <button type="submit" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm">Tarik Saldo  </button>
                        </form>
                    </div>   
                @endif
            </div>
            <div id="transaksimember" style="display: none">
                <div class="table-responsive">
                    <table class="table table-info table-striped table-hover caption-top">
                        <caption>Transaksi</caption>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pemesan</th>
                                <th>Nominal</th>
                                <th>Lapangan</th>
                                <th>Waktu Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksi as $trans)
                            
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $trans['pemesan'] }}</td>
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
        @endif
    @endif
    {{-- @if(!$lapangan)
    <div class="headersaldo">Rp 0,-</div>
    Anda belum Mendaftarkan Lapangan! <a href={{"/lapangan/".auth()->user()->id}}>Daftarkan Lapangan!</a>
    @else
    @if(!$saldo)
    <div class="headersaldo">Rp 0,-</div>
    <h4>Mohon Tunggu Hingga Lapangan Anda disetujui Oleh Admin!</h4>

    @else
    <div class="headersaldo">Rp. {{ number_format($saldo['akhir'],0,',' , '.') }},-</div>
    @endif
    @if($saldo['status']===0)
    <div class="containersaldo">
        <div class="btn itemsaldo" onclick="tarik()"><center><i class="fs-1 fa fa-undo" aria-hidden="true"></i><br>Tarik saldo</center></div>
        <div class="btn itemsaldo" onclick="transaksimember()"><center><i class="fa fa-exchange" aria-hidden="true"></i><br>Transaksi</center></div>
    </div>
    <div id="tarik" style="display: none">
            
                <div id="nav-tab-card" class="tab-pane fade show active container-fluid">
                    <form action="/pengelola/saldo/tarik" role="form" method="POST">
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
                        <label for="username">Nominal Tarik Saldo</label>
                        <input type="text" name="saldo" placeholder="Minimal Rp 10.000" class="form-control @error('saldo') is-invalid @enderror">
                      </div>
                      @error('saldo')
                                <div class="invalid-report">
                                   {{ $message }}
                                    </div>    
                                @enderror
                      <button type="submit" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm">Tarik Saldo  </button>
                    </form>
                </div>
            @else
                @if($saldo['status']==0)
                    <h4><p style="color: rgb(223, 37, 114); font-weight:600">Tarik Saldo Anda Belum di konfirmasi Admin</p></h4>
                @else
                <div id="isi" style="display: none">
                    @if(!$saldo)
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
                    @else
                        @if($saldo['status']==0)
                            <h4><p style="color: rgb(223, 37, 114); font-weight:600">Isi Saldo Anda Belum di konfirmasi Admin</p></h4>
                        @else
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
                        @endif
                    @endif
                
            </div>
                @endif
            @endif
        
    </div>
    <div id="transaksimember" style="display: none">
        <h1>Transaksi Member</h1>
    </div> --}}
</div>
<script>
    function tarik(){
        var t = document.getElementById('tarik');
        if(t.style.display==='none'){
            t.style.display=''
        }else{
            t.style.display='none'
        }
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
        var t = document.getElementById('tarik');
        t.style.display='none';
    }
</script>
    {{-- @endif --}}
@endsection