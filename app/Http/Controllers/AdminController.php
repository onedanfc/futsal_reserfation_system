<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function pengelola(){
        return view('role.admin.p.index', [
            'title'=>'Administrasi Pengelola',
            'lapangan'=>lapangan::where('status', 0)->get(),
            'i'=>1,
        ]);
    }
    public function confirm(Request $request){
        $saldo=Saldo::where('user_id', $request->user_id)->first();
        $saldo->status=4;
        $lapangan=lapangan::find($request->id);
        $lapangan->status=1;
        $saldo->save();
        $lapangan->save();
        return back();
    }
    public function tolak(Request $request){
        $saldo=Saldo::where('user_id', $request->user_id)->first();
        $lapangan=lapangan::find($request->id);
        Storage::delete($lapangan['gambar1']);
        Storage::delete($lapangan['gambar2']);
        $saldo->delete();
        $lapangan->delete();
        return back();
    }

    public function member(){
        return view('role.admin.m.index', [
            'title'=>'Administrasi Member',
            'saldo'=>Saldo::where('status', 0)->paginate(10),
            'i'=>1,
        ]);
    }
    public function dconfirm(Request $request){
        $saldo=Saldo::find($request->id);
        $jumlah=$saldo['akhir']+$saldo['awal'];
        $saldo['akhir']=$jumlah;
        $saldo['awal']=0;
        $saldo['status']=1;
        $saldo->save();

        return back();
    }
}
