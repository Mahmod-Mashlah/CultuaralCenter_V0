<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'type',
        'users_count',
        'target_people',
        'start_date',
        'days_duration',
        'room_number',
        'teacher_name',
        'teacher_experience',
        'session_start_time',
        'session_end_time',
        'days',

        //

    ];



    public function daytypesDays()
    {
        return $this->belongsToMany(DayType::class, 'days');
    }

    public function activityDays()
    {
        return $this->hasMany(Day::class);
    }
}
