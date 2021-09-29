<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminUser extends Model{

	protected $table = 'users';
    protected $guarded = ['id'];

    public static function getUserPassword($username) {
    	$data = DB::table('users')
                -> select('id', 'name', 'password', 'username', 'email','status','user_group_id')
                -> where('email', $username)
                -> where('status', '1')
                -> first();
        return $data;
    }

    public static function getAdminUserList() {
        $data = DB::table('users AS U')
                // ->join('tbl_admin_groups AS AG','AG.id','=','U.user_group_id')
                // ->select('U.*','AG.title')
                ->get();
        return $data;
    }

       public function admingroup(){
        return $this->belongsTo(AdminGroup::class,'user_group_id','id');
    }


}
