<?php

namespace App\Models;

use App\Models\TypePlay;
use App\Models\TypeLecture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    public function type_plays()
    {
        return $this->belongsToMany(TypePlay::class, 'plans_type_plays', 'plans_id','type_plays_id');
    }

    public function type_lectures()
    {
        return $this->belongsToMany(TypeLecture::class, 'plans_type_lectures', 'plans_id','type_lectures_id');
    }
}
