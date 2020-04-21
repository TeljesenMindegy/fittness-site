<?php

use Illuminate\Database\Seeder;
use App\Models\Exercise;
class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exercise = new Exercise;
        $exercise->title = "Bench press";
        $exercise->save();

        $exercise = new Exercise;
        $exercise->title = "Squat";
        $exercise->save();

        $exercise = new Exercise;
        $exercise->title = "Deadlift";
        $exercise->save();

        $exercise = new Exercise;
        $exercise->title = "Biceps curl";
        $exercise->save();


        $exercise = new Exercise;
        $exercise->title = "Pull up";
        $exercise->save();
    }
}
