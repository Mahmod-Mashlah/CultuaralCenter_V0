<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLectureRequest extends FormRequest
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


            'name'               => ['required','unique:lectures,name','max:255',],
            'type'               => ['required','string','in:ثقافية,تربوية,دينية,اجتماعية,اقتصادية,علمية,فلسفية,تقنية,تاريخية,سياسية',],
            'start_date'         => ['required','date'/*,'date_format:j-n-Y'*/,'after:1-8-2023'],
            'start_time'         => ['required','date_format:H:i',
                                      'in:08:00,09:00,10:00,11:00,12:00,13:00,14:00,15:00,16:00,17:00,18:00,19:00,20:00,
                                          08:30,09:30,10:30,11:30,12:30,13:30,14:30,15:30,16:30,17:30,18:30,19:30,'
                                        ,],

            'end_time'           => ['required','date_format:H:i',
                                      'in:09:00,10:00,11:00,12:00,13:00,14:00,15:00,16:00,17:00,18:00,19:00,20:00,
                                          08:30,09:30,10:30,11:30,12:30,13:30,14:30,15:30,16:30,17:30,18:30,19:30,20:30,'
                                    ,
                                        'after:start_time'],
            'target_people'      => ['required','string','max:255'],
            'teacher_experience' => ['required','string','max:255'],
        /*  12:00 am,12:30 am,
            01:00 am,01:30 am,
            02:00 am,02:30 am,
            03:00 am,03:30 am,
            04:00 am,04:30 am,
            05:00 am,05:30 am,
            06:00 am,06:30 am,
            07:00 am,07:30 am,
            08:00 am,08:30 am,
            09:00 am,09:30 am,
            10:00 am,10:30 am,
            11:00 am,11:30 am,

            12:00 pm,12:30 pm,
            01:00 pm,01:30 pm,
            02:00 pm,02:30 pm,
            03:00 pm,03:30 pm,
            04:00 pm,04:30 pm,
            05:00 pm,05:30 pm,
            06:00 pm,06:30 pm,
            07:00 pm,07:30 pm,
            08:00 pm,08:30 pm,
            09:00 pm,09:30 pm,
            10:00 pm,10:30 pm,
            11:00 pm,11:30 pm,

        */
        ];
    }
}
