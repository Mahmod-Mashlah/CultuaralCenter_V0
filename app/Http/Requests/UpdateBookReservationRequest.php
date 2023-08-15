<?php

namespace App\Http\Requests;

use App\Rules\DateAfterWithTwoDays;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookReservationRequest extends FormRequest
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
            'user_id'   => ['required','exists:users,id'],
            'book_id'   => ['required','exists:books,id'],
            'from_date' => ['required','date',] ,
            'to_date'   => ['required','date',new DateAfterWithTwoDays($this->input('from_date'))] ,

        ];
    }
}
