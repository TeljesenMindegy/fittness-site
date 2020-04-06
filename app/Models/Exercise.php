<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'name', 'rep', 'weight', 'training_date_id',
    ];

    public function trainingDate()
    {
        return $this->belongsTo(TrainingDate::class);
    }
}
