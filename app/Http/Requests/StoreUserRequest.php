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
            // 'confirm_password' => ['required','confirmed',Password::defaults()],
            'birthdate' => ['required','date','after_or_equal:1900-01-01'] ,
            'serial_number' => ['required','string','regex:/^0\d{10}$/','unique:users,serial_number'],
            'phone_number' => ['required','string','regex:/^09\d{8}$/','unique:users,Phone_number'],
            'address' => ['required','string','max:255',],



        ];
    }
}
