<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\admin\AdminUser;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class AdminProfileController extends Controller {

    public static function editUserProfile($id){ // when user wants to change their profile

            $userlist = AdminUser::findOrFail($id);
            $result = array(
                'record'      => $userlist,
            );
            return view('admin.profile.edit', compact('result'));

    }

    public function updateuser(Request $request, $id){
        $user_group_id = session('admin')['user_group_id'];
        $adminuser = AdminUser::findOrFail($id);
        if (isset($request->changepwd) && $request->changepwd == 'on') {
            $this->validate($request, [
                'name'                  => 'required|string|min:6',
                'email'                 => 'required|string|min:6|email',
                'password'              => 'required|string|min:6|confirmed',
            ]);
            $adminuser->password = bcrypt($request->password);
            $adminuser->name = $request->name;
            $adminuser->email = $request->email;
            $adminuser->mobileno = $request->mobileno;
            $adminuser->status = '1';
            $adminuser->save();
        } else{
             $this->validate($request, [
                'name'                  => 'required|string|min:6',
                'email'                 => 'required|string|min:6|email',
            ]);
            $adminuser->name = $request->name;
            $adminuser->email = $request->email;
            $adminuser->mobileno = $request->mobileno;
            $adminuser->status = '1';
            $adminuser->save();
        }
        $request->session()->forget('admin')['username'];
        $request->session()->put('admin', array(
        			'userid'                => $id,
                    'user_group_id'         => $user_group_id,
                ));

        return redirect(route('dashboard'));
    }
}
