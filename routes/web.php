<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Public Routes :

Route::get('/login', function () {
    return view('web.login-template.sign');
});



// Private Routes :

Route::middleware([
    'auth:sanctum',
    ,
    'verified'
])->group(function () {

    Route::get('/', function () {
        return view('web.welcome');
    })->name('dashboard');

    // Plans :
    // index :
Route::get('/web/plans', function () {
    return view('web.plans.index');
});
    // add Plan :
Route::get('/web/plans/add', function () {
    return view('web.plans.add');
});


});



