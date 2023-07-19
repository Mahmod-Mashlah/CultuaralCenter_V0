<?php

namespace App\Models;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeLecture extends Model
{
    use HasFactory;


    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'plans_stores', 'type_lectures_id', 'plans_id');
    }
}
