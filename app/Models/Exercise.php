<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'title',
    ];

    public function trainingExercises()
    {
        return $this->HasMany(TrainingExercise::class);
    }
}
