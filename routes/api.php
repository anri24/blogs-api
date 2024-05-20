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

    Route::get('/blogs',[BlogController::class,'index']);
    Route::get('/blog/{blog}',[BlogController::class,'show']);
    Route::post('/blog/create',[BlogController::class,'store']);
    Route::put('/blog/update/{blog}',[BlogController::class,'update']);
    Route::delete('blog/delete/{blog}',[BlogController::class,'destroy']);
});
    Route::get('/blogs/limited',[BlogController::class,'getLimited']);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

