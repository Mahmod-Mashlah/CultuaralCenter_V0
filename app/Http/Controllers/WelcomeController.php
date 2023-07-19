<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function dashboard()
    {
        // DAtA Counts :


        $userCount = User::count() ;
        $booksCount = Book::count();
        // $lectures_and_plays_Count = Lecture::count() + Play::count() ;

    // Rating :
    //    $rated_users_count = User::where('evaluate', '=', User::get('evaluate'))->exists()->count();
    //    $rating_sum = User::where('evaluate', '=', User::get('evaluate')->sum('evaluate'));

    //    $rating = $rating_sum / $rated_users_count ;

        return view('web.welcome', compact([
            'userCount',
            'booksCount',
            // 'lectures_and_plays_Count',
            // 'rating'
        ]));
    }
}
