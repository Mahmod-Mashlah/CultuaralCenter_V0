<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Laratrust\Laratrust;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use Laratrust\Traits\HasRolesAndPermissions;

class AuthController extends Controller
{
    use HttpResponse,HasRolesAndPermissions ; // this is my trait


    public function login(LoginUserRequest $request)
    {
        $request -> validated($request->all() );

        if (!Auth::attempt($request->only(['email','password']))) {
            return $this->error('','Credentials dont match (Unauthorized)',401);
        }

        $user = User::where('email',$request->email)->first();

        // $user->addRole('user');

        $role = DB::table('role_user')
                    ->where('user_id', $user->id)
                    ->first()
                    ->role_id
                    ;
        $roleName = DB::table('roles')
                    ->where('id', $role)
                    ->first()
                    ->name
                    ;

        return $this->success([
            'user' => $user,
            'role' => $role,
            'role-name' => $roleName,
            'token'=> $user->createToken('API Token of'.$user->name)->plainTextToken
        ]);


    }

    public function register(StoreUserRequest $request)
    {
        $request -> validated($request->all() );

        $user = User::create([

            'name' => $request -> name ,
            'email' => $request -> email ,
            'password' => Hash::make($request -> password) ,

        ]);

        $user->addRole('user');

        $role = DB::table('role_user')
                    ->where('user_id', $user->id)
                    ->first()
                    ->role_id
                    ;
        $roleName = DB::table('roles')
                    ->where('id', $role)
                    ->first()
                    ->name
                    ;

        return $this -> success([
            'user' => $user,
            'role' => $role,
            'role-name' => $roleName,
            'token'=> $user->createToken('API Token of ' .$user->name)->plainTextToken ,
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this -> success([
            'message' => 'You have successfuly logged out and your token has been deleted',
        ]);
    }
}

