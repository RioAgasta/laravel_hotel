<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kamarModel;

class adminController extends Controller
{
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
    public function ubahKamar($id, Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'desc' => 'required',
            'type' => 'required',
        ],
        [
            'title.required'=>'Title tidak boleh kosong',
            'image.required'=>'Image tidak boleh kosong',
            'desc.required'=>'Desc tidak boleh kosong',
            'type.required'=>'Type tidak boleh kosong',
        ]);

        $bioUpdate=kamarModel::findOrFail($id);
        $bioUpdate->title=$request->title;
        $bioUpdate->image=$request->image;
        $bioUpdate->desc=$request->desc;
        $bioUpdate->type=$request->type;
        $bioUpdate->save();

        Session::flash('sukses', 'Update Data Sukses!!');
        return redirect('/superior');
    }
}
