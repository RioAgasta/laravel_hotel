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
}
