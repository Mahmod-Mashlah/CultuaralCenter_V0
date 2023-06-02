<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LecturesResource extends JsonResource
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
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,

            // 'relationships' => [
            //     'id'=>(string)$this->user->id,
            //     'user name'=>$this->user->name,
            //     'user email'=>$this->user->email,
            //  ]



        ];
    }
}
