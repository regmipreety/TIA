<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\AdminGroup;
use App\Model\admin\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller {


       public function userRegister(){

            $admingroup = AdminGroup::orderBy('title','asc')->get();
            // $admingroup = AdminGroup::all();
            $result = array(
                'page_header'       => 'User Registration',
                'admingroup'        => $admingroup,
            );
    	   return view('admin.adminuser.register', compact('result'));
    }

    public function userRegisterData(Request $request){
    	$adminuser = new AdminUser;
    	$this->validate($request, [
                'name'          		=> 'required|string|min:6',
                'email'          		=> 'required|string|min:6|email',
                'mobileno'				=> 'required|string|min:6',
                'password'				=> 'required|string|min:6|confirmed',
            ]);
    	$adminuser->name = $request->name;
        $adminuser->email = $request->email;
        $adminuser->mobileno = $request->mobileno;
        $adminuser->user_group_id = $request->user_group_id;
        $adminuser->password = bcrypt($request->password);
        $adminuser->status = $request->status;
        $adminuser->save();
        return redirect(route('dashboard'));
    }

    public function adminUserList(){
            // $userlist = AdminUser::all();
            $userlist = AdminUser::getAdminUserList();
            $result = array(
                'userlist'          => $userlist,
            );
            return view('admin.adminuser.list', compact('result'));

    }

     public static function id(){
        $value = session('admin')['userid'];
        return $value;
    }

    public static function deleteUser($id) {

            $user = AdminUser::findOrFail($id);
            $user->delete();
            return redirect(route('user.list'));

    }

    public static function editUser($id){ // when admin want to edit other user profile
        $value = self::id();

            $userlist = AdminUser::findOrFail($id);
            $admingroup = AdminGroup::orderBy('title','asc')->get();
             $result = array(
                'record'            => $userlist,
                'page_header'       => 'Edit User Registration',
                'admingroup'        => $admingroup,
            );
            return view('admin.adminuser.edit', compact('result'));
    }

    public function updateuser(Request $request, $id){
        $adminuser = AdminUser::findOrFail($id);
        if (isset($request->changepwd) && $request->changepwd == 'on') {
            $this->validate($request, [
                'name'                  => 'required|string|min:6',
                'email'                 => 'required|string|min:6|email',
                'mobileno'              => 'required|string|min:6',
                'password'              => 'required|string|min:6|confirmed',
            ]);
            $adminuser->password = bcrypt($request->password);
            $adminuser->name = $request->name;
            $adminuser->email = $request->email;
            $adminuser->mobileno = $request->mobileno;
            $adminuser->user_group_id = $request->user_group_id;
            $adminuser->status = isset($request->status)?$request->status:'1';
            $adminuser->save();
        } else{
             $this->validate($request, [
                'name'                  => 'required|string|min:6',
                'email'                 => 'required|string|min:6|email',
                'mobileno'              => 'required|string|min:6',
            ]);
            $adminuser->name = $request->name;
            $adminuser->email = $request->email;
            $adminuser->mobileno = $request->mobileno;
            $adminuser->user_group_id = $request->user_group_id;
            $adminuser->status = isset($request->status)?$request->status:'1';
            $adminuser->save();
        }

        return redirect(route('user.list'));
    }

    public function dashboard(){
        return view('admin.dashboard');
    }


}
