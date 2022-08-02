<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TrainingResource;
use App\Models\VocantionalTraining;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $response=TrainingResource::collection(VocantionalTraining::orderBy('date','DESC')->groupBy('soato_new_id')->get());
        return $response;
    }
}
