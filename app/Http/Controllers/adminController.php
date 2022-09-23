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
            'type'=>$request->type,
        ]);

        if($data){
            return redirect('/superior');
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
            'type' => 'required',
        ],
        [
            'title.required'=>'Title tidak boleh kosong',
            'desc.required'=>'Desc tidak boleh kosong',
            'type.required'=>'Type tidak boleh kosong',
        ]);

        $kamarUpdate=kamarModel::findOrFail($id);
        $kamarUpdate->title=$request->title;
        if ($request->image) {
            $kamarUpdate->image=$request->image;
        }
        $kamarUpdate->desc=$request->desc;
        $kamarUpdate->type=$request->type;
        $kamarUpdate->save();

        return redirect('/superior');
    }

    public function hapusKamar($id){
        $hapus=kamarModel::findOrFail($id);
        $hapus->delete();
        return redirect('/superior');
    }
}
