<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
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
            'name' => ['required','unique:departments,name','string','max:255',],
            'rows_count' => ['required','integer','max:100','min:3'],
            'max_row_books' => ['required','integer','max:300','min:3'],

            //relations :

            // 'department_name' =>['in:something,something else']
        ];
    }
}
