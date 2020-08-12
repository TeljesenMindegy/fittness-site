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
        if (Auth::user()->hasRole("Trainer"))
        {
            $appointments = Appointment::whereYear('startTime', Carbon::now()->year)->get();
        }
        else
        {
            $appointments = Appointment::whereMonth('startTime', '=', Carbon::now()->month)->where('user_id', '=', Auth::user()->id)->get();
        }

        return view('appointments.index')
            ->with([
                'appointments' => $appointments
            ]);
    }

    public function create()
    {
        $clientsId = [];
        foreach (User::all() as $user)
        {
            if (! $user->hasRole('trainer'))
            {
                $clientsId[] = $user->id;
            }
        }
        $clients = User::all()->whereIn('id', $clientsId);

        return view('appointments.create') ->with([
                'user_options' => $clients
            ]);
    }

    public function store(AppointmentRequest $request)
    {
        Appointment::create($request->appointment);

        return redirect()
            ->route('appointment.create')
            ->with('success', __('Appointment created successfully'));

    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show')
            ->with(compact('appointment'));
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

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('success', __('Post deleted successfully'));
    }
}