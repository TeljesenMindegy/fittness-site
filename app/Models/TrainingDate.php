<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingDate extends Model
{
    protected $fillable = [
        'date', 'user_id',
    ];

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
