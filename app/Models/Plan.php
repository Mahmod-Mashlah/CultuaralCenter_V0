<?php

namespace App\Models;

use App\Models\TypePlay;
use App\Models\TypeLecture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [

        'date',
        'start_time',
        'end_time',
        'min_activities',
        'max_activities',
        'min_lectures',
        'max_lectures',
        'min_plays',
        'max_plays',

    ] ;


    public function type_plays()
    {
        return $this->belongsToMany(TypePlay::class,
        //  'plan_type_play', 'plans_id','type_plays_id'
        );
    }

    public function type_lectures()
    {
        return $this->belongsToMany(TypeLecture::class,
        //  'plan_type_lecture', 'plans_id','type_lectures_id'
        );
    }
}
