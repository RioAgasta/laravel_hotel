<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kamarModel;
use App\Models\reservationModel;

class tamuController extends Controller
{
    public function formPesan($id){
        $card=kamarModel::findOrFail($id);
        return view('pages.formpesan', ['card'=>$card]);
    }

    public function index(){
        $card=kamarModel::all();
        return view('pages.superior', ['card'=>$card]);
    }

    public function index2(){
        $card=kamarModel::all();
        return view('pages.deluxe', ['card'=>$card]);
    }

    public function pesan(Request $request){
        // $request->validate([
        //     'nama' => 'required',
        //     'namakamar' => 'required',
        //     'email' => 'required',
        //     'nik' => 'required',
        //     'cekin' => 'required',
        //     'cekout' => 'required',
        //     'type' => 'required',
        //     'jumlah' => 'required',
        // ],
        // [
        //     'nama.required'=>'Nama tidak boleh kosong',
        //     'namakamar.required'=>'Nama Kamar tidak boleh kosong',
        //     'email.required'=>'Email tidak boleh kosong',
        //     'nik.required' => 'NIK tidak boleh kosong',
        //     'cekin.required' => 'Tanggal Check-In tidak boleh kosong',
        //     'cekout.required' => 'Tanggal Check-Out tidak boleh kosong',
        //     'jumlah.required' => 'Jumlah Kamar tidak boleh kosong',
        //     'type.required' => 'Jenis Kamar tidak boleh kosong',
        // ]);

        $data=reservationModel::create([
            'nama'=>$request->nama,
            'namakamar'=>$request->namakamar,
            'nik'=>$request->nik,
            'email'=>$request->email,
            'type'=>$request->type,
            'cekin'=>$request->cekin,
            'cekout'=>$request->cekout,
            'jumlah'=>$request->jumlah,
        ]);

        if($data){
            return redirect('/superior');
        }
    }
}
