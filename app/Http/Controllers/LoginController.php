<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function masuk(){
        return view('auth.masuk',[
            'title' => 'Masuk'
        ]);
    }

    //prosess masuk
    public function auth(Request $request){
        //cek data yang dimasukkan
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        //data yang dimasukkan
        //dengan database
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('LoginError', 'Email atau Password Salah!');
    }

    //fungsi logout
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}

