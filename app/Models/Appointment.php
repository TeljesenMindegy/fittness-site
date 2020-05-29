<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'startTime', 'endTime', 'user_id',
    ];

    public function exercises()
    {
        return $this->hasMany(TrainingExercise::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
