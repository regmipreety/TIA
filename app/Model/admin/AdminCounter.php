<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminCounter extends Model {

    protected $table = 'counter';
    protected $guarded = ['id'];

       public static function getAllCounterList($date){
        return DB::table('counter')
            ->select('counter_number','flight_date')
            ->where('flight_date',$date)
            ->groupBy('counter_number')
            ->get();
    }

    public static function getCounterDetail($counter,$date){
        return DB::table('counter')
                ->select('id','counter_number','eta','etd','flight_date','airlines')
                ->where('counter_number',$counter)
                ->where('flight_date',$date)
                ->get();
    }
}
