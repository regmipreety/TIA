<?php

namespace App\model\site;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    public static function getMenu($id){
        return DB::table('pages')
                ->where('parent_id',$id)
                ->where('status','1')
                ->orderBy('order_by','ASC')
                ->get();
    }
}
