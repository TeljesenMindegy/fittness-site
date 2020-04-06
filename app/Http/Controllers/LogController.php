<?php

namespace App\Http\Controllers;

use App\Models\Exercise;

class LogController extends Controller
{
    function index()
    {
        $exercises = Exercise::all();
        // foreach($exercises as $exercise) {
        //     dd($exercise->trainingDate->date);
        // }
        return view("exerciseLog.index")
            ->with([
                'exercises' => $exercises
            ]);
    }
}
