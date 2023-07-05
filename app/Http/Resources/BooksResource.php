<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
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
            'author' => $this->author,
            'amount' => $this->amount,
            'type' => $this->type,
            'row' => $this->row,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,

            // 'relationships' => [
            //     'department_name'=>(string)$this->department->name,
            // ]
        ];
    }
}
