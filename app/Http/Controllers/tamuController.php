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
        return view('pages.kamar', ['card'=>$card]);
    }

    public function invoice(){
        $card=reservationModel::all();
        return view('pages.invoice', ['card'=>$card]);
    }

    public function pesan($id, Request $request){
        $data=reservationModel::create([
            'nama'=>$request->nama,
            'namakamar'=>$request->namakamar,
            'email'=>$request->email,
            'cekin'=>$request->cekin,
            'cekout'=>$request->cekout,
            'jumlah'=>$request->jumlah,
        ]);

        $decrement=KamarModel::findorFail($id)->decrement('jumlah', $request->jumlah);

        if($data){
            return redirect('/kamar');
        }
    }
}
