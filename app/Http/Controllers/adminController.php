<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kamarModel;

class adminController extends Controller
{
    public function tambahKamarForm(Request $request){
        return view('pages.tambahKamar');
    }

    public function tambahKamar(Request $request){
        $data=kamarModel::create([
            'title'=>$request->title,
            'image'=>$request->image,
            'desc'=>$request->desc,
            'jumlah'=>$request->jumlah,
        ]);

        if($data){
            return redirect('/kamar');
        }
    }

    public function ubahKamarForm($id){
        $kamar=kamarModel::findOrFail($id);
        return view('pages.ubahKamar', ['kamar' => $kamar]);
    }

    public function ubahKamar($id, Request $request){
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'jumlah' => 'required',
        ],
        [
            'title.required'=>'Title tidak boleh kosong',
            'desc.required'=>'Desc tidak boleh kosong',
            'jumlah.required'=>'Jumlah tidak boleh kosong',
        ]);

        $kamarUpdate=kamarModel::findOrFail($id);
        $kamarUpdate->title=$request->title;
        if ($request->image) {
            $kamarUpdate->image=$request->image;
        }
        $kamarUpdate->desc=$request->desc;
        $kamarUpdate->jumlah=$request->jumlah;
        $kamarUpdate->save();

        return redirect('/kamar');
    }

    public function hapusKamar($id){
        $hapus=kamarModel::findOrFail($id);
        $hapus->delete();
        return redirect('/kamar');
    }
}
