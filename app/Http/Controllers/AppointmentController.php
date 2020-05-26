<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use Carbon\Carbon;
use Auth;

class AppointmentController extends Controller
{
    // function __construct()
    // {
    //     $this->authorizeResource(Appointment::class, 'appointment');
    // }

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
        Appointment::create($request->appointment);

        return redirect()
            ->route('appointment.create')
            ->with('success', __('Appointment created successfully'));

    }

    public function show()
    {
        $appointments = Appointment::whereMonth('startTime','=', Carbon::now()->month)->where('user_id', '=', Auth::user()->id)->get();
        return view('appointments.show')
            ->with(['appointments' => $appointments]);
    }

    public function edit(Appointment $appointment)
    {
        return view('appointments.edit')
            ->with(compact('appointment'));
    }

    public function update(Appointment $appointment, AppointmentRequest $request)
    {
        $appointment->update($request->appointment);
        $appointments = Appointment::all();

        return view('appointments.show')
            ->with(['appointments' => $appointments])
            ->with('success', __('Appointment updated successfully'));
    }

    public function destroy()
    {
        //TODO: delete appointment
    }
}