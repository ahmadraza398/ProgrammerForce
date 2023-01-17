<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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
Route::post('/category',[CategoryController::class,'store'])->middleware(['auth:api', 'admin']);;
Route::put('/category/{id}',[CategoryController::class,'update'])->middleware(['auth:api', 'admin']);;
Route::delete('/category/{id}',[CategoryController::class,'destroy'])->middleware('admin');;

//Product
Route::get('/product',[ProductController::class,'index']);
Route::get('/product/{id}',[ProductController::class,'show']);
Route::post('/product',[ProductController::class,'store'])->middleware(['auth:api', 'admin']);
Route::put('/product/{id}',[ProductController::class,'update'])->middleware(['auth:api', 'admin']);
Route::delete('/product/{id}',[ProductController::class,'destroy'])->middleware(['auth:api', 'admin']);;

//User
Route::apiresource('/user',UserController::class);
Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::post('/logout',[UserController::class,'logout'])->middleware('auth:api');
Route::post('/forgot',[UserController::class,'forgot']);

//Order
Route::apiresource('/order',OrderController::class)->middleware(['auth:api', 'admin']);

//Contact
Route::apiresource('/contact',ContactController::class)->middleware(['auth:api', 'admin']);;

