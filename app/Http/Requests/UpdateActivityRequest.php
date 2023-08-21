<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
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

            'name' => ['required','string','max:255','unique:books,name'],
            'type' => ['required','string','max:255',],
            'users_count' => ['required','integer','max:100','min:10'],
            'target_people' => ['required','string','max:255',],

            'start_date' => ['required','date','max:255'],
            'days_duration' => ['required','integer','max:30'],
            'room_number' => ['required','integer','in:1,2,3,4'],
            'teacher_name' => ['required','string','exists:users,name'],
            'teacher_experience' => ['required','string','max:255'],


            'session_start_time' => ['required',


            // 'in:08:00,09:00,10:00,11:00,12:00,13:00,14:00,15:00,16:00,17:00,18:00,19:00,20:00,
            // 08:30,09:30,10:30,11:30,12:30,13:30,14:30,15:30,16:30,17:30,18:30,19:30,'
              ],
            'session_end_time' => ['required',

            // 'in:08:00,09:00,10:00,11:00,12:00,13:00,14:00,15:00,16:00,17:00,18:00,19:00,20:00,
            //  08:30,09:30,10:30,11:30,12:30,13:30,14:30,15:30,16:30,17:30,18:30,19:30,'
                                        ],
            'days' => ['required','string','max:255'],


        ];
    }
}
