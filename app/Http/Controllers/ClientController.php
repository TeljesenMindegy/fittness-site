<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    public function index() 
    {
        $clients = Appointment::whereDate('startTime','=', Carbon::now()->toDateString())->get();
        return view("clients.index")
            ->with(['clients' => $clients]);
    }

    public function show(ClientRequest $request)
    {
        return redirect()->route("exerciseLog.create", ['client' => $request->chosen['client_id']]);
    }
}
