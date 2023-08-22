<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayReservationsResource extends JsonResource
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
            'play_id' => $this-> play_id ,
            'user_id' => $this-> user_id ,
            'status' => $this-> status ,

            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,

            'Play Details' => [

                'id'     =>  (string)$this->play-> id ,
                'name'   =>   $this->play->name  ,
                'type'   =>   $this->play->type  ,
                'startdate'   =>   $this->play->startdate  ,
                'starttime'   =>   $this->play->starttime  ,
                'end_time'   =>   $this->play->end_time  ,
                'target_people'   =>   $this->play->target_people  ,
                'teacher_experience'   =>   $this->play->teacher_experience  ,
                'teacher_name'   =>   $this->play->teacher_name  ,

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
