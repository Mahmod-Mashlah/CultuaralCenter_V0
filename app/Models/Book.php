<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'author',
        'amount',
        'type',
        'row',

        // relations :

        // 'department_id',
    ] ;

    // public function department()
    // {
    //     return $this->belongsTo(Department::class) ;
    // }
}

