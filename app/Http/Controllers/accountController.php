<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class accountController extends Controller
{
    public function simpanData(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'tgllahir' => 'required'
        ],
        [
            'name.required'=>'Nama tidak boleh kosong',
            'email.required'=>'Email tidak boleh kosong',
            'password.required'=>'Password tidak boleh kosong',
            'role.required' => 'Jenis Akun tidak boleh kosong',
            'tgllahir.required' => 'Tanggal Lahir tidak boleh kosong',
        ]);

        $data=User::create([
            'name'=>$request->name,
            'image'=>$request->image,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
            'tgllahir'=>$request->tgllahir,
        ]);

        if($data){
            Session::flash('sukses', 'Register Data Sukses!');
            return redirect('/login');
        }
    }
    public function ubahData(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'tgllahir' => 'required'
        ],
        [
            'name.required'=>'Nama tidak boleh kosong',
            'email.required'=>'Email tidak boleh kosong',
            'tgllahir.required' => 'Tanggal Lahir tidak boleh kosong',
        ]);

        $update=Auth::user();
        $update->name=$request->name;
        // If statement dibawah fungsinya supaya image gak ke save jadi NULL kalo gak diisi
        if ($request->image) {
            $update->image=$request->image;
        }
        $update->email=$request->email;
        $update->tgllahir=$request->tgllahir;
        $update->save();

        return redirect('/profile');
    }
    public function halamanLogin(){
        return view('accounts.login');
    }
    public function login(Request $request){
        if($request->has('logout')){
            Auth::logout();
        }

        $credentials=$request->only(['email','password']);
        if(Auth::attempt($credentials)){
            return redirect('/');
        }
        return redirect('/login')->with('message', 'Login gagal! Data tidak sesuai!');
    }
}
