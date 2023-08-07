<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\WelcomeController;
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

        // Dashboard data & info & welcome View  :
            Route::get('/',[WelcomeController::class, 'dashboard'] )->name('dashboard');
        // Plans :

            // index :

            Route::get('/web/plans',[PlanController::class, 'index'] )->name('plans');

            // add Plan :
            Route::get('/web/plans/add', [PlanController::class, 'create'])->name('plans.add');
            Route::post('/web/plans/add', [PlanController::class, 'store'])->name('plans.store');

            // update Plan :
            // Route::get('/web/plans/update', [PlanController::class, 'edit'])->name('plans.edit');
            // Route::post('/web/plans/update', [PlanController::class, 'update'])->name('plans.update');
            // Route::put('/web/plans/update/{id}', [PlanController::class, 'update'])->name('plans.update');
            Route::get('/web/plans/{plan}/edit', [PlanController::class, 'edit'])->name('plans.edit');
            Route::put('/web/plans/{plan}', [PlanController::class, 'update'])->name('plans.update');

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

    // End Private Routes

    // edit Permissions :
Route::get('/web/employees/edit-permissions', function () {
    return view('web.employees.edit-permissions');
})->name('employees-edit-permissions');
