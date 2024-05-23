<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function (){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/blog/create',[BlogController::class,'store']);
    Route::post('/blog/update/{id}',[BlogController::class,'update']);
    Route::delete('/blog/delete/{id}',[BlogController::class,'destroy']);
});

Route::get('/blogs',[BlogController::class,'index']);
Route::get('/blog/{id}',[BlogController::class,'show']);
Route::get('/blogs/limited',[BlogController::class,'getLimited']);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

