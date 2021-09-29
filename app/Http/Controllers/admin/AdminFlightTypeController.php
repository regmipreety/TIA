<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\AdminFlightType;

class AdminFlightTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flighttype = AdminFlightType::get();
        return view('admin.flighttype.list',compact('flighttype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flighttype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'flight_type' => 'required',
            'category' => 'required',
        ]);
            $input = $request->all();
            $insert = AdminFlightType::create($input);

            if ($insert) {
                $status = 'Data Saved Successfully.';
            } else {
                $status = 'Data Save Failed.';
            }

            $request->session()->flash('status', $status);
            return redirect('/flighttype');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flighttype= AdminFlightType::findOrFail($id);
        return view('admin.flighttype.edit',compact('flighttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'flight_type' => 'required',
            'category' => 'required',
        ]);
            $input = $request->all();

            $data = AdminFlightType::find($id);
            $update = $data->fill($input)->save();

            if ($update) {
                $status = 'Data Updated Successfully.';
            } else {
                $status = 'Data Update Failed.';
            }

            $request->session()->flash('status', $status);

            return redirect('/flighttype');
    }

    public function destroy(Request $request, $id)
    {
        $data = AdminFlightType::find($id);
        $delete = $data->delete();
        if ($delete) {
            $status = 'Data Deleted Successfully.';
        } else {
            $status = 'Data Delete Failed.';
        }

        $request->session()->flash('status', $status);

        return redirect()->back();
    }
}
