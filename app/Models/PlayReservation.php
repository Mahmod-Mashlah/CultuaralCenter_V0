<?php

namespace App\Models;

use App\Models\Play;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlayReservation extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'play_id',
        'status',

        ] ;

        public function play()
    {
        return $this->belongsTo(Play::class,) ;
    }

    public function user()
    {
        return $this->belongsTo(User::class,) ;
    }
}
