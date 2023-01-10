<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\hasRole;

class ProfileController extends Controller
{
   public function profile($id){
        if(!Auth::user()|| $id != Auth::user()->id){return back();}
        elseif(Auth::user()->hasRole('pengelola')){
            $user=User::find($id);
            return view('role.pengelola.pengaturanprofile',['user'=>$user,'title'=>'Pengaturan Profile']);
        }elseif(Auth::user()->hasRole('member')){
            $user=User::find($id);
            return view('role.member.pengaturanprofile',['user'=>$user,'title'=>'Pengaturan Profile']);
        }        
    }

    public function update(Request $request, User $user){
        if($request->password==null && $request->newpassword==null){
            $user=User::find($request->id);
            $validateddata=$request->validate(['name'=>'required|min:4|max:10','email'=>'required|email:dns']);
            $user->name=$validateddata['name'];
            $user->email=$validateddata['email'];
            $user->save();
            $request->session()->flash('success', 'Berhasil Update Profile');
        }else{
            if(Hash::check($request->password,$request->oldpassword)){
                $user=User::find($request->id);
                $validateddata=$request->validate([
                    'name'=>'required|min:4|max:10',
                    'email'=>'required|email:dns',
                    'newpassword'=>'required|min:8'
                ]);
                $user->name=$validateddata['name'];
                $user->email=$validateddata['email'];
                $user->password=Hash::make($validateddata['newpassword']);
                $user->save();
                $request->session()->flash('success', 'Berhasil Update Profile dan password');
            }else{
                $request->session()->flash('fail', 'Password Lama Salah!');
            }
        }
        return back();
    }

    public function upload(Request $request){
        $user=User::find($request->id);
        $validateddata=$request->validate(['profile'=>'required|image|file|mimes:jpeg,png,jpg,gif,svg|max:5120']);
        if($request->file('profile')){
            if(Auth::user()->hasRole('pengelola')){
                if($request->oldprofile){
                    Storage::delete($request->oldprofile);
                }
                $validateddata['profile']=$request->file('profile')->store('img/profile/pengelola');
            }elseif(Auth::user()->hasRole('member')){
                if($request->oldprofile){
                    Storage::delete($request->oldprofile);
                }
                $validateddata['profile']=$request->file('profile')->store('img/profile/member');
            }
            $user->profile=$validateddata['profile'];
            $user->save();
            $request->session()->flash('profile', 'Upload gambar berhasil');
        }
        return back();

    }
    public function delete(Request $request){
        $user=User::find($request->id);
        Storage::delete($user['profile']);
        $user->profile=null;
        $user->save();
        return back();
    }
}
