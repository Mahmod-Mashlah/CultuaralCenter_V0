<?php

namespace App\Http\Resources;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class BookReservationsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "Reservation number"." ".$this-> id => [

                'id' => (string)$this-> id ,


            'book_id' => $this-> book_id ,
            'user_id' => $this-> user_id ,
            'from_date' => $this-> from_date ,
            'to_date' => $this-> to_date ,
            'status' => $this-> status ,

            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,

            'Book Details' => [

                'id'     =>  (string)$this->book-> id ,
                'name'   =>   $this->book->name  ,
                'author' =>   $this->book->author  ,
                'amount' =>   $this->book->amount  ,
                'row'    =>   $this->book->row  ,



            ] ,

            'User Details' => [

                'id'     =>  (string)$this->user-> id ,
                'name'   =>   $this->user->name  ,
                'email' =>   $this->user->email  ,

            ]

            ],


        ];

    }
}
