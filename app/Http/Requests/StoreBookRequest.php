<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255',],
            'author' => ['required','string','max:255',],
            'amount' => ['required','integer','max:100','min:0'],
            'type' => ['required','string','max:255',],
            'row' => ['required','string','max:255'],

            //relations :

                // 'department_name' =>['in:something,something else']
        ];
    }
}
