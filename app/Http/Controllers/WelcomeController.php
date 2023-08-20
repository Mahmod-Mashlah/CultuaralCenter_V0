<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laratrust\Traits\HasRolesAndPermissions;

class WelcomeController extends Controller
{ use HasRolesAndPermissions;
    //

    public function updateRole(Request $request) {

    // $user = Auth::user();

    // $user->removeRole('user');
    // $user->assignRole('teacher');

    // return redirect()->back()->with('status', 'Role changed successfully.');

    }
    public function dashboard()
    {
        // DAtA Counts :


        $userCount = User::count() ;
        $booksCount = Book::count();
        // $lectures_and_plays_Count = Lecture::count() + Play::count() ;

    // Rating :

    $sum = DB::table('ratings')
    ->where('rating', '>=', 1)
        ->where('rating', '<=', 5)
            ->sum('rating');

    $count = DB::table('ratings')
    ->where('rating', '>=', 1)
        ->where('rating', '<=', 5)
            ->count('rating');

    $result = $sum / $count ;


    $ratingPercent = round( $result /5 * 100 , 1);

        return view('web.welcome', compact([
            'userCount',
            'booksCount',
            // 'lectures_and_plays_Count',

             'ratingPercent',
        ]));
    }
}
