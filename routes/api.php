<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\PlayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// public Routes

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);


// Lecture Routes :

 Route::post('/lectures/search', [LectureController::class, 'search']);//

// Route::post('/search', function(Request $request) {
//     $query = $request->input('query');
//     $posts = Post::where('title', 'LIKE', '%'.$query.'%')
//                 ->orWhere('body', 'LIKE', '%'.$query.'%')
//                 ->get();
//     return view('search-results', ['posts' => $posts]);
// });

// Route::post('/search', function(Request $request) {
//     $query = $request->input('query');
//     $posts = Post::where('title', 'LIKE', '%'.$query.'%')
//                  ->orWhere('body', 'LIKE', '%'.$query.'%')
//                  ->get();
//     return response()->json($posts);
// });


// Play Routes :
  Route::apiResource('/plays', PlayController::class);
//  Route::get('/plays',[PlayController::class,'index']);



// protected Routes (With Auth)

// Route::prefix()-> group(['middleware'=>['auth:sanctum']],function () {} //to implement prefix

Route::group(['middleware'=>['auth:sanctum']],function () {

Route::resource('/lectures', LectureController::class);
Route::post('/logout', [AuthController::class,'logout']);

});

