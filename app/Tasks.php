<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
     protected $fillable = [
        'title', 'description', 'user_id', 'choices'
    ];
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
