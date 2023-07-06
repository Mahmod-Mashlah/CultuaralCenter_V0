<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DepartmentController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// public Routes
  // Auth
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

  //  Book & Departments Routes (public) :

Route::apiresource('/books', BookController::class)->only(['index','show']);
Route::apiresource('/departments', DepartmentController::class)->only(['index','show']);
Route::post('/books/search', [BookController::class, 'search']);
Route::post('/departments/search', [DepartmentController::class, 'search']);

// protected Routes (With Auth)

// Route::prefix()-> group(['middleware'=>['auth:sanctum']],function () {} //to implement prefix

Route::group(['middleware'=>['auth:sanctum']],function () {


    Route::resource('/books', BookController::class)->except(['index','show']);
    Route::resource('/departments', DepartmentController::class)->except(['index','show']);
    Route::post('/logout', [AuthController::class,'logout']);

 });





