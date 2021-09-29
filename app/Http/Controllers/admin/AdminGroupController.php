<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\AdminGroup;
use Illuminate\Http\Request;

class AdminGroupController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group = AdminGroup::all();
        $result = array(
            'list'          => $group,
            'page_header'   => 'List of Group',
        );
        return view('admin.group.list', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new AdminGroup;
        $group->title = $request->title;
        $group->description = $request->description;
        $group->status = $request->status;
        $group->save();
        return redirect(route('usergroup.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grouplist = AdminGroup::all();
        $group = AdminGroup::findOrFail($id);
        $result = array(
            'list'          => $grouplist,
            'page_header'   => 'List of Group',
            'record'        => $group,
        );
        return view('admin.group.edit', compact('result'));
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
        //$user_id = AdminLoginController::id();
        $group = AdminGroup::findOrFail($id);
        $group->title = $request->title;
        $group->description = $request->description;
        $group->status = $request->status;
        $group->save();
        return redirect(route('usergroup.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $group = AdminGroup::findOrFail($id);
        if($group->id==4){
            $msg = 'Super Admin can not be deleted.';
        }else{
            $msg= 'Group successfully deleted.';
            $group->delete();
        }
        $request->session()->flash('msg', $msg);
        return redirect(route('usergroup.index'));
    }
}
