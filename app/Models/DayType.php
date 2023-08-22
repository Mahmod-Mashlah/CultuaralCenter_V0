<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayType extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',

        ] ;

        public function activities()
    {
        return $this->belongsToMany(Activity::class, 'days');
    }

    public function days()
    {
        return $this->hasMany(Day::class);
    }
}