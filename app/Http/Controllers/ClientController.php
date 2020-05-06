<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingDate;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function index() 
    {
        $clients = TrainingDate::where('date','=', Carbon::now()->toDateString())->get(); // User::All();
        return view("clients.index")
            ->with(['clients' => $clients]);
    }

    public function show(Request $request)
    {
        return redirect()->route("exerciseLog.create", ['client' => $request->chosen['client_id']]);
    }
}
