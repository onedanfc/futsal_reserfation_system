<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\lapangan;
use App\Models\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function cari(Request $request){
        if(!$request->cari){
            $request->session()->flash('kosong', 'Mohon Masukkan Nama Lapangan atau Nama Kota!');
            return back();
        }else{
            $cari=$request->cari;
        $lapangan=lapangan::where('namalapangan','like',"%".$cari."%")->orWhere('kota','like',"%".$cari."%")->where('status',1)->paginate(10);
        // dd($lapangan);
        return view('cari',[
            'title'=>'Dasboard Cari',
            'lapangan'=>$lapangan
        ]);
        }
    }
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
                //ambil profile dr user_Id
                $profile = User::where('id', $user)->pluck('profile');
                

                return view('lapangan', [
                    "title" => "Dashboard Lapangan",
                    'lapangan' => lapangan::where('id', $id)->first(),
                    'ticket' => Ticket::where('lapangan_id', $id)->get(),
                    'hari' => $hari,
                    'profile' => $profile
                ]);
    }
    public function tentang(){
        return view('tentang',[
            'title'=> 'Halaman Tentang'
        ]);
    }
    public function bantuan(){
        return view('bantuan',[
            'title'=> 'Halaman Bantuan'
        ]);
    }
}
