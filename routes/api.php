<?php

use App\Http\Controllers\GeneralReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookReservationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RatingController;

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

    // Rating :
    Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
    Route::put('/ratings/{rating}', [RatingController::class, 'update'])->name('ratings.update');

    // User Book Reservations :

    Route::resource('/book-reservations', BookReservationController::class)->only(['index','store']);;

    // Employee Book Reservations :

    // show all Books Reservations :

    Route::get('/all-books-reservations',[BookReservationController::class, 'allReservations'] )->name('book_borrows.accept');


    // Accept Or Decline Book Reservation :

    Route::post('/book-reservations/accept/{id}',[BookReservationController::class, 'acceptReservation'] )->name('book_borrows.accept');
    Route::post('/book-reservations/decline/{id}',[BookReservationController::class, 'declineReservation'] )->name('book_borrows.decline');

    // Index and Store General Reports :

    Route::resource('/general-reports', GeneralReportController::class)->only(['index','store']);

 });





