<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoutineStoreRequest;
use App\Http\Requests\RoutineUpdateRequest;
use App\Routine;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $routines = Routine::all();

        return view('routine.index', compact('routines'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('routine.create');
    }

    /**
     * @param \App\Http\Requests\RoutineStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoutineStoreRequest $request)
    {
        $routine = Routine::create($request->all());

        $request->session()->flash('routine.id', $routine->id);

        return redirect()->route('routine.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Routine $routine
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Routine $routine)
    {
        return view('routine.show', compact('routine'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Routine $routine
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Routine $routine)
    {
        return view('routine.edit', compact('routine'));
    }

    /**
     * @param \App\Http\Requests\RoutineUpdateRequest $request
     * @param \App\Routine $routine
     * @return \Illuminate\Http\Response
     */
    public function update(RoutineUpdateRequest $request, Routine $routine)
    {
        $request->session()->flash('routine.id', $routine->id);

        return redirect()->route('routine.index');
    }
}
