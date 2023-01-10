<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Saldo;
use App\Models\Ticket;
use App\Models\lapangan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        if(!Auth::user()){
            return back();
        }else{
            if(Auth::user()->hasRole('admin')){
                return view('role.admin.admin', [
                    "title" => "Dashboard Admin"
                ]);
            }elseif(Auth::user()->hasRole('member')){
                return view('role.member.main', [
                    "title" => "Dashboard Member",
                    'lapangan' => lapangan::where('status', 1)->paginate(10)
                ]);
            }elseif(Auth::user()->hasRole('pengelola')){
                
                // if(date('l')=="Monday"){$hari='a';}
                // elseif(date('l')=="Tuesday"){$hari='b';}
                // elseif(date('l')=="Wednesday"){$hari='c';}
                // elseif(date('l')=="Thursday"){$hari='d';}
                // elseif(date('l')=="Friday"){$hari='e';}
                // elseif(date('l')=="Saturday"){$hari='f';}
                // elseif(date('l')=="Sunday"){$hari='g';};
                // $lapangan=lapangan::where('user_id', auth()->user()->id)->first();
                // return view('role.pengelola.main', [
                //     "title" => "Dashboard Pengelola",
                //     'lapangan' => lapangan::where('user_id', auth()->user()->id)->first(),
                //     'ticket' => Ticket::where('namalapangan', $lapangan['namalapangan'])->get(),
                //     'hari' => $hari
                // ]);
                
                if(date('l')=="Monday"){$hari='a';}
                elseif(date('l')=="Tuesday"){$hari='b';}
                elseif(date('l')=="Wednesday"){$hari='c';}
                elseif(date('l')=="Thursday"){$hari='d';}
                elseif(date('l')=="Friday"){$hari='e';}
                elseif(date('l')=="Saturday"){$hari='f';}
                elseif(date('l')=="Sunday"){$hari='g';};
                $lapangan=lapangan::where('user_id', auth()->user()->id)->first();
                if($lapangan==null){
                    return view('role.pengelola.main', [
                        "title" => "Dashboard Pengelola",
                        'lapangan' => lapangan::where('user_id', auth()->user()->id)->first(),
                        'hari' => $hari
                    ]);
                }else{
                    return view('role.pengelola.main', [
                        "title" => "Dashboard Pengelola",
                        'lapangan' => lapangan::where('user_id', auth()->user()->id)->first(),
                        'ticket' => Ticket::where('namalapangan', $lapangan['namalapangan'])->get(),
                        'hari' => $hari
                    ]);
                }
                
            }
        }
    }

    public function book(Request $request){
        if(!$request->jadwal){
            $request->session()->flash('zonk', 'Anda Belum Memilih Jadwal');
            return back();   
        }else{
        $tot=count($request->jadwal);

        for($i=0; $i<$tot; $i++){
           $pecah=explode(',',$request->jadwal[$i]); //$pecah=
           $jam=$pecah[0];
           $hari=$pecah[1];
           $lapangan=$pecah[2];
            
            $data['lapangan_id']=$request->lapangan_id;
            $data['user_id']=$request->user_id;
            $data['pemesan']='*'.$request->pemesan;
            $data['namalapangan']=$request->namalapangan;
            $data['jam']=$jam;
            $data['hari']=$hari;
            $data['lapangan']=$lapangan;
            
            Ticket::create($data);
        }
        $request->session()->flash('book', 'Pemesanan Berhasil');
        return back();
    }
}

    public function reset(Request $request){
        $post = Ticket::where('lapangan_id', $request->lapangan_id);
        $post->delete();
        $request->session()->flash('zonk', 'Seluruh Pesanan Minggu ini telah dihapus');
        return back();
    }
    

    public function saldo(){
        // cari lapangan id dengan user_id pengelola
        $lapangan=lapangan::where('user_id',auth()->user()->id)->first();
        $lapangan_id=$lapangan['id'];
        return view('role.pengelola.saldo',[
            'title'=> 'Saldo Pengelola',
            'saldo'=>Saldo::where('user_id', auth()->user()->id)->first(),
            'i'=> '1',
            'transaksi' => Transaksi::where('lapangan_id',$lapangan_id)->paginate(50)
        ]);
    }

}