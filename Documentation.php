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

make in app folder the (Traits) Folder and make a file (HttpResponses.php) code that in it :

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

*



 */


?>
