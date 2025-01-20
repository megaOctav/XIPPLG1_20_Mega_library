<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class loans extends Model
{
    //
    protected $fillable = [
        'book_id',
        'user_id',
        'loan_date',
        'return_date',
        'status'
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
