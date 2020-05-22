<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'appointment.user_id' => 'required|exists:users,id',
            'appointment.startTime' => 'required',
            'appointment.endTime' => 'required',
        ];
    }
}
