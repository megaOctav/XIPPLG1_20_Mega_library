<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    //
    protected $fillable = [
        'book_id',
        'user_id',
        'rating',
        'comment'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->belongsTo(books::class);
    }
}
