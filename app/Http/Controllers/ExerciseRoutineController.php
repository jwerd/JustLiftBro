<?php

namespace App\Http\Controllers;

use App\Events\NewExerciseRoutine;
use App\ExerciseRoutine;
use App\Http\Requests\ExerciseRoutineStoreRequest;
use Illuminate\Http\Request;

class ExerciseRoutineController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('ExerciseRoutine.create');
    }

    /**
     * @param \App\Http\Requests\ExerciseRoutineStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExerciseRoutineStoreRequest $request)
    {
        $exerciseroutine = ExerciseRoutine::create($request->all());

        event(new NewExerciseRoutine($ExerciseRoutine));

        $request->session()->flash('message', $message);

        return redirect()->route('ExerciseRoutine.create');
    }
}
