<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExerciseRoutine extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exercise_id',
        'routine_id',
        'user_id',
        'sets',
        'reps',
        'weight',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'exercise_id' => 'integer',
        'routine_id' => 'integer',
        'user_id' => 'integer',
    ];


    public function exercise()
    {
        return $this->belongsTo(\App\Exercise::class);
    }

    public function routine()
    {
        return $this->belongsTo(\App\Routine::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
