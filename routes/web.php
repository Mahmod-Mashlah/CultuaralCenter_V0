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

Route::get('/', function () {
    return view('web.login-template.sign');
});



// Public Routes :



// Private Routes :

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/web/welcome', function () {
        return view('web.welcome');
    })->name('welcome');

    // Plans :
    // index :
Route::get('/web/plans', function () {
    return view('web.plans.index');
});
    // add Plan :
Route::get('/web/plans/add', function () {
    return view('web.plans.add');
});

// Route::get('/web/welcome', function () {
//     return view('web.welcome');
// });

});



