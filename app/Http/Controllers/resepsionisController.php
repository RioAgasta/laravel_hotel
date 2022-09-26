<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservationModel;

class resepsionisController extends Controller
{
    public function reservation(){
        $list = reservationModel::all();
        return view('pages.reservation', ['list'=>$list]);
    }

    public function search(Request $request){
        $searchResult = $request->search;
        $result=reservationModel::where('nama','like',"%".$searchResult."%")->paginate();
        return view('pages.reservation',['list' => $result]);
    }

    public function searchDate(Request $request){
        $searchResult = $request->searchDate;
        $result=reservationModel::where(['cekin', 'cekout'], $searchResult)->paginate();
        return view('pages.reservation',['list' => $result]);
    }

}