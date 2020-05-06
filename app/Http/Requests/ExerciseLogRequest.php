<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExerciseLogRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'exerciseLog.exercise_id' => 'required|exists:exercises,id',
            'exerciseLog.rep' => 'required',
            'exerciseLog.weight' => 'required',
            'exerciseLog.note' => 'max:190',
        ];
    }
}
