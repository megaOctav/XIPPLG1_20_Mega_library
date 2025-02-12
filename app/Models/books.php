<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    //
    protected $fillable = [
        'title',
        'writer',
        'user_id',
        'category_id',
        'publisher',
        'year'
    ];
}
