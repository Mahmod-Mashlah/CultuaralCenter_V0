<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function dashboard()
    {
        // User Count :

        $userCount = User::count();

        return view('web.welcome', compact(['userCount']));
    }
}
