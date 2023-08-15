<?php

namespace App\Http\Requests;

use App\Rules\AfterDate;
use App\Rules\DateAfterWithTwoDays;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookReservationRequest extends FormRequest
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

            // 'user_id'   => ['required','exists:users,id'],
            'book_id'   => ['required','exists:books,id'],
            'from_date' => ['required','date','after:2023-08-01'] ,

            'to_date'   => [
                'required',
                'date',
                'after:from_date',
                'after:'.date('Y-m-d', strtotime('+2 days')),

                // new DateAfterWithTwoDays($this->input('from_date')),
                // new AfterDate('from_date'),

                ] ,
        ];
    }
}
