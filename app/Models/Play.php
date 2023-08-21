<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Play extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'type',
        'start_date',
        'start_time',
        'end_time',
        'target_people',
        'teacher_experience',
        'teacher_name',

        // relations :
        //  'user_id',  // means teacher id
    ] ;

    // public function user()
    // {
    //     return $this->belongsTo(User::class) ;
    // }
}
