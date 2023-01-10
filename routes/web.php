<?php

use App\Models\User;
use App\Models\lapangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Halaman Awal yang bisa diakses tanpa login
Route::get('/', function () {
    return view('welcome',[
        'title' => 'Beranda'
    ]);
})->middleware('guest');

// ------------------------
Route::get('/dashboard/tentang',[LandingController::class, 'tentang']);
Route::get('/dashboard/bantuan',[LandingController::class, 'bantuan']);
Route::get('/dashboard/cari',[LandingController::class, 'cari']);
Route::get('/dashboard/cari/{id}',[LandingController::class, 'lapangan']);

// Rute Login
Route::get('/masuk',[LoginController::class, 'masuk'])->middleware('guest');
Route::post('/masuk',[LoginController::class, 'auth']);
Route::post('/keluar',[LoginController::class, 'logout']);

//Rute Daftar
Route::get('/daftar',[DaftarController::class, 'daftar'])->middleware('guest');
Route::post('/daftar',[DaftarController::class, 'simpan']);


//Route Dashboard/pengelola
Route::get('/dashboard',[DashboardController::class, 'index']);
Route::get('/pengelola/saldo',[DashboardController::class, 'saldo']);
Route::post('/dashboard/book',[DashboardController::class, 'book']);
Route::post('/dashboard/reset',[DashboardController::class, 'reset']);



//pengaturan profile
Route::get('/pengaturanprofile/{id}',[ProfileController::class, 'profile']);
Route::post('/pengaturanprofile/update',[ProfileController::class, 'update']);
Route::post('/pengaturanprofile/upload',[ProfileController::class, 'upload']);
Route::post('/pengaturanprofile/delete',[ProfileController::class, 'delete']);

//Route lapangan
Route::get('/lapangan/{user_id}', function($user_id){
    if(!Auth::user() || $user_id != Auth::user()->id){return back();}
    elseif(Auth::user()->hasRole('pengelola')){
    return view('role.pengelola.lapangan',['title'=>'Pengaturan Lapangan','lapangan'=>lapangan::where('user_id',$user_id)->first()]);
    }elseif(Auth::user()->hasRole('member')){
        return view('role.member.lapangan',['title'=>'Cari Lapangan']);
    }
});
Route::post('/lapangan/store',[LapanganController::class, 'store']);
Route::post('/lapangan/update',[LapanganController::class, 'update']);

//Route saldo
Route::get('/saldo', function(){
    if(!Auth::user()){return back();}
    elseif(Auth::user()->hasRole('pengelola')){
    return view('role.pengelola.saldo',['title'=>'Saldo']);
    }elseif(Auth::user()->hasRole('member')){
        return view('role.member.saldo',['title'=>'Saldo']);
    }
});

// Route Admin
Route::get('/dashboard/admin/pengelola',[AdminController::class, 'pengelola'])->middleware('auth');
Route::get('/dashboard/admin/member',[AdminController::class, 'member'])->middleware('auth');
Route::post('/dashboard/admin/pengelola/lapangan/confirm',[AdminController::class, 'confirm']);
Route::post('/dashboard/admin/pengelola/lapangan/tolak',[AdminController::class, 'tolak']);
Route::post('/dashboard/admin/member/deposit/confirm',[AdminController::class, 'dconfirm']);



// Route Member
Route::get('/dashboard/member/{id}',[MemberController::class, 'lapangan']);
Route::get('/member/cari',[MemberController::class, 'cari']);
Route::get('/member/carijam',[MemberController::class, 'carijam']);
Route::get('/member/saldo',[MemberController::class, 'saldo']);
Route::get('/member/ticket',[MemberController::class, 'ticket']);
Route::post('/dashboard/member/pesan',[MemberController::class, 'pesan']);
Route::post('/dashboard/member/pesan/confirm',[MemberController::class, 'pconfirm']);
Route::post('/member/saldo/deposit',[MemberController::class, 'deposit']);



