<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmploymentResource;
use App\Models\Employment;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    public function index()
    {
        $response=EmploymentResource::collection(Employment::orderBy('date','DESC')->groupBy('soato_new_id')->get());
        return $response;
    }
}
