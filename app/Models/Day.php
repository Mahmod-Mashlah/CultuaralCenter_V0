<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [

        'activity_id',
        'day_type_id',


        ] ;

        public function daytype()
        {
            return $this->belongsTo(DayType::class,) ;
        }

        public function activity()
        {
            return $this->belongsTo(Activity::class,) ;
        }


}
