<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teacher_name',
        'attenders_count',
        'attenders_percent',
        'sessions_count',
    ] ;




}
