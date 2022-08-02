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
    if(!request()->has('soato'))
    {
        $response=DB::table('resources')
        ->select('resources.*','soato_new.name_uz_cl as name','regions_new.name_uz_cl as region_name')
        ->join('soato_new','soato_new.id','=','resources.soato_new_id')
        ->join('regions_new','regions_new.id','=','soato_new.region_id')
        ->whereRaw('date>'.request()->get('date_from'))
        ->orderByDesc('date')
        ->get()->groupBy('region_name');
       return  $response;
    }
    return request()->all();
    }
    public function index()
    {
        $response=DB::table('resources')->select('resources.*','soato_new.name_uz_cl as name')->join('soato_new','soato_new.id','=','resources.soato_new_id')->get()->groupBy('name');
        return $response;
    }
}
