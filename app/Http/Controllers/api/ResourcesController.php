<?php

namespace App\Http\Controllers\api;

use DataTables;
use App\Http\Controllers\Controller;
use App\Http\Resources\BaseResource;
use App\Models\Resource;
use App\Models\SoatoNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResourcesController extends Controller
{
    public function getData()
    {
        $date_from=request()->has('date_from')?request()->get('date_from'):'01-01-2022';
        $date_to=request()->has('date_to')?request()->get('date_to'):'31-12-2022';
        $soato=request()->has('soato')?request()->get('soato'):17;
        $columns=[
           'total_employees',
           'active_population',
           'employees',
           'average_populartion',
           'unemployed',
            'rate_unemployement',
           'unactive_population',
        ];
        // $response=DB::table('resources')
        // ->select('resources.*','soato_new.name_uz_cl as name','regions_new.name_uz_cl as region_name')
        // ->join('soato_new','soato_new.id','=','resources.soato_new_id')
        // ->join('regions_new','regions_new.id','=','soato_new.region_id')

        // ->orderByDesc('date')
        // ->get()->groupBy('region_name')->map(function($option){
        //     return $option
        //     ->groupBy('name')->map(function($group){
        //         return $group->first();
        //     });
        // });
        // $response->map(function($group1){

        // });

    //     $response=DB::table('resources')
    //     ->select('resources.*','soato_new.name_uz_cl as name')
    //     ->join('soato_new','soato_new.id','=','resources.soato_new_id')
    //     ->orderByDesc('date')
    //     ->get()->groupBy('name')->map(function($group){
    //         return $group->first();
    //     });
    //     $res=[
    //         'total_employees'=>0,
    //         'active_population'=>0,
    //         'employees'=>0,
    //         'average_populartion'=>0,
    //         'unemployed'=>0,
    //         'rate_unemployement'=>0,
    //         'unactive_population'=>0,
    //     ];
    //    foreach($response as $value)
    //    {
    //         foreach($value as $key=>$val)
    //         {
    //             if(isset($res[$key]))
    //             {
    //                 $res[$key]+=$val;
    //             }
    //         } 
    //    }
    //     return $res;

        if($soato==17)
        {
            $response=DB::table('resources')
            ->select([...$columns,'regions_new.name_uz_cl as structure','regions_new.soato as soato'])
            ->join('soato_new','soato_new.id','=','resources.soato_new_id')
            ->join('regions_new','regions_new.id','=','soato_new.region_id')
            ->whereDate('date','>',date('y-m-d',strtotime($date_from)))
            ->whereDate('date','<',date('y-m-d',strtotime($date_to)))
            ->orderByDesc('date')
            ->get()->groupBy('structure')->map(function($group) use($columns) {
                $new=$group->first();
                foreach($new as $key=>$val)
                {
                    if(in_array($key,$columns))
                    {
                        $new->{$key}=$group->sum($key);
                    }
                }
                return $new;
            });
        
            $response=$response->map(function($val,$key){
                return $val;
            });
            return $response;
        }
        else if(strlen((string)$soato)===4)
        {
            $region_id=DB::table('regions_new')->where('soato','=',$soato)->first()->id;
            return $region_id;
            $response=DB::table('resources')
            ->select([...$columns,'soato_new.soato as soato','soato_new.name_uz_cl as structure'])
            ->join('soato_new','soato_new.id','=','resources.soato_new_id')
            ->where('soato_new.region_id','=',$region_id)
            ->whereDate('date','>',date('y-m-d',strtotime($date_from)))
            ->whereDate('date','<',date('y-m-d',strtotime($date_to)))
            ->orderByDesc('date')
            ->get()->groupBy('structure')->map(function($group) use($columns) {
                $new=$group->first();
                foreach($new as $key=>$val)
                {
                    if(in_array($key,$columns))
                    {
                        $new->{$key}=$group->sum($key);
                    }
                }
                return $new;
            });
        
            $response=$response->map(function($val,$key){
                return $val;
            });
            return $response;
        }
        else if(strlen((string)$soato)===7)
        {
            $response=DB::table('resources')
            ->select([...$columns,'soato_new.soato as soato','soato_new.name_uz_cl as structure'])
            ->join('soato_new','soato_new.id','=','resources.soato_new_id')
            ->where('soato_new.soato','=',$soato)
            ->whereDate('date','>',date('y-m-d',strtotime($date_from)))
            ->whereDate('date','<',date('y-m-d',strtotime($date_to)))
            ->orderByDesc('date')
            ->get()->groupBy('structure')->map(function($group) use($columns) {
                $new=$group->first();
                foreach($new as $key=>$val)
                {
                    if(in_array($key,$columns))
                    {
                        $new->{$key}=$group->sum($key);
                    }
                }
                return $new;
            });
        
            $response=$response->map(function($val,$key){
                return $val;
            });
            return $response;
        }
    }
}
