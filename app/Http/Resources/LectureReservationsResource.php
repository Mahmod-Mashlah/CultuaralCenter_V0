<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LectureReservationsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // "Reservation number"." ".$this-> id => [

            'reservation_id' => (string)$this-> id ,
            'lecture_id' => $this-> lecture_id ,
            'user_id' => $this-> user_id ,
            'status' => $this-> status ,

            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,

            'Lecture Details' => [

                'id'     =>  (string)$this->lecture-> id ,
                'name'   =>   $this->lecture->name  ,
                'type'   =>   $this->lecture->type  ,
                'startdate'   =>   $this->lecture->startdate  ,
                'starttime'   =>   $this->lecture->starttime  ,
                'end_time'   =>   $this->lecture->end_time  ,
                'target_people'   =>   $this->lecture->target_people  ,
                'teacher_experience'   =>   $this->lecture->teacher_experience  ,
                'teacher_name'   =>   $this->lecture->teacher_name  ,

            ] ,

            'User Details' => [

                'id'     =>  (string)$this->user-> id ,
                'name'   =>   $this->user->name  ,
                'email' =>   $this->user->email  ,

            ]

            // ],


        ];
    }
}
