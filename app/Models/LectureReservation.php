<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureReservation extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'lecture_id',
        'status',

        ] ;

        public function lecture()
    {
        return $this->belongsTo(Lecture::class,) ;
    }

    public function user()
    {
        return $this->belongsTo(User::class,) ;
    }
}
