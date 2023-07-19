<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePlay extends Model
{
    use HasFactory;

    public function plans()
    {
        return $this->belongsToMany(Plan::class,
        //  'plan_', 'type_plays_id', 'plans_id'
    );
    }
}
