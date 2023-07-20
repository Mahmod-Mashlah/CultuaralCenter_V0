<?php
/*
* Jetstreams :

composer require laravel/jetstream

Install Jetstream With Livewire :                                  //Or, Install Jetstream With Inertia  (that i didnt do)//Or, Install Jetstream With Inertia  (that i didnt do)
php artisan jetstream:install livewire // i code this                        //php artisan jetstream:install inertia
// or : php artisan jetstream:install livewire --teams                        //php artisan jetstream:install inertia --teams

// or to do the Dark Mode :

    php artisan jetstream:install livewire --dark

//////

npm install

npm run build

php artisan migrate

npm run dev

php artisan serve


/////////////////////////////////
* Sanctum :


# Link : https://www.youtube.com/watch?v=TzAJfjCn7Ks&pp=ygUfbGFyYXZlbCBzYW5jdHVtICBDb2RlIFdpdGggRGFyeQ%3D%3D
# Link on Laravel Docs : https://laravel.com/docs/10.x/sanctum

    composer require laravel/sanctum

    php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

    php artisan migrate

///////////////////////////////////

* Traits Folder (App\Traits)
* HttpResponse.php  (App\Traits\HttpResponses)

make in app folder the (Traits) Folder and make a file (HttpResponse.php) code that in it :

<?php

namespace App\Traits ;

trait HttpResponse {

    protected function success($data ,$message=null ,$code=200)
    {
        return response()->json([

            'status' => 'Request was successful',
            'message' => $message,
            'data' => $data,

        ],$code);
    }

    protected function error($data ,$message=null ,$code)
    {
        return response()->json([

            'status' => 'Error has occoured !',
            'message' => $message,
            'data' => $data,

        ],$code);
    }
}

//////////////////////////////////////

* make controller AuthController

    php artisan make:controller AuthController

    go to controller AuthController and code that :

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    use HttpResponse ; // this is my trait


    public function login(LoginUserRequest $request)
    {
        $request -> validated($request->all() );

        if (!Auth::attempt($request->only(['email','password']))) {
            return $this->error('','Credentials dont match (Unauthorized)',401);
        }

        $user = User::where('email',$request->email)->first();

        return $this->success([
            'user' => $user,
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

        return $this -> success([
            'user' => $user,
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

/////////////////////////////////////
* Auth Api Routes (api.php) :
    go to api.php  :

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// public Routes

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

// protected Routes (With Auth)

// Route::prefix()-> group(['middleware'=>['auth:sanctum']],function () {} //to implement prefix

Route::group(['middleware'=>['auth:sanctum']],function () {

Route::resource('/tasks', TaskController::class);
Route::post('/logout', [AuthController::class,'logout']);

});

/////////////////////////////////////

 TO show all routes in project code the command :

    php artisan route:list

///////////////////////////////////////

* StoreUserRequest.php  :

php artisan make:request StoreUserRequest

- make authorize function is true // not false

<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required','confirmed',Password::defaults()],

        ];
    }
}

////////////////////////////////////////

 * Login User Request (LoginUserRequest):

    php artisan make:request LoginUserRequest

    code in it :


<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            'email' => ['required','string','email','max:255',],
            'password' => ['required','min:6'],
        ];
    }
}


////////////////////////////////////////////////
git config http.postBuffer 524288000
////////////////////////////////////////////////

composer remove laravel/jetstream
*



 */


?>
