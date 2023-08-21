<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaysResource extends JsonResource
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
            'name' => $this->name,
            'type' => $this->type,
            'start_date' => $this->start_date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'target_people' => $this->target_people,
            'teacher_experience' => $this->teacher_experience,
            'teacher_name' => $this->teacher_name,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,

            'relationships' => [
                'teachername' => '' ,
                'teacher email' => '',

                // 'id'=>(string)$this->user->id,
                // 'teacher name'=>$this->user->name,
                // 'teacher email'=>$this->user->email,
             ]

        ];

    }
}
