<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebLoginController;

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

    // Display login form
Route::get('/login', [WebLoginController::class, 'showLoginForm'])->name('login');

    // Handle login form submission
Route::post('/login', [WebLoginController::class, 'processLogin']);




// Private Routes :

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




