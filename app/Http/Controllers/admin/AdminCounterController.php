<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\AdminCounter;
use Carbon;

class AdminCounterController extends Controller
{
    public function index()
    {
        $date = date('Y-m-d');
        $counter = AdminCounter::getAllCounterList($date);
        $day = Carbon\Carbon::today()->format('l');
        return view('admin.counter.list',compact('counter','date','day'));
    }

    public function create()
    {
        return view('admin.counter.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'counter_number' => 'required',
            'eta' => 'required',
            'etd' => 'required',
            'airlines' => 'required',
            // 'flight_type' => 'required',
            'days' => 'required',
            'flight_date' => 'required',
        ]);
            $input = $request->all();
            $insert = AdminCounter::create($input);

            if ($insert) {
                $status = 'Data Saved Successfully.';
            } else {
                $status = 'Data Save Failed.';
            }

            $request->session()->flash('status', $status);
            return redirect(route('counter.index'));
    }

    public function edit($id)
    {
        $counter= AdminCounter::findOrFail($id);
        return view('admin.counter.edit',compact('counter'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'counter_number' => 'required',
            'eta' => 'required',
            'etd' => 'required',
            'airlines' => 'required',
            // 'flight_type' => 'required',
            'days' => 'required',
            'flight_date' => 'required',
        ]);
            $input = $request->all();
            $data = AdminCounter::find($id);
            $update = $data->fill($input)->save();

            if ($update) {
                $status = 'Data Updated Successfully.';
            } else {
                $status = 'Data Update Failed.';
            }

            $request->session()->flash('status', $status);
            return redirect(route('counter.index'));
    }

    public function destroy(Request $request, $id)
    {
        $data = AdminCounter::find($id);
        $delete = $data->delete();
        if ($delete) {
            $status = 'Data Deleted Successfully.';
        } else {
            $status = 'Data Delete Failed.';
        }

        $request->session()->flash('status', $status);

        return redirect()->back();
    }

    public function counterSearch(Request $request)
    {
        $date = $request->date;
        $counter = AdminCounter::getAllCounterList($date);
        $day =  Carbon\Carbon::parse($date)->format('l');
        return view('admin.counter.list',compact('counter','date','day'));
    }

    public function counterDetail(Request $request)
    {
        if ($request->ajax()){
            $counter = AdminCounter::getCounterDetail($request->counter,$request->date);
            return response()->json($counter);
        }
    }

}
