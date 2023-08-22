<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PlayController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GeneralReportController;
use App\Http\Controllers\BookReservationController;
use App\Http\Controllers\PlayReservationController;
use App\Http\Controllers\LectureReservationController;
use App\Http\Controllers\ActivityReservationController;

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

  // Lectures :
    Route::resource('/lectures', LectureController::class)->only(['index','show']);
    Route::post('/lectures/search', [LectureController::class, 'search']);//
  // Plays :
    Route::resource('/plays', PlayController::class)->only(['index','show']);
    Route::post('/plays/search', [PlayController::class, 'search']);//
  // Activities :
    Route::resource('/activities', ActivityController::class)->only(['index','show']);
    Route::post('/activities/search', [ActivityController::class, 'search']);//
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

    // Lectures & Plays & Activities:
    Route::resource('/lectures', LectureController::class)->except(['index','show']);
    Route::resource('/plays', PlayController::class)->except(['index','show']);
    Route::resource('/activities', ActivityController::class)->except(['index','show']);



     // Activity Teacher Lecture Reservations :

     Route::resource('/lecture-reservations', LectureReservationController::class)->only(['index','store']);;

     // Employee Lecture Reservations :

     // show all Lectures Reservations :

     Route::get('/all-lectures-reservations',[LectureReservationController::class, 'allReservations'] )->name('lecture_borrows.accept');


     // Accept Or Decline Lecture Reservation :

     Route::post('/lecture-reservations/accept/{id}',[LectureReservationController::class, 'acceptReservation'] )->name('lecture_borrows.accept');
     Route::post('/lecture-reservations/decline/{id}',[LectureReservationController::class, 'declineReservation'] )->name('lecture_borrows.decline');

     // Activity Teacher Play Reservations :

     Route::resource('/play-reservations', PlayReservationController::class)->only(['index','store']);;

     // Employee Play Reservations :

     // show all Plays Reservations :

     Route::get('/all-plays-reservations',[PlayReservationController::class, 'allReservations'] )->name('play_borrows.accept');


     // Accept Or Decline Play Reservation :

     Route::post('/play-reservations/accept/{id}',[PlayReservationController::class, 'acceptReservation'] )->name('play_borrows.accept');
     Route::post('/play-reservations/decline/{id}',[PlayReservationController::class, 'declineReservation'] )->name('play_borrows.decline');

     // Activity Teacher Activity Reservations :

     Route::resource('/activity-reservations', ActivityReservationController::class)->only(['index','store']);;

     // Employee Activity Reservations :

     // show all Activitys Reservations :

     Route::get('/all-activities-reservations',[ActivityReservationController::class, 'allReservations'] )->name('activity_borrows.accept');


     // Accept Or Decline Activity Reservation :

     Route::post('/activity-reservations/accept/{id}',[ActivityReservationController::class, 'acceptReservation'] )->name('activity_borrows.accept');
     Route::post('/activity-reservations/decline/{id}',[ActivityReservationController::class, 'declineReservation'] )->name('activity_borrows.decline');


 });


