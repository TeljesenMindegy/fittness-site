<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingExercise extends Model
{
    protected $fillable = [
        'exercise_id', 'rep', 'weight', 'training_date_id', 'note',
    ];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

}
