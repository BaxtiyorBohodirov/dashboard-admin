<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\VocantionalTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    public function getData()
    {
        $date_from=request()->has('date_from')?request()->get('date_from'):'01-01-2022';
        $date_to=request()->has('date_to')?request()->get('date_to'):'31-12-2022';
        $soato=request()->has('soato')?request()->get('soato'):17;
        $columns=[
            'number_centers',
            'capacity_centers',
            'number_scholarships',
            'number_students',
            'number_graduates',
            'number_dropouts',
            'number_employed'
        ];
        if($soato==17)
        {
            $response=DB::table('vocational_training')
            ->select([...$columns,'regions_new.name_uz_cl as structure','regions_new.soato as soato'])
            ->join('soato_new','soato_new.id','=','vocational_training.soato_new_id')
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
            $response=DB::table('vocational_training')
            ->select([...$columns,'soato_new.soato as soato','soato_new.name_uz_cl as structure'])
            ->join('soato_new','soato_new.id','=','vocational_training.soato_new_id')
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
            $response=DB::table('vocational_training')
            ->select([...$columns,'soato_new.soato as soato','soato_new.name_uz_cl as structure'])
            ->join('soato_new','soato_new.id','=','vocational_training.soato_new_id')
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
