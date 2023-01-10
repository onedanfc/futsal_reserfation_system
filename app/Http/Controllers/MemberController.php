<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Ticket;
use App\Models\User;
use App\Models\lapangan;
use App\Models\Transaksi;
use App\Support\Collection;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function lapangan($id){
        if(date('l')=="Monday"){$hari='a';}
                elseif(date('l')=="Tuesday"){$hari='b';}
                elseif(date('l')=="Wednesday"){$hari='c';}
                elseif(date('l')=="Thursday"){$hari='d';}
                elseif(date('l')=="Friday"){$hari='e';}
                elseif(date('l')=="Saturday"){$hari='f';}
                elseif(date('l')=="Sunday"){$hari='g';};
                
                //cari user
                $user = lapangan::where('id', $id)->pluck('user_id');
                //cari profile
                $profile= User::where('id', $user)->pluck('profile');

                return view('role.member.lapangan', [
                    "title" => "Dashboard Member",
                    'lapangan' => lapangan::where('id', $id)->first(),
                    'ticket' => Ticket::where('lapangan_id', $id)->get(),
                    'hari' => $hari,
                    'profile' => $profile
                ]);
    }

    public function pesan(Request $request){
        // $request->dump();
        if(!$request->jadwal){
            $request->session()->flash('kosong', 'Mohon Pilih Jadwal Terlebih dahulu');
            return back();
        }else{
            $saldo=Saldo::where('user_id', auth()->user()->id)->first();
        $tot=count($request->jadwal);
        if($saldo['akhir']<$request->harga*$tot){
            $request->session()->flash('saldotidakcukup', 'Saldo Anda Tidak Cukup!');
            return back();
        }else{
            $lapangan_id=$request->lapangan_id;
            $user_id=$request->user_id;
            $namalapangan=$request->namalapangan;
            $harga=$request->harga;
            $pemesan=$request->pemesan;
            $jadwal=$request->jadwal;
            return view('role.member.konfirmasi',[
                'title' => 'Halaman Konfirmasi',
                'total' => $tot,
                'lapangan_id' =>$lapangan_id,
                'user_id'=>$user_id,
                'namalapangan'=>$namalapangan,
                'harga'=>$harga,
                'pemesan'=>$pemesan,
                'jadwal'=>$jadwal
            ]);
        }
        }

    }
    public function pconfirm(Request $request){
        // dd($request);

        // Mengisi jadwal ke tabel ticket
        $tot=count($request->jadwal);
        for($i=0; $i<$tot; $i++){
            $pecah=explode(',',$request->jadwal[$i]); //$pecah=
            $jam=$pecah[0];
            $hari=$pecah[1];
            $lapangan=$pecah[2];
             
             $data['lapangan_id']=$request->lapangan_id;
             $data['user_id']=$request->user_Id;
             $data['pemesan']=$request->Pemesan;
             $data['namalapangan']=$request->namalapangan;
             $data['jam']=$jam;
             $data['hari']=$hari;
             $data['lapangan']=$lapangan;
             
             Ticket::create($data);
         }
            $tagihan = $tot*$request->harga;
       //  akses tabel saldo pengelola dengan lapangan_id
            $carilapangan=lapangan::find($request->lapangan_id);
            $user_id_p=$carilapangan['user_id'];
            $saldo_p = Saldo::where('user_id', $user_id_p)->first();

        // //     // akses saldo member dengan user_id
            $saldo_m = Saldo::where('user_id', $request->user_Id)->first();

    // Pengurangan saldo member
        $saldomember= $saldo_m['akhir'];
        $pengurangan=$saldo_m['akhir']-$tagihan;
        $saldo_m['akhir']=$pengurangan;
        $saldo_m->save();
            
        // Penambahan Saldo Member
            $penambahan=$saldo_p['akhir']+$tagihan;
            $saldo_p['akhir']=$penambahan;
            $saldo_p->save();
        
        //Mengisi Tabel Transaksi
        $transaksi['user_id']=$request->user_Id;
        $transaksi['lapangan_id']=$request->lapangan_id;
        $transaksi['pemesan']=$request->Pemesan;
        $transaksi['namalapangan']=$request->namalapangan;
        $transaksi['nominal']=$tagihan;
        $jam='';
        $hari='';
        $lapangan='';
        foreach($request->jadwal as $j){
        $pecah=explode(',',$j);
        $jam .= ','.$pecah[0];
        $hari .= ','.$pecah[1];
        $lapangan = $pecah[2];
        }
        $transaksi['jam']=$jam;
        $transaksi['hari']=$hari;
        $transaksi['lapangan']=$lapangan;
        Transaksi::create($transaksi);
        
        // notif pemesanan berhasil
        $request->session()->flash('successbook', 'Pemesanan Lapangan Telah Berhasil');
        
        // kembali ke lapangan yang telah dipesan
        return redirect("/dashboard/member/".$request->lapangan_id);
    }
    public function saldo(){
        return view('role.member.saldo',[
            'title'=>'Saldo Member',
            'i'=>'1',
            'saldo'=>Saldo::where('user_id', auth()->user()->id)->first(),
            'transaksi'=> Transaksi::where('user_id', auth()->user()->id)->paginate(50)
        ]);
    }
    public function ticket(){
        return view('role.member.ticket',[
            'title'=>'Ticket',
            'ticket' => Ticket::where('user_id', auth()->user()->id)->paginate(10)
        ]);
    }
    public function deposit(Request $request){
        $saldo=Saldo::where('user_id', auth()->user()->id)->first();
    if(!$saldo){
        $validateddata = $request->validate([
            'user_id' => '',
            'namalengkap' => 'max:50|min:4|string|unique:saldos',
            'no_rekening' => 'numeric|unique:saldos',
            'saldo' => 'required|numeric|min:10000'
        ]);
        $validateddata['awal']=$request['saldo'];
        Saldo::create($validateddata);
    }else{
        $request->validate([
            'saldo' => 'required|numeric|min:10000'
        ]);
        $saldo=Saldo::where('user_id', auth()->user()->id)->first();
        $saldo['awal']=$request['saldo'];
        $saldo['status']=0;
        $saldo->save();
    }
        $request->session()->flash('deposit', 'Pengisian Saldo Berhasil.Menunggu Konfirmasi Admin');
        return back();

    }
    public function cari(Request $request){
        if(!$request->carilapangan){
            return back();
        }elseif($request->carilapangan){
            $cari=$request->carilapangan;
            
            $lapangan=lapangan::where('namalapangan','like',"%".$cari."%")->orWhere('kota','like',"%".$cari."%")->where('status',1)->paginate(10);
            
            return view('role.member.main',[
                'title'=> 'Dashboard Member',
                'lapangan'=>$lapangan
            ]);

        }
    }
    public function carijam(Request $request){
            $hari=$request->hari;
            $jam=$request->jam;
            $ticket=Ticket::where('hari','like',"%".$hari."%")->where('jam','like',"%".$jam."%")->pluck('lapangan_id')->toArray();
            
            $lapangan=lapangan::where('status',1)->pluck('id')->toArray();
            $kosong=array_diff($lapangan,$ticket);
            foreach($kosong as $kos){
                $hasil[]=lapangan::where('status', 1)->where('id',$kos)->first();
            }
            $per_page = 5;
            $results = (new Collection($hasil))->paginate($per_page);
            
            return view('role.member.main',[
                'title'=> 'Dashboard Member',
                'lapangan'=>$results
            ]);
    }
}
