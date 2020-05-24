<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AppointmentRequest;
use App\Models\TrainingDate;
use Carbon\Carbon;
use Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        //TODO: list all apointments for trainer
    }

    public function create()
    {
        $users = User::all();
        return view('appointments.create')
            ->with([
                'user_options' => $users
            ]);
    }

    public function store(AppointmentRequest $request)
    {
        TrainingDate::create($request->appointment);

        return redirect()
            ->route('appointment.create')
            ->with('success', __('Appointment created successfully'));

    }

    public function show()
    {
        $appointments = TrainingDate::whereMonth('startTime','=', Carbon::now()->month)->where('user_id', '=', Auth::user()->id)->get();
        return view('appointments.show')
            ->with(['appointments' => $appointments]);
    }

    public function edit(TrainingDate $appointment)
    {
        return view('appointments.edit')
            ->with(compact('appointment'));
    }

    public function update(TrainingDate $appointment, AppointmentRequest $request)
    {
        $appointment->update($request->appointment);
        $appointments = TrainingDate::all();

        return view('appointments.show')
            ->with(['appointments' => $appointments])
            ->with('success', __('Appointment updated successfully'));
    }

    public function destroy()
    {
        //TODO: delete appointment
    }
}