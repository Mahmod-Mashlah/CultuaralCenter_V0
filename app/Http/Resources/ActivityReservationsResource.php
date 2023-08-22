<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityReservationsResource extends JsonResource
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
            'activity_id' => $this-> activity_id ,
            'user_id' => $this-> user_id ,
            'status' => $this-> status ,

            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,

            'Lecture Details' => [

                'id'     =>  (string)$this->activity-> id ,
                'name'   =>   $this->activity->name  ,
                'type'   =>   $this->activity->type  ,
                'users_count'   =>   $this->activity->users_count  ,
                'target_people'   =>   $this->activity->target_people  ,
                'start_date'   =>   $this->activity->start_date  ,
                'days_duration'   =>   $this->activity->days_duration  ,
                'room_number'   =>   $this->activity->room_number  ,
                'teacher_name'   =>   $this->activity->teacher_name  ,
                'teacher_experience'   =>   $this->activity->teacher_experience  ,
                'days'   =>   $this->activity->days  ,


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
