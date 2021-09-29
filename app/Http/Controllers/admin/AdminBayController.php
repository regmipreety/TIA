<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\AdminBay;
use App\Model\admin\AdminFlightType;
use App\Model\admin\AdminAddbay;
use Carbon;

class AdminBayController extends Controller
{
    public function index()
    {
        $date = date('Y-m-d');
        $bay = AdminBay::getAllBayList($date);
        $day = Carbon\Carbon::today()->format('l');
        return view('admin.bay.list',compact('bay','date','day'));
    }


    public function create()
    {
        $baylist = AdminAddbay::orderBy('bay_no','ASC')->get();
        $flighttype=AdminFlightType::orderBy('flight_type','ASC')->get();
        return view('admin.bay.create',compact('flighttype','baylist'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'bay_number' => 'required || numeric',
            'eta' => 'required',
            'etd' => 'required',
            'flight_type' => 'required',
            'days' => 'required',
            'operation_date' => 'required',
        ]);
            $input = $request->all();
            $insert = AdminBay::create($input);

            if ($insert) {
                $status = 'Data Saved Successfully.';
            } else {
                $status = 'Data Save Failed.';
            }

            $request->session()->flash('status', $status);
            return redirect(route('bay.index'));
    }

    public function edit($id)
    {
        $bay= AdminBay::findOrFail($id);
        $baylist = AdminAddbay::orderBy('bay_no','ASC')->get();
        $flighttype=AdminFlightType::orderBy('flight_type','ASC')->get();

        return view('admin.bay.edit',compact('bay','flighttype','baylist'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'bay_number' => 'required || numeric',
            'eta' => 'required',
            'etd' => 'required',
            'flight_type' => 'required',
            'days' => 'required',
            'operation_date' => 'required',
        ]);
            $input = $request->all();
            $data = AdminBay::find($id);
            $update = $data->fill($input)->save();

            if ($update) {
                $status = 'Data Updated Successfully.';
            } else {
                $status = 'Data Update Failed.';
            }

            $request->session()->flash('status', $status);
            return redirect(route('bay.index'));
    }

    public function destroy(Request $request, $id)
    {
        $data = AdminBay::find($id);
        $delete = $data->delete();
        if ($delete) {
            $status = 'Data Deleted Successfully.';
        } else {
            $status = 'Data Delete Failed.';
        }

        $request->session()->flash('status', $status);

        return redirect()->back();
    }

    public function baySearch(Request $request)
    {
        $date = $request->date;
        $bay = AdminBay::getAllBayList($date);
        $day =  Carbon\Carbon::parse($date)->format('l');
        return view('admin.bay.list',compact('bay','date','day'));
    }

    public function bayDetail(Request $request)
    {
        if ($request->ajax()){
            $bay = AdminBay::getBayDetail($request->bay,$request->date);
            return response()->json($bay);
        }
    }


}
