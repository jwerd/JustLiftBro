<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class NewExerciseRoutine
{
    use SerializesModels;

    public $ExerciseRoutine;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($ExerciseRoutine)
    {
        $this->ExerciseRoutine = $ExerciseRoutine;
    }
}
