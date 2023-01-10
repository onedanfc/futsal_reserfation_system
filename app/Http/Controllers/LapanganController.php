<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LapanganController extends Controller
{
    public function store(Request $request){
        // $request->dump();
        // cek validasi data yang dikirim
        $saldo['user_id']= auth()->user()->id;
        $saldo['awal']=0;
        $saldo['akhir']=0;
        $saldo['no_rekening']='kosong';
        $saldo['namalengkap']='kosong';
        $saldo['status']=3;

        $validateddata = $request->validate([
            'user_id'=>'',
            'namalapangan' => 'required|string|min:4|max:50|unique:lapangans',
            'kota' => 'required|string',
            'jml_lapangan' => 'required',
            'harga' => 'required|numeric|max:500000',
            'phone' => 'required|numeric|unique:lapangans',
            'aktif'=>'',
            'detail' => 'required|string|min:20',
            'gambar1' => 'required|image|file|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'gambar2' => 'required|image|file|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
        $validateddata['gambar1']=$request->file('gambar1')->store('img/lapangan');
        $validateddata['gambar2']=$request->file('gambar2')->store('img/lapangan');
        
        Saldo::create($saldo);
        lapangan::create($validateddata);

        $request->session()->flash('success', 'Lapangan Berhasil Didaftarkan');
        return back();
    }

    public function update(Request $request){
        if($request->gambar1==null && $request->gambar2==null){
            $lapangan=lapangan::find($request->id);
            $validateddata = $request->validate([
                'id'=> '',
                'namalapangan' => 'required|string|min:4|max:50',
                'kota' => 'required|string',
                'jml_lapangan' => 'required',
                'harga' => 'required|numeric|max:500000',
                'phone' => 'required|numeric',
                'aktif'=>'',
                'detail' => 'required|string|min:20',
            ]);
            $lapangan->namalapangan=$validateddata['namalapangan'];
            $lapangan->kota=$validateddata['kota'];
            $lapangan->jml_lapangan=$validateddata['jml_lapangan'];
            $lapangan->harga=$validateddata['harga'];
            $lapangan->phone=$validateddata['phone'];
            $lapangan->aktif=$validateddata['aktif'];
            $lapangan->detail=$validateddata['detail'];
            $lapangan->save();
                $request->session()->flash('update', 'Berhasil Update Lapangan');
        }else{
            $lapangan=lapangan::find($request->id);
            $validateddata = $request->validate([
                'id'=> '',
                'namalapangan' => 'required|string|min:4|max:50',
                'kota' => 'required|string',
                'jml_lapangan' => 'required',
                'harga' => 'required|numeric|max:500000',
                'phone' => 'required|numeric',
                'aktif'=>'',
                'detail' => 'required|string|min:20',
                'gambar1' => 'required|image|file|mimes:jpeg,png,jpg,gif,svg|max:5120',
                'gambar2' => 'required|image|file|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);
            $lapangan->namalapangan=$validateddata['namalapangan'];
            $lapangan->kota=$validateddata['kota'];
            $lapangan->jml_lapangan=$validateddata['jml_lapangan'];
            $lapangan->harga=$validateddata['harga'];
            $lapangan->phone=$validateddata['phone'];
            $lapangan->aktif=$validateddata['aktif'];
            $lapangan->detail=$validateddata['detail'];
            Storage::delete($request->oldgambar1);
            Storage::delete($request->oldgambar2);
            $validateddata['gambar1']=$request->file('gambar1')->store('img/lapangan');
            $validateddata['gambar2']=$request->file('gambar2')->store('img/lapangan');
            $lapangan->gambar1=$validateddata['gambar1'];
            $lapangan->gambar2=$validateddata['gambar2'];
            $lapangan->save();
            $request->session()->flash('update', 'Berhasil Update Lapangan');
        }
        return back();
    }
}

