<?php

namespace App\Http\Controllers;

use App\Models\TrainingExercise;
use App\Models\User;
use App\Models\Exercise;
use App\Models\TrainingDate;
use App\Http\Requests\ExerciseLogRequest;
use Illuminate\Http\Request;
use Auth;

class LogController extends Controller
{
    public function index()
    {
        $exercises = TrainingExercise::all();
        return view("exerciseLog.index")
            ->with([
                'trainingExercises' => $exercises
            ]);
   } 

    public function create($client)
    {
        $exercises = Exercise::All();
        return view('exerciseLog.create')
            ->with([
                'exercises' => $exercises,
                'client' => $client
            ]);
    }

    public function store(ExerciseLogRequest $request, TrainingDate $client)
    {
        $client->exercises()
            ->create($request->exerciseLog);

        return redirect()
            ->route('exerciseLog.create', ['client' => $client]);
    }
}