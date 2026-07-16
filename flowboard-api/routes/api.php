<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ping', function () {
    return response()->json([
        'message' => 'Laravel API Working'
    ]);
});


Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);



Route::group(['middleware'=>'auth:sanctum'],function(){
Route::post('logout',[AuthController::class,'logout']);
});