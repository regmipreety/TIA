<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\AdminBay;
use Carbon;
class AdminBayGraphController extends Controller
{
    public function index()
    {
        $bay = AdminBay::getTodayBay();
        $date = date('Y-m-d');
        $day = Carbon\Carbon::today()->format('l');
        return view('admin.bay.bay',compact('bay','date','day'));
    }

    public function searchBay(Request $request){

        if ($request->ajax()) {
        $date = $request->date;
        $bay = AdminBay::getBayList($request->date);
        $day =  Carbon\Carbon::parse($date)->format('l');
        echo view('admin.bay.ajax_bay', compact('bay','date','day'));
        exit();

        }else{
            $error = array(
                'status'    => 'error',
                'message'   => 'Please try again.'
            );
            return response()->json($error);
        }

    }
}
