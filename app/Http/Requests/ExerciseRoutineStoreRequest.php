<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExerciseRoutineStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'exercise_id' => 'required|integer|exists:exercises,id',
            'routine_id' => 'required|integer|exists:routines,id',
            'sets' => 'required|string',
            'reps' => 'required|string',
            'weight' => 'required|string',
        ];
    }
}
