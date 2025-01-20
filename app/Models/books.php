<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    //
    protected $fillable = [
        'tittle',
        'writer',
        'user_id',
        'category_id',
        'publisher',
        'year'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(categories::class);
    }
}
