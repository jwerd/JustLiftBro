<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('exercise', 'ExerciseController')->except('edit', 'update', 'destroy');


Route::resource('exercise', 'ExerciseController')->except('edit', 'update', 'destroy');


Route::resource('exercise', 'ExerciseController')->except('edit', 'update', 'destroy');


Route::resource('exercise', 'ExerciseController')->except('edit', 'update', 'destroy');


Route::resource('exercise', 'ExerciseController')->except('edit', 'update', 'destroy');


Route::resource('exercise', 'ExerciseController')->except('edit', 'update', 'destroy');


Route::resource('exercise', 'ExerciseController')->except('edit', 'update', 'destroy');


Route::resource('exercise', 'ExerciseController')->only('index', 'show');


Route::resource('exercise', 'ExerciseController')->only('index', 'show');


Route::resource('exercise', 'ExerciseController')->only('index', 'show');


Route::resource('exercise', 'ExerciseController')->only('store');


Route::resource('exercise', 'ExerciseController')->only('store');


Route::resource('exercise', 'ExerciseController')->only('store');


Route::resource('exercise', 'ExerciseController')->only('store');


Route::resource('exercise', 'ExerciseController')->only('store');


Route::resource('exercise', 'ExerciseController')->only('store');


Route::resource('exercise', 'ExerciseController')->only('store');


Route::resource('exercise', 'ExerciseController')->only('index', 'store', 'show');


Route::resource('routine', 'RoutineController')->only('index');

Route::resource('exercise', 'ExerciseController')->only('index');

Route::resource('exercise-routine', 'ExerciseRoutineController')->only('store');


Route::resource('routine', 'RoutineController')->only('index');

Route::resource('exercise', 'ExerciseController')->only('index');

Route::resource('exercise-routine', 'ExerciseRoutineController')->only('store');


Route::resource('routine', 'RoutineController')->only('index');

Route::resource('exercise', 'ExerciseController')->only('index');

Route::resource('exercise-routine', 'ExerciseRoutineController')->only('index');


Route::resource('routine', 'RoutineController')->only('index');

Route::resource('exercise', 'ExerciseController')->only('index');

Route::resource('exercise-routine', 'ExerciseRoutineController')->only('create', 'store');


Route::resource('routine', 'RoutineController')->only('index', 'create', 'store');

Route::resource('exercise', 'ExerciseController')->only('index');

Route::resource('exercise-routine', 'ExerciseRoutineController')->only('create', 'store');


Route::resource('routine', 'RoutineController')->except('edit', 'show', 'destroy');

Route::resource('exercise', 'ExerciseController')->except('edit', 'show', 'destroy');

Route::resource('exercise-routine', 'ExerciseRoutineController')->only('create', 'store');


Route::resource('routine', 'RoutineController')->except('edit', 'show', 'destroy');

Route::resource('exercise', 'ExerciseController')->except('edit', 'show', 'destroy');

Route::resource('exercise-routine', 'ExerciseRoutineController')->only('create', 'store');


Route::resource('routine', 'RoutineController')->except('show', 'destroy');

Route::resource('exercise', 'ExerciseController')->except('edit', 'show', 'destroy');

Route::resource('exercise-routine', 'ExerciseRoutineController')->only('create', 'store');


Route::resource('routine', 'RoutineController')->except('destroy');

Route::resource('exercise', 'ExerciseController')->except('show', 'destroy');

Route::resource('exercise-routine', 'ExerciseRoutineController')->only('create', 'store');


Route::resource('routine', 'RoutineController')->except('destroy');

Route::resource('exercise', 'ExerciseController')->except('show', 'destroy');

Route::resource('exercise-routine', 'ExerciseRoutineController')->only('create', 'store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
