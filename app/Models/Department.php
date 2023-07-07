<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rows_count',
        'max_row_books',
    ] ;

    // Relations :
    public function books()
    {
        return $this->hasMany(Book::class) ;
    }

}
