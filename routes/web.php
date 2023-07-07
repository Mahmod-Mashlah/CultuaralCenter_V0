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
Route::get('/login', [WebLoginController::class, 'showLoginForm']);

    // Handle login form submission
Route::post('/login', [WebLoginController::class, 'processLogin'])->name('login');




// Private Routes :

Route::middleware('web-auth')->group(function () {
    // Protected routes here
    Route::get('/', function () {
        return view('web.welcome');
    })->name('dashboard');
    // Plans :
    // index :
    Route::get('/web/plans', function () {
    return view('web.plans.index');
    })->name('plans');
    // add Plan :
    Route::get('/web/plans/add', function () {
    return view('web.plans.add');
    })->name('plans-add');
    // update Plan :
    Route::get('/web/plans/update', function () {
    return view('web.plans.update');
    })->name('plans-update');

    // Employees :
    // index :
    Route::get('/web/employees', function () {
    return view('web.employees.index');
    })->name('employees');
    // add Employee :
    Route::get('/web/employees/add', function () {
    return view('web.employees.add');
    })->name('employees-add');
});
    // edit Permissions :
    Route::get('/web/employees/edit-permissions', function () {
    return view('web.employees.edit-permissions');
    })->name('employees-edit-permissions');







