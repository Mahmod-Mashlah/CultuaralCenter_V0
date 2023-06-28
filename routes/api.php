<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\PlayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/////////////////////////// public Routes  /////////////////////////////////////
///////////////////////////               //////////////////////////////////////

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);


//  Lecture Routes (public) :

Route::apiresource('/lectures', LectureController::class)->only(['index','show']);
Route::post('/lectures/search', [LectureController::class, 'search']);//

//  Lecture Routes (public) :

Route::apiResource('/plays', PlayController::class)->only(['index','show']);
 Route::post('/plays/search', [PlayController::class, 'search']);//


// Route::post('/search', function(Request $request) {
//     $query = $request->input('query');
//     $posts = Post::where('title', 'LIKE', '%'.$query.'%')
//                 ->orWhere('body', 'LIKE', '%'.$query.'%')
//                 ->get();
//     return view('search-results', ['posts' => $posts]);
// });


///////////////////// protected Routes (With Auth) //////////////////////////////////////////
/////////////////////                              //////////////////////////////////////////

// Route::prefix()-> group(['middleware'=>['auth:sanctum']],function () {} //to implement prefix

Route::group(['middleware'=>['auth:sanctum']],function () {

Route::resource('/lectures', LectureController::class)->except(['index','show']);
Route::apiResource('/plays', PlayController::class)->except(['index','show']);

Route::post('/logout', [AuthController::class,'logout']);

});

