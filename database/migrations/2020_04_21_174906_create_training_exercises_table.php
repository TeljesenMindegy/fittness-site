<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_exercises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('exercise_id');
            $table->integer('rep');
            $table->integer('weight');
            $table->bigInteger('training_date_id');
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_exercises');
    } 
}
