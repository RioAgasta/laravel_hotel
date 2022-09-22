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
            'nik' => 'required',
            'tgllahir' => 'required'
        ],
        [
            'name.required'=>'Nama tidak boleh kosong',
            'email.required'=>'Email tidak boleh kosong',
            'password.required'=>'Password tidak boleh kosong',
            'role.required' => 'Jenis Akun tidak boleh kosong',
            'nik.required' => 'NIK tidak boleh kosong',
            'tgllahir.required' => 'Tanggal Lahir tidak boleh kosong',
        ]);

        $data=User::create([
            'name'=>$request->name,
            'image'=>$request->image,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
            'nik'=>$request->nik,
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
            'nik' => 'required',
            'tgllahir' => 'required'
        ],
        [
            'name.required'=>'Nama tidak boleh kosong',
            'email.required'=>'Email tidak boleh kosong',
            'nik.required' => 'NIK tidak boleh kosong',
            'tgllahir.required' => 'Tanggal Lahir tidak boleh kosong',
        ]);

        $update=Auth::user();
        $update->name=$request->name;
        $update->email=$request->email;
        $update->nik=$request->nik;
        $update->tgllahir=$request->tgllahir;
        $update->save();

        return redirect('/profile');
    }
    public function halamanLogin(){
        return view('accounts.login');
    }
    public function login(Request $request){
        $credentials=$request->only(['email','password']);
        if(Auth::attempt($credentials)){
            return redirect('/');
        }
        return redirect('/login')->with('message', 'Login gagal! Data tidak sesuai!');
    }
}
