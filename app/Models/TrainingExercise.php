<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingExercise extends Model
{
    protected $fillable = [
        'exercise_id', 'rep', 'weight', 'training_date_id', 'note',
    ];

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

}
