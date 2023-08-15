<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'author',
        'amount',
        'row',

        // relations :

        // 'department_id',
        'type', // it means  : From any department .
    ] ;

    public function departments()
    {
        return $this->belongsTo(Department::class) ;
    }

    public function userReservations()
    {
        return $this->belongsToMany(User::class, 'reservations');
    }
}

