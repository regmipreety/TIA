<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminBay extends Model {

    protected $table = 'bay';
    protected $guarded = ['id'];

    public static function getTodayBay(){
        return DB::table('bay AS B')
                ->join('add_bay AS AB','AB.id','B.bay_number')
                ->select('AB.bay_no as bay_number',
                DB::Raw("DATE_FORMAT(B.eta, '%H') as `eta_h`"),
                DB::Raw("DATE_FORMAT(B.eta, '%i') as `eta_m`"),
                DB::Raw("DATE_FORMAT(B.etd, '%H') as `etd_h`"),
                DB::Raw("DATE_FORMAT(B.etd, '%i') as `etd_m`"),
                DB::Raw("YEAR(B.operation_date) as `year`"),
                DB::Raw("MONTH(B.operation_date) as `month`"),
                DB::Raw("DAY(B.operation_date) as `day`"),
                'B.flight_type','B.operation_date')
                ->where('B.operation_date',date('Y-m-d'))
                ->orderBy('AB.bay_no','ASC')
                ->get();
    }

    public static function getBayList($date){
        return DB::table('bay AS B')
                ->join('add_bay AS AB','AB.id','B.bay_number')
                ->select('AB.bay_no as bay_number',
                DB::Raw("DATE_FORMAT(B.eta, '%H') as `eta_h`"),
                DB::Raw("DATE_FORMAT(B.eta, '%i') as `eta_m`"),
                DB::Raw("DATE_FORMAT(B.etd, '%H') as `etd_h`"),
                DB::Raw("DATE_FORMAT(B.etd, '%i') as `etd_m`"),
                DB::Raw("YEAR(B.operation_date) as `year`"),
                DB::Raw("MONTH(B.operation_date) as `month`"),
                DB::Raw("DAY(B.operation_date) as `day`"),
                'B.flight_type','B.operation_date')
                ->where('B.operation_date',$date)
                ->orderBy('AB.bay_no','ASC')
                ->get();
    }

    public static function getAllBayList($date){
        return DB::table('bay AS B')
            ->join('add_bay AS AB','AB.id','B.bay_number')
            ->select('AB.bay_no as bay_number','B.operation_date','AB.id')
            ->where('B.operation_date',$date)
            ->groupBy('bay_number')
            ->get();
    }

    public static function getBayDetail($bay,$date){
        return DB::table('bay as B')
                ->join('add_bay AS AB','AB.id','B.bay_number')
                ->select('B.id','AB.bay_no as bay_number','B.eta','B.etd','B.operation_date','B.flight_type')
                ->where('bay_number',$bay)
                ->where('B.operation_date',$date)
                ->orderBy('bay_number','ASC')
                ->get();
    }

    public static function findBay($eta,$etd,$date){
        $etatime =  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $eta,'ASIA/KATHMANDU')->timestamp;
        $etdtime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $etd,'ASIA/KATHMANDU')->timestamp;

       for($i=1;$i<=9;$i++){
                $bay = DB::table('bay AS B')
                        ->join('add_bay AS AB','AB.id','B.bay_number')
                        ->select('AB.bay_no as bay_number','B.operation_date','B.flight_type')
                         ->where(function ($query) use ($etatime, $etdtime) {
                            $query->where(function ($query) use ($etatime, $etdtime) {
                               $query->where(DB::raw("unix_timestamp(concat(operation_date,' ',eta))"),'<=',$etdtime);
                               })
                             ->where(function ($query) use ($etatime, $etdtime) {
                                   $query->where(DB::raw("unix_timestamp(concat(operation_date,' ',etd))"),'>=',$etatime);
                               });
                            })
                       ->where('bay_number',$i)
                       ->where('B.operation_date',$date)
                       ->first();
            if($bay==null){
                $avbay[$i] = 'Bay '. $i;
            }else{
                $avbay[$i] = NULL;
            }
       }
    // $value=array_filter($avbay);
    //    if($value==NULL){
    //     for($i=1;$i<=9;$i++){

    //         $count = DB::table('bay')
    //             ->where('bay_number',$i)
    //             ->where('operation_date',$date)
    //             ->count();

            // $bay1 = DB::table('bay')
            //     ->select('bay_number','eta','etd','operation_date')
            //     ->where('bay_number',$i)
            //     ->where('operation_date',$date)
            //     ->limit($count-1)
            //     ->orderBy('eta','ASC')
            //     ->offset(1)
            //     ->get();
            // $bay =DB::table('bay')
            //     ->select('eta as nxteta')
            //     ->where('bay_number',$i)
            //     ->where('operation_date',$date)
            //     ->limit($count-1)
            //     ->orderBy('eta','ASC')
            //     ->get();

            // $result = DB::table('bay')
            //         ->join('bay AS B','bay.id +1','=','B.id')
            //         ->select('bay.*','B.eta as nxteta')
            //         ->get();
            // $result = $bay1->merge($bay);
                // dd($result);
        // }

    //    }
        return $avbay;
    }
}
