<?php

use App\Http\Controllers\api\EmploymentController;
use App\Http\Controllers\api\ResourcesController;
use App\Http\Controllers\api\TrainingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/v1/labor-resources',[ResourcesController::class,'getData']);
Route::get('/v1/employment',[EmploymentController::class,'getData']);
Route::get('/v1/professional-training',[TrainingController::class,'getData']);

