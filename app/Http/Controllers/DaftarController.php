<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DaftarController extends Controller
{
    public function daftar(){
        return view('auth.daftar',[
            'title' => 'Daftar'
        ]);
    }

    //method simpan
    public function simpan(Request $request){
        //cek request data yang ada
        $validateddata = $request->validate([
            'name' => 'required|string|min:4|max:10|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|string|min:8',
            'konfirmasipassword' => 'same:password',
            'role' => 'required'
        ]);

        //mengenkripsi password yang lolos
        $validateddata['password'] = Hash::make($validateddata['password']);

        //memasukkan data ke database
        //serta memberikan peran sesuai role yang dipilih
        if($validateddata['role']=='member'){User::create($validateddata)->attachRole('member');}
        elseif($validateddata['role']=='pengelola'){User::create($validateddata)->attachRole('pengelola');}

        //menampilkan pesan ketika berhasil mendaftar
        // $request->session()->flash('success', 'Registrasi Berhasil!');

        //kembali ke halaman login
        // return redirect('/masuk');
        //langsung di arahkan ke dashboard user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();
            $request->session()->flash('berhasil', 'Registrasi Berhasil!');
            return redirect()->intended('/dashboard');  
        }
    }
}
