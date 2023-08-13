<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        $rating = Rating::updateOrCreate(
            ['user_id' => $request->user_id,],
            ['rating' => $request->rating]
        );

        return response()->json(['message' => 'Rating created successfully', 'rating' => $rating],200);
    }

    public function update(Request $request, Rating $rating)
       {
           $request->validate([
               'rating' => 'required|integer|min:1|max:5'
           ]);

           $rating->update(['rating' => $request->rating]);

           return response()->json(['message' => 'Rating updated successfully', 'rating' => $rating],200);
       }

    //    function index() {

    //    }
    //    function Calculate all Ratings() {

    //    }

}
