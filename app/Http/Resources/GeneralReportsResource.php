<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralReportsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => (string)$this-> id ,
            'name'              => $this -> name ,
            'teacher_name'      => $this -> teacher_name ,
            'attenders_count'   => $this -> attenders_count ,
            'attenders_percent' => $this -> attenders_percent ,
            'sessions_count'    => $this -> sessions_count ,

            // 'teacher details'    => '👇👇' ,

            // 'teacher_id'=>(string)$this->user->id,
            // 'teacher-name'=>$this->user->name,
            // 'teacher_email'=>$this->user->email,
            // 'teacher_number'=>$this->user->number,

        ];
    }
}
