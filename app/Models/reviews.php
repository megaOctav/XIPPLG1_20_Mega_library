<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    //
    protected $fillable = [
        'books_id',
        'user_id',
        'rating',
        'comment'
    ];
}
