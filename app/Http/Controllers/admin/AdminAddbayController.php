<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\AdminAddbay;

class AdminAddbayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bay=AdminAddbay::get();
        return view('admin.addbay.list',compact('bay'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addbay.create');
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
            'bay_no' => 'required ',
            'flight_type' => 'required',
            
        ]);
            $input = $request->all();
            $insert = AdminAddbay::create($input);

            if ($insert) {
                $status = 'Data Saved Successfully.';
            } else {
                $status = 'Data Save Failed.';
            }

            $request->session()->flash('status', $status);
            return redirect(route('addbay.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bay= AdminAddbay::findOrFail($id);
        return view('admin.addbay.edit',compact('bay'));
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
            'bay_no' => 'required',
        ]);
            $input = $request->all();

            $data = AdminAddbay::find($id);
            $update = $data->fill($input)->save();

            if ($update) {
                $status = 'Data Updated Successfully.';
            } else {
                $status = 'Data Update Failed.';
            }

            $request->session()->flash('status', $status);

            return redirect('/addbay');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $data = AdminAddbay::find($id);
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
