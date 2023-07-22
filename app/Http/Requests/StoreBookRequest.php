<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
            'type' => ['required','string','max:255','exists:departments,name'],
            'row' => ['required','string','max:255'],


            // 'column_to_validate' => [
            //     'required',
            //     Rule::unique('your_table_name')->where(function ($query) {
            //         $query->where('another_column', $this->input('another_column'))
            //               ->where('column_to_compare', '>', $this->input('column_to_validate'));
            //     }),
            // ],

            //relations :

                // 'department_name' =>['in:something,something else']
        ];
    }
}
