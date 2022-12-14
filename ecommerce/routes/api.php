<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

//Category
Route::get('/category',[CategoryController::class,'index']);
Route::get('/category/{id}',[CategoryController::class,'show']);
Route::post('/category',[CategoryController::class,'store']);
Route::put('/category/{id}',[CategoryController::class,'update']);
Route::delete('/category/{id}',[CategoryController::class,'destroy']);

//Product
Route::get('/product',[ProductController::class,'index']);
Route::get('/product/{id}',[ProductController::class,'show']);
Route::post('/product',[ProductController::class,'store']);
Route::put('/product/{id}',[ProductController::class,'update']);
Route::delete('/product/{id}',[ProductController::class,'destroy']);
