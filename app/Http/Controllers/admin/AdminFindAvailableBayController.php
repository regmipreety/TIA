<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\AdminBay;

class AdminFindAvailableBayController extends Controller
{
    public function index()
    {
        return view('admin.bay.findbay');

    }

    public function findBay(Request $request){
        $etatime = $request->date . ' ' . $request->etatime. ':00';
        $etdtime = $request->date . ' ' . $request->etdtime.':00';
        $eta=$request->etatime;
        $etd=$request->etdtime;
        $date = $request->date;
        $bay = AdminBay::findBay($etatime,$etdtime,$request->date);
        return view('admin.bay.findbay',compact('bay','eta','etd','date'));
    }

}
