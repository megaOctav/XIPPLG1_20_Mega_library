<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    //
    protected $fillable = [
        'books_id',
        'user_id',
        'rating',
        'comment'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
