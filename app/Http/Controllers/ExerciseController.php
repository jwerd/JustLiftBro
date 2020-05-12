<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Http\Requests\ExerciseStoreRequest;
use App\Http\Requests\ExerciseUpdateRequest;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $exercises = Exercise::all();

        return view('exercise.index', compact('exercises'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('exercise.create');
    }

    /**
     * @param \App\Http\Requests\ExerciseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExerciseStoreRequest $request)
    {
        $exercise = Exercise::create($request->all());

        $request->session()->flash('exercise.id', $exercise->id);

        return redirect()->route('exercise.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Exercise $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Exercise $exercise)
    {
        return view('exercise.edit', compact('exercise'));
    }

    /**
     * @param \App\Http\Requests\ExerciseUpdateRequest $request
     * @param \App\Exercise $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(ExerciseUpdateRequest $request, Exercise $exercise)
    {
        $request->session()->flash('exercise.id', $exercise->id);

        return redirect()->route('exercise.index');
    }
}
